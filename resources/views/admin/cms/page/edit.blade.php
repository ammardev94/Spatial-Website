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

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Page</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('cms.page.update', [$page->id]) }}" method="POST" id="editPageForm">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $page->title }}"
                                    id="title" placeholder="Enter title">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $page->slug }}" id="slug"
                                    placeholder="Enter slug">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="page_title">Page Title</label>
                                <input type="text" class="form-control" name="page_title"
                                    value="{{ $page->page_title }}" id="page_title" placeholder="Enter page title">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="canonical_url">Canonical Url</label>
                                <input type="url" class="form-control" name="canonical_url"
                                    value="{{ $page->canonical_url }}" id="canonical_url" placeholder="http://">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="status">Publish Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                                        {{ old('status', $page->status) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="type">Page Type</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="type" value="0">
                                    <input type="checkbox" class="form-check-input" id="type" name="type" value="1" {{
                                        old('type', $page->type) == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="type">Custom Page</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="visibility">Search Engine Visibility (Robots Tag)</label>
                                <select class="form-select" name="visibility" id="visibility">
                                    <option value="index, follow" {{ old('visibility', $page->visibility) == 'index,
                                        follow' ? 'selected' : '' }}>index, follow (Default)</option>
                                    <option value="noindex, follow" {{ old('visibility', $page->visibility) == 'noindex,
                                        follow' ? 'selected' : '' }}>noindex, follow</option>
                                    <option value="index, nofollow" {{ old('visibility', $page->visibility) == 'index,
                                        nofollow' ? 'selected' : '' }}>index, nofollow</option>
                                    <option value="noindex, nofollow" {{ old('visibility', $page->visibility) ==
                                        'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="page_description">Page Description</label>
                                <textarea id="summernote"
                                    name="page_description">{{ $page->page_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                    <a href="{{ route('cms.page.index') }}" class="btn btn-default"><i
                            class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function  () {

        $("#editPageForm").validate({
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
            highlight: functio n (element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
            },
            unhighlight: functi on (element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
            },
            submitHandler: funct ion (form) {

                $(form).find('textarea[name="page_description"]').val($('#summernote').summernote('code'));

                let formData = $(form).serializeArray();
                console.log(formData                                       let data = $(form).serialize(                    console.log("form data", dat                    console.log($(form).attr('action                    console.log($(form).attr('method                                     $.aja                        url: $(form).attr('action                        type: $(form).attr('method                        data: da                        success: function(response                            console.log("Form submitted successfully                            window.location.href = "{{ route('cms.page.index') }                                               error: function(xhr                            console.log("An error occurred: ", xhr.responseTex                                                              */

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