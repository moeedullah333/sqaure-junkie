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
                    <h2 class="main_heading text-center">about us</h2>

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


    <section class="exploring_universe_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-lg-5 mx-auto">
                    <div class="universe_img mb-3">
                        <img src="{{ asset('assets/new_website/images/aboutus_bk_second.png') }}" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-sm-12 col-lg-7">
                    <div class="px-3">

                        <h2 class="main_heading">what we do</h2>

                        <p class="main_para">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and
                        </p>

                        <p class="main_para">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum.
                        </p>

                        <p class="main_para">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and
                        </p>

                        <!-- <div class="main_action_btn mt-3">
                                <a href="javascript:;" class="text-dark">LEARN MORE</a>
                            </div> -->

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
                        <h2 class="main_heading">why choose us</h2>

                        <p class="main_para">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived n
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="swiper whychooseusSwiper">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="chooseus_img">
                                    <img src="{{ asset('assets/new_website/images/whychooseuse-img-01.png') }}"
                                        class="img-fluid" alt="">
                                </div>

                                <div class="chooseus_card_main">
                                    <div class="chooseus_card_icon mx-auto">
                                        <img src="{{ asset('assets/new_website/images/whychooseuse-icon-01.png') }}"
                                            alt="">
                                    </div>

                                    <div class="chooseus_card_content">
                                        <h6 class="chooseus_card_heading">Heading Goes Here</h6>

                                        <p class="chooseus_card_para">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                            Ipsum has been the industrys standard dummy text ever since the when an unknown
                                            printer took t is a long established fact that a reader will be distracted by
                                            the readable content
                                        </p>

                                        <div class="chooseus_card_actionbtn">
                                            <a href="javascript:;">LEARN MORE <span><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="chooseus_img">
                                    <img src="{{ asset('assets/new_website/images/whychooseuse-img-02.png') }}"
                                        class="img-fluid" alt="">
                                </div>

                                <div class="chooseus_card_main">
                                    <div class="chooseus_card_icon mx-auto">
                                        <img src="{{ asset('assets/new_website/images/whychooseuse-icon-02.png') }}"
                                            alt="">
                                    </div>

                                    <div class="chooseus_card_content">
                                        <h6 class="chooseus_card_heading">Heading Goes Here</h6>

                                        <p class="chooseus_card_para">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                            Ipsum has been the industrys standard dummy text ever since the when an unknown
                                            printer took t is a long established fact that a reader will be distracted by
                                            the readable content
                                        </p>

                                        <div class="chooseus_card_actionbtn">
                                            <a href="javascript:;">LEARN MORE <span><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="chooseus_img">
                                    <img src="{{ asset('assets/new_website/images/whychooseuse-img-03.png') }}"
                                        class="img-fluid" alt="">
                                </div>

                                <div class="chooseus_card_main">
                                    <div class="chooseus_card_icon mx-auto">
                                        <img src="{{ asset('assets/new_website/images/whychooseuse-icon-03.png') }}"
                                            alt="">
                                    </div>

                                    <div class="chooseus_card_content">
                                        <h6 class="chooseus_card_heading">Heading Goes Here</h6>

                                        <p class="chooseus_card_para">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                            Ipsum has been the industrys standard dummy text ever since the when an unknown
                                            printer took t is a long established fact that a reader will be distracted by
                                            the readable content
                                        </p>

                                        <div class="chooseus_card_actionbtn">
                                            <a href="javascript:;">LEARN MORE <span><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="chooseus_img">
                                    <img src="{{ asset('assets/new_website/images/whychooseuse-img-01.png') }}"
                                        class="img-fluid" alt="">
                                </div>

                                <div class="chooseus_card_main">
                                    <div class="chooseus_card_icon mx-auto">
                                        <img src="{{ asset('assets/new_website/images/whychooseuse-icon-01.png') }}"
                                            alt="">
                                    </div>

                                    <div class="chooseus_card_content">
                                        <h6 class="chooseus_card_heading">Heading Goes Here</h6>

                                        <p class="chooseus_card_para">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                            Ipsum has been the industrys standard dummy text ever since the when an unknown
                                            printer took t is a long established fact that a reader will be distracted by
                                            the readable content
                                        </p>

                                        <div class="chooseus_card_actionbtn">
                                            <a href="javascript:;">LEARN MORE <span><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="chooseus_img">
                                    <img src="{{ asset('assets/new_website/images/whychooseuse-img-02.png') }}"
                                        class="img-fluid" alt="">
                                </div>

                                <div class="chooseus_card_main">
                                    <div class="chooseus_card_icon mx-auto">
                                        <img src="{{ asset('assets/new_website/images/whychooseuse-icon-02.png') }}"
                                            alt="">
                                    </div>

                                    <div class="chooseus_card_content">
                                        <h6 class="chooseus_card_heading">Heading Goes Here</h6>

                                        <p class="chooseus_card_para">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                            Ipsum has been the industrys standard dummy text ever since the when an unknown
                                            printer took t is a long established fact that a reader will be distracted by
                                            the readable content
                                        </p>

                                        <div class="chooseus_card_actionbtn">
                                            <a href="javascript:;">LEARN MORE <span><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i><i
                                                        class="fa-solid fa-angle-up fa-rotate-90"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="swiper-slide">Slide 6</div>
                        <div class="swiper-slide">Slide 7</div>
                        <div class="swiper-slide">Slide 8</div>
                        <div class="swiper-slide">Slide 9</div> -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="faq_section">
        <x-faq />
    </section>
@endsection

@push('js')
    <script>
        var swiper = new Swiper(".whychooseusSwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });



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
@endpush
