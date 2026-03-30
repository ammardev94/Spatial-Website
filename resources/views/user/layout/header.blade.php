<div class="header">
    <!-- Logo -->
    <div class="header-left active">
        <a href="{{ route('user.dashboard') }}" class="logo logo-normal">
            <img src="{{ asset('images/dashboard-logo.png') }}" alt="Logo">
            <!-- <h5>{{ config('app.name') }}</h5> -->
        </a>
        <a href="{{ route('user.dashboard') }}" class="logo-small">
            <img src="{{ asset('images/small-logo.svg') }}" alt="Logo">
        </a>
        <a href="{{ route('user.dashboard') }}" class="dark-logo">
            <img src="{{ asset('images/dashboard-logo.png') }}" alt="Logo">
        </a>
        <!-- <a id="toggle_btn" href="javascript:void(0);">
            <i class="ti ti-menu-deep"></i>
        </a> -->
    </div>
    <!-- /Logo -->

    <!-- Header Middle  -->
    <!-- <div class="header-middle">
        <p>a one-stop shop for Capital Haus</p>
    </div> -->
    <!-- Header Middle  -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <!-- <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span> -->
        <span class="btn-wrapper">
            <img src="{{ asset('images/nav-btn.png') }}" alt="">
        </span>
    </a>
    <div class="header-user">
        <div class="nav user-menu">
            <!-- Search -->
            <div class="nav-item nav-search-inputs me-auto"></div>
            <!-- /Search -->
            <div class="d-flex align-items-center">
                <div class="pe-1" id="notification_item">
                    <a href="javascript:void(0);" class="rounded-icon-btn  position-relative me-1" id="notification_popup">
                        <!-- <i class="ti ti-bell"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 12 15" fill="none">
                            <path d="M9.98125 9.66113C9.95868 9.63856 9.94432 9.60573 9.94432 9.5729V5.63498C9.94432 3.40233 8.23289 1.56162 6.0536 1.35436V0.410414C6.0536 0.184686 5.86891 0 5.64319 0C5.41746 0 5.23277 0.184686 5.23277 0.410414V1.35436C3.05348 1.56162 1.34205 3.40233 1.34205 5.63498V9.5729C1.34205 9.60573 1.32769 9.63856 1.30512 9.66113L0.277029 10.6892C0.0984989 10.8677 0 11.1058 0 11.3582V11.6722C0 12.1954 0.424778 12.6202 0.948055 12.6202H3.82505C3.97075 13.4923 4.73002 14.1593 5.64319 14.1593C6.55636 14.1593 7.31562 13.4923 7.46132 12.6202H10.3383C10.8616 12.6202 11.2864 12.1954 11.2864 11.6722V11.3582C11.2864 11.1058 11.1879 10.8677 11.0093 10.6892L9.98125 9.66113ZM5.64319 13.3384C5.18558 13.3384 4.80184 13.0347 4.67051 12.6202H6.61587C6.48453 13.0347 6.1008 13.3384 5.64319 13.3384ZM10.4655 11.6722C10.4655 11.7419 10.4081 11.7994 10.3383 11.7994H0.948055C0.878285 11.7994 0.820827 11.7419 0.820827 11.6722V11.3582C0.820827 11.3254 0.833139 11.2925 0.857764 11.27L1.88585 10.2419C2.06438 10.0633 2.16288 9.8253 2.16288 9.5729V5.63498C2.16288 3.71629 3.7245 2.15467 5.64319 2.15467C7.56187 2.15467 9.12349 3.71629 9.12349 5.63498V9.5729C9.12349 9.8253 9.22199 10.0633 9.40052 10.2419L10.4286 11.27C10.4532 11.2925 10.4655 11.3254 10.4655 11.3582V11.6722Z" fill="white" />
                        </svg>
                        @if($unreadNotifications->count() > 0)
                        <span class="notification-status-dot"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end notification-dropdown p-4">
                        <div
                            class="d-flex align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
                            <h4 class="notification-title">Notifications ({{ $unreadNotifications->count() }})</h4>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('user.notification.mark-all-read') }}" class="text-primary fs-15 me-3 lh-1">Mark all as read</a>
                            </div>
                        </div>

                        <div class="noti-content">
                            <div class="d-flex flex-column">
                                @isset($unreadNotifications)
                                @foreach ($unreadNotifications as $notification)
                                <div class="border-bottom mb-3 pb-3">
                                    <a href="{{ route('user.application.show', [$notification->data['application_id']]) }}">
                                        <div class="d-flex">
                                            <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                <img src="{{ $notification->data['img'] }}" alt="Profile">
                                            </span>
                                            <div class="flex-grow-1">
                                                <p class="mb-1">{!! $notification->data['message'] !!}</p>
                                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @endisset
                            </div>
                        </div>
                        <div class="d-flex p-0">
                            <a href="javascript:void(0);" class="btn btn-light w-100 me-2" onclick="closeNotification()">Cancel</a>
                            <a href="{{ route('user.notification.index') }}" class="btn btn-primary w-100">View All</a>
                        </div>
                    </div>
                </div>
                <div class="pe-1">
                    <a href="javascript:void(0);" class="rounded-icon-btn  position-relative me-1" id="btnFullscreen">
                        <!-- <i class="ti ti-maximize"></i> -->
                        <svg width="12px" height="12px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M23 4C23 2.34315 21.6569 1 20 1H16C15.4477 1 15 1.44772 15 2C15 2.55228 15.4477 3 16 3H20C20.5523 3 21 3.44772 21 4V8C21 8.55228 21.4477 9 22 9C22.5523 9 23 8.55228 23 8V4Z" fill="#ffffff"></path>
                                <path d="M23 16C23 15.4477 22.5523 15 22 15C21.4477 15 21 15.4477 21 16V20C21 20.5523 20.5523 21 20 21H16C15.4477 21 15 21.4477 15 22C15 22.5523 15.4477 23 16 23H20C21.6569 23 23 21.6569 23 20V16Z" fill="#ffffff"></path>
                                <path d="M4 21H8C8.55228 21 9 21.4477 9 22C9 22.5523 8.55228 23 8 23H4C2.34315 23 1 21.6569 1 20V16C1 15.4477 1.44772 15 2 15C2.55228 15 3 15.4477 3 16V20C3 20.5523 3.44772 21 4 21Z" fill="#ffffff"></path>
                                <path d="M1 8C1 8.55228 1.44772 9 2 9C2.55228 9 3 8.55228 3 8L3 4C3 3.44772 3.44772 3 4 3H8C8.55228 3 9 2.55228 9 2C9 1.44772 8.55228 1 8 1H4C2.34315 1 1 2.34315 1 4V8Z" fill="#ffffff"></path>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="dropdown ms-1">
                    <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                        data-bs-toggle="dropdown">
                        <span class="avatar avatar-md rounded">
                            <img src="{{ asset('storage/' . (auth()->guard('user')->user()->img ?? 'user/default.jpg')) }}" alt="Img" class="img-fluid">
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="d-block">
                            <div class="d-flex align-items-center p-2">
                                <span class="avatar avatar-md me-2 online avatar-rounded">
                                    <img src="{{ asset('storage/' . (auth()->guard('user')->user()->img ?? 'user/default.jpg')) }}" alt="img">
                                </span>
                                <div>
                                    <h6>{{ auth()->guard('user')->user()->name }}</h6>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item d-inline-flex align-items-center p-2" href="{{ route('user.profile.index') }}">
                                <i class="ti ti-user-circle me-2"></i>My Profile
                            </a>
                            <hr class="m-0">
                            <a onclick="logout()" class="dropdown-item d-inline-flex align-items-center p-2" href="javascript:void(0);">
                                <i class="ti ti-login me-2"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="{{ route('user.profile.index') }}">My Profile</a>
            <a class="dropdown-item" href="javascript:void(0);" onclick="logout()">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
    <form style="display: none;" action="{{ route('user.logout') }}" method="POST" id="logout-form">
        @csrf
        <button type="submit"></button>
    </form>
</div>

@section('js')
<script>
    function closeNotification() {
        $("#notification_item").removeClass("notification-item-show");
    }
</script>
@endsection