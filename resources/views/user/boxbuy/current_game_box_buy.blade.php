@extends('user.user-layout.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Games boxes buy list</h3>
            </div>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!--<div >-->
        <!--    <h4 class="text-center">{{ auth()->user()->alias }} Your Total Payment is: ${{ count($boxes) > 0 ? $total : 0 }}</h4>-->
        <!--    {{-- <a href="javascript::void(0)" class="btn btn-sm btn-success">Paid</a> --}}-->
        <!--</div>-->
        <div class="row">

            {{-- <div class="col-md-12 d-flex justify-content-center">
                    <h4 class="text-center">
                        <h4 class="text-success mr-2">{{auth()->user()->alias}}</h4> 
                        <h4 class="mr-2">Your Total Payment is:</h4> 
                        <h4 class="text-success">${{ (count($boxes) > 0) ? $total : 0}}</h4>
                    </h4>
                </div> --}}
            <!--<div class="col-md-6 d-flex justify-content-start"><button class="btn btn-danger">Pay -->
            <!--</button></div>-->

            <div class="text-end">
                Hello : <b>{{ auth()->user()->alias }}</b>
            </div>

            <div class="col-md-12 pt-5 table-responsive">
                <table class="table text-center" id="datatable">
                    <thead>
                        <tr>
                            <th class="table-site-headings">S.No</th>
                            <th class="table-site-headings">Game Board Title</th>
                            <th class="table-site-headings">Board Price</th>
                            <th class="table-site-headings">Board Part</th>
                            <th class="table-site-headings">Number Of Box</th>
                            <th class="table-site-headings">Amount</th>
                            <th class="table-site-headings">Payment Status</th>
                            <th class="table-site-headings">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count_sn = 1;
                        @endphp
                        @if (count($boxes) > 0)
                            @foreach ($boxes as $box)
                                {{-- @dd($box) --}}
                                <tr>

                                    <td>{{ $count_sn++ }}</td>
                                    <td>{{ $box->boardName->board_name }}</td>
                                    <td>${{ $box->price }}</td>
                                    <td>{{ $box->part }}</td>
                                    @php
                                        $totalSquareArray = json_decode($box->total_square, true);
                                    @endphp
                                    <td>{{ $totalSquareCount = count($totalSquareArray) }}</td>
                                    <td>${{ $totalPrice = $box->price * $totalSquareCount }}</td>

                                    @if ($box->status == 1)
                                        <td class="border-0 font-weight-bold">
                                            <span class="text-success">Paid</span>
                                        </td>
                                    @else
                                        <td class="border-0 font-weight-bold">
                                            <span class="text-danger">Unpaid</span>
                                        </td>
                                    @endif

                                    @if (auth()->user()->payment_type == 1)
                                        {{-- @dd('Cashapp') --}}
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary">Cashapp</a>
                                        </td>
                                    @elseif (auth()->user()->payment_type == 2)
                                        {{-- @dd('Venmo') --}}
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary">Venmo</a>
                                        </td>
                                    @elseif(auth()->user()->payment_type == 3)
                                        {{-- @dd($box->boardName->payment_deadline , $dateFormat) --}}
                                        @if ($dateFormat >= $box->boardName->payment_start_date && $dateFormat <= $box->boardName->payment_deadline)
                                            @if ($box->status == 0)
                                                <td>
                                                    <a href="{{ route('make.payment', [$totalPrice, $box->boardName->id, $box->price, $box->part]) }}"
                                                        class="btn btn-sm btn-primary">Pay with PayPal👉</a>
                                                </td>
                                            @else
                                                <td>
                                                    {{-- <a href="#" class="btn btn-sm btn-success">Paid</a> --}}
                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                </td>
                                            @endif
                                        @else
                                            @if ($box->status == 0)
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-primary">Please Wait For Opening
                                                        Payment</a>
                                                </td>
                                            @else
                                                <td>
                                                    {{-- <a href="#" class="btn btn-sm btn-success">Paid</a> --}}
                                                    <span class="badge badge-pill badge-success">Paid</span>
                                                </td>
                                            @endif
                                        @endif
                                    @endif

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
                       <!-- Previous Page Link-->
                        @if ($boards->currentPage() > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $boards->previousPageUrl() }}">Previous</a>
                        </li>
                        @endif

                       <!-- Pagination Links-->
                        @for ($i = 1; $i <= $boards->lastPage(); $i++)
                        <li class="page-item {{ $i == $boards->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $boards->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor

                       <!-- Next Page Link-->
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
        });
    </script>
@endpush
