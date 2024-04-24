@extends('new_website.layouts.main')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/responsive.css') }}" />

    <section class="immersive_gameplay_section">
        <div class="container">
            <div class="row">
                <img src="{{ asset('assets/new_website/images/empty-logo.png') }}" class="empty-logo" alt="">

                <img src="{{ asset('assets/new_website/images/right-blogo.png') }}" class="right-blogo" alt="">

                <img src="{{ asset('assets/new_website/images/c-logo.png') }}" class="c-logo" alt="">

                <img src="{{ asset('assets/new_website/images/s-logo.png') }}" class="sm-slogo" alt="">

                <img src="{{ asset('assets/new_website/images/b-logo.png') }}" class="b-logo" alt="">

                <img src="{{ asset('assets/new_website/images/s-logo.png') }}" class="second_slogo" alt="">

                <img src="{{ asset('assets/new_website/images/a-S-logo.png') }}" class="first_slogo" alt="">

                <div class="col-md-8 mx-auto">
                    <h2 class="main_heading text-center">BOARD</h2>
                </div>


                <x-main-banner />

            </div>
        </div>

    </section>

    <style>
        .checkMarkOwn {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            cursor: not-allowed;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #8FEA9A;
            user-select: none;
        }

        .display {
            display: none;
        }
    </style>

    @if ($dateFormatWithHour >= $board->generate_number && ($gameBoard->spiner_count !== 0 && $gameBoard->spin_numbers !== 0))
        <style>
            .new span {
                visibility: visible;
            }
        </style>
    @else
        <style>
            .new span {
                visibility: hidden;
            }
        </style>
    @endif

    <style>
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
            position: absolute;
            top: 30%;
            left: -50px;
        }
    </style>

    @if ($dateFormat >= $board->square_start_date)
        <style>
            #squareBoxShowHide {
                display: block;
            }

            #squareBoxMessageShowHide {
                display: none;
            }
        </style>
    @else
        <style>
            #squareBoxShowHide {
                display: none;
            }

            #squareBoxMessageShowHide {
                display: block;
            }
        </style>
    @endif

    <section class="square_game_board" id="squareBoxMessageShowHide">
        <div class="text-center" style="color: white;font-size: 26px;">
            @php
                $newDate = date('F-Y-d H:i:00 A', strtotime($board->square_start_date));
            @endphp
            <p>Square Selection time is </p>
            <p class="font-weight-bold">{{ $newDate }}</p>
        </div>
    </section>

    <section class="square_game_board" id="squareBoxShowHide">
        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    @if ($dateFormatWithHour >= $board->generate_number &&  intval($gameBoard->spiner_count) > 0)
                        <div class="text-center">
                            <button type="button" class="btn bg-warning mb-5 px-5 rounded-pill py-2">Spiner Count
                                (<span>{{ $gameBoard->spiner_count }}</span>)</button>
                        </div>
                    @endif


                    <div class="table-responsive">
                        <div class="alert alert-success alert-check display alert-dismissible fade show" role="alert">
                            <p></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>



                        <table class="table table-striped">

                            <thead>
                                <tr class="bg-success">
                                    <th scope="col">Team ({{ $board->board_name }})</th>
                                    <th scope="col">Players Count</th>
                                    <th scope="col">Total Squares Buy </th>
                                    {{-- <th>Total Price</th> --}}
                                    <th scope="col">Board Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-warning">
                                    <th scope="row">Game Date: {{ date('j-F-Y', strtotime($board->game_date)) }}</th>
                                    {{-- <td id="playersCount">{{ $playersCount }}</td> --}}
                                    <td id="playersCount"></td>
                                    <td id="squareBuyCount"></td>
                                    {{-- <td id="buySquareCount"></td> --}}
                                    <td id="boardfPrice">${{ $gameBoard->price }}</td>
                                </tr>


                            </tbody>
                        </table>

                        <div class="board_dates_details mb-2">
                            <p>Select Square Deadline : {{ date('j-F-Y H:i:s A', strtotime($board->square_deadline)) }}
                            </p>
                            {{-- <p>Game Date : {{ date('j-F -Y', strtotime($board->game_date)) }}</p> --}}
                            <p>Generate Number Date : {{ date('j-F-Y', strtotime($board->generate_number)) }}</p>
                            <p>Payment Deadline : {{ date('j-F-Y H:i:s A', strtotime($board->payment_deadline)) }}</p>
                        </div>

                        <table class="gamingBox mt-2" style="background-color: white">
                            <h3 class="text-center" style="color:white">{{ $board->team_name_x }}</h3>
                            <h3 class="yyy_text" style="color:white">{{ $board->team_name_y }}</h3>
                            <thead>

                            </thead>
                            <tbody>


                                @php
                                    $q1x = json_decode($gameBoard->q1x);
                                    $q2x = json_decode($gameBoard->q2x);
                                    $q3x = json_decode($gameBoard->q3x);
                                    $q4x = json_decode($gameBoard->q4x);

                                    $q1y = json_decode($gameBoard->q1y);
                                    $q2y = json_decode($gameBoard->q2y);
                                    $q3y = json_decode($gameBoard->q3y);
                                    $q4y = json_decode($gameBoard->q4y);
                                @endphp
                                <tr>
                                    <td class="lightYellow" colspan="4">1st</td>
                                    @if (isset($q1x))
                                        @foreach ($q1x as $list)
                                            <td class="lightYellow firstXnumber new clear">
                                                <span>{{ $list }}</span>
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
                                        @foreach ($q2x as $list)
                                            <td class="orangeColor secondXnumber new clear">
                                                <span>{{ $list }}</span>
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
                                        @foreach ($q3x as $list)
                                            <td class="lightBlue thirdXnumber new clear">
                                                <span>{{ $list }}</span>
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
                                    @if ($q4x)
                                        @foreach ($q4x as $list)
                                            <td class="blueColor fourthXnumber new clear">
                                                <span>{{ $list }}</span>
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
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[0] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q2y[0]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[0] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear">0</td>
                                    @endif


                                    @if (isset($q3y[0]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[0] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q3y[0]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q3y[0] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear">0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y="" data-q3-y=""
                                            data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y="" data-q3-y=""
                                            data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y="" data-q3-y=""
                                            data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    @if (isset($q1y[1]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[1] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear">0</td>
                                    @endif


                                    @if (isset($q2y[1]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[1] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear">0</td>
                                    @endif


                                    @if (isset($q3y[1]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[1] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q4y[1]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[1] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear"> 0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    @if (isset($q1y[2]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[2] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q2y[2]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[2] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q3y[2]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[2] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q4y[2]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[2] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear"> 0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    @if (isset($q1y[3]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[3] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q2y[3]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[3] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q3y[3]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[3] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear">0</td>
                                    @endif


                                    @if (isset($q4y[3]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[3] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear">0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    @if (isset($q1y[4]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[4] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q2y[4]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[4] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q3y[4]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[4] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q4y[4]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[4] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear"> 0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    @if (isset($q1y[5]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[5] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q2y[5]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[5] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q3y[5]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[5] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q4y[5]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[5] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear"> 0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    @if (isset($q1y[6]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[6] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q2y[6]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[6] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q3y[6]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[6] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q4y[6]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[6] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear"> 0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-y=""
                                            data-q3-y="" data-q4-y="" data-q2-x="" data-q3-x="" data-q4-x="">
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

                                    @if (isset($q1y[7]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[7] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q2y[7]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[7] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q3y[7]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[7] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear">0 </td>
                                    @endif


                                    @if (isset($q4y[7]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[7] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear"> 0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    @if (isset($q1y[8]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[8] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q2y[8]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[8] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q3y[8]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[8] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q4y[8]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[8] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear"> 0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    @if (isset($q1y[9]))
                                        <td class="lightYellow firstYnumber new clear"> <span>
                                                {{ $q1y[9] }}</span> </td>
                                    @else
                                        <td class="lightYellow firstYnumber clear"> 0 </td>
                                    @endif


                                    @if (isset($q2y[9]))
                                        <td class="orangeColor secondYnumber new clear"> <span>
                                                {{ $q2y[9] }}</span> </td>
                                    @else
                                        <td class="orangeColor secondYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q3y[9]))
                                        <td class="lightBlue thirdYnumber new clear"> <span>
                                                {{ $q3y[9] }}</span> </td>
                                    @else
                                        <td class="lightBlue thirdYnumber clear"> 0</td>
                                    @endif


                                    @if (isset($q4y[9]))
                                        <td class="blueColor fourthYnumber new clear"> <span>
                                                {{ $q4y[9] }}</span> </td>
                                    @else
                                        <td class="blueColor fourthYnumber clear"> 0</td>
                                    @endif

                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="gameBox" data-q1-x="" data-q1-y="" data-q2-x=""
                                            data-q2-y="" data-q3-x="" data-q3-y="" data-q4-x=""
                                            data-q4-y="">
                                            <input type="checkbox" value="" class="checkboxSquare">
                                            <div class="checkMark"></div>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if ($board->square_deadline >= $dateFormat)
                        @if ($dateFormat >= $board->square_start_date && $dateFormat <= $board->square_deadline)
                            <button class="btn btn-sm btn-primary mt-3 float-right" id="buySquare">Buy
                                Squares</button>
                        @endif
                    @endif
                    @if ($dateFormat >= $board->payment_deadline  && $dateFormat <= $board->extend_paymentTime)
                            <button class="btn btn-sm btn-primary mt-3 float-right" id="buySquarePickAndPaid">Pick And Pay</button>
                    @endif

                </div>
            </div>

        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Select Your Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        {{-- <span aria-hidden="true">&times;</span> --}}
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-check">
                        <input class="form-check-input" required type="radio" value="{{ $board->team_name_x }}"
                            name="team_x_y" id="team_x">
                        <label class="form-check-label" for="team_x">
                            {{ $board->team_name_x }}
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" required type="radio" value="{{ $board->team_name_y }}"
                            name="team_x_y" id="team_y">
                        <label class="form-check-label" for="team_y">
                            {{ $board->team_name_y }}
                        </label>
                    </div>

                    <div id="error">
                        <span>

                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="selectedTeam" class="btn btn-primary">Select Team</button>
                </div>
            </div>
        </div>
    </div>

    {{-- payment modal --}}

    <!-- Modal -->

    <div class="modal fade" id="staticBackdrop_paymentModal" class="paymentModal" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Payment</h5>
                  
                </div>
                <div class="modal-body">
                    <p>Pick and Pay</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="paymentModalBtnCancle">Cancel</button>
                    <a id="paymentModalBtn" class="btn btn-primary">Pay</a>
                </div>
            </div>
        </div>
    </div> 



@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
<script>
    function AjaxRequest(url, data) {
        var res;
        $.ajax({
            url: url,
            data: data,
            async: false,
            error: function() {
                console.log('error');
            },
            dataType: 'json',
            success: function(data) {
                res = data;
            },
            type: 'POST'
        });
        return res;
    }
</script>
<script>
    $(document).ready(function() {

        // function checked(){

        //     $('.checkMark').each(function(){
        //         console.log($(this).find('.bg-checked'))
        //         $(this).find('.bg-checked').css('background-color', 'gray');
        //     }); 
        // }
        // checked();
        // Team Work Start --------------------------------------------------------------------------------------------------------------------------
       /* @if (
            ($dateFormat >= $board->square_start_date && $dateFormat <= $board->square_deadline) ||
                ($dateFormat >= $board->payment_deadline && $dateFormat <= $board->extend_paymentTime))
            $(window).on('load', function() {

                let user_id = "{{ auth()->user()->id }}";
                var team_x = ('{{ $teamCheck->team_x }}' == [0]) ? [] : JSON.parse(
                    '{{ $teamCheck->team_x }}');
                var team_y = ('{{ $teamCheck->team_y }}' == [0]) ? [] : JSON.parse(
                    '{{ $teamCheck->team_y }}');


                if (!$.isEmptyObject(team_x)) {

                    // console.log(team_x.length);

                    if (jQuery.inArray(parseInt(user_id), team_x) !== -1) {
                        // console.log("is in array");
                        $('#staticBackdrop').modal('hide');
                    } else {
                        $('#staticBackdrop').modal('show');
                    }

                } else if (!$.isEmptyObject(team_y)) {

                    if (jQuery.inArray(parseInt(user_id), team_y) !== -1) {
                        // console.log("is in array");
                        $('#staticBackdrop').modal('hide');
                    } else {
                        $('#staticBackdrop').modal('show');
                    }

                } else {
                    $('#staticBackdrop').modal('show');
                }


            });


            $('#selectedTeam').click(function() {

                var team_x = ('{{ $teamCheck->team_x }}' == [0]) ? [] : JSON.parse(
                    '{{ $teamCheck->team_x }}');
                var team_y = ('{{ $teamCheck->team_y }}' == [0]) ? [] : JSON.parse(
                    '{{ $teamCheck->team_y }}');


                let url = "{{ route('user.team.Select') }}";
                let valId = $("input[name='team_x_y']:checked").attr('id');
                let val = $("input[name='team_x_y']:checked").val();

                if (val == undefined) {
                    $("#error span").addClass('text-danger').text('Please select team.');
                    console.log('Please select team.');
                } else {
                    let data = {
                        'board_id': "{{ $gameBoard->board_id }}",
                        'price': "{{ $gameBoard->price }}",
                        'part': "{{ $part }}",
                        'teamName': valId,
                        'team': val,
                        '_token': '{{ csrf_token() }}',
                    };


                    if (valId == "team_x") {
                        console.log(valId);
                        if (team_x.length < 50) {

                            let teamSelectRes = AjaxRequest(url, data);
                            if (teamSelectRes.status == true) {
                                $('#staticBackdrop').modal('hide');
                            };
                        } else {
                            $('#error span').css('color', 'red').text(
                                "The Length of team X is full please select form team Y.");
                        }
                    }

                    if (valId == "team_y") {
                        console.log(valId);
                        if (team_y.length < 50) {

                            let teamSelectRes = AjaxRequest(url, data);
                            if (teamSelectRes.status == true) {
                                $('#staticBackdrop').modal('hide');
                            };
                        } else {
                            $('#error span').css('color', 'red').text(
                                "The Length of team Y is full please select form team X.");
                        }
                    }
                }
            });
        @endif*/



        // Team Work End --------------------------------------------------------------------------------------------------------------------------

        jQuery('.checkboxSquare').click(function() {
            let boxValue = jQuery(this).prop('checked');
            if (boxValue == true) {
                jQuery(this).next('.checkMark').addClass('bg-checked');
            } else {
                jQuery(this).next('.checkMark').removeClass('bg-checked');
            }
        });

        /////////////////////////buySquarePickAndPaid

        $('#buySquarePickAndPaid').on('click', function() {
            // Initialize an array to store the attributes
            var selectedAttributes = [];

            // Loop through each <tr> <td> element
            $('tr td').each(function() {
                // Check if the checkbox within this row has the class .bg-checked
                if ($(this).find('.checkMark').hasClass('bg-checked')) {
                    // If it has the class, collect the attributes and store them in an object
                    var attributes = {
                        'data-q1-x': $(this).find('.gameBox').data('q1-x'),
                        'data-q1-y': $(this).find('.gameBox').data('q1-y'),
                        'data-q2-x': $(this).find('.gameBox').data('q2-x'),
                        'data-q2-y': $(this).find('.gameBox').data('q2-y'),
                        'data-q3-x': $(this).find('.gameBox').data('q3-x'),
                        'data-q3-y': $(this).find('.gameBox').data('q3-y'),
                        'data-q4-x': $(this).find('.gameBox').data('q4-x'),
                        'data-q4-y': $(this).find('.gameBox').data('q4-y')
                    };

                    // Push the attributes object to the selectedAttributes array
                    selectedAttributes.push(attributes);
                }
            });

            // data add //////////////

            if (selectedAttributes.length > 0) {
                if (confirm("You want to by those boxes.") == true) {
                    let data = {
                        'board_id': "{{ $gameBoard->board_id }}",
                        'price': "{{ $gameBoard->price }}",
                        'part': "{{ $part }}",
                        'selectedAttributes': selectedAttributes,
                        '_token': '{{ csrf_token() }}',
                    };
                    let url = "{{ route('square_buy.store') }}";

                    let response = AjaxRequest(url, data);

                    if (response.status == true) {

                        console.log(response.boardDate.board_id)

                        let data = {
                            'board_id': response.boardDate.board_id,
                            'price': response.boardDate.price,
                            'part': response.boardDate.part,
                            '_token': '{{ csrf_token() }}',
                        };

                        let url = "{{ route('pickAndPay') }}";

                        let responsepickAndPay = AjaxRequest(url, data);

                        console.log(responsepickAndPay.data);

                        let total_square = responsepickAndPay.data.total_square;
                        let countSquareAmount = total_square.length * responsepickAndPay.data.price;

                        console.log(countSquareAmount);

                        var payment_url =
                            `{{ route('make.payment', ['totalprice' => ':totalprice', 'board_id' => ':board_id', 'price' => ':price', 'part' => ':part']) }}`;

                        payment_url = payment_url.replace(':totalprice', countSquareAmount);
                        payment_url = payment_url.replace(':board_id', responsepickAndPay.data
                            .board_id);
                        payment_url = payment_url.replace(':price', responsepickAndPay.data.price);
                        payment_url = payment_url.replace(':part', responsepickAndPay.data.part);

                        // window.location.href = payment_url;

                        $('#staticBackdrop_paymentModal').modal('show');

                        $('#paymentModalBtn').attr('href', payment_url);

                        $('#paymentModalBtnCancle').on('click', function(e) {
                            e.preventDefault();

                            let data = {
                                'board_id': response.boardDate.board_id,
                                'price': response.boardDate.price,
                                'part': response.boardDate.part,
                                '_token': '{{ csrf_token() }}',
                            };

                            let url = "{{ route('cancleBox') }}";

                            let responsepickAndPayDelete = AjaxRequest(url, data);

                            $('#staticBackdrop_paymentModal').modal('hide');


                            console.log(responsepickAndPayDelete)

                        });
                    }
                }
            } else {
                alert('Please Select Box');
            }

        });
        /////////////////////////buySquarePickAndPaid



        $('#buySquare').on('click', function() {
            // Initialize an array to store the attributes
            var selectedAttributes = [];

            // Loop through each <tr> <td> element
            $('tr td').each(function() {
                // Check if the checkbox within this row has the class .bg-checked
                if ($(this).find('.checkMark').hasClass('bg-checked')) {
                    // If it has the class, collect the attributes and store them in an object
                    var attributes = {
                        'data-q1-x': $(this).find('.gameBox').data('q1-x'),
                        'data-q1-y': $(this).find('.gameBox').data('q1-y'),
                        'data-q2-x': $(this).find('.gameBox').data('q2-x'),
                        'data-q2-y': $(this).find('.gameBox').data('q2-y'),
                        'data-q3-x': $(this).find('.gameBox').data('q3-x'),
                        'data-q3-y': $(this).find('.gameBox').data('q3-y'),
                        'data-q4-x': $(this).find('.gameBox').data('q4-x'),
                        'data-q4-y': $(this).find('.gameBox').data('q4-y')
                    };

                    // Push the attributes object to the selectedAttributes array
                    selectedAttributes.push(attributes);
                }
            });

            // data add //////////////

            if (selectedAttributes.length > 0) {
                if (confirm("You want to by those boxes.") == true) {
                    let data = {
                        'board_id': "{{ $gameBoard->board_id }}",
                        'price': "{{ $gameBoard->price }}",
                        'part': "{{ $part }}",
                        'selectedAttributes': selectedAttributes,
                        '_token': '{{ csrf_token() }}',
                    };
                    let url = "{{ route('square_buy.store') }}";

                    let response = AjaxRequest(url, data);

                    if (response.status == true) {
                        $('.alert').removeClass('display');
                        let p = $('.alert-check').children();
                        p.eq(0).text(response.message);

                        updateBox(response.data, response.counts)
                    }
                }
            } else {
                alert('Please Select Box');
            }

        });


        jQuery('.gameBox').each(function() {
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

        jQuery('tr').each(function(rowIndex) {
            // Define the data arrays for each row
            var q1xData = <?php echo json_encode($q1x); ?>;
            var q2xData = <?php echo json_encode($q2x); ?>;
            var q3xData = <?php echo json_encode($q3x); ?>;
            var q4xData = <?php echo json_encode($q4x); ?>;

            // Find the .gameBox elements within the current row
            var $gameBoxes = $(this).find('.gameBox');

            // Loop through the .gameBox elements within the current row
            $gameBoxes.each(function(index) {

                var q1xValue = q1xData[index];
                var q2xValue = q2xData[index];
                var q3xValue = q3xData[index];
                var q4xValue = q4xData[index];

                // Set data attributes for each .gameBox element within the current row
                $(this).attr({
                    'data-q1-x': q1xValue,
                    'data-q2-x': q2xValue,
                    'data-q3-x': q3xValue,
                    'data-q4-x': q4xValue,
                });

            });
        });

        // get square data start
        let data = {
            'board_id': "{{ $gameBoard->board_id }}",
            'price': "{{ $gameBoard->price }}",
            'part': "{{ $part }}",
            '_token': '{{ csrf_token() }}',
        };
        let url = "{{ route('square_buy.get') }}";

        let res = AjaxRequest(url, data);

        console.log(res);

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
            var totalSqeares = res.counts.squareBuyCount;

            var boardPrice = "{{ $gameBoard->price }}";

            var totalPrice = totalSqeares * boardPrice;

            $('#playersCount').text(res.counts.playersCount);
            $('#squareBuyCount').text(res.counts.squareBuyCount);
            $('#buySquareCount').text("$" + totalPrice);
        }
        // get square data end

        // update box function 
        function updateBox(data, counts) {
            for (let i = 0; i < data.length; i++) {
                $('tr').find('.gameBox').each(function() {
                    let box = $(this);
                    var checkMark = box.find('.checkMark');
                    var dataQ1X = $(this).data('q1-x');
                    var dataQ1Y = $(this).data('q1-y');
                    if (data[i].q1x == dataQ1X && data[i].q1y == dataQ1Y) {
                        box.addClass('alreadyBooked');
                        checkMark.removeClass('checkMark');
                        checkMark.addClass('checkMarkOwn');
                        checkMark.text(data[i].user.alias);
                    }
                });
            }

            var totalSqeares = counts.squareBuyCount;

            var boardPrice = "{{ $gameBoard->price }}";
            var totalPrice = totalSqeares * boardPrice;



            $('#playersCount').text(counts.playersCount);
            $('#squareBuyCount').text(counts.squareBuyCount);
            $('#buySquareCount').text("$" + totalPrice);

        }
    });
</script>
