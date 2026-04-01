@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Add Insight</h3>
        <p class="text-muted mb-0">Create a new article or market insight.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.insights.index') }}">Insights</a></li>
                <li class="breadcrumb-item active">Add Insight</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.insights.store') }}" method="POST" enctype="multipart/form-data"
            id="createInsightForm">
            @csrf
            @include('include.messages')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="title">Insight Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title') }}" placeholder="Enter title" required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select shadow-none" name="status" id="status">
                                    <option value="draft" {{ old('status')=='draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status')=='published' ? 'selected' : '' }}>
                                        Published</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="publish_date">Publish Date</label>
                                <input type="datetime-local" class="form-control" name="publish_date" id="publish_date"
                                    value="{{ old('publish_date') }}">
                                <small class="text-muted">Leave empty for immediate publication upon status change to
                                    Published.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Sections -->
            <div class="row">
                <!-- Outlook Section -->
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Outlook Section</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="outlook_title">Outlook Title</label>
                                <input type="text" class="form-control" name="outlook_title" id="outlook_title"
                                    value="{{ old('outlook_title') }}" placeholder="e.g. Current Outlook">
                            </div>
                            <div class="form-group">
                                <label for="outlook_description">Outlook Description</label>
                                <textarea id="outlook_description" name="outlook_description" class="form-control"
                                    id="outlook_description">{{ old('outlook_description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Why Section -->
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Why Section</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="why_title">Why Title</label>
                                <input type="text" class="form-control" name="why_title" id="why_title"
                                    value="{{ old('why_title') }}" placeholder="e.g. Why Invest Now?">
                            </div>
                            <div class="form-group">
                                <label for="why_description">Why Description</label>
                                <textarea name="why_description" class="form-control"
                                    id="why_description">{{ old('why_description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Optimistic Section -->
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Optimistic Section</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="optimistic_title">Optimistic Title</label>
                                <input type="text" class="form-control" name="optimistic_title" id="optimistic_title"
                                    value="{{ old('optimistic_title') }}" placeholder="e.g. Future Outlook">
                            </div>
                            <div class="form-group">
                                <label for="optimistic_description">Optimistic Description</label>
                                <textarea name="optimistic_description" class="form-control"
                                    id="optimistic_description">{{ old('optimistic_description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media Section -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Media</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="feature_img">Feature Image (Thumbnail)</label>
                                <div id="feature_img_preview" class="mb-2"></div>
                                <input type="file" class="form-control shadow-none" name="feature_img" id="feature_img"
                                    required>
                                @error('feature_img') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="images">Gallery (Additional Images)</label>
                                <div id="gallery_preview" class="row mb-2"></div>
                                <input type="file" class="form-control" name="images[]" id="images" multiple>
                                @error('images.*') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-start">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Save</button>
                    <a href="{{ route('admin.insights.index') }}" class="btn btn-muted">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {

        $('#outlook_description').summernote({ height: 150 });
        $('#why_description').summernote({ height: 150 });
        $('#optimistic_description').summernote({ height: 150 });
        $('#pessimistic_description').summernote({ height: 150 });
        $('#conclusion_description').summernote({ height: 150 });

        // Image Previews
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(`#${previewId}`).html(`<img src="${e.target.result}" width="150" class="img-thumbnail">`);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#feature_img').change(function () {
            readURL(this, 'feature_img_preview');
        });

        $('#images').change(function () {
            $('#gallery_preview').html('');
            if (this.files) {
                Array.from(this.files).forEach(file => {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#gallery_preview').append(`
                            <div class="col-md-2 mb-2">
                                <img src="${e.target.result}" class="img-thumbnail w-100" style="height: 100px; object-fit: cover;">
                            </div>
                        `);
                    }
                    reader.readAsDataURL(file);
                });
            }
        });

        $("#createInsightForm").validate({
            rules: {
                title: { required: true, minlength: 2 },
                feature_img: { required: true }
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
                $('.summernote').each(function () {
                    $(this).val($(this).summernote('code'));
                });
                form.submit();
            }
        });
    });
</script>
@endsection