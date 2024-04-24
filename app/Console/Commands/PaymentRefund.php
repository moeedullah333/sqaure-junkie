<?php

namespace App\Console\Commands;

use App\Models\Board;
use App\Models\GameBoard;
use App\Models\Payment;
use App\Models\PaymentAuthToken;
use App\Models\SquareBuy;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PaymentRefund extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:payment-refund';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $boards = Board::where('delete_status', 0)->latest()->get();

        $date = Carbon::now();
        $dateFormat = $date->format('Y-m-d H:i:00');

        foreach ($boards as $key => $board) {

            if ($dateFormat == $board->payment_deadline) {

                $paymentCheck = Payment::where(['board_id' => $board->id, 'status' => 0])->get();

                foreach ($paymentCheck as $key => $payData) {

                    SquareBuy::where(['user_id' => $payData->user_id, 'board_id' => $payData->board_id, 'price' => $payData->price, 'part' => $payData->part])->delete();
                    $userGet = User::where('id', $payData->user_id)->first();
                    $userGet->non_payment_count += 1;
                    $userGet->save();

                    $payData->delete();
                }

                $cerateNewDate = Carbon::now()->addHours(10);
                $newDateFormat = $cerateNewDate->format('Y-m-d H:i:00');

                $board->extend_paymentTime = $newDateFormat;
                $board->save();
            }

            if ($dateFormat == $board->extend_paymentTime) {

                $gameBoard = GameBoard::where(['board_id' => $board->id, 'delete_status' => 0])->get();

                foreach ($gameBoard as $key => $gBoard) {
                    $squareBuyCheck = SquareBuy::where(['board_id' => $gBoard->board_id, 'part' => $gBoard->part, 'price' => $gBoard->price])->count();
                    // dd($squareBuyCheck);
                    if ($squareBuyCheck < 100) {
                        Payment::where(['board_id' => $gBoard->board_id, 'part' => $gBoard->part, 'price' => $gBoard->price])->update([
                            'delete_status' => 1
                        ]);

                        SquareBuy::where(['board_id' => $gBoard->board_id, 'part' => $gBoard->part, 'price' => $gBoard->price])->update([
                            'delete_status' => 1
                        ]);

                        GameBoard::where(['board_id' => $gBoard->board_id, 'part' => $gBoard->part, 'price' => $gBoard->price])->update([
                            'delete_status' => 1
                        ]);
                    }
                } 

                $token = PaymentAuthToken::where('id', 1)->first();

                // dd($token->auth_token);
                $payments = Payment::where(['board_id' => $board->id, 'delete_status' => 1 , 'refund_status' => 0])->get();

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
    }
}
