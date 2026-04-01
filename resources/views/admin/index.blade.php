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

    <!-- Total Projects -->
    <div class="col-xxl-4 col-sm-6 d-flex">
        <a href="{{ route('admin.projects.index') }}" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl bg-primary-transparent me-2 p-1">
                        <i class="ti ti-briefcase text-primary fs-24"></i>
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">{{ $projects_count }}</h2>
                        </div>
                        <p class="mb-0">Projects</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Projects -->

    <!-- Total Insights -->
    <div class="col-xxl-4 col-sm-6 d-flex">
        <a href="{{ route('admin.insights.index') }}" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl bg-danger-transparent me-2 p-1">
                        <i class="ti ti-news text-danger fs-24"></i>
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">{{ $insights_count }}</h2>
                        </div>
                        <p class="mb-0">Insights</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Insights -->

    <!-- Total Material & Finishes -->
    <div class="col-xxl-4 col-sm-6 d-flex">
        <a href="{{ route('admin.material_finishes.index') }}" class="card flex-fill animate-card border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl bg-secondary-transparent me-2 p-1">
                        <i class="ti ti-layout-grid text-secondary fs-24"></i>
                    </div>
                    <div class="overflow-hidden flex-fill">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="counter">{{ $materials_count }}</h2>
                        </div>
                        <p class="mb-0">Material & Finishes</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /Total Material & Finishes -->

</div>

@endsection