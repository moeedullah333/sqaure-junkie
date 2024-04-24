@extends('layouts.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Boards</h3>
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
                            <th class="table-site-headings">User Name</th>
                            <th class="table-site-headings">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp

                        @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                                <tr>

                                    <td>{{ $count++ }}</td>
                                    <td>{{ $user->users->name }}</td>
                                    <td>${{ $user->price }}</td>

                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

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
