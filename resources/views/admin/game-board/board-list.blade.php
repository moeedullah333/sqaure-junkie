@extends('layouts.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Boards <span id="board_name"></span></h3>
            </div>
        </div>



        {{-- <div class="row justify-content-between">
            <div class="col-md-6">
                <div class="d-flex align-items-center flex-wrap flex-md-nowrap selectBox gap-15 my-4">
                    <div class="title flex-shrink-0">
                        <p class="achivpFont mb-0">Filter by Game Package:</p>
                    </div>
                    <div class="filterField flex-grow-1">
                        <select class="form-select form-select-sm pr-5 py-2 w-auto" aria-label=".form-select-sm example">
                            <option>Select Status</option>
                            <option value="active">Monthly</option>
                            <option value="inactive">Yearly</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap mb-3">
                    <div class="dateBox d-flex align-items-center gap-15 flex-wrap flex-md-nowrap">
                        <p class="mb-0 achivpFont flex-shrink-0">Sort By Date:</p>
                        <div class="flex-grow-1">
                            <div class="form-group">
                                <label class="mb-0">From</label>
                                <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                    <input type="date" class="form-control datetimepicker-input"
                                        data-target="#datetimepicker7">
                                </div>
                            </div>
                        </div>
                        -
                        <div class="flex-grow-1">
                            <div class="form-group">
                                <label for="">To</label>
                                <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                    <input type="date" class="form-control datetimepicker-input"
                                        data-target="#datetimepicker8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center flex-wrap selectBox gap-15 my-4 justify-content-md-end">
                    <div class="title flex-shrink-0">
                        <p class="achivpFont mb-0">Filter By Status:</p>
                    </div>
                    <div class="filterField">
                        <select class="form-select form-select-sm pr-5 py-2 w-auto" aria-label=".form-select-sm example">
                            <option>Select Status</option>
                            <option value="active">Ongoing</option>
                            <option value="inactive">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="userSeach input-group w-auto">
                    <input class="form-control w-50 py-2 border-right-0 border" type="search" placeholder="Search"
                        id="example-search-input">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border bg-white" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div> --}}
        @if (\Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ \Session::get('success') }}
            </div>
        @endif

        <div class="row">   
            <div class="col-md-12 pt-5 table-responsive">

                <div class="col-md-12">
                    <div class="row">
                        @if ($data->isNotEmpty())
                            @foreach ($data as $key => $list)
                                <input type="hidden" value="{{ $list->boardName->board_name }}"
                                    id="board_name{{ $key }}">
                                <div class="col-md-3 mb-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-capitalize">Part : {{ $list->part }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Price : {{ $list->price }}</h6>
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.game.board', ['part' => $list->part, 'board_id' => $list->board_id, 'id' => $list->id, 'price' => $list->price]) }}"
                                                class="card-link">View Board</a>

                                            @if ($list->block_board == 1)
                                                <a class="btn btn-warning"
                                                    href="{{ route('admin.game.board.block.unblock', ['part' => $list->part, 'board_id' => $list->board_id, 'id' => $list->id, 'price' => $list->price, 'status' => 0]) }}"
                                                    class="card-link">Unblock Board</a>
                                            @else
                                                <a class="btn btn-danger"
                                                    href="{{ route('admin.game.board.block.unblock', ['part' => $list->part, 'board_id' => $list->board_id, 'id' => $list->id, 'price' => $list->price, 'status' => 1]) }}"
                                                    class="card-link">Block Board</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-3 mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <p>This board is having votes under 100.</p>
                                        <br>
                                        @if($part !== null)
                                        <a class="btn btn-danger"
                                        href="{{ route('admin.board_remove_empty', ['part' => $part, 'id' => $id ]) }}"
                                        class="card-link">Remove This Board</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            let boardName = jQuery('#board_name0').val();
            $('#board_name').text(boardName);
        });
    </script>
@endpush
