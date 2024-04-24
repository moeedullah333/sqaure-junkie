@extends('new_website.layouts.main')

@section('content')
    <section class="immersive_gameplay_section">
        <div class="container">
            <div class="row">

                <img src="{{ asset('assets/new_website/images/empty-logo.png') }}" class="empty-logo" alt="">

                <img src="{{ asset('assets/new_website/images/right-blogo.png') }}" class="right-blogo" alt="">

                <img src="{{ asset('assets/new_website/images/c-logo.png') }}" class="c-logo" alt="">

                <img src="{{ asset('assets/new_website/images/s-logo.png') }}" class="sm-slogo" alt="">

                <img src="{{ asset('assets/new_website/images/b-logo.png') }}" class="b-logo" alt="">

                <img src="{{ asset('assets/new_website/images/s-logo.png') }}" class="second_slogo" alt="">

                <img src="{{ asset('assets/new_website/images/a-S-logo.png') }}" class="first_slogo" alt="">

                <div class="col-md-8 mx-auto">
                    <h2 class="main_heading text-center">contact us</h2>

                    <!-- <p class="main_para text-center">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        </p> -->

                    <!-- <div class="main_action_btn text-center mt-3">
                            <a href="javascript:;">PLAY NOW</a>
                        </div> -->

                </div>


                <x-main-banner />

            </div>
        </div>

    </section>


    <section class="getintouch_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main_heading text-center mb-4">get in touch with us</h2>
                </div>

                <div class="col-sm-6 col-lg-4">

                    <div class="contact_us_main mb-3">

                        <h4>CONTACT US</h4>

                        <p class="main_para">
                            It is a long established fact that a reader will be distracted by the readable content of a page
                            when looking at its layout.
                        </p>

                        <div class="contact_us_info">
                            <span class="contact_icon"><i class="fa-solid fa-phone-volume"></i></span>
                            <span class="contact_info">
                                <p class="m-0">Phone Number</p>
                                <p class="m-0">(219) 552-1348</p>
                            </span>
                        </div>

                        <div class="contact_us_info">
                            <span class="contact_icon"><i class="fa-solid fa-envelope-open-text"></i></span>
                            <span class="contact_info">
                                <p class="m-0">Email Address</p>
                                <p class="m-0">info@thatsyouropinion.com</p>
                            </span>
                        </div>

                        <div class="contact_us_info">
                            <span class="contact_icon"><i class="fa-solid fa-location-dot"></i></span>
                            <span class="contact_info">
                                <p class="m-0">Location</p>
                                <p class="m-0">Lowell, Indiana</p>
                            </span>
                        </div>

                        <div class="follow_us">
                            <p>Follow Us:</p>

                            <div class="social_icons">
                                <span><i class="fa-brands fa-facebook-f"></i></span>
                                <span><i class="fa-brands fa-twitter"></i></span>
                                <span><i class="fa-brands fa-instagram"></i></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6 col-lg-8">
                    <x-success-message />
                    <div class="contact_us_form mb-3">

                        <x-contact-form />

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
