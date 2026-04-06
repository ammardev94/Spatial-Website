@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Services Management</h3>
        <p class="text-muted mb-0">Define and configure your core service offerings.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Services</li>
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
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold mb-0">Services</h3>
                    <a class="btn btn-primary shadow-none" href="{{ route('admin.services.create') }}">
                        <i class="fas fa-plus me-1"></i>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 120px">Hero Image</th>
                                <th>Service Info</th>
                                <th class="text-center" style="width: 150px">Sections</th>
                                <th class="text-center" style="width: 150px">Sub-Services</th>
                                <th class="text-end" style="width: 150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                            <tr>
                                <td>
                                    @if($service->heroImage)
                                    <img src="{{ asset('storage/'.$service->heroImage->url) }}" width="80" height="50"
                                        class="rounded shadow-sm object-fit-cover border border-muted">
                                    @else
                                    <div class="bg-light text-muted small d-flex align-items-center justify-content-center border rounded"
                                        style="width: 80px; height: 50px;">No Hero</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold fs-15 text-dark">{{ $service->title }}</div>
                                    <span class="badge bg-soft-info text-info small mt-1">Slug: /{{ $service->slug
                                        }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-outline-primary px-3">{{ $service->sections_count
                                        ?? $service->sections->count() }} Sections</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-outline-secondary px-3">{{
                                        $service->sub_services_count ?? $service->subServices->count() }} Groups</span>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                            class="btn btn-muted btn-sm shadow-none" title="Manage Structure"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                            class="delete-form d-inline ms-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-muted btn-sm text-danger shadow-none delete-btn"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center p-5">
                                    <div class="text-muted"><i class="fas fa-folder-open fa-2x mb-2 d-xl-block"></i> No
                                        services found. Click "Add Service" to get started.</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            @if($services->hasPages())
            <div class="card-footer bg-white border-top-0 pt-0">
                <div class="py-3">
                    {{ $services->links() }}
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
                title: 'Are you sure?',
                text: "Deleting this service will permanently remove all sections, sub-services, and associated media.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete everything!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection