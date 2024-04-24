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





            {{--  @if ($dateFormat >= $board->voting_start_date)

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

            @endif --}}



            <div>

                @if (count($votingBoard) > 0)

                    <div class="row">

                        <div class="col-md-8">

                            <div class="alias-name">

                                <h4>Hello: {{ auth()->user()->alias }}</h4>

                            </div>

                            @foreach ($votingBoard as $list)

                                <div class="voting-board-top">

                                    <div class="left">

                                        <p>Game Date: {{ date('d/m/Y', strtotime($list->game_date)) }}</p>

                                    </div>

                                    <div class="right">

                                        <p>Voting Deadline: {{ date('d/m/Y', strtotime($list->voting_deadline)) }}</p>

                                    </div>

                                </div>

                                <div class="voting_graph mb-5">

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



                                                <td id="10" scope="col" class="">

                                                    @php

                                                        if ($list->ten == 0) {

                                                            echo 0;

                                                        } else {

                                                            echo count(json_decode($list->ten));

                                                        }

                                                    @endphp

                                                </td>

                                                <td id="20" scope="col" class="">

                                                    @php

                                                        if ($list->twenty == 0) {

                                                            echo 0;

                                                        } else {

                                                            echo count(json_decode($list->twenty));

                                                        }

                                                    @endphp

                                                </td>

                                                <td id="30" scope="col" class="">

                                                    @php

                                                        if ($list->thirty == 0) {

                                                            echo 0;

                                                        } else {

                                                            echo count(json_decode($list->thirty));

                                                        }

                                                    @endphp

                                                </td>

                                                <td id="40" scope="col" class="">

                                                    @php

                                                        if ($list->fourty == 0) {

                                                            echo 0;

                                                        } else {

                                                            echo count(json_decode($list->fourty));

                                                        }

                                                    @endphp

                                                </td>

                                                <td id="50" scope="col" class="">

                                                    @php

                                                        if ($list->fifty == 0) {

                                                            echo 0;

                                                        } else {

                                                            echo count(json_decode($list->fifty));

                                                        }

                                                    @endphp

                                                </td>

                                                <td id="others" scope="col" class="">

                                                    @php

                                                        if ($list->others == 0) {

                                                            echo 0;

                                                        } else {

                                                            echo count(json_decode($list->others));

                                                        }

                                                    @endphp

                                                </td>



                                            </tr>

                                        </tbody>

                                    </table>



                                    <h3 class="text-white">({{ $list->team_name_x }}) VS ({{ $list->team_name_y }})</h3>



                                    <canvas id="myChart" class="d-none"></canvas>

                                </div>

                            @endforeach

                        </div>



                        <div class="offset-md-1 col-md-3 mt-5">

                            <div class="voting_board_numbers voting_new_board">





                                <button data-id="10" type="button" class="get-vote 10_dollerModal" data-toggle="modal"

                                    data-target="#exampleModal10">$10 Board</button>

                                <button data-id="20" type="button" class="get-vote 10_dollerModal" data-toggle="modal"

                                    data-target="#exampleModal20">$20 Board</button>

                                <button data-id="30" type="button" class="get-vote 10_dollerModal" data-toggle="modal"

                                    data-target="#exampleModal30">$30 Board</button>

                                <button data-id="40" type="button" class="get-vote 10_dollerModal" data-toggle="modal"

                                    data-target="#exampleModal40">$40 Board</button>

                                <button data-id="50" type="button" class="get-vote 10_dollerModal" data-toggle="modal"

                                    data-target="#exampleModal50">$50 Board</button>

                                <button data-id="others" type="button" class="get-vote 10_dollerModal"

                                    data-toggle="modal" data-target="#exampleModalothers">Others</button>





                                <!-- Modal -->

                                <div class="modal fade getModalBody" tabindex="-1" role="dialog"

                                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog" role="document">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

                                                <button type="button" class="close" data-dismiss="modal"

                                                    aria-label="Close">

                                                    <span aria-hidden="true">&times;</span>

                                                </button>

                                            </div>



                                            <div class="modal-body">

                                                <p></p>

                                                @foreach ($votingBoard as $list)

                                                    <div class="d-flex align-items-start justify-content-between">

                                                        <p>{{ $list->board_name }}</p>

                                                        <button class="get-vote-board" data-id="{{ $list->id }}">Vote

                                                            For

                                                            <span></span></button>

                                                    </div>

                                                @endforeach

                                            </div>



                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>



                    </div>

                @else

                    <div class="row">

                        <div class="col-md-12">

                            <div class="text-center">There are no board in the voting face.</div>

                        </div>

                    </div>

                @endif

            </div>





        </div>

    </section>

