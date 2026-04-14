@extends('admin.default')

@section('css')
<style>
    .object-fit-cover {
        object-fit: cover;
    }

    .extra-small {
        font-size: 0.75rem;
    }

    .active-view {
        background-color: #313131 !important;
        color: #ffffff !important;
        border: 1px solid #313131 !important;
    }

    .active-view i {
        color: #ffffff !important;
    }

    .gallery-card-main {
        transition: all 0.2s ease;
        border-radius: 8px !important;
        overflow: hidden;
    }

    .gallery-card-main:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1) !important;
    }

    .card-overlay {
        background: rgba(255, 255, 255, 0.8);
        transform: translateY(100%);
        transition: transform 0.2s ease;
        backdrop-filter: blur(2px);
    }

    .gallery-card-main:hover .card-overlay {
        transform: translateY(0);
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-4">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Media Library</h3>
        <p class="text-muted mb-0">Overview of all images and files uploaded across the system.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <div class="btn-group border rounded p-1 bg-white me-3 mb-2 mb-md-0 shadow-sm">
            <button class="btn btn-sm btn-light border-0 active-view shadow-none" id="list-view-btn" title="List View">
                <i class="ti ti-list fs-18"></i>
            </button>
            <button class="btn btn-sm btn-light border-0 shadow-none" id="grid-view-btn" title="Grid View">
                <i class="ti ti-layout-grid fs-18"></i>
            </button>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Media Library</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-12">
        @include('include.messages')

        <!-- List View Container -->
        <div id="media-list-view">
            <div class="card card-primary border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title fw-bold mb-0">All System Media</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0">
                            <thead class="bg-light text-muted small uppercase">
                                <tr>
                                    <th class="ps-4">Preview</th>
                                    <th>File Name / Path</th>
                                    <th>Attached To</th>
                                    <th>Type / Tag</th>
                                    <th class="text-center">Uploaded At</th>
                                    <th class="text-end pe-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($images as $image)
                                <tr>
                                    <td class="ps-4">
                                        <div class="media-preview rounded border overflow-hidden"
                                            style="width: 60px; height: 60px;">
                                            <img src="{{ asset('storage/' . $image->url) }}"
                                                class="img-fluid h-100 w-100 object-fit-cover"
                                                onerror="this.src='{{ asset('admin/assets/img/img-placeholder.png') }}'">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark text-truncate" style="max-width: 250px;"
                                            title="{{ $image->url }}">
                                            {{ basename($image->url) }}
                                        </div>
                                        <small class="text-muted d-block">{{ $image->url }}</small>
                                    </td>
                                    <td>
                                        @if($image->imageable)
                                        <span class="badge bg-soft-primary text-primary px-2 py-1">
                                            {{ class_basename($image->imageable_type) }}
                                        </span>
                                        <div class="small mt-1 text-dark">
                                            @if(isset($image->imageable->title))
                                            {{ $image->imageable->title }}
                                            @elseif(isset($image->imageable->name))
                                            {{ $image->imageable->name }}
                                            @else
                                            ID: {{ $image->imageable_id }}
                                            @endif
                                        </div>
                                        @else
                                        <span class="badge bg-soft-danger text-danger px-2 py-1">Orphaned</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary px-2 py-1 rounded-pill small">
                                            {{ strtoupper($image->tag ?? 'NONE') }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="small text-dark">{{ $image->created_at->format('M d, Y') }}</div>
                                        <div class="extra-small text-muted">{{ $image->created_at->diffForHumans() }}
                                        </div>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-sm btn-muted shadow-none me-1 view-image-btn"
                                                data-url="{{ asset('storage/' . $image->url) }}"
                                                title="View Full Image">
                                                <i class="ti ti-eye"></i>
                                            </button>
                                            <form action="{{ route('admin.media.destroy', $image->id) }}" method="POST"
                                                class="d-inline delete-media-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-sm btn-muted text-danger shadow-none delete-btn"
                                                    title="Delete Permanent">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="ti ti-photo-off fs-1 d-block mb-3"></i>
                                        No media files found in the system.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid View Container -->
        <div id="media-grid-view" style="display: none;">
            <div class="row g-3">
                @forelse($images as $image)
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card h-100 border-0 shadow-sm gallery-card-main position-relative bg-white pt-2">
                        <div class="card-img-top position-relative overflow-hidden px-2" style="height: 160px;">
                            <img src="{{ asset('storage/' . $image->url) }}"
                                class="w-100 h-100 object-fit-cover rounded shadow-sm border"
                                onerror="this.src='{{ asset('admin/assets/img/img-placeholder.png') }}'">
                            <div
                                class="card-overlay position-absolute bottom-0 start-0 w-100 p-2 d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-sm btn-primary shadow-none view-image-btn"
                                    data-url="{{ asset('storage/' . $image->url) }}">
                                    <i class="ti ti-maximize"></i>
                                </button>
                                <form action="{{ route('admin.media.destroy', $image->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger shadow-none delete-btn">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="small fw-bold text-dark text-truncate mb-1">{{ basename($image->url) }}</div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-soft-primary text-primary extra-small px-1">{{
                                    class_basename($image->imageable_type) }}</span>
                                <span class="extra-small text-muted">{{ $image->created_at->format('M d') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <i class="ti ti-photo-off fs-1 d-block mb-3 text-muted"></i>
                    No media files found in the system.
                </div>
                @endforelse
            </div>
        </div>
        @if($images->hasPages())
        <div class="card-footer bg-white border-0 py-3 d-flex justify-content-end">
            {{ $images->links('vendor.pagination.bootstrap-4') }}
        </div>
        @endif
    </div>
</div>
</div>

<!-- Image Preview Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header border-bottom-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <img src="" id="modalPreviewImage" class="img-fluid rounded border shadow-sm" style="max-height: 80vh;">
                <div class="mt-3 text-muted small" id="imagePathText"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#list-view-btn').on('click', function () {
            $('#media-grid-view').hide();
            $('#media-list-view').fadeIn();
            $(this).addClass('active-view').siblings().removeClass('active-view');
            localStorage.setItem('media-view-preference', 'list');
        });

        $('#grid-view-btn').on('click', function () {
            $('#media-list-view').hide();
            $('#media-grid-view').fadeIn();
            $(this).addClass('active-view').siblings().removeClass('active-view');
            localStorage.setItem('media-view-preference', 'grid');
        });

        if (localStorage.getItem('media-view-preference') === 'grid') {
            $('#grid-view-btn').trigger('click');
        }

        $('.view-image-btn').on('click', function () {
            let url = $(this).data('url');
            $('#modalPreviewImage').attr('src', url);
            $('#imagePathText').text(url.split('/').pop());
            $('#imagePreviewModal').modal('show');
        });

        $('.delete-btn').on('click', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');

            Swal.fire({
                title: 'Confirm Deletion',
                text: "Deleting this file will remove it from the server and may cause broken images in associated records. Continue?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete permanently'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection