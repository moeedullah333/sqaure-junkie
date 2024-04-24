@extends('layouts.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Main Database</h3>
            </div>
        </div>

        <style>
            .fisco_y span {
                border: 1px solid #979797;
                padding: 5px;
                border-radius: 5px
            }
        </style>
        <div class="row">
            <div class="col-md-12 pt-5 table-responsive">
                <h4 class="fisco_y text-right">Fisco Year: <span>2024</span></h4>
                <table class="table text-center" id="datatable">
                    <thead>
                        <tr>
                            <th class="table-site-headings">S.No.</th>
                            <th class="table-site-headings">Full Name</th>
                            <th class="table-site-headings">Alias</th>
                            <th class="table-site-headings">Email Address</th>
                            <th class="table-site-headings">Total Squares</th>
                            <th class="table-site-headings">Total Squares Default</th>
                            <th class="table-site-headings">Total Time Default</th>
                            <th class="table-site-headings">Date</th>
                            <th class="table-site-headings">Status</th>
                            <th class="table-site-headings">Status Ban</th>
                            <th class="table-site-headings">Total Earning</th>
                            <th class="table-site-headings">Action</th>
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
                            <tr id="tr_{{ $user->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->alias }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ count($user->squareBuy) }}</td>
                                @php
                                    $usresGet = $user->squareBuy->toArray();
                                    $findColumn = array_column($usresGet, 'delete_status');
                                    $arr = array_count_values($findColumn);
                                @endphp

                                @if (isset($arr[1]))
                                    <td>{{ $arr[1] }}</td>
                                @else
                                    <td>0</td>
                                @endif

                                <td>{{ $user->non_payment_count }}</td>
                                <td>{{ $currentDate->format('Y-m-d') }}</td>

                                <td class="border-0 font-weight-bold">
                                    <span
                                        class="{{ $user->status == 1 ? 'text-success' : 'text-danger' }}">{{ $user->status == 1 ? 'Active' : 'Inactive' }}</span>
                                </td>

                                <td class="border-0 font-weight-bold">
                                    <span
                                        class="{{ $user->ban_user == 1 ? 'text-danger' : 'text-success' }}">{{ $user->ban_user == 1 ? 'Ban' : 'Unban' }}</span>
                                </td>

                                <td class="border-0 font-weight-bold">
                                    @foreach ($combinedArr as $key => $item)
                                        @php
                                            if ($key == $user->id) {
                                                echo array_sum($item);
                                            } else {
                                                continue;
                                            }
                                        @endphp
                                    @endforeach
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" id="benUser"
                                        data-user_id="{{ $user->id }}"> Ben/Delete </button>
                                    <button class="btn btn-sm btn-warning resetBtn" id="unbenUser"
                                        data-user_id="{{ $user->id }}">
                                        Reset </button>
                                </td>

                            </tr>
                        @endforeach
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

            

            $(document).on('click', '#benUser', function() {
            
                let url = "{{ route('admin.users.ban.ajax') }}";
                let data = {
                    '_token': '{{ csrf_token() }}',
                    'user_id': $(this).data('user_id'),
                    'type': 'ban',
                };

                let res = AjaxRequest(url, data);
                if (res.status == true) {
                   alert('User Ban successfully!');
                   location.reload();
                }

            });

            $(document).on('click', '#unbenUser', function() {

                let url = "{{ route('admin.users.ban.ajax') }}";
                let data = {
                    '_token': '{{ csrf_token() }}',
                    'user_id': $(this).data('user_id'),
                    'type': 'unban',
                };

                let res = AjaxRequest(url, data);

                if (res.status == true) {
                   alert('User Unban successfully!');
                   location.reload();
                }

            });
            // $('.resetBtn').click(function() {
            //     let userId = $(this).data('user_id');
            //     console.log(userId);
            //     if (confirm('Are you sure you want to reset this user ?')) {
            //         let data = {
            //             ''
            //         };
            //     }

            // });
        });
    </script>
@endpush
