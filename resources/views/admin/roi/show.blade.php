@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">ROI Request Details</h3>
        <p class="text-muted mb-0">Reviewing financial inquiry from {{ $roi->full_name }}</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.roi.index') }}">ROI Requests</a></li>
                <li class="breadcrumb-item active">Inquiry Detail</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-7">
        <div class="card card-primary border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom-0 pt-4">
                <h5 class="fw-bold mb-0 text-primary small uppercase">Financial Parameters</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Purchase
                            Price</label>
                        <div class="fs-18 fw-bold text-dark">{{ $roi->purchase_price }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Target Sale
                            Price</label>
                        <div class="fs-18 fw-bold text-success">{{ $roi->target_sale_price }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Renovation Budget
                            Range</label>
                        <div class="fw-bold">{{ $roi->renovation_budget }}</div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Expected
                            Timeline</label>
                        <div class="fw-bold">{{ $roi->timeline }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light p-3">
                <a href="{{ route('admin.roi.index') }}" class="btn btn-muted shadow-none">Back to List</a>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom-0 pt-4">
                <h5 class="fw-bold mb-0 text-dark small uppercase">Client Identity</h5>
            </div>
            <div class="card-body">
                <div class="mb-4 d-flex align-items-center">
                    <div class="avatar avatar-lg bg-soft-info text-info me-3 rounded-circle fs-20 fw-bold">
                        {{ substr($roi->full_name, 0, 1) }}
                    </div>
                    <div>
                        <div class="fw-bold fs-20 text-dark">{{ $roi->full_name }}</div>
                        <div class="text-muted">Lead / Potential Investor</div>
                    </div>
                </div>

                <hr class="my-4 opacity-50">

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Email Address</label>
                    <a href="mailto:{{ $roi->email }}" class="text-primary fw-bold">{{ $roi->email }}</a>
                </div>

                <div class="mb-0">
                    <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Calculation
                        Date</label>
                    <div class="text-dark">{{ $roi->created_at->format('F d, Y \a\t h:i A') }}</div>
                    <small class="text-muted">({{ $roi->created_at->diffForHumans() }})</small>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.roi.destroy', $roi->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger w-100 py-3 shadow-none delete-btn fw-bold">
                <i class="fas fa-trash-alt me-2"></i> PERMANENTLY DELETE RECORD
            </button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('.delete-btn').on('click', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: 'Delete ROI Record?',
                text: "This removal is permanent and cannot be undone. Proceed?",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete permanently'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection