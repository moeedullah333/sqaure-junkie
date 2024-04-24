@extends('website.layouts.main')
@section('content')
    <section class="banner-div">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>Boards Voting List</h1>
                    <div class="text-center py-3">
                        <span><a href="javascript:;">Home</a></span>
                        <span><a href="{{ route('user.board.list') }}">Boards Voting List</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="payment_method_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="payment_method_head">   
                        <h1>Boards Voting List</h1>
                    </div>
                    <div class="col-md-10 mx-auto py-3">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Board Name</th>
                                    <th scope="col">Voting Deadline</th>
                                    <th scope="col">Game Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp

                                @if ($boards->isNotEmpty())
                                    @foreach ($boards as $board)
                                        <tr>
                                            <td scope="row">{{ $count++ }}</td>
                                            <td>{{ $board->board_name }}</td>
                                            <td>{{ $board->voting_deadline }}</td>
                                            <td>{{ $board->game_date }}</td>
                                            @if ($board->status == 1)
                                                <td class="text-success">Active</td>
                                            @else
                                                <td class="text-danger">Inactive</td>
                                            @endif

                                            @if ($board->status == 1)
                                                <td>
                                                    <a href="{{ route('voting', $board->id) }}"
                                                        class="btn btn-primary btn-sm">View</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Board Inactive</a>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No data available in table</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
