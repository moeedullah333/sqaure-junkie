@extends('layouts.main')

@section('content')

    <style>

        .checkMarkOwn {

            width: 100%;

            height: 100%;

            position: absolute;

            top: 0;

            /* cursor: not-allowed; */

            display: flex;

            justify-content: center;

            align-items: center;

            background-color: #8FEA9A;

            user-select: none;

        }



        .board_dates_details {

            display: flex;

            justify-content: space-between;

            align-items: center;



        }



        .board_dates_details p {

            color: red;

            font-weight: bold;

        }



        h3.yyy_text {

            transform: rotate(270deg);

        }



        .gamingBox td.yyy_td {

            width: 30px !important;

        }



        h3.yyy_text {

            transform: rotate(270deg);

            position: absolute;

            top: 50%;

            left: -50px;

        }

    </style>



    @if (($data->spiner_count !== 0 && $data->spiner_count !== 0 ) && ($data->spiner_count == $data->spin_numbers))

        <style>

            .new span {

                visibility: visible;

            }



            .firstXnumber span {

                visibility: visible;

            }



            .secondXnumber span {

                visibility: visible;

            }



            .thirdXnumber span {

                visibility: visible;

            }



            .fourthXnumber span {

                visibility: visible;

            }

        </style>

    @else

        <style>

            .new span {

                visibility: hidden;

            }



            .firstXnumber span {

                visibility: hidden;

            }



            .secondXnumber span {

                visibility: hidden;

            }



            .thirdXnumber span {

                visibility: hidden;

            }



            .fourthXnumber span {

                visibility: hidden;

            }

        </style>

    @endif




    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">



    <div class="ediTprofile">



        <div class="row">

            <div class="col-md-12">

                <div class="titleBox py-4">

                    <h3 class="achivpFont font-weight-bold mb-0 text-center"><a href="#"

                            class="text-danger text-decoration-none">${{ $data->price }}{{ $data->part }} Board</a></h3>



                    {{-- <h3 class="mb-0 achivpFont mb-0 font-weight-bold"><a href="#"

                            class="text-dark text-decoration-none text-center">Create Game</a></h3> --}}

                </div>

            </div>

        </div>

        @if (\Session::has('success'))

            <div class="alert alert-success">{{ \Session::get('success') }}</div>

        @endif

        <div class="report-section shadow px-5 py-4 rounded-15 my-4">

            <div class="row justify-content-between align-items-center">

                <div class="col-md-5">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">

                            <button class="nav-link text-dark active" id="home-tab" data-toggle="tab" data-target="#home"

                                type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>

                        </li>

                        <li class="nav-item " role="presentation">

                            <button class="nav-link text-dark" id="players-tab" data-toggle="tab" data-target="#players"

                                type="button" role="tab" aria-controls="players" aria-selected="false">players</button>

                        </li>



                        <li class="nav-item " role="presentation">

                            <button class="nav-link text-dark" id="announce-tab" data-toggle="tab" data-target="#announce"

                                type="button" role="tab" aria-controls="announce"

                                aria-selected="false">announce</button>

                        </li>



                    </ul>

                </div>

                <div class="col-md-3 text-md-right">

                    <div class="actionBtn">

                        @if (isset($_GET['num-gen']))

                            @php

                                $num_gen = $_GET['num-gen'];

                                // $url = str_replace("'",""," $num_gen");

                                $url = Crypt::decrypt($num_gen);

                                // dd($url);

                            @endphp



                            <a href ="{{ route($url) }}" class="btn btn-success">Boards</a>

                        @else

                            <a href ="{{ route('admin.board_list') }}" class="btn btn-success">Boards</a>

                        @endif

                    </div>

                </div>

            </div>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



                    <form action="" method="POST">

                        <div class="row mb-4">



                        </div>

                        <div class="row mb-4">

                            <div class="col-md-12">

                                @php

                                    $currentDate = carbon\Carbon::now();

                                    $dateFormat = $currentDate->format('Y-m-d H:i:00');



                                @endphp

                                {{-- @dd($dateFormat); --}}

                                @if ($dateFormat >= $board_game_date->generate_number)

                                    <div class="numberGenrator">

                                        <button title="Click this button to remove the random generated spin count! But I won't work if once the 'Lets Spin' Button has been pressed." type="button" class="btn btn-danger clearBtn" id="theclearBtn" {{ intval($data->spiner_count) > 0  ? 'disabled' : '' }} >Clear Numbers</button>   

                                        <button title="Click this button to Generate Random Spin Count! But I won't work if once the 'Lets Spin' Button has been pressed." type="button" class="btn btn-dark SpinsNumber" id="step_1" {{ intval($data->spiner_count) > 0  ? 'disabled' : '' }} >Number of Spins</button>                
                                        
                                                                                <button type="button" id="spinNumberCount2" disabled class="btn btn-dark"><span>{{ $data->spin_numbers }}</span></button>


                                        <button type="button" id="spiner" class="btn btn-success q1" id="step_2" style="color: #fff;background-color: #198754;border-color: #198754;">Generate Numbers</button>


                                        <button type="button" id="spinNumberCount" disabled class="btn btn-primary" style="opacity:1;background-color:#002964;border-color:#002964">Spin Count: <span>{{ $data->spin_numbers }}</span></button>





<!-- 
                                        <button type="button" class="btn btn-warning q1 d-none"

                                            onclick="generateRandomNumbers('firstXnumber', 'firstYnumber')">1st Qtr</button>

                                        <button type="button" class="btn btn-warning q2 d-none"

                                            onclick="generateRandomNumbers('secondXnumber', 'secondYnumber')">2nd

                                            Qtr</button>

                                        <button type="button" class="btn btn-warning q3 d-none"

                                            onclick="generateRandomNumbers('thirdXnumber', 'thirdYnumber')">3rd Qtr</button>

                                        <button type="button" class="btn btn-warning q4 d-none"

                                            onclick="generateRandomNumbers('fourthXnumber', 'fourthYnumber')">4th

                                            Qtr</button> -->

                                       



                                    </div>

                                @endif







                                <div class="board_dates_details">

                                    <p>Select Square Deadline :

                                        {{ date('j-F-Y', strtotime($board_game_date->square_deadline)) }}</p>

                                    <p>Game Date : {{ date('j-F-Y', strtotime($board_game_date->game_date)) }} </p>

                                    <p>Generate Number Date :

                                        {{ date('j-F-Y', strtotime($board_game_date->generate_number)) }} </p>

                                    <p>Payment Deadline: {{ date('j-F-Y', strtotime($board_game_date->payment_deadline)) }}

                                    </p>

                                </div>



                                <p class="text-end"><strong>Total Number of Squares (100) <br> && total Numbers of Buy

                                        ({{ $squareBuyCountTotal }})</strong></p>



                            </div>

                            <div class="col-md-12">





                                <div class="table-responsive">



                                    <table class="gamingBox spinTable" id="normalGamingTable">

                                        <h3 class="text-center">{{ $board_game_date->team_name_x }}</h3>

                                        <h3 class="yyy_text">{{ $board_game_date->team_name_y }}</h3>

                                        <thead>



                                        </thead>

                                        @php

                                            $q1x = json_decode($data->q1x);

                                            $q2x = json_decode($data->q2x);

                                            $q3x = json_decode($data->q3x);

                                            $q4x = json_decode($data->q4x);



                                            $q1y = json_decode($data->q1y);

                                            $q2y = json_decode($data->q2y);

                                            $q3y = json_decode($data->q3y);

                                            $q4y = json_decode($data->q4y);

                                        @endphp

                                        <tbody>



                                            {{-- <tr>

                                                <td class="lightGray " style="background: none; border:none" colspan="15">

                                                    <h3>{{ $board_game_date->team_name_x }}</h3>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td class=" yyy_td" style="background: none; border:none" colspan="1"

                                                    rowspan="15">

                                                    <h3 class="yyy_text">{{ $board_game_date->team_name_y }}</h3>

                                                </td>

                                            </tr> --}}

                                            <tr>

                                                <td class="lightYellow" colspan="4">1st</td>

                                                @if (isset($q1x))

                                                    @foreach ($q1x as $item)

                                                        <td class="lightYellow firstXnumber clear">

                                                            <span>{{ $item }}</span>

                                                        </td>

                                                    @endforeach

                                                @else

                                                    @for ($i = 0; $i < 10; $i++)

                                                        <td class="lightYellow firstXnumber clear">0</td>

                                                    @endfor

                                                @endif







                                            </tr>



                                            <tr>

                                                <td class="lightYellow" rowspan="3">1st</td>

                                                <td class="orangeColor" colspan="3">2nd</td>

                                                @if (isset($q2x))

                                                    @foreach ($q2x as $item)

                                                        <td class="orangeColor secondXnumber clear">

                                                            <span>{{ $item }}</span>

                                                        </td>

                                                    @endforeach

                                                @else

                                                    @for ($i = 0; $i < 10; $i++)

                                                        <td class="orangeColor secondXnumber clear">0</td>

                                                    @endfor

                                                @endif



                                            </tr>

                                            <tr>

                                                <td rowspan="2" class="orangeColor">2nd</td>

                                                <td colspan="2" class="lightBlue">3rd</td>

                                                @if (isset($q3x))

                                                    @foreach ($q3x as $item)

                                                        <td class="lightBlue thirdXnumber clear">

                                                            <span>{{ $item }}</span>

                                                        </td>

                                                    @endforeach

                                                @else

                                                    @for ($i = 0; $i < 10; $i++)

                                                        <td class="lightBlue thirdXnumber clear">0</td>

                                                    @endfor

                                                @endif

                                            </tr>



                                            <tr>

                                                <td class="lightBlue">3rd</td>

                                                <td class="blueColor">4th</td>



                                                @if (isset($q4x))

                                                    @foreach ($q4x as $item)

                                                        <td class="blueColor fourthXnumber clear">

                                                            <span>{{ $item }}</span>

                                                        </td>

                                                    @endforeach

                                                @else

                                                    @for ($i = 0; $i < 10; $i++)

                                                        <td class="blueColor fourthXnumber clear">0</td>

                                                    @endfor

                                                @endif

                                            </tr>



                                            <tr>

                                                @if (isset($q1y[0]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[0] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[0]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[0] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear">0</td>

                                                @endif





                                                @if (isset($q3y[0]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[0] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q3y[0]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q3y[0] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear">0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[1]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[1] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear">0</td>

                                                @endif





                                                @if (isset($q2y[1]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[1] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear">0</td>

                                                @endif





                                                @if (isset($q3y[1]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[1] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[1]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[1] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[2]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[2] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q2y[2]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[2] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[2]))

                                                    <td class="lightBlue thirdYnumber new clear"><span>

                                                            {{ $q3y[2] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q4y[2]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[2] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[3]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[3] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q2y[3]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[3] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[3]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[3] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear">0</td>

                                                @endif





                                                @if (isset($q4y[3]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[3] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear">0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[4]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[4] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[4]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[4] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q3y[4]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[4] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[4]))

                                                    <td class="blueColor fourthYnumber new clear"><span>

                                                            {{ $q4y[4] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[5]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[5] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[5]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[5] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[5]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[5] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[5]))

                                                    <td class="blueColor fourthYnumber new clear"><span>

                                                            {{ $q4y[5] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[6]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[6] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[6]))

                                                    <td class="orangeColor secondYnumber new clear"><span>

                                                            {{ $q2y[6] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q3y[6]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[6] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[6]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[6] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""

                                                        data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x=""

                                                        data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[7]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[7] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[7]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[7] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[7]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[7] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear">0 </td>

                                                @endif





                                                @if (isset($q4y[7]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[7] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[8]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[8] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[8]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[8] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[8]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[8] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[8]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[8] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[9]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[9] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[9]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[9] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[9]))

                                                    <td class="lightBlue thirdYnumber new clear"><span>

                                                            {{ $q3y[9] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[9]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[9] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>



                                    <table class="{{ $data->spiner_count == 4 ? 'gamingBox' : '' }}  finalTableResult" id="finalTableResultData">

                                        {{-- <h3 class="text-center">{{ $board_game_date->team_name_x }}</h3> --}}

                                        {{-- <h3 class="yyy_text">{{ $board_game_date->team_name_y }}</h3> --}}

                                        <thead>



                                        </thead>

                                        @php

                                            $q1x = json_decode($data->q1x);

                                            $q2x = json_decode($data->q2x);

                                            $q3x = json_decode($data->q3x);

                                            $q4x = json_decode($data->q4x);



                                            $q1y = json_decode($data->q1y);

                                            $q2y = json_decode($data->q2y);

                                            $q3y = json_decode($data->q3y);

                                            $q4y = json_decode($data->q4y);

                                        @endphp

                                        <tbody id="finalTableResultDataBody">



                                            {{-- <tr>

                                                <td class="lightGray " style="background: none; border:none" colspan="15">

                                                    <h3>{{ $board_game_date->team_name_x }}</h3>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td class=" yyy_td" style="background: none; border:none" colspan="1"

                                                    rowspan="15">

                                                    <h3 class="yyy_text">{{ $board_game_date->team_name_y }}</h3>

                                                </td>

                                            </tr> --}}

                                            <tr>

                                                <td class="lightYellow" colspan="4">1st</td>

                                                @if (isset($q1x))

                                                    @foreach ($q1x as $item)

                                                        <td class="lightYellow firstXnumber_finalTableResult clear">

                                                            <span>{{ $item }}</span>

                                                        </td>

                                                    @endforeach

                                                @else

                                                    @for ($i = 0; $i < 10; $i++)

                                                        <td class="lightYellow firstXnumber_finalTableResult clear">0</td>

                                                    @endfor

                                                @endif







                                            </tr>



                                            <tr>

                                                <td class="lightYellow" rowspan="3">1st</td>

                                                <td class="orangeColor" colspan="3">2nd</td>

                                                @if (isset($q2x))

                                                    @foreach ($q2x as $item)

                                                        <td class="orangeColor secondXnumber_finalTableResult clear">

                                                            <span>{{ $item }}</span>

                                                        </td>

                                                    @endforeach

                                                @else

                                                    @for ($i = 0; $i < 10; $i++)

                                                        <td class="orangeColor secondXnumber_finalTableResult clear">0</td>

                                                    @endfor

                                                @endif



                                            </tr>

                                            <tr>

                                                <td rowspan="2" class="orangeColor">2nd</td>

                                                <td colspan="2" class="lightBlue">3rd</td>

                                                @if (isset($q3x))

                                                    @foreach ($q3x as $item)

                                                        <td class="lightBlue thirdXnumber_finalTableResult clear">

                                                            <span>{{ $item }}</span>

                                                        </td>

                                                    @endforeach

                                                @else

                                                    @for ($i = 0; $i < 10; $i++)

                                                        <td class="lightBlue thirdXnumber_finalTableResult clear">0</td>

                                                    @endfor

                                                @endif

                                            </tr>



                                            <tr>

                                                <td class="lightBlue">3rd</td>

                                                <td class="blueColor">4th</td>



                                                @if (isset($q4x))

                                                    @foreach ($q4x as $item)

                                                        <td class="blueColor fourthXnumber_finalTableResult clear">

                                                            <span>{{ $item }}</span>

                                                        </td>

                                                    @endforeach

                                                @else

                                                    @for ($i = 0; $i < 10; $i++)

                                                        <td class="blueColor fourthXnumber_finalTableResult clear">0</td>

                                                    @endfor

                                                @endif

                                            </tr>



                                            <tr>

                                                @if (isset($q1y[0]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[0] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[0]))

                                                    <td class="orangeColor  secondYnumber new clear">

                                                        <span>{{ $q2y[0] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear">0</td>

                                                @endif





                                                @if (isset($q3y[0]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[0] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q3y[0]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q3y[0] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear">0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[1]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[1] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear">0</td>

                                                @endif





                                                @if (isset($q2y[1]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[1] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear">0</td>

                                                @endif





                                                @if (isset($q3y[1]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[1] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[1]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[1] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[2]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[2] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q2y[2]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[2] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[2]))

                                                    <td class="lightBlue thirdYnumber new clear"><span>

                                                            {{ $q3y[2] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q4y[2]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[2] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[3]))

                                                    <td class="lightYellow firstYnumber new clear">

                                                        <span>{{ $q1y[3] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q2y[3]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[3] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[3]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[3] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear">0</td>

                                                @endif





                                                @if (isset($q4y[3]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[3] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear">0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[4]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[4] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[4]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[4] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q3y[4]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[4] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[4]))

                                                    <td class="blueColor fourthYnumber new clear"><span>

                                                            {{ $q4y[4] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[5]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[5] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[5]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[5] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[5]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[5] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[5]))

                                                    <td class="blueColor fourthYnumber new clear"><span>

                                                            {{ $q4y[5] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[6]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[6] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[6]))

                                                    <td class="orangeColor secondYnumber new clear"><span>

                                                            {{ $q2y[6] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q3y[6]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[6] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[6]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[6] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[7]))

                                                    <td class="lightYellow firstYnumber new clear"><span>

                                                            {{ $q1y[7] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[7]))

                                                    <td class="orangeColor secondYnumber new clear">

                                                        <span>{{ $q2y[7] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[7]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[7] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear">0 </td>

                                                @endif





                                                @if (isset($q4y[7]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[7] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[8]))

                                                    <td class="lightYellow  firstYnumber new clear"><span>

                                                            {{ $q1y[8] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow  firstYnumber clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[8]))

                                                    <td class="orangeColor secondYnumber new  clear">

                                                        <span>{{ $q2y[8] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber  clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[8]))

                                                    <td class="lightBlue thirdYnumber new clear">

                                                        <span>{{ $q3y[8] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[8]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[8] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber  clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                            <tr>



                                                @if (isset($q1y[9]))

                                                    <td class="lightYellow firstYnumber new  clear">

                                                        <span>{{ $q1y[9] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightYellow firstYnumber  clear"> 0 </td>

                                                @endif





                                                @if (isset($q2y[9]))

                                                    <td class="orangeColor secondYnumber  new clear">

                                                        <span>{{ $q2y[9] }}</span>

                                                    </td>

                                                @else

                                                    <td class="orangeColor secondYnumber  clear"> 0</td>

                                                @endif





                                                @if (isset($q3y[9]))

                                                    <td class="lightBlue thirdYnumber new clear"><span>

                                                            {{ $q3y[9] }}</span>

                                                    </td>

                                                @else

                                                    <td class="lightBlue thirdYnumber clear"> 0</td>

                                                @endif





                                                @if (isset($q4y[9]))

                                                    <td class="blueColor fourthYnumber new clear">

                                                        <span>{{ $q4y[9] }}</span>

                                                    </td>

                                                @else

                                                    <td class="blueColor fourthYnumber clear"> 0</td>

                                                @endif



                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                                <td>

                                                    <label class="gameBox" data-q1-x="" data-q1-y=""

                                                        data-q2-y="" data-q3-y="" data-q4-y="" data-q2-x=""

                                                        data-q3-x="" data-q4-x="">

                                                        <input type="checkbox" value="" class="checkboxSquare">

                                                        <div class="checkMark"></div>

                                                    </label>

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                        {{-- <div class="editBtn py-4">

                            <button type="button" class="btn bg-theme-primary text-white px-5 rounded-pill py-2"

                                disabled data-toggle="modal" id="addButton" data-target="#sessionadd">Publish</button>

                        </div> --}}

                    </form>



                </div>

                <div class="tab-pane fade" id="players" role="tabpanel" aria-labelledby="players-tab">







                    <div>

                        <p class="text-end mb-0 mt-4"> <strong> Total Paid Amount (<span id="totalAmountShow"></span>)

                                <br>

                                <span id="adminAmount"></span></strong></p>

                    </div>

                    <table class="table">

                        <thead>

                            <tr>

                                <th scope="col">Squares {{ $price }}</th>

                                <th scope="col">Team X</th>

                                <th scope="col">Team Y</th>

                                <th scope="col">Alias</th>

                                <th scope="col">Phone #</th>

                                <th scope="col">Email</th>

                                <th scope="col">Squares #</th>

                                <th scope="col">Amount</th>

                                <th scope="col">Paid</th>

                                <th scope="col">Action</th>

                            </tr>

                        </thead>

                        <tbody>



                            @php

                                $count = 1;

                                $paidAmount = [];

                            @endphp

                            

                            @if (count($squareBuyCountUser) > 0)

                                @foreach ($squareBuyCountUser as $keys => $Collection)

                                    @foreach ($Collection as $key => $items)

                                        @foreach ($items as $keyTeamYArr => $teamYData)

                                            @foreach ($teamYData as $keyTeamYName => $teamXArr)

                                                @foreach ($teamXArr as $keyTeamXData => $teamXName)

                                                    @foreach ($teamXName as $teamXName => $dataUsers)

                                                        @foreach ($dataUsers as $users)

                                                            @foreach ($users as $user)

                                                                <div>

                                                                    <tr>

                                                                        <th scope="row">{{ $count++ }}</th>

                                                                        <td>

                                                                            @php

                                                                                if (!empty($keyTeamXData)) {

                                                                                    if (in_array($user->id, json_decode($keyTeamXData))) {

                                                                                        echo $teamXName;

                                                                                    }

                                                                                }

                                                                            @endphp

                                                                        </td>

                                                                        <td>

                                                                            @php

                                                                                if (!empty($keyTeamYArr)) {

                                                                                    if (in_array($user->id, json_decode($keyTeamYArr))) {

                                                                                        echo $keyTeamYName;

                                                                                    }

                                                                                }

                                                                            @endphp

                                                                        </td>

                                                                        <td>{{ $user->alias }}</td>

                                                                        <td>{{ $user->number }}</td>

                                                                        <td>{{ $user->email }}</td>

                                                                        <td>{{ $keys }}</td>

                                                                        <td>{{ $keys * $price }}</td>

                                                                        <td>

                                                                            @if ($key == 1)

                                                                                @php

                                                                                    $paidAmount[] = $keys * $price;

                                                                                @endphp



                                                                                <strong><span

                                                                                        class="text-success">Paid</span></strong>

                                                                            @else

                                                                                <strong><span

                                                                                        class="text-danger">Unpaid</span></strong>

                                                                            @endif

                                                                        </td>

                                                                        <td>

                                                                            <button type="button"

                                                                                class="btn btn-danger"

                                                                                data-toggle="modal"

                                                                                data-target="#exampleModal{{ $user->id }}">Delete</button>

                                                                        </td>

                                                                    </tr>

                                                                </div>



                                                                {{-- Start Delete Modal --}}

                                                                <div class="modal fade"

                                                                    id="exampleModal{{ $user->id }}"

                                                                    tabindex="-1" role="dialog"

                                                                    aria-labelledby="exampleModalLabel"

                                                                    aria-hidden="true">

                                                                    <div class="modal-dialog" role="document">

                                                                        <div class="modal-content">

                                                                            <div class="modal-header">

                                                                                <h5 class="modal-title"

                                                                                    id="exampleModalLabel">

                                                                                    Delete

                                                                                    User

                                                                                </h5>

                                                                                <button type="button" class="close"

                                                                                    data-dismiss="modal"

                                                                                    aria-label="Close">

                                                                                    <span

                                                                                        aria-hidden="true">&times;</span>

                                                                                </button>

                                                                            </div>

                                                                            <div class="modal-body text-center">

                                                                                Are you sure you want to delete this user?

                                                                            </div>

                                                                            <div class="modal-footer">

                                                                                <button type="button"

                                                                                    class="btn btn-secondary"

                                                                                    data-dismiss="modal">Close</button>

                                                                                {{-- @dd($data) --}}

                                                                                <a class="btn btn-danger"

                                                                                    href="{{ route('admin.game.board.destory', ['user_id' => $user->id, 'board_id' => $data->board_id, 'price' => $price]) }}">Delete</a>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                {{-- End Delete Modal --}}

                                                            @endforeach

                                                        @endforeach

                                                    @endforeach

                                                @endforeach

                                            @endforeach

                                        @endforeach

                                    @endforeach

                                @endforeach

                            @else

                                <div>

                                    <tr>

                                        <th class="text-center" colspan="8">No recoards Available</th>

                                    </tr>

                                </div>

                            @endif



                        </tbody>

                    </table>



                </div>



                @php



                    $totalAmount = 0; // Initialize a variable to store the total sum



                    foreach ($paidAmount as $a) {

                        // Convert $a to a numeric value in case it's not already

                        $a = floatval($a);



                        // Add the current value of $a to the totalAmount

                        $totalAmount += $a;

                    }



                @endphp



                <input type="hidden" id="totalAmount" value="{{ $totalAmount }}">



                <div class="tab-pane fade" id="announce" role="tabpanel" aria-labelledby="announce-tab">



                    <section class="our_winners_section">

                        <div class="container">

                            @php



                                if (isset($winningUser->percentage)) {

                                    $percentage = json_decode($winningUser->percentage);

                                }



                                if (isset($winningUser->score)) {

                                    $score = json_decode($winningUser->score);

                                }



                                if (isset($winningUser->winning_number)) {

                                    $winningNumber = json_decode($winningUser->winning_number);

                                }



                                if (isset($winningUser->right_way)) {

                                    $rightWay = json_decode($winningUser->right_way);

                                }



                                if (isset($winningUser->right_way_name)) {

                                    $rightWayName = json_decode($winningUser->right_way_name);

                                }



                                if (isset($winningUser->right_way_price)) {

                                    $rightWayPrice = json_decode($winningUser->right_way_price);

                                }



                                if (isset($winningUser->plus2)) {

                                    $plus2 = json_decode($winningUser->plus2);

                                }



                                if (isset($winningUser->plus2_name)) {

                                    $plus2Name = json_decode($winningUser->plus2_name);

                                }



                                if (isset($winningUser->plus2_price)) {

                                    $plus2Price = json_decode($winningUser->plus2_price);

                                }



                                if (isset($winningUser->wrong_way)) {

                                    $wrongWay = json_decode($winningUser->wrong_way);

                                }



                                if (isset($winningUser->wrong_way_name)) {

                                    $wrongWayName = json_decode($winningUser->wrong_way_name);

                                }



                                if (isset($winningUser->wrong_way_price)) {

                                    $wrongWayPrice = json_decode($winningUser->wrong_way_price);

                                }



                                if (isset($winningUser->minus2)) {

                                    $minus2 = json_decode($winningUser->minus2);

                                }



                                if (isset($winningUser->minus2_name)) {

                                    $minus2Name = json_decode($winningUser->minus2_name);

                                }



                                if (isset($winningUser->minus2_price)) {

                                    $minus2Price = json_decode($winningUser->minus2_price);

                                }



                                $getPercentage = json_decode($getPercentage->percentage);



                            @endphp



                            <div class="row pt-5">

                                <div class="col-md-5 d-none">

                                    <div class="perceantage_table">

                                        <table class="table ">

                                            <thead>

                                                <tr>

                                                    <th scope="col">Qtr.</th>

                                                    <th scope="col">Right <br> Way</th>

                                                    <th scope="col">Wrong <br> Way</th>

                                                    <th scope="col">Plus <br> 2</th>

                                                    <th scope="col">Minus <br> 2</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr>

                                                    <td>

                                                        1st Qtr.

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[0])) value="{{ $percentage[0] }}" @elseif(isset($getPercentage[0])) value="{{ $getPercentage[0] }}" @else  value="9" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[1])) value="{{ $percentage[1] }}"  @elseif(isset($getPercentage[1])) value="{{ $getPercentage[1] }}"@else  value="6" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[2])) value="{{ $percentage[2] }}" @elseif(isset($getPercentage[2])) value="{{ $getPercentage[2] }}" @else  value="3" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[3])) value="{{ $percentage[3] }}" @elseif(isset($getPercentage[3])) value="{{ $getPercentage[3] }}" @else  value="3" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                </tr>



                                                <tr>

                                                    <td>

                                                        2nd Qtr.

                                                    </td>



                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[4])) value="{{ $percentage[4] }}" @elseif(isset($getPercentage[4])) value="{{ $getPercentage[4] }}" @else  value="9" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>



                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[5])) value="{{ $percentage[5] }}" @elseif(isset($getPercentage[5])) value="{{ $getPercentage[5] }}" @else  value="6" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[6])) value="{{ $percentage[6] }}" @elseif(isset($getPercentage[6])) value="{{ $getPercentage[6] }}" @else  value="3" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[7])) value="{{ $percentage[7] }}" @elseif(isset($getPercentage[7])) value="{{ $getPercentage[7] }}" @else  value="3" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                </tr>



                                                <tr>

                                                    <td>

                                                        3rd Qtr.

                                                    </td>



                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[8])) value="{{ $percentage[8] }}" @elseif(isset($getPercentage[8])) value="{{ $getPercentage[8] }}" @else  value="9" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[9])) value="{{ $percentage[9] }}" @elseif(isset($getPercentage[9])) value="{{ $getPercentage[9] }}" @else  value="6" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[10])) value="{{ $percentage[10] }}" @elseif(isset($getPercentage[10])) value="{{ $getPercentage[10] }}" @else  value="3" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[11])) value="{{ $percentage[11] }}" @elseif(isset($getPercentage[11])) value="{{ $getPercentage[11] }}" @else  value="3" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>



                                                </tr>

                                                <tr>

                                                    <td>

                                                        4th Qtr.

                                                    </td>



                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[12])) value="{{ $percentage[12] }}" @elseif(isset($getPercentage[12])) value="{{ $getPercentage[12] }}" @else  value="17" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[13])) value="{{ $percentage[13] }}" @elseif(isset($getPercentage[13])) value="{{ $getPercentage[13] }}" @else  value="12" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[14])) value="{{ $percentage[14] }}" @elseif(isset($getPercentage[14])) value="{{ $getPercentage[14] }}" @else  value="4" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>

                                                    <td>

                                                        <input type="number" class="numericInput"

                                                            @if (isset($percentage[15])) value="{{ $percentage[15] }}" @elseif(isset($getPercentage[15])) value="{{ $getPercentage[15] }}" @else  value="4" @endif

                                                            min="1" max="99"><span>%</span>

                                                        <p class="text-danger errorMessage"></p>

                                                    </td>



                                                </tr>



                                            </tbody>

                                        </table>

                                        <p class="total_count_percent">100%</p>

                                    </div>



                                </div>



                                <div class="col-md-4">

                                    <div class="score_table">

                                        <table class="table ">

                                            <thead>

                                                <tr>

                                                    <th colspan="3">SCORES</th>

                                                </tr>

                                                <tr>

                                                    <th scope="col">{{ $board_game_date->team_name_x }}</th>

                                                    <th scope="col">{{ $board_game_date->team_name_y }}</th>

                                                    <th scope="col">

                                                        @if (isset($winningUser) && $winningUser->status == 1)

                                                            <style>

                                                                .our_winners_section button:disabled {

                                                                    background-color: #19376b;

                                                                }



                                                                .our_winners_section button:disabled::after {

                                                                    content: "Disabled";

                                                                    margin-left: 5px;

                                                                    color: red;

                                                                    background-color: #c1c1c1;

                                                                    border-radius: 20px;

                                                                    padding: 1px;

                                                                    font-weight: bold;

                                                                    /* border: 2px solid #19376b; */

                                                                }

                                                            </style>

                                                        @endif

                                                        <button @if (isset($winningUser) && $winningUser->status == 1) disabled @endif

                                                            id="clear_score_numbers">Clear

                                                            Score</button>

                                                    </th>



                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr>

                                                    <td>

                                                        <input type="number" class="score1 getScore" min="1"

                                                            @if (isset($score[0])) value="{{ $score[0] }}" @endif

                                                            max="2">

                                                    </td>

                                                    <td>

                                                        <input type="number" class="score2 getScore" min="1"

                                                            @if (isset($score[1])) value="{{ $score[1] }}" @endif

                                                            max="2">

                                                    </td>

                                                    <td class="quater_position">1st</td>



                                                </tr>

                                                <tr>

                                                    <td>

                                                        <input type="number" class="score3 getScore" min="1"

                                                            @if (isset($score[2])) value="{{ $score[2] }}" @endif

                                                            max="2">

                                                    </td>

                                                    <td>

                                                        <input type="number" class="score4 getScore" min="1"

                                                            @if (isset($score[3])) value="{{ $score[3] }}" @endif

                                                            max="2">

                                                    </td>

                                                    <td class="quater_position">2nd</td>



                                                </tr>

                                                <tr>

                                                    <td>

                                                        <input type="number" class="score5 getScore" min="1"

                                                            @if (isset($score[4])) value="{{ $score[4] }}" @endif

                                                            max="2">

                                                    </td>

                                                    <td>

                                                        <input type="number" class="score6 getScore" min="1"

                                                            @if (isset($score[5])) value="{{ $score[5] }}" @endif

                                                            max="2">

                                                    </td>

                                                    <td class="quater_position">3rd</td>



                                                </tr>

                                                <tr>

                                                    <td>

                                                        <input type="number" class="score7 getScore" min="1"

                                                            @if (isset($score[6])) value="{{ $score[6] }}" @endif

                                                            max="2">

                                                    </td>

                                                    <td>

                                                        <input type="number" class="score8 getScore" min="1"

                                                            @if (isset($score[7])) value="{{ $score[7] }}" @endif

                                                            max="2">

                                                    </td>

                                                    <td class="quater_position">4th</td>



                                                </tr>



                                            </tbody>

                                        </table>

                                    </div>

                                </div>



                                <div class="col-md-3">

                                    <div class="score_table winning_number">

                                        <table class="table ">

                                            <thead>

                                                <tr>

                                                    <th colspan="3">Winning Number</th>

                                                </tr>

                                                <tr>

                                                    <th scope="col">{{ $board_game_date->team_name_x }}</th>

                                                    <th scope="col">{{ $board_game_date->team_name_y }}</th>

                                                    <th scope="col">Qtr.</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr>

                                                    <td id="first" class="filterWinningNumber">

                                                        @if (isset($winningNumber[0]))

                                                            {{ $winningNumber[0] }}

                                                        @endif

                                                    </td>

                                                    <td id="second" class="filterWinningNumber">

                                                        @if (isset($winningNumber[1]))

                                                            {{ $winningNumber[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="quater_position">1st</td>

                                                </tr>

                                                <tr>

                                                    <td id="third" class="filterWinningNumber">

                                                        @if (isset($winningNumber[2]))

                                                            {{ $winningNumber[2] }}

                                                        @endif

                                                    </td>

                                                    <td id="fourth" class="filterWinningNumber">

                                                        @if (isset($winningNumber[3]))

                                                            {{ $winningNumber[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="quater_position">2nd</td>

                                                </tr>

                                                <tr>

                                                    <td id="fifth" class="filterWinningNumber">

                                                        @if (isset($winningNumber[4]))

                                                            {{ $winningNumber[4] }}

                                                        @endif

                                                    </td>

                                                    <td id="sixth" class="filterWinningNumber">

                                                        @if (isset($winningNumber[5]))

                                                            {{ $winningNumber[5] }}

                                                        @endif

                                                    </td>

                                                    <td class="quater_position">3rd</td>

                                                </tr>

                                                <tr>

                                                    <td id="seventh" class="filterWinningNumber">

                                                        @if (isset($winningNumber[6]))

                                                            {{ $winningNumber[6] }}

                                                        @endif

                                                    </td>

                                                    <td id="eighth" class="filterWinningNumber">

                                                        @if (isset($winningNumber[7]))

                                                            {{ $winningNumber[7] }}

                                                        @endif

                                                    </td>

                                                    <td class="quater_position">4th</td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>



                            </div>



                            <div class="row py-5">



                                <div class="col-md-6">

                                    <div class="win_show_table">

                                        <table class="table table-bordered">

                                            <thead>



                                            </thead>

                                            <tbody>

                                                <tr>

                                                    <td colspan="2" rowspan="2" class="lightBlueColor">

                                                        ${{ $data->price }} <br>

                                                        Square</td>

                                                    <td colspan="2" class="ligthYellColor">Right way</td>

                                                    <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>

                                                    <td rowspan="2" class="greenColor">Winner</td>

                                                </tr>

                                                <tr>



                                                    <td class="ligthYellColor">{{ $board_game_date->team_name_x }}</td>

                                                    <td class="ligthYellColor">{{ $board_game_date->team_name_y }}</td>



                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">1st. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr rightWayWinner"

                                                        id="rightWayFirst">

                                                        @if (isset($rightWay[0]))

                                                            {{ $rightWay[0] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr rightWayWinner"

                                                        id="rightWayFirst2">

                                                        @if (isset($rightWay[1]))

                                                            {{ $rightWay[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink rightWayWinnerAmount" id="rightWayFirstAmount">

                                                        @if (isset($rightWayPrice[0]))

                                                            {{ $rightWayPrice[0] }}

                                                        @endif

                                                    </td>



                                                    <td class="light_lightGreen gernal_qtr" id="1strightWayWinnerName">





                                                        @if (isset($userAliasArr['rightWayUser']))

                                                            @if ($userAliasArr['rightWayUser'][0] != 'null')

                                                                {{ $userAliasArr['rightWayUser'][0]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                    </td>



                                                    <input type="hidden"

                                                        @if (isset($userAliasArr['rightWayUser'])) @if ($userAliasArr['rightWayUser'][0] != 'null')

                                                        value="{{ $userAliasArr['rightWayUser'][0]['id'] }}"

                                                        @else

                                                        value="" @endif

                                                        @endif

                                                    class="rightWayWinnerId" id="1strightWayWinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">2nd. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr rightWayWinner"

                                                        id="rightWaySecond">

                                                        @if (isset($rightWay[2]))

                                                            {{ $rightWay[2] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr rightWayWinner"

                                                        id="rightWaySecond2">

                                                        @if (isset($rightWay[3]))

                                                            {{ $rightWay[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink rightWayWinnerAmount"

                                                        id="rightWaySecondAmount">

                                                        @if (isset($rightWayPrice[1]))

                                                            {{ $rightWayPrice[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr rightWayWinnerName"

                                                        id="2ndrightWayWinnerName">





                                                        @if (isset($userAliasArr['rightWayUser']))

                                                            @if ($userAliasArr['rightWayUser'][1] != 'null')

                                                                {{ $userAliasArr['rightWayUser'][1]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['rightWayUser']))

                                                            {{ $userAliasArr['rightWayUser'][1]['alias'] }}

                                                        @endif --}}



                                                    </td>

                                                    <input type="hidden"

                                                        @if (isset($userAliasArr['rightWayUser'])) @if ($userAliasArr['rightWayUser'][1] != 'null')

                                                    value="{{ $userAliasArr['rightWayUser'][1]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    class="rightWayWinnerId" id="2ndrightWayWinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">3rd. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr rightWayWinner"

                                                        id="rightWayThird">

                                                        @if (isset($rightWay[4]))

                                                            {{ $rightWay[4] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr rightWayWinner"

                                                        id="rightWayThird2">

                                                        @if (isset($rightWay[5]))

                                                            {{ $rightWay[5] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink rightWayWinnerAmount" id="rightWayThirdAmount">

                                                        @if (isset($rightWayPrice[2]))

                                                            {{ $rightWayPrice[2] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr rightWayWinnerName"

                                                        id="3rdrightWayWinnerName">



                                                        @if (isset($userAliasArr['rightWayUser']))

                                                            @if ($userAliasArr['rightWayUser'][2] != 'null')

                                                                {{ $userAliasArr['rightWayUser'][2]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['rightWayUser']))

                                                            {{ $userAliasArr['rightWayUser'][2]['alias'] }}

                                                        @endif --}}



                                                    </td>

                                                    <input type="hidden" class="rightWayWinnerId"

                                                        @if (isset($userAliasArr['rightWayUser'])) @if ($userAliasArr['rightWayUser'][1] != 'null')

                                                    value="{{ $userAliasArr['rightWayUser'][1]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="3rdrightWayWinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">4th. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr rightWayWinner"

                                                        id="rightWayFourth">

                                                        @if (isset($rightWay[6]))

                                                            {{ $rightWay[6] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr rightWayWinner"

                                                        id="rightWayFourth2">

                                                        @if (isset($rightWay[7]))

                                                            {{ $rightWay[7] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink rightWayWinnerAmount"

                                                        id="rightWayFourthAmount">

                                                        @if (isset($rightWayPrice[3]))

                                                            {{ $rightWayPrice[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr rightWayWinnerName"

                                                        id="4thrightWayWinnerName">



                                                        @if (isset($userAliasArr['rightWayUser']))

                                                            @if ($userAliasArr['rightWayUser'][3] != 'null')

                                                                {{ $userAliasArr['rightWayUser'][3]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['rightWayUser']))

                                                            {{ $userAliasArr['rightWayUser'][3]['alias'] }}

                                                        @endif --}}



                                                    </td>

                                                    <input type="hidden" class="rightWayWinnerId"

                                                        @if (isset($userAliasArr['rightWayUser'])) @if ($userAliasArr['rightWayUser'][2] != 'null')

                                                    value="{{ $userAliasArr['rightWayUser'][2]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="4thrightWayWinnerId">

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

                                                        ${{ $data->price }} <br>

                                                        Square</td>

                                                    <td colspan="2" class="ligthYellColor">Plus 2</td>

                                                    <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>

                                                    <td rowspan="2" class="greenColor">Winner</td>

                                                </tr>

                                                <tr>



                                                    <td class="ligthYellColor">{{ $board_game_date->team_name_x }}</td>

                                                    <td class="ligthYellColor">{{ $board_game_date->team_name_y }}</td>



                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">1st. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr plus2WayWinner"

                                                        id="rightWayFirstPlus">

                                                        @if (isset($plus2[0]))

                                                            {{ $plus2[0] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr plus2WayWinner"

                                                        id="rightWayFirst2Plus">

                                                        @if (isset($plus2[1]))

                                                            {{ $plus2[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink plus2WinnerAmount"

                                                        id="rightWayFirstPlusAmount">

                                                        @if (isset($plus2Price[0]))

                                                            {{ $plus2Price[0] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr plus2WinnerName"

                                                        id="1stplus2WinnerName">

                                                        @if (isset($userAliasArr['plus2User']))

                                                            @if ($userAliasArr['plus2User'][0] != 'null')

                                                                {{ $userAliasArr['plus2User'][0]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['plus2User']))

                                                            {{ $userAliasArr['plus2User'][0]['alias'] }}

                                                        @endif --}}



                                                    </td>

                                                    <input type="hidden" class="plus2WinnerId"

                                                        @if (isset($userAliasArr['plus2User'])) @if ($userAliasArr['plus2User'][0] != 'null')

                                                    value="{{ $userAliasArr['plus2User'][0]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="1stplus2WinnerId">

                                                </tr>



                                                <tr>

                                                    <td colspan="2" class="lightGreen">2nd. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr plus2WayWinner"

                                                        id="rightWaySecondPlus">

                                                        @if (isset($plus2[2]))

                                                            {{ $plus2[2] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr plus2WayWinner"

                                                        id="rightWaySecond2Plus">

                                                        @if (isset($plus2[3]))

                                                            {{ $plus2[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink plus2WinnerAmount"

                                                        id="rightWaySecondPlusAmount">

                                                        @if (isset($plus2Price[1]))

                                                            {{ $plus2Price[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr plus2WinnerName"

                                                        id="2ndplus2WinnerName">



                                                        @if (isset($userAliasArr['plus2User']))

                                                            @if ($userAliasArr['plus2User'][1] != 'null')

                                                                {{ $userAliasArr['plus2User'][1]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['plus2User']))

                                                            {{ $userAliasArr['plus2User'][1]['alias'] }}

                                                        @endif --}}



                                                    </td>

                                                    <input type="hidden" class="plus2WinnerId"

                                                        @if (isset($userAliasArr['plus2User'])) @if ($userAliasArr['plus2User'][1] != 'null')

                                                    value="{{ $userAliasArr['plus2User'][1]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="2ndplus2WinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">3rd. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr plus2WayWinner"

                                                        id="rightWayThirdPlus">

                                                        @if (isset($plus2[4]))

                                                            {{ $plus2[4] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr plus2WayWinner"

                                                        id="rightWayThird2Plus">

                                                        @if (isset($plus2[5]))

                                                            {{ $plus2[5] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink plus2WinnerAmount"

                                                        id="rightWayThirdPlusAmount">

                                                        @if (isset($plus2Price[2]))

                                                            {{ $plus2Price[2] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr plus2WinnerName"

                                                        id="3rdplus2WinnerName">

                                                        @if (isset($userAliasArr['plus2User']))

                                                            @if ($userAliasArr['plus2User'][2] != 'null')

                                                                {{ $userAliasArr['plus2User'][2]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['plus2User']))

                                                            {{ $userAliasArr['plus2User'][2]['alias'] }}

                                                        @endif --}}

                                                    </td>

                                                    <input type="hidden" class="plus2WinnerId"

                                                        @if (isset($userAliasArr['plus2User'])) @if ($userAliasArr['plus2User'][2] != 'null')

                                                    value="{{ $userAliasArr['plus2User'][2]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="3rdplus2WinnerId">

                                                </tr>



                                                <tr>

                                                    <td colspan="2" class="lightGreen">4th. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr plus2WayWinner"

                                                        id="rightWayFourthPlus">

                                                        @if (isset($plus2[6]))

                                                            {{ $plus2[6] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr plus2WayWinner"

                                                        id="rightWayFourth2Plus">

                                                        @if (isset($plus2[7]))

                                                            {{ $plus2[7] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink plus2WinnerAmount"

                                                        id="rightWayFourthPlusAmount">

                                                        @if (isset($plus2Price[3]))

                                                            {{ $plus2Price[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr plus2WinnerName"

                                                        id="4thplus2WinnerName">

                                                        @if (isset($userAliasArr['plus2User']))

                                                            @if ($userAliasArr['plus2User'][3] != 'null')

                                                                {{ $userAliasArr['plus2User'][3]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['plus2User']))

                                                            {{ $userAliasArr['plus2User'][3]['alias'] }}

                                                        @endif --}}

                                                    </td>

                                                    <input type="hidden" class="plus2WinnerId"

                                                        @if (isset($userAliasArr['plus2User'])) @if ($userAliasArr['plus2User'][3] != 'null')

                                                    value="{{ $userAliasArr['plus2User'][3]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="4thplus2WinnerId">

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

                                                        ${{ $data->price }} <br>

                                                        Square</td>

                                                    <td colspan="2" class="ligthYellColor">Wrong way</td>

                                                    <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>

                                                    <td rowspan="2" class="greenColor">Winner</td>

                                                </tr>

                                                <tr>



                                                    <td class="ligthYellColor">{{ $board_game_date->team_name_x }}</td>

                                                    <td class="ligthYellColor">{{ $board_game_date->team_name_y }}</td>



                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">1st. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr wrongWayWinner"

                                                        id="wrongWayFirst">

                                                        @if (isset($wrongWay[0]))

                                                            {{ $wrongWay[0] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr wrongWayWinner"

                                                        id="wrongWayFirst2">

                                                        @if (isset($wrongWay[1]))

                                                            {{ $wrongWay[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink wrongWayWinnerAmount" id="wrongWayFirstAmount">

                                                        @if (isset($wrongWayPrice[0]))

                                                            {{ $wrongWayPrice[0] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr wrongWayWinnerName"

                                                        id="1stwrongWayWinnerName">



                                                        @if (isset($userAliasArr['wrongWayUser']))

                                                            @if ($userAliasArr['wrongWayUser'][0] != 'null')

                                                                {{ $userAliasArr['wrongWayUser'][0]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['wrongWayUser']))

                                                            {{ $userAliasArr['wrongWayUser'][0]['alias'] }}

                                                        @endif --}}



                                                    </td>

                                                    <input type="hidden" class="wrongWayWinnerId"

                                                        @if (isset($userAliasArr['wrongWayUser'])) @if ($userAliasArr['wrongWayUser'][0] != 'null')

                                                    value="{{ $userAliasArr['wrongWayUser'][0]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="1stwrongWayWinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">2nd. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr wrongWayWinner"

                                                        id="wrongWaySecond">

                                                        @if (isset($wrongWay[2]))

                                                            {{ $wrongWay[2] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr wrongWayWinner"

                                                        id="wrongWaySecond2">

                                                        @if (isset($wrongWay[3]))

                                                            {{ $wrongWay[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink wrongWayWinnerAmount"

                                                        id="wrongWaySecondAmount">

                                                        @if (isset($wrongWayPrice[1]))

                                                            {{ $wrongWayPrice[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr wrongWayWinnerName"

                                                        id="2ndwrongWayWinnerName">

                                                        @if (isset($userAliasArr['wrongWayUser']))

                                                            @if ($userAliasArr['wrongWayUser'][1] != 'null')

                                                                {{ $userAliasArr['wrongWayUser'][1]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['wrongWayUser']))

                                                            {{ $userAliasArr['wrongWayUser'][1]['alias'] }}

                                                        @endif --}}



                                                    </td>

                                                    <input type="hidden" class="wrongWayWinnerId"

                                                        @if (isset($userAliasArr['wrongWayUser'])) @if ($userAliasArr['wrongWayUser'][1] != 'null')

                                                    value="{{ $userAliasArr['wrongWayUser'][1]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="2ndwrongWayWinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">3rd. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr wrongWayWinner"

                                                        id="wrongWayThird">

                                                        @if (isset($wrongWay[4]))

                                                            {{ $wrongWay[4] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr wrongWayWinner"

                                                        id="wrongWayThird2">

                                                        @if (isset($wrongWay[5]))

                                                            {{ $wrongWay[5] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink wrongWayWinnerAmount" id="wrongWayThirdAmount">

                                                        @if (isset($wrongWayPrice[2]))

                                                            {{ $wrongWayPrice[2] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr wrongWayWinnerName"

                                                        id="3rdwrongWayWinnerName">

                                                        @if (isset($userAliasArr['wrongWayUser']))

                                                            @if ($userAliasArr['wrongWayUser'][2] != 'null')

                                                                {{ $userAliasArr['wrongWayUser'][2]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['wrongWayUser']))

                                                            {{ $userAliasArr['wrongWayUser'][2]['alias'] }}

                                                        @endif --}}

                                                    </td>

                                                    <input type="hidden" class="wrongWayWinnerId"

                                                        @if (isset($userAliasArr['wrongWayUser'])) @if ($userAliasArr['wrongWayUser'][2] != 'null')

                                                    value="{{ $userAliasArr['wrongWayUser'][2]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="3rdwrongWayWinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">4th. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr wrongWayWinner"

                                                        id="wrongWayFourth">

                                                        @if (isset($wrongWay[6]))

                                                            {{ $wrongWay[6] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr wrongWayWinner"

                                                        id="wrongWayFourth2">

                                                        @if (isset($wrongWay[7]))

                                                            {{ $wrongWay[7] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink wrongWayWinnerAmount"

                                                        id="wrongWayFourthAmount">

                                                        @if (isset($wrongWayPrice[3]))

                                                            {{ $wrongWayPrice[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr wrongWayWinnerName"

                                                        id="4thwrongWayWinnerName">

                                                        @if (isset($userAliasArr['wrongWayUser']))

                                                            @if ($userAliasArr['wrongWayUser'][3] != 'null')

                                                                {{ $userAliasArr['wrongWayUser'][3]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['wrongWayUser']))

                                                            {{ $userAliasArr['wrongWayUser'][3]['alias'] }}

                                                        @endif --}}

                                                    </td>

                                                    <input type="hidden" class="wrongWayWinnerId"

                                                        @if (isset($userAliasArr['wrongWayUser'])) @if ($userAliasArr['wrongWayUser'][3] != 'null')

                                                    value="{{ $userAliasArr['wrongWayUser'][3]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="4thwrongWayWinnerId">

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

                                                        ${{ $data->price }} <br>

                                                        Square</td>

                                                    <td colspan="2" class="ligthYellColor">Minus 2</td>

                                                    <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>

                                                    <td rowspan="2" class="greenColor">Winner</td>

                                                </tr>

                                                <tr>



                                                    <td class="ligthYellColor">{{ $board_game_date->team_name_x }}</td>

                                                    <td class="ligthYellColor">{{ $board_game_date->team_name_y }}</td>



                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">1st. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr minus2WayWinner"

                                                        id="rightWayFirstMinus">

                                                        @if (isset($minus2[0]))

                                                            {{ $minus2[0] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr minus2WayWinner"

                                                        id="rightWayFirst2Minus">

                                                        @if (isset($minus2[1]))

                                                            {{ $minus2[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink minus2WinnerAmount"

                                                        id="rightWayFirstMinusAmount">

                                                        @if (isset($minus2Price[0]))

                                                            {{ $minus2Price[0] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr minus2WinnerName"

                                                        id="1stminus2WinnerName">

                                                        @if (isset($userAliasArr['minus2User']))

                                                            @if ($userAliasArr['minus2User'][0] != 'null')

                                                                {{ $userAliasArr['minus2User'][0]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['minus2User']))

                                                            {{ $userAliasArr['minus2User'][0]['alias'] }}

                                                        @endif --}}

                                                    </td>

                                                    <input type="hidden" class="minus2WinnerId"

                                                        @if (isset($userAliasArr['minus2User'])) @if ($userAliasArr['minus2User'][0] != 'null')

                                                    value="{{ $userAliasArr['minus2User'][0]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="1stminus2WinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">2nd. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr minus2WayWinner"

                                                        id="rightWaySecondMinus">

                                                        @if (isset($minus2[2]))

                                                            {{ $minus2[2] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr minus2WayWinner"

                                                        id="rightWaySecond2Minus">

                                                        @if (isset($minus2[3]))

                                                            {{ $minus2[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink minus2WinnerAmount"

                                                        id="rightWaySecondMinusAmount">

                                                        @if (isset($minus2Price[1]))

                                                            {{ $minus2Price[1] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr minus2WinnerName"

                                                        id="2ndminus2WinnerName">

                                                        @if (isset($userAliasArr['minus2User']))

                                                            @if ($userAliasArr['minus2User'][1] != 'null')

                                                                {{ $userAliasArr['minus2User'][1]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['minus2User']))

                                                            {{ $userAliasArr['minus2User'][1]['alias'] }}

                                                        @endif --}}

                                                    </td>

                                                    <input type="hidden" class="minus2WinnerId"

                                                        @if (isset($userAliasArr['minus2User'])) @if ($userAliasArr['minus2User'][1] != 'null')

                                                    value="{{ $userAliasArr['minus2User'][1]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="2ndminus2WinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">3rd. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr minus2WayWinner"

                                                        id="rightWayThirdMinus">

                                                        @if (isset($minus2[4]))

                                                            {{ $minus2[4] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr minus2WayWinner"

                                                        id="rightWayThird2Minus">

                                                        @if (isset($minus2[5]))

                                                            {{ $minus2[5] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink minus2WinnerAmount"

                                                        id="rightWayThirdMinusAmount">

                                                        @if (isset($minus2Price[2]))

                                                            {{ $minus2Price[2] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr minus2WinnerName"

                                                        id="3rdminus2WinnerName">

                                                        @if (isset($userAliasArr['minus2User']))

                                                            @if ($userAliasArr['minus2User'][2] != 'null')

                                                                {{ $userAliasArr['minus2User'][2]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['minus2User']))

                                                            {{ $userAliasArr['minus2User'][2]['alias'] }}

                                                        @endif --}}

                                                    </td>

                                                    <input type="hidden" class="minus2WinnerId"

                                                        @if (isset($userAliasArr['minus2User'])) @if ($userAliasArr['minus2User'][2] != 'null')

                                                    value="{{ $userAliasArr['minus2User'][2]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="3rdminus2WinnerId">

                                                </tr>

                                                <tr>

                                                    <td colspan="2" class="lightGreen">4th. Qtr.</td>

                                                    <td class="ligthYellColor gernal_qtr minus2WayWinner"

                                                        id="rightWayFourthMinus">

                                                        @if (isset($minus2[6]))

                                                            {{ $minus2[6] }}

                                                        @endif

                                                    </td>

                                                    <td class="ligthYellColor gernal_qtr minus2WayWinner"

                                                        id="rightWayFourth2Minus">

                                                        @if (isset($minus2[7]))

                                                            {{ $minus2[7] }}

                                                        @endif

                                                    </td>

                                                    <td class="lightPink minus2WinnerAmount"

                                                        id="rightWayFourthMinusAmount">

                                                        @if (isset($minus2Price[3]))

                                                            {{ $minus2Price[3] }}

                                                        @endif

                                                    </td>

                                                    <td class="light_lightGreen gernal_qtr minus2WinnerName"

                                                        id="4thminus2WinnerName">

                                                        @if (isset($userAliasArr['minus2User']))

                                                            @if ($userAliasArr['minus2User'][3] != 'null')

                                                                {{ $userAliasArr['minus2User'][3]['alias'] }}

                                                            @else

                                                                null

                                                            @endif

                                                        @endif



                                                        {{-- @if (isset($userAliasArr['minus2User']))

                                                            {{ $userAliasArr['minus2User'][3]['alias'] }}

                                                        @endif --}}

                                                    </td>

                                                    <input type="hidden" class="minus2WinnerId"

                                                        @if (isset($userAliasArr['minus2User'])) @if ($userAliasArr['minus2User'][3] != 'null')

                                                    value="{{ $userAliasArr['minus2User'][3]['id'] }}"

                                                    @else

                                                    value="" @endif

                                                        @endif

                                                    id="4thminus2WinnerId">

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>



                            </div>



                            <button type="button" @if (isset($winningUser) && $winningUser->status == 1) disabled @endif

                                class="btn btn-primary" id="saveWinnerData">Announce

                                Winner</button>

                        </div>

                    </section>



                </div>

            </div>





        </div>

    </div>



    </div>

@endsection



@push('js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $( function() {
        $( document ).tooltip();
    } );
    </script>

    <script>

        

        finalTableHtml = '';



        var specialCount = parseInt("{{ $data->spiner_count }}");



        

        var spin_numbers = parseInt("{{ $data->spin_numbers }}");







        $(document).ready(function() {


            $('#theclearBtn').click(function(e){
                e.preventDefault();

                var url = "{{ route('admin.game.board.spinerUpdate') }}";



                var randomNumber = random_item(items);

                var data = {

                    '_token': "{{ csrf_token() }}",

                    'id': "{{ $id }}",

                    'random_number' : 0,

                    'type' : 'randomNumber',

                };



                let Res = AjaxRequest(url, data);



                console.log(Res);

                $('#spinNumberCount').text('Spin Count: ' + 0);
                $('#spinNumberCount2').text(0);

                $('#countSpin').text('Spiner 0');

                spin_numbers = 0;
                specialCount = 0;

            });


            $('.SpinsNumber').click(function(){


                if(specialCount > 0){
                    return;
                }


                function random_item(items)

                {

                    return items[Math.floor(Math.random()*items.length)];

                }



                var items = [1,2,3,4];

                // console.log(random_item(items));



                var url = "{{ route('admin.game.board.spinerUpdate') }}";



                    var randomNumber = random_item(items);

                    var data = {

                        '_token': "{{ csrf_token() }}",

                        'id': "{{ $id }}",

                        'random_number' : randomNumber,

                        'type' : 'randomNumber',

                    };



                    let Res = AjaxRequest(url, data);



                    console.log(Res);

                    $('#spinNumberCount').text('Spin Count: ' + randomNumber);
                    
                    $('#spinNumberCount2').text(randomNumber);


                    $('#countSpin').text('Spiner 0');

                    spin_numbers = randomNumber;

                    

                    specialCount = 0;

                    // $('#spiner').attr('disabled', false);



            });



            if (specialCount <= spin_numbers) {

                $('.finalTableResult').hide();

                $('#addButton').attr('disabled', true);



                $('.spinTable').show();

            } else {

                $('.spinTable').hide();



                $('.finalTableResult').show();

                $('#addButton').removeAttr('disabled', true);



                // $('.new span, .firstXnumber span, .secondXnumber span, .thirdXnumber span, .fourthXnumber span')

                //     .css('visibility', 'visible');



            }



            $('#spiner').click(function() {



                if (specialCount <= (spin_numbers - 1)) {

                    generateRandomNumbers('firstXnumber', 'firstYnumber')

                    generateRandomNumbers('secondXnumber', 'secondYnumber')

                    generateRandomNumbers('thirdXnumber', 'thirdYnumber')

                    generateRandomNumbers('fourthXnumber', 'fourthYnumber')



                    $('#countSpin span').text(specialCount++);



                    var url = "{{ route('admin.game.board.spinerUpdate') }}";



                    var data = {

                        '_token': "{{ csrf_token() }}",

                        'id': "{{ $id }}",

                        'count': specialCount,

                    };



                    let Res = AjaxRequest(url, data);

                    console.log(Res);

                    if (Res.status == true) {

                        console.log(Res.data);

                        if (Res.data == spin_numbers) {



               

                            $('#countSpin span').text(Res.data);

                            

                            $('.spinTable').hide();



                            $('.finalTableResult').show();

                            $('.finalTableResult').addClass('gamingBox');



                            $('#addButton').removeAttr('disabled', true);





                            $('.spinTable').hide();



                            $('#finalTableResultDataBody').html(finalTableHtml);





                            jQuery('.finalTableResult .gameBox').each(function() {



                                // first y quard 

                                let verticalFirstCordinates = jQuery(this).parents('tr').find('.firstYnumber_finalTableResult').text();

                                jQuery(this).attr('data-q1-y', verticalFirstCordinates);



                                // second y quard 

                                let verticalSecondCordinates = jQuery(this).parents('tr').find('.secondYnumber_finalTableResult').text();

                                jQuery(this).attr('data-q2-y', verticalSecondCordinates);



                                // third y quard

                                let verticalThirdCordinates = jQuery(this).parents('tr').find('.thirdYnumber_finalTableResult').text();

                                jQuery(this).attr('data-q3-y', verticalThirdCordinates);



                                // fourth y quard

                                let verticalFourthCordinates = jQuery(this).parents('tr').find('.fourthYnumber_finalTableResult').text();

                                jQuery(this).attr('data-q4-y', verticalFourthCordinates);



                            });



                            $('.finalTableResult .firstYnumber  span').css('visibility','visible')

                            $('.finalTableResult .secondYnumber   span').css('visibility','visible')

                            $('.finalTableResult .thirdYnumber   span').css('visibility','visible')

                            $('.finalTableResult .fourthYnumber  span').css('visibility','visible')



                            $('.SpinsNumber').prop('disabled', true);

                            $('.clearBtn').prop('disabled', true);



                        }



                    }

                    return Res;



                } 

                // else {

                //     $('.spinTable').hide();



                //     $('.finalTableResult').show();

                // }









            });

            // new 





            var totalAmount = $('#totalAmount').val();

            $('#totalAmountShow').text(totalAmount);





            $('.numericInput').on('input', function() {

                const maxLength = 2;

                const $errorMessage = $(this).siblings('.errorMessage');



                if ($(this).val().length > maxLength) {

                    $(this).val($(this).val().slice(0, maxLength));

                    $errorMessage.text('Maximum length exceeded');

                } else {

                    $errorMessage.text('');

                }

            });





            jQuery('#clear_score_numbers').click(function() {

                jQuery('.score_table input[type=number]').each(function() {

                    jQuery(this).val('');



                    $('#first , #second , #third , #fourth , #fifth , #sixth , #seventh , #eighth')

                        .text('');

                });



                jQuery('.win_show_table tr').each(function() {

                    var $table = $(this).find('.gernal_qtr');

                    var $gernal_qtr_rows = $table.text('');

                });



            });



            // plus function 

            function plusVal(val) {

                var plusValue = parseInt(val) + 2;

                if (plusValue == 10) {

                    plusValue = 0;

                } else if (plusValue == 11) {

                    plusValue = 1;

                }

                return plusValue;

            }



            // minus function 

            function minusVal(val) {

                var minusValue = parseInt(val) - 2;



                if (Math.abs(minusValue) == 1) {

                    minusValue = 9;

                } else if (minusValue < 0) {

                    minusValue = 8;

                }



                if (minusValue > 9) {

                    minusValue = 0 - 1;

                }

                return minusValue;

            }



            // ajax function 

            function AjaxRequestFun(plusVal, plusVal2, minusVal, minusVal2, val1, val2, url) {

                var data = {

                    'board_id': "{{ $data->board_id }}",

                    'price': "{{ $data->price }}",

                    'part': "{{ $data->part }}",

                    'firstValuePlus': plusVal,

                    'secondValuePlus': plusVal2,

                    'firstValueMinus': minusVal,

                    'secondValueMinus': minusVal2,

                    'first': val1,

                    'second': val2,

                    '_token': "{{ csrf_token() }}",

                }

                let Res = AjaxRequest(url, data);

                return Res;

            }





            // first start

            jQuery(".score1").change(function() {

                let val = jQuery(this).val();



                updateFirstWinningNumbers(val);

            });



            function updateFirstWinningNumbers(val) {

                let num = val;

                let str = num.toString();

                let array = str.split('');

                let lastCharacter = array.pop();



                jQuery('#first').text(lastCharacter);



                let firstValue = $('#first').text();



                var firstValuePlus = plusVal(firstValue);

                var firstValueMinus = minusVal(firstValue);



                let secondValue = $('#second').text();

                let secondValuePlus = plusVal(secondValue);

                var secondValueMinus = minusVal(secondValue);



                $('#rightWayFirst').text(lastCharacter);

                $('#rightWayFirst2').text();

                $('#rightWayFirstPlus').text(firstValuePlus);

                $('#rightWayFirst2Plus').text();

                $('#wrongWayFirst').text();

                $('#wrongWayFirst2').text(lastCharacter);

                $('#rightWayFirstMinus').text(firstValueMinus);

                $('#rightWayFirst2Minus').text();



                var url = "{{ route('admin.set_winner_first.show') }}";



                let firstRes = AjaxRequestFun(firstValuePlus, secondValuePlus, firstValueMinus, secondValueMinus,

                    firstValue, secondValue, url);



                $('#1strightWayWinnerName').text(firstRes.data.rightWay.user.alias);

                $('#1strightWayWinnerId').val(firstRes.data.rightWay.user.id);



                $('#1stplus2WinnerName').text(firstRes.data.plus2.user.alias);

                $('#1stplus2WinnerId').val(firstRes.data.plus2.user.id);



                $('#1stwrongWayWinnerName').text(firstRes.data.wrongWay.user.alias);

                $('#1stwrongWayWinnerId').val(firstRes.data.wrongWay.user.id);



                $('#1stminus2WinnerName').text(firstRes.data.minus2.user.alias);

                $('#1stminus2WinnerId').val(firstRes.data.minus2.user.id);

            }

            // first end



            // second start

            jQuery(".score2").change(function() {

                let val = jQuery(this).val();



                updateSecondWinningNumbers(val);

            });



            function updateSecondWinningNumbers(val) {

                let num = val;

                let str = num.toString();

                let array = str.split('');

                let lastCharacter = array.pop();

                jQuery('#second').text(lastCharacter);





                let firstValue = $('#first').text();

                let firstValuePlus = plusVal(firstValue);



                let secondValue = $('#second').text();

                let secondValuePlus = plusVal(secondValue);



                var firstValueMinus = minusVal(firstValue);

                var secondValueMinus = minusVal(secondValue);





                $('#rightWayFirst').text(firstValue);

                $('#rightWayFirst2').text(secondValue);

                $('#rightWayFirstPlus').text(firstValuePlus);

                $('#rightWayFirst2Plus').text(secondValuePlus);

                $('#wrongWayFirst').text(secondValue);

                $('#wrongWayFirst2').text(firstValue);

                $('#rightWayFirstMinus').text(firstValueMinus);

                $('#rightWayFirst2Minus').text(secondValueMinus);



                var url = "{{ route('admin.set_winner_first.show') }}";



                let firstRes = AjaxRequestFun(firstValuePlus, secondValuePlus, firstValueMinus, secondValueMinus,

                    firstValue, secondValue, url);



                $('#1strightWayWinnerName').text(firstRes.data.rightWay.user.alias);

                $('#1strightWayWinnerId').val(firstRes.data.rightWay.user.id);



                $('#1stplus2WinnerName').text(firstRes.data.plus2.user.alias);

                $('#1stplus2WinnerId').val(firstRes.data.plus2.user.id);



                $('#1stwrongWayWinnerName').text(firstRes.data.wrongWay.user.alias);

                $('#1stwrongWayWinnerId').val(firstRes.data.wrongWay.user.id);



                $('#1stminus2WinnerName').text(firstRes.data.minus2.user.alias);

                $('#1stminus2WinnerId').val(firstRes.data.minus2.user.id);



            }



            // second end



            // third start

            jQuery(".score3").change(function() {

                let val = jQuery(this).val();



                updateThirdWinningNumbers(val);

            });



            function updateThirdWinningNumbers(val) {

                let num = val;

                let str = num.toString();

                let array = str.split('');

                let lastCharacter = array.pop();

                jQuery('#third').text(lastCharacter);





                let firstValue = $('#third').text();



                var firstValuePlus = plusVal(firstValue);

                var firstValueMinus = minusVal(firstValue);



                let secondValue = $('#fourth').text();

                let secondValuePlus = plusVal(secondValue);

                var secondValueMinus = minusVal(secondValue);





                $('#rightWaySecond').text(lastCharacter);

                $('#rightWaySecond2').text();

                $('#rightWaySecondPlus').text(firstValuePlus);

                $('#rightWaySecond2Plus').text();

                $('#wrongWaySecond').text();

                $('#wrongWaySecond2').text(lastCharacter);

                $('#rightWaySecondMinus').text(firstValueMinus);

                $('#rightWaySecond2Minus').text();





                var url = "{{ route('admin.set_winner_second.show') }}";



                let firstRes = AjaxRequestFun(firstValuePlus, secondValuePlus, firstValueMinus, secondValueMinus,

                    firstValue, secondValue, url);



                $('#2ndrightWayWinnerName').text(firstRes.data.rightWay.user.alias);

                $('#2ndrightWayWinnerId').val(firstRes.data.rightWay.user.id);



                $('#2ndplus2WinnerName').text(firstRes.data.plus2.user.alias);

                $('#2ndplus2WinnerId').val(firstRes.data.plus2.user.id);



                $('#2ndwrongWayWinnerName').text(firstRes.data.wrongWay.user.alias);

                $('#2ndwrongWayWinnerId').val(firstRes.data.wrongWay.user.id);



                $('#2ndminus2WinnerName').text(firstRes.data.minus2.user.alias);

                $('#2ndminus2WinnerId').val(firstRes.data.minus2.user.id);





            }

            // third end



            // fourth start

            jQuery(".score4").change(function() {

                let val = jQuery(this).val();



                updateFourthWinningNumbers(val);

            });



            function updateFourthWinningNumbers(val) {

                let num = val;

                let str = num.toString();

                let array = str.split('');

                let lastCharacter = array.pop();

                jQuery('#fourth').text(lastCharacter);





                let firstValue = $('#third').text();

                let firstValuePlus = plusVal(firstValue);



                let secondValue = $('#fourth').text();

                let secondValuePlus = plusVal(secondValue);



                var firstValueMinus = minusVal(firstValue);

                var secondValueMinus = minusVal(secondValue);





                $('#rightWaySecond').text(firstValue);

                $('#rightWaySecond2').text(secondValue);

                $('#rightWaySecondPlus').text(firstValuePlus);

                $('#rightWaySecond2Plus').text(secondValuePlus);

                $('#wrongWaySecond').text(secondValue);

                $('#wrongWaySecond2').text(firstValue);

                $('#rightWaySecondMinus').text(firstValueMinus);

                $('#rightWaySecond2Minus').text(secondValueMinus);



                var url = "{{ route('admin.set_winner_second.show') }}";



                let firstRes = AjaxRequestFun(firstValuePlus, secondValuePlus, firstValueMinus, secondValueMinus,

                    firstValue, secondValue, url);



                $('#2ndrightWayWinnerName').text(firstRes.data.rightWay.user.alias);

                $('#2ndrightWayWinnerId').val(firstRes.data.rightWay.user.id);



                $('#2ndplus2WinnerName').text(firstRes.data.plus2.user.alias);

                $('#2ndplus2WinnerId').val(firstRes.data.plus2.user.id);



                $('#2ndwrongWayWinnerName').text(firstRes.data.wrongWay.user.alias);

                $('#2ndwrongWayWinnerId').val(firstRes.data.wrongWay.user.id);



                $('#2ndminus2WinnerName').text(firstRes.data.minus2.user.alias);

                $('#2ndminus2WinnerId').val(firstRes.data.minus2.user.id);





            }

            // fourth end



            // fifth start

            jQuery(".score5").change(function() {

                let val = jQuery(this).val();



                updateFifthWinningNumbers(val);

            });



            function updateFifthWinningNumbers(val) {

                let num = val;

                let str = num.toString();

                let array = str.split('');

                let lastCharacter = array.pop();

                jQuery('#fifth').text(lastCharacter);



                let firstValue = $('#fifth').text();

                let firstValuePlus = plusVal(firstValue);



                let secondValue = $('#sixth').text();

                let secondValuePlus = plusVal(secondValue);



                var firstValueMinus = minusVal(firstValue);

                var secondValueMinus = minusVal(secondValue);



                $('#rightWayThird').text(lastCharacter);

                $('#rightWayThird2').text();

                $('#rightWayThirdPlus').text(firstValuePlus);

                $('#rightWayThird2Plus').text();

                $('#wrongWayThird').text();

                $('#wrongWayThird2').text(lastCharacter);

                $('#rightWayThirdMinus').text(firstValueMinus);

                $('#rightWayThird2Minus').text();



                var url = "{{ route('admin.set_winner_third.show') }}";



                let firstRes = AjaxRequestFun(firstValuePlus, secondValuePlus, firstValueMinus, secondValueMinus,

                    firstValue, secondValue, url);



                $('#3rdrightWayWinnerName').text(firstRes.data.rightWay.user.alias);

                $('#3rdrightWayWinnerId').val(firstRes.data.rightWay.user.id);



                $('#3rdplus2WinnerName').text(firstRes.data.plus2.user.alias);

                $('#3rdplus2WinnerId').val(firstRes.data.plus2.user.id);



                $('#3rdwrongWayWinnerName').text(firstRes.data.wrongWay.user.alias);

                $('#3rdwrongWayWinnerId').val(firstRes.data.wrongWay.user.id);



                $('#3rdminus2WinnerName').text(firstRes.data.minus2.user.alias);

                $('#3rdminus2WinnerId').val(firstRes.data.minus2.user.id);



            }

            // fifth end



            // sixth start

            jQuery(".score6").change(function() {

                let val = jQuery(this).val();



                updateSixthWinningNumbers(val);

            });



            function updateSixthWinningNumbers(val) {

                let num = val;

                let str = num.toString();

                let array = str.split('');

                let lastCharacter = array.pop();

                jQuery('#sixth').text(lastCharacter);





                let firstValue = $('#fifth').text();

                let firstValuePlus = plusVal(firstValue);



                let secondValue = $('#sixth').text();

                let secondValuePlus = plusVal(secondValue);



                var firstValueMinus = minusVal(firstValue);

                var secondValueMinus = minusVal(secondValue);





                $('#rightWayThird').text(firstValue);

                $('#rightWayThird2').text(secondValue);

                $('#rightWayThirdPlus').text(firstValuePlus);

                $('#rightWayThird2Plus').text(secondValuePlus);

                $('#wrongWayThird').text(secondValue);

                $('#wrongWayThird2').text(firstValue);

                $('#rightWayThirdMinus').text(firstValueMinus);

                $('#rightWayThird2Minus').text(secondValueMinus);



                var url = "{{ route('admin.set_winner_third.show') }}";



                let firstRes = AjaxRequestFun(firstValuePlus, secondValuePlus, firstValueMinus, secondValueMinus,

                    firstValue, secondValue, url);



                $('#3rdrightWayWinnerName').text(firstRes.data.rightWay.user.alias);

                $('#3rdrightWayWinnerId').val(firstRes.data.rightWay.user.id);



                $('#3rdplus2WinnerName').text(firstRes.data.plus2.user.alias);

                $('#3rdplus2WinnerId').val(firstRes.data.plus2.user.id);



                $('#3rdwrongWayWinnerName').text(firstRes.data.wrongWay.user.alias);

                $('#3rdwrongWayWinnerId').val(firstRes.data.wrongWay.user.id);



                $('#3rdminus2WinnerName').text(firstRes.data.minus2.user.alias);

                $('#3rdminus2WinnerId').val(firstRes.data.minus2.user.id);



            }

            // sixth end



            // seventh start

            jQuery(".score7").change(function() {

                let val = jQuery(this).val();



                updateSeventhWinningNumbers(val);

            });



            function updateSeventhWinningNumbers(val) {

                let num = val;

                let str = num.toString();

                let array = str.split('');

                let lastCharacter = array.pop();

                jQuery('#seventh').text(lastCharacter);



                let firstValue = $('#seventh').text();

                let firstValuePlus = plusVal(firstValue);



                let secondValue = $('#eighth').text();

                let secondValuePlus = plusVal(secondValue);



                var firstValueMinus = minusVal(firstValue);

                var secondValueMinus = minusVal(secondValue);





                $('#rightWayFourth').text(lastCharacter);

                $('#rightWayFourth2').text();

                $('#rightWayFourthPlus').text(firstValuePlus);

                $('#rightWayFourth2Plus').text();

                $('#wrongWayFourth').text();

                $('#wrongWayFourth2').text(lastCharacter);

                $('#rightWayFourthMinus').text(firstValueMinus);

                $('#rightWayFourth2Minus').text();





                var url = "{{ route('admin.set_winner_fourth.show') }}";



                let firstRes = AjaxRequestFun(firstValuePlus, secondValuePlus, firstValueMinus, secondValueMinus,

                    firstValue, secondValue, url);



                $('#4thrightWayWinnerName').text(firstRes.data.rightWay.user.alias);

                $('#4thrightWayWinnerId').val(firstRes.data.rightWay.user.id);



                $('#4thplus2WinnerName').text(firstRes.data.plus2.user.alias);

                $('#4thplus2WinnerId').val(firstRes.data.plus2.user.id);



                $('#4thwrongWayWinnerName').text(firstRes.data.wrongWay.user.alias);

                $('#4thwrongWayWinnerId').val(firstRes.data.wrongWay.user.id);



                $('#4thminus2WinnerName').text(firstRes.data.minus2.user.alias);

                $('#4thminus2WinnerId').val(firstRes.data.minus2.user.id);



            }

            // seventh end



            // eighth start

            jQuery(".score8").change(function() {

                let val = jQuery(this).val();



                updateEighthWinningNumbers(val);

            });



            function updateEighthWinningNumbers(val) {

                let num = val;

                let str = num.toString();

                let array = str.split('');

                let lastCharacter = array.pop();

                jQuery('#eighth').text(lastCharacter);



                let firstValue = $('#seventh').text();

                let firstValuePlus = plusVal(firstValue);



                let secondValue = $('#eighth').text();

                let secondValuePlus = plusVal(secondValue);



                var firstValueMinus = minusVal(firstValue);

                var secondValueMinus = minusVal(secondValue);





                $('#rightWayFourth').text(firstValue);

                $('#rightWayFourth2').text(secondValue);

                $('#rightWayFourthPlus').text(firstValuePlus);

                $('#rightWayFourth2Plus').text(secondValuePlus);

                $('#wrongWayFourth').text(secondValue);

                $('#wrongWayFourth2').text(firstValue);

                $('#rightWayFourthMinus').text(firstValueMinus);

                $('#rightWayFourth2Minus').text(secondValueMinus);



                var url = "{{ route('admin.set_winner_fourth.show') }}";



                let firstRes = AjaxRequestFun(firstValuePlus, secondValuePlus, firstValueMinus, secondValueMinus,

                    firstValue, secondValue, url);



                $('#4thrightWayWinnerName').text(firstRes.data.rightWay.user.alias);

                $('#4thrightWayWinnerId').val(firstRes.data.rightWay.user.id);



                $('#4thplus2WinnerName').text(firstRes.data.plus2.user.alias);

                $('#4thplus2WinnerId').val(firstRes.data.plus2.user.id);



                $('#4thwrongWayWinnerName').text(firstRes.data.wrongWay.user.alias);

                $('#4thwrongWayWinnerId').val(firstRes.data.wrongWay.user.id);



                $('#4thminus2WinnerName').text(firstRes.data.minus2.user.alias);

                $('#4thminus2WinnerId').val(firstRes.data.minus2.user.id);



            }

            // eighth end



            var price = "{{ $data->price }}";

            var totalAmount = price * 100;

            var adminPercentage = (20 / 100) * totalAmount;

            var minusAdminPercentage = totalAmount - adminPercentage;



            $('#adminAmount').text('Admin Amount (' + adminPercentage + ')');



            var nullArr = [];

            var nullArrPercentage = [];

            $('.perceantage_table input[type=number]').each(function() {

                $(this).prop('readonly', true);

                let val = parseInt($(this).val());



                let percentage = (val / 100) * minusAdminPercentage;



                percentage = Math.floor(percentage)



                var arrPercentage = nullArrPercentage.push(percentage);



                let arr = nullArr.push(val);

            });



            showAmount(nullArrPercentage);





            $('.numericInput').change(function() {



                var nullArr = [];

                var nullArrPercentage = [];

                $('.perceantage_table input[type=number]').each(function() {



                    let val = parseInt($(this).val());



                    let percentage = (val / 100) * minusAdminPercentage;



                    percentage = Math.floor(percentage)



                    var arrPercentage = nullArrPercentage.push(percentage);



                    let arr = nullArr.push(val);

                });



                showAmount(nullArrPercentage);



                var sum = 0;



                $.each(nullArr, function(index, value) {

                    sum += value;

                });



                $('.total_count_percent').text(sum + "%");

            });





            function showAmount(nullArrPercentage) {

                $('#rightWayFirstAmount').text("$" + nullArrPercentage[0]);

                $('#rightWayFirstPlusAmount').text("$" + nullArrPercentage[1]);

                $('#wrongWayFirstAmount').text("$" + nullArrPercentage[2]);

                $('#rightWayFirstMinusAmount').text("$" + nullArrPercentage[3]);



                $('#rightWaySecondAmount').text("$" + nullArrPercentage[4]);

                $('#rightWaySecondPlusAmount').text("$" + nullArrPercentage[5]);

                $('#wrongWaySecondAmount').text("$" + nullArrPercentage[6]);

                $('#rightWaySecondMinusAmount').text("$" + nullArrPercentage[7]);



                $('#rightWayThirdAmount').text("$" + nullArrPercentage[8]);

                $('#rightWayThirdPlusAmount').text("$" + nullArrPercentage[9]);

                $('#wrongWayThirdAmount').text("$" + nullArrPercentage[10]);

                $('#rightWayThirdMinusAmount').text("$" + nullArrPercentage[11]);



                $('#rightWayFourthAmount').text("$" + nullArrPercentage[12]);

                $('#rightWayFourthPlusAmount').text("$" + nullArrPercentage[13]);

                $('#wrongWayFourthAmount').text("$" + nullArrPercentage[14]);

                $('#rightWayFourthMinusAmount').text("$" + nullArrPercentage[15]);

            }



            showAmount();



        });



        // winner users announce

        $(document).ready(function() {



            $('#saveWinnerData').click(function() {

                var validation = $('.getScore').val();



                if (validation == '') {

                    alert('please fill score field');

                } else {

                    const numericInput = [];

                    $('.numericInput').each(function() {

                        numericInput.push($(this).val());

                    });



                    const getScore = [];

                    $('.getScore').each(function() {

                        getScore.push($(this).val());

                    });



                    const filterWinningNumber = [];

                    $('.filterWinningNumber').each(function() {

                        filterWinningNumber.push($(this).text());

                    });



                    const rightWayWinner = [];

                    $('.rightWayWinner').each(function() {

                        rightWayWinner.push($(this).text());

                    });



                    const rightWayWinnerId = [];

                    $('.rightWayWinnerId').each(function() {

                        rightWayWinnerId.push($(this).val());

                    });



                    const rightWayWinnerAmount = [];

                    $('.rightWayWinnerAmount').each(function() {

                        rightWayWinnerAmount.push($(this).text());

                    });



                    const wrongWayWinner = [];

                    $('.wrongWayWinner').each(function() {

                        wrongWayWinner.push($(this).text());

                    });



                    const wrongWayWinnerId = [];

                    $('.wrongWayWinnerId').each(function() {

                        wrongWayWinnerId.push($(this).val());

                    });



                    const wrongWayWinnerAmount = [];

                    $('.wrongWayWinnerAmount').each(function() {

                        wrongWayWinnerAmount.push($(this).text());

                    });



                    const minus2WayWinner = [];

                    $('.minus2WayWinner').each(function() {

                        minus2WayWinner.push($(this).text());

                    });



                    const minus2WinnerId = [];

                    $('.minus2WinnerId').each(function() {

                        minus2WinnerId.push($(this).val());

                    });



                    const minus2WinnerAmount = [];

                    $('.minus2WinnerAmount').each(function() {

                        minus2WinnerAmount.push($(this).text());

                    });





                    const plus2WayWinner = [];

                    $('.plus2WayWinner').each(function() {

                        plus2WayWinner.push($(this).text());

                    });



                    const plus2WinnerId = [];

                    $('.plus2WinnerId').each(function() {

                        plus2WinnerId.push($(this).val());

                    });



                    const plus2WinnerAmount = [];

                    $('.plus2WinnerAmount').each(function() {

                        plus2WinnerAmount.push($(this).text());

                    });





                    var url = "{{ route('admin.winner_announce.show') }}";

                    var data = {

                        'board_id': "{{ $data->board_id }}",

                        'price': "{{ $data->price }}",

                        'part': "{{ $data->part }}",

                        'percentage': numericInput,

                        'getScore': getScore,

                        'filterWinningNumber': filterWinningNumber,

                        'rightWayWinner': rightWayWinner,

                        'rightWayWinnerId': rightWayWinnerId,

                        'rightWayWinnerAmount': rightWayWinnerAmount,

                        'wrongWayWinner': wrongWayWinner,

                        'wrongWayWinnerId': wrongWayWinnerId,

                        'wrongWayWinnerAmount': wrongWayWinnerAmount,

                        'minus2WayWinner': minus2WayWinner,

                        'minus2WinnerId': minus2WinnerId,

                        'minus2WinnerAmount': minus2WinnerAmount,

                        'plus2WayWinner': plus2WayWinner,

                        'plus2WinnerId': plus2WinnerId,

                        'plus2WinnerAmount': plus2WinnerAmount,

                        '_token': "{{ csrf_token() }}",

                    };





                    let resWinnerAnnounce = AjaxRequest(url, data);

                    if (resWinnerAnnounce.status == true) {

                        alert(resWinnerAnnounce.message);

                    }

                }



            });

        });

    </script>



    <script>

        $(document).ready(function() {



            $('#addButton').click(function() {



                // var price = $('#price').val();

                var price = "{{ $data->price }}";



                var data1x = $(".firstXnumber").text().split("");

                @if (isset($q1y))

                    var data1y = $(".firstYnumber.new").text().split("");

                @else

                    var data1y = $(".firstYnumber").text().split("");

                @endif



                var data2x = $(".secondXnumber").text().split("");

                @if (isset($q1y))

                    var data2y = $(".secondYnumber.new").text().split("");

                @else

                    var data2y = $(".secondYnumber").text().split("");

                @endif



                var data3x = $(".thirdXnumber").text().split("");

                @if (isset($q1y))

                    var data3y = $(".thirdYnumber.new").text().split("");

                @else

                    var data3y = $(".thirdYnumber").text().split("");

                @endif



                var data4x = $(".fourthXnumber").text().split("");

                @if (isset($q1y))

                    var data4y = $(".fourthYnumber.new").text().split("");

                @else

                    var data4y = $(".fourthYnumber").text().split("");

                @endif





                let data = {

                    'id': "{{ $id }}",

                    'price': price,

                    'part': "{{ $data->part }}",

                    'data1x': data1x,

                    'data1y': data1y,

                    'data2x': data2x,

                    'data2y': data2y,

                    'data3x': data3x,

                    'data3y': data3y,

                    'data4x': data4x,

                    'data4y': data4y,

                    '_token': '{{ csrf_token() }}',

                };



                let url = "{{ route('admin.game.board.add') }}";



                let response = AjaxRequest(url, data);



                if (response) {

                    alert(response.message);

                }



            });



            jQuery('.gameBox').each(function() {



                // first y quard 

                let verticalFirstCordinates = jQuery(this).parents('tr').find('.firstYnumber').text();

                jQuery(this).attr('data-q1-y', verticalFirstCordinates);



                // second y quard 

                let verticalSecondCordinates = jQuery(this).parents('tr').find('.secondYnumber').text();

                jQuery(this).attr('data-q2-y', verticalSecondCordinates);



                // third y quard

                let verticalThirdCordinates = jQuery(this).parents('tr').find('.thirdYnumber').text();

                jQuery(this).attr('data-q3-y', verticalThirdCordinates);



                // fourth y quard

                let verticalFourthCordinates = jQuery(this).parents('tr').find('.fourthYnumber').text();

                jQuery(this).attr('data-q4-y', verticalFourthCordinates);



            });



            jQuery('.gameBox .finalTableResult').each(function() {



                // first y quard 

                let verticalFirstCordinates = jQuery(this).parents('tr').find('.firstYnumber_finalTableResult').text();

                jQuery(this).attr('data-q1-y', verticalFirstCordinates);



                // second y quard 

                let verticalSecondCordinates = jQuery(this).parents('tr').find('.secondYnumber_finalTableResult').text();

                jQuery(this).attr('data-q2-y', verticalSecondCordinates);



                // third y quard

                let verticalThirdCordinates = jQuery(this).parents('tr').find('.thirdYnumber_finalTableResult').text();

                jQuery(this).attr('data-q3-y', verticalThirdCordinates);



                // fourth y quard

                let verticalFourthCordinates = jQuery(this).parents('tr').find('.fourthYnumber_finalTableResult').text();

                jQuery(this).attr('data-q4-y', verticalFourthCordinates);



            });



            $('tr').each(function(rowIndex) {



                var q1xData = <?php echo json_encode($q1x); ?>;

                var q2xData = <?php echo json_encode($q2x); ?>;

                var q3xData = <?php echo json_encode($q3x); ?>;

                var q4xData = <?php echo json_encode($q4x); ?>;



                $gameBoxes = $(this).find('.gameBox');



                $gameBoxes.each(function(index) {

                    var q1xValue = q1xData[index];

                    var q2xValue = q2xData[index];

                    var q3xValue = q3xData[index];

                    var q4xValue = q4xData[index];



                    $(this).attr({

                        "data-q1-x": q1xValue,

                        "data-q2-x": q2xValue,

                        "data-q3-x": q3xValue,

                        "data-q4-x": q4xValue,

                    });

                });

            });







            // get square data start

            let data = {

                'board_id': "{{ $data->board_id }}",

                'price': "{{ $data->price }}",

                'part': "{{ $data->part }}",

                '_token': '{{ csrf_token() }}',

            };

            let url = "{{ route('admin.square_buy.show') }}";



            let res = AjaxRequest(url, data);



            if (res.status == true) {

                for (let i = 0; i < res.data.length; i++) {

                    $('tr').find('.gameBox').each(function() {

                        let box = $(this);

                        var checkMark = box.find('.checkMark');

                        var dataQ1X = $(this).data('q1-x');

                        var dataQ1Y = $(this).data('q1-y');

                        if (res.data[i].q1x == dataQ1X && res.data[i].q1y == dataQ1Y) {



                            box.addClass('alreadyBooked');

                            checkMark.removeClass('checkMark');

                            checkMark.addClass('checkMarkOwn');

                            checkMark.text(res.data[i].user.alias);

                        }

                    });

                }

            }

            finalTableHtml = $('#finalTableResultDataBody').html();



            if(specialCount !== (spin_numbers + 1)){

                $('#finalTableResultDataBody').html('')

            }





            if(( specialCount > 0 && spin_numbers > 0 ) && (specialCount >= spin_numbers) ){

                $('.SpinsNumber').prop('disabled', true);

                $('.clearBtn').prop('disabled', true);

            }

            // get square data end



        });

    </script>

@endpush

