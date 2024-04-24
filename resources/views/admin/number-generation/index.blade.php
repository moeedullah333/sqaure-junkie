@extends('layouts.main')

@section('content')

    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">

        <div class="row justify-content-between">

            <div class="col-md-12 mb-3">

                <h3 class="achivpFont">Number Generation Boards</h3>

            </div>

        </div>



        <style>

            .fisco_y span {

                border: 1px solid #979797;

                padding: 5px;

                border-radius: 5px

            }

        </style>

        <div class="row">

            <div class="col-md-12 pt-5 table-responsive">

                <table class="table text-center" id="datatable">

                    <thead>

                        <tr>

                            <th class="table-site-headings">S.No.</th>

                            <th class="table-site-headings">Board Name</th>

                            <th class="table-site-headings">Generate Number Date</th>

                            <th class="table-site-headings">Voter's Choice</th>

                            <th class="table-site-headings">Payment</th>

                            <th class="table-site-headings">Number Generated</th>

                            <th class="table-site-headings">Action</th>



                        </tr>

                    </thead>

                    <tbody>



                        @php

                            $count = 1;

                        @endphp

                        @foreach ($boardList as $board)

                            @foreach ($board->gameBoardShowPart as $index => $item)

                                @if ($item->delete_status == 1)

                                    @continue;

                                @endif

                                <tr id="tr_">

                                    <td>{{ $count++ }}</td>

                                    <td>{{ $board->board_name }}</td>

                                    <td>{{ $board->generate_number }}</td>

                                    {{-- <td>{{$item->part . '/' . $board->id . '/' . $item->id . '/' . $item->price}}</td> --}}

                                    <td>

                                        @php

                                            $route = Crypt::encrypt('admin.number.generation.list');

                                        @endphp



                                        @if ($board->status == 1 && checkPayments($board->id, $item->part, $item->price))

                                            <a class="btn btn-success btn-sm"

                                                href="{{ route('admin.game.board', [$item->part, $board->id, $item->id, $item->price]) }}?num-gen={{ $route }}">

                                                {{ $item->price }} {{ $item->part }}

                                            </a>

                                        @else

                                            <a class="btn btn-secondary btn-sm"

                                                href="{{ route('admin.game.board', [$item->part, $board->id, $item->id, $item->price]) }}?num-gen={{ $route }}">

                                                {{ $item->price }} {{ $item->part }}

                                            </a>

                                        @endif







                                    </td>

                                    <td>

                                        @if ($board->status == 1 && checkPayments($board->id, $item->part, $item->price))

                                            <b class="text-success">Paid</b>

                                        @else

                                            <b class="text-danger">UnPaid</b>

                                        @endif

                                    </td>

                                    <td>

                                        @if (

                                            ($board->status == 1 && $item->spiner_count == 0 && $item->spin_numbers == 0) ||

                                               ( $item->spiner_count < $item->spin_numbers))

                                            <span class="badge badge-pill badge-info">Active</span>

                                        @elseif($board->status == 1 && ($item->spiner_count == $item->spin_numbers))

                                            <span class="badge badge-pill badge-success">Complete</span>

                                        @endif

                                    </td>



                                    <td>

                                        <a class="btn btn-primary btn-sm"

                                            href="{{ route('admin.board_edit', $board->id) }}">Edit</a>

                                    </td>

                                </tr>

                            @endforeach

                        @endforeach





                    </tbody>

                </table>

            </div>





        </div>

    </div>

@endsection



@push('js')

    <script>

        $(document).ready(function() {

            let table = new DataTable('#datatable');



            // $('.resetBtn').click(function() {

            //     let userId = $(this).data('user_id');

            //     console.log(userId);

            //     if (confirm('Are you sure you want to reset this user ?')) {

            //         let data = {

            //             ''

            //         };

            //     }



            // });

        });

    </script>

@endpush

