@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Request Details</h3>
        <p class="text-muted mb-0">Reviewing contact inquiry from {{ $contact->first_name }} {{ $contact->last_name }}
        </p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Contact Requests</a></li>
                <li class="breadcrumb-item active">View Detail</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-8">
        <div class="card card-primary border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom-0 pt-4">
                <h5 class="fw-bold mb-0 text-primary small uppercase">Inquiry Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label small fw-bold text-muted uppercase ls-1">Message / Comments</label>
                    <div class="p-3 bg-light rounded border">
                        {!! nl2br(e($contact->comments ?? 'No additional comments provided.')) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold text-muted uppercase ls-1">Requested Service</label>
                        <div class="fw-bold">{{ $contact->service ?? 'Not selected' }}</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold text-muted uppercase ls-1">Budget Range</label>
                        <div class="fw-bold">{{ $contact->budget ?? 'Not provided' }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light p-3">
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-muted shadow-none">Back to List</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-bottom-0 pt-4">
                <h5 class="fw-bold mb-0 text-dark small uppercase">Contact Information</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Full Name</label>
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-md bg-soft-primary text-primary me-2 rounded-circle">
                            {{ substr($contact->first_name, 0, 1) }}{{ substr($contact->last_name, 0, 1) }}
                        </div>
                        <span class="fw-bold fs-16">{{ $contact->first_name }} {{ $contact->last_name }}</span>
                    </div>
                </div>

                <hr class="my-3 opacity-50">

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Email Address</label>
                    <a href="mailto:{{ $contact->email }}" class="text-primary fw-bold">{{ $contact->email }}</a>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Phone Number</label>
                    <a href="tel:{{ $contact->phone }}" class="text-dark fw-bold">{{ $contact->phone }}</a>
                </div>

                <div class="mb-0">
                    <label class="form-label small fw-bold text-muted uppercase ls-1 d-block mb-1">Submitted On</label>
                    <div class="text-muted">{{ $contact->created_at->format('F d, Y \a\t h:i A') }}</div>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger w-100 py-2 shadow-none delete-btn">
                <i class="fas fa-trash me-1"></i> PERMANENTLY DELETE RECORD
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
                title: 'Delete Request?',
                text: "This removal is permanent. Are you sure?",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection