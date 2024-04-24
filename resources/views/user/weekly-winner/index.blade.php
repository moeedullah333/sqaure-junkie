@extends('user.user-layout.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Current Weekly Winner</h3>
            </div>
        </div>

        @if (count($userDate)> 0)
       
        <div class="row">

            <div class="col-md-12">
                <section class="our_winners_section">
                    <div class="container">
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($userDate as $key => $item)
                            @foreach ($item as $key1 => $list)
                                @php
                                    $right_way = json_decode($list->right_way);
                                    $right_way_price = json_decode($list->right_way_price);
                                    $wrong_way = json_decode($list->wrong_way);
                                    $wrong_way_price = json_decode($list->wrong_way_price);
                                    $plus2 = json_decode($list->plus2);
                                    $plus2_price = json_decode($list->plus2_price);
                                    $minus2 = json_decode($list->minus2);
                                    $minus2_price = json_decode($list->minus2_price);
                                @endphp


                                 

                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <div class="our_winners_content text-center mb-5">
                                            <h1>{{ $key }} <span> ${{ $list->board_price }} Board
                                                </span></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="win_show_table">
                                            <table class="table table-bordered">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" rowspan="2" class="lightBlueColor">
                                                            ${{ $list->board_price }} <br>
                                                            Square
                                                        </td>
                                                        <td colspan="2" class="ligthYellColor">Right way</td>
                                                        <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>
                                                        <td rowspan="2" class="greenColor">Winner</td>
                                                    </tr>
                                                    <tr>

                                                        <td class="ligthYellColor">Cowboys</td>
                                                        <td class="ligthYellColor">Opp</td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">1st. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $right_way[0] }}</td>
                                                        <td class="ligthYellColor">{{ $right_way[1] }}</td>
                                                        <td class="lightPink">{{ $right_way_price[0] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['rightWayUser'][0] != "null") ? $userAliasArr[$count]['rightWayUser'][0]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">2nd. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $right_way[2] }}</td>
                                                        <td class="ligthYellColor">{{ $right_way[3] }}</td>
                                                        <td class="lightPink">{{ $right_way_price[1] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['rightWayUser'][1] != "null") ? $userAliasArr[$count]['rightWayUser'][1]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">3rd. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $right_way[4] }}</td>
                                                        <td class="ligthYellColor">{{ $right_way[5] }}</td>
                                                        <td class="lightPink">{{ $right_way_price[2] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['rightWayUser'][2] != "null") ? $userAliasArr[$count]['rightWayUser'][2]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">4th. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $right_way[6] }}</td>
                                                        <td class="ligthYellColor">{{ $right_way[7] }}</td>
                                                        <td class="lightPink">{{ $right_way_price[3] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['rightWayUser'][3] != "null") ? $userAliasArr[$count]['rightWayUser'][3]['alias'] : "" }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="win_show_table">
                                            <table class="table table-bordered">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" rowspan="2" class="lightBlueColor">
                                                            ${{ $list->board_price }} <br>
                                                            Square
                                                        </td>
                                                        <td colspan="2" class="ligthYellColor">Plus 2</td>
                                                        <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>
                                                        <td rowspan="2" class="greenColor">Winner</td>
                                                    </tr>
                                                    <tr>

                                                        <td class="ligthYellColor">Cowboys</td>
                                                        <td class="ligthYellColor">Opp</td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">1st. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $plus2[0] }}</td>
                                                        <td class="ligthYellColor">{{ $plus2[1] }}</td>
                                                        <td class="lightPink">{{ $plus2_price[0] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['plus2User'][0] != "null") ? $userAliasArr[$count]['plus2User'][0]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">2nd. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $plus2[2] }}</td>
                                                        <td class="ligthYellColor">{{ $plus2[3] }}</td>
                                                        <td class="lightPink">{{ $plus2_price[1] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['plus2User'][1] != "null")? $userAliasArr[$count]['plus2User'][1]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">3rd. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $plus2[4] }}</td>
                                                        <td class="ligthYellColor">{{ $plus2[5] }}</td>
                                                        <td class="lightPink">{{ $plus2_price[2] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['plus2User'][2] != "null")? $userAliasArr[$count]['plus2User'][2]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">4th. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $plus2[6] }}</td>
                                                        <td class="ligthYellColor">{{ $plus2[7] }}</td>
                                                        <td class="lightPink">{{ $plus2_price[3] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['plus2User'][3] != "null") ? $userAliasArr[$count]['plus2User'][3]['alias'] : "" }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="win_show_table">
                                            <table class="table table-bordered">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" rowspan="2" class="lightBlueColor">
                                                            ${{ $list->board_price }} <br>
                                                            Square
                                                        </td>
                                                        <td colspan="2" class="ligthYellColor">Wrong way</td>
                                                        <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>
                                                        <td rowspan="2" class="greenColor">Winner</td>
                                                    </tr>
                                                    <tr>

                                                        <td class="ligthYellColor">Cowboys</td>
                                                        <td class="ligthYellColor">Opp</td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">1st. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $wrong_way[0] }}</td>
                                                        <td class="ligthYellColor">{{ $wrong_way[1] }}</td>
                                                        <td class="lightPink">{{ $wrong_way_price[0] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['wrongWayUser'][0] != "null") ? $userAliasArr[$count]['wrongWayUser'][0]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">2nd. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $wrong_way[2] }}</td>
                                                        <td class="ligthYellColor">{{ $wrong_way[3] }}</td>
                                                        <td class="lightPink">{{ $wrong_way_price[1] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['wrongWayUser'][1] != "null") ? $userAliasArr[$count]['wrongWayUser'][1]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">3rd. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $wrong_way[4] }}</td>
                                                        <td class="ligthYellColor">{{ $wrong_way[5] }}</td>
                                                        <td class="lightPink">{{ $wrong_way_price[2] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['wrongWayUser'][2] != "null") ?  $userAliasArr[$count]['wrongWayUser'][2]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">4th. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $wrong_way[6] }}</td>
                                                        <td class="ligthYellColor">{{ $wrong_way[7] }}</td>
                                                        <td class="lightPink">{{ $wrong_way_price[3] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['wrongWayUser'][3] != "null") ?  $userAliasArr[$count]['wrongWayUser'][3]['alias'] : "" }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="col-md-6">
                                        <div class="win_show_table">
                                            <table class="table table-bordered">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" rowspan="2" class="lightBlueColor">
                                                            ${{ $list->board_price }} <br>
                                                            Square</td>
                                                        <td colspan="2" class="ligthYellColor">Minus 2</td>
                                                        <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>
                                                        <td rowspan="2" class="greenColor">Winner</td>
                                                    </tr>
                                                    <tr>

                                                        <td class="ligthYellColor">Cowboys</td>
                                                        <td class="ligthYellColor">Opp</td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">1st. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $minus2[0] }}</td>
                                                        <td class="ligthYellColor">{{ $minus2[1] }}</td>
                                                        <td class="lightPink">{{ $minus2_price[0] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['minus2User'][0] != "null") ? $userAliasArr[$count]['minus2User'][0]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">2nd. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $minus2[2] }}</td>
                                                        <td class="ligthYellColor">{{ $minus2[3] }}</td>
                                                        <td class="lightPink">{{ $minus2_price[1] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['minus2User'][1] != "null") ? $userAliasArr[$count]['minus2User'][1]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">3rd. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $minus2[4] }}</td>
                                                        <td class="ligthYellColor">{{ $minus2[5] }}</td>
                                                        <td class="lightPink">{{ $minus2_price[2] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['minus2User'][2] != "null") ?   $userAliasArr[$count]['minus2User'][2]['alias'] : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="lightGreen">4th. Qtr.</td>
                                                        <td class="ligthYellColor">{{ $minus2[6] }}</td>
                                                        <td class="ligthYellColor">{{ $minus2[7] }}</td>
                                                        <td class="lightPink">{{ $minus2_price[3] }}</td>
                                                        <td class="light_lightGreen">
                                                            {{ ($userAliasArr[$count]['minus2User'][3] != "null") ? $userAliasArr[$count]['minus2User'][3]['alias'] : "" }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </div>
                </section>

            </div>
        </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">No data available</div>
                </div>
            </div>
        @endif

       
    </div>
    </div>
@endsection

@push('js')
@endpush
