<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="d-flex align-items-center border bg-white rounded p-2 mb-3">
                        <span class="avatar avatar-xl me-2 avatar-rounded">
                            @php
                            $adminUser = auth()->guard('admin')->user();
                            @endphp
                            @if($adminUser && $adminUser->image)
                            <img src="{{ asset('storage/'.$adminUser->image->url) }}" alt="img">
                            @else
                            <img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="img">
                            @endif
                        </span>
                        <span class="text-dark ms-2 fw-normal">Welcome <br> {{ auth()->guard('admin')->user()->name
                            }}</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <h6 class="submenu-hdr"><span>Main</span></h6>
                    <ul>
                        <li class="@if(request()->path() == 'admin') active @endif">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>MENU</span></h6>
                    <ul>
                        <li class="{{ request()->is('admin/cms/pages*') ? 'active' : '' }}">
                            <a href="{{ route('cms.page.index') }}">
                                <i class="ti ti-page-break"></i>
                                <span>SEO & CMS</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/services*') ? 'active' : '' }}">
                            <a href="{{ route('admin.services.index') }}">
                                <i class="ti ti-layout-2"></i>
                                <span>Services</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/projects*') ? 'active' : '' }}">
                            <a href="{{ route('admin.projects.index') }}">
                                <i class="ti ti-briefcase"></i>
                                <span>Projects</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/insights*') ? 'active' : '' }}">
                            <a href="{{ route('admin.insights.index') }}">
                                <i class="ti ti-news"></i>
                                <span>Insights</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/material-finishes*') ? 'active' : '' }}">
                            <a href="{{ route('admin.material_finishes.index') }}">
                                <i class="ti ti-layout-grid"></i>
                                <span>Material & Finishes</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/contacts*') ? 'active' : '' }}">
                            <a href="{{ route('admin.contacts.index') }}">
                                <i class="ti ti-messages"></i>
                                <span>Contact Requests</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <h6 class="submenu-hdr"><span>SETTINGS</span></h6>
                    <ul>
                        <li class="{{ request()->is('admin/settings*') ? 'active' : '' }}">
                            <a href="{{ route('admin.settings.general.edit') }}">
                                <i class="ti ti-settings"></i>
                                <span>General Information</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>