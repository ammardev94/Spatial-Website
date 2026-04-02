@extends('admin.default')

@section('content')
<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Edit Service: {{ $service->title }}</h3>
        <p class="text-muted mb-0">Manage core info, modular layout sections, and sub-service hierarchies.</p>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                <li class="breadcrumb-item active">Edit Record</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        @include('include.messages')
        <!-- Tabbed Interface -->
        <div class="card card-primary border-0 shadow-sm border-top border-primary border-4">
            <div class="card-header bg-white border-bottom-0 p-0">
                <ul class="nav nav-tabs nav-tabs-solid d-flex" id="serviceTabs" role="tablist">
                    <li class="nav-item flex-fill text-center" role="presentation">
                        <button class="nav-link w-100 active py-3 border-0 rounded-0" id="main-tab" data-bs-toggle="tab"
                            data-bs-target="#mainContent" type="button" role="tab"><i
                                class="fas fa-info-circle me-2"></i>Core Info</button>
                    </li>
                    <li class="nav-item flex-fill text-center" role="presentation">
                        <button class="nav-link w-100 py-3 border-0 rounded-0" id="sections-tab" data-bs-toggle="tab"
                            data-bs-target="#sectionsContent" type="button" role="tab"><i
                                class="fas fa-th-large me-2"></i>Layout Sections</button>
                    </li>
                    <li class="nav-item flex-fill text-center" role="presentation">
                        <button class="nav-link w-100 py-3 border-0 rounded-0" id="sub-services-tab"
                            data-bs-toggle="tab" data-bs-target="#subServicesContent" type="button" role="tab"><i
                                class="fas fa-list-ul me-2"></i>Sub-Services</button>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4 bg-white">
                <div class="tab-content" id="serviceTabsContent">
                    <!-- Tab 1: Core Info -->
                    <div class="tab-pane fade show active" id="mainContent" role="tabpanel">
                        <form action="{{ route('admin.services.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data" id="editServiceForm">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-7 border-end pb-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label font-weight-bold" for="title">Service Title</label>
                                        <input type="text" class="form-control shadow-none" name="title" id="title"
                                            value="{{ old('title', $service->title) }}"
                                            placeholder="e.g. Architectural Design" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label font-weight-bold" for="hero_title">Hero Banner
                                            Title</label>
                                        <input type="text" class="form-control shadow-none" name="hero_title"
                                            id="hero_title" value="{{ old('hero_title', $service->hero_title) }}"
                                            placeholder="Impactful headline for the header">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-label font-weight-bold" for="hero_description">Hero Banner
                                            Description</label>
                                        <textarea name="hero_description" id="hero_description"
                                            class="form-control shadow-none" rows="5"
                                            placeholder="Brief summary under the headline">{{ old('hero_description', $service->hero_description) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-5 ps-4 pb-3">
                                    <label class="form-label font-weight-bold d-block rounded p-2 bg-light mb-3"
                                        for="hero_image"><i class="fas fa-image me-2 text-primary"></i>Service Hero
                                        Banner</label>

                                    <!-- Current Selection (Hero Image) -->
                                    <div class="mb-3 d-flex flex-column gap-2 text-center bg-light p-3 rounded-3 border"
                                        style="min-height: 150px;">
                                        @if($service->heroImage)
                                        <div>
                                            <p class="mb-2 text-muted small uppercase fw-bold ls-1">Current Image</p>
                                            <img src="{{ asset('storage/'.$service->heroImage->url) }}" width="100%"
                                                class="img-thumbnail rounded shadow-sm">
                                        </div>
                                        @endif
                                        <div id="hero_img_preview" class="mt-2 text-center"></div>
                                    </div>

                                    <input type="file" class="form-control shadow-none mt-2" name="hero_image"
                                        id="hero_image">
                                    <small class="text-muted d-block mt-2">Leave empty to keep existing banner.
                                        Recommended
                                        1920x600px.</small>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="text-end">
                                <a href="{{ route('admin.services.index') }}" class="btn btn-muted shadow-none">Back</a>
                                <button type="submit" class="btn btn-primary px-5 shadow-none ms-2"><i
                                        class="fas fa-save me-2"></i>Update Basic Info</button>
                            </div>
                        </form>
                    </div>

                    <!-- Tab 2: Layout Sections -->
                    <div class="tab-pane fade" id="sectionsContent" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h5 class="fw-bold mb-1">Service Page Layout</h5>
                                <p class="text-muted small mb-0">Manage modular content blocks appearing on the service
                                    details page.</p>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-primary shadow-none btn-sm create-section-btn">
                                <i class="fas fa-plus me-1"></i> Add Layout Block
                            </a>
                        </div>

                        <div id="service-sections-container">
                            @forelse($service->sections as $section)
                            <div class="card mb-3 border shadow-none rounded-3">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar avatar-sm bg-primary-transparent text-primary rounded-pill me-3">
                                                <i class="fas fa-columns"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark">{{ $section->title }}</div>
                                                <span class="badge bg-soft-info text-info uppercase small ls-1">{{
                                                    $section->type }}</span>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <a href="javascript:void(0);"
                                                class="btn btn-muted btn-sm shadow-none manage-items-btn"
                                                data-id="{{ $section->id }}">
                                                <i class="fas fa-plus me-1"></i>Edit Items ({{ $section->items->count()
                                                }})
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-muted btn-sm shadow-none ms-1 edit-section-btn"
                                                data-id="{{ $section->id }}" data-title="{{ $section->title }}"
                                                data-type="{{ $section->type }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-muted btn-sm text-danger shadow-none ms-1 delete-section-btn"
                                                data-id="{{ $section->id }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-5 bg-light rounded-3 border-dashed border-2">
                                <div class="text-muted mb-2"><i class="fas fa-cubes fa-2x d-block mb-2"></i> No layout
                                    blocks defined yet.</div>
                                <button class="btn btn-outline-primary btn-sm shadow-none create-section-btn">Create
                                    Your First Section</button>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Tab 3: Sub-Services -->
                    <div class="tab-pane fade" id="subServicesContent" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h5 class="fw-bold mb-1">Sub-Services Management</h5>
                                <p class="text-muted small mb-0">Group related offerings and detailed listings for this
                                    service.</p>
                            </div>
                            <button class="btn btn-primary shadow-none btn-sm create-sub-service-btn">
                                <i class="fas fa-plus me-1"></i> New Sub-Service Group
                            </button>
                        </div>

                        <div class="row" id="sub-services-container">
                            @forelse($service->subServices as $subService)
                            <div class="col-md-6 mb-3">
                                <div class="card border h-100 shadow-none">
                                    <div
                                        class="card-header bg-light d-flex justify-content-between align-items-center py-2">
                                        <div class="fw-bold text-primary">{{ $subService->title }}</div>
                                        <div class="d-flex gap-2">
                                            <a href="javascript:void(0);" class="text-danger delete-group-btn"
                                                data-id="{{ $subService->id }}"><i
                                                    class="fas fa-trash-alt small"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group list-group-flush small mb-3">
                                            @foreach($subService->items as $item)
                                            <li
                                                class="list-group-item d-flex justify-content-between border-0 px-0 py-1">
                                                <span>{{ $item->title }}</span>
                                                <a href="javascript:void(0);"
                                                    class="text-danger opacity-50 delete-sub-item"
                                                    data-id="{{ $item->id }}"><i class="fas fa-times"></i></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <form class="add-sub-item-form">
                                            <input type="hidden" name="sub_service_id" value="{{ $subService->id }}">
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Add sub-service item" required>
                                                <button type="submit" class="btn btn-muted shadow-none border"><i
                                                        class="fas fa-check"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-md-12">
                                <div class="text-center py-5 bg-light rounded-3 border-dashed border-2">
                                    <div class="text-muted mb-2"><i class="fas fa-stream fa-2x d-block mb-2"></i> No
                                        sub-services grouped yet.</div>
                                    <button
                                        class="btn btn-outline-primary btn-sm shadow-none create-sub-service-btn">Create
                                        Your First Group</button>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<!-- Add Section Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title">Add Layout Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addSectionForm">
                <div class="modal-body">
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <div class="mb-3">
                        <label class="form-label">Section Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Section Type</label>
                        <select name="type" class="form-select" required>
                            <option value="text">Text Column</option>
                            <option value="list">Bullet List</option>
                            <option value="grid">Photo Grid</option>
                            <option value="video">Video Embed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-muted shadow-none" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary shadow-none px-4">Create Section</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Sub-service Modal -->
<div class="modal fade" id="addSubServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header">
                <h5 class="modal-title">New Sub-Service Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addSubServiceForm">
                <div class="modal-body">
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <div class="mb-3">
                        <label class="form-label">Group Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Design Phases">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-muted shadow-none" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary shadow-none px-4">Create Group</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Section Modal -->
<div class="modal fade" id="editSectionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-start">
            <div class="modal-header bg-white">
                <h5 class="modal-title fw-bold">Edit Layout Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editSectionForm">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_section_id">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Section Title</label>
                        <input type="text" name="title" id="edit_section_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Section Type</label>
                        <select name="type" id="edit_section_type" class="form-select" required>
                            <option value="text">Text Column</option>
                            <option value="list">Bullet List</option>
                            <option value="grid">Photo Grid</option>
                            <option value="video">Video Embed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-muted shadow-none" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary shadow-none px-4">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="manageItemsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-start">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold">Manage Section Items</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Loading State -->
                <div id="items-loader" class="text-center py-4 d-none">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="text-muted mt-2">Loading items...</p>
                </div>

                <!-- Items List -->
                <div id="section-items-list" class="mb-4">
                    <!-- Items will be loaded here via AJAX -->
                </div>

                <hr>

                <!-- Add Item Form -->
                <h6 class="fw-bold mb-3">Add New Item</h6>
                <form id="addItemForm" enctype="multipart/form-data">
                    <input type="hidden" name="section_id" id="modal_section_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Item Title</label>
                                <input type="text" name="title" class="form-control form-control-sm"
                                    placeholder="Optional title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Item Image</label>
                                <input type="file" name="image" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Description / Text Content</label>
                                <textarea name="description" class="form-control form-control-sm" rows="3"
                                    placeholder="Bullet points or text block"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-0 text-end">
                                <button type="submit" class="btn btn-primary btn-sm px-4 shadow-none">
                                    <i class="fas fa-plus me-1"></i> Add to Section
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                        <p class="mb-1 text-muted small uppercase fw-bold ls-1 mt-2">New Selection Preview</p>
                        <img src="${e.target.result}" width="100%" class="img-thumbnail shadow-sm rounded">
                    `);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        $("#editServiceForm").validate({
            rules: {
                title: { required: true, minlength: 2 }
            }
        });

        // --- Sections Logic ---
        $(document).on('click', '.create-section-btn', function () {
            $('#addSectionModal').modal('show');
        });

        $('#addSectionForm').submit(function (e) {
            e.preventDefault();
            $.post("{{ route('admin.services.sections.store') }}", $(this).serialize(), function (res) {
                if (res.success) {
                    location.reload();
                }
            });
        });

        $(document).on('click', '.edit-section-btn', function () {
            let id = $(this).data('id');
            let title = $(this).data('title');
            let type = $(this).data('type');

            $('#edit_section_id').val(id);
            $('#edit_section_title').val(title);
            $('#edit_section_type').val(type);

            $('#editSectionModal').modal('show');
        });

        $('#editSectionForm').submit(function (e) {
            e.preventDefault();
            let id = $('#edit_section_id').val();
            let data = $(this).serialize();

            $.ajax({
                url: "{{ route('admin.services.sections.update', ':id') }}".replace(':id', id),
                type: 'PUT',
                data: data,
                success: function (res) {
                    if (res.success) location.reload();
                }
            });
        });

        $(document).on('click', '.delete-section-btn', function () {
            let id = $(this).data('id');
            if (confirm('Delete this section and all its items?')) {
                $.ajax({
                    url: "{{ route('admin.services.sections.destroy', ':id') }}".replace(':id', id),
                    type: 'DELETE',
                    success: function () { location.reload(); }
                });
            }
        });

        // --- Manage Items Logic ---
        $(document).on('click', '.manage-items-btn', function () {
            let sectionId = $(this).data('id');
            $('#modal_section_id').val(sectionId);
            $('#section-items-list').empty();
            $('#items-loader').removeClass('d-none');
            $('#manageItemsModal').modal('show');

            loadItems(sectionId);
        });

        function loadItems(sectionId) {
            $.get("{{ route('admin.services.sections.items.index', ':id') }}".replace(':id', sectionId), function (res) {
                $('#items-loader').addClass('d-none');
                if (res.success) {
                    if (res.items.length === 0) {
                        $('#section-items-list').html('<div class="text-center py-3 text-muted border rounded">No items found in this section.</div>');
                    } else {
                        let html = '<div class="table-responsive"><table class="table table-sm align-middle">';
                        res.items.forEach(item => {
                            let img = item.image ? `<img src="/storage/${item.image.url}" width="50" class="rounded border">` : '<span class="text-muted small">No Image</span>';
                            html += `
                                <tr id="item-row-${item.id}">
                                    <td>${img}</td>
                                    <td>
                                        <div class="fw-bold small">${item.title || "Untitled Item"}</div>
                                        <div class="text-muted wrap-text small" style="max-height: 40px; overflow: hidden;">${item.description || ""}</div>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-muted btn-sm text-danger delete-item-btn" data-id="${item.id}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            `;
                        });
                        html += '</table></div>';
                        $('#section-items-list').html(html);
                    }
                }
            });
        }

        $('#addItemForm').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            let btn = $(this).find('button[type="submit"]');
            btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> Adding...');

            $.ajax({
                url: "{{ route('admin.services.sections.items.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    btn.prop('disabled', false).html('<i class="fas fa-plus me-1"></i> Add to Section');
                    if (res.success) {
                        $('#addItemForm')[0].reset();
                        loadItems($('#modal_section_id').val());
                    }
                }
            });
        });

        $(document).on('click', '.delete-item-btn', function () {
            let id = $(this).data('id');
            if (confirm('Delete this item?')) {
                $.ajax({
                    url: "{{ route('admin.services.sections.items.destroy', ':id') }}".replace(':id', id),
                    type: 'DELETE',
                    success: function () { $(`#item-row-${id}`).fadeOut(); }
                });
            }
        });

        // --- Sub-services Logic ---
        $(document).on('click', '.create-sub-service-btn', function () { $('#addSubServiceModal').modal('show'); });

        $('#addSubServiceForm').submit(function (e) {
            e.preventDefault();
            $.post("{{ route('admin.services.sub_services.store') }}", $(this).serialize(), function (res) {
                if (res.success) location.reload();
            });
        });

        $(document).on('submit', '.add-sub-item-form', function (e) {
            e.preventDefault();
            let form = $(this);
            $.post("{{ route('admin.services.sub_services.items.store') }}", form.serialize(), function (res) {
                if (res.success) {
                    form.find('input[name="title"]').val('');
                    form.closest('.card-body').find('.list-group').append(`
                        <li class="list-group-item d-flex justify-content-between border-0 px-0 py-1">
                            <span>${res.item.title}</span>
                            <a href="javascript:void(0);" class="text-danger opacity-50 delete-sub-item" data-id="${res.item.id}"><i class="fas fa-times"></i></a>
                        </li>
                    `);
                }
            });
        });

        $(document).on('click', '.delete-sub-item', function () {
            let btn = $(this);
            let id = btn.data('id');
            $.ajax({
                url: "{{ route('admin.services.sub_services.items.destroy', ':id') }}".replace(':id', id),
                type: 'DELETE',
                success: function () { btn.closest('li').fadeOut(); }
            });
        });

        $(document).on('click', '.delete-group-btn', function () {
            let id = $(this).data('id');
            if (confirm('Delete this entire group?')) {
                $.ajax({
                    url: "{{ route('admin.services.sub_services.destroy', ':id') }}".replace(':id', id),
                    type: 'DELETE',
                    success: function () { location.reload(); }
                });
            }
        });
    });
</script>
@endsection