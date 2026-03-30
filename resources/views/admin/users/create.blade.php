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
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Users</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Add User</li>
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
                <h3 class="card-title">Add User</h3>
            </div>

            <form action="{{ route('admin.users.store') }}"
                  method="POST"
                  id="addUser"
                  enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">

                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Enter user name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Enter user email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       placeholder="Enter phone number" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                       placeholder="Enter address" value="{{ old('address') }}">
                            </div>
                        </div>

                        <!-- Profile Image -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="img">Profile Image</label>
                                <input type="file" class="form-control" name="img" id="img">
                                <img src="" alt="" style="max-width: 100%; height: 200px; margin-top:8px; display:none;">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>&nbsp;&nbsp;Save
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                        <i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function () {

    $.validator.addMethod('extension', function (value, element, allowedExtensions) {
        var extension = value.split('.').pop().toLowerCase();
        return $.inArray(extension, allowedExtensions) !== -1;
    }, 'Invalid file type');

    $("#addUser").validate({
        rules: {
            name: { required: true, minlength: 3 },
            email: { required: true, email: true },
            phone: { required: true },
            address: { required: true },
            img: { required: true, extension: ['jpg','jpeg','png','webp'] }
        },
        messages: {
            name: { required: "Please enter user name" },
            email: { required: "Please enter email", email: "Invalid email format" },
            phone: { required: "Please enter phone" },
            address: { required: "Please enter address" },
            img: { required: "Please upload an image", extension: "Only jpg, jpeg, png, webp allowed" }
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
        if(file){
            var ext = file.name.split('.').pop().toLowerCase();
            if(['jpg','jpeg','png','webp'].includes(ext)){
                var reader = new FileReader();
                reader.onload = function(e){
                    input.siblings('img').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            } else {
                input.siblings('img').hide().attr('src','');
            }
        }
    });

});
</script>
@endsection
