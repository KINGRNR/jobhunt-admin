@extends('layouts.login')

@section('content')
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Sign In</h1>
            <div class="text-gray-400 fw-bold fs-4">New Here?
                <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
            </div>
        </div>
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <input class="form-control @error('email') is-invalid @enderror form-control-lg form-control-solid"
                id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
            </div>
            <input class="form-control @error('password') is-invalid @enderror form-control-lg form-control-solid"
                id="password" type="password" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="text-center">
            <!--begin::Submit button--> {{-- //error appear disini!!!!!!!! --}}
            {{-- //error appear disini!!!!!!!! --}}
            {{-- //error appear disini!!!!!!!! --}}
            {{-- //error appear disini!!!!!!!! --}}
            {{-- //error appear disini!!!!!!!! --}}
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Login</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            {{-- //error appear disini!!!!!!!! --}}
            {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
            <div class="text-center text-muted text-uppercase fw-bolder mb-4">or</div>
            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with
                Google</a>
        </div>
    </form>
@endsection
