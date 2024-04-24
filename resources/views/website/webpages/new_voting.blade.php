@extends('new_website.layouts.main')

@section('content')
    <style>
        .bgbtn {

            background-color: #9afffe !important;
        }

        .radious {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        hr {
            background-color: #9afffe;
            margin: 10px 0px;
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


                {{-- <x-main-banner /> --}}

            </div>
        </div>
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


                            <p class="m-0 mx-auto">HELLO: {{ auth()->user()->alias }}</p>

                            <p class="m-0 mx-auto"> <a class="text-white" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </p>


                        </div>

                        @if (count($board) > 0)
                            @if (count($board) - 1)
                                @php
                                    $lastKey = count($board) - 1;
                                @endphp

                                <input type="hidden" value="{{ $lastKey }}" class="key">
                            @endif

                            @foreach ($board as $index => $item)
                                <div class="parent_board_table" board-id="{{ $item->id }}">

                                    <div class="main_voting_buttons" id="{{ $index . '_buttonClass' }}">
                                        <div class="dates d-flex justify-content-around align-items-center text-white">
                                            <h6 class="m-0"><b>GAME DATE:</b>
                                                {{ date('d/m/Y', strtotime($item->game_date)) }}</h6>
                                            <span class="competition_info">({{ $item->team_name_x }}) VS
                                                ({{ $item->team_name_y }})
                                            </span>
                                            <h6 class="m-0"><b>VOTING DEADLINE:</b>
                                                {{ date('d/m/Y', strtotime($item->voting_deadline)) }}</h6>
                                        </div>
                                        <div class="voting_buttons">
                                            <span>Menu</span>
                                         
                                            
                                            @if ($item->voting_deadline <= $dateFormat)
                                          
                                                @if (
                                                    (isset($keys[0]) && $keys[0] === 'ten') ||
                                                        (isset($keys[1]) && $keys[1] === 'ten') ||
                                                        (isset($keys[2]) && $keys[2] === 'ten') ||
                                                        (isset($keys[3]) && $keys[3] === 'ten') ||
                                                        (isset($keys[4]) && $keys[4] === 'ten') ||
                                                        (isset($keys[5]) && $keys[5] === 'ten'))
                                                    <a href="{{ route('user.boardPart.list', ['id' => $item->id, 'price' => 10]) }}"
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
                                                    $tenDoller = is_array(json_decode($item->ten, true))
                                                        ? in_array(auth()->user()->id, json_decode($item->ten, true))
                                                        : false;
                                                    $twentyDoller = is_array(json_decode($item->twenty, true))
                                                        ? in_array(auth()->user()->id, json_decode($item->twenty, true))
                                                        : false;
                                                    $thirtyDoller = is_array(json_decode($item->thirty, true))
                                                        ? in_array(auth()->user()->id, json_decode($item->thirty, true))
                                                        : false;
                                                    $fourtyDoller = is_array(json_decode($item->fourty, true))
                                                        ? in_array(auth()->user()->id, json_decode($item->fourty, true))
                                                        : false;
                                                    $fiftyDoller = is_array(json_decode($item->fifty, true))
                                                        ? in_array(auth()->user()->id, json_decode($item->fifty, true))
                                                        : false;
                                                    $othersDoller = is_array(json_decode($item->others, true))
                                                        ? in_array(auth()->user()->id, json_decode($item->others, true))
                                                        : false;
                                                    // dd($tenDoller, $twentyDoller, $thirtyDoller, $fourtyDoller, $fiftyDoller, $othersDoller);
                                                @endphp

                                                @if ($tenDoller == true)
                                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">
                                                        $10 Board
                                                    </button>
                                                @else
                                                    <button data-id="10" data-boardid="{{ $item->id }}"
                                                        data-id-board="10_count_board_id_{{ $item->id }}"
                                                        class="get-vote board_price_btn btn">$10
                                                        Board</button>
                                                @endif

                                                @if ($twentyDoller == true)
                                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">$20
                                                        Board</button>
                                                @else
                                                    <button data-id="20" data-boardid="{{ $item->id }}"
                                                        data-id-board="20_count_board_id_{{ $item->id }}"
                                                        class="get-vote board_price_btn btn">$20
                                                        Board</button>
                                                @endif

                                                @if ($thirtyDoller == true)
                                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">$30
                                                        Board</button>
                                                @else
                                                    <button data-id="30" data-boardid="{{ $item->id }}"
                                                        data-id-board="30_count_board_id_{{ $item->id }}"
                                                        class="get-vote board_price_btn btn">$30
                                                        Board</button>
                                                @endif

                                                @if ($fourtyDoller == true)
                                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">$40
                                                        Board</button>
                                                @else
                                                    <button data-id="40" data-boardid="{{ $item->id }}"
                                                        data-id-board="40_count_board_id_{{ $item->id }}"
                                                        class="get-vote board_price_btn btn">$40
                                                        Board</button>
                                                @endif

                                                @if ($fiftyDoller == true)
                                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">$50
                                                        Board</button>
                                                @else
                                                    <button data-id="50" data-boardid="{{ $item->id }}"
                                                        data-id-board="50_count_board_id_{{ $item->id }}"
                                                        class="get-vote board_price_btn btn">$50
                                                        Board</button>
                                                @endif

                                                @if ($othersDoller == true)
                                                    <button class="get-vote board_price_btn btn btn-primary bgbtn">
                                                        {{ '$' . $item->other_value . ' Board' }}
                                                    </button>
                                                @else
                                                    <button data-id="others" data-boardid="{{ $item->id }}"
                                                        data-id-board="others_count_board_id_{{ $item->id }}"
                                                        class="get-vote board_price_btn btn">
                                                        {{ '$' . $item->other_value . ' Board' }}
                                                    </button>
                                                    <!-- Button trigger modal -->
                                                    {{-- <button type="button" class="btn" data-toggle="modal"
                                                        data-id-board="others_2_count_board_id_{{ $item->id }}"
                                                        data-target="#othersModal{{ $item->id }}">
                                                        {{ '$' . $item->other_value . ' Board' }}
                                                    </button> --}}

                                                    <!-- Modal -->
                                                    {{-- <div class="modal fade" id="othersModal{{ $item->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="othersModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="othersModalLabel">Other</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="number" id="otherPrice" min="51"
                                                                        value="51"
                                                                        placeholder="Enter Your desired amount above $50."
                                                                        class="form-control">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button data-id="others"
                                                                        data-boardid="{{ $item->id }}"
                                                                        data-id-board="others_count_board_id_{{ $item->id }}"
                                                                        class="get-vote board_price_btn btn">Submit
                                                                        Amount</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                @endif
                                            @endif
                                        </div>

                                        <div class="voting_buttons">
                                            <span>10x10_4</span>
                                            <span id="10_count_board_id_{{ $item->id }}"
                                                class="{{ is_array(json_decode($item->ten, true)) && count(json_decode($item->ten, true)) >= 100 ? 'bg-success' : '' }}">{{ is_array(json_decode($item->ten, true)) ? count(json_decode($item->ten, true)) : 0 }}</span>
                                            <span id="20_count_board_id_{{ $item->id }}"
                                                class="{{ is_array(json_decode($item->twenty, true)) && count(json_decode($item->twenty, true)) >= 100 ? 'bg-success' : '' }}">{{ is_array(json_decode($item->twenty, true)) ? count(json_decode($item->twenty, true)) : 0 }}</span>
                                            <span id="30_count_board_id_{{ $item->id }}"
                                                class="{{ is_array(json_decode($item->thirty, true)) && count(json_decode($item->thirty, true)) >= 100 ? 'bg-success' : '' }}">{{ is_array(json_decode($item->thirty, true)) ? count(json_decode($item->thirty, true)) : 0 }}</span>
                                            <span id="40_count_board_id_{{ $item->id }}"
                                                class="{{ is_array(json_decode($item->fourty, true)) && count(json_decode($item->fourty, true)) >= 100 ? 'bg-success' : '' }}">{{ is_array(json_decode($item->fourty, true)) ? count(json_decode($item->fourty, true)) : 0 }}</span>
                                            <span id="50_count_board_id_{{ $item->id }}"
                                                class="{{ is_array(json_decode($item->fifty, true)) && count(json_decode($item->fifty, true)) >= 100 ? 'bg-success' : '' }}">{{ is_array(json_decode($item->fifty, true)) ? count(json_decode($item->fifty, true)) : 0 }}</span>
                                            <span id="others_count_board_id_{{ $item->id }}"
                                                class="{{ is_array(json_decode($item->others, true)) && count(json_decode($item->others, true)) >= 100 ? 'bg-success' : '' }}">{{ is_array(json_decode($item->others, true)) ? count(json_decode($item->others, true)) : 0 }}</span>
                                        </div>

                                        {{-- <div class="mt-4">
                                            <span class="competition_info">({{ $item->team_name_x }}) VS
                                                ({{ $item->team_name_y }})
                                            </span>
                                        </div> --}}
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="color: #fff; font-size: 22px; padding: 35px 0px;">
                                        There are no board in the voting face.</div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </section>
    </section>



@endsection

@push('js')
    <script>
        $(document).ready(function() {
            let key = '#' + $('.key').val() + '_buttonClass';
            $(key).addClass('radious').next().remove();
        });
    </script>

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

                return status;
            }

            var user_id =
                ' @if (isset(auth()->user()->id)) {{ auth()->user()->id }} @endif ';

            $('.get-vote').click(function(e) {
                e.preventDefault();

                let id = $(this).attr('data-boardid');

                if (id == undefined) {
                    alert('sorry you have already voted')
                    return false;
                }

                let vote_board = $(this).data('id'); // button price

                let dataCheck = {
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                }

                let urlCheck = "{{ route('voting_poll_new_getSelectingPrice') }}";
                let response = AjaxRequest(urlCheck, dataCheck);
                // check validation end


                let checkArrValue = checkArr(response);



                if (status == false) {

                    if (vote_board == 'others') {

                        if (String($('#otherPrice').val()) == "" || parseFloat($('#otherPrice').val()) <=
                            50) {
                            alert('Please Enter your desired price above $50.');
                            $('#otherPrice').focus();
                            return false;
                        }


                        data = {
                            'id': id,
                            'board': vote_board,
                            'price': $('#otherPrice').val(),
                            '_token': '{{ csrf_token() }}',
                        }
                    } else {

                        data = {
                            'id': id,
                            'board': vote_board,
                            '_token': '{{ csrf_token() }}',
                        }
                    }

                    let url = "{{ route('vote.store') }}";


                    let response = AjaxRequest(url, data);

                    if (response) {
                        $('#otherPrice').val('51')
                        $('#othersModal').modal('hide');
                        // alert('ThankYou for vote');
                    }

                    if (response.status == false) {
                        alert(response.msg);
                        return false;
                    }

                    console.log(response.array);

                    if (response.board == 10) {
                        checkArrValue[0] = response.array
                        console.log()
                        $('#10_count_board_id_' + id).html(response.array.length)

                        $('button[data-id-board="10_count_board_id_' + id + '"]').addClass('bgbtn');
                        $('button[data-id-board="10_count_board_id_' + id + '"]').removeAttr('data-id');

                        // ten = response.array
                    }
                    if (response.board == 20) {
                        checkArrValue[1] = response.array
                        $('#20_count_board_id_' + id).html(response.array.length)
                        $('button[data-id-board="20_count_board_id_' + id + '"]').addClass('bgbtn');
                        $('button[data-id-board="20_count_board_id_' + id + '"]').removeAttr('data-id');
                        // twenty = response.array
                    }
                    if (response.board == 30) {
                        checkArrValue[2] = response.array
                        $('#30_count_board_id_' + id).html(response.array.length)
                        $('button[data-id-board="30_count_board_id_' + id + '"]').addClass('bgbtn');
                        $('button[data-id-board="30_count_board_id_' + id + '"]').removeAttr('data-id');
                        // thirty = response.array
                    }
                    if (response.board == 40) {
                        checkArrValue[3] = response.array
                        $('#40_count_board_id_' + id).html(response.array.length)
                        $('button[data-id-board="40_count_board_id_' + id + '"]').addClass('bgbtn');
                        $('button[data-id-board="40_count_board_id_' + id + '"]').removeAttr('data-id');
                        // fourty = response.array
                    }
                    if (response.board == 50) {
                        checkArrValue[4] = response.array
                        $('#50_count_board_id_' + id).html(response.array.length)
                        $('button[data-id-board="50_count_board_id_' + id + '"]').addClass('bgbtn');
                        $('button[data-id-board="50_count_board_id_' + id + '"]').removeAttr('data-id');
                        // fifty = response.array
                    }

                    if (response.board == 'others') {
                        checkArrValue[5] = response.array
                        $('#others_count_board_id_' + id).html(response.array.length)
                        $('button[data-id-board="others_count_board_id_' + id + '"]').addClass('bgbtn');
                        $('button[data-id-board="others_count_board_id_' + id + '"]').removeAttr('data-id');
                        // others = response.array
                    }

                    // if (response.board == 'others') {
                    //     checkArrValue[5] = response.array
                    //     $('#others_count_board_id_' + id).html(response.array.length)
                    //     $('button[data-id-board="others_count_board_id_' + id + '"]').addClass('bgbtn');
                    //     $('button[data-id-board="others_2_count_board_id_' + id + '"]').addClass('bgbtn');
                    //     $('button[data-id-board="others_2_count_board_id_' + id + '"]').removeAttr(
                    //         'data-modal');
                    //     $('button[data-id-board="others_2_count_board_id_' + id + '"]').removeAttr(
                    //         'data-toggle');
                    //     $('button[data-id-board="others_count_board_id_' + id + '"]').removeAttr('data-id');
                    //     // others = response.array
                    // }

                    if (response) {
                        alert('ThankYou for vote');
                    }
                    // console.log(ten, twenty, thirty, fourty, fifty, others);

                } else if (status == true) {
                    alert('sorry you have already voted')
                }

                // console.log(response , checkArrValue);
                // return false;

            })


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


    {{-- <script>
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
    </script> --}}

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
