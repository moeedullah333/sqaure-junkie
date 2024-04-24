@extends('layouts.main')

@section('content')

    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">

        <div class="row justify-content-between">

            <div class="col-md-12 mb-3">

                <h3 class="achivpFont">Boards</h3>

            </div>

        </div>



        <div class="row justify-content-center">

            <div class="col-md-12 mb-3">

                @if (\Session::has('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        {{ \Session::get('success') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                @endif

            </div>

        </div>



        <div class="row justify-content-between">

            <div class="d-flex justify-content-end">

                <a href="{{ route('admin.board_create') }}" class="btn btn-primary btn-sm mr-2">Add Board</a>



                <!-- Button trigger modal -->

                

                {{-- <a href="#" class="btn btn-danger btn-sm">Master Button</a> --}}

            </div>

        </div>



 




        <div class="row">

            <div class="col-md-12 pt-5 table-responsive">

                <table class="table text-center" id="datatable">

                    <thead>

                        <tr>

                            <th class="table-site-headings">S.No</th>

                            <th class="table-site-headings">Voting Board Name</th>

                            <th class="table-site-headings">VOTING DEADLINE (DATE)</th>

                            <th class="table-site-headings">GAME DATE (DATE)</th>

                            <th class="table-site-headings">Voter's Choice</th>

                            <th class="table-site-headings">Board Selection </th>

                            <th class="table-site-headings">Payment Status</th> 

                            <th class="table-site-headings">STATUS</th>

                            <th class="table-site-headings">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @php

                            $count = 1;

                        @endphp



                        @if ($boards->isNotEmpty())

                            @foreach ($boards as $board)

                                <tr>



                                    <td>{{ $count++ }}</td>

                                    <td>{{ $board->board_name }}</td>

                                    <td>{{ $board->voting_deadline }}</td>

                                    <td>{{ $board->game_date }}</td>

                                    <td> 
                                        
                                        @if (checkVoteColumnExists($board->id, 10))

                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '10' , 'part' => '10']) }}"

                                                class="btn {{ findSquareCount($board->id, 10, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                $10 </a>

                                        @endif

                                            



                                        @if (checkVoteColumnExists($board->id, 20))

                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '20' , 'part' => '20']) }}"

                                                class="btn {{ findSquareCount($board->id, 20, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                $20 </a>

                                        @endif





                                        @if (checkVoteColumnExists($board->id, 30))

                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '30' , 'part' => '30']) }}"

                                                class="btn {{ findSquareCount($board->id, 30, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                $30 </a>

                                        @endif





                                        @if (checkVoteColumnExists($board->id, 40))

                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '40' , 'part' => '40']) }}"

                                                class="btn {{ findSquareCount($board->id, 40, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                $40 </a>

                                        @endif



                                    

                                        @if (checkVoteColumnExists($board->id, 50))

                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '50' , 'part' => '50']) }}"

                                                class="btn {{ findSquareCount($board->id, 50, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                $50 </a>

                                        @endif





                                        @if (checkVoteColumnExists($board->id, 'others'))

                                                @if (isset($board->other_value))

                                                    <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => $board->other_value, 'part' => 'others']) }}"

                                                        class="btn {{ findSquareCount($board->id, 'others', $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                        ${{ $board->other_value }} </a>

                                                @endif

                                        @endif

                                    </td>



                                    <td>
                                        
                                        <?php 

                                            if (isset($squareBuy[$board->id])) {



                                                $squares = [];



                                                

                                                foreach ($squareBuy[$board->id] as $partKey => $part) {

                                                    if (!empty($part)) {

                                                        

                                                        foreach ($part as $squareKey => $squareCount) {



                                                            if(!isset($squares[$squareKey])) {

                                                                $squares[$squareKey] = $squareCount[0]['squaresCount'];

                                                            }

                                                            else{

                                                                $squares[$squareKey] += $squareCount[0]['squaresCount'];

                                                            }



                                                        }

                                                    }

                                                }



                                                if(!empty($squares)){

                                                    foreach ($squares as $squaresCountkey => $squaresCount) {

                                                        if($squaresCount < 100){

                                                            ?>

                                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => $squaresCountkey]) }}"

                                                                class="btn btn-secondary btn-sm">

                                                                $<?=$squaresCountkey?> </a>

                                                            <?php

                                                        }

                                                        else{

                                                            ?>

                                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => $squaresCountkey]) }}"

                                                                class="btn btn-primary btn-sm">

                                                                $<?=$squaresCountkey?> </a>

                                                            <?php

                                                        }

                                                    }

                                                }



                                                

                                             }

                                        ?>

                                    </td>



                                    <td>

                                        <?php 



                                            if (isset($paymentsBuy[$board->id])) {



                                                $payments = [];



                                                

                                                foreach ($paymentsBuy[$board->id] as $partKey => $part) {

                                                    if (!empty($part)) {

                                                        

                                                        foreach ($part as $squareKey => $squareCount) {



                                                            if(!isset($payments[$squareKey])) {

                                                                $payments[$squareKey] = $squareCount[0]['paymentsCount'];

                                                            }

                                                            else{

                                                                $payments[$squareKey] += $squareCount[0]['paymentsCount'];

                                                            }

                                                        }

                                                    }

                                                }



                                                if(!empty($payments)){

                                                    foreach ($payments as $paymentsCountkey => $paymentsCount) {

                                                        if($paymentsCount < 100){

                                                            ?>

                                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => $paymentsCountkey]) }}"

                                                                class="btn btn-secondary btn-sm">

                                                                $<?=$paymentsCountkey?> </a>

                                                            <?php

                                                        }

                                                        else{

                                                            ?>

                                                            <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => $paymentsCountkey]) }}"

                                                                class="btn btn-success btn-sm">

                                                                $<?=$paymentsCountkey?> </a>

                                                            <?php

                                                        }

                                                    }

                                                }



                                                

                                             }

                                        ?>

                                    </td>



                                    @if ($board->status == 1)

                                        <td class="border-0 font-weight-bold">

                                            <span class="text-success">Active</span>

                                        </td>

                                    @else

                                        <td class="border-0 font-weight-bold">

                                            <span class="text-danger">Inactive</span>

                                        </td>

                                    @endif



                                    <td>



                                        @if ($setJob->status == 0)

                                            <!-- Button trigger modal -->

                                            <button type="button" class="btn btn-primary setCustomBoardPart"

                                                data-toggle="modal" data-id="{{ $board->id }}"

                                                data-target="#createCustomBoardPart{{ $board->id }}">

                                                Create Board Manually

                                            </button>

                                        @endif



                                        <a href="{{ route('admin.board_edit', $board->id) }}"

                                            class="btn btn-sm btn-primary">Edit</a>



                                        {{-- <a href="{{ route('admin.board_archive', $board->id) }}"

                                            class="btn btn-sm btn-danger">Delete</a> --}}



                                        <button type="button" class="btn btn-sm archiveBoard btn-danger"

                                            data-id="{{ $board->id }}">Delete</button>

                                    </td>

                                </tr>

                            @endforeach

                        @endif



                    </tbody>

                </table>

            </div>



            <!-- Modal -->

            <div class="modal fade createCustomBoardPartBody" id="" tabindex="-1" role="dialog"

                aria-labelledby="createCustomBoardPartLabel" aria-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title" id="createCustomBoardPartLabel">Create Board Manually</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                        <div class="modal-body" id="boardPartBodyModal">



                        </div>

                        {{-- <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <button type="button" class="btn btn-primary">Save changes</button>

                        </div> --}}

                    </div>

                </div>

            </div>





            {{-- Archive modal start --}}

            <!-- Modal -->

            <div class="modal fade ArchiveModalBody" id="" tabindex="-1" role="dialog"

                aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Archive</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                        <div class="modal-body">

                            <P class="text-center">Are you sure you want to archive this board?</P>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <a href="" id="ArchiveButtonAnchor" class="btn btn-danger">Archive</a>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Archive modal end --}}





        </div>

    </div>

    </div>

