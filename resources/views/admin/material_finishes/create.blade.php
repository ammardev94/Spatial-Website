@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Add Material & Finish</h3>
        <p class="text-muted mb-0">Create a new record in your material library.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.material_finishes.index') }}">Material &
                        Finishes</a></li>
                <li class="breadcrumb-item active">Add Record</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.material_finishes.store') }}" method="POST" enctype="multipart/form-data"
            id="createMaterialForm">
            @csrf
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
                                    value="{{ old('title') }}" placeholder="Enter material name" required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group font-weight-bold">
                                <label for="description">Description (Optional)</label>
                                <textarea name="description" id="description"
                                    class="form-control">{{ old('description') }}</textarea>
                                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group font-weight-bold">
                                <label for="feature_img">Feature Image</label>
                                <div id="feature_img_preview" class="mb-3"></div>
                                <input type="file" class="form-control shadow-none" name="feature_img" id="feature_img"
                                    required>
                                @error('feature_img') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group font-weight-bold">
                                <label for="gallery">Gallery Images (Optional)</label>
                                <input type="file" class="form-control shadow-none" name="gallery[]" id="gallery"
                                    multiple>
                                <small class="text-muted">You can select multiple images.</small>
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
                    $(`#${previewId}`).html(`<img src="${e.target.result}" width="180" class="img-thumbnail shadow-sm rounded-3">`);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#feature_img').change(function () {
            readURL(this, 'feature_img_preview');
        });

        $("#createMaterialForm").validate({
            rules: {
                title: { required: true, minlength: 2 },
                feature_img: { required: true }
            },
            messages: {
                title: {
                    required: "Please enter a material title",
                    minlength: "Title must be at least 2 characters"
                },
                feature_img: "Please select a feature image"
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