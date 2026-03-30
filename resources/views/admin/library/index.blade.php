@extends('admin.default')

@section('css')
<style>
    .table td {
        white-space: unset;
    }
    .swal2-confirm.red-button {
        background-color: red !important;
        border-color: red !important;
        color: white !important;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Document Library</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Document Library</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Document Library</h3>
                    <a class="btn btn-primary" href="{{ route('admin.library.create') }}">
                        <i class="fas fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="card-body border-bottom">
                <form method="GET" action="{{ route('admin.library.index') }}">
                    <div class="row align-items-end">
                        <div class="col-md-4 mb-2">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ request('title') }}" placeholder="Search by title...">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="">-- All Types --</option>
                                <option value="sector" {{ request('type') == 'sector' ? 'selected' : '' }}>Sector</option>
                                <option value="year" {{ request('type') == 'year' ? 'selected' : '' }}>Year</option>
                                <option value="region" {{ request('type') == 'region' ? 'selected' : '' }}>Region</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2 d-flex">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-search"></i>&nbsp;Search
                            </button>

                            <a href="{{ route('admin.library.index') }}" class="btn btn-secondary">
                                <i class="fas fa-sync-alt"></i>&nbsp;Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>File</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libraries as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>
                                    @if($item->type === 'sector')
                                        <span class="badge bg-primary">
                                            <i class="fas fa-chart-pie"></i> Sector
                                        </span>
                                    @elseif($item->type === 'year')
                                        <span class="badge bg-success">
                                            <i class="fas fa-calendar-alt"></i> Year
                                        </span>
                                    @elseif($item->type === 'region')
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-globe-asia"></i> Region
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <span 
                                        data-bs-toggle="tooltip" 
                                        data-bs-placement="top" 
                                        title="{{ strip_tags($item->description) }}">
                                        {{ \Illuminate\Support\Str::words(strip_tags($item->description), 8, '...') }}
                                    </span>
                                </td>
                                <td>
                                    @if($item->file)
                                        <a href="{{ asset('storage/'.$item->file) }}"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-primary"
                                        data-bs-toggle="tooltip"
                                        title="Download file">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('F d, Y') }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.library.edit', $item->id) }}" class="btn btn-default btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="delete-library-form" action="{{ route('admin.library.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-default btn-sm">
                                                <i class="fas fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if($libraries->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">No library items found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if($libraries->total() > 2)
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    {{ $libraries->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {


    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });


    $(".delete-library-form").on("submit", function(e) {
        e.preventDefault();
        Swal.fire({
            title: "<strong>Are you sure?</strong>",
            icon: "warning",
            html: `<p>Do you really want to delete this library item?</p>`,
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: `<i class="fa fa-trash"></i> Yes, delete it!`,
            cancelButtonText: `<i class="fa fa-times"></i> Cancel`,
            allowOutsideClick: false,
            customClass: { confirmButton: 'red-button' }
        }).then((result) => {
            if (result.isConfirmed) this.submit();
        });
    });
});
</script>
@endsection
