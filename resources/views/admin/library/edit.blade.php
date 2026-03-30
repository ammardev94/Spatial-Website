@extends('admin.default')

@section('css')
<style>
    .error { color: red; font-size: 0.875em; }
    .is-invalid { border-color: #dc3545; }
    .is-valid { border-color: #28a745; }
    .invalid-feedback { color: #dc3545; font-size: 0.875em; }
</style>
@endsection

@section('content')
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <h3 class="page-title mb-1">Edit Library</h3>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.library.index') }}">Document Library</a></li>
            <li class="breadcrumb-item active">Edit Library</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Edit Library</h3></div>

            <form action="{{ route('admin.library.update', $library->id) }}" method="POST" enctype="multipart/form-data" id="editLibrary">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                       value="{{ old('title', $library->title) }}">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-control">
                                    <option value="">-- Select Type --</option>
                                    <option value="sector" {{ old('type', $library->type) == 'sector' ? 'selected' : '' }}>Sector</option>
                                    <option value="year" {{ old('type', $library->type) == 'year' ? 'selected' : '' }}>Year</option>
                                    <option value="region" {{ old('type', $library->type) == 'region' ? 'selected' : '' }}>Region</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description', $library->description) }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="file" class="form-label">File</label>
                                <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx,.xlsx,.xls,.ppt,.pptx">

                                <div id="filePreview" style="margin-top:8px;">
                                    @if($library->file)
                                        @php $ext = pathinfo($library->file, PATHINFO_EXTENSION) @endphp

                                        @if($ext === 'pdf')
                                            <iframe src="{{ asset('storage/'.$library->file) }}" width="100%" height="200px"></iframe>
                                        @elseif(in_array($ext, ['jpg','jpeg','png','webp']))
                                            <img src="{{ asset('storage/'.$library->file) }}" style="max-width:100%; max-height:200px;">
                                        @else
                                            <a href="{{ asset('storage/'.$library->file) }}" target="_blank">Current File: {{ basename($library->file) }}</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                    <a href="{{ route('admin.library.index') }}" class="btn btn-default"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {

    $("#editLibrary").validate({
        rules: {
            title: { required: true, minlength: 3 },
            description: { required: true, minlength: 3 },
            file: { required: false, extension: ['pdf','doc','docx'] }
        },
        messages: {
            title: { required: "Please enter title" },
            description: { required: "Please enter description" },
            file: { extension: "Invalid file type" }
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

    $('#description').summernote({
        height: 200,
        placeholder: 'Enter description here...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough','superscript','subscript']],
            ['para', ['ul','ol','paragraph']],
            ['insert', ['link']],
            ['view', ['fullscreen','codeview']]
        ]
    });

    $('#file').on('change', function() {
        var file = this.files[0];
        var preview = $('#filePreview');
        preview.empty();

        if (!file) return;

        var fileName = file.name;
        var fileType = file.type;
        var ext = fileName.split('.').pop().toLowerCase();

        if(ext === 'pdf') {
            var url = URL.createObjectURL(file);
            preview.html(`<iframe src="${url}" width="100%" height="200px"></iframe>`);
        }
        else if(fileType.startsWith('image/')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.html(`<img src="${e.target.result}" style="max-width:100%; max-height:200px;">`);
            };
            reader.readAsDataURL(file);
        }
        else {
            preview.html(`<a href="#" onclick="return false;">Selected File: ${fileName}</a>`);
        }
    });


});
</script>
@endsection
