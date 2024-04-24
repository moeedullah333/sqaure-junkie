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

    @include('new_website.layouts.style')
    
</head>

<body>

    @include('new_website.layouts.header')

    @yield('content')

    @include('new_website.layouts.footer')

    @include('new_website.layouts.script')
    <script>
        $(function() {
            $(document).scroll(function() {
                var $nav = $(".desktop_header_section");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });
    </script>
</body>

</html>
