@extends('front.layouts.master')
@section('title', 'Insights')
@section('header-class','header-dark')
@section('content')

<style>
    
    .font-16.line.line-2.mb-3 p {
    margin: 0;
}
    
</style>
<main id="insights-main">
    <section class="portfolio-grid o-hidden portfolio-grid-with-btn">
        <div class="container">
            <div class="tabs">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="font-64 fw-normal text-uppercase m-0 wow fadeInLeftBig" data-wow-delay="150ms">
                            {!! $page->pageMetas->where('ref_key', 'main_title')->first()?->ref_value !!}
                        </h2>
                    </div>
                    <div class="col-md-6">
                        <div class="tab-right d-flex justify-content-end gap-20 relative wow fadeInRightBig" data-wow-delay="150ms">
                            <a href="{{ route('insights') }}" class="tab-btn {{ !$categoryId ? 'active' : '' }}" data-filter="all">All</a>
                            @foreach($insightCategories as $category)
                                <a href="{{ route('insights', ['category' => Str::slug($category->title)]) }}" class="tab-btn {{ $categoryId == $category->id ? 'active' : '' }}" data-filter="{{ $category->id }}">{{ $category->title }}</a>
                            @endforeach
                            <div class="tab-indicator"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="card flex-column">

                    <div class="grid-b">
                        @forelse($insights as $insight)
                            <div class="item">
                                <div class="project-box relative">
                                    <a href="{{ route('insights.show', $insight->slug) }}" class="text-d-none">
                                        <div class="hover-box relative">
                                            <div class="hover-img">
                                                <img src="{{ asset('storage/'.$insight->featureImage?->url) ?? asset('images/placeholder.jpg') }}" class="w-100 h-100 img-cover" alt="{{ $insight->title }}">
                                            </div>
                                        </div>
                                        <div class="norm-box">
                                            <div class="proj-img">
                                                <img src="{{ asset('storage/'.$insight->featureImage?->url) ?? asset('images/placeholder.jpg') }}" class="w-100 h-100 img-cover" alt="{{ $insight->title }}">
                                            </div>
                                            <div class="proj-text">
                                                <h6 class="font-18 primary-font line line-1 text-uppercase">{{ $insight->title }}</h6>
                                                <div class="font-16 line line-2 mb-3">{!! Str::limit($insight->outlook_description, 100, '...') !!}
                                                </div>
                                                <div class="btn-box d-flex">
                                                    <span href="{{ route('insights.show', $insight->slug) }}" class="btn btn-primary --outline --dark">
                                                        <span>
                                                            Read More
                                                        </span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                                            viewBox="0 0 21 10" fill="none">
                                                            <path
                                                                d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
                                                                stroke="white" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center font-16">No insights found.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="pagination">
                        {{ $insights->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
@endsection