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
            </div>
            <div class="position-relative">
                <input
                    class="form-control @error('password') is-invalid @enderror form-control-lg fs-14 form-control-solid border border-gray-200 text-gray-900"
                    id="password" type="password" name="password" value="KaliBolu" placeholder="Enter your password" required
                    autocomplete="current-password">
                    <button type="button" onclick="togglePassword()" class="btn-visible btn position-absolute shadow-none flex-center" style="top: 50%; right: 0; transform: translateY(-50%); color: #808080; display: flex;" fdprocessedid="mwa89f">
                        <i class="far fa-eye"></i>
                    </button>
            </div>
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

            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg w-100 mb-4" style="background-color: #1B61AD">
                <span class="indicator-label text-white">Sign In</span>
                <span class="indicator-progress text-white">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            {{-- <div class="d-grid">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                    <span class="indicator-label">Masuk</span>
                    <span class="indicator-progress">Tunggu Sebentar...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div> --}}
            <a href="{{ url('authorized/google') }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3">Continue with
                Google</a>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        togglePassword = () => {
            if ($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text')
                $('.far.fa-eye').removeClass('fa-eye').addClass('fa-eye-slash')
            } else {
                $('.far.fa-eye-slash').removeClass('fa-eye-slash').addClass('fa-eye')
                $('#password').attr('type', 'password')
            }
        }
    </script>
@endsection
