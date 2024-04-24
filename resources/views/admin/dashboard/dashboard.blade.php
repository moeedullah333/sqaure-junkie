@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="titleBox border-bottom py-4">
                <h3 class="mb-0 achivpFont mb-0 font-weight-bold">Dashboard</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h3>Auto Generate Board</h3>
                    <div class="col-md-4 mt-4 d-none" id="successAlert">
                        <div class="alert alert-success" role="alert">
                            Status Update Successfully
                        </div>
                    </div>
                    <div class="d-flex">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="on" value="1" {{ $set_job->status == 1 ? 'checked' : '' }}/>
                            <label class="form-check-label" for="on">
                                On
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="off" value="0" {{ $set_job->status == 0 ? 'checked' : '' }}/>
                            <label class="form-check-label" for="off">
                                Off
                            </label>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" style="align-content: space-evenly;margin-top: 26px;">

                     Master Button

                    </button>
                        <!-- Modal -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

                        aria-hidden="true">

                        <div class="modal-dialog" role="document">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title" id="exampleModalLabel">Archive All</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <span aria-hidden="true">&times;</span>

                                    </button>

                                </div>

                                <div class="modal-body">

                                    <p class="text-center">Are You sure you want to archive all boards.</p>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <a href="{{ route('admin.board_archive_all') }}" class="btn btn-danger btn-sm">Archive All</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
            
          
        </div>
        <div class="col-md-4 my-3">
            <div class="d-flex justify-content-between shadow align-items-end p-3 flex-wrap h-100">
                <div class="totalUser">
                    <p class="mb-2">Total Users</p>
                    <p class="mb-0 font-weight-bold">{{ count($users) }}</p>
                </div>
                <div class="userStats">
                    <img src="{{ asset('assets/admin/images/avatar-png.webp') }}" class="mw-100" alt="Total Users"
                        width="86px" height="86px">
                </div>
            </div>
        </div>
        <div class="col-md-4 my-3">
            <div class="d-flex justify-content-between shadow align-items-end p-3 flex-wrap h-100">
                <div class="totalUser">
                    <p class="mb-2">Total Earning</p>
                    <p class="mb-0 font-weight-bold">$100</p>
                </div>
                <div class="userStats">
                    <img src="{{ asset('assets/admin/images/data-analysis.png') }}" class="mw-100" alt="Total Businesses">
                </div>
            </div>
        </div>
        <div class="col-md-4 my-3">
            <div class="d-flex justify-content-between shadow align-items-end p-3 flex-wrap h-100">
                <div class="totalUser">
                    <p class="mb-2">Total Games</p>
                    <p class="mb-0 font-weight-bold">100</p>
                </div>
                <div class="userStats">
                    <img src="{{ asset('assets/admin/images/graphBox.png') }}" class="mw-100" alt="Total Badges">
                </div>
            </div>
        </div>
    </div>

    <!-- No. Students Registered -->
    <div class="badge-section shadow rounded-15 my-4 p-3">
        <div class="row position-relative my-4">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                        <div class="graphTitle flex-shrink-0">
                            <h6 class="mb-0 achivpFont">Amount Analytics</h6>
                        </div>
                        <div class="grapSelect d-flex gap-15 flex-shrink-0 flex-wrap flex-lg-nowrap">
                            <select class="form-select form-select-sm pr-5 py-2" aria-label=".form-select-sm example">
                                <option selected>Type</option>
                                <option value="1">January</option>
                                <option value="2">Febuary</option>
                                <option value="3">March</option>
                            </select>
                            <select class="form-select form-select-sm pr-5 py-2" aria-label=".form-select-sm example">
                                <option selected>Month</option>
                                <option value="1">January</option>
                                <option value="2">Febuary</option>
                                <option value="3">March</option>
                            </select>
                        </div>
                    </div>
                    <div class="graphBox py-4 position-relative">
                        <div class="col rotateText">
                            <h6 class="mb-0 achivpFont">Amount</h6>
                        </div>
                        <!--<figure class="mb-0">-->
                        <!--    <img src="../images/graph.png" class="mw-100" alt="No. Students Registered">-->
                        <!--</figure>-->
                        <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col-md-12 text-center my-4">
                    <p class="py-3 mb-0">Year</p>
                </div>
            </div>


        </div>
    </div>

    <!-- Recent Subscription -->

    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Recent Members</h3>
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
                            <th class="table-site-headings">Full Name</th>
                            <th class="table-site-headings">Alias</th>
                            <th class="table-site-headings">Email Address</th>
                            <th class="table-site-headings">Date</th>
                            <th class="table-site-headings">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            use Carbon\Carbon;

                        @endphp
                        @foreach ($users as $key => $user)
                            @php

                                $currentDate = Carbon::now();
                            @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->alias }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $currentDate->format('Y-m-d') }}</td>
                                {{-- <td>{{$user->status}}</td> --}}
                                {{-- <td>@if ($user->status)
                            Active
                        @else
                            Inactive
                        @endif</td> --}}
                                <td class="border-0 font-weight-bold">
                                    <span
                                        class="{{ $user->status == 1 ? 'text-success' : 'text-danger' }}">{{ $user->status == 1 ? 'Active' : 'Inactive' }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <!-- Display Pagination Links -->
            <div class="viewAll d-flex justify-content-end flex-wrap py-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                        <!-- Previous Page Link -->
                        @if ($users->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        <!-- Pagination Links -->
                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                            <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Page Link -->
                        @if ($users->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
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

            $( "input[name=exampleRadios]:radio" ).on('change' , function(e){
                e.preventDefault();
                console.log($(this).val());

                let url = "{{route('admin.set.jobs')}}";
                let data = {
                    '_token' : '{{csrf_token()}}',
                    'status' : $(this).val(),
                }

                let res = AjaxRequest(url , data);
                if(res.status){
                    $('#successAlert').removeClass('d-none');
                    setTimeout(() => {
                        $('#successAlert').addClass('d-none');
                    }, 3000);
                }
            });
        });
    </script>
@endpush
