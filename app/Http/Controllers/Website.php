<?php



namespace App\Http\Controllers;



use App\Models\Board;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\ContactsModel;

use App\Models\GameBoard;

use App\Models\Payment;

use App\Models\PaymentAuthToken;

use App\Models\SquareBuy;

use App\Models\Team;

use App\Models\WinningUser;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;



class Website extends Controller

{

    function index()

    {

        return view('new_website.pages.home');

    }



    function terms()

    {

        return view('new_website.pages.terms-condition');

    }

    function privacy()

    {

        return view('new_website.pages.privacy-policy');

    }

    //

    function current_data($date)

    {

        return $date->format('Y-m-d');

    }



    function register()

    {

        return view('website.webpages.register');

    }



    function user_register(Request $request, User $user)

    {

        // dd($request->all());

        $request->validate([



            'alias' => 'required|max:4|unique:users',

            'email' => 'required|unique:users',

            'password' => 'required|min:6',

            'c_password' => 'required|same:password',

            'date_of_birth' => 'required',

            'term_check' => 'required'

        ], [

            'c_password.required' => 'The confirm password field is required.',

            'c_password.same' => 'The confirm password field must match password.',

        ]);



        $user->name = $request->name;

        $user->alias = $request->alias;

        // $user->hashtag = $request->hashtag;

        $user->number = $request->phone_no;

        $user->user_role = 2;

        $user->email = $request->email;

        $user->date_of_birth = $request->date_of_birth;

        $user->payment_type = intval(3);

        $user->password = Hash::make($request->password);



        if ($user->save()) {

            // return back()->with('success', 'Registration Completed');



            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                return redirect()->route('user.dashboard');

            }



        } else {

            return back()->with('error', 'Sorry There is some issue, try back later');

        }

    }



    function user_contact_page()

    {

        return view('new_website.pages.contact');

        // return view('website.webpages.contact');

    }



    // function user_contact_add(Request $request, ContactsModel $contact)

    // {

    //     $request->validate([

    //         'name' => 'required|string',

    //         'email' => 'required',

    //         'message' => 'required|string',

    //         'subject' => 'required|string'

    //     ]);

    //     $contact = new ContactsModel;

    //     $contact->name = $request->get('name');

    //     $contact->email = $request->get('email');

    //     $contact->subject = $request->get('subject');

    //     $contact->message = $request->get('message');

    //     $contact->save();

    //     return redirect()->route('user_contact_page')->with('success', 'Send Message Successfully');

    // }



    function user_about_us_page()

    {

        return view('new_website.pages.about');

        // return view('website.webpages.about_us');

    }





    function login()

    {

        return view('website.webpages.login');

    }





    // function payment_method($board_id = null, $price = null, $user_id = null)

    // {

    //     $data = User::find(auth()->user()->id);

    //     // dd($data->payment_type);

    //     return view('website.webpages.payment_method', compact('data'), [

    //         'board_id' => $board_id,

    //         'price' => $price,

    //         'user_id' => $user_id,

    //     ]);

    // }



    // function square_selection()

    // {

    //     return view('website.webpages.square_selection');

    // }



    // function generate_numbers()

    // {

    //     return view('website.webpages.generate_numbers');

    // }



    function count_data($board)

    {

        // dd($board);



        if ($board->ten == 0) {

            $count_ten = 0;

        } else {

            $count_ten = count(json_decode($board->ten));

        }



        if ($board->twenty == 0) {

            $count_twenty = 0;

        } else {

            $count_twenty = count(json_decode($board->twenty));

        }



        if ($board->thirty == 0) {

            $count_thirty = 0;

        } else {

            $count_thirty = count(json_decode($board->thirty));

        }



        if ($board->fourty == 0) {

            $count_fourty = 0;

        } else {

            $count_fourty =  count(json_decode($board->fourty));

        }



        if ($board->fifty == 0) {

            $count_fifty = 0;

        } else {

            $count_fifty = count(json_decode($board->fifty));

        }



        if ($board->others == 0) {

            $count_others = 0;

        } else {

            $count_others = count(json_decode($board->others));

        }



        $array  = [

            'ten' => $count_ten,

            'twenty' => $count_twenty,

            'thirty' => $count_thirty,

            'fourty' => $count_fourty,

            'fifty' => $count_fifty,

            'others' => $count_others

        ];



        arsort($array);



        return $array;

    }





    function voting_poll($id)

    {



        $board = Board::where('id', $id)->first();



        // dd($board->toArray());



        $date = Carbon::now();



        // dd($date->format('Y-m-d H:i:s'));



        $current_date = $this->current_data($date);



        $keys = '';

        $dateFormat = $date->format('Y-m-d H:i:00');



        // dd($board->voting_deadline , $date->format('Y-m-d') , $dateFormat);

        if ($dateFormat == $board->voting_deadline || $dateFormat > $board->voting_deadline) {





            $array =  $this->count_data($board);



            $keys = [];

            foreach ($array as $key => $value) {



                // dd($value);

                if ($key == "ten") {

                    if ($value > 100) {

                        $keys[] = "ten";

                    }

                }

                if ($key == "twenty") {

                    if ($value > 100) {

                        $keys[] = "twenty";

                    }

                }

                if ($key == "thirty") {

                    if ($value > 100) {

                        $keys[] = "thirty";

                    }

                }

                if ($key == "fourty") {

                    if ($value > 100) {

                        $keys[] = "fourty";

                    }

                }

                if ($key == "fifty") {

                    if ($value > 100) {

                        $keys[] = "fifty";

                    }

                }

                if ($key == "others") {

                    if ($value > 100) {

                        $keys[] = "others";

                    }

                }

            }





            // $newArray = array_slice($array, 0, 2);



            // $keys = array_keys($newArray);



            // echo $date->format('l jS \of F Y h:i:s A');



            $dateFormat = $date->format('Y-m-d H:i:s');

            // return view('website.webpages.voting', compact('board', 'current_date', 'keys', 'dateFormat'));

            return view('new_website.pages.voting', compact('board', 'current_date', 'keys', 'dateFormat'));

        } else {

            return view('new_website.pages.voting', compact('board', 'current_date', 'keys', 'dateFormat'));



            // return view('website.webpages.voting', compact('board', 'current_date', 'keys', 'dateFormat'));

        }

    }





    //new feature voting start



    function voting_poll_new()

    {



        // dd($board->toArray());



        $date = Carbon::now();



        $dateFormat = $date->format('Y-m-d H:i:s');





        $board = Board::where('voting_start_date', '<=', $dateFormat)->where('voting_deadline', '>=', $dateFormat)->where('is_archive', 0)->get();

        // dd($board,$dateFormat);

        // dd($date->format('Y-m-d H:i:s'));



        $current_date = $this->current_data($date);



        $keys = '';

        foreach ($board as $key => $board_value) {



            //   dd($board_value->voting_deadline , $date->format('Y-m-d') , $dateFormat);



            // if ($board_value->voting_start_date <= $dateFormat || $board_value->voting_deadline >= $dateFormat) {



                $this->count_data($board_value);



                $array =  $this->count_data($board_value);



                $keys = [];

                foreach ($array as $key => $value) {



                    // dd($value);

                    if ($key == "ten") {

                        if ($value > 100) {

                            $keys[] = "ten";

                        }

                    }

                    if ($key == "twenty") {

                        if ($value > 100) {

                            $keys[] = "twenty";

                        }

                    }

                    if ($key == "thirty") {

                        if ($value > 100) {

                            $keys[] = "thirty";

                        }

                    }

                    if ($key == "fourty") {

                        if ($value > 100) {

                            $keys[] = "fourty";

                        }

                    }

                    if ($key == "fifty") {

                        if ($value > 100) {

                            $keys[] = "fifty";

                        }

                    }

                    if ($key == "others") {

                        if ($value > 100) {

                            $keys[] = "others";

                        }

                    }

                }

            }

            // }







        // dd($board->toArray(), $current_date, $keys, $dateFormat);



        // $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');

        // $dayOfWeek = Carbon::now()->EndOfWeek()->format('Y-m-d');

        // dd($startOfWeek , $dayOfWeek);

        // $votingBoard = Board::where(['delete_status' => 0, 'winning_board' => null])->whereBetween('game_date', [$startOfWeek, $dayOfWeek])->latest()->get();

        // $votingBoard = Board::where(['delete_status' => 0, 'winning_board' => null])->latest()->get();



        // dd($votingBoard->toArray());



        return view('website.webpages.new_voting', compact('board', 'current_date', 'keys', 'dateFormat'));

    }



    public function voting_poll_new_getSelectingPrice(Request $request)

    {

        //dd($request->all());

        $board = Board::where('id', $request->id)->first();

        return response()->json([

            'status' => true,

            'data' => $board,

        ]);

    }



    // new feature voting end



    public function board_list()

    {

        $boards = Board::where(['delete_status' => 0, 'is_archive' => 0])->where('winning_board', null)->latest()->get();

        return view('new_website.pages.board_list', compact('boards'));

        // return view('website.webpages.board_list', compact('boards'));

    }



    public function boardPartList($id, $price)

    {



        $gameBoard = GameBoard::with('boardName')->where(['board_id' => $id, 'price' => $price, 'delete_status' => 0 , 'block_board' => 0])->get();

        // dd($gameBoard->toArray());

        $count = [];

        $countUserSquareBuy = [];

        foreach ($gameBoard as $key => $value) {



            $count[] = SquareBuy::where(['board_id' => $value->board_id, 'part' => $value->part, 'price' => $price])->count();



            $countUserSquareBuy[] = SquareBuy::where(['board_id' => $value->board_id, 'part' => $value->part, 'price' => $price, 'user_id' => auth()->user()->id])->count();

        }



        // dd($countUserSquareBuy , auth()->user()->id);    

        return view('new_website.pages.board_part_list', compact('gameBoard', 'count', 'countUserSquareBuy'));



        // return view('website.webpages.board_part_list', compact('gameBoard', 'count', 'countUserSquareBuy'));

    }



    public function board($part, $id, $board_id, $price)

    {

        $date = Carbon::now();



        $dateFormatWithHour = $date->format('Y-m-d H:i:00');



        // dd( $dateFormat );

        $current_date = $this->current_data($date);



        $board = Board::where('id', $board_id)->first();





        $dateFormat = $date->format('Y-m-d H:i:s');



        $gameBoard = GameBoard::where(['id' => $id, 'part' => $part, 'board_id' => $board_id, 'price' => $price])->first();



        // dd($gameBoard->toArray());



        $teamCheck = Team::where(['board_id' => $board_id, 'price' => $price, 'part' => $part])->first();



        // dd($teamCheck , $board_id ,$price , $part);



        $userIdList = SquareBuy::select('user_id')

            ->where(['board_id' => $board_id, 'price' => $price, 'part' => $part])

            ->distinct()

            ->get();



        $playersCount = $userIdList->count();



        $squareBuyCount = SquareBuy::where(['board_id' => $board_id, 'price' => $price, 'part' => $part])->count();



        $winningUser = WinningUser::where(['board_id' => $board_id, 'board_price' => $price, 'part' => $part])->first();



        if (isset($winningUser->right_way_name)) {



            // dd(json_decode($winningUser->right_way_name));

            $rightWayUser = [];

            foreach (json_decode($winningUser->right_way_name) as $key => $value) {



                $right_way_name = User::where('id', $value)->select('id', 'alias')->first();

                if ($right_way_name == !null) {

                    $rightWayUser[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();

                } else {

                    $rightWayUser[] = 'null';

                }

            }



            $wrongWayUser = [];

            foreach (json_decode($winningUser->wrong_way_name) as $key => $value) {

                $wrong_way_name = User::where('id', $value)->select('id', 'alias')->first();

                if ($wrong_way_name == !null) {

                    $wrongWayUser[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();

                } else {

                    $wrongWayUser[] = 'null';

                }

            }



            $plus2User = [];

            foreach (json_decode($winningUser->plus2_name) as $key => $value) {

                $plus2_name = User::where('id', $value)->select('id', 'alias')->first();

                if ($plus2_name == !null) {

                    $plus2User[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();

                } else {

                    $plus2User[] = 'null';

                }

            }



            $minus2User = [];

            foreach (json_decode($winningUser->minus2_name) as $key => $value) {

                $minus2_name = User::where('id', $value)->select('id', 'alias')->first();

                if ($minus2_name == !null) {

                    $minus2User[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();

                } else {

                    $minus2User[] = 'null';

                }

            }



            $userAliasArr = ['rightWayUser' => $rightWayUser, 'wrongWayUser' => $wrongWayUser, 'plus2User' => $plus2User, 'minus2User' => $minus2User];



            return view('new_website.pages.board', compact('gameBoard', 'board', 'current_date', 'dateFormatWithHour', 'playersCount', 'squareBuyCount', 'price', 'winningUser', 'userAliasArr', 'part', 'dateFormat', 'teamCheck'));

            // return view('website.webpages.board', compact('gameBoard', 'board', 'current_date', 'dateFormatWithHour', 'playersCount', 'squareBuyCount', 'price', 'winningUser', 'userAliasArr', 'part', 'dateFormat', 'teamCheck'));

        }



        // dd($board->toArray());



        return view('new_website.pages.board', compact('gameBoard', 'board', 'current_date', 'dateFormatWithHour', 'playersCount', 'squareBuyCount', 'price', 'winningUser', 'part', 'dateFormat', 'teamCheck'));

        // return view('website.webpages.board', compact('gameBoard', 'board', 'current_date', 'dateFormatWithHour', 'playersCount', 'squareBuyCount', 'price', 'winningUser', 'part', 'dateFormat', 'teamCheck'));

    }





    public function contact(Request $request)

    {

        $request->validate([

            'name' => 'required',

            'email' => 'required',

            'phone' => 'required',

        ]);



        $contact = new ContactsModel();

        $contact->name = $request->name;

        $contact->email = $request->email;

        $contact->phone = $request->phone;

        $contact->message = $request->msg;

        $contact->save();



        return redirect()->back()->with('success', 'contact msg send successfully.');

    }





    // crown job start ----------------------------------------------------------------------------------------------------------------------------



    // public function checkBoard()

    // {

    //     $boards = Board::where('delete_status', 0)->get();

    //     $gameBoard = [];

    //     foreach ($boards as $key => $value) {

    //         $gameBoard[] = GameBoard::where('board_id', $value->id)->get()->toArray();

    //     }



    //     foreach (array_filter($gameBoard) as $value) {

    //         foreach ($value as $value2) {



    //             echo "<br/>";

    //             echo $value2['board_id'];

    //             echo "<br/>";



    //             echo $value2['spiner_count'];

    //             echo $value2['spin_numbers'];

    //             echo "<br/>";



    //         }

    //     }

    // }





    public function remove()

    {

        // $boards = Board::where('delete_status', 0)->latest()->get();



        // $date = Carbon::now();

        // $dateFormat = $date->format('Y-m-d H:i:00');



        // foreach ($boards as $key => $board) {







        //     if ($dateFormat == $board->payment_deadline) {



        //         $paymentCheck = Payment::where(['board_id' => $board->id, 'status' => 0])->get();



        //         foreach ($paymentCheck as $key => $payData) {



        //             SquareBuy::where(['user_id' => $payData->user_id, 'board_id' => $payData->board_id, 'price' => $payData->price, 'part' => $payData->part])->delete();

        //             $userGet = User::where('id', $payData->user_id)->first();

        //             $userGet->non_payment_count += 1;

        //             $userGet->save();



        //             $payData->delete();

        //         }



        //         $cerateNewDate = Carbon::now()->addMinute(15);

        //         $newDateFormat = $cerateNewDate->format('Y-m-d H:i:00');



        //         $board->extend_paymentTime = $newDateFormat;

        //         $board->save();

        //     }



        //     if ($dateFormat == $board->extend_paymentTime) {



        //         $gameBoard = GameBoard::where(['board_id' => $board->id, 'delete_status' => 0])->get();



        //         foreach ($gameBoard as $key => $gBoard) {

        //             $squareBuyCheck = SquareBuy::where(['board_id' => $gBoard->board_id, 'part' => $gBoard->part, 'price' => $gBoard->price])->count();

        //             // dd($squareBuyCheck);

        //             if ($squareBuyCheck < 100) {

        //                 Payment::where(['board_id' => $gBoard->board_id, 'part' => $gBoard->part, 'price' => $gBoard->price])->update([

        //                     'delete_status' => 1

        //                 ]);



        //                 SquareBuy::where(['board_id' => $gBoard->board_id, 'part' => $gBoard->part, 'price' => $gBoard->price])->update([

        //                     'delete_status' => 1

        //                 ]);



        //                 GameBoard::where(['board_id' => $gBoard->board_id, 'part' => $gBoard->part, 'price' => $gBoard->price])->update([

        //                     'delete_status' => 1

        //                 ]);

        //             }

        //         }



        //         $token = PaymentAuthToken::where('id', 1)->first();



        //         // dd($token->auth_token);

        //         $payments = Payment::where(['board_id' => $board->id, 'delete_status' => 1 , 'refund_status' => 0])->get();



        //         foreach ($payments as $key => $value) {



        //             $response = Http::withHeaders([

        //                 'Content-Type' => 'application/json',

        //                 'Authorization' => 'Bearer ' . $token->auth_token,

        //                 'Prefer' => 'return=representation',

        //             ])->post('https://api-m.sandbox.paypal.com/v2/payments/captures/' . $value->TransactionID . '/refund', [

        //                 'amount' => [

        //                     'value' => count(json_decode($value->total_square)) *  $value->price,

        //                     'currency_code' => 'USD',

        //                 ],



        //             ]);



        //             if ($response->reason() == "Unauthorized") {

        //                 $response = Http::asForm()

        //                     ->withBasicAuth(env('PAYPAL_SANDBOX_CLIENT_ID'), env('PAYPAL_SANDBOX_CLIENT_SECRET'))

        //                     ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [

        //                         'grant_type' => 'client_credentials'

        //                     ]);



        //                 $token = $response->json('access_token');

        //                 $data = PaymentAuthToken::updateOrCreate(

        //                     ['id' => 1],

        //                     [

        //                         'auth_token' => $token,

        //                     ]

        //                 );



        //                 $response = Http::withHeaders([

        //                     'Content-Type' => 'application/json',

        //                     'Authorization' => 'Bearer ' . $token,

        //                     'Prefer' => 'return=representation',

        //                 ])->post('https://api-m.sandbox.paypal.com/v2/payments/captures/' . $value->TransactionID . '/refund', [

        //                     'amount' => [

        //                         'value' => count(json_decode($value->total_square)) *  $value->price,

        //                         'currency_code' => 'USD',

        //                     ],



        //                 ]);

        //             }



        //             $value->refund_status = 1;

        //             $value->save();

        //         }

        //     }

        // }

    }



    // crown job end ----------------------------------------------------------------------------------------------------------------------------





}

