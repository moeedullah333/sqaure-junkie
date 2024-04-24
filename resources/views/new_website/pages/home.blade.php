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
                    <h2 class="main_heading text-center">Immersive Gameplay Experience</h2>

                    <p class="main_para text-center">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and
                    </p>

                    <div class="main_action_btn text-center mt-3">
                        <a href="{{ route('current_game.list') }}">PLAY NOW</a>
                    </div>

                </div>


                <x-main-banner />

            </div>
        </div>

    </section>


    <section class="exploring_universe_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-lg-5 mx-auto">
                    <div class="universe_img mb-3">
                        <img src="{{ asset('assets/new_website/images/second-section-img.png') }}" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-sm-12 col-lg-7">
                    <div class="px-3">

                        <h2 class="main_heading">Exploring the Square Universe</h2>

                        <p class="main_para">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and
                        </p>

                        <p class="main_para">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>

                        <p class="main_para">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and
                        </p>

                        <div class="main_action_btn mt-3">
                            <a href="javascript:;" class="text-dark">LEARN MORE</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="unlocking_secret_section">
        <div class="container">
            <div class="for_background">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="px-3">
                            <h2 class="main_heading">Unlocking Secrets in the Game Grid</h2>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-6">

                        <div>
                            <p class="main_para text-justify">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into
                            </p>

                            <div class="main_action_btn mt-3">
                                <a href="javascript:;" class="text-dark">REGISTER</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>


    <section class="how_to_play_section" id="howToPlay-id">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto mb-4">
                    <div class="text-center">
                        <h2 class="main_heading">how to play</h2>

                        <p class="main_para">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived n
                        </p>
                    </div>
                </div>


                <div class="col-md-3">

                    <img src="{{ asset('assets/new_website/images/arrow.png') }}" class="arrow_image" alt="">

                    <div class="how_to_play_categories text-center">

                        <div class="play_img mx-auto">
                            <img src="{{ asset('assets/new_website/images/play-icon-01.png') }}" class="img-fluid"
                                alt="">
                            <span>1</span>
                        </div>

                        <h6 class="play_category_title">Voting</h6>

                        <p class="main_para">Lorem Ipsum is simply dummy text of the printing and printing</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <img src="{{ asset('assets/new_website/images/arrow_rotated.png') }}" class="arrow_image"
                        alt="">

                    <div class="how_to_play_categories text-center">

                        <div class="play_img mx-auto">
                            <img src="{{ asset('assets/new_website/images/play-icon-02.png') }}" class="img-fluid"
                                alt="">
                            <span>2</span>
                        </div>

                        <h6 class="play_category_title">Sqaure Box Selection</h6>

                        <p class="main_para">Lorem Ipsum is simply dummy text of the printing and printing</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <img src="{{ asset('assets/new_website/images/arrow.png') }}" class="arrow_image" alt="">

                    <div class="how_to_play_categories text-center">

                        <div class="play_img mx-auto">
                            <img src="{{ asset('assets/new_website/images/play-icon-03.png') }}" class="img-fluid"
                                alt="">
                            <span>3</span>
                        </div>

                        <h6 class="play_category_title">Number Generation</h6>

                        <p class="main_para">Lorem Ipsum is simply dummy text of the printing and printing</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="how_to_play_categories text-center">

                        <div class="play_img mx-auto">
                            <img src="{{ asset('assets/new_website/images/play-icon-01.png') }}" class="img-fluid"
                                alt="">
                            <span>4</span>
                        </div>

                        <h6 class="play_category_title">Payout</h6>

                        <p class="main_para">Lorem Ipsum is simply dummy text of the printing and printing</p>

                    </div>
                </div>

                <div class="main_action_btn mt-3 mx-auto">
                    <a href="javascript:;" class="text-dark">PLAY NOW</a>
                </div>

            </div>
        </div>
    </section>


    <section class="faq_section" id="faqs-id">
       <x-faq/>
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.
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

                {{-- <div class="col-sm-6 col-lg-8">

                    <div class="contact_us_form mb-3">

                        <form action="" class="mt-3">

                            <div class="form-group">
                                <input type="text" class="form-control" id="" placeholder="First Name*">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" id="" aria-describedby="emailHelp"
                                    placeholder="Your Email*">
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" id="" aria-describedby="emailHelp"
                                    placeholder="Phone Number*">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="" rows="6" placeholder="Your Message...."></textarea>
                            </div>

                            <div class="main_action_btn mt-3 mx-auto">
                                <a href="javascript:;" class="w-100 text-center">SUBMIT NOW</a>
                            </div>

                        </form>

                    </div>

                </div> --}}
                <div class="col-sm-6 col-lg-8">

                    <x-success-message/>
                    <div class="contact_us_form mb-3">

                      <x-contact-form/>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
