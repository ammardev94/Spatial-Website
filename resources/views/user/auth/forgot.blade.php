@extends('user.auth.default')

@section('content')
<img class="sec-bg bg-img-overlay" src="{{ asset('images/login-bg-img.png') }}" alt="">
<img class="sec-bg bg-img" src="{{ asset('images/login-bg-overlay.jpg') }}" alt="">

<div class="login-wrapper    w-100 overflow-hidden position-relative flex-wrap d-flex align-items-center justify-content-center vh-100 custom-login-page ">
    <div class="row">
        <!-- <div class="col-lg-6">
            <div class="d-lg-flex align-items-center justify-content-center bg-light-300 d-lg-block d-none flex-wrap vh-100 overflowy-auto bg-01">
                <div>
                    <img src="{{ asset('assets/img/authentication/authentication-07.svg') }}" alt="Img">
                </div>
            </div>
        </div> -->
        <div class="form-wrapper">
            <form action="{{ route("user.forgot.password.attempt") }}" method="POST">
                @csrf
                <div class="login-form-main-wrapper">
                    <div class="logo-wrapper mx-auto  text-center">
                        <img src="{{ asset('images/main-logo.png') }}" class="img-fluid" alt="Logo">
                    </div>
                    <div class="card login-form-main">
                        <div class="card-body p-4">
                            <div class=" mb-4 text-white">
                                <h2 class="mb-2 ">Forgot Password?</h2>
                                <p class="mb-0">If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                            </div>
                            <div class="mb-4">
                                @include('include.messages')
                            </div>
                            <div class="mb-3 ">
                                <!-- <label class="form-label">Email Address</label> -->
                                <!-- <div class="input-icon mb-3 position-relative">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email">
                                </div>  -->
                                <div class="input-wrapper">
                                    <div class="input-icon  position-relative @error('email') is-invalid @enderror">
                                        <span class="input-icon-addon">
                                            <!-- <i class="ti ti-mail"></i> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                                <path d="M10.7664 8.57519C11.0546 8.39707 11.33 8.19179 11.5798 7.95631C12.5149 7.0748 13.0305 5.90346 13.0305 4.65967C13.0305 3.41589 12.5149 2.24455 11.5798 1.36303C9.652 -0.454345 6.51366 -0.454345 4.58582 1.36303C2.65798 3.18041 2.65798 6.13894 4.58582 7.95631C4.87403 8.22802 5.19427 8.45745 5.53693 8.65066C2.31533 9.72237 0 12.6145 0 16.0107H1.28096C1.28096 12.376 4.41609 9.42048 8.27177 9.42048C12.1274 9.42048 15.2626 12.376 15.2626 16.0107H16.5435C16.5435 12.5299 14.1129 9.57746 10.7664 8.57519ZM5.48889 2.21738C6.20303 1.54417 7.14132 1.20605 8.07962 1.20605C9.01792 1.20605 9.95622 1.54417 10.6704 2.21738C11.3621 2.86947 11.7432 3.73891 11.7432 4.65967C11.7432 5.58044 11.3621 6.44988 10.6704 7.10196C9.97864 7.75405 9.05635 8.1133 8.07962 8.1133C7.1029 8.1133 6.18061 7.75405 5.48889 7.10196C4.06063 5.75855 4.06063 3.56381 5.48889 2.21738Z" fill="white" />
                                            </svg>
                                        </span>
                                        <input type="email" name="email"  value="{{ old('email') }}" placeholder="Enter your email">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="butn butn-primary w-100 text-uppercase">Sign In</button>
                            </div>
                            <div class="text-center">
                                <p class="fw-normal text-white mb-0">Return to
                                    <a href="{{ route("user.login") }}" class="text-white"> Login</a>
</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center text-white">
                        <p class="mb-0 ">Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection