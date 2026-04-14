@extends('admin.default')

@section('css')
<style>
    .gallery-item-wrapper .gallery-card {
        transition: all 0.3s ease;
        border: 1px solid #eee;
        overflow: hidden;
    }

    .gallery-item-wrapper .gallery-card:hover {
        border-color: #6a49e3;
        box-shadow: 0 4px 12px rgba(106, 73, 227, 0.1);
    }

    .gallery-item-wrapper .delete-gallery-img {
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
        background: rgba(220, 53, 69, 0.9);
        border: none;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        top: 5px !important;
        right: 5px !important;
        transform: translate(0, 0) !important;
    }

    .gallery-item-wrapper:hover .delete-gallery-img {
        opacity: 1;
        visibility: visible;
    }

    .gallery-item-wrapper img {
        height: 80px;
        width: 100%;
        object-fit: cover;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Edit: {{ $materialFinish->title }}</h3>
        <p class="text-muted mb-0">Update the details for this material or finish.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.material_finishes.index') }}">Material &
                        Finishes</a></li>
                <li class="breadcrumb-item active">Edit Record</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.material_finishes.update', $materialFinish->id) }}" method="POST"
            enctype="multipart/form-data" id="editMaterialForm">
            @csrf
            @method('PUT')
            @include('include.messages')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title mb-0">Record Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group font-weight-bold">
                                <label for="title">Title</label>
                                <input type="text" class="form-control shadow-none" name="title" id="title"
                                    value="{{ old('title', $materialFinish->title) }}" placeholder="Enter material name"
                                    required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group font-weight-bold">
                                <label for="description">Description (Optional)</label>
                                <textarea name="description" id="description"
                                    class="form-control">{{ old('description', $materialFinish->description) }}</textarea>
                                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group font-weight-bold">
                                <label for="feature_img">Feature Image</label>
                                <div class="mb-3 d-flex flex-column gap-2">
                                    @if($materialFinish->feature_img)
                                    <div>
                                        <p class="mb-1 text-muted small">Current Image:</p>
                                        <img src="{{ asset('storage/'.$materialFinish->feature_img->url) }}" width="150"
                                            class="img-thumbnail rounded-3 shadow-sm border-primary">
                                    </div>
                                    @endif
                                    <div id="feature_img_preview"></div>
                                </div>
                                <input type="file" class="form-control shadow-none" name="feature_img" id="feature_img">
                                <small class="text-muted">Leave empty to keep current image.</small>
                                @error('feature_img') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group font-weight-bold">
                                <label for="gallery">Gallery Images (Optional)</label>
                                <div class="row g-2 mb-3 mt-1" id="gallery_images_container">
                                    @foreach($materialFinish->gallery as $image)
                                    <div class="col-4 col-md-3 gallery-item-wrapper" id="gallery-img-{{ $image->id }}">
                                        <div class="position-relative gallery-card rounded">
                                            <img src="{{ asset('storage/'.$image->url) }}" class="img-fluid rounded">
                                            <button type="button"
                                                class="btn btn-danger btn-xs position-absolute rounded-circle delete-gallery-img"
                                                data-id="{{ $image->id }}" title="Delete image">
                                                <i class="fas fa-trash-alt" style="font-size: 10px;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <input type="file" class="form-control shadow-none" name="gallery[]" id="gallery"
                                    multiple>
                                <small class="text-muted">Select more images to add to the gallery.</small>
                                @error('gallery.*') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-start">
                    <button type="submit" class="btn btn-primary shadow-none"><i
                            class="fas fa-save me-1"></i>Save</button>
                    <a href="{{ route('admin.material_finishes.index') }}" class="btn btn-muted">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#description').summernote({ height: 200 });

        // Image Previews
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(`#${previewId}`).html(`
                        <p class="mb-1 text-muted small">New Selection Preview:</p>
                        <img src="${e.target.result}" width="150" class="img-thumbnail shadow-sm rounded-3">
                    `);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#feature_img').change(function () {
            readURL(this, 'feature_img_preview');
        });

        $(document).on('click', '.delete-gallery-img', function () {
            let id = $(this).data('id');
            let btn = $(this);

            Swal.fire({
                title: 'Delete Image?',
                text: "Are you sure you want to remove this image from the gallery?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.material_finishes.gallery.destroy', ':id') }}".replace(':id', id),
                        type: 'DELETE',
                        success: function (res) {
                            if (res.success) {
                                $(`#gallery-img-${id}`).fadeOut(300, function () { $(this).remove(); });
                            }
                        }
                    });
                }
            });
        });

        $("#editMaterialForm").validate({
            rules: {
                title: { required: true, minlength: 2 }
            },
            messages: {
                title: {
                    required: "Please enter a material title",
                    minlength: "Title must be at least 2 characters"
                }
            },
            errorElement: "label",
            validClass: "is-valid",
            errorClass: "is-invalid text-danger",
            highlight: function (element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
            },
            submitHandler: function (form) {
                $(form).find('textarea[name="description"]').val($('#description').summernote('code'));
                form.submit();
            }
        });
    });
</script>
@endsection