@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Contact Requests</h3>
        <p class="text-muted mb-0">View and manage inquiries submitted from the website.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact Requests</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header border-bottom-0 pt-4">
                <h3 class="card-title fw-bold mb-0">Requests List</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Requested Service</th>
                                <th>Budget</th>
                                <th class="text-center">Date</th>
                                <th class="text-end" style="width: 150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark">{{ $contact->first_name }} {{ $contact->last_name }}
                                    </div>
                                </td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->service ?? 'N/A' }}</td>
                                <td>{{ $contact->budget ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <span class="text-muted small">{{ $contact->created_at->format('M d, Y')
                                        }}</span><br>
                                    <span class="text-muted extra-small">{{ $contact->created_at->format('h:i A')
                                        }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                            class="btn btn-muted btn-sm shadow-none" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                                            class="delete-form d-inline ms-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-muted btn-sm text-danger shadow-none delete-btn"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center p-5">
                                    <div class="text-muted"><i class="fas fa-envelope-open fa-2x mb-2 d-xl-block"></i>
                                        No contact requests found.</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($contacts->hasPages())
            <div class="card-footer bg-white border-top-0 pt-0">
                <div class="py-3">
                    {{ $contacts->links() }}
                </div>
            </div>
            @endif
        </div>
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
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection