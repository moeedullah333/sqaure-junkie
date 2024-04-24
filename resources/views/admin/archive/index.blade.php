@extends('layouts.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Archive Boards</h3>
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
                            <th class="table-site-headings">Voter's Choice</th>
                            <th class="table-site-headings">Square Selection </th>
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
                                        {{-- {{ gettype( $board->winning_board ) }} --}}
                                        @isset($board->winning_board)
                                            @php
                                                $data = json_decode($board->winning_board);
                                            @endphp
                                            @if (isset($data))
                                                @foreach ($data as $list)
                                                    {{-- {{ $list }} --}}
                                                    @if ($list == 'ten')
                                                        <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '10']) }}"
                                                            class="btn {{ findSquareCount($board->id, 10, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">
                                                            $10 </a>
                                                    @elseif($list == 'twenty')
                                                        <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '20']) }}"
                                                            class="btn {{ findSquareCount($board->id, 20, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">
                                                            $20 </a>
                                                    @elseif($list == 'thirty')
                                                        <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '30']) }}"
                                                            class="btn {{ findSquareCount($board->id, 30, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">
                                                            $30 </a>
                                                    @elseif($list == 'fourty')
                                                        <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '40']) }}"
                                                            class="btn {{ findSquareCount($board->id, 40, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">
                                                            $40 </a>
                                                    @elseif($list == 'fifty')
                                                        <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => '50']) }}"
                                                            class="btn {{ findSquareCount($board->id, 50, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm">
                                                            $50 </a>
                                                        {{-- @elseif($list == 'others')
                                                        <a href="{{ route('admin.game.board.list', ['id' => $board->id, 'price' => 'others']) }}"
                                                            class="btn {{ $this->findSquareCount($board->id, 10, $boardsSquareCount) ? 'btn-primary' : 'btn-secondary' }} btn-sm"> Others </a> --}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endisset

                                        {{-- {{ $board->winning_board }} --}}

                                    </td>

                                    <td>
                                        @php
                                            if (isset($squareBuy[$board->id])) {
                                                foreach ($squareBuy[$board->id] as $partKey => $part) {
                                                    if (!empty($part)) {
                                                        foreach ($part as $squareKey => $squareCount) {
                                                            $partClass = 'btn btn-secondary';

                                                            if ($squareCount[0]['squaresCount'] == 100) {
                                                                $partClass = 'btn btn-primary';
                                                            }

                                                            echo '<a href="#" style="margin-right:10px;" class="btn ' . $partClass . '"> ' . $squareKey . $partKey . '  </a>';
                                                        }
                                                    }
                                                }
                                            }
                                        @endphp
                                    </td>


                                    <td>
                                        @php
                                            if (isset($squareBuy[$board->id])) {
                                                foreach ($squareBuy[$board->id] as $partKey => $part) {
                                                    if (!empty($part)) {
                                                        foreach ($part as $squareKey => $squareCount) {
                                                            $partClass = 'btn btn-secondary';

                                                            if ($squareCount[0]['paymentsCount'] == 100) {
                                                                $partClass = 'btn btn-primary';
                                                            }

                                                            echo '<a href="#" style="margin-right:10px;" class="btn ' . $partClass . '"> ' . $squareKey . $partKey . '  </a>';
                                                        }
                                                    }
                                                }
                                            }
                                        @endphp
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
                                        <a href="{{ route('admin.board_edit', $board->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>

                                        {{-- <a href="{{ route('admin.board_archive', $board->id) }}"
                                            class="btn btn-sm btn-danger">Delete</a> --}}

                                        <button type="button" class="btn btn-sm ongoingBoard btn-danger"
                                            data-id="{{ $board->id }}">ongoing</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

             {{-- ongoing modal start --}}
            <!-- Modal -->
            <div class="modal fade ongoingModalBody" id="" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ongoing</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <P class="text-center">Are you sure you want to ongoing this board?</P>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="" id="ongoingButtonAnchor" class="btn btn-danger">Ongoing</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ongoing modal end --}}

            {{-- <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Are you sure you want to archive this board.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <!-- Display Pagination Links -->
            <div class="viewAll d-flex justify-content-end flex-wrap py-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                        <!-- Previous Page Link -->
                        @if ($boards->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $boards->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        <!-- Pagination Links -->
                        @for ($i = 1; $i <= $boards->lastPage(); $i++)
                            <li class="page-item {{ $i == $boards->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $boards->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Page Link -->
                        @if ($boards->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $boards->nextPageUrl() }}">Next</a>
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

            $(document).on('click', '.ongoingBoard', function(e) {
                e.preventDefault();
                let data = $(this).data('id');
                let id = 'exampleModal' + data;
                $(".ongoingModalBody").attr("id", id);
                let url = "{{ route('admin.archive-baord-ongoing', ':id') }}";
                url = url.replace(':id', data);
                $("#ongoingButtonAnchor").attr("href", url);
                $('#' + id).modal('show');
            });

        });
    </script>
@endpush
