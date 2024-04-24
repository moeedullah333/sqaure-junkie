@extends('layouts.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Weekly Payment Summary</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <p>Select Date :</p>
                <select class="form-control" name="" id="date">
                    <option value="all">Select</option>
                    <option value="all">All</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 pt-5 table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th class="table-site-headings">S.No.</th>
                            <th class="table-site-headings">User Name</th>
                            <th class="table-site-headings">Board Name</th>
                            <th class="table-site-headings">Part</th>
                            <th class="table-site-headings">Price</th>
                            <th class="table-site-headings">Total Square</th>
                            <th class="table-site-headings">Total Price</th>
                            <th class="table-site-headings">Status</th>
                        </tr>
                    </thead>
                    <tbody id="payments">
                        @if (count($payments) > 0)
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($payments as $key => $payment)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $payment->User->name }}</td>
                                    <td>{{ $payment->boardName->board_name }}</td>
                                    <td>{{ $payment->part }}</td>
                                    <td>{{ $payment->price }}</td>
                                    <td>{{ count(json_decode($payment->total_square)) }}</td>
                                    <td>{{ count(json_decode($payment->total_square)) * $payment->price }}</td>
                                    @if ($payment->refund_status == 0)
                                        <td>
                                            <span class="badge badge-pill badge-success">Complete</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-pill badge-danger">Refund</span>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif

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
        });

        $(document).on('change', '#date', function() {

            $('#payments').empty();

            let html = '';
            console.log($(this).val());
            let url = "{{ route('admin.users.payment.ajax') }}";
            let data = {
                '_token': '{{ csrf_token() }}',
                'type': $(this).val(),
            };

            let res = AjaxRequest(url, data);

            console.log(res);
            if (res.status == true) {
                $('#datatable').dataTable().fnClearTable();
                $('#datatable').dataTable().fnDestroy();


                res.data.forEach((element, index) => {
                    let refund_complete = '';
                    if (element.refund_status == 0) {
                        refund_complete += `
                                        <td>
                                            <span class="badge badge-pill badge-success">Complete</span>
                                        </td>
                                        `;
                    } else {
                        refund_complete += `
                                        <td>
                                            <span class="badge badge-pill badge-danger">Refund</span>
                                        </td>
                                        `;
                    }

                    html += `
                            <tr>
                                <td>${index+1}</td>    
                                <td>${(element.user && element.user.name) ? element.user.name : "" }</td>    
                                <td>${(element.board_name && element.board_name.board_name) ? element.board_name.board_name : ""}</td>    
                                <td>${(element.part) ? element.part :""}</td>    
                                <td>${(element.price) ? element.price : ""}</td>    
                                <td>${(JSON.parse(element.total_square).length) ? JSON.parse(element.total_square).length : ""}</td>    
                                <td>${(JSON.parse(element.total_square).length * element.price) ? JSON.parse(element.total_square).length * element.price : "" } </td>    
                                ${refund_complete} 
                            </tr>
                        `;


                });

                $('#payments').html(html);
                new DataTable('#datatable');
            }
        });

    </script>
@endpush
