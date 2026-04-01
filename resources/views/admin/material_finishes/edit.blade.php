@extends('admin.default')

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