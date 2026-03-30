@extends('admin.default')

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Pages</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.page.index') }}">Pages</a></li>
                <li class="breadcrumb-item active">Add Page</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add New Page</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('cms.page.store') }}" method="POST" id="addPageForm">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug" value="{{ old('slug') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="page_title">Page Title</label>
                                <input type="text" class="form-control" name="page_title" id="page_title" placeholder="Enter page title" value="{{ old('page_title') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="canonical_url">Canonical Url</label>
                                <input type="url" class="form-control" name="canonical_url" id="canonical_url" placeholder="http://" value="{{ old('canonical_url') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="form-check-input" id="status" name="status"  value="{{ old('status') }}">
                                    <label class="custom-control-label" for="status">Status</label>
                                </div>
                                <input type="hidden" name="status" value="0">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="form-check-input" id="type" name="type"  value="{{ old('type') }}">
                                    <label class="custom-control-label" for="type">Type</label>
                                </div>
                                <input type="hidden" name="type" value="0">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="visibility">Visibility</label>
                                <select class="form-select" name="visibility" id="visibility">
                                    <option value="">-- select --</option>
                                    <option value="no-follow">no-follow</option>
                                    <option value="no-index">no-index</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="page_description">Page Description</label>
                                <textarea id="summernote" name="page_description">{{ old('page_description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                    <a href="{{ route('cms.page.index') }}" class="btn btn-default"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {

        $("#addPageForm").validate({
            rules: {
                title: {
                    required: true,
                    minlength: 2
                },
                slug: {
                    required: true,
                    minlength: 2
                },
                page_title: {
                    required: true,
                    minlength: 2
                },
                page_description: {
                    required: true
                },
                canonical_url: {
                    required: true,
                    url: true
                },
                visibility: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Please enter a title",
                    minlength: "Your title must consist of at least 2 characters"
                },
                slug: {
                    required: "Please enter a slug",
                    minlength: "Your slug must consist of at least 2 characters"
                },
                page_title: {
                    required: "Please enter a page title",
                    minlength: "Your page title must consist of at least 2 characters"
                },
                page_description: {
                    required: "Please enter a page description"
                },
                canonical_url: {
                    required: "Please enter a canonical URL",
                    url: "Please enter a valid URL"
                },
                visibility: {
                    required: "Please select visibility"
                }
            },
            errorElement: "label",
            validClass: "is-valid",
            errorClass: "is-invalid text-danger",
            highlight: function(element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
            },
            submitHandler: function(form) {

                $(form).find('textarea[name="page_description"]').val($('#summernote').summernote('code'));

                let status = $(form).find('#status').is(':checked') ? 1 : 0;
                let type = $(form).find('#type').is(':checked') ? 1 : 0;

                $(form).find('input[name="status"]').val(status);
                $(form).find('input[name="type"]').val(type);

                let formData = $(form).serializeArray();
                console.log(formData);

                /*
                let data = $(form).serialize();

                console.log("form data", data);
                console.log($(form).attr('action'))
                console.log($(form).attr('method'))
                
                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: data,
                    success: function(response) {
                        console.log("Form submitted successfully");
                        window.location.href = "{{ route('cms.page.index') }}";
                    },
                    error: function(xhr) {
                        console.log("An error occurred: ", xhr.responseText);
                    }
                });
                */

                form.submit();
            }
        });

        $('#summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    });
</script>

@endsection