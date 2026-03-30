@extends('admin.auth.default')

@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-md-5 mx-auto">
        <form action="{{ route('admin.login.attempt') }}" method="POST">
            @csrf
            <div class="d-flex flex-column justify-content-between vh-100">
                <div class="mx-auto pt-4 text-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Logo" width="200px">
                        <h2>{{ config('app.name') }}</h2>
                    </a>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <div class=" mb-4">
                            <h2 class="mb-2">Admin Login</h2>
                            <p class="mb-0">Please enter your details to sign in</p>
                        </div>
                        <div class="mb-4">
                            @include('include.messages')
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <div class="input-icon mb-3 position-relative">
                                <span class="input-icon-addon">
                                    <i class="ti ti-mail"></i>
                                </span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="form-label">Password</label>
                            <div class="pass-group">
                                <input type="password" name="password" class="pass-input form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <span class="ti toggle-password ti-eye-off"></span>
                            </div>
                        </div>
                        <div class="form-wrap form-wrap-checkbox mb-3">
                            <div class="d-flex align-items-center">
                                <div class="form-check form-check-md mb-0">
                                    <input class="form-check-input mt-0" type="checkbox" name="remember_me" id="remember_me" value="1">
                                </div>
                                <p class="ms-1 mb-0 ">Remember Me</p>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.forgot.password') }}" class="link-danger">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </div>
                        {{-- <div class="text-center">
                            <h6 class="fw-normal text-dark mb-0">Don’t have an account? 
                                <a href="javascript:void(0);" class="hover-a"> Create Account</a>
                            </h6>
                        </div> --}}
                    </div>
                </div>
                <div class="p-4 text-center">
                    <p class="mb-0 ">Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}</p>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection