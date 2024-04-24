{{-- @extends('website.layouts.main')
@section('content')
<section class="welcome_section m-5">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <div class="welcome_left_part">

                    <h2 class="text-center align-self-center">
                        Welcome to the world of <br> pool Sport notBillards <br>Sport
                    </h2>

                </div>

            </div>


            <div class="col-md-6 py-5 align-self-center">

                <div class="welcome_right_part">

                    <div class="welcome_btn">

                        <a href="{{route('user.register')}}" class="btns">Register</a>
                        <a  href="{{route('user.login')}}" class="btns">Login</a>
                    </div>

                    <div class="right_content">

                        <div class="video_part mb-5">

                            <h2>A Introduction Video</h2>
                            <img src="{{asset('assets/website')}}{{asset('assets/website/images_new_design/img-02.png')}}" alt="">

                        </div>

                        <div class="video_part">

                            <h2>How to Play Instructions</h2>
                            <img src="{{asset('assets/website')}}{{asset('assets/website/images_new_design/img-03.png')}}" alt="">
                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>
    </div>

</section>
@endsection --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Square Junkie</title>
    <link rel="stylesheet" href=" {{ asset('assets/website/css/newStyle.css') }}">

    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <!-- fontawesome links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- swiper links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>

    <header class="desktop_header_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="desktop-header">

                        <div class="site_logo">
                            <img src="{{ asset('assets/website/images_new_design/main_logo.png') }}" alt="">
                        </div>

                        <div class="navbar_list">
                            <ul>
                                <li><a href="javascript:;" class="navbar_links">HOME</a></li>
                                <li><a href="javascript" class="navbar_links">ABOUT US</a></li>
                                <li><a href="javascript:;" class="navbar_links">CONTACT US</a></li>
                            </ul>
                        </div>

                        <div class="navbar_right_icons">
                            <a href="javascript:;">
                                <span class="right_icon mr-3"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </a>

                            @if (isset(auth()->user()->id))
                                <a href="{{ route('user.dashboard') }}" class="second_child">
                                    <span class="right_icon"><i class="fa-regular fa-user"></i></span>
                                </a>
                            @else
                                <a href="{{ route('user_login') }}" class="second_child">
                                    <span class="right_icon"><i class="fa-regular fa-user"></i></span>
                                </a>
                            @endif

                            <div class="dropdown show">
                                <a class="right_icon" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-regular fa-user"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Home</a>
                                    <a class="dropdown-item" href="#">About Us</a>
                                    <a class="dropdown-item" href="#">Contact Us</a>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="immersive_gameplay_section">
        <div class="container">
            <div class="row">

                <img src="{{ asset('assets/website/images_new_design/empty-logo.png') }}" class="empty-logo"
                    alt="">

                <img src="{{ asset('assets/website/images_new_design/right-blogo.png') }}" class="right-blogo"
                    alt="">

                <img src="{{ asset('assets/website/images_new_design/c-logo.png') }}" class="c-logo" alt="">

                <img src="{{ asset('assets/website/images_new_design/s-logo.png') }}" class="sm-slogo" alt="">

                <img src="{{ asset('assets/website/images_new_design/b-logo.png') }}" class="b-logo" alt="">

                <img src="{{ asset('assets/website/images_new_design/s-logo.png') }}" class="second_slogo"
                    alt="">

                <img src="{{ asset('assets/website/images_new_design/a-S-logo.png') }}" class="first_slogo"
                    alt="">

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


                <div class="col-md-10 mx-auto mt-5">

                    <div class="main_swiper_slider">

                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/website/images_new_design/slider-img.png') }}"
                                        class="img-fluid" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/website/images_new_design/slider-img.png') }}"
                                        class="img-fluid" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/website/images_new_design/slider-img.png') }}"
                                        class="img-fluid" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/website/images_new_design/slider-img.png') }}"
                                        class="img-fluid" />
                                </div>

                            </div>

                            <div class="swiper-button-next"><i class="fa-solid fa-arrow-right swiper_arrows"></i>
                            </div>
                            <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left swiper_arrows"></i></div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </section>


    <section class="exploring_universe_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-lg-5 mx-auto">
                    <div class="universe_img mb-3">
                        <img src="{{ asset('assets/website/images_new_design/second-section-img.png') }}"
                            class="img-fluid" alt="">
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


    <section class="how_to_play_section">
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

                    <img src="{{ asset('assets/website/images_new_design/arrow.png') }}" class="arrow_image"
                        alt="">

                    <div class="how_to_play_categories text-center">

                        <div class="play_img mx-auto">
                            <img src="{{ asset('assets/website/images_new_design/play-icon-01.png') }}"
                                class="img-fluid" alt="">
                            <span>1</span>
                        </div>

                        <h6 class="play_category_title">Voting</h6>

                        <p class="main_para">Lorem Ipsum is simply dummy text of the printing and printing</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <img src="{{ asset('assets/website/images_new_design/arrow_rotated.png') }}" class="arrow_image"
                        alt="">

                    <div class="how_to_play_categories text-center">

                        <div class="play_img mx-auto">
                            <img src="{{ asset('assets/website/images_new_design/play-icon-02.png') }}"
                                class="img-fluid" alt="">
                            <span>2</span>
                        </div>

                        <h6 class="play_category_title">Sqaure Box Selection</h6>

                        <p class="main_para">Lorem Ipsum is simply dummy text of the printing and printing</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <img src="{{ asset('assets/website/images_new_design/arrow.png') }}" class="arrow_image"
                        alt="">

                    <div class="how_to_play_categories text-center">

                        <div class="play_img mx-auto">
                            <img src="{{ asset('assets/website/images_new_design/play-icon-03.png') }}"
                                class="img-fluid" alt="">
                            <span>3</span>
                        </div>

                        <h6 class="play_category_title">Number Generation</h6>

                        <p class="main_para">Lorem Ipsum is simply dummy text of the printing and printing</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="how_to_play_categories text-center">

                        <div class="play_img mx-auto">
                            <img src="{{ asset('assets/website/images_new_design/play-icon-01.png') }}"
                                class="img-fluid" alt="">
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


    <section class="faq_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main_heading text-center">frequently asked questions</h2>
                </div>

                <div class="col-sm-12 col-lg-6">

                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span class="numbering">01.</span>
                                        <span class="card_btn_content">Lorem Ipsum is simply dummy text of the and
                                            typesetting industry.</span>
                                        <!-- <span class="card_dropdown_icon"><i class="fa-solid fa-angle-down"></i></span> -->
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="numbering">02.</span>
                                        <span class="card_btn_content">Lorem Ipsum is simply dummy text of the and
                                            typesetting industry.</span>
                                        <!-- <span class="card_dropdown_icon"><i class="fa-solid fa-angle-down"></i></span> -->
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <span class="numbering">03.</span>
                                        <span class="card_btn_content">Lorem Ipsum is simply dummy text of the and
                                            typesetting industry.</span>
                                        <!-- <span class="card_dropdown_icon"><i class="fa-solid fa-angle-down"></i></span> -->
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-lg-6">

                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingfour">
                                <h5 class="mb-0">
                                    <button class=" btn-link" data-toggle="collapse" data-target="#collapsefour"
                                        aria-expanded="false" aria-controls="collapsefour">
                                        <span class="numbering">04.</span>
                                        <span class="card_btn_content">Lorem Ipsum is simply dummy text of the and
                                            typesetting industry.</span>
                                        <!-- <span class="card_dropdown_icon"><i class="fa-solid fa-angle-down"></i></span> -->
                                    </button>
                                </h5>
                            </div>

                            <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingfive">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapsefive" aria-expanded="false"
                                        aria-controls="collapsefive">
                                        <span class="numbering">05.</span>
                                        <span class="card_btn_content">Lorem Ipsum is simply dummy text of the and
                                            typesetting industry.</span>
                                        <!-- <span class="card_dropdown_icon"><i class="fa-solid fa-angle-down"></i></span> -->
                                    </button>
                                </h5>
                            </div>
                            <div id="collapsefive" class="collapse" aria-labelledby="headingfive"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingsix">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                        <span class="numbering">06.</span>
                                        <span class="card_btn_content">Lorem Ipsum is simply dummy text of the and
                                            typesetting industry.</span>
                                        <!-- <span class="card_dropdown_icon"><i class="fa-solid fa-angle-down"></i></span> -->
                                    </button>
                                </h5>
                            </div>
                            <div id="collapsesix" class="collapse" aria-labelledby="headingsix"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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

                <div class="col-sm-6 col-lg-8">

                    <div class="contact_us_form mb-3">

                        <form action="" class="mt-3">

                            <div class="form-group">
                                <input type="text" class="form-control" id="" placeholder="First Name*">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" id=""
                                    aria-describedby="emailHelp" placeholder="Your Email*">
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" id=""
                                    aria-describedby="emailHelp" placeholder="Phone Number*">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="" rows="6" placeholder="Your Message...."></textarea>
                            </div>

                            <div class="main_action_btn mt-3 mx-auto">
                                <a href="javascript:;" class="w-100 text-center">SUBMIT NOW</a>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "cube",
            grabCursor: true,
            cubeEffect: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <footer>
        <div class="footerSection">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 border-right mb-2">

                        <div>
                            <img src="{{ asset('assets/website/images_new_design/main_logo.png') }}" alt="">
                        </div>

                        <p class="footer_followus">FOLLOW US</p>

                        <div class="footer_social_icons">
                            <span><i class="fa-brands fa-facebook-f"></i></span>
                            <span><i class="fa-brands fa-twitter"></i></span>
                            <span><i class="fa-brands fa-instagram"></i></span>
                        </div>

                    </div>

                    <div class="col-md-5">

                        <div>
                            <p class="main_para pb-4 border-bottom">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum
                                has been the industry's standard dummy text ever since the
                            </p>

                            <p class="main_para pt-2">All Right Reserved. square junkie 2024</p>
                        </div>

                    </div>
                    <div class="col-md-3 border-left">

                        <ul class="links_list">
                            <li><a href="javascript:;">ABOUT US</a></li>
                            <li><a href="javascript:;">SERVICES</a></li>
                            <li><a href="javascript:;">HOW TO PLAY</a></li>
                            <li><a href="javascript:;">FAQ'S</a></li>
                            <li><a href="javascript:;">CONTACT US</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
