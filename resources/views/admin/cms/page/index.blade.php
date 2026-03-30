@extends('admin.default')

@section('css')
    <style>
        .table td {
            white-space: unset;
        }

        .swal2-confirm.red-button {
            background-color: red !important;
            border-color: red !important;
            color: white !important; /* Optional: change text color for better contrast */
        }

    </style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">SEO & CMS</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">SEO & CMS</li>
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
                    <h3 class="card-title mb-0">SEO & CMS</h3>
                    <a class="btn btn-primary" href="{{ route('cms.page.create') }}">
                        <i class="fas fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Page Title</th>
                                <th>Page Description</th>
                                <th>Added By</th>
                                <th>Canonical URL</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <td>{!! $page->title !!}</td>
                                <td>{!! $page->slug !!}</td>
                                <td>{!! $page->page_title !!}</td>
                                <td>{!! $page->page_description !!}</td>
                                <td>{!! $page->user->name !!}</td>
                                <td>{!! $page->canonical_url !!}</td>
                                <td class="text-end">
                                    <div class='btn-group'>
                                        {{-- <a href="javascript:void(0);" class="btn btn-default btn-sm"><i class="fas fa-solid fa-eye"></i></a> --}}
                                        <a href="{{ route('cms.page.edit', [$page->id]) }}" class="btn btn-default btn-sm"><i class="fas fa-edit"></i></a>
                                        @if($page->type == 1)
                                            <form class="delete-page-form" action="{{ route('cms.page.destroy', $page->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-default btn-sm">
                                                    <i class="fas fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('cms.page.meta', [$page->id]) }}" 
                                            class="btn btn-default btn-sm" 
                                            title="Edit page content" 
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="top"
                                        >
                                            <i class="fas fa-file"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if($pages->total() > 2)
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    {{ $pages->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
            @endif
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>

        $(document).ready(function () {

            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            $(".delete-page-form").on("submit", function (e) {   
                e.preventDefault();

                Swal.fire({
                    title: "<strong>Are you sure?</strong>",
                    icon: "warning",
                    html: `<p>Do you really want to delete this page?</p>`,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: `<i class="fa fa-trash"></i> Yes, delete it!`,
                    confirmButtonAriaLabel: "Confirm deletion",
                    cancelButtonText: `<i class="fa fa-times"></i> Cancel`,
                    cancelButtonAriaLabel: "Cancel deletion",
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