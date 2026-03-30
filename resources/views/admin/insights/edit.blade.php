@extends('admin.default')

@section('css')
<style>
    .error {
        color: red;
        font-size: 0.875em;
    }

    .is-invalid {
        border-color: #dc3545;
    }

    .is-valid {
        border-color: #28a745;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875em;
    }

    .note-editor.note-frame .note-editing-area .note-editable {
        height: 200px !important;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Insights</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.insights.index') }}">Insights</a>
                </li>
                <li class="breadcrumb-item active">Edit Insight</li>
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
                <h3 class="card-title">Edit Insight</h3>
            </div>

            <form action="{{ route('admin.insights.update', $insight->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="editInsight">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">

                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <input type="text"
                                       class="form-control"
                                       name="title"
                                       id="title"
                                       placeholder="Enter insight title"
                                       value="{{ old('title', $insight->title) }}">
                            </div>
                        </div>

                        <!-- Featured -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="is_featured">Featured</label>
                                <select class="form-control" name="is_featured" id="is_featured">
                                    <option value="">-- Select --</option>
                                    <option value="1" {{ old('is_featured', $insight->is_featured) == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_featured', $insight->is_featured) == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <textarea id="description"
                                          name="description">{{ old('description', $insight->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="img">Image</label>
                                <input type="file"
                                       class="form-control"
                                       name="img"
                                       id="img"
                                       accept="image/*">

                                {{-- Existing image --}}
                                @if($insight->img)
                                    <img src="{{ asset('storage/'.$insight->img) }}"
                                         alt="Insight Image"
                                         style="max-width: 100%; height: 200px; margin-top: 8px;">
                                @else
                                    <img src=""
                                         alt=""
                                         style="max-width: 100%; height: 200px; margin-top: 8px; display:none;">
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>&nbsp;&nbsp;Save
                    </button>
                    <a href="{{ route('admin.insights.index') }}" class="btn btn-default">
                        <i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function () {

    $("#is_featured").select2({
        placeholder: "Select status",
        allowClear: true
    });

    $.validator.addMethod('extension', function (value, element, allowedExtensions) {
        var extension = value.split('.').pop().toLowerCase();
        return $.inArray(extension, allowedExtensions) !== -1;
    }, 'Invalid file type');

    $("#editInsight").validate({
        rules: {
            title: { required: true, minlength: 3 },
            description: { required: true, minlength: 3 },
            img: {
                required: false,
                filesize: 20971520,
                extension: ['jpg', 'jpeg', 'png', 'webp']
            }
        },
        messages: {
            title: { required: "Please enter insight title" },
            description: { required: "Please enter insight description" },
            img: {
                extension: "Only jpg, jpeg, png, webp allowed"
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
        }
    });

    $('input[type="file"]').on('change', function () {
        var input = $(this);
        var file = input[0].files[0];

        if (file) {
            var ext = file.name.split('.').pop().toLowerCase();
            if (['jpg','jpeg','png','webp'].includes(ext)) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    input.siblings('img').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            } else {
                input.siblings('img').hide().attr('src', '');
            }
        }
    });

    $('#description').summernote({
        height: 200,
        placeholder: 'Enter insight description...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough','superscript','subscript']],
            ['para', ['ul','ol','paragraph']],
            ['insert', ['link']],
            ['view', ['fullscreen','codeview']]
        ]
    });

});
</script>
@endsection
