<header class="header {{ request()->routeIs('home') ? 'var1' : '' }}">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <!-- Logo -->
            <div class="col-xl-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('frontend/images/logo2.svg') }}" alt="logo" class="img-fluid"
                        style="max-width: 180px" />
                </a>
            </div>

            <!-- Mobile toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="col-xl-6">
                <!-- Menu -->
                <div class="collapse navbar-collapse justify-content-center" id="mainMenu">
                    <ul class="navbar-nav mb-2 mb-lg-0 align-items-lg-center gap-lg-2 main-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}"
                                href="{{ route('about-us') }}">About Us</a>
                        </li>

                        <!-- ✅ Projects Menu -->
                        <li class="nav-item dropdown-mobile">
                            <!-- Desktop: simple link -->
                            <a href="{{ route('projects') }}"
                                class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }} d-lg-block d-none">
                                Projects
                            </a>

                            <!-- Mobile: dropdown with + / - -->
                            <div class="d-lg-none">
                                <a href="{{ route('projects') }}"
                                    class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('projects') ? 'active' : '' }}">
                                    Projects
                                    <button class="toggle-submenu btn p-0 border-0 bg-transparent">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>
                                </a>

                                <ul class="submenu list-unstyled ms-3 mt-2">
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="d-flex justify-content-between align-items-center">
                                            On Going
                                            <button class="toggle-submenu btn p-0 border-0 bg-transparent">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        </a>
                                        <ul class="submenu list-unstyled ms-3 mt-2">
                                            @foreach ($ongoingProjectsHead as $project)
                                                <li>
                                                    <a
                                                        href="{{ route('site.project.single', [$project->slug]) }}">{{ $project->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0)"
                                            class="d-flex justify-content-between align-items-center">
                                            Completed
                                            <button class="toggle-submenu btn p-0 border-0 bg-transparent">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        </a>
                                        <ul class="submenu list-unstyled ms-3 mt-2">
                                            @foreach ($completedProjectsHead as $project)
                                                <li>
                                                    <a
                                                        href="{{ route('site.project.single', [$project->id]) }}">{{ $project->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('news') ? 'active' : '' }}"
                                href="{{ route('news') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('hyperpay1.index') ? 'active' : '' }}"
                                href="{{ route('hyperpay1.index') }}">Pay Now</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}"
                                href="{{ route('contact-us') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="action-btn text-end">
                    <a href="{{ route('contact-us') }}"
                        class="butn {{ request()->routeIs('home') ? 'butn-secondary' : 'butn-primary' }}">
                        <span>Get in touch</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>