@extends('website.layouts.main')
@section('content')
<section class="banner-div">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h1>Get In Touch</h1>
                <div class="text-center py-3">
                    <span><a href="javascript:;">Home</a></span>
                    <span><a href="{{route('user_contact_page')}}">contact Us</a></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact_us_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact_us_head">
                    <h1>Write Us <span>Anything</span></h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                    </p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="contact_form_div">
                    <form action="{{route('user_contact_add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-success mb-4" id="success-alert">
                            <center><span class="text-dark">{{Session::get('success')}}</span></center>
                        </div>
                    @endif
                        <div class="row mb-md-4 ">
                            <div class="col-md-12">
                                <label for="title">Enter Your Full Name </label>
                                <input type="text" class="form-control" name="name" placeholder="Micheal James" value="{{old('name')}}">
                            </div>
                            @error('name')
                            <p class="error text-danger">{{ $message }}</p>
                            @enderror
                            <div class="col-md-12">
                                <label for="title">Enter Your Email Address </label>
                                <input type="email" class="form-control"  name="email" placeholder="info@company.com" value="{{old('email')}}">
                            </div>
                            @error('email')
                            <p class="error text-danger">{{ $message }}</p>
                            @enderror
                            <div class="col-md-12">
                                <label for="title">Write your Subject </label>
                                <input type="text" class="form-control"  name="subject" placeholder="Write Your Subject here!!" value="{{old('subject')}}">
                            </div>
                            @error('subject')
                            <p class="error text-danger">{{ $message }}</p>
                            @enderror
                            <div class="col-md-12">
                                <label for="title">Write your Message </label>
                                <textarea name="message" id="" class="form-control" cols="30" placeholder="Write Your Message here!!!" rows="10">{{old('message')}}</textarea>
                            </div>
                            @error('message')
                            <p class="error text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="my-4 register-buttons">
                            <button class="btn btn-pill " type="submit">Send your Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 align-self-center">
                <div class="form-content">

                    <p><span><i class="fa-solid fa-location-dot"></i></span> <a href="#javascript:;" class="text-capitalize">Address:</a></p>
                    <p >123 Street, Lankaway Florida, USA 12345</p>
                    <p><span><i class="fa-solid fa-phone"></i></span><a href="#javascript:;">Phone:</a></p>
                    <p>123-456-789-0000</p>
                    <p><span><i class="fa-solid fa-envelope"></i></span> <a href="#javascript:;">Email:</a> </p>
                    <p>info@company.com</p>
                    <div class="form-icon">
                        <h4>Connect Book Socials:</h4>
                        <span><a target="_blank" href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a></span>
                        <span><a target="_blank" href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a></span>
                        <span><a target="_blank" href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a></span>
                        <span><a target="_blank" href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a></span>
                        <span><a target="_blank" href="https://www.youtube.com"><i class="fa-brands fa-youtube"></i></a></span>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection