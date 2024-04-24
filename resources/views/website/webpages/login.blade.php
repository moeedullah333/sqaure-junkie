@extends('website.layouts.main')
@section('content')
    <!--<body>-->
    <!--    <section class="banner-div">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
    <!--                <div class="col-md-12 ">-->
    <!--                    <h1>Sign In</h1>-->
    <!--                    <div class="text-center py-3">-->
    <!--                        <span><a href="javascript:;">Home</a></span>-->
    <!--                        <span><a href="{{ route('user_login') }}">Login</a></span>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->
    <!--    <div class="register-form">-->
    <!--        <div class="container">-->
    <!--            <div class="row mb-4">-->
    <!--                <div class="col-md-12 col-sm-12">-->
    <!--                    <div class="register-form-inner">-->
    <!-- Form -->
    <!--                        <div class="text-center">-->
    <!--                            <h1 class="text-center">Sign-In As A Player</h1>-->
    <!--                            <p class="or_line">or</p>-->
    <!--                            <p class="sign_up_social">Sign-In Using Social Media</p>-->
    <!--                            <p class="social_media_icons">-->
    <!--                                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>-->
    <!--                                <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>-->
    <!--                                <a href="https://www.linkedin.com/?original_referer="><i-->
    <!--                                        class="fa-brands fa-linkedin-in"></i></a>-->
    <!--                                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>-->

    <!--                            </p>-->
    <!--                        </div>-->

    <!--                        @if (\Session::has('error'))
    -->
    <!--                            <div class="alert alert-danger text-center">{{ \Session::get('error') }}</div>-->
    <!--
    @endif-->

    <!--                        @if (\Session::has('validate'))
    -->
    <!--                            <div class="alert alert-success text-center">{{ \Session::get('validate') }}</div>-->
    <!--
    @endif-->

    <!--                        <form action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">-->
    <!--                            @csrf-->
    <!--                            <div class="row mb-md-4 ">-->
    <!--                                <div class="col-md-8  mx-auto">-->
    <!--                                    <label for="title">Player </label>-->
    <!--                                    <small>(Alias Or Email Address)</small>-->
    <!--                                    <input type="text" class="form-control" required name="email"-->
    <!--                                        placeholder="ab21">-->
    <!--                                    @error('email')
        -->
        <!--                                        <span>{{ $message }}</span>-->
        <!--
    @enderror-->
    <!--                                </div>-->
    <!--                            </div>-->

    <!--                            <div class="row mb-md-4 ">-->
    <!--                                <div class="col-md-8 mx-auto">-->
    <!--                                    <label for="textarea">Password</label>-->
    <!--                                    <small>(Case Sensitive)</small>-->
    <!--                                    <input type="password" class="form-control" required name="password"-->
    <!--                                        placeholder="*******">-->
    <!--                                    @error('email')
        -->
        <!--                                        <span>{{ $message }}</span>-->
        <!--
    @enderror-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="my-4 register-buttons">-->
    <!--                                <button class="btn btn-pill " type="submit">Login</button>-->
    <!--                                <button class="btn btn-pill " type="submit">Cancel</button>-->
    <!--                            </div>-->
    <!--                        </form>-->

    <!--                        <p class="sign_in_here">Already Have An Account?<a href="{{ route('user.register') }}">Signup-->
    <!--                                Here</a></p>-->
    <!-- End of Form -->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <section class="login_section m-5">
        <div class="container">
            <div class="row">

                <div class="col-md-6 ">
                    <div class="login_left_part">

                        <h2 class="text-center align-self-center">
                            Player Login
                        </h2>
                    </div>
                </div>



                <div class="col-md-6 align-self-center">

                    <div class="login_right_part">
                        <div class="login_btn">

                            <a href="{{ route('user.register') }}" class="btns">Register</a>
                            <!--<button type="button" class="btns">Login</button>-->

                        </div>
                        <h2>Login</h2>

                        <div class="login_form">

                            <form action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="" required name="email"
                                        placeholder="Enter your email here">
                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group"  style="position: relative">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" id="password" class="form-control" id="" required
                                        name="password" placeholder="*******">

                                    <span class="password_hide"
                                        style="  position: absolute !important;
                                    right: 15px;
                                    top: 29px;">

                                        <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
                                        {{-- <i class="bi bi-eye-slash enter-icon right-icon position-absolute passDisplay"
                                        id="togglePassword" aria-hidden="true"></i> --}}
                                    </span>
                                </div>

                        </div>


                    </div>




                    <div class="register_btn">

                        <button type="submit" class="btns">Login</button>

                    </div>
                    </form>


                    @if (\Session::has('error'))
                        <div class="alert alert-danger text-center">{{ \Session::get('error') }}</div>
                    @endif

                    @if (\Session::has('validate'))
                        <div class="alert alert-success text-center">{{ \Session::get('validate') }}</div>
                    @endif

                </div>

            </div>

        </div>


        </div>
        </div>



    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#togglePassword").click(function() {
                var passwordInput = $("#password");
                var icon = $(this);

                // Toggle the password field visibility
                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    icon.removeClass("fa-solid fa-eye-slash").addClass("fa-solid fa-eye");
                } else {
                    passwordInput.attr("type", "password");

                    icon.removeClass("fa-solid fa-eye").addClass("fa-solid fa-eye-slash");
                }
            });
        });
    </script>
@endpush
