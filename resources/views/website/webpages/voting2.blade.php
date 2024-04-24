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
                                    <td id="10" class="whiteColor">votes</td>
                                    <td id="20" class="whiteColor">votes</td>
                                    <td id="30" class="whiteColor">votes</td>
                                    <td id="40" class="whiteColor">votes</td>
                                    <td id="50" class="whiteColor">votes</td>
                                    <td id="others" class="whiteColor">votes</td>
                                </tr>
                            </tbody>
                        </table>


                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td scope="col" class="bg_blue">Results</td>
                                    <td scope="col" class="bg_blue">10x10_4</td>

                                    <td scope="col"
                                        class=" @if ($keys == '') @else
                                        {{ $keys[0] == 'ten' || ($keys[1] == 'ten' && $newArray['ten'] > 0) ? 'bg-success' : 'bg-danger' }} @endif ">
                                        $24</td>
                                    <td scope="col"
                                        class="@if ($keys == '') @else
                                    {{ $keys[0] == 'twenty' || ($keys[1] == 'twenty' && $newArray['twenty'] > 0) ? 'bg-success' : 'bg-danger' }} @endif">
                                        $101</td>
                                    <td scope="col"
                                        class="@if ($keys == '') @else
                                    {{ $keys[0] == 'thirty' || ($keys[1] == 'thirty' && $newArray['thirty'] > 0) ? 'bg-success' : 'bg-danger' }} @endif">
                                        $100</td>
                                    <td scope="col"
                                        class="@if ($keys == '') @else
                                    {{ $keys[0] == 'fourty' || ($keys[1] == 'fourty' && $newArray['fourty'] > 0) ? 'bg-success' : 'bg-danger' }} @endif">
                                        $90</td>
                                    <td scope="col"
                                        class="@if ($keys == '') @else
                                    {{ $keys[0] == 'fifty' || ($keys[1] == 'fifty' && $newArray['fifty'] > 0) ? 'bg-success' : 'bg-danger' }} @endif">
                                        $80</td>
                                    <td scope="col"
                                        class="@if ($keys == '') @else
                                    {{ $keys[0] == 'others' || ($keys[1] == 'others' && $newArray['others'] > 0) ? 'bg-success' : 'bg-danger' }} @endif">
                                        $80</td>
                                </tr>
                            </tbody>
                        </table>
                        <canvas id="myChart"></canvas>
                    </div>

                </div>
                <div class="offset-md-1 col-md-3 align-self-center">
                    <div class="voting_board_numbers">



                        @if ($current_date == $board->voting_deadline || $current_date > $board->voting_deadline)
                            @if ($keys[0] == 'ten' || ($keys[1] == 'ten' && $newArray['ten'] > 0))
                                <a href="{{ route('user.board', 'ten') }}">
                                    <button class="active ">$10 Board</button>
                                </a>
                            @else
                                <button disabled class="">$10 Board</button>
                            @endif

                            @if ($keys[0] == 'twenty' || ($keys[1] == 'twenty' && $newArray['twenty'] > 0))
                                <a href="{{ route('user.board', 'twenty') }}">
                                    <button class=" active ">$20 Board</button>
                                </a>
                            @else
                                <button disabled class="">$20 Board</button>
                            @endif


                            @if ($keys[0] == 'thirty' || ($keys[1] == 'thirty' && $newArray['thirty'] > 0))
                                <a href="{{ route('user.board', 'thirty') }}">
                                    <button class="active ">$30 Board</button>
                                </a>
                            @else
                                <button disabled class="">$30 Board</button>
                            @endif

                            @if ($keys[0] == 'fourty' || ($keys[1] == 'fourty' && $newArray['fourty'] > 0))
                                <a href="{{ route('user.board', 'fourty') }}">
                                    <button class="active ">$40 Board</button>
                                </a>
                            @else
                                <button disabled class="">$40 Board</button>
                            @endif


                            @if ($keys[0] == 'fifty' || ($keys[1] == 'fifty' && $newArray['fifty'] > 0))
                                <a href="{{ route('user.board', 'fifty') }}">
                                    <button class=" active ">$50
                                        Board</button>
                                </a>
                            @else
                                <button disabled class="">$50
                                    Board</button>
                            @endif


                            @if ($keys[0] == 'others' || ($keys[1] == 'others' && $newArray['others'] > 0))
                                <a href="{{ route('user.board', 'others') }}">
                                    <button class=" active ">Others</button>
                                </a>
                            @else
                                <button disabled class="">Others</button>
                            @endif
                        @else
                            <button data-id="10" class="get-vote">$10 Board</button>
                            <button data-id="20" class="get-vote">$20 Board</button>
                            <button data-id="30" class="get-vote">$30 Board</button>
                            <button data-id="40" class="get-vote">$40 Board</button>
                            <button data-id="50" class="get-vote">$50 Board</button>
                            <button data-id="others" class="get-vote">Others</button>
                        @endif
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

        $('#10').text(ten.length);
        $('#20').text(twenty.length);
        $('#30').text(thirty.length);
        $('#40').text(fourty.length);
        $('#50').text(fifty.length);
        $('#others').text(others.length);

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
