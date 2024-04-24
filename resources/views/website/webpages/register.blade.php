@extends('website.layouts.main')
@section('content')
<!--<section class="banner-div">-->
<!--    <div class="container">-->
<!--     <div class="row">-->
<!--         <div class="col-md-12 ">-->
<!--             <h1>Sign Up</h1>-->
<!--           <div class="text-center py-3">-->
<!--           <span><a href="javascript:;">Home</a></span>-->
<!--             <span><a href="{{route('user.register')}}">Register</a></span>-->
<!--           </div>-->
<!--         </div>-->
<!--     </div>-->
<!--    </div>-->
<!--     </section>-->
<!--     <div class="register-form">-->
<!--         <div class="container">-->
<!--             <div class="row mb-4">-->
<!--                 <div class="col-md-12 col-sm-12">-->
<!--                     <div class="register-form-inner">-->
                         <!-- Form -->
<!--                         <div class="text-center">-->
<!--                             <h1 class="text-center">Sign Up To Your New Player</h1>-->
<!--                             <p class="or_line">or</p>-->
<!--                             <p class="sign_up_social">Sign Up Using Social Media</p>-->
<!--                             <p class="social_media_icons">-->
<!--                                 <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>-->
<!--                                 <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>-->
<!--                                 <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>-->
<!--                                 <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>-->
 
<!--                             </p>-->
<!--                         </div>-->
 
<!--                         <form action="{{route('user.reg.submit')}}" method="POST" enctype="multipart/form-data" id="form-reg">-->
<!--                            @csrf-->
 
<!--                             <div class="row mb-4">-->
<!--                                 <div class="col">-->
<!--                                     <label for="title">Enter Your Full Name</label>-->
                                   
<!--                                     <input type="text" class="form-control" required name="name" placeholder="Micheal James">-->
<!--                                 </div>-->
<!--                                 <div class="col">-->
<!--                                     <label for="title">Alias</label>-->
<!--                                     <small>(4 Character Max)</small>-->
<!--                                     <input type="text" maxlength="4" class="form-control" required name="alias" placeholder="ab21">-->
<!--                                    @error('alias')-->
<!--                                        <span style="color: red;">{{ $message }}</span>-->
<!--                                    @enderror-->
<!--                                 </div>-->
<!--                                 <div class="col">-->
<!--                                     <label for="textarea">Hashtag</label>-->
<!--                                     <input type="text" class="form-control" required name="hashtag" placeholder="#1234abc">-->
<!--                                 </div>-->
<!--                             </div>-->
 
<!--                             <div class="row mb-4">-->
 
<!--                                 <div class="col">-->
<!--                                     <label for="title">Enter Your Phone Number</label>-->
<!--                                     <input type="number" class="form-control" required name="phone_no" placeholder="123-456-788-000">-->
<!--                                 </div>-->
<!--                                 <div class="col">-->
<!--                                     <label for="textarea">Enter Your Email Address</label>-->
<!--                                     <input type="email" class="form-control" required name="email" id="em-r" placeholder="info@company.com">-->
<!--                                     @error('email')-->
<!--                                        <span style="color: red;">{{ $message }}</span>-->
<!--                                    @enderror-->
<!--                                 </div>-->
<!--                                 <div class="col">-->
<!--                                     <label for="textarea">Confirm Email</label>-->
<!--                                     <input type="email" class="form-control" required name="confirm_email" id="em-c"  placeholder="info@company.com">-->
<!--                                 </div>-->
<!--                             </div>-->
 
<!--                             <div class="row mb-4">-->
<!--                                 <div class="col">-->
<!--                                     <label class="my-1 mr-2" for="country">Payment Type</label>-->
<!--                                     <select class="form-control" id="user_role" name="payment_type">-->
 
<!--                                         <option selected hidden disabled>Select Payment Mehtod</option>-->
<!--                                         <option value="1">Cash App</option>-->
<!--                                         <option value="2">Venmo</option>-->
<!--                                         <option value="3">Paypal</option>-->
<!--                                     </select>-->
<!--                                 </div>-->
<!--                                 <div class="col">-->
<!--                                     <label for="textarea">Choose Password</label>-->
<!--                                     <input type="password" class="form-control" id="pass-r" required name="password" placeholder="*******">-->
<!--                                 </div>-->
<!--                                 <div class="col">-->
<!--                                     <label for="textarea">Confirm Password</label>-->
<!--                                     <input type="password" class="form-control" id="pass-c" required name="c_password" placeholder="*******">-->
<!--                                 </div>-->
<!--                             </div>-->
<!--                             <div class="my-4 register-buttons">-->
<!--                                 <button class="btn btn-pill sub-btn" type="button">Register</button>-->
<!--                                 {{-- <button class="btn btn-pill " type="submit">Cancel</button> --}}-->
<!--                             </div>-->
<!--                         </form>-->
<!--                         <p class="sign_in_here">Already Have An Account?<a href="{{route('user_login')}}">Signin Here</a></p>-->
                         <!-- End of Form -->
