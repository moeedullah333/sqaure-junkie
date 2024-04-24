@extends('website.layouts.main')
@section('content')
    <section class="banner-div">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>Payment Method</h1>
                    <div class="text-center py-3">
                        <span><a href="javascript:;">Home</a></span>
                        <span><a href="{{ route('user_payment_method') }}">Payment Method</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="payment_method_section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">

                    {{-- @if ($data->payment_type == 1)
                        @dd('Cashapp')
                    @elseif ($data->payment_type == 2)
                        @dd('Venmo')
                    @else
                        @dd("Paypal")
                    @endif --}}

                    <div class="payment_method_head">
                        <h1>Select Payment Method</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p>
                    </div>
                    <div class="col-md-10 mx-auto py-3">
                        <div class="payment_select">
                            <label for="">Payment Method</label>
                            <select name="payment" class="form-control" id="payment">
                                <option selected muted disabled>Select Your Payment Method</option>
                                <option value="1">Paypal</option>
                                <option value="2">Cash</option>
                                <option value="3">Stripe</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary btn-sm d-none" id="paypal"
                            href="{{ $board_id ? '#' : '#' }}">Paypal</a>
                        <a class="btn btn-primary btn-sm d-none" id="cash" href="#">Cash</a>
                        <a class="btn btn-primary btn-sm d-none" id="stripe" href="#">Stripe</a>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#payment').change(function() {

                var amount = $(this).val();

                if (amount == 1) {
                    $('#paypal').removeClass('d-none');
                    $('#cash').addClass('d-none');
                    $('#stripe').addClass('d-none');
                } else if (amount == 2) {
                    $('#cash').removeClass('d-none');
                    $('#stripe').addClass('d-none');
                    $('#paypal').addClass('d-none');
                } else if (amount == 3) {
                    $('#stripe').removeClass('d-none');
                    $('#paypal').addClass('d-none');
                    $('#cash').addClass('d-none');
                }

            });
        });
    </script>
@endpush
