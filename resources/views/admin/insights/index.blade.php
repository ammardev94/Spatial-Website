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
        <h3 class="page-title mb-1">Insights</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Insights</li>
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
                    <h3 class="card-title mb-0">Insights</h3>
                    <a class="btn btn-primary" href="{{ route('admin.insights.create') }}">
                        <i class="fas fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <!-- Filters -->
            <div class="card-body border-bottom">
                <form method="GET" action="{{ route('admin.insights.index') }}">
                    <div class="row align-items-end">

                        <div class="col-md-4 mb-2">
                            <label for="title" class="form-label">Title</label>
                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control"
                                   value="{{ request('title') }}"
                                   placeholder="Search by title...">
                        </div>

                        <div class="col-md-4 mb-2">
                            <label for="is_featured" class="form-label">Featured</label>
                            <select name="is_featured" id="is_featured" class="form-control">
                                <option value="">-- All --</option>
                                <option value="1" {{ request('is_featured') === '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ request('is_featured') === '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2 d-flex">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-search"></i>&nbsp;Search
                            </button>
                            <a href="{{ route('admin.insights.index') }}" class="btn btn-secondary">
                                <i class="fas fa-sync-alt"></i>&nbsp;Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Table -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Featured</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($insights as $insight)
                            <tr>
                                <td>
                                    @if($insight->img)
                                        <span class="avatar avatar-xxxl me-2">
                                            <img src="{{ asset('storage/'.$insight->img) }}"
                                                 alt="{{ $insight->title }}">
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $insight->title }}</td>
                                <td>
                                    @if($insight->is_featured)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>
                                <td>{{ $insight->created_at->format('F d, Y') }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.insights.edit', $insight->id) }}"
                                           class="btn btn-default btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form class="delete-insight-form"
                                              action="{{ route('admin.insights.destroy', $insight->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-default btn-sm">
                                                <i class="fas fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    {{ $insights->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {

        $("#is_featured").select2({
            placeholder: "Select status",
            allowClear: true
        });

        $(".delete-insight-form").on("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "<strong>Are you sure?</strong>",
                icon: "warning",
                html: `<p>Do you really want to delete this insight?</p>`,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `<i class="fa fa-trash"></i> Yes, delete it!`,
                cancelButtonText: `<i class="fa fa-times"></i> Cancel`,
                allowOutsideClick: false,
                customClass: {
                    confirmButton: 'red-button'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });

    });
</script>
@endsection
