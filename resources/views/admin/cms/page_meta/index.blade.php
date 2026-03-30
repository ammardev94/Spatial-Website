@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">CMS</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Pages</li>
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
                    <h3 class="card-title mb-0">Page Metas</h3>
                    <a class="btn btn-primary" href="{{ route('cms.page_meta.create') }}">
                        <i class="fas fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Last Update</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($metas as $meta)
                        <tr>
                            <td>{!! $meta->page->title !!}</td>
                            <td>{!! $meta->ref_key !!}</td>
                            <td style="width: 40%;">{!! $meta->ref_value !!}</td>
                            <td>{!! $meta->updated_at->format('F d, Y') !!}</td>
                            <td class="text-end">
                                <div class='btn-group'>
                                    <a href="javascript:void(0);" class="btn btn-default btn-sm"><i class="fas fa-solid fa-eye"></i></a>
                                    <a href="{{ route('cms.page_meta.edit', [$meta->id]) }}" class="btn btn-default btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('cms.page_meta.destroy', $meta->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                    </tbody>
                </table>
            </div>
            @if($metas->total() > 2)
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    {{ $metas->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
            @endif
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection