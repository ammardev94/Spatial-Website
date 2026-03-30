@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Admin Dashboard</h3>

    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">

    <!-- Total Insights -->
    <div class="col-xxl-6 col-sm-6 d-flex">
        <a href="javascript:void(0);" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl bg-danger-transparent me-2 p-1">
                        <img src="{{ asset('assets/img/icons/company-icon-04.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">0</h2>
                        </div>
                        <p>Insights</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Insights -->

    <!-- Total Library -->
    <div class="col-xxl-6 col-sm-6 d-flex">
        <a href="javascript:void(0);" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl me-2 bg-secondary-transparent p-1">
                        <img src="{{ asset('assets/img/icons/company-icon-04.svg') }}" alt="img">
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">0</h2>
                        </div>
                        <p>Services</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Library -->

</div>

@endsection