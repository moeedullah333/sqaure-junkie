@extends('user.user-layout.main')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="profile_form_div">
                    <div>
                        @if (Session::has('message'))
                            <div class="alert alert-success mb-4" id="success-alert">
                                <center><span class="text-dark">{{ Session::get('message') }}</span></center>
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('update.user.details') }}" method="POST" enctype="multipart/form-data"
                        class="">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="profile-badge">


                            <div class="profile-pic">

                                <img class="img-circle"
                                    src="{{ Auth::user()->avatar != '' ? asset(Auth::user()->avatar) : asset('assets/admin/images/user-icon.png') }}"
                                    id="profile-image1" alt="Upload Image" title="Upload Image" />

                            </div>

                            <div class="row mb-md-4 user-detail">
                                <div class="col-md-6">
                                    <label for="title">Name </label>
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        value="{{ $userDetail->name }}">
                                </div>
                                @error('name')
                                    <p class="error text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-md-6">
                                    <label for="title">Email Address </label>
                                    <input type="email" class="form-control" name="email" placeholder=""
                                        value="{{ $userDetail->email }}">
                                </div>
                                @error('email')
                                    <p class="error text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-md-6 mt-3">
                                    <label for="title">Alias </label>
                                    <input type="text" class="form-control" name="alias"
                                        placeholder="Your Alias Here!!" value="{{ $userDetail->alias }}">
                                </div>
                                <div class="col-md-6  mt-3">
                                    <label for="title">HashTag </label>
                                    <input type="text" class="form-control" name="hashtag" placeholder="Add Your HashTag"
                                        value="{{ $userDetail->hashtag }}" required>
                                </div>
                                <div class="col-md-6  mt-3">
                                    <label for="title">Upload Profile Image </label>
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                                @error('message')
                                    <p class="error text-danger">{{ $message }}</p>
                                @enderror

                                <div class="col-md-6  mt-3">
                                    <label for="title">Phone Number</label>
                                    <input type="number" class="form-control" value="{{ $userDetail->number }}"
                                        name="phone">
                                </div>
                                @error('phone')
                                    <p class="error text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="my-4 register-buttons d-flex justify-content-end">
                                <button class="btn btn-pill " type="submit">Update Profile</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
