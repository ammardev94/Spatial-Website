@extends('admin.default')


@section('css')
    <style>
        .note-editor.note-frame .note-editing-area .note-editable {
            height: 200px !important;
        }
    </style>
@endsection

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
                <li class="breadcrumb-item active">Edit Page Meta</li>
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
                <h3 class="card-title">Edit Page Meta ({{ $page->title }})</h3>
            </div>
            <!-- /.card-header -->

            @php
                // Group metas by section prefix
                $metaGroups = collect($page->pageMetas)->groupBy(function($item) {
                    $parts = explode('_', $item->ref_key);
                    return $parts[0] . '_' . $parts[1]; // e.g. section_one
                });

                // Group files by section prefix
                $fileGroups = collect($page->pageFiles)->groupBy(function($item) {
                    $parts = explode('_', $item->ref_point);
                    return $parts[0] . '_' . $parts[1]; // e.g. section_one
                });

                // Combine all section keys from both metas and files
                $allSections = $metaGroups->keys()->merge($fileGroups->keys())->unique();

                // Build final sections array
                $sections = collect();
                foreach ($allSections as $section) {
                    $sections[$section] = [
                        'metas' => $metaGroups->get($section, collect()), // fallback to empty collection
                        'files' => $fileGroups->get($section, collect()),
                    ];
                }
            @endphp
            
            <!-- form start -->
            <form action="{{ route('cms.page.meta.update', [$page->id]) }}" method="POST" id="addPageForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="card-body">
                    <div class="row">
                        <div class="accordion accordion-primary">
                            
                            @foreach($sections as $sectionName => $data)
                                @php
                                    $isFirst = $loop->first; // Check if first iteration
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{ $sectionName }}">
                                        <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $sectionName }}">
                                            {{ ucwords(str_replace('_', ' ', $sectionName)) }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $sectionName }}"
                                        class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                                        data-bs-parent="#cmsAccordion">
                                        <div class="accordion-body">
                                            <div class="row">
                                                {{-- Page Metas --}}
                                                @foreach($data['metas'] as $pageMeta)
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="{{ $pageMeta->ref_key }}">
                                                            {{ ucwords(str_replace('_', ' ', $pageMeta->ref_key)) }}
                                                        </label>
                                                        <textarea class="form-control" name="{{ $pageMeta->ref_key }}">{{ $pageMeta->ref_value }}</textarea>
                                                    </div>
                                                @endforeach

                                                {{-- Page Files --}}
                                                @foreach($data['files'] as $pageFile)
                                                    @php
                                                        $fileUrl = $pageFile->path ? storage_asset($pageFile->path) : null;
                                                        $extension = $pageFile->path ? strtolower(pathinfo($pageFile->path, PATHINFO_EXTENSION)) : null;
                                                        $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                        $isVideo = in_array($extension, ['mp4', 'webm', 'ogg']);
                                                    @endphp
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="{{ $pageFile->ref_point }}">
                                                            {{ ucwords(str_replace('_', ' ', $pageFile->ref_point)) }}
                                                        </label>
                                                        <input type="file" class="form-control" name="{{ $pageFile->ref_point }}" id="{{ $pageFile->ref_point }}">
                                                        @if($fileUrl)
                                                            @if($isImage)
                                                                <img src="{{ $fileUrl }}" alt="{{ $pageFile->alt_text }}" style="max-width: 100%; height: 200px;">
                                                            @elseif($isVideo)
                                                                <video controls style="max-width: 100%; height: 200px;">
                                                                    <source src="{{ $fileUrl }}" type="video/{{ $extension }}">
                                                                </video>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                    <a href="{{ route('cms.page.index') }}" class="btn btn-default"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel</a>
                </div>
            </form>
            <!-- form end -->
        </div>
    </div>
</div>
<!-- /.row -->


@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('input[type="file"]').on('change', function(event) {
                var input = $(this);
                var file = input[0].files[0];
                
                if (file) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                        var imgId = input.attr('id');
                        var img = $('#' + imgId).siblings('img');
                        
                        img.attr('src', e.target.result);
                        img.show();
                    };
                    
                    reader.readAsDataURL(file);
                }
            });  

            $('.summernote-editor').summernote({
                height: 500,
                minHeight: null,
                maxHeight: null,
                focus: false,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endsection