@extends('user.auth.default')

@section('content')

<img class="sec-bg bg-img-overlay" src="{{ asset('images/login-bg-img.png') }}" alt="">
<img class="sec-bg bg-img" src="{{ asset('images/login-bg-overlay.jpg') }}" alt="">
<div class="w-100 overflow-hidden position-relative flex-wrap d-flex align-items-center justify-content-center vh-100 custom-login-page ">
    <div class="form-wrapper">
        <form action="{{ route('user.login.attempt') }}" method="POST">
            @csrf
            <div class="login-form-main-wrapper">
                <div class="logo-wrapper mx-auto  text-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/main-logo.png') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="card login-form-main">
                    <div class="card-body p-0">
                        <!-- <div class=" mb-4">
                            <h2 class="mb-2">Login</h2>
                            <p class="mb-0">Please enter your details to sign in</p>
                        </div> -->
                        <div>
                            @include('include.messages')
                        </div>
                        <div class="mb-3 ">
                            <!-- <label class="form-label">Email Address</label> -->
                            <div class="input-wrapper">
                                <div class="input-icon  position-relative @error('email') is-invalid @enderror">
                                    <span class="input-icon-addon">
                                        <!-- <i class="ti ti-mail"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                            <path d="M10.7664 8.57519C11.0546 8.39707 11.33 8.19179 11.5798 7.95631C12.5149 7.0748 13.0305 5.90346 13.0305 4.65967C13.0305 3.41589 12.5149 2.24455 11.5798 1.36303C9.652 -0.454345 6.51366 -0.454345 4.58582 1.36303C2.65798 3.18041 2.65798 6.13894 4.58582 7.95631C4.87403 8.22802 5.19427 8.45745 5.53693 8.65066C2.31533 9.72237 0 12.6145 0 16.0107H1.28096C1.28096 12.376 4.41609 9.42048 8.27177 9.42048C12.1274 9.42048 15.2626 12.376 15.2626 16.0107H16.5435C16.5435 12.5299 14.1129 9.57746 10.7664 8.57519ZM5.48889 2.21738C6.20303 1.54417 7.14132 1.20605 8.07962 1.20605C9.01792 1.20605 9.95622 1.54417 10.6704 2.21738C11.3621 2.86947 11.7432 3.73891 11.7432 4.65967C11.7432 5.58044 11.3621 6.44988 10.6704 7.10196C9.97864 7.75405 9.05635 8.1133 8.07962 8.1133C7.1029 8.1133 6.18061 7.75405 5.48889 7.10196C4.06063 5.75855 4.06063 3.56381 5.48889 2.21738Z" fill="white" />
                                        </svg>
                                    </span>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Username">
                                </div>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-wrapper">
                                <div class="input-icon pass-group @error('password') is-invalid @enderror">
                                    <span class="input-icon-addon">
                                        <!-- <i class="ti ti-mail"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">
                                            <path d="M8.78852 11.5374C9.34399 11.1334 9.67866 10.5024 9.67866 9.83376C9.67866 8.64881 8.65638 7.68515 7.39946 7.68515C6.1425 7.68515 5.12027 8.64886 5.12027 9.83376C5.12027 10.5024 5.45494 11.1334 6.0104 11.5374L5.14287 13.6451C5.10289 13.7427 5.11593 13.8533 5.17938 13.9393C5.24197 14.0254 5.34628 14.0778 5.45755 14.0778H9.34145C9.45271 14.0778 9.55616 14.0262 9.61961 13.9393C9.6822 13.8525 9.69611 13.7426 9.65612 13.6451L8.78852 11.5374ZM5.95032 13.4427L6.73702 11.5317C6.797 11.3866 6.73615 11.2211 6.59272 11.1424C6.10072 10.8712 5.79474 10.3697 5.79474 9.83374C5.79474 8.99951 6.5145 8.32019 7.40028 8.32019C8.28521 8.32019 9.00582 8.99871 9.00582 9.83374C9.00582 10.3697 8.69983 10.8712 8.20783 11.1424C8.06527 11.2211 8.00442 11.3858 8.06353 11.5317L8.85024 13.4427H5.95032Z" fill="white" stroke="white" stroke-width="0.4" />
                                            <path d="M14.6004 8.01451C14.6004 6.84431 13.5912 5.89212 12.3499 5.89212H12.0943V4.62687C12.0943 2.18646 9.9881 0.200012 7.4002 0.200012C4.81146 0.200012 2.70606 2.18558 2.70606 4.62687V5.89212H2.4505C1.21005 5.89212 0.200012 6.84435 0.200012 8.01451V14.0892C0.200012 15.2586 1.20925 16.2108 2.4505 16.2108H12.3506C13.5911 16.2108 14.6011 15.2594 14.6011 14.0892V8.01451H14.6004ZM3.37976 4.62754C3.37976 2.53709 5.18352 0.835909 7.40007 0.835909C9.61663 0.835909 11.4204 2.53713 11.4204 4.62754V5.89279H10.0886V4.62754C10.0886 3.22952 8.88208 2.09126 7.39998 2.09126C5.91699 2.09126 4.71132 3.22868 4.71132 4.62754V5.89279H3.37959L3.37976 4.62754ZM9.41601 5.89198H5.38524V4.62673C5.38524 3.57862 6.28929 2.72556 7.4011 2.72556C8.51203 2.72556 9.41695 3.57862 9.41695 4.62673V5.89198H9.41601ZM13.9268 14.0891C13.9268 14.9085 13.2192 15.5756 12.3499 15.5756H2.44981C1.58055 15.5756 0.872957 14.9085 0.872957 14.0891V8.01436C0.872957 7.19406 1.58055 6.52703 2.44981 6.52703H12.3499C13.2192 6.52703 13.9268 7.19408 13.9268 8.01436V14.0891Z" fill="white" stroke="white" stroke-width="0.4" />
                                        </svg>
                                    </span>
                                    <input type="password" name="password" class="pass-input" placeholder="Password">

                                    <span class="ti toggle-password ti-eye-off"></span>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-wrap form-wrap-checkbox justify-content-center">
                            <label class="cs-checkbox-wrapper form-check form-check-md mb-0">
                                <input class="form-check-input mt-0" type="checkbox" name="remember_me" id="remember_me" value="1">
                                <span class="cs-checkbox"></span>
                                <span class="cs-checkbox-text">Stay logged in</span>
                            </label>
                            <span class="separator"></span>
                            <div class="text-end ">
                                <a href="{{ route('user.forgot.password') }}" class="text-white">Forgotten password</a>
                            </div>
                        </div>
                        <p class="instruction-para text-white">If you are on a public computer you should not stay logged in</p>
                        <div class="mb-3">
                            <button type="submit" class="butn butn-primary w-100 text-uppercase">login</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <div class="copyright-text">
        <div class="container">
            <p class="mb-0 text-white">Copyright &copy; {{ date('Y') }} - {{ config('app.name') }}</p>
        </div>
    </div>
</div>



@endsection