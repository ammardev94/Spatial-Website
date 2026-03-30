@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">CMS</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cms.page_meta.index') }}">Page Metas</a></li>
                <li class="breadcrumb-item active">Add Page Metas</li>
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
                <h3 class="card-title">Edit Page Meta</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('cms.page_meta.update', [$pageMeta->id]) }}" method="POST" id="editPageMetaForm">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="ref_id">Select Page</label>
                                <select class="form-select" name="ref_id" id="ref_id">
                                    @foreach($pages as $page)
                                    <option value="{{ $page->id }}"
                                        @if(isset($pageMeta) && $page->id == $pageMeta->ref_id) selected @endif>
                                        {{ $page->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="ref_key">Reference Key</label>
                                <input type="text" class="form-control" name="ref_key" id="ref_key" placeholder="Enter ref key" value="{{ $pageMeta->ref_key }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="ref_value">Reference Value</label>
                                <input type="text" class="form-control" name="ref_value" id="ref_value" placeholder="Enter ref value" value="{{ $pageMeta->ref_value }}">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                    <a href="{{ route('cms.page_meta.index') }}" class="btn btn-default"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
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

        $("#editPageMetaForm").validate({
            rules: {
                ref_key: {
                    required: true,
                    minlength: 3
                },
                ref_value: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                ref_key: {
                    required: "Please enter a reference key",
                    minlength: "Your reference key must consist of at least 3 characters"
                },
                ref_value: {
                    required: "Please enter a reference key",
                    minlength: "Your reference key must consist of at least 3 characters"
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

                let formData = $(form).serializeArray();
                console.log(formData);

                form.submit();
            }
        });
    });
</script>

@endsection