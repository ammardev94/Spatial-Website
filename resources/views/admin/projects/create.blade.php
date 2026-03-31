@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Add Project</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
                <li class="breadcrumb-item active">Add Project</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Project Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="title">Project Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title') }}" required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location" id="location"
                                    value="{{ old('location') }}">
                                @error('location') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="summernote">Description</label>
                                <textarea id="summernote" name="description"
                                    class="form-control">{{ old('description') }}</textarea>
                                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="border p-3 mb-4 rounded bg-light">
                        <h5>Project Overview Points</h5>
                        <p class="text-muted small">Add key features or overview points (e.g., Area: 500sqm, Floors: 2)
                        </p>
                        <hr>
                        <div id="overview-items">
                            <div class="row overview-row mb-2">
                                <div class="col-md-5">
                                    <input type="text" name="overview[0][label]" class="form-control"
                                        placeholder="Label (e.g. Area)">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="overview[0][value]" class="form-control"
                                        placeholder="Value (e.g. 500sqm)">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger remove-overview"><i
                                            class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-info" id="add-overview"><i class="fas fa-plus"></i>
                            Add Item</button>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="feature_img">Feature Image (Thumbnail)</label>
                                <input type="file" class="form-control" name="feature_img" id="feature_img shadow-none">
                                @error('feature_img') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="main_img">Main Hero Image</label>
                                <input type="file" class="form-control" name="main_img" id="main_img shadow-none">
                                @error('main_img') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="gallery">Gallery (Multiple Images)</label>
                                <input type="file" class="form-control" name="gallery[]" id="gallery" multiple>
                                @error('gallery.*') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Save</button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#summernote').summernote({ height: 200 });

        let overviewCount = 1;
        $('#add-overview').on('click', function () {
            let row = `
                <div class="row overview-row mb-2">
                    <div class="col-md-5">
                        <input type="text" name="overview[${overviewCount}][label]" class="form-control" placeholder="Label">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="overview[${overviewCount}][value]" class="form-control" placeholder="Value">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger remove-overview"><i class="fas fa-trash"></i></button>
                    </div>
                </div>`;
            $('#overview-items').append(row);
            overviewCount++;
        });

        $(document).on('click', '.remove-overview', function () {
            $(this).closest('.overview-row').remove();
        });
    });
</script>
@endsection