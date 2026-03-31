@extends('admin.default')

@section('css')
<style>
    .table td {
        white-space: unset;
        vertical-align: middle;
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
        <h3 class="page-title mb-1">Projects</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Projects</li>
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
                    <h3 class="card-title mb-0">Project List</h3>
                    <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Feature Img</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Created At</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $project)
                            <tr>
                                <td>
                                    @if($project->feature_img)
                                    <img src="{{ asset('storage/'.$project->feature_img->url) }}" alt="img" width="50"
                                        class="rounded">
                                    @else
                                    <span class="badge bg-secondary">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->location }}</td>
                                <td>{{ $project->created_at->format('d M Y') }}</td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                                            class="btn btn-default btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                            class="delete-project-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-default btn-sm text-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No projects found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($projects->hasPages())
            <div class="card-footer d-flex justify-content-end">
                {{ $projects->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(".delete-project-form").on("submit", function (e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                customClass: { confirmButton: 'red-button' }
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endsection