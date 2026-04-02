@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Add New Service</h3>
        <p class="text-muted mb-0">Create the landing page for your new service offering.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                <li class="breadcrumb-item active">New Record</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm">
            @csrf
            @include('include.messages')
            <div class="card card-primary border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom-0 pt-4">
                    <h5 class="fw-bold mb-0 text-primary small uppercase">Basic Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Main Info -->
                        <div class="col-md-7 mb-3">
                            <div class="form-group font-weight-bold mb-3">
                                <label class="form-label" for="title">Service Title</label>
                                <input type="text" class="form-control shadow-none" name="title" id="title"
                                    value="{{ old('title') }}" placeholder="e.g. Architectural Design" required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group font-weight-bold mb-3">
                                <label class="form-label" for="hero_title">Hero Banner Title (Optional)</label>
                                <input type="text" class="form-control shadow-none" name="hero_title" id="hero_title"
                                    value="{{ old('hero_title') }}" placeholder="Impactful headline for the header">
                                @error('hero_title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group font-weight-bold mb-0">
                                <label class="form-label" for="hero_description">Hero Banner Description
                                    (Optional)</label>
                                <textarea name="hero_description" id="hero_description" class="form-control shadow-none"
                                    rows="4" placeholder="Brief summary under the headline">{{ old('hero_description')
                                    }}</textarea>
                                @error('hero_description') <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Side Media -->
                        <div class="col-md-5 mb-3 border-start ps-4">
                            <div class="form-group font-weight-bold mb-0 h-100 d-flex flex-column">
                                <label
                                    class="form-label d-block rounded p-2 bg-light border-start border-primary border-4"
                                    for="hero_image"><i class="fas fa-image me-2 text-primary"></i>Service Hero
                                    Banner</label>
                                <div class="mt-2 mb-3 bg-white p-3 border rounded-3 text-center d-flex align-items-center justify-content-center"
                                    style="min-height: 200px; background-image: url('{{ asset('assets/img/patterns/placeholder-bg.png') }}'); background-size: cover;">
                                    <div id="hero_img_preview">
                                        <div class="text-muted"><i class="fas fa-upload fa-2x mb-2"></i><br>Image
                                            preview
                                            appears here</div>
                                    </div>
                                </div>
                                <input type="file" class="form-control shadow-none" name="hero_image" id="hero_image"
                                    required>
                                <div class="mt-2 text-muted small"><i class="fas fa-info-circle me-1"></i>High
                                    resolution
                                    landscape image (e.g. 1920x600px). Max 2MB.</div>
                                @error('hero_image') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-end p-3">
                    <p class="text-start text-muted d-inline-block float-start mb-0 align-middle pt-2 small"><i
                            class="fas fa-wrench me-1"></i>You can add modular sections and sub-services after saving
                        the base info.</p>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-muted shadow-none">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4 shadow-none"><i class="fas fa-save me-1"></i>Save
                        & Continue</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        // Hero Image Preview
        $('#hero_image').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(`#hero_img_preview`).html(`
                        <img src="${e.target.result}" width="100%" class="img-fluid shadow-sm rounded-3">
                    `);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        $("#serviceForm").validate({
            rules: {
                title: { required: true, minlength: 2 },
                hero_image: { required: true }
            },
            errorElement: "label",
            validClass: "is-valid",
            errorClass: "is-invalid text-danger small pt-1",
            highlight: function (element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
            }
        });
    });
</script>
@endsection