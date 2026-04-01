@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Insights Management</h3>
        <p class="text-muted mb-0">Manage your articles, news, and market insights.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Insights</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Insights List</h3>
                    <a class="btn btn-primary" href="{{ route('admin.insights.create') }}">
                        <i class="fas fa-plus me-1"></i>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width: 80px">Feature</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Publish Date</th>
                                <th>Created At</th>
                                <th class="text-end" style="width: 150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($insights as $insight)
                            <tr>
                                <td>
                                    @if($insight->featureImage)
                                    <img src="{{ asset('storage/'.$insight->featureImage->url) }}" width="60"
                                        class="rounded">
                                    @else
                                    <span class="text-muted">No Img</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $insight->title }}</strong><br>
                                    <small class="text-muted">Slug: {{ $insight->slug }}</small>
                                </td>
                                <td>
                                    @if($insight->status == 'published')
                                    <span class="badge bg-success">Published</span>
                                    @else
                                    <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $insight->publish_date ? $insight->publish_date->format('d M Y') : 'Immediate' }}
                                </td>
                                <td>{{ $insight->created_at->format('d M Y') }}</td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.insights.edit', $insight->id) }}"
                                            class="btn btn-muted btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.insights.destroy', $insight->id) }}" method="POST"
                                            class="delete-insight-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-muted btn-sm text-danger delete-btn"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center p-4">No insights found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            @if($insights->hasPages())
            <div class="card-footer">
                {{ $insights->links() }}
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
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
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