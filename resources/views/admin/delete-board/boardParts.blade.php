@extends('layouts.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Delete Board Parts</h3>
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
                                <input type="date" class="form-control datetimepicker-input" data-target="#datetimepicker7">
                            </div>
                        </div>
                    </div>
                    -
                    <div class="flex-grow-1">
                        <div class="form-group">
                            <label for="">To</label>
                            <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                <input type="date" class="form-control datetimepicker-input" data-target="#datetimepicker8">
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
                <input class="form-control w-50 py-2 border-right-0 border" type="search" placeholder="Search" id="example-search-input">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border-left-0 border bg-white" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div> --}}
    
  
        <div class="row">
            <div class="col-md-12 pt-5 table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th class="table-site-headings">S.No.</th>
                            <th class="table-site-headings">Board Name</th>
                            <th class="table-site-headings">Board Part</th>
                            <th class="table-site-headings">Price</th>
                            <th class="table-site-headings">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($deleteBoard) > 0)
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($deleteBoard as $key => $board)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $board->boardName->board_name }}</td>
                                    <td>{{ $board->part }}</td>
                                    <td>{{ $board->price }}</td>
                                    <td class="text-danger">Deleted</td>
                                </tr>
                            @endforeach
                      
                        @endif

                    </tbody>
                </table>
            </div>
            {{-- <!-- Display Pagination Links -->
            <div class="viewAll d-flex justify-content-end flex-wrap py-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                        <!-- Previous Page Link -->
                        @if ($deleteBoard->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $deleteBoard->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        <!-- Pagination Links -->
                        @for ($i = 1; $i <= $deleteBoard->lastPage(); $i++)
                            <li class="page-item {{ $i == $deleteBoard->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $deleteBoard->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Page Link -->
                        @if ($deleteBoard->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $deleteBoard->nextPageUrl() }}">Next</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div> --}}
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