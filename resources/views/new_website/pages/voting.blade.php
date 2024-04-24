@extends('new_website.layouts.main')



@section('content')

    <style>

        .bgbtn {



            background-color: #9afffe !important;

        }

    </style>

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

                    <h2 class="main_heading text-center">BOARD VOTING LIST</h2>

                </div>





                <x-main-banner />



            </div>

        </div>



    </section>





    <section class="voting_section">

        <div class="container">

            {{-- @if ($dateFormat >= $board->voting_start_date)

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



            <div class="row">

                <div class="col-md-12">



                    <div class="voting_details_info">

                        <h6 class="m-0">GAME DATE: {{ date('d/m/Y', strtotime($board->game_date)) }}</h6>



                        <p class="m-0 mx-auto">HELLO: {{ auth()->user()->alias }}</p>



                        <p class="m-0 mx-auto"> <a class="text-white" href="{{ route('user.dashboard') }}">Dashboard</a>

                        </p>



                        <h6 class="m-0">VOTING DEADLINE: {{ date('d/m/Y', strtotime($board->voting_deadline)) }}</h6>

                    </div>



                    <div class="main_voting_buttons">

                        <div class="voting_buttons">

                            <span>Menu</span>



                            @if ($dateFormat == $board->voting_deadline || $dateFormat > $board->voting_deadline)

                                @if (

                                    (isset($keys[0]) && $keys[0] === 'ten') ||

                                        (isset($keys[1]) && $keys[1] === 'ten') ||

                                        (isset($keys[2]) && $keys[2] === 'ten') ||

                                        (isset($keys[3]) && $keys[3] === 'ten') ||

                                        (isset($keys[4]) && $keys[4] === 'ten') ||

                                        (isset($keys[5]) && $keys[5] === 'ten'))

                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 10]) }}"

                                        class="board_price_anchor">

                                        <button class="board_price_btn btn">

                                            $10 Board

                                        </button>

                                    </a>

                                @else

                                    <button disabled class="board_price_btn btn">

                                        $10 Board

                                    </button>

                                @endif



                                @if (

                                    (isset($keys[0]) && $keys[0] === 'twenty') ||

                                        (isset($keys[1]) && $keys[1] === 'twenty') ||

                                        (isset($keys[2]) && $keys[2] === 'twenty') ||

                                        (isset($keys[3]) && $keys[3] === 'twenty') ||

                                        (isset($keys[4]) && $keys[4] === 'twenty') ||

                                        (isset($keys[5]) && $keys[5] === 'twenty'))

                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 20]) }}"

                                        class="board_price_anchor">

                                        <button class="board_price_btn btn">

                                            $20 Board

                                        </button>

                                    </a>

                                @else

                                    <button disabled class="board_price_btn btn">$20 Board</button>

                                @endif







                                @if (

                                    (isset($keys[0]) && $keys[0] === 'thirty') ||

                                        (isset($keys[1]) && $keys[1] === 'thirty') ||

                                        (isset($keys[2]) && $keys[2] === 'thirty') ||

                                        (isset($keys[3]) && $keys[3] === 'thirty') ||

                                        (isset($keys[4]) && $keys[4] === 'thirty') ||

                                        (isset($keys[5]) && $keys[5] === 'thirty'))

                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 30]) }}"

                                        class="board_price_anchor">

                                        <button class="board_price_btn btn">

                                            $30 Board

                                        </button>

                                    </a>

                                @else

                                    <button disabled class="board_price_btn btn">$30 Board</button>

                                @endif





                                @if (

                                    (isset($keys[0]) && $keys[0] === 'fourty') ||

                                        (isset($keys[1]) && $keys[1] === 'fourty') ||

                                        (isset($keys[2]) && $keys[2] === 'fourty') ||

                                        (isset($keys[3]) && $keys[3] === 'fourty') ||

                                        (isset($keys[4]) && $keys[4] === 'fourty') ||

                                        (isset($keys[5]) && $keys[5] === 'fourty'))

                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 40]) }}"

                                        class="board_price_anchor">

                                        <button class="board_price_btn btn">

                                            $40 Board

                                        </button>

                                    </a>

                                @else

                                    <button disabled class="board_price_btn btn">$40 Board</button>

                                @endif





                                @if (

                                    (isset($keys[0]) && $keys[0] === 'fifty') ||

                                        (isset($keys[1]) && $keys[1] === 'fifty') ||

                                        (isset($keys[2]) && $keys[2] === 'fifty') ||

                                        (isset($keys[3]) && $keys[3] === 'fifty') ||

                                        (isset($keys[4]) && $keys[4] === 'fifty') ||

                                        (isset($keys[5]) && $keys[5] === 'fifty'))

                                    <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 50]) }}"

                                        class="board_price_anchor">

                                        <button class="board_price_btn btn">

                                            $50 Board

                                        </button>

                                    </a>

                                @else

                                    <button disabled class="board_price_btn btn">$50

                                        Board</button>

                                @endif

                            @else

                                @php

                                    $tenDoller = is_array(json_decode($board->ten, true)) ? in_array(auth()->user()->id, json_decode($board->ten, true)) : false;

                                    $twentyDoller = is_array(json_decode($board->twenty, true)) ? in_array(auth()->user()->id, json_decode($board->twenty, true)) : false;

                                    $thirtyDoller = is_array(json_decode($board->thirty, true)) ? in_array(auth()->user()->id, json_decode($board->thirty, true)) : false;

                                    $fourtyDoller = is_array(json_decode($board->fourty, true)) ? in_array(auth()->user()->id, json_decode($board->fourty, true)) : false;

                                    $fiftyDoller = is_array(json_decode($board->fifty, true)) ? in_array(auth()->user()->id, json_decode($board->fifty, true)) : false;

                                    $othersDoller = is_array(json_decode($board->others, true)) ? in_array(auth()->user()->id, json_decode($board->others, true)) : false;

                                    // dd($tenDoller, $twentyDoller, $thirtyDoller, $fourtyDoller, $fiftyDoller, $othersDoller);

                                @endphp



                                @if ($tenDoller == true)

                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">

                                        $10 Board

                                    </button>

                                @else

                                    <button data-id="10" class="get-vote board_price_btn btn">$10 Board</button>

                                @endif



                                @if ($twentyDoller == true)

                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">$20

                                        Board</button>

                                @else

                                    <button data-id="20" class="get-vote board_price_btn btn">$20 Board</button>

                                @endif



                                @if ($thirtyDoller == true)

                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">$30

                                        Board</button>

                                @else

                                    <button data-id="30" class="get-vote board_price_btn btn">$30 Board</button>

                                @endif



                                @if ($fourtyDoller == true)

                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">$40

                                        Board</button>

                                @else

                                    <button data-id="40" class="get-vote board_price_btn btn">$40 Board</button>

                                @endif



                                @if ($fiftyDoller == true)

                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">$50

                                        Board</button>

                                @else

                                    <button data-id="50" class="get-vote board_price_btn btn">$50 Board</button>

                                @endif



                                @if ($othersDoller == true)

                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">

                                        Others

                                    </button>

                                @else

                                    <!-- Button trigger modal -->

                                    <button type="button" class="btn" data-toggle="modal" data-target="#othersModal">

                                        Others

                                    </button>

                                    {{-- <button data-id="10" class="get-vote board_price_btn btn">Others</button> --}}



                                    <!-- Modal -->

                                    <div class="modal fade" id="othersModal" tabindex="-1" role="dialog"

                                        aria-labelledby="othersModalLabel" aria-hidden="true">

                                        <div class="modal-dialog" role="document">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <h5 class="modal-title" id="othersModalLabel">Other</h5>

                                                    <button type="button" class="close" data-dismiss="modal"

                                                        aria-label="Close">

                                                        <span aria-hidden="true">&times;</span>

                                                    </button>

                                                </div>

                                                <div class="modal-body">

                                                    <input type="number" id="otherPrice" min="51" value="51"

                                                        placeholder="Enter Your desired amount above $50."

                                                        class="form-control">

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-secondary"

                                                        data-dismiss="modal">Close</button>

                                                    <button data-id="others" class="get-vote board_price_btn btn">Submit

                                                        Vote</button>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @endif













                                {{-- <button data-id="others" class="get-vote">Others</button> --}}

                            @endif

                            {{-- <span>Cowboys</span>

                            <span>Menu</span>

                            <span>$10</span>

                            <span>$20</span>

                            <span>$30</span>

                            <span>$40</span>

                            <span>$50</span> --}}

                            {{-- <span>Other</span> --}}

                        </div>



                        {{-- <div class="voting_buttons">

                            <span>Votes</span>

                            <span>10x10_4</span>

                            <span>votes</span>

                            <span>votes</span>

                            <span>votes</span>

                            <span>votes</span>

                            <span>votes</span>

                            <span>votes</span>

                        </div> --}}



                        <div class="voting_buttons">

                            {{-- <span>Results</span> --}}

                            <span>10x10_4</span>

                            <span id="10">1</span>

                            <span id="20">0</span>

                            <span id="30">0</span>

                            <span id="40">0</span>

                            <span id="50">0</span>

                            <span id="others">0</span>

                        </div>



                        <div class="mt-4">

                            <span class="competition_info">({{ $board->team_name_x }}) VS

                                ({{ $board->team_name_y }})</span>

                        </div>

                    </div>







                </div>

                {{-- <div class="col-md-2 my-auto">

                    <div class="lower_board_buttons">

                        @if ($dateFormat == $board->voting_deadline || $dateFormat > $board->voting_deadline)

                            @if ((isset($keys[0]) && $keys[0] === 'ten') || (isset($keys[1]) && $keys[1] === 'ten') || (isset($keys[2]) && $keys[2] === 'ten') || (isset($keys[3]) && $keys[3] === 'ten') || (isset($keys[4]) && $keys[4] === 'ten') || (isset($keys[5]) && $keys[5] === 'ten'))

                                <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 10]) }}"

                                    class="board_price_anchor">

                                    <button class="board_price_btn btn">

                                        $10 Board

                                    </button>

                                </a>

                            @else

                                <button disabled class="board_price_btn btn">

                                    $10 Board

                                </button>

                            @endif



                            @if ((isset($keys[0]) && $keys[0] === 'twenty') || (isset($keys[1]) && $keys[1] === 'twenty') || (isset($keys[2]) && $keys[2] === 'twenty') || (isset($keys[3]) && $keys[3] === 'twenty') || (isset($keys[4]) && $keys[4] === 'twenty') || (isset($keys[5]) && $keys[5] === 'twenty'))

                                <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 20]) }}"

                                    class="board_price_anchor">

                                    <button class="board_price_btn btn">

                                        $20 Board

                                    </button>

                                </a>

                            @else

                                <button disabled class="board_price_btn btn">$20 Board</button>

                            @endif







                            @if ((isset($keys[0]) && $keys[0] === 'thirty') || (isset($keys[1]) && $keys[1] === 'thirty') || (isset($keys[2]) && $keys[2] === 'thirty') || (isset($keys[3]) && $keys[3] === 'thirty') || (isset($keys[4]) && $keys[4] === 'thirty') || (isset($keys[5]) && $keys[5] === 'thirty'))

                                <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 30]) }}"

                                    class="board_price_anchor">

                                    <button class="board_price_btn btn">

                                        $30 Board

                                    </button>

                                </a>

                            @else

                                <button disabled class="board_price_btn btn">$30 Board</button>

                            @endif





                            @if ((isset($keys[0]) && $keys[0] === 'fourty') || (isset($keys[1]) && $keys[1] === 'fourty') || (isset($keys[2]) && $keys[2] === 'fourty') || (isset($keys[3]) && $keys[3] === 'fourty') || (isset($keys[4]) && $keys[4] === 'fourty') || (isset($keys[5]) && $keys[5] === 'fourty'))

                                <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 40]) }}"

                                    class="board_price_anchor">

                                    <button class="board_price_btn btn">

                                        $40 Board

                                    </button>

                                </a>

                            @else

                                <button disabled class="board_price_btn btn">$40 Board</button>

                            @endif





                            @if ((isset($keys[0]) && $keys[0] === 'fifty') || (isset($keys[1]) && $keys[1] === 'fifty') || (isset($keys[2]) && $keys[2] === 'fifty') || (isset($keys[3]) && $keys[3] === 'fifty') || (isset($keys[4]) && $keys[4] === 'fifty') || (isset($keys[5]) && $keys[5] === 'fifty'))

                                <a href="{{ route('user.boardPart.list', ['id' => $board->id, 'price' => 50]) }}"

                                    class="board_price_anchor">

                                    <button class="board_price_btn btn">

                                        $50 Board

                                    </button>

                                </a>

                            @else

                                <button disabled class="board_price_btn btn">$50

                                    Board</button>

                            @endif

                        @else

                            <button data-id="10" class="get-vote board_price_btn btn">$10 Board</button>

                            <button data-id="20" class="get-vote board_price_btn btn">$20 Board</button>

                            <button data-id="30" class="get-vote board_price_btn btn">$30 Board</button>

                            <button data-id="40" class="get-vote board_price_btn btn">$40 Board</button>

                            <button data-id="50" class="get-vote board_price_btn btn">$50 Board</button>

                        @endif



                    </div>

                </div> --}}

            </div>

        </div>

    </section>

