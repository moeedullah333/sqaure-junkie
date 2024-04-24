<form action="{{ route('user.contact') }}" method="post" class="mt-3">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" id="" name="name"
            placeholder="First Name*">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <input type="email" class="form-control" id="" aria-describedby="emailHelp"
            name="email" placeholder="Your Email*">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <input type="number" class="form-control" id="" aria-describedby="emailHelp"
            name="phone" placeholder="Phone Number*">
        @error('phone')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <textarea class="form-control" id="" rows="6" name="msg" placeholder="Your Message...."></textarea>
    </div>

    <div class="main_action_btn mt-3 mx-auto">
        <button class="form_submit_btn w-100 btn" type="submit" class="w-100 text-center">SUBMIT
            NOW</button>
        <!--<a href="javascript:;" >SUBMIT NOW</a>-->
    </div>

</form>