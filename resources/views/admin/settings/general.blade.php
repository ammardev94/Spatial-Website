@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Global Site Settings</h3>
        <p class="text-muted mb-0">Manage contact information and social media links appearing across the website.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">General Information</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.settings.general.update') }}" method="POST" id="settingsForm">
            @csrf
            @method('PUT')
            @include('include.messages')

            <div class="row">
                <!-- Contact Details -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pt-4">
                            <h5 class="fw-bold"><i class="fas fa-address-book me-2 text-primary"></i>Contact Information
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold" for="email">Public Email Address</label>
                                <input type="email" class="form-control shadow-none" name="email" id="email"
                                    value="{{ old('email', $info->email) }}" placeholder="e.g. info@company.com">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold" for="phone">Public Phone Number</label>
                                <input type="text" class="form-control shadow-none" name="phone" id="phone"
                                    value="{{ old('phone', $info->phone) }}" placeholder="e.g. +971 XXX XXXX">
                            </div>

                            <div class="form-group mb-0">
                                <label class="form-label font-weight-bold" for="address">Physical Address</label>
                                <textarea name="address" id="address" class="form-control shadow-none" rows="3"
                                    placeholder="Enter complete office address">{{ old('address', $info->address) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom-0 pt-4">
                            <h5 class="fw-bold"><i class="fas fa-share-alt-square me-2 text-primary"></i>Social Media
                                Links</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold" for="instagram_link">Instagram URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i
                                            class="fab fa-instagram text-danger"></i></span>
                                    <input type="text" class="form-control shadow-none" name="instagram_link"
                                        id="instagram_link" value="{{ old('instagram_link', $info->instagram_link) }}"
                                        placeholder="https://instagram.com/your-profile">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold" for="facebook_link">Facebook URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i
                                            class="fab fa-facebook text-primary"></i></span>
                                    <input type="text" class="form-control shadow-none" name="facebook_link"
                                        id="facebook_link" value="{{ old('facebook_link', $info->facebook_link) }}"
                                        placeholder="https://facebook.com/your-page">
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <label class="form-label font-weight-bold" for="ticktok_link">TikTok URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i
                                            class="fab fa-tiktok text-dark"></i></span>
                                    <input type="text" class="form-control shadow-none" name="ticktok_link"
                                        id="ticktok_link" value="{{ old('ticktok_link', $info->ticktok_link) }}"
                                        placeholder="https://tiktok.com/@your-account">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <p class="text-muted small mb-0"><i class="fas fa-info-circle me-1"></i>These settings affect the
                        header, footer, and contact pages globaly.</p>
                    <button type="submit" class="btn btn-primary px-4 shadow-none"><i
                            class="fas fa-save me-2"></i>Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $("#settingsForm").validate({
            rules: {
                email: { email: true },
                instagram_link: { url: false }, // Keeping it false because people might paste usernames initially
                facebook_link: { url: false },
                ticktok_link: { url: false }
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