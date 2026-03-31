@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Edit Project: {{ $project->title }}</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
                <li class="breadcrumb-item active">Edit Project</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data"
            id="editProjectForm">
            @csrf
            @method('PUT')
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
                                    value="{{ old('title', $project->title) }}" required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location" id="location"
                                    value="{{ old('location', $project->location) }}">
                                @error('location') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="summernote">Description</label>
                                <textarea id="summernote" name="description"
                                    class="form-control">{{ old('description', $project->description) }}</textarea>
                                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="border p-3 mb-4 rounded bg-light">
                        <h5>Project Overview Points</h5>
                        <hr>
                        <div id="overview-items">
                            @php $count = 0; @endphp
                            @if($project->overview)
                            @foreach($project->overview as $point)
                            <div class="row overview-row mb-2">
                                <div class="col-md-5">
                                    <input type="text" name="overview[{{ $count }}][label]" class="form-control"
                                        value="{{ $point['label'] }}" placeholder="Label">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="overview[{{ $count }}][value]" class="form-control"
                                        value="{{ $point['value'] }}" placeholder="Value">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger remove-overview"><i
                                            class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            @php $count++; @endphp
                            @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-sm btn-info" id="add-overview"><i class="fas fa-plus"></i>
                            Add Item</button>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="feature_img">Feature Image (Thumbnail)</label>
                                @if($project->feature_img)
                                <div class="mb-2"><img src="{{ asset('storage/'.$project->feature_img->url) }}"
                                        width="100" class="img-thumbnail"></div>
                                @endif
                                <input type="file" class="form-control" name="feature_img" id="feature_img">
                                @error('feature_img') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="main_img">Main Hero Image</label>
                                @if($project->main_img)
                                <div class="mb-2"><img src="{{ asset('storage/'.$project->main_img->url) }}" width="150"
                                        class="img-thumbnail"></div>
                                @endif
                                <input type="file" class="form-control" name="main_img" id="main_img">
                                @error('main_img') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <h5>Gallery</h5>
                            <hr>
                            <div class="row mb-3" id="gallery-container">
                                @foreach($project->gallery as $image)
                                <div class="col-md-2 mb-2 gallery-item" data-id="{{ $image->id }}">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/'.$image->url) }}" class="img-thumbnail w-100"
                                            style="height: 100px; object-fit: cover;">
                                        <button type="button"
                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-gallery-img"
                                            data-id="{{ $image->id }}">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="gallery">Add More Images to Gallery</label>
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

    let overviewCount = {{ isset($count) ? $count : 0 }};

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
                    <button type="button" class="btn btn-danger remove-overview">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>`;
        $('#overview-items').append(row);
        overviewCount++;
    });

    $(document).on('click', '.remove-overview', function () {
        $(this).closest('.overview-row').remove();
    });

    $("#edit_form").validate({
        rules: {
            title: {
                required: true,
                minlength: 2
            },
            description: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Please enter a title",
                minlength: "Title must be at least 2 characters"
            },
            description: {
                required: "Please enter a project description"
            }
        },
        errorElement: "label",
        errorClass: "text-danger",
        validClass: "is-valid",

        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
        },

        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
        },

        submitHandler: function (form) {
            $(form).find('textarea[name="description"]').val($('#summernote').summernote('code'));
            form.submit();
        }
    });

    $('.delete-gallery-img').on('click', function () {
        let btn = $(this);
        let id = btn.data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "Delete this image from gallery?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: 'btn btn-danger me-2',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('admin/projects/image') }}/" + id + "/delete",
                    type: "DELETE",
                    data: { _token: "{{ csrf_token() }}" },
                    success: function (resp) {
                        if (resp.status) {
                            btn.closest('.gallery-item').remove();
                            Swal.fire("Deleted!", "Image has been removed.", "success");
                        } else {
                            Swal.fire("Error!", resp.message, "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Error!", "Server error deleting image.", "error");
                    }
                });
            }
        });
    });

});
</script>


@endsection