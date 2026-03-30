@extends('user.default')

@section('content')
<!-- Page Header -->
<div class="page-topbar d-md-flex d-block align-items-center justify-content-between ">
    <div class="left-column my-auto mb-2">
        <a id="toggle_btn" href="javascript:void(0);">
            <img src="{{ asset('images/nav-btn.png') }}" alt="">
        </a>
        <h3 class="page-title mb-0">Document Library</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <div class="main-searchbar">
            @include('user.partials.global-search')
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M12.8042 6.40204C12.8042 4.96339 12.3196 3.56668 11.4286 2.43714C10.5376 1.3076 9.29216 0.511087 7.89307 0.176041C6.49398 -0.159004 5.02282 -0.0130482 3.71683 0.590371C2.41085 1.19379 1.34617 2.2195 0.694495 3.50209C0.0428191 4.78467 -0.157867 6.24937 0.1248 7.65998C0.407467 9.07058 1.15701 10.3449 2.25255 11.2773C3.3481 12.2098 4.72578 12.7461 6.16343 12.7997C7.60107 12.8534 9.01489 12.4212 10.1769 11.573L14.2816 15.6752L15.6753 14.2815L11.573 10.1768C12.3752 9.08193 12.8066 7.75935 12.8042 6.40204ZM1.96988 6.40204C1.96988 5.52543 2.22982 4.66851 2.71684 3.93963C3.20386 3.21076 3.89608 2.64267 4.70596 2.30721C5.51584 1.97174 6.40701 1.88397 7.26677 2.05499C8.12654 2.22601 8.91628 2.64813 9.53614 3.26799C10.156 3.88785 10.5781 4.67759 10.7491 5.53735C10.9202 6.39712 10.8324 7.28829 10.4969 8.09817C10.1615 8.90805 9.59337 9.60027 8.8645 10.0873C8.13562 10.5743 7.2787 10.8342 6.40209 10.8342C5.2266 10.8342 4.09925 10.3673 3.26804 9.53608C2.43684 8.70488 1.96988 7.57753 1.96988 6.40204Z" fill="#7B878D" />
                </svg>
            </button>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="document-library-main">
    <div class="row">
        <div class="col-md-12">
            <div class="document-library-main">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#sector" data-bs-toggle="tab" aria-selected="true" role="tab">Sector</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#year" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">Year</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#region" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">Region</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="sector" role="tabpanel">
                        <div class="tabbing-content-main">
                            <div class="row g-0">
                                @foreach ($sectorLibrary as $library)
                                <div class="col-md-3 ">
                                    <div class="card mainbox">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $library->title }}</h6>
                                            <p class="card-text">
                                                {!! $library->description !!}
                                            </p>
                                            <a download href="{{ asset('storage/'. $library->file) }}" class="btn btn-primary">Download</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="footer pagination-wrapper">
                            <div class="d-flex justify-content-center">
                                {{ $sectorLibrary->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="year" role="tabpanel">
                        <div class="tabbing-content-main">
                            <div class="row g-0">
                                @foreach ($yearLibrary as $library)
                                <div class="col-md-3">
                                    <div class="card mainbox">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $library->title }}</h6>
                                            <p class="card-text">
                                                {!! $library->description !!}
                                            </p>
                                            <a download href="{{ asset('storage/'. $library->file) }}" class="btn btn-primary">Download</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="footer pagination-wrapper">
                            <div class="d-flex justify-content-center">
                                {{ $yearLibrary->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="region" role="tabpanel">
                        <div class="tabbing-content-main">
                            <div class="row g-0">
                                @foreach ($regionLibrary as $library)
                                <div class="col-md-3">
                                    <div class="card mainbox">
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $library->title }}</h6>
                                            <p class="card-text">
                                                {!! $library->description !!}
                                            </p>
                                            <a download href="{{ asset('storage/'. $library->file) }}" class="btn btn-primary">Download</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="footer pagination-wrapper">
                            <div class="d-flex justify-content-center">
                                {{ $regionLibrary->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection