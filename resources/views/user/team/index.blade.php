@extends('user.user-layout.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Winning Last 10 Teams</h3>
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


        <div class="row" id="result">
            <div class="col-md-12 mx-auto text-center pt-5 ">
                <table>
                    <table class="table" id="datatable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#No</th>
                                <th scope="col">Board Name</th>
                                <th scope="col">Part</th>
                                <th scope="col">Team X</th>
                                <th scope="col">Team Y</th>
                                <th scope="col">User Selected Team X</th>
                                <th scope="col">User Selected Team Y</th>
                                <th scope="col">Team X Points</th>
                                <th scope="col">Team Y Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($winningResult); --}}
                            @if (count($winningResult) > 0)
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($winningResult as $list)
                                    {{-- @dd($list['teamName'][0]) --}}
                                    <tr class="text-center">
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $list['teamName'][3] }}</td>
                                        <td>{{ $list['teamName'][2] }}</td>
                                        <td>{{ $list['teamName'][0] }}</td>
                                        <td>{{ $list['teamName'][1] }}</td>
                                        <td>{{ $list['teamXCount'] }}</td>
                                        <td>{{ $list['teamYCount'] }}</td>
                                        <td>{{ $list['teamXResult'] }}</td>
                                        <td>{{ $list['teamYResult'] }}</td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="7">No data available in table</td>
                            </tr>
                            @endif


                        </tbody>
                    </table>
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