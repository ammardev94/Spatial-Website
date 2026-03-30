@if ($errors->any())
	<div class="alert alert-danger" role="alert">
		<p><i class="icon fa fa-ban"></i>&nbsp;No of errors: ({{ count($errors->all()) }})</p>
		<div>
			<ol>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ol>
		</div>
	</div>
@endif


<div id="toast-container" class="position-fixed top-0 end-0 p-3">
	<div class="toast colored-toast bg-success text-fixed-white" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header bg-success text-fixed-white">
			<strong class="me-auto"><i class="far fa-check-circle"></i>&nbsp;Success</strong>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body" id="toastMessage"></div>
	</div>
	@if (Session::has('msg.error'))
		<div id="solid-errorToast" class="toast colored-toast bg-danger text-fixed-white" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header bg-danger text-fixed-white">
				<strong class="me-auto"><i class="icon fa fa-ban"></i>&nbsp;Error</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
				{{ Session::get('msg.error') }}
			</div>
		</div>
	@endif
    @if (Session::has('msg.success'))
		<div id="solid-successToast" class="toast colored-toast bg-success text-fixed-white" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header bg-success text-fixed-white">
				<strong class="me-auto"><i class="far fa-check-circle"></i>&nbsp;Success</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
				{{ Session::get('msg.success') }}
			</div>
		</div>
    @endif
</div>