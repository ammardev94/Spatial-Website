@if($insights->count())
    @foreach($insights as $insight)
        <a href="{{ route('user.insight.show', $insight->id) }}"
           class="list-group-item list-group-item-action">
            <strong>{{ $insight->title }}</strong>
            <br>
            <small class="text-muted">
                {{ Str::limit(strip_tags($insight->description), 80) }}
            </small>
        </a>
    @endforeach
@else
    <div class="list-group-item text-muted">
        No results found
    </div>
@endif
