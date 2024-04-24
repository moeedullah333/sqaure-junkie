@extends('layouts.main')

@section('content')

    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}

    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"> --}}



    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}



    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">

        <div class="row justify-content-between">

            <div class="col-md-12 mb-3">

                <h3 class="achivpFont">Boards</h3>

            </div>

        </div>



        <style>

            .form-group label {

                font-weight: 800;

            }

        </style>





        <form action="{{ route('admin.board_store') }}" method="post">

            @csrf

            <div class="container">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="board-name">Board Name</label>

                            <input type="text" class="form-control" required id="board-name"

                                placeholder="Enter Board Name" name="board_name">

                            @error('board_name')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Status</label>

                            <select name="status" class="form-control">

                                <option value="1">Active</option>

                                <option value="0">Inactive</option>

                            </select>

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="team-name-x">Team Name X</label>

                            <input type="text" class="form-control" required id="team-name-x"

                                placeholder="Enter team Name X" name="team_name_x">

                            @error('team_name_x')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="team-name-y">Team Name Y</label>

                            <input type="text" class="form-control" required id="team-name-y"

                                placeholder="Enter team Name Y" name="team_name_y">

                            @error('team_name_y')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="generate_number-date">Set Other Board Price</label>

                            <input type="number" class="form-control" value="0" placeholder="Enter Other Price" min="0" step="any"

                                name="other_value">

                            @error('other_value')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="voting-start-date">Voting Start (DATE)</label>

                            <input type="datetime-local" class="form-control" required id="voting-start-date"

                                name="voting_start_date">

                            @error('voting_start_date')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="voting-date">Voting Deadline (DATE)</label>

                            <input type="datetime-local" class="form-control" required id="voting-date"

                                name="voting_deadline">

                            @error('voting_deadline')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="square-start-date">Square Selection Start (DATE)</label>

                            <input type="datetime-local" class="form-control" required id="square-start-date"

                                name="square_start_date">

                            @error('square_start_date')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="square-deadline-date">Square Selection End (DATE)</label>

                            <input type="datetime-local" class="form-control" required id="square-deadline-date"

                                name="square_deadline_date">

                            @error('square_deadline_date')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="payment_start-date">Payment Start (DATE)</label>

                            <input type="datetime-local" class="form-control" required id="payment_start-date"

                                name="payment_start_date">

                            @error('payment_start_date')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="payment_deadline-date">Payment End (DATE)</label>

                            <input type="datetime-local" class="form-control" required id="payment_deadline-date"

                                name="payment_deadline_date">

                            @error('payment_deadline_date')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                    {{-- <div class="col-md-6">

                        <div class="form-group">

                            <label for="game-date">Game (DATE)</label>

                            <input type="date" class="form-control" required id="game-date" name="game_date">

                            @error('game_date')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div> --}}



                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="generate_number-date">Generate Number (DATE)</label>

                            <input type="datetime-local" class="form-control" required id="generate_number-date"

                                name="generate_number_date">

                            @error('generate_number_date')

                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                        </div>

                    </div>



                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>



    </div>

    </div>

@endsection

@push('js')

    <script>

        $(document).ready(function() {



            $('#voting-start-date').on('change', function() {

                var datetimeValue = $(this).val();



                let test = $('#voting-date').removeAttr('disabled').attr({

                    "min": datetimeValue,

                });



            });



            $('#voting-date').on('change', function() {

                var datetimeValue = $(this).val();



                let test = $('#square-start-date').removeAttr('disabled').attr({

                    "min": datetimeValue,

                });



            });



            $('#square-start-date').on('change', function() {

                var datetimeValue = $(this).val();



                let test = $('#square-deadline-date').removeAttr('disabled').attr({

                    "min": datetimeValue,

                });



            });



            $('#square-deadline-date').on('change', function() {

                var datetimeValue = $(this).val();



                let test = $('#payment_start-date').removeAttr('disabled').attr({

                    "min": datetimeValue,

                });



            });



            $('#payment_start-date').on('change', function() {

                var datetimeValue = $(this).val();



                let test = $('#payment_deadline-date').removeAttr('disabled').attr({

                    "min": datetimeValue,

                });



            });



            $('#payment_deadline-date').on('change', function() {

                var datetimeValue = $(this).val();



                let test = $('#generate_number-date').removeAttr('disabled').attr({

                    "min": datetimeValue,

                });



            });



            $('input[type=datetime-local]').not(':first').each(function() {



                $(this).attr('disabled', true);

            });

        });

    </script>

@endpush

