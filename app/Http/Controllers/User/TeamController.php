<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Team;
use App\Models\WinningUser;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function teamSelect(Request $request)
    {
        // dd($request->all());
        $user_id = auth()->user()->id;

        $data = Team::where(['board_id' => $request->board_id, 'price' => $request->price, 'part' => $request->part])->first();

        $arrTeamX = [];
        $arrTeamY = [];

        if ($request->teamName == "team_x") {

            $arrTeamX = json_decode($data->team_x, true);

            if ($arrTeamX != 0) {
                if (!in_array($user_id, $arrTeamX)) {
                    array_push($arrTeamX, $user_id);
                    $arrTeamY = json_decode($data->team_y, true);
                }
            } else {
                $arrTeamX = [
                    $user_id
                ];
            }
        }


        if ($request->teamName == "team_y") {

            $arrTeamY = json_decode($data->team_y, true);

            if ($arrTeamY != 0) {
                if (!in_array($user_id, $arrTeamY)) {
                    array_push($arrTeamY, $user_id);
                    $arrTeamX = json_decode($data->team_x, true);
                }
            } else {
                $arrTeamY = [
                    $user_id
                ];
            }
        }

        // exit;
        $teams = Team::updateOrCreate([
            'board_id' => $request->board_id,
            'price' => $request->price,
            'part' => $request->part,
        ], [
            'board_id' => $request->board_id,
            'price' => $request->price,
            'part' => $request->part,
            'team_x' => json_encode($arrTeamX),
            'team_y' => json_encode($arrTeamY),
        ]);

        return response()->json([
            'status' => true,
        ]);
    }


    public function teamWinning()
    {
        $boards = Board::latest()->where('delete_status', 0)->take(10)->get();
        // dd($boards->toArray());

        $winningUser = [];
        foreach ($boards as $key => $board) {
            $winningUser[] = WinningUser::where('board_id', $board->id)->get();
        }

        $winningUser = array_filter($winningUser);

        $winningResult = [];

        foreach ($winningUser as $key => $value) {

            foreach ($value as $key => $getValue) {

                $getTeams = Team::where(['board_id' => $getValue->board_id, 'price' => $getValue->board_price, 'part' => $getValue->part])->first();

                $teamNameGet = Board::where('id', $getValue->board_id)->first();

                $teamName = [$teamNameGet->team_name_x, $teamNameGet->team_name_y , $getValue->part , $teamNameGet->board_name];

                $teamX =  json_decode($getTeams->team_x);
                $teamY = json_decode($getTeams->team_y);

                $rightWayUserId = json_decode($getValue['right_way_name']);
                $wrongWayUserId =  json_decode($getValue['wrong_way_name']);
                $plus2UserId = json_decode($getValue['plus2_name']);
                $minus2UserId = json_decode($getValue['minus2_name']);

                $data = array_merge($rightWayUserId, $wrongWayUserId, $plus2UserId, $minus2UserId);

                $teamXResult = array_intersect($teamX, $data);
                $teamYResult = array_intersect($teamY, $data);

                $teamXCount = count($teamX);
                $teamYCount = count($teamY);

                $teamXResultCount = count($teamXResult);
                $teamYResultCount = count($teamYResult);

                $winningResult[] = ['teamName' => $teamName, 'teamXCount' => $teamXCount, 'teamYCount' => $teamYCount, 'teamXResult' => $teamXResultCount, 'teamYResult' => $teamYResultCount];
            }
        }

        // dd($winningResult);

        return view('user.team.index', compact('winningResult'));
    }

    // function numberGenerate()
    // {
    //     $numberArr = [];
    //     for ($i = 0; $i < 114; $i++) {
    //         $numberArr[] = $i;
    //     }

    //     $shuffledArrays = [];

    //     for ($i = 1; $i <= 8; $i++) {
    //         $shuffledArray = $numberArr;
    //         shuffle($shuffledArray);
    //         $shuffledArrays[] = $shuffledArray;
    //     }



    //     $num1 = json_encode(array_merge($shuffledArrays[0], $shuffledArrays[1], $shuffledArrays[2], $shuffledArrays[5], $shuffledArrays[7]));
    //     $num2 = json_encode(array_merge($shuffledArrays[0], $shuffledArrays[1], $shuffledArrays[2], $shuffledArrays[3], $shuffledArrays[4], $shuffledArrays[5]));
    //     $num3 = json_encode(array_merge($shuffledArrays[0], $shuffledArrays[1], $shuffledArrays[2], $shuffledArrays[3], $shuffledArrays[4], $shuffledArrays[5], $shuffledArrays[5], $shuffledArrays[5], $shuffledArrays[5]));
    //     $num4 = json_encode(array_merge($shuffledArrays[0], $shuffledArrays[1], $shuffledArrays[2], $shuffledArrays[3], $shuffledArrays[4], $shuffledArrays[5], $shuffledArrays[5]));
    //     $num5 = json_encode(array_merge($shuffledArrays[0], $shuffledArrays[1], $shuffledArrays[2], $shuffledArrays[3], $shuffledArrays[4], $shuffledArrays[5], $shuffledArrays[5], $shuffledArrays[5]));
    //     $num6 = json_encode(array_merge($shuffledArrays[0]));

    //     return [$num1, $num2, $num3, $num4, $num5, $num6];
    // }
}
