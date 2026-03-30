<div class="header">
    <!-- Logo -->
    <div class="header-left active">
        <a href="{{ route('admin.dashboard') }}" class="avatar avatar-md me-2" style="width: 100px; gap: 10px">
            {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo" style="object-fit:contain;"> --}}
            <h5>{{ config('app.name') }}</h5>
        </a>
        <a href="{{ route('admin.dashboard') }}" class="logo-small">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
        <a href="{{ route('admin.dashboard') }}" class="dark-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i class="ti ti-menu-deep"></i>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <div class="header-user">
        <div class="nav user-menu">
            <!-- Search -->
            <div class="nav-item nav-search-inputs me-auto"></div>
            <!-- /Search -->
            <div class="d-flex align-items-center">
                <div class="pe-1" id="notification_item">
                    <a href="javascript:void(0);" class="btn btn-outline-light bg-white btn-icon position-relative me-1" id="notification_popup">
                        <i class="ti ti-bell"></i>
                        @if($unreadNotifications->count() > 0)
                            <span class="notification-status-dot"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end notification-dropdown p-4">
                        <div
                            class="d-flex align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
                            <h4 class="notification-title">Notifications ({{ $unreadNotifications->count() }})</h4>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.notification.mark-all-read') }}" class="text-primary fs-15 me-3 lh-1">Mark all as read</a>
                            </div>
                        </div>

                        <div class="noti-content">
                            <div class="d-flex flex-column">
                                @isset($unreadNotifications)
                                    @foreach ($unreadNotifications as $notification)
                                        <div class="border-bottom mb-3 pb-3">
                                            <a href="{{ route('admin.application.show', [$notification->data['application_id']]) }}">
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
                            <a href="{{ route('admin.notification.index') }}" class="btn btn-primary w-100">View All</a>
                        </div>
                    </div>
                </div>
                <div class="pe-1">
                    <a href="javascript:void(0);" class="btn btn-outline-light bg-white btn-icon me-1" id="btnFullscreen">
                        <i class="ti ti-maximize"></i>
                    </a>
                </div>
                <div class="dropdown ms-1">
                    <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                        data-bs-toggle="dropdown">
                        <span class="avatar avatar-md rounded">
                            <img src="{{ storage_asset((optional(auth()->guard('admin')->user())->img ?? 'users/default.jpg')) }}" alt="Img" class="img-fluid">
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="d-block">
                            <div class="d-flex align-items-center p-2">
                                <span class="avatar avatar-md me-2 online avatar-rounded">
                                    <img src="{{ storage_asset((optional(auth()->guard('admin')->user())->img ?? 'users/default.jpg')) }}" alt="img">
                                </span>
                                <div>
                                    <h6>{{ auth()->guard('admin')->user()->name }}</h6>
                                    <p class="text-primary mb-0">Administrator</p>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item d-inline-flex align-items-center p-2" href="{{ route('admin.profile.index') }}">
                                <i class="ti ti-user-circle me-2"></i>My Profile
                            </a>
                            {{-- <a class="dropdown-item d-inline-flex align-items-center p-2" href="{{ route('admin.setting.index', ['educom']) }}">
                                <i class="ti ti-settings me-2"></i>Settings
                            </a> --}}
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
            <a class="dropdown-item" href="{{ route('admin.profile.index') }}">My Profile</a>
            <a class="dropdown-item" href="javascript:void(0);" onclick="logout()">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->

    <form style="display: none;" action="{{ route('admin.logout') }}" method="POST" id="logout-form">
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