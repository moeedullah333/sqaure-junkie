<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;

use App\Models\Payment as UserPayment;
use App\Models\PaymentAuthToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{

    
    public function handlePayment(Request $request, $totalprice, $board_id, $price , $part)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment', [$price, $board_id , $part]),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $totalprice . ".00"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('current_game_buy_boxes.list')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        return redirect()
            ->route('current_game_buy_boxes.list')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request, $price, $board_id , $part)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $TransactionID = $response['purchase_units'][0]['payments']['captures'][0]['id'];

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $this->updatePaymentStatus($price, $board_id, $TransactionID, $response , $part);
            return redirect()
                ->route('current_game_buy_boxes.list')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('current_game_buy_boxes.list')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function updatePaymentStatus($price, $board_id, $TransactionID, $response , $part)
    {
        $data = UserPayment::where(['price' => $price, 'board_id' => $board_id, 'user_id' => auth()->user()->id , 'part' => $part])
            ->where('status', 0)
            ->update([
                'TransactionID' => $TransactionID,
                'status' => 1,
                'payment_details' => $response,
            ]);
    }

    public function refund(Request $request)
    {

        $transactionId = ['4Y002202A84532818', '7MU74106EJ634593R', '8F908050DA1460816', '2DA216097D6324900', '96D05770TJ6576821', '9A946193GX335352B'];


        $token = PaymentAuthToken::where('id', 1)->first();
        $payments = UserPayment::where('delete_status', 1)->get();

        foreach ($payments as $key => $value) {

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->auth_token,
                'Prefer' => 'return=representation',
            ])->post('https://api-m.sandbox.paypal.com/v2/payments/captures/' . $value->TransactionID . '/refund', [
                'amount' => [
                    'value' => count(json_decode($value->total_square)) *  $value->price,
                    'currency_code' => 'USD',
                ],

            ]);

            if ($response->reason() == "Unauthorized") {
                $response = Http::asForm()
                    ->withBasicAuth(env('PAYPAL_SANDBOX_CLIENT_ID'), env('PAYPAL_SANDBOX_CLIENT_SECRET'))
                    ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
                        'grant_type' => 'client_credentials'
                    ]);

                $token = $response->json('access_token');
                $data = PaymentAuthToken::updateOrCreate(
                    ['id' => 1],
                    [
                        'auth_token' => $token,
                    ]
                );

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                    'Prefer' => 'return=representation',
                ])->post('https://api-m.sandbox.paypal.com/v2/payments/captures/' . $value->TransactionID . '/refund', [
                    'amount' => [
                        'value' => count(json_decode($value->total_square)) *  $value->price,
                        'currency_code' => 'USD',
                    ],

                ]);
            }

            $value->refund_status = 1;
            $value->save();
        }
    }
}
