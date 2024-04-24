@extends('user.user-layout.main')

@section('content')

    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">

        <div class="row justify-content-between">

            <div class="col-md-12 mb-3">

                <h3 class="achivpFont">Current Games List</h3>

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



        <div class="row">

            <div class="col-md-12 pt-5 table-responsive">

                <table class="table text-center" id="datatable">

                    <thead>

                        <tr>

                            <th class="table-site-headings">S.No</th>

                            <th class="table-site-headings">Voting Board Name</th>

                            <th class="table-site-headings">VOTING DEADLINE (DATE)</th>

                            <th class="table-site-headings">GAME DATE (DATE)</th>

                            <th class="table-site-headings">Square Selection</th>

                            <th class="table-site-headings">STATUS</th>



                            {{-- <th class="table-site-headings">Actions</th> --}}

                        </tr>

                    </thead>

                    <tbody>

                        @php

                            $count = 1;



                        @endphp



                        @foreach ($boards as $list)

                            <?php

                            // $votingCheck = false;
                            // if($list->ten !== '' && $list->ten !== "0" && in_array(auth()->user()->id, json_decode($list->ten,true))){
                            //     $votingExists = true;
                            // }    
                            // if($list->twenty !== '' && $list->twenty !== "0" && in_array(auth()->user()->id, json_decode($list->twenty,true))){
                            //     $votingExists = true;
                            // }
                            // if($list->thirty !== '' && $list->thirty !== "0" && in_array(auth()->user()->id, json_decode($list->thirty,true))){
                            //     $votingExists = true;
                            // }
                            // if($list->fourty !== '' && $list->fourty !== "0" && in_array(auth()->user()->id, json_decode($list->fourty,true))){
                            //     $votingExists = true;
                            // }
                            // if($list->fifty !== '' && $list->fifty !== "0" && in_array(auth()->user()->id, json_decode($list->fifty,true))){
                            //     $votingExists = true;
                            // }
                            // if($list->others !== '' && $list->others !== "0" && in_array(auth()->user()->id, json_decode($list->others,true))){
                            //     $votingExists = true;
                            // }

                            // if(!$votingExists){
                            //     continue;
                            // }
                            
                            
                            ?>

                            {{-- @if ($date->format('Y-m-d H:i:00') > $list->square_deadline)

                                    @continue

                                @endif --}}



                            <tr>



                                <td>{{ $count++ }}</td>

                                <td>{{ $list->board_name }}</td>

                                <td>{{ $list->voting_deadline }}</td>

                                <td>{{ $list->game_date }}</td>

                    



                                <td>



                                    @if ($list->winning_board != null && $list->winning_board != '[]')

                                        @isset($list->winning_board)

                                            @php

                                                $data = json_decode($list->winning_board);

                                            @endphp

                                            @if (isset($data))

                                                @foreach ($data as $listBoardNum)

                                                    @if ($listBoardNum == 'ten' && $list->ten !== '' && $list->ten !== "0" && in_array(auth()->user()->id, json_decode($list->ten,true)))

                                                        @if (checkBoardExist($list->id, 10) == true)

                                                            <a href="{{ route('user.boardPart.list', ['id' => $list->id, 'price' => '10']) }}"

                                                                class="btn {{ findSquareCount($list->id, 10, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                                $10 </a>

                                                        @endif

                                                    @elseif($listBoardNum == 'twenty' && $list->twenty !== '' && $list->twenty !== "0" && in_array(auth()->user()->id, json_decode($list->twenty,true)))

                                                        @if (checkBoardExist($list->id, 20) == true)

                                                            <a href="{{ route('user.boardPart.list', ['id' => $list->id, 'price' => '20']) }}"

                                                                class="btn {{ findSquareCount($list->id, 20, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                                $20 </a>

                                                        @endif

                                                    @elseif($listBoardNum == 'thirty' && $list->thirty !== '' && $list->thirty !== "0" && in_array(auth()->user()->id, json_decode($list->thirty,true)))

                                                        @if (checkBoardExist($list->id, 30) == true)

                                                            <a href="{{ route('user.boardPart.list', ['id' => $list->id, 'price' => '30']) }}"

                                                                class="btn {{ findSquareCount($list->id, 30, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                                $30 </a>

                                                        @endif

                                                    @elseif($listBoardNum == 'fourty' && $list->fourty !== '' && $list->fourty !== "0" && in_array(auth()->user()->id, json_decode($list->fourty,true)))

                                                        @if (checkBoardExist($list->id, 40) == true)

                                                            <a href="{{ route('user.boardPart.list', ['id' => $list->id, 'price' => '40']) }}"

                                                                class="btn {{ findSquareCount($list->id, 40, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                                $40 </a>

                                                        @endif

                                                    @elseif($listBoardNum == 'fifty' && $list->fifty !== '' && $list->fifty !== "0" && in_array(auth()->user()->id, json_decode($list->fifty,true)))

                                                        @if (checkBoardExist($list->id, 50) == true)

                                                            <a href="{{ route('user.boardPart.list', ['id' => $list->id, 'price' => '50']) }}"

                                                                class="btn {{ findSquareCount($list->id, 50, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                                $50 </a>

                                                        @endif

                                                    @elseif($listBoardNum == 'others' && $list->others !== '' && $list->others !== "0" && in_array(auth()->user()->id, json_decode($list->others,true)))

                                                        @if (checkBoardExist($list->id, $list->other_value) == true)

                                                            @if (isset($list->other_value))

                                                                <a href="{{ route('user.boardPart.list', ['id' => $list->id, 'price' => $list->other_value]) }}"

                                                                    class="btn {{ findSquareCount($list->id, 'others', $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">

                                                                    ${{ $list->other_value }} </a>

                                                            @endif

                                                        @endif

                                                    @endif

                                                @endforeach

                                            @endif

                                        @endisset

                                    @else

                                        <a href="{{ route('voting', $list->id) }}" class="btn btn-warning">Go to

                                            Voting</a>

                                    @endif





                                    {{-- {{ $board->winning_board }} --}}



                                </td>

                                @if ($list->status == 1)

                                    <td class="border-0 font-weight-bold">

                                        <span class="text-success">Active</span>

                                    </td>

                                @else

                                    <td class="border-0 font-weight-bold">

                                        <span class="text-danger">Inactive</span>

                                    </td>

                                @endif



                                {{-- @if ($list->status == 1) --}}

                                {{-- <td>

                                            <a href="{{ route('voting', $list->id) }}"

                                                class="btn btn-sm btn-primary">View</a>

                                        </td> --}}

                                {{-- @else --}}

                                {{-- <td>

                                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary">Inactive</a>

                                        </td> --}}

                                {{-- @endif --}}



                            </tr>

                        @endforeach

                        {{-- @else

                            <tr>

                                <td colspan="7" class="text-center">No data available in table</td>

                            </tr>

                        @endif --}}



                    </tbody>

                </table>

            </div>



            {{-- <!-- Display Pagination Links -->

            <div class="viewAll d-flex justify-content-end flex-wrap py-3">

                <nav aria-label="Page navigation example">

                    <ul class="pagination justify-content-center mb-0">

                        <!-- Previous Page Link -->

                        @if ($boardList->currentPage() > 1)

                            <li class="page-item">

                                <a class="page-link" href="{{ $boardList->previousPageUrl() }}">Previous</a>

                            </li>

                        @endif



                        <!-- Pagination Links -->

                        @for ($i = 1; $i <= $boardList->lastPage(); $i++)

                            <li class="page-item {{ $i == $boardList->currentPage() ? 'active' : '' }}">

                                <a class="page-link" href="{{ $boardList->url($i) }}">{{ $i }}</a>

                            </li>

                        @endfor



                        <!-- Next Page Link -->

                        @if ($boardList->hasMorePages())

                            <li class="page-item">

                                <a class="page-link" href="{{ $boardList->nextPageUrl() }}">Next</a>

                            </li>

                        @endif

                    </ul>

                </nav>

            </div> --}}

        </div>

    </div>

    </div>

@endsection





@push('js')

    <script>

        $(document).ready(function() {

            let table = new DataTable('#datatable');

        });

    </script>

@endpush

