@extends('layouts.login')

@section('content')
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
        @csrf
        {{-- <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Sign In</h1>
            <div class="text-gray-400 fw-bold fs-4">New Here?
                <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
            </div>
        </div> --}}
        <div class="fv-row mb-10">
            <img src="assets/media/jobhunt/logoipsum-287.svg" class="w-48 h-16 mr-4" alt="Logo Ipsum Logo">
        </div>
        <div class="fv-row mb-10">
            <label class="form-label fs-14 fw-bolder text-dark">Email</label>
            <input
                class="form-control @error('email') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                id="email" type="email" name="email" value="admin@admin.com" placeholder="Enter your E-mail"
                required autocomplete="email" autofocus>
            {{-- value="{{ old('email') }}" --}}
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-14 mb-0">Password</label>
                {{-- <a href="{{ route('password.request') }}" class="link-primary fs-14 fw-bolder">Forgot Password ?</a> --}}
            </div>
            <input
                class="form-control @error('password') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                id="password" type="password" name="password" value="KaliBolu" placeholder="Enter your password" required
                autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                {{-- <label class="form-label fw-bolder text-dark fs-14 mb-0">Password</label> --}}
                <a href="{{ route('password.request') }}" class="fs-14 fw-bolder"
                    style="color: var(--fks-secondary, #DAA916); font-family: Poppins; font-size: 14px; font-style: normal; font-weight: 500; line-height: 140%;">Forgot
                    Password ?</a>
            </div>
        </div>


        <div class="text-center">

            <button type="submit" class="btn btn-lg w-100 mb-5" style="background-color: #1B61AD">
                <span class="indicator-label text-white">SIGN IN</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <a href="{{ url('authorized/google') }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3">Continue with
                Google</a>
    </form>
    @endsection
