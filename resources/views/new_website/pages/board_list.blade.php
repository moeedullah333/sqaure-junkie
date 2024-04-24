@extends('new_website.layouts.main')



@section('content')

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





    <section class="board_voting_list_section">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h2 class="main_heading text-center mb-4">board voting list</h2>



                    <div class="table-responsive">

                        <table class="table">

                            <thead>

                                <tr>

                                    <th class="first_head_row pl-4">

                                        <h6># BOARD NAME</h6>

                                    </th>

                                    <th>

                                        <h6>VOTING DEADLINE</h6>

                                    </th>

                                    <th>

                                        <h6>GAME DATE</h6>

                                    </th>

                                    <th class="status_row">

                                        <h6>STATUS</h6>

                                    </th>

                                    <th class="action_btn_row">

                                        <h6>ACTION</h6>

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @php

                                    $count = 1;

                                @endphp



                                @if ($boards->isNotEmpty())

                                    @foreach ($boards as $board)

                                        <tr>

                                            <td>

                                                <div class="first_row pl-4">

                                                    <span>{{ $count++ }}</span><span

                                                        class="pl-3">{{ $board->board_name }}</span>

                                                </div>

                                            </td>



                                            <td>

                                                <div>

                                                    <span>{{ $board->voting_deadline }}</span>

                                                </div>

                                            </td>



                                            <td>

                                                <div>

                                                    <span>{{ $board->game_date }}</span>

                                                </div>

                                            </td>



                                            @if ($board->status == 1)

                                                <td>

                                                    <div>

                                                        <span class="text-success">Active</span>

                                                    </div>

                                                </td>

                                            @else

                                                <td>

                                                    <div>

                                                        <span class="text-danger">Inactive</span>

                                                    </div>

                                                </td>

                                            @endif



                                            @if ($board->status == 1)

                                                <td>

                                                    <div class="last_row">

                                                        <!-- <button>Action</button> -->

                                                        <a href="{{ route('voting', $board->id) }}">View</a>

                                                    </div>

                                                </td>

                                            @else

                                                <td>

                                                    <div class="last_row">

                                                        <!-- <button>Action</button> -->

                                                        <a href="javascript:void(0)">Board Inactive</a>

                                                    </div>

                                                </td>

                                            @endif



                                        </tr>

                                    @endforeach

                                @else

                                    <tr>

                                        <td colspan="6" class="text-center">No data available in table</td>

                                    </tr>

                                @endif

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection



@push('js')

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

