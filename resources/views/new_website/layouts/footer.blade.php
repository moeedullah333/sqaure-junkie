<footer>
    <div class="footerSection">
        <div class="container">
            <div class="row">

                <div class="col-md-4 border-right mb-2">

                    <div>
                        <img src="{{ asset('assets/new_website/images_new_design/main_logo.png') }}" alt="">
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
                        <li><a href="{{ route('user_about_us_page') }}">ABOUT US</a></li>
                        <li><a href="javascript:;">SERVICES</a></li>
                        <li><a href="javascript:void(0);" onclick="redirectToSectionHowToPlay()">HOW TO PLAY</a></li>
                        <li><a href="javascript:void(0);" onclick="redirectToSectionFaqs()">FAQ'S</a></li>
                        <li><a href="{{ route('user_contact_page') }}">CONTACT US</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</footer>

@push('js')
    <script>
        function redirectToSectionHowToPlay() {
            window.location.href = "{{ route('home') }}#howToPlay-id";
        }

        function redirectToSectionFaqs() {
            window.location.href = "{{ route('home') }}#faqs-id";
        }
    </script>
@endpush
