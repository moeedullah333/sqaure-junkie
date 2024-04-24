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
                            <li><a href="{{route('home')}}" class="navbar_links">HOME</a></li>
                            <li><a href="{{route('user_about_us_page')}}" class="navbar_links">ABOUT US</a></li>
                            <li><a href="{{route('user_contact_page')}}" class="navbar_links">CONTACT US</a></li>
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

                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
