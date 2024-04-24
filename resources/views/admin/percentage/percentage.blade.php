@extends('layouts.main')
@section('content')
    @php

        if (isset($data->percentage)) {
            $percentage = json_decode($data->percentage);
        }

    @endphp

    <div class="row pt-5">
        <div class="col-md-5">
            <div class="perceantage_table">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">Qtr.</th>
                            <th scope="col">Right <br> Way</th>
                            <th scope="col">Wrong <br> Way</th>
                            <th scope="col">Plus <br> 2</th>
                            <th scope="col">Minus <br> 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1st Qtr.
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[0])) value="{{ $percentage[0] }}" @else  value="9" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[1])) value="{{ $percentage[1] }}" @else  value="6" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[2])) value="{{ $percentage[2] }}" @else  value="3" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[3])) value="{{ $percentage[3] }}" @else  value="3" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                2nd Qtr.
                            </td>

                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[4])) value="{{ $percentage[4] }}" @else  value="9" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>

                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[5])) value="{{ $percentage[5] }}" @else  value="6" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[6])) value="{{ $percentage[6] }}" @else  value="3" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[7])) value="{{ $percentage[7] }}" @else  value="3" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                3rd Qtr.
                            </td>

                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[8])) value="{{ $percentage[8] }}" @else  value="9" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[9])) value="{{ $percentage[9] }}" @else  value="6" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[10])) value="{{ $percentage[10] }}" @else  value="3" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[11])) value="{{ $percentage[11] }}" @else  value="3" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                4th Qtr.
                            </td>

                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[12])) value="{{ $percentage[12] }}" @else  value="17" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[13])) value="{{ $percentage[13] }}" @else  value="12" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[14])) value="{{ $percentage[14] }}" @else  value="4" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>
                            <td>
                                <input type="number" class="numericInput"
                                    @if (isset($percentage[15])) value="{{ $percentage[15] }}" @else  value="4" @endif
                                    min="1" max="99"><span>%</span>
                                <p class="text-danger errorMessage"></p>
                            </td>

                        </tr>

                    </tbody>
                </table>
                <p class="total_count_percent">100%</p>
                <span id="above_percentage" class="text-danger"></span>
                <br>
                <button id="add_percentage_btn" class="btn btn-primary mb-3">Set Percentage</button>
                <br>
                <span id="success_msg" class="text-success font-weight-bolder"></span>

            </div>

        </div>

    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            var totalAmount = $('#totalAmount').val();
            $('#totalAmountShow').text(totalAmount);


            $('.numericInput').on('input', function() {
                const maxLength = 2;
                const $errorMessage = $(this).siblings('.errorMessage');

                if ($(this).val().length > maxLength) {
                    $(this).val($(this).val().slice(0, maxLength));
                    $errorMessage.text('Maximum length exceeded');
                } else {
                    $errorMessage.text('');
                }
            });

            $('.numericInput').change(function() {

                var nullArr = [];
                $('.perceantage_table input[type=number]').each(function() {

                    let val = parseInt($(this).val());

                    let arr = nullArr.push(val);
                });

                var sum = 0;

                $.each(nullArr, function(index, value) {
                    sum += value;
                });

                $('.total_count_percent').text(sum + "%");
                if (sum > 100) {
                    $('#above_percentage').text('Your Percentage is (100) Above');
                    $('#add_percentage_btn').prop('disabled', true);
                } else if (sum < 100) {
                    $('#above_percentage').text('Your Percentage is (100) below');
                    $('#add_percentage_btn').prop('disabled', true);
                } else {
                    $('#above_percentage').text('');
                    $('#add_percentage_btn').prop('disabled', false);
                }
            });



            $('#add_percentage_btn').on('click', function(e) {
                e.preventDefault();
                var nullArr = [];
                $('.perceantage_table input[type=number]').each(function() {

                    let val = parseInt($(this).val());

                    let percentage = (val / 100);

                    let arr = nullArr.push(val);
                });

                let url = "{{ route('admin.percentage.store') }}";
                let data = {
                    'values': nullArr,
                    '_token': "{{ csrf_token() }}",
                };
                let res = AjaxRequest(url, data);

                if (res.status == true) {
                    $('#success_msg').text(res.msg);
                    setTimeout(() => {
                        $('#success_msg').text('');
                    }, 3000);

                    for (let i = 0; i < res.data.length; i++) {
                        const element = res.data[i];

                        $('.perceantage_table input[type=number]').eq(i).val(element);
                    }
                }


            });

        });
    </script>
@endpush
