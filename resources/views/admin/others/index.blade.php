@extends('layouts.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Others Boards List</h3>
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

        {{-- <div class="row justify-content-between">
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.board_create') }}" class="btn btn-primary btn-sm">Add Board</a>
            </div>
        </div> --}}


        <div class="row">
            <div class="col-md-12 pt-5 table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th class="table-site-headings">S.No</th>
                            <th class="table-site-headings">Voting Board Name</th>
                            <th class="table-site-headings">VOTING DEADLINE (DATE)</th>
                            <th class="table-site-headings">Total Vote Count</th>
                            <th class="table-site-headings">Average Price</th>
                            <th class="table-site-headings">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp

                        {{-- @if ($baordsGet->isNotEmpty()) --}}
                        @foreach ($baordsGet as $board)
                            <tr>

                                <td>{{ $count++ }}</td>
                                <td>{{ $board['board_name'] }}</td>
                                <td>{{ $board['voting_deadline'] }}</td>
                                <td>{{ count(json_decode($board['others'])) }}</td>
                                <td>
                                    @php
                                        $boardPriceArr = [];
                                        foreach ($board['other_board'] as $key => $value) {
                                            $boardPriceArr[] = (int) $value['price'];
                                        }
                                        $average_value = array_sum($boardPriceArr) / count($boardPriceArr);
                                        echo '$' . round($average_value);
                                    @endphp
                                </td>



                                <td>
                                    <a href="{{ route('other.board.user.vote.list', $board['id']) }}"
                                        class="btn btn-primary btn-sm">View Users</a>


                                    <!-- Button trigger modal -->
                                    @if ($board['other_value'] != null)
                                        <button type="button" class="btn set-board-price" disabled data-toggle="modal"
                                            data-target="#exampleModalSetBoardPrice{{ $board['id'] }}"
                                            data-id="{{ $board['id'] }}">
                                            Already Selected Price
                                        </button>
                                    @else
                                        <button type="button"
                                            class="btn set-board-price {{ count(json_decode($board['others'])) < 100 ? 'btn-secondary' : 'btn-primary' }} "
                                            {{ count(json_decode($board['others'])) < 100 ? 'disabled' : '' }}
                                            data-toggle="modal" data-target="#exampleModalSetBoardPrice{{ $board['id'] }}"
                                            data-id="{{ $board['id'] }}">
                                            set price
                                        </button>
                                    @endif

                                    {{-- <button type="button" class="btn btn-sm archiveBoard btn-danger"
                                        data-id="{{ $board['id'] }}">Delete</button> --}}
                                </td>
                            </tr>
                        @endforeach
                        {{-- @endif --}}

                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade setPriceModal" id="" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalSetBoardPriceLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalSetBoardPriceLabel">Set Price</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Set Price</label>
                                <input type="text" class="form-control" name="setPrice" id="setPrice"
                                    placeholder="Enter Price">

                                <span class="text-danger" id="setPriceError"></span>
                            </div>

                            <input type="hidden" name="board_id" id="board_id" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="setPirce" class="btn btn-primary">Set Price</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Archive modal start --}}
            <!-- Modal -->
            {{-- <div class="modal fade ArchiveModalBody" id="" tabindex="-1" role="dialog"
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
            </div> --}}

        </div>
    </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            let table = new DataTable('#datatable');


            $('#setPirce').on('click', function(e) {
                e.preventDefault();

                let priceValue = $('#setPrice').val();
                let board_id = $('#board_id').val();

                if (priceValue != "") {

                    let data = {
                        '_token': '{{ csrf_token() }}',
                        'price': priceValue,
                        'board_id': board_id,
                    }

                    let url = "{{ route('other.board.price.set') }}";

                    let res = AjaxRequest(url, data);

                    if (res.status == true) {
                        alert(res.msg);
                        location.reload();
                    }

                    $('#setPriceError').text('');
                } else {
                    $('#setPriceError').text('Enter value set price field.');
                }
            })

            $('.set-board-price').on('click', function(e) {

                e.preventDefault();
                let data = $(this).data('id');
                let id = 'exampleModalSetBoardPrice' + data;
                $(".setPriceModal").attr("id", id);
                $("#board_id").val(data);

            });

        });
    </script>
@endpush
