<!DOCTYPE html>
<html lang="en">

<head>
    <title>Square Junkie(admin)</title>
    <meta charset="utf-8">
    @include('layouts.css')
    @include('layouts.extrajs')
</head>

<body>
    <section class="login h-100vh align-items-center">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-md-5 leftColumn">
                    <div class="loginForm">
                        <div class="loginContent px-md-5">
                            <div class="logo text-center">
                                <figure>
                                    <a href="#">
                                        <h2>Square <span>Junkie </span></h2>
                                    </a>
                                </figure>
                            </div>
                            <div class="container">
                                @if (session('message'))
                                    <p style="color: white;">
                                        {{ session('message') }}
                                    </p>
                                @endif
                                <!-- Your login form HTML here -->
                            </div>
                            <div class="titleBox text-center">
                                <h3>Login</h3>
                                <p>Please login to your account.</p>
                            </div>
                            <form action="{{ route('login_data_page') }}" method="POST">
                                @csrf
                                <div class="form-group py-2">
                                    <label for="email">
                                        Email <span class="required text-danger">*</span>
                                    </label>
                                    <input type="email" name="email" placeholder="Enter Email Address"
                                        class="form-control border-0 rounded-pill shadow">
                                </div>
                                {{-- <div class="form-group py-2 position-relative">
                                <label for="password">Password <span class="required text-danger">*</span></label>
                                <div class="passwordWrapper position-relative">
                                    <input type="password" class="form-control border-0 rounded-pill shadow passInput" name="password" id="password" placeholder="Password">
                                    <i class="bi bi-eye-slash enter-icon right-icon position-absolute passDisplay" aria-hidden="true"></i>
                                </div>
                            </div> --}}
                                <div class="form-group py-2 position-relative">
                                    <label for="password">Password <span class="required text-danger">*</span></label>
                                    <div class="passwordWrapper position-relative">
                                        <input type="password"
                                            class="form-control border-0 rounded-pill shadow passInput" name="password"
                                            id="password" placeholder="Password">
                                        <i class="bi bi-eye-slash enter-icon right-icon position-absolute passDisplay"
                                            id="togglePassword" aria-hidden="true"></i>
                                    </div>
                                </div>

                                <!-- <div class="d-flex justify-content-end flex-wrap">
                                <p><a href="./forgot-password.php" class="theme-primary-text">Forgot Password?</a></p>
                            </div> -->
                                <div class="form-group">
                                    <input type="submit" value="Login"
                                        class="border-0 rounded-pill form-control text-white bg-theme-primary">
                                </div>
                            </form>
                            <!-- <p class="mb-0 text-center text-light">Don't have an account? <a href="./sign-up" class="text-light">Sign Up</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $("#togglePassword").click(function() {
                var passwordInput = $("#password");
                var icon = $(this);

                // Toggle the password field visibility
                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    icon.removeClass("bi-eye-slash").addClass("bi-eye");
                } else {
                    passwordInput.attr("type", "password");
                    icon.removeClass("bi-eye").addClass("bi-eye-slash");
                }
            });
        });
    </script>

</body>

</html>
