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

                    <h2 class="main_heading text-center">board parts list</h2>



                    <!-- <p class="main_para text-center">

                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and

                                </p> -->



                    <!-- <div class="main_action_btn text-center mt-3">

                                    <a href="javascript:;">PLAY NOW</a>

                                </div> -->



                </div>





                <x-main-banner />



            </div>

        </div>



    </section>





    <section class="board_parts_list_section">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h2 class="main_heading text-center mb-4">board parts list</h2>

                </div>

            </div>



            <div class="row customized_row">

                <div class="col-md-12 customized_column">

                    <h4 class="board_number_heading" id="board_name"></h4>

                </div>



                @if (count($gameBoard) > 0)

                    @foreach ($gameBoard as $key => $list)

                        

                        <div class="col-md-4 mb-3">

                            <input type="hidden" value="{{ $list->boardName->board_name }}" id="board_name{{ $key }}">

                            <div class="board_part_detail_card counterBox" id="box_count_{{ $key }}">

                                <p>PART {{ $list->part }}</p>

                                <p class="card-title">Square Select: <span id="box_count" class="db_count">{{ $count[$key] }}</span></p>

                                <p>Your Square Buy: <span class="db_count">{{ $countUserSquareBuy[$key] }}</span></p>

                                <span>Board Price: ${{ $list->price }}</span>



                                <div class="main_action_btn mt-3">

                                    {{-- <a href="javascript:;" class="text-dark">VIEW BOARD</a> --}}

                                    <button class="text-dark btn" type="button" disabled

                                        onclick="window.location.href = '{{ route('user.board', ['part' => $list->part, 'id' => $list->id, 'board_id' => $list->board_id, 'price' => $list->price]) }}'">View

                                        Board</button>

                                </div>

                            </div>



                        </div>

                    @endforeach

                @else

                <p style="margin-left: 20px;font-size: 24px;color: white !important;font-weight: bold;">No boards available.</p>

                @endif

            </div>



        </div>

    </section>

@endsection



@push('js')

    <script>



jQuery(document).ready(function() {

// let boardName = jQuery('div#board_name0').val();

        //     let boardName = jQuery('#board_name0').val();

        let boardName = jQuery('#board_name0').val();

            $('#board_name').text(boardName);

jQuery('div#box_count_0 button').removeAttr('disabled');

jQuery('.counterBox').each(function(index) {

    

    let countValue = jQuery(`#box_count_${index}`).find('.card-title #box_count').text();

    console.log(countValue,index);



    if (countValue == 100) {

        jQuery(this).parents('.col-md-4').next().find('button').removeAttr('disabled');

    }



})

});



    </script>

@endpush

