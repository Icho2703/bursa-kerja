@extends('layouts.login')

@section('content')

<link rel="stylesheet" href="{{ asset('css/newlogin.css') }}">

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5  mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"> <img src="{{ asset('logobkkstmj.png') }}" class="logo"> </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="{{ asset('desain.png') }}" width="100px" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                        <div class="facebook text-center mr-3">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <div class="twitter text-center mr-3">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div class="linkedin text-center mr-3">
                            <i class="fab fa-linkedin"></i>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="or text-center">Or</small>
                        <div class="line"></div>
                    </div>
                    <div class="row px-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm" for="name">Name</h6>
                        </label>
                        <input id="name" type="name" class="mb-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter a valid name address" required autocomplete="name" autofocus>

                        <label class="mb-1">
                            <h6 class="mb-0 text-sm" for="email">Email Address</h6>
                        </label>
                        <input id="email" type="email" class="mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter a valid email address" required autocomplete="email" autofocus>
                    </div>
                        @error('email')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                        @enderror

                    <div class="row px-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> 
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm" for="password-confirm">Confirm Password</h6>
                        </label> 
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    



                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Register</button> </div>
                    </form>
                    
                </div>
            </div>
        </div>
        {{--  <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>  --}}
    </div>
</div>
@endsection
