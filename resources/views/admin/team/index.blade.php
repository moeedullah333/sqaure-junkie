@extends('layouts.main')

<style>
    .get_btn.btn_div {
        padding: 3px 18px;
    }
</style>
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Winning Teams</h3>
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

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-7">
                    <div class="d-flex align-items-center flex-wrap flex-md-nowrap selectBox gap-15 my-4">
                        <div class="title flex-shrink-0">
                            {{-- <p class="achivpFont mb-0">Filter by Game Package:</p> --}}
                        </div>
                        <div class="filterField flex-grow-1">
                            <select class="form-select form-select-sm pr-5 py-2 w-auto" aria-label=".form-select-sm example"
                                id="boardName">
                                <option>Select Board Name</option>
                                @foreach ($board as $list)
                                    <option value="{{ $list->id }}">{{ $list->board_name }}</option>
                                @endforeach

                            </select>
                            <span id="errorName"></span>
                        </div>

                        {{-- @php
                            $price = [10, 20, 30, 40, 50];
                            $alphabet = range('a', 'z');
                        @endphp --}}

                        <div class="filterField flex-grow-1">
                            <select class="form-select form-select-sm pr-5 py-2 w-auto" aria-label=".form-select-sm example"
                                id="price">
                                <option>Select Price</option>
                                {{-- @foreach ($price as $list)
                                    <option value="{{ $list }}">{{ $list }}</option>
                                @endforeach --}}

                            </select>
                            <span id="errorPrice"></span>

                        </div>

                        <div class="filterField flex-grow-1">
                            <select class="form-select form-select-sm pr-5 py-2 w-auto" aria-label=".form-select-sm example"
                                id="alphabet">
                                <option>Select Part</option>
                                {{-- @foreach ($alphabet as $list)
                                    <option value="{{ $list }}">{{ $list }}</option>
                                @endforeach --}}
                            </select>
                            <span id="errorPart"></span>

                        </div>
                        <div class="get_bn btn_div">
                            <button id="resultGet" class="btn btn-primary btn-sm">Get Result</button>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-2 my-4 px-3">
                
                </div> --}}
            </div>
        </div>



        <div class="text-center mt-5 mb-5 d-none" id="resultError">

        </div>


        <div class="row d-none" id="result">
            <div class="col-md-6 mx-auto text-center pt-5 ">
                <table>
                    <table class="table ">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Team X</th>
                                <th scope="col">Team Y</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="text-center">
                                <td id="teamXName">Team X Name: <span class="font-weight-bold"></span></td>
                                <td id="teamYName">Team Y Name: <span class="font-weight-bold"></span></td>
                            </tr>

                            <tr class="text-center">
                                <td id="teamXTotal">User Selected Team: <span class="font-weight-bold"></span></td>
                                <td id="teamYTotal">User Selected Team: <span class="font-weight-bold"></span></td>
                            </tr>

                            <tr class="text-center">
                                <td id="teamXPoint">Team Points: <span class="font-weight-bold"></span></td>
                                <td id="teamYPoint">Team Points: <span class="font-weight-bold"></span></td>
                            </tr>

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


            $('#boardName').on('change', function() {
                console.log($(this).val());
                $('#price').empty();
                let url = "{{ route('admin.team.Winning.data.ajax') }}";

                let data = {
                    '_token': '{{ csrf_token() }}',
                    'board_id': $(this).val(),
                    'type': 'price',
                };

                console.log(data)
                let res = AjaxRequest(url, data);

                if (res.status == true) {
                    let html = `<option value="">Select Price</option>`;
                    $('#price').append(html);

                    res.data.forEach(element => {
                        let html = `<option value="${element.price}">${element.price}</option>`;
                        $('#price').append(html);
                    });
                }
            });


            $('#price').on('change', function() {
                console.log($(this).val(), $('#boardName').val());
                $('#alphabet').empty();

                let url = "{{ route('admin.team.Winning.data.ajax') }}";

                let data = {
                    '_token': '{{ csrf_token() }}',
                    'board_id': $('#boardName').val(),
                    'price': $(this).val(),
                    'type': 'alphabet',
                };

                let res = AjaxRequest(url, data);
                console.log(res);
                if (res.status == true) {
                    let html = `<option value="">Select Part</option>`;
                    $('#alphabet').append(html);

                    res.data.forEach(element => {
                        let html = `<option value="${element.id}">${element.part}</option>`;
                        $('#alphabet').append(html);
                    });
                }
            });

            $("#resultGet").click(function() {
                let boardName = $('#boardName').val();
                let price = $('#price').val();
                let alphabet = $('#alphabet').val();

                // console.log(boardName);

                if (boardName == "Select Board Name") {
                    $('#errorName').addClass('text-danger').text('The board name field is required.');
                } else {
                    $('#errorName').removeClass('text-danger').text('');
                }

                if (price == "Select Price") {
                    $('#errorPrice').addClass('text-danger').text('The price field is required.');
                } else {
                    $('#errorPrice').removeClass('text-danger').text('');
                }

                if (alphabet == "Select Part") {
                    $('#errorPart').addClass('text-danger').text('The part field is required.');
                } else {
                    $('#errorPart').removeClass('text-danger').text('');
                }

                let url =
                    "{{ route('admin.team.Winning', ['board_id' => ':boardName', 'price' => ':price', 'part' => ':alphabet']) }}"
                    .replace(':boardName', boardName)
                    .replace(':price', price)
                    .replace(':alphabet', alphabet);

                $.ajax({
                    type: "get",
                    url: url,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == true) {
                            // console.log(response);
                            $('#result').removeClass('d-none');
                            $('#teamXName span').text(response.data.teamXname);
                            $('#teamYName span').text(response.data.teamYname);
                            $('#teamXTotal span').text(response.data.teamXcount);
                            $('#teamYTotal span').text(response.data.teamYcount);
                            $('#teamXPoint span').text(response.data.teamXResult);
                            $('#teamYPoint span').text(response.data.teamYResult);

                            $('#resultError').addClass('d-none');

                        }

                        if (response.status == false) {
                            // console.log(response.message)
                            $('#resultError').removeClass('d-none');

                            $('#result').addClass('d-none');

                            $('#resultError').addClass('text-danger').text(response.message);
                        }

                    }
                });

                // console.log(url)

            })
        });
    </script>
@endpush
