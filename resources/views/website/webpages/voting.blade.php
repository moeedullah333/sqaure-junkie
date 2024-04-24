@extends('website.layouts.main')
@section('content')
    <section class="banner-div">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>Voting</h1>
                    <div class="text-center py-3">
                        <span><a href="javascript:;">Home</a></span>
                        <span><a href="javascript:;">voting</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="voting_main_section">
        <div class="container">

            {{-- @dd($keys) --}}
            {{-- {{ $dateFormat  . " -> " .  $board->voting_start_date}} --}}

            @if ($dateFormat >= $board->voting_start_date)
                <style>
                    #votingTimeShow {
                        display: none;
                    }
                </style>
            @else
                @php
                    $newDate = date('F-Y-d h:i:s A', strtotime($board->voting_start_date));
                @endphp
                <p id="votingTimeShow" class="text-center">Voting Start time is <br> <b>{{ $newDate }}</b></p>
            @endif

            <div class="{{ $dateFormat >= $board->voting_start_date ? 'd-block' : 'd-none' }}">

                <div class="row">
                    <div class="col-md-8">
                        <div class="alias-name">
                            <h4>Hello: {{ auth()->user()->alias }}</h4>
                        </div>

                        <div class="voting-board-top">
                            <div class="left">
                                <p>Game Date: {{ date('d/m/Y', strtotime($board->game_date)) }}</p>
                            </div>
                            <div class="right">
                                <p>Voting Deadline: {{ date('d/m/Y', strtotime($board->voting_deadline)) }}</p>
                            </div>
                        </div>
                        <div class="voting_graph">
                            
                            <table class="table table-bordered">
                                <tr>
                                    <td scope="col" class="bg_blue">Cowboys</td>
                                    <td scope="col" class="bg_blue">Menu</td>
                                    <td scope="col" class="bg_blue">$10</td>
                                    <td scope="col" class="bg_blue">$20</td>
                                    <td scope="col" class="bg_blue">$30</td>
                                    <td scope="col" class="bg_blue">$40</td>
                                    <td scope="col" class="bg_blue">$50</td>
                                    <td scope="col" class="bg_blue">Other</td>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td class="bg_blue">Votes</td>
                                        <td class="bg_blue">10x10_4</td>
                                        <td id="" class="whiteColor">votes</td>
                                        <td id="" class="whiteColor">votes</td>
                                        <td id="" class="whiteColor">votes</td>
                                        <td id="" class="whiteColor">votes</td>
                                        <td id="" class="whiteColor">votes</td>
                                        <td id="" class="whiteColor">votes</td>
                                    </tr>
                                </tbody>
                            </table>


                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td scope="col" class="bg_blue">Results</td>
                                        <td scope="col" class="bg_blue">10x10_4</td>

                                        <td id="10" scope="col" class="">$24</td>
                                        <td id="20" scope="col" class="">$24</td>
                                        <td id="30" scope="col" class="">$24</td>
                                        <td id="40" scope="col" class="">$24</td>
                                        <td id="50" scope="col" class="">$24</td>
                                        <td id="others" scope="col" class="">$24</td>

                                        {{-- <td id="res_10" scope="col"
                                            class=" @if ($keys == '') @else
                                            {{ $keys[0] == 'ten' > 100 || $keys[1] == 'ten' > 100 || $keys[2] == 'ten' > 100 || $keys[3] == 'ten' > 100 || $keys[4] == 'ten' > 100 || $keys[5] == 'ten' > 100 ? 'bg-success' : 'bg-danger' }} @endif ">
                                            $24</td>
                                        <td id="res_20" scope="col"
                                            class="@if ($keys == '') @else
                                        {{ $keys[0] == 'twenty' > 100 || $keys[1] == 'twenty' > 100 || $keys[2] == 'twenty' > 100 || $keys[3] == 'twenty' > 100 || $keys[4] == 'twenty' > 100 || $keys[5] == 'twenty' > 100  ? 'bg-success' : 'bg-danger' }} @endif">
                                            $101</td>


                                        <td id="res_30" scope="col"
                                            class="@if ($keys == '') @else
                                        {{ $keys[0] == 'thirty' > 100 || $keys[1] == 'thirty' > 100 || $keys[2] == 'thirty' > 100 || $keys[3] == 'thirty' > 100 || $keys[4] == 'thirty' > 100 || $keys[5] == 'thirty' > 100  ? 'bg-success' : 'bg-danger' }} @endif">
                                            $100</td>

                                        <td id="res_40" scope="col"
                                            class="@if ($keys == '') @else
                                        {{ $keys[0] == 'fourty' > 100 || $keys[1] == 'fourty' > 100 || $keys[2] == 'fourty' > 100 || $keys[3] == 'fourty' > 100 || $keys[4] == 'fourty' > 100 || $keys[5] == 'fourty' > 100  ? 'bg-success' : 'bg-danger' }} @endif">
                                            $90</td>

                                        <td id="res_50" scope="col"
                                            class="@if ($keys == '') @else
                                        {{ $keys[0] == 'fifty' > 100 || $keys[1] == 'fifty' > 100 || $keys[2] == 'fifty' > 100 || $keys[3] == 'fifty' > 100 || $keys[4] == 'fifty' > 100 || $keys[5] == 'fifty' > 100  ? 'bg-success' : 'bg-danger' }} @endif">
                                            $80</td>

                                        <td id="res_others" scope="col"
                                            class="@if ($keys == '') @else
                                        {{ $keys[0] == 'others' > 100 || $keys[1] == 'others' > 100 || $keys[2] == 'others' > 100 || $keys[3] == 'others' > 100 || $keys[4] == 'others' > 100 || $keys[5] == 'others' > 100 ? 'bg-success' : 'bg-danger' }} @endif">
                                            $80</td> --}}
                                    </tr>
                                </tbody>
                            </table>

                            <h3 class="text-white">({{ $board->team_name_x }}) VS ({{ $board->team_name_y }})</h3>

                            <canvas id="myChart" class="d-none"></canvas>
                        </div>

                    </div>

                    <div class="offset-md-1 col-md-3 align-self-center">
                        <div class="voting_board_numbers">

                            @if ($dateFormat == $board->voting_deadline || $dateFormat > $board->voting_deadline)
                                @if (
                                    (isset($keys[0]) && $keys[0] === 'ten') ||
                                        (isset($keys[1]) && $keys[1] === 'ten') ||
                                        (isset($keys[2]) && $keys[2] === 'ten') ||
                                        (isset($keys[3]) && $keys[3] === 'ten') ||
                                        (isset($keys[4]) && $keys[4] === 'ten') ||
                                        (isset($keys[5]) && $keys[5] === 'ten'))
                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 10]) }}">
                                        <button class="active ">$10 Board</button>
                                    </a>
                                @else
                                    <button disabled class="">$10 Board</button>
                                @endif

                                @if (
                                    (isset($keys[0]) && $keys[0] === 'twenty') ||
                                        (isset($keys[1]) && $keys[1] === 'twenty') ||
                                        (isset($keys[2]) && $keys[2] === 'twenty') ||
                                        (isset($keys[3]) && $keys[3] === 'twenty') ||
                                        (isset($keys[4]) && $keys[4] === 'twenty') ||
                                        (isset($keys[5]) && $keys[5] === 'twenty'))
                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 20]) }}">
                                        <button class=" active ">$20 Board</button>
                                    </a>
                                @else
                                    <button disabled class="">$20 Board</button>
                                @endif


                                @if (
                                    (isset($keys[0]) && $keys[0] === 'thirty') ||
                                        (isset($keys[1]) && $keys[1] === 'thirty') ||
                                        (isset($keys[2]) && $keys[2] === 'thirty') ||
                                        (isset($keys[3]) && $keys[3] === 'thirty') ||
                                        (isset($keys[4]) && $keys[4] === 'thirty') ||
                                        (isset($keys[5]) && $keys[5] === 'thirty'))
                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 30]) }}">
                                        <button class="active ">$30 Board</button>
                                    </a>
                                @else
                                    <button disabled class="">$30 Board</button>
                                @endif

                                @if (
                                    (isset($keys[0]) && $keys[0] === 'fourty') ||
                                        (isset($keys[1]) && $keys[1] === 'fourty') ||
                                        (isset($keys[2]) && $keys[2] === 'fourty') ||
                                        (isset($keys[3]) && $keys[3] === 'fourty') ||
                                        (isset($keys[4]) && $keys[4] === 'fourty') ||
                                        (isset($keys[5]) && $keys[5] === 'fourty'))
                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 40]) }}">
                                        <button class="active ">$40 Board</button>
                                    </a>
                                @else
                                    <button disabled class="">$40 Board</button>
                                @endif


                                @if (
                                    (isset($keys[0]) && $keys[0] === 'fifty') ||
                                        (isset($keys[1]) && $keys[1] === 'fifty') ||
                                        (isset($keys[2]) && $keys[2] === 'fifty') ||
                                        (isset($keys[3]) && $keys[3] === 'fifty') ||
                                        (isset($keys[4]) && $keys[4] === 'fifty') ||
                                        (isset($keys[5]) && $keys[5] === 'fifty'))
                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 50]) }}">
                                        <button class=" active ">$50
                                            Board</button>
                                    </a>
                                @else
                                    <button disabled class="">$50
                                        Board</button>
                                @endif


                                {{-- @if (
                                    (isset($keys[0]) && $keys[0] == 'others') ||
                                        (isset($keys[1]) && $keys[1] == 'others') ||
                                        (isset($keys[2]) && $keys[2] == 'others') ||
                                        (isset($keys[3]) && $keys[3] == 'others') ||
                                        (isset($keys[4]) && $keys[4] == 'others'))
                                    <a
                                        href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 'others']) }}">
                                        <button class=" active ">Others</button>
                                    </a>
                                @else
                                    <button disabled class="">Others</button>
                                @endif --}}
                            @else
                                <button data-id="10" class="get-vote">$10 Board</button>
                                <button data-id="20" class="get-vote">$20 Board</button>
                                <button data-id="30" class="get-vote">$30 Board</button>
                                <button data-id="40" class="get-vote">$40 Board</button>
                                <button data-id="50" class="get-vote">$50 Board</button>
                                {{-- <button data-id="others" class="get-vote">Others</button> --}}
                            @endif
                        </div>
                    </div>

                </div>
            </div>




        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            function func(user_id) {
                let status = false;

                if (
                    ten.includes(parseInt(user_id)) || twenty.includes(parseInt(user_id)) || thirty.includes(
                        parseInt(user_id)) || fourty.includes(parseInt(user_id)) || fifty.includes(parseInt(
                        user_id)) || others.includes(parseInt(user_id))
                ) {
                    status = true;
                }
                return status;
            }

            var user_id =
                ' @if (isset(auth()->user()->id)) {{ auth()->user()->id }} @endif ';
            var ten = ('{{ $board->ten }}' == [0]) ? [] : JSON.parse('{{ $board->ten }}');
            var twenty = ('{{ $board->twenty }}' == [0]) ? [] : JSON.parse('{{ $board->twenty }}');
            var thirty = ('{{ $board->thirty }}' == [0]) ? [] : JSON.parse('{{ $board->thirty }}');
            var fourty = ('{{ $board->fourty }}' == [0]) ? [] : JSON.parse('{{ $board->fourty }}');
            var fifty = ('{{ $board->fifty }}' == [0]) ? [] : JSON.parse('{{ $board->fifty }}');
            var others = ('{{ $board->others }}' == [0]) ? [] : JSON.parse('{{ $board->others }}');

            $('.get-vote').click(function() {

                let vote_board = $(this).data('id');
                let data = {
                    'id': " {{ $board->id }}",
                    'board': vote_board,
                    '_token': '{{ csrf_token() }}',
                };
                let url = "{{ route('vote.store') }}";

                let status = func(user_id);
                if (status == false) {

                    let response = AjaxRequest(url, data);

                    if (response) {
                        alert('ThankYou for vote');
                    }

                    if (response.board == 10) {
                        ten = response.array
                    }
                    if (response.board == 20) {
                        twenty = response.array
                    }
                    if (response.board == 30) {
                        thirty = response.array
                    }
                    if (response.board == 40) {
                        fourty = response.array
                    }
                    if (response.board == 50) {
                        fifty = response.array
                    }
                    if (response.board == 'others') {
                        others = response.array
                    }

                    // console.log(ten, twenty, thirty, fourty, fifty, others);

                } else if (status == true) {
                    alert('sorry you have already voted')
                }

            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ten = ('{{ $board->ten }}' == [0]) ? [] : JSON.parse('{{ $board->ten }}');
        var twenty = ('{{ $board->twenty }}' == [0]) ? [] : JSON.parse('{{ $board->twenty }}');
        var thirty = ('{{ $board->thirty }}' == [0]) ? [] : JSON.parse('{{ $board->thirty }}');
        var fourty = ('{{ $board->fourty }}' == [0]) ? [] : JSON.parse('{{ $board->fourty }}');
        var fifty = ('{{ $board->fifty }}' == [0]) ? [] : JSON.parse('{{ $board->fifty }}');
        var others = ('{{ $board->others }}' == [0]) ? [] : JSON.parse('{{ $board->others }}');

        // $('#res_10').text("$" + ten.length * 10);
        // $('#res_20').text("$" + twenty.length * 20);
        // $('#res_30').text("$" + thirty.length * 30);
        // $('#res_40').text("$" + fourty.length * 40);
        // $('#res_50').text("$" + fifty.length * 50);
        // $('#res_others').text(others.length);

        $('#10').text(ten.length);
        $('#20').text(twenty.length);
        $('#30').text(thirty.length);
        $('#40').text(fourty.length);
        $('#50').text(fifty.length);
        $('#others').text(others.length);

        if (ten.length > 100) {
            $('#10').addClass('bg-success');
        }else{
            $('#10').addClass('bg-danger');
        }

        if (twenty.length > 100) {
            $('#20').addClass('bg-success');
        }else{
            $('#20').addClass('bg-danger');
        }

        if (thirty.length > 100) {
            $('#30').addClass('bg-success');
        }else{
            $('#30').addClass('bg-danger');
        }

        if (fourty.length > 100) {
            $('#40').addClass('bg-success');
        }else{
            $('#40').addClass('bg-danger');
        }

        if (fifty.length > 100) {
            $('#50').addClass('bg-success');
        }else{
            $('#50').addClass('bg-danger');
        }

        if (others.length > 100) {
            $('#others').addClass('bg-success');
        }else{
            $('#others').addClass('bg-danger');
        }

        // console.log(ten.length * 10);
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            scaleLabelColor: "white",
            type: 'bar',
            data: {
                labels: ['$10', '$20', '$30', '$40', '$50', 'Other'],

                datasets: [{
                    label: '10x10_4',
                    data: [ten.length, twenty.length, thirty.length, fourty.length, fifty.length, others
                        .length
                    ],
                    borderWidth: 4,
                }]
            },
            options: {

                plugins: { // 'legend' now within object 'plugins {}'
                    legend: {
                        labels: {
                            color: "white", // not 'fontColor:' anymore
                            // fontSize: 18  // not 'fontSize:' anymore
                            font: {
                                size: 30 // 'size' now within object 'font {}'
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            },

        });
    </script>
@endpush
