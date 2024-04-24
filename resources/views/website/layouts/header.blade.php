<header>
    <div class="mobile-menu">
        <div class="circle" id="navbar"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <div class="nveMenu text-left">
            <div class="mobile-cross close-btn-nav" id="navbar"><i class="fas fa-times" aria-hidden="true"></i></div>
            <div>
                <a href="javascript:void(0)"><img src="{{ asset('assets/website/images/logo.png') }}"
                        class="img-fluid"></a>
            </div>
            <ul class="navlinks p-0 mt-4">
                <li><a href="#">Get In Touch</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Case Studies</a></li>
                <li><a href="#">Gallery</a></li>
            </ul>
        </div>
        <div class="overlay"></div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-5">
                    <div class="detail-flex-div">
                        <div class="header-top-details">
                            <div class="social-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="info-detail">
                                <h6>Email Address</h6>
                                <p><a href="javascript:;">Contact@domain.com</a></p>
                            </div>
                        </div>
                        <div class="header-top-details">
                            <div class="social-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="info-detail">
                                <h6>Phone Number</h6>
                                <p><a href="javascript:;">123-456-789-0000</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="user-search-icon">
                        <span><a href="javascript:;"><i class="fa-solid fa-magnifying-glass"></i></a></span>
                        @if (isset(auth()->user()->id))
                        <span><a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-table-columns"></i> <span class="text-white">Dashboard</span></a> </span>
                        @else
                            <span><a href="{{ route('user_login') }}"><i class="fa-solid fa-user"></i></a></span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="desktop-header">

        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo-img">
                        <img src="{{ asset('assets/website/images/logo.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-10">
                    <ul>
                        
                        <li><a href="{{(!Auth::user())?route('home'):'javascript:;'}}" class="{{(request()->routeIs('home')  ? 'active' : '')}}">Home</a></li>
                        {{-- <li><a href="{{ route('user_about_us_page') }}" class="{{(request()->routeIs('user_about_us_page')  ? 'active' : '')}}">About Us</a></li> --}}
                        {{-- <li><a href="#">Live Drawing</a></li> --}}
                        {{-- <li><a href="#">Winner Post</a></li> --}}
                        {{-- <li><a href="{{ route('generate_numbers') }}" class="{{(request()->routeIs('generate_numbers')  ? 'active' : '')}}">Generate Numbers</a></li> --}}
                        {{-- <li><a href="{{ (Auth::user()!= '')?route('user_payment_method') :'#'}}" class="{{(request()->routeIs('user_payment_method')? 'active' : '')}}">Payment</a></li> --}}
                        <li><a href="{{ route('user.board.list') }}" class="{{(request()->routeIs('user.board.list') || request()->routeIs('voting')) ? 'active' : ''}}">Vote</a></li>
                        <li><a href="{{ route('user_contact_page') }}" class="contact_us">Contact Us</a></li>
                        
                        
                        {{-- <li><a href="javascript:;" class="active">Home</a></li> --}}
                        {{-- <li><a href="{{ route('user_about_us_page') }}">About Us</a></li> --}}
                        {{-- <li><a href="#">Live Drawing</a></li> --}}
                        {{-- <li><a href="#">Winner Post</a></li> --}}
                        {{-- <li><a href="{{ route('generate_numbers') }}">Generate Numbers</a></li> --}}
                        {{-- <li><a href="{{ route('user_payment_method') }}">Payment</a></li> --}}
                        {{-- <li><a href="{{ route('user.board.list') }}">Vote</a></li> --}}
                        {{-- <li><a href="{{ route('user_contact_page') }}" class="contact_us">Contact Us</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
