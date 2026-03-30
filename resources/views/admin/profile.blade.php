@extends('admin.default')

@section('content')

@include('include.messages')

<div class="d-md-flex d-block align-items-center justify-content-between border-bottom pb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Profile</h3>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <div class="pe-1 mb-2">
            <a href="javascript:void(0);" class="btn btn-outline-light bg-white btn-icon" data-bs-toggle="tooltip"
                data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                <i class="ti ti-refresh"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2 border-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" id="imgForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="text-center">
                        @if (!empty(auth()->guard('admin')->user()->img))                            
                            <span class="profile-pic">
                                <img id="profile-img" src="{{ asset('storage/'.auth()->guard('admin')->user()->img) }}" alt="{{ auth()->guard('admin')->user()->name }}">
                            </span>
                        @endif
                        <div class="title-upload">
                            <h5>Edit Your Photo</h5>
                        </div>
                    </div>
                    <div class="profile-uploader profile-uploader-two mb-0">
                        <span class="upload-icon"><i class="ti ti-upload"></i></span>
                        <div class="drag-upload-btn bg-transparent me-0 border-0">
                            <p class="upload-btn">
                                <span>Click to Upload</span> 
                            </p>
                        </div>
                        @if (!empty(auth()->guard('admin')->user()->img)) 
                            <input type="hidden" id="existingImg" value="{{ auth()->guard('admin')->user()->img }}" />
                        @endif
                        <input type="file" id="img" name="img" class="form-control"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 border-0">

        <div class="card">
            <form action="{{ route('admin.profile.update') }}" method="POST" id="personalInfoForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Personal Information</h5>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input 
                                type="text"
                                id="name" 
                                name="name" 
                                class="form-control"
                                placeholder="Enter User Name"
                                value="{{ auth()->guard('admin')->user()->name }}" 
                                />
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="email">Email Address</label>
                            <input 
                                type="email"
                                id="email"
                                name="email" 
                                class="form-control" 
                                placeholder="Enter Email"
                                value="{{ auth()->guard('admin')->user()->email }}"
                                disabled
                            />
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>




@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {


        
        $.validator.addMethod("extension", function(value, element, param) {
            if (this.optional(element)) {
                return true;
            }        
            var fileName = value.split('\\').pop();
            var extension = fileName.split('.').pop().toLowerCase();
            return param.split(',').indexOf(extension) > -1;
        }, "Only {0} files are allowed."); 

        $('input[type="file"]').on('change', function(event) {
            let input = $(this);
            let file = input[0].files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#profile-img").attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            }

            setTimeout(() => {
                $("#imgForm").submit();
            }, 1000);
        });

        $("#imgForm").validate({
            rules: {
                img: {
                    required: function() {
                        return !$('#existingImg').val();
                    },
                    extension: "jpg,jpeg,png"
                }
            },
            messages: {
                img: {
                    required: 'Please upload an image',
                    extension: 'Only jpg, jpeg, and png files are allowed'
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
                console.log("Form Data:", formData);
                form.submit();
            }
        });

        $("#personalInfoForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 45
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 45
                },
            },
            messages: {
                name: {
                    required: "Please enter your username",
                    minlength: "Your username must be at least 3 characters long",
                    maxlength: "Your username cannot exceed 45 characters"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                    maxlength: "Your email cannot exceed 45 characters"
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
                form.submit();
            }
        });

    });
</script>

@endsection