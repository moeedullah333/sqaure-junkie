@extends('user.user-layout.main')
@section('content')

    <style>
        .table-quater {
            width: 100%;
            text-align: center;
            border-spacing: 2px;
            margin-top: 30px;
        }

        .table-quater td,
        .table-quater th {
            border: 1px solid;
            padding: 15px 0;
            background-color: rgb(255, 209, 217);
        }

        .table-quater td:first-child,
        .table-quater th:first-child {
            border-right: none;
            background-color: rgb(56 215 56 / 51%);
        }

        .headBox {
            display: inline-block;
            border: 1px solid #f7f7f7;
        }

        .headBox h3 {
            margin-bottom: 0;
            background-color: #ffce94;
            font-size: 26px;
            padding: 5px 15px;
        }

        .headBox p {
            font-weight: 600;
            font-size: 20px !important;
            margin-bottom: 0;
            background-color: #6bf3ff;
            padding: 5px 15px;
        }
    </style>

    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Pay Out Info</h3>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-5">
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
                        {{-- @dd($percentages[0]) --}}
                        <tbody>
                            <tr>
                                <td>
                                    1st Qtr.
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[0] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[1] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[2] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[3] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    2nd Qtr.
                                </td>

                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[4] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>

                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[5] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[6] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[7] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    3rd Qtr.
                                </td>

                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[8] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[9] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[10] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" readonly class="numericInput" value="{{ $percentages[11] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    4th Qtr.
                                </td>

                                <td>
                                    <input type="number" class="numericInput" value="{{ $percentages[12] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" class="numericInput" value="{{ $percentages[13] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" class="numericInput" value="{{ $percentages[14] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>
                                <td>
                                    <input type="number" class="numericInput" value="{{ $percentages[15] }}"
                                        min="1" max="99"><span>%</span>
                                    <p class="text-danger errorMessage"></p>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                    <p class="total_count_percent">100%</p>
                </div>

            </div>

        </div>

        {{-- @if (count($payouts) == 0 &&
                empty($ten) &&
                empty($twenty) &&
                empty($thirty) &&
                empty($fourty) &&
                empty($fifty) &&
                empty($others))
            <p class="text-center">No Data Avaliable</p>
        @endif --}}



        {{-- @php
            $keyTen = 0;
        @endphp
        @foreach ($ten as $keyBoardName => $item)

            <div class="row" id="result">

                <div class="col-md-12 mx-auto text-center pt-5 ">
                    <div class="headBox">
                        <h3>{{ $keyBoardName }} X {{ count($item) }}
                            <hr>
                            Square
                        </h3>
                        <p>${{ $item[0]['price'] }}</p>
                    </div>
                </div>


                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Right Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayFourthAmount"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Wrong Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}wrongWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}wrongWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}wrongWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}wrongWayFourthAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Plus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayFirstPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWaySecondPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayThirdPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayFourthPlusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Minus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayFirstMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWaySecondMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayThirdMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyTen . '' . $item[0]['price'] }}rightWayFourthMinusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            @php
                $keyTen++;
            @endphp
        @endforeach

        @php
            $keyTwenty = 0;
        @endphp
        @foreach ($twenty as $keyBoardName => $item)

            <div class="row" id="result">

                <div class="col-md-12 mx-auto text-center pt-5 ">
                    <div class="headBox">
                        <h3>{{ $keyBoardName }} X {{ count($item) }}
                            <hr>
                            Square
                        </h3>
                        <p>${{ $item[0]['price'] }}</p>
                    </div>
                </div>


                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Right Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayFourthAmount"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Wrong Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}wrongWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}wrongWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}wrongWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}wrongWayFourthAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Plus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayFirstPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWaySecondPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayThirdPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayFourthPlusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Minus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayFirstMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWaySecondMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayThirdMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyTwenty . '' . $item[0]['price'] }}rightWayFourthMinusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            @php
                $keyTwenty++;
            @endphp
        @endforeach

        @php
            $keyThirty = 0;
        @endphp
        @foreach ($thirty as $keyBoardName => $item)

            <div class="row" id="result">

                <div class="col-md-12 mx-auto text-center pt-5 ">
                    <div class="headBox">
                        <h3>{{ $keyBoardName }} X {{ count($item) }}
                            <hr>
                            Square
                        </h3>
                        <p>${{ $item[0]['price'] }}</p>
                    </div>
                </div>


                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Right Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayFourthAmount"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Wrong Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}wrongWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}wrongWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}wrongWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}wrongWayFourthAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Plus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayFirstPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWaySecondPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayThirdPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayFourthPlusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Minus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayFirstMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWaySecondMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayThirdMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyThirty . '' . $item[0]['price'] }}rightWayFourthMinusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            @php
                $keyThirty++;
            @endphp
        @endforeach

        @php
            $keyFourty = 0;
        @endphp
        @foreach ($fourty as $keyBoardName => $item)

            <div class="row" id="result">

                <div class="col-md-12 mx-auto text-center pt-5 ">
                    <div class="headBox">
                        <h3>{{ $keyBoardName }} X {{ count($item) }}
                            <hr>
                            Square
                        </h3>
                        <p>${{ $item[0]['price'] }}</p>
                    </div>
                </div>


                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Right Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayFourthAmount"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Wrong Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}wrongWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}wrongWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}wrongWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}wrongWayFourthAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Plus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayFirstPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWaySecondPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayThirdPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayFourthPlusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Minus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayFirstMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWaySecondMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayThirdMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyFourty . '' . $item[0]['price'] }}rightWayFourthMinusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            @php
                $keyFourty++;
            @endphp
        @endforeach

        @php
            $keyFifty = 0;
        @endphp
        @foreach ($fifty as $keyBoardName => $item)

            <div class="row" id="result">

                <div class="col-md-12 mx-auto text-center pt-5 ">
                    <div class="headBox">
                        <h3>{{ $keyBoardName }} X {{ count($item) }}
                            <hr>
                            Square
                        </h3>
                        <p>${{ $item[0]['price'] }}</p>
                    </div>
                </div>


                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Right Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayFourthAmount"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Wrong Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}wrongWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}wrongWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}wrongWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}wrongWayFourthAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Plus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayFirstPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWaySecondPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayThirdPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayFourthPlusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Minus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayFirstMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWaySecondMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayThirdMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyFifty . '' . $item[0]['price'] }}rightWayFourthMinusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            @php
                $keyFifty++;
            @endphp
        @endforeach

        @php
            $keyOthers = 0;
        @endphp
        @foreach ($others as $keyBoardName => $item)

            <div class="row" id="result">

                <div class="col-md-12 mx-auto text-center pt-5 ">
                    <div class="headBox">
                        <h3>{{ $keyBoardName }} X {{ count($item) }}
                            <hr>
                            Square
                        </h3>
                        <p>${{ $item[0]['price'] }}</p>
                    </div>
                </div>


                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Right Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayFourthAmount"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Wrong Way</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}wrongWayFirstAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}wrongWaySecondAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}wrongWayThirdAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}wrongWayFourthAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Plus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayFirstPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWaySecondPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayThirdPlusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayFourthPlusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th>Minus 2</th>
                                <th>Pay Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1<sub>st</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayFirstMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>2<sup>nd</sup> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWaySecondMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>3<sub>rd</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayThirdMinusAmount"></td>
                            </tr>
                            <tr>
                                <td>4<sub>th</sub> Qtr</td>
                                <td id="{{ $keyOthers . '' . $item[0]['price'] }}rightWayFourthMinusAmount"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            @php
                $keyOthers++;
            @endphp
        @endforeach --}}


    </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            let keys = [];

            @php
                $keyTen = 0;
            @endphp

            @foreach ($ten as $keyBoardName => $item)

                var key = "{{ $keyTen }}";
                var price = "{{ $item[0]['price'] }}";
                // console.log(price);
                var totalAmount = price * 100;
                var adminPercentage = (20 / 100) * totalAmount;
                var minusAdminPercentage = totalAmount - adminPercentage;

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

                showAmount(nullArrPercentage, key, price);

                @php
                    $keyTen++;
                @endphp
            @endforeach


            @php
                $keyTwenty = 0;
            @endphp
            @foreach ($twenty as $keyBoardName => $item)

                var key = "{{ $keyTwenty }}";
                var price = "{{ $item[0]['price'] }}";
                // console.log(price);
                var totalAmount = price * 100;
                var adminPercentage = (20 / 100) * totalAmount;
                var minusAdminPercentage = totalAmount - adminPercentage;

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

                showAmount(nullArrPercentage, key, price);

                @php
                    $keyTwenty++;
                @endphp
            @endforeach


            @php
                $keyThirty = 0;
            @endphp
            @foreach ($thirty as $keyBoardName => $item)

                var key = "{{ $keyThirty }}";
                var price = "{{ $item[0]['price'] }}";
                // console.log(price);
                var totalAmount = price * 100;
                var adminPercentage = (20 / 100) * totalAmount;
                var minusAdminPercentage = totalAmount - adminPercentage;

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

                showAmount(nullArrPercentage, key, price);

                @php
                    $keyThirty++;
                @endphp
            @endforeach


            @php
                $keyFourty = 0;
            @endphp
            @foreach ($fourty as $keyBoardName => $item)

                var key = "{{ $keyFourty }}";
                var price = "{{ $item[0]['price'] }}";
                // console.log(price);
                var totalAmount = price * 100;
                var adminPercentage = (20 / 100) * totalAmount;
                var minusAdminPercentage = totalAmount - adminPercentage;

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

                showAmount(nullArrPercentage, key, price);

                @php
                    $keyFourty++;
                @endphp
            @endforeach


            @php
                $keyFifty = 0;
            @endphp
            @foreach ($fifty as $keyBoardName => $item)

                var key = "{{ $keyFifty }}";
                var price = "{{ $item[0]['price'] }}";

                // console.log(price);
                var totalAmount = price * 100;
                var adminPercentage = (20 / 100) * totalAmount;
                var minusAdminPercentage = totalAmount - adminPercentage;

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

                showAmount(nullArrPercentage, key, price);

                @php
                    $keyFifty++;
                @endphp
            @endforeach


            @php
                $keyOthers = 0;
            @endphp
            @foreach ($others as $keyBoardName => $item)

                var key = "{{ $keyOthers }}";
                var price = "{{ $item[0]['price'] }}";
                // console.log(price);
                var totalAmount = price * 100;
                var adminPercentage = (20 / 100) * totalAmount;
                var minusAdminPercentage = totalAmount - adminPercentage;

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

                showAmount(nullArrPercentage, key, price);

                @php
                    $keyOthers++;
                @endphp
            @endforeach


            function showAmount(nullArrPercentage, key, price) {

                console.log(`#${key+price}rightWayFirstAmount`);
                $(`#${key+price}rightWayFirstAmount`).text(`$${nullArrPercentage[0]}`);
                $(`#${key+price}rightWayFirstPlusAmount`).text(`$${nullArrPercentage[1]}`);
                $(`#${key+price}wrongWayFirstAmount`).text(`$${nullArrPercentage[2]}`);
                $(`#${key+price}rightWayFirstMinusAmount`).text(`$${nullArrPercentage[3]}`);

                $(`#${key+price}rightWaySecondAmount`).text(`$${nullArrPercentage[4]}`);
                $(`#${key+price}rightWaySecondPlusAmount`).text(`$${nullArrPercentage[5]}`);
                $(`#${key+price}wrongWaySecondAmount`).text(`$${nullArrPercentage[6]}`);
                $(`#${key+price}rightWaySecondMinusAmount`).text(`$${nullArrPercentage[7]}`);

                $(`#${key+price}rightWayThirdAmount`).text(`$${nullArrPercentage[8]}`);
                $(`#${key+price}rightWayThirdPlusAmount`).text(`$${nullArrPercentage[9]}`);
                $(`#${key+price}wrongWayThirdAmount`).text(`$${nullArrPercentage[10]}`);
                $(`#${key+price}rightWayThirdMinusAmount`).text(`$${nullArrPercentage[11]}`);

                $(`#${key+price}rightWayFourthAmount`).text(`$${nullArrPercentage[12]}`);
                $(`#${key+price}rightWayFourthPlusAmount`).text(`$${nullArrPercentage[13]}`);
                $(`#${key+price}wrongWayFourthAmount`).text(`$${nullArrPercentage[14]}`);
                $(`#${key+price}rightWayFourthMinusAmount`).text(`$${nullArrPercentage[15]}`);
            }

            showAmount();


        });
    </script>
@endpush