@endsection

@push('js')

    <script>

        $(document).ready(function() {

            let table = new DataTable('#datatable');



            $(document).on('click', '.setCustomBoardPart', function(e) {

                // console.log('yes')

                e.preventDefault();

                let data = $(this).data('id');

                let id = 'createCustomBoardPart' + data;

                $(".createCustomBoardPartBody").attr("id", id);

                $('#' + id).modal('show');

                create_board(data)

                // $("#ArchiveButtonAnchor").attr("href", url);

            });





            function create_board(id) {

                $('#boardPartBodyModal').empty();



                let url = "{{ route('admin.boardPartData') }}";



                let data = {

                    "_token": "{{ csrf_token() }}",

                    'id': id,

                }



                let res = AjaxRequest(url, data);



                if (res.status == true) {



                    console.log(res.data);

                    console.log(JSON.parse(res.data.winning_board));



                    if (JSON.parse(res.data.winning_board) !== null) {



                        JSON.parse(res.data.winning_board).forEach(element => {



                            $('#boardPartBodyModal').append(` 

                                <button class="btn btn-primary manualBoard" data-element="${element}" data-board_id="${res.data.id}" > ${element == 'others' ? `Others ($${res.data.other_value})`  : element }  </button>

                            `);

                        });

                    } else {

                        $('#boardPartBodyModal').html(`

                                <p class="text-center">Data Not Availabe.</p>

                            `);

                    }





                }

                console.log(res);

            }





            $(document).on('click', '.manualBoard', function(e) {

                e.preventDefault();

                if (confirm('Yor you sure you want to create this board')) {

                    console.log($(this).data('element'))



                    let url = "{{ route('admin.add.board.part.manual') }}";

                    let data = {

                        '_token': "{{ csrf_token() }}",

                        'id': $(this).data('board_id'),

                        'data': $(this).data('element'),

                    }

                    let res = AjaxRequest(url, data);

                    // console.log(res);

                    if (res.status == true) {

                        alert('Board create successfully');

                        location.reload();

                    } else {

                        alert(res.msg);

                    }

                }

            });



            $(document).on('click', '.archiveBoard', function(e) {

                e.preventDefault();

                let data = $(this).data('id');

                let id = 'exampleModal' + data;

                $(".ArchiveModalBody").attr("id", id);

                let url = "{{ route('admin.board_archive', ':id') }}";

                url = url.replace(':id', data);

                $("#ArchiveButtonAnchor").attr("href", url);

                $('#' + id).modal('show');

            });



        });

    </script>

@endpush

