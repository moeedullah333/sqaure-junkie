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
            /* background-color: rgb(255, 209, 217); */
        }

        .table-quater td:first-child,
        .table-quater th:first-child {
            border-right: none;
            /* background-color: rgb(56 215 56 / 51%); */
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

        td.dataColor1 {
            background-color: rgb(37, 245, 249);
            font-weight: 600;

        }

        td.dataColor2 {
            background-color: rgb(255 198 38 / 69%);
            font-weight: 600;
        }

        td.dataColor3 {
            background-color: black;
            color: yellow;
            font-size: 15px;
            font-weight: 600;
        }

        td.dataColor4 {
            background-color: rgb(255, 209, 217);
            font-weight: 600;

        }

        td.dataColor5 {
            background-color: rgba(104, 250, 104, 0.51);
            font-weight: 600;

        }

        .dataHeadColor {
            background-color: #19376b;
            color: white;
        }

        /*  */
    </style>

    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Schedule & Deadline Current Week</h3>
            </div>
        </div>

        @if (count($boards) > 0)
            @foreach ($boards as $item)
                <div class="row" id="result">

                    <div class="col-md-12">
                        {{-- <h3 class="mt-5 text-capitalize"> : </h3> --}}

                        <div class="col-md-10 mt-4">
                            <div class="our_winners_content">
                                <h1>{{ $item->board_name }} <span>Board Name</span></h1>
                            </div>
                        </div>
                        <table class="table-quater">
                            <thead>
                                <tr>
                                    <th class="dataHeadColor">Day</th>
                                    <th class="dataHeadColor">Task</th>
                                    <th class="dataHeadColor">Open</th>
                                    <th class="dataHeadColor">Deadline (Closed)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="dataColor1">Sunday</td>
                                    <td class="dataColor2">Game Day</td>
                                    <td colspan="2" class="dataColor3">Payout after Game - Winner Online</td>
                                </tr>
                                <tr>
                                    <td class="dataColor1">Monday</td>
                                    <td class="dataColor2">Vote Day</td>
                                    <td class="dataColor4">
                                        {{ Carbon\Carbon::parse($item->voting_start_date)->format('h:i A') }}</td>
                                    <td class="dataColor5">
                                        {{ Carbon\Carbon::parse($item->voting_deadline)->format('h:i A l') }}</td>
                                </tr>
                                <tr>
                                    <td class="dataColor1">Tuesday</td>
                                    <td class="dataColor2">Select Square</td>
                                    <td class="dataColor4">
                                        {{ Carbon\Carbon::parse($item->square_start_date)->format('h:i A') }}</td>
                                    <td class="dataColor5">
                                        {{ Carbon\Carbon::parse($item->square_deadline)->format('h:i A l') }}</td>
                                </tr>
                                <tr>
                                    <td class="dataColor1">Wednesday</td>
                                    <td class="dataColor2">Payment Day</td>
                                    <td class="dataColor4">
                                        {{ Carbon\Carbon::parse($item->payment_start_date)->format('h:i A') }}</td>
                                    <td class="dataColor5">
                                        {{ Carbon\Carbon::parse($item->payment_deadline)->format('h:i A') }}</td>
                                </tr>
                                <tr>
                                    <td class="dataColor1">Thursday</td>
                                    <td class="dataColor2">Num Generation (Live / online)</td>
                                    <td class="dataColor4">
                                        {{ Carbon\Carbon::parse($item->generate_number)->format('h:i A') }}</td>
                                    <td class="dataColor5">Until all done</td>
                                </tr>
                                <tr>
                                    <td class="dataColor1">Friday</td>
                                    <td class="dataColor2"></td>
                                    <td class="dataColor4"></td>
                                    <td class="dataColor5"></td>
                                </tr>
                                <tr>
                                    <td class="dataColor1">Saturday</td>
                                    <td class="dataColor2"></td>
                                    <td class="dataColor4"></td>
                                    <td class="dataColor5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            @endforeach

            <div class="d-flex justify-content-end mt-3">
                {{ $boards->links() }}
            </div>
        @else
            <div class="row">
                <div class="col-md-12">

                    <table class="table-quater">
                        <thead>
                            <tr>
                                <th class="dataHeadColor">Day</th>
                                <th class="dataHeadColor">Task</th>
                                <th class="dataHeadColor">Open</th>
                                <th class="dataHeadColor">Deadline (Closed)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="dataColor1">Sunday</td>
                                <td class="dataColor2">Game Day</td>
                                <td colspan="2" class="dataColor3">Payout after Game - Winner Online</td>
                            </tr>
                            <tr>
                                <td class="dataColor1">Monday</td>
                                <td class="dataColor2">Vote Day</td>
                                <td class="dataColor4">5:00 AM</td>
                                <td class="dataColor5">5:00 am Tues.</td>
                            </tr>
                            <tr>
                                <td class="dataColor1">Tuesday</td>
                                <td class="dataColor2">Select Square</td>
                                <td class="dataColor4">6:00 AM</td>
                                <td class="dataColor5">6:00 am Weds.</td>
                            </tr>
                            <tr>
                                <td class="dataColor1">Wednesday</td>
                                <td class="dataColor2">Payment Day</td>
                                <td class="dataColor4">7:00 AM</td>
                                <td class="dataColor5">12:00 am </td>
                            </tr>
                            <tr>
                                <td class="dataColor1">Thursday</td>
                                <td class="dataColor2">Num Generation (Live / online)</td>
                                <td class="dataColor4">7:00 PM</td>
                                <td class="dataColor5">Until all done</td>
                            </tr>
                            <tr>
                                <td class="dataColor1">Friday</td>
                                <td class="dataColor2"></td>
                                <td class="dataColor4"></td>
                                <td class="dataColor5"></td>
                            </tr>
                            <tr>
                                <td class="dataColor1">Saturday</td>
                                <td class="dataColor2"></td>
                                <td class="dataColor4"></td>
                                <td class="dataColor5"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        @endif
    </div>
    </div>
@endsection

@push('js')
@endpush