@endsection



@push('js')

    <script>

        $(document).ready(function() {



            function func(user_id) {

                let status = false;



                let count = 0;

                if (ten.includes(parseInt(user_id))) {

                    count += 1;

                }



                if (twenty.includes(parseInt(user_id))) {

                    count += 1;

                }



                if (thirty.includes(parseInt(user_id))) {

                    count += 1;

                }



                if (fourty.includes(parseInt(user_id))) {

                    count += 1;

                }

                if (fifty.includes(parseInt(user_id))) {

                    count += 1;

                }

                if (others.includes(parseInt(user_id))) {

                    count += 1;

                }



                if (count == 6) {

                    status = true;

                }



                // if (

                //     ten.includes(parseInt(user_id)) || twenty.includes(parseInt(user_id)) || thirty.includes(

                //         parseInt(user_id)) || fourty.includes(parseInt(user_id)) || fifty.includes(parseInt(

                //         user_id)) || others.includes(parseInt(user_id))

                // ) {

                //     status = true;

                // }



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



                let vote_board = $(this).attr('data-id');



                console.log(vote_board);



                if (vote_board == undefined) {

                    alert('sorry you have already voted')

                    return false;

                }



                let data;



                if (vote_board == 'others') {



                    if (String($('#otherPrice').val()) == "" || parseFloat($('#otherPrice').val()) <= 50) {

                        alert('Please Enter your desired price above $50.');

                        $('#otherPrice').focus();

                        return false;

                    }

                    

                    data = {

                        'id': " {{ $board->id }}",

                        'board': vote_board,

                        'price': $('#otherPrice').val(),

                        '_token': '{{ csrf_token() }}',

                    };

                } else {



                    data = {

                        'id': " {{ $board->id }}",

                        'board': vote_board,

                        '_token': '{{ csrf_token() }}',

                    };

                }



                let url = "{{ route('vote.store') }}";



                // console.log(vote_board , data );

                // return false;





                let status = func(user_id);

                if (status == false) {



                    let response = AjaxRequest(url, data);



                    if (response) {

                        // $('#othersModal').hide();

                        $('#othersModal').modal('hide');

                        alert('ThankYou for vote');

                    }



                    if (response.board == 10) {

                        ten = response.array

                        $('button[data-id="10"]').addClass('bgbtn');

                        $('button[data-id="10"]').removeAttr('data-id');

                    }

                    if (response.board == 20) {

                        twenty = response.array

                        $('button[data-id="20"]').addClass('bgbtn');

                        $('button[data-id="20"]').removeAttr('data-id');

                    }

                    if (response.board == 30) {

                        thirty = response.array

                        $('button[data-id="30"]').addClass('bgbtn');

                        $('button[data-id="30"]').removeAttr('data-id');

                    }

                    if (response.board == 40) {

                        fourty = response.array

                        $('button[data-id="40"]').addClass('bgbtn');

                        $('button[data-id="40"]').removeAttr('data-id');

                    }

                    if (response.board == 50) {

                        fifty = response.array

                        $('button[data-id="50"]').addClass('bgbtn');

                        $('button[data-id="50"]').removeAttr('data-id');

                    }

                    if (response.board == 'others') {

                        others = response.array

                        $('button[data-id="others"]').addClass('bgbtn');

                        $('button[data-id="others"]').removeAttr('data-id');

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

        } else {

            $('#10').addClass('bg-danger');

        }



        if (twenty.length > 100) {

            $('#20').addClass('bg-success');

        } else {

            $('#20').addClass('bg-danger');

        }



        if (thirty.length > 100) {

            $('#30').addClass('bg-success');

        } else {

            $('#30').addClass('bg-danger');

        }



        if (fourty.length > 100) {

            $('#40').addClass('bg-success');

        } else {

            $('#40').addClass('bg-danger');

        }



        if (fifty.length > 100) {

            $('#50').addClass('bg-success');

        } else {

            $('#50').addClass('bg-danger');

        }



        if (others.length > 100) {

            $('#others').addClass('bg-success');

        } else {

            $('#others').addClass('bg-danger');

        }



        // console.log(ten.length * 10);

        // const ctx = document.getElementById('myChart');



        // new Chart(ctx, {

        //     scaleLabelColor: "white",

        //     type: 'bar',

        //     data: {

        //         labels: ['$10', '$20', '$30', '$40', '$50', 'Other'],



        //         datasets: [{

        //             label: '10x10_4',

        //             data: [ten.length, twenty.length, thirty.length, fourty.length, fifty.length, others

        //                 .length

        //             ],

        //             borderWidth: 4,

        //         }]

        //     },

        //     options: {



        //         plugins: { // 'legend' now within object 'plugins {}'

        //             legend: {

        //                 labels: {

        //                     color: "white", // not 'fontColor:' anymore

        //                     // fontSize: 18  // not 'fontSize:' anymore

        //                     font: {

        //                         size: 30 // 'size' now within object 'font {}'

        //                     }

        //                 }

        //             },

        //             scales: {

        //                 y: {

        //                     beginAtZero: true

        //                 }

        //             }

        //         }

        //     },



        // });

    </script>



    <script>

        var swiper = new Swiper(".whychooseusSwiper", {

            slidesPerView: 3,

            spaceBetween: 30,

            pagination: {

                el: ".swiper-pagination",

                clickable: true,

            },

        });







        var swiper = new Swiper(".mySwiper", {

            effect: "cube",

            grabCursor: true,

            cubeEffect: {

                shadow: true,

                slideShadows: true,

                shadowOffset: 20,

                shadowScale: 0.94,

            },

            navigation: {

                nextEl: ".swiper-button-next",

                prevEl: ".swiper-button-prev",

            },

        });

    </script>

@endpush

