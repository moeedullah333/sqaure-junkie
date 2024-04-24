<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\GameBoard;
use App\Models\Percentage;
use App\Models\SquareBuy;
use App\Models\Streaming;
use App\Models\Team;
use App\Models\User;
use App\Models\WinningUser;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    protected $client;

    // public function __construct()
    // {
    //     $this->client = new Client([
    //         'base_uri' => 'https://www.twitch.tv/saaddilawer',
    //         'headers' => [
    //             'Client-ID' => 'wk4j7yg6zzsx8lwy9zcnkjaq03igcc',
    //             'Authorization' => 'Bearer z6p348kl1ry19qbkxpzq648c40pxsi',
    //         ],
    //     ]);
    // }
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.twitch.tv/jacobmikel_dev',
            'headers' => [
                'Client-ID' => 'h92ur7tfi28rqitklapwf3romco1or',
                'Authorization' => 'Bearer 1o70rcmy67sdxg181ef96myv52vu59',
            ],
        ]);
    }

    public function dashboard()
    {
        $user = User::where('id', auth()->user()->id)->first();

        $winningUserTotalEarning = WinningUser::get();

        $winningUser = $winningUserTotalEarning->toArray();

        $right_way_name = array_column($winningUser, 'right_way_name');
        $right_way_price = array_column($winningUser, 'right_way_price');

        $wrong_way_name = array_column($winningUser, 'wrong_way_name');
        $wrong_way_price = array_column($winningUser, 'wrong_way_price');

        $plus2_name = array_column($winningUser, 'plus2_name');
        $plus2_price = array_column($winningUser, 'plus2_price');

        $minus2_name = array_column($winningUser, 'minus2_name');
        $minus2_price = array_column($winningUser, 'minus2_price');

        // rightway start
        $right_way_name_Arr = [];
        foreach ($right_way_name as $key => $value) {
            $right_way_name_Arr[] = json_decode($value);
        }

        $right_way_price_Arr = [];
        foreach ($right_way_price as $key => $value) {
            $right_way_price_Arr[] = json_decode($value);
        }

        $rightWayfinalArr = [];
        foreach ($right_way_name_Arr as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $rightWayfinalArr[$value2][] = $right_way_price_Arr[$key][$key2];
            }
        }
        // rightway end

        // wrongway start
        $wrong_way_name_Arr = [];
        foreach ($wrong_way_name as $key => $value) {
            $wrong_way_name_Arr[] = json_decode($value);
        }

        $wrong_way_price_Arr = [];
        foreach ($wrong_way_price as $key => $value) {
            $wrong_way_price_Arr[] = json_decode($value);
        }

        $wrongWayfinalArr = [];
        foreach ($wrong_way_name_Arr as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $wrongWayfinalArr[$value2][] = $wrong_way_price_Arr[$key][$key2];
            }
        }
        // wrongway start

        // plus2 start
        $plus2_name_Arr = [];
        foreach ($plus2_name as $key => $value) {
            $plus2_name_Arr[] = json_decode($value);
        }

        $plus2_price_Arr = [];
        foreach ($plus2_price as $key => $value) {
            $plus2_price_Arr[] = json_decode($value);
        }

        $plus2finalArr = [];
        foreach ($plus2_name_Arr as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $plus2finalArr[$value2][] = $plus2_price_Arr[$key][$key2];
            }
        }
        // plus2 end

        // minus2 start
        $minus2_name_Arr = [];
        foreach ($minus2_name as $key => $value) {
            $minus2_name_Arr[] = json_decode($value);
        }

        $minus2_price_Arr = [];
        foreach ($minus2_price as $key => $value) {
            $minus2_price_Arr[] = json_decode($value);
        }

        $minus2finalArr = [];
        foreach ($minus2_name_Arr as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $minus2finalArr[$value2][] = $minus2_price_Arr[$key][$key2];
            }
        }
        // minus2 end

        $mainArr = [$rightWayfinalArr, $wrongWayfinalArr, $plus2finalArr, $minus2finalArr,];

        $combinedArr = [];

        foreach ($mainArr as $arr) {
            foreach ($arr as $key => $values) {

                if (isset($combinedArr[$key])) {
                    $combinedArr[$key] = array_merge($combinedArr[$key], $values);
                } else {

                    $combinedArr[$key] = $values;
                }
            }
        }

        foreach ($combinedArr as &$values) {
            $values = array_map(function ($value) {
                return (int)str_replace('$', '', $value);
            }, $values);
        }


        // dd($combinedArr);



        return view('user.dashboard.dashboard', compact('user', 'combinedArr'));
    }


    // extra pages 
    public function user_game_schedule()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $dayOfWeek = Carbon::now()->EndOfWeek()->format('Y-m-d');

        $boards = Board::where(['delete_status' => 0, 'status' => 1, 'is_archive' => 0])->whereBetween('created_at', [$startOfWeek, $dayOfWeek])->latest()->paginate(2);
        //  dd($boards->toArray());
        return view('user.schedule.index', compact('boards'));
    }

    public function user_payout_info()
    {

        $getPercentages = Percentage::where('id', 1)->first();
        $percentages = json_decode($getPercentages->percentage);

        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $dayOfWeek = Carbon::now()->EndOfWeek()->format('Y-m-d');
        $payouts = Board::with('gameBoardNamePayout')->where(['delete_status' => 0, 'status' => 1, 'is_archive' => 0])->where('winning_board', '!=', null)->whereBetween('created_at', [$startOfWeek, $dayOfWeek])->latest()->get();
        // dd($payouts->toArray());

        $ten = [];
        $twenty = [];
        $thirty = [];
        $fourty = [];
        $fifty = [];
        $others = [];

        foreach ($payouts as $key => $value) {
            // echo $value->board_name;
            foreach ($value->gameBoardNamePayout as $key => $items) {
                // echo $items->price;
                if ($items->price == 10) {
                    $ten[$value->board_name][] = ['price' => $items->price, 'board_name' => $value->board_name];
                }

                if ($items->price == 20) {
                    $twenty[$value->board_name][] = ['price' => $items->price, 'board_name' => $value->board_name];
                }

                if ($items->price == 30) {
                    $thirty[$value->board_name][] = ['price' => $items->price, 'board_name' => $value->board_name];
                }

                if ($items->price == 40) {
                    $fourty[$value->board_name][] = ['price' => $items->price, 'board_name' => $value->board_name];
                }

                if ($items->price == 50) {
                    $fifty[$value->board_name][] = ['price' => $items->price, 'board_name' => $value->board_name];
                }

                if ($items->price == 'ohters') {
                    $others[$value->board_name][] = ['price' => $items->price, 'board_name' => $value->board_name];
                }
            }
        }

        // dd($payouts,$percentages,$ten, $twenty, $thirty, $fourty, $fifty, $others);

        // dump($ten, $twenty, $thirty, $fourty, $fifty, $others);

        return view('user.payout-info.index', compact('payouts', 'percentages', 'ten', 'twenty', 'thirty', 'fourty', 'fifty', 'others'));
    }

    public function user_weekly_winner()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $dayOfWeek = Carbon::now()->EndOfWeek()->format('Y-m-d');
        $winningUser = Board::with('winningUser')->where(['delete_status' => 0, 'status' => 1, 'is_archive' => 0])->whereBetween('created_at', [$startOfWeek, $dayOfWeek])->latest()->get();

        $userAliasArr = [];
        $userDate = [];
        foreach ($winningUser as $key => $getWinners) {
            foreach ($getWinners->winningUser as $key => $userGet) {

                // dd($getWinners->toArray(), $userGet->toArray());

                if (isset($userGet->right_way_name)) {

                    $rightWayUser = [];
                    foreach (json_decode($userGet->right_way_name) as $key => $value) {
                        $right_way_name = User::where('id', $value)->select('id', 'alias')->first();
                        if ($right_way_name == !null) {
                            $rightWayUser[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
                        } else {
                            $rightWayUser[] = 'null';
                        }
                    }

                    $wrongWayUser = [];
                    foreach (json_decode($userGet->wrong_way_name) as $key => $value) {
                        $wrong_way_name = User::where('id', $value)->select('id', 'alias')->first();
                        if ($wrong_way_name == !null) {
                            $wrongWayUser[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
                        } else {
                            $wrongWayUser[] = 'null';
                        }
                    }

                    $plus2User = [];
                    foreach (json_decode($userGet->plus2_name) as $key => $value) {
                        $plus2_name = User::where('id', $value)->select('id', 'alias')->first();
                        if ($plus2_name == !null) {
                            $plus2User[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
                        } else {
                            $plus2User[] = 'null';
                        }
                    }

                    $minus2User = [];
                    foreach (json_decode($userGet->minus2_name) as $key => $value) {
                        $minus2_name = User::where('id', $value)->select('id', 'alias')->first();
                        if ($minus2_name == !null) {
                            $minus2User[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
                        } else {
                            $minus2User[] = 'null';
                        }
                    }

                    $userAliasArr[] = ['rightWayUser' => $rightWayUser, 'wrongWayUser' => $wrongWayUser, 'plus2User' => $plus2User, 'minus2User' => $minus2User];
                    $userDate[$getWinners->board_name][] = $userGet;
                }
            }
        }


        // dd($userDate, $userAliasArr,   $winningUser->toArray());


        // dd($winningUser->toArray());

        return view('user.weekly-winner.index', compact('userAliasArr', 'userDate'));
    }

    public function user_select_square()
    {

        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $dayOfWeek = Carbon::now()->EndOfWeek()->format('Y-m-d');

        $boards = Board::with('gameBoardShowPart')->where(['delete_status' => 0, 'status' => 1])->whereBetween('created_at', [$startOfWeek, $dayOfWeek])->latest()->get();

        // dd($boards->toArray());

        // exit;

        return view('user.select-square.index', compact('boards'));
    }

    // streaming funtion start
    public function getStreamInfo($channelName)
    {
        $response = $this->client->get("streams?user_login=$channelName");
        return $response;
    }
    // streaming funtion end


    // public function user_number_generate_view()
    // {

    //     $data =  $this->getStreamInfo('saaddilawer');
    //     return view('user.generate-number.index', compact('data'));

    // }
    public function user_number_generate_view()
    {

        $data =  $this->getStreamInfo('jacobmikel_dev');
        return view('user.generate-number.index', compact('data'));
    }




    public function user_select_square_date(Request $request)
    {
        $boardParts = GameBoard::where('board_id', $request->board_id)->get();

        return response()->json(
            [
                'status' => true,
                'data' => $boardParts,
            ]
        );
    }

    public function user_streaming_ajax(Request $request)
    {
        $data = Streaming::where('id', 1)->first('status');

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    // public function user_number_generate_view2(){

    //     $user_id = auth()->user()->id;

    //     $userSquares = SquareBuy::where('user_id', $user_id)->select('board_id' ,'part', 'price')->distinct()->get();

    //     $userBoards = [];

    //     if($userSquares){
    //         foreach ($userSquares as $square) {
    //             $board_id = $square->board_id;
    //             $part = $square->part;
    //             $price = $square->price;

    //             $gameBoard = GameBoard::where(['part' => $part, 'board_id' => $board_id, 'price' => $price])->get();

    //             if($gameBoard && isset($gameBoard[0]['id'])){
    //                 $id = $gameBoard[0]['id'];
    //                 $userBoards[] = array_merge( $this->board($part, $id, $board_id, $price)  , [ 'tableObj' => ['gameBoard_id' => $id,  'part' => $part, 'board_id' => $board_id, 'price' => $price] ] );
    //             }

    //         }
    //         // dd($userBoards);
    //     }

    // }
    // public function current_data($date)
    // {
    //     return $date->format('Y-m-d');
    // }
    // public function board($part, $id, $board_id, $price)
    // {

    //     $board = [];

    //     $date = Carbon::now();

    //     $current_date = $this->current_data($date);

    //     $board = Board::where('id', $board_id)->first();


    //     $dateFormat = $date->format('Y-m-d H:i:00');

    //     $gameBoard = GameBoard::where(['id' => $id, 'part' => $part, 'board_id' => $board_id, 'price' => $price])->first();

    //     $teamCheck = Team::where(['board_id' => $board_id, 'price' => $price, 'part' => $part])->first();

    //     $userAliasArr  = [];

    //     $userIdList = SquareBuy::select('user_id')
    //         ->where(['board_id' => $board_id, 'price' => $price, 'part' => $part])
    //         ->distinct()
    //         ->get();

    //     $rightWayUser = [];
    //     $playersCount = $userIdList->count();
    //     $wrongWayUser = [];
    //     $plus2User = [];
    //     $minus2User = [];

    //     $squareBuyCount = SquareBuy::where(['board_id' => $board_id, 'price' => $price, 'part' => $part])->count();

    //     $winningUser = WinningUser::where(['board_id' => $board_id, 'board_price' => $price, 'part' => $part])->first();

    //     if (isset($winningUser->right_way_name)) {


    //         foreach (json_decode($winningUser->right_way_name) as $key => $value) {

    //             $right_way_name = User::where('id', $value)->select('id', 'alias')->first();
    //             if ($right_way_name == !null) {
    //                 $rightWayUser[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
    //             } else {
    //                 $rightWayUser[] = 'null';
    //             }
    //         }

    //         foreach (json_decode($winningUser->wrong_way_name) as $key => $value) {
    //             $wrong_way_name = User::where('id', $value)->select('id', 'alias')->first();
    //             if ($wrong_way_name == !null) {
    //                 $wrongWayUser[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
    //             } else {
    //                 $wrongWayUser[] = 'null';
    //             }
    //         }

    //         foreach (json_decode($winningUser->plus2_name) as $key => $value) {
    //             $plus2_name = User::where('id', $value)->select('id', 'alias')->first();
    //             if ($plus2_name == !null) {
    //                 $plus2User[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
    //             } else {
    //                 $plus2User[] = 'null';
    //             }
    //         }

    //         foreach (json_decode($winningUser->minus2_name) as $key => $value) {
    //             $minus2_name = User::where('id', $value)->select('id', 'alias')->first();
    //             if ($minus2_name == !null) {
    //                 $minus2User[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
    //             } else {
    //                 $minus2User[] = 'null';
    //             }
    //         }

    //         $userAliasArr = ['rightWayUser' => $rightWayUser, 'wrongWayUser' => $wrongWayUser, 'plus2User' => $plus2User, 'minus2User' => $minus2User];

    //         // return view('website.webpages.board', compact('gameBoard', 'board', 'current_date', 'playersCount', 'squareBuyCount', 'price', 'winningUser', 'userAliasArr', 'part', 'dateFormat', 'teamCheck'));
    //     }

    //     $board = ['gameBoard' => $gameBoard, 'board' => $board, 'current_date' => $current_date, 'playersCount' => $playersCount, 'squareBuyCount' => $squareBuyCount, 'price' => $price, 'winningUser' => $winningUser, 'userAliasArr' => $userAliasArr, 'part' => $part, 'dateFormat' => $dateFormat, 'teamCheck' => $teamCheck];

    //     return $board;
    // }

}
