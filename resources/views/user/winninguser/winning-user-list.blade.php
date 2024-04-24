@extends('user.user-layout.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Winning Games List</h3>
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
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="table-site-headings">S.No</th>
                            <th class="table-site-headings">Voting Board Name</th>
                            <th class="table-site-headings">VOTING DEADLINE (DATE)</th>
                            <th class="table-site-headings">GAME DATE (DATE)</th>
                            <th class="table-site-headings">STATUS</th>
                            <th class="table-site-headings">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            $count = 1;
                        @endphp
                        @if (count($boardList) > 0)
                            @foreach ($boardList as $list)
                                <tr>

                                    <td>{{ $count++ }}</td>
                                    <td>{{ $list->board_name }}</td>
                                    <td>{{ $list->voting_deadline }}</td>
                                    <td>{{ $list->game_date }}</td>

                                    @if ($list->status == 1)
                                        <td class="border-0 font-weight-bold">
                                            <span class="text-success">Active</span>
                                        </td>
                                    @else
                                        <td class="border-0 font-weight-bold">
                                            <span class="text-danger">Inactive</span>
                                        </td>
                                    @endif

                                    <td>
                                        <a href="{{ route('voting', $list->id) }}" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">No data available in table</td>
                            </tr>
                        @endif --}}

                    </tbody>
                </table>
            </div>

            <!-- Display Pagination Links -->
            <div class="viewAll d-flex justify-content-end flex-wrap py-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                        {{-- Previous Page Link --}}
                        {{-- @if ($boardList->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $boardList->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif --}}

                        {{-- Pagination Links --}}
                        {{-- @for ($i = 1; $i <= $boardList->lastPage(); $i++)
                            <li class="page-item {{ $i == $boardList->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $boardList->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor --}}

                        {{-- Next Page Link --}}
                        {{-- @if ($boardList->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $boardList->nextPageUrl() }}">Next</a>
                            </li>
                        @endif --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>
@endsection
