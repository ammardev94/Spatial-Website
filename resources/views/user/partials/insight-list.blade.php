@foreach ($insights as $insight)
<div class="col-md-3 insight-item">
    <a href="{{ route('user.insight.show', [$insight->id]) }}" class="card mainbox">
        <div class="card-body">
            <h6 class="card-title ">{{ $insight->title }}</h6>
            <p class="card-text"> {{ \Illuminate\Support\Str::limit(strip_tags($insight->description), 240) }}</p>
            <p class="card-text created-at text-muted mb-0">
                {{ $insight->created_at->diffForHumans() }}
            </p>
        </div>
    </a>
</div>
@endforeach