@endsection



@push('js')

    <script>

        $(document).ready(function() {

            $('.10_dollerModal').on('click', function() {



                $('.getModalBody').attr('id', 'exampleModal' + $(this).data('id'))

                $('.modal-body span').text($(this).data('id'));

                $('#exampleModalLabel').text("$" + $(this).data('id') + " Vote");

                $('.modal-body button').attr('data-price', $(this).data('id'));



            });





            var user_id =

                ' @if (isset(auth()->user()->id)) {{ auth()->user()->id }} @endif ';



            $('.get-vote-board').click(function() {



                let id = $(this).data('id');

                let vote_board = $(this).data('price');



                // check validation start

                let dataCheck = {

                    'id': id,

                    '_token': '{{ csrf_token() }}',

                };

                let urlCheck = "{{ route('voting_poll_new_getSelectingPrice') }}";

                let response = AjaxRequest(urlCheck, dataCheck);

                // check validation end





                let status = func(user_id, response);

                let checkArrValue = checkArr(response);



                if (status == false) {



                    console.log(checkArrValue)

                    console.log(checkArrValue[0])

                    console.log('test done')

                    // return false;



                    let data = {

                        'id': id,

                        'board': vote_board,

                        '_token': '{{ csrf_token() }}',

                    };



                    let url = "{{ route('vote.store') }}";





                    let response = AjaxRequest(url, data);



                    console.log(response);



                    if (response) {

                        alert('ThankYou for vote');

                    }



                    if (response.board == 10) {

                        checkArrValue[0] = response.array

                        // ten = response.array

                    }

                    if (response.board == 20) {

                        checkArrValue[1] = response.array

                        // twenty = response.array

                    }

                    if (response.board == 30) {

                        checkArrValue[2] = response.array

                        // thirty = response.array

                    }

                    if (response.board == 40) {

                        checkArrValue[3] = response.array

                        // fourty = response.array

                    }

                    if (response.board == 50) {

                        checkArrValue[4] = response.array

                        // fifty = response.array

                    }

                    if (response.board == 'others') {

                        checkArrValue[5] = response.array

                        // others = response.array

                    }



                    // console.log(ten, twenty, thirty, fourty, fifty, others);



                } else if (status == true) {

                    alert('sorry you have already voted')

                }



            });



            function func(user_id, response) {

                let status = false;



                if (

                    response.data.ten.includes(parseInt(user_id)) || response.data.twenty.includes(parseInt(

                        user_id)) || response.data.thirty.includes(

                        parseInt(user_id)) || response.data.fourty.includes(parseInt(user_id)) || response.data

                    .fifty.includes(parseInt(

                        user_id)) || response.data.others.includes(parseInt(user_id))

                ) {

                    status = true;

                }

                return status;

            }



            function checkArr(response) {



                var ten = (response.data.ten == [0]) ? [] : JSON.parse(response.data.ten);

                var twenty = (response.data.twenty == [0]) ? [] : JSON.parse(response.data.twenty);

                var thirty = (response.data.thirty == [0]) ? [] : JSON.parse(response.data.thirty);

                var fourty = (response.data.fourty == [0]) ? [] : JSON.parse(response.data.fourty);

                var fifty = (response.data.fifty == [0]) ? [] : JSON.parse(response.data.fifty);

                var others = (response.data.others == [0]) ? [] : JSON.parse(response.data.others);



                let arr = [ten, twenty, thirty, fourty, fifty, others];

                return arr;

            }

        });

    </script>

@endpush

