@extends('admin.auth.default')

@section('content')

<div class="login-wrapper w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
    <div class="row">
        <div class="col-lg-6">
            <div class="d-lg-flex align-items-center justify-content-center bg-light-300 d-lg-block d-none flex-wrap vh-100 overflowy-auto bg-01">
                <div>
                    <img src="{{ asset('assets/img/authentication/authentication-08.svg') }}" alt="Img">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-md-8 mx-auto p-4">
                    <form action="{{ route('admin.reset.password.attempt') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div>
                            <div class=" mx-auto mb-5 text-center">
                                <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Logo" width="200px">
                            </div>
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class=" mb-4">
                                        <h2 class="mb-2">Reset Password?</h2>
                                        <p class="mb-0">Enter New Password & Confirm Password to get inside</p>
                                    </div>
                                    <div class="mb-4">
                                        @include('include.messages')
                                    </div>
                                    <div class="mb-3 ">
                                        <label class="form-label">Email Address</label>
                                        <div class="input-icon mb-3 position-relative">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-mail"></i>
                                            </span>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <div class="pass-group">
                                            <input type="password" name="password" value="{{ old('password') }}" placeholder="New password" class="pass-input form-control" required />
                                            <span class="ti toggle-password ti-eye-off"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label ">New Confirm Password</label>
                                        <div class="pass-group">
                                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm New Password" class="pass-input form-control" required />
                                            <span class="ti toggle-password ti-eye-off"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                                    </div>
                                    <div class="text-center">
                                        <h6 class="fw-normal text-dark mb-0">Return to
                                            <a href="{{ route('admin.login') }}" class="hover-a"> Login</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <p class="mb-0 ">Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection