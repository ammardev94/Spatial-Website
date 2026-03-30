@extends('admin.default')

@section('content')
    @include('include.messages')

    <div class="row">
        <div class="col-md-12">
            <!-- Activities -->
            <div class="card">
                <div class="card-header pb-1">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="mb-3">
                            <h4>Notifications</h4>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <a href="{{ route('admin.notification.mark-all-read') }}" class="btn btn-light me-2"><i class="ti ti-check me-2"></i>Mark all as read</a>
                            <a href="{{ route('admin.notification.delete-all') }}" class="btn btn-danger"><i class="ti ti-trash me-2"></i>Delete all</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-1">
                    <div class="d-block">
                        @isset($notifications)  
                            @foreach ($notifications as $notification)

                                <div class="d-flex align-items-center justify-content-between flex-wrap shadow-sm noti-hover border p-3 pb-0 rounded mb-3">
                                    <div class="d-flex align-items-start flex-fill">
                                        <a href="{{ route('admin.application.show', [$notification->data['application_id']]) }}" class="avatar avatar-lg flex-shrink-0 me-2 mb-3">
                                            <img src="{{ $notification->data['img'] }}" class=" img-fluid">
                                        </a>
                                        <div class="mb-3">
                                            <p class="mb-0 fw-medium">{!! $notification->data['message'] !!}</p>
                                            <span>{{ $notification->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="noti-delete mb-3">
                                        <a href="{{ route('admin.notification.delete', [$notification->id]) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                                    </div>
                                </div>

                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
            <!-- /Activities -->
        </div>
    </div>

@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {

    });
</script>

@endsection