<!--                     </div>-->
<!--                 </div>-->
<!--             </div>-->
<!--         </div>-->
<!--     </div>-->
<section class="player_registration_section m-5">

    <div class="container">
        <div class="row">

            <div class="col-md-6 ">
                <div class="registration_left_part">

                    <h2 class="text-center align-self-center">
                        PLAYER'S <br> REGISTRATION
                    </h2>
                </div>
            </div>



            <div class="col-md-6 py-5">

                <div class="registration_right_part">

                    <div class="login_btn">

                        <!--<button type="button" class="btns">Register</button>-->
                        <a  href="{{route('user.login')}}" class="btns">Login</a>

                    </div>

                    <h2>Register</h2>

                    <div class="register_form">
                        <form action="{{route('user.reg.submit')}}" method="POST" enctype="multipart/form-data" id="form-reg"> 
                            @csrf()
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="" value="{{old('name')}}" required name="name" placeholder="Enter your name here">

                            </div>
                            <!--<div class="form-group">-->
                            <!--    <label for="exampleInputEmail1">Last Name</label>-->
                            <!--    <input type="text" class="form-control" id="" required name="l_name" placeholder="Enter your name here">-->

                            <!--</div>-->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alias</label> <span>(Max four character limit)</span>
                                <input type="text" class="form-control" maxlength="4" value="{{old('alias')}}" id="" required name="alias" placeholder="Enter your Alias here">
                                @error('alias')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date-of-birth">Date of Birth</label>
                                <input type="date"  class="form-control" id="dob" value="{{old('date_of_birth')}}" name="date_of_birth"  required>
                                <span style="color: red;" class="dateBelow "></span>
                                @error('date_of_birth')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Enter Your Email Address</label>
                                <input type="text" class="form-control"  required value="{{old('email')}}" name="email" id="em-r" placeholder="Enter your email here">
                                @error('email')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Email</label>
                                <input type="email" class="form-control" required value="{{old('confirm_email')}}" name="confirm_email" id="em-c" placeholder="Confirm your name here">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Create Password</label>
                                <input type="password" class="form-control" id="" placeholder="Create your password here" id="pass-r" required name="password">
                                @error('password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm password</label>
                                <input type="password" class="form-control" id="" placeholder="Confirm your password here" id="pass-c" required name="c_password">
                                @error('c_password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input termsChk" id="exampleCheck1" name="term_check" required>
                                <label class="form-check-label mt-0" for="exampleCheck1">I am agree to the <a href="{{route('terms.condition')}}" target="_blank">terms and condtion</a> & <a href="{{route('privacy.policy')}}" target="_blank">privacy and policy</a> of Square Junkie</label>
                                @error('term_check')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="aggrement_terms_btn ">
                                <button type="button" class="btns sub-btn">Register</button>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

               


            </div>

        </div>

    </div>
    </div>

</section>
@endsection
@push('js')
    <script>
    

    $(document).ready(function(){
        $('.dateBelow').hide();
    })
    //For Age Restriction Start     
    $('#dob').change(function(){
        var birthday = $(this).val();
        var newBirthdate  = new Date(birthday);
        console.log(newBirthdate);
        var ageDifMs = Date.now() - newBirthdate.getTime();
        var ageDate = new Date(ageDifMs); // miliseconds from epoch
        var finalDob = Math.abs(ageDate.getUTCFullYear() - 1970);
        
        if(finalDob< 22){
            $('.btns').attr("disabled",true);
            $('.dateBelow').show();
            $('.dateBelow').text('Your age is not Match our Registration Policy');
            console.log('Under Age');
        }else{
            $('.btns').attr("disabled",false);
            $('.dateBelow').hide();
            console.log('Allow');
        }
    });
    //For Age Restriction End
    
        $(document).ready(function(){
            $('.sub-btn').click(function(){
                let em=false;
                let pass=false;
                if($('#em-r').val() == $('#em-c').val())
                {
                    em =true;
                }
                else
                {
                    alert('Email does not match');
                }
                if($('#pass-r').val() == $('#pass-c').val())
                {
                    pass =true;
                } 
                else
                {
                    alert('password does not match');
                }
                if ($('.termsChk').prop('checked')==false){ 
                    alert('Kindly Check The Terms And Condition');
                }
                
                if(em == true && pass==true && $('.termsChk').prop('checked')==true)
                {
                    $('#form-reg').submit();
                }

            })
        })
    </script>
@endpush