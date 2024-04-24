@extends('website.layouts.main')
@section('content')

    <section class="banner-div">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>Board Parts List</h1>
                    <div class="text-center py-3">
                        <span><a href="javascript:;">Home</a></span>
                        <span><a href="{{ route('user.board.list') }}">Boards Voting List</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="payment_method_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="payment_method_head">
                        <h1>Board Parts List</h1>
                    </div>
                    <div class="col-md-12 mx-auto py-3">
                        <div class="row">
                            <div class="col-md-12 mb-3 text-capitalize">
                                <div>
                                    <h2 id="board_name"></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                            @if (count($gameBoard) > 0)
                                @foreach ($gameBoard as $key => $list)
                                    <input type="hidden" value="{{ $list->boardName->board_name }}"
                                        id="board_name{{ $key }}">
                                    <div class="col-md-3 mb-5 counterBox" id="box_count_{{ $key }}">
                                        <div class="card">
                                            <div class="card-body">

                                                <h5 class="card-title text-capitalize">

                                                    Part : {{ $list->part }}
                                                    <br>
                                                    Square Select :
                                                    <span id="box_count" class="db_count">{{ $count[$key] }}</span>
                                                    <br>
                                                    Your Square buy :
                                                    <span class="db_count">{{ $countUserSquareBuy[$key] }}</span>
                                                </h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Board Price : {{ $list->price }}
                                                </h6>


                                                <button class="btn bg-warning" type="button" disabled
                                                    onclick="window.location.href = '{{ route('user.board', ['part' => $list->part, 'id' => $list->id, 'board_id' => $list->board_id, 'price' => $list->price]) }}'">View
                                                    Board</button>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No boards available.</p>
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
        jQuery(document).ready(function() {
            // let boardName = jQuery('div#board_name0').val();
            let boardName = jQuery('#board_name0').val();
            $('#board_name').text(boardName);

            jQuery('div#box_count_0 button').removeAttr('disabled');
            jQuery('.counterBox').each(function(index) {
                
                let countValue = jQuery(`#box_count_${index}`).find('.card-title #box_count').text();
                console.log(countValue,index);

                if (countValue == 100) {
                    jQuery(this).next().next().find('button').removeAttr('disabled');
                }

            })
        })
    </script>
@endpush
