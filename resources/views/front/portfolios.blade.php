@extends('front.layouts.master')
@section('title', 'Portfolios')
@section('header-class', 'header-dark')
@section('content')
<main id="portfolio-main">
    <section class="portfolio-grid o-hidden">
        <div class="container">
            <div class="tabs ">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="font-64 fw-normal text-uppercase m-0 wow fadeInLeftBig" data-wow-delay="150ms">
                            {!! $page->pageMetas->where('ref_key', 'header_main_title')->first()?->ref_value !!}
                        </h2>
                    </div>
                    <div class="col-md-6 wow fadeInRightBig" data-wow-delay="150ms">
                        <div class="tab-right d-flex justify-content-end gap-20 relative">
                            <a href="{{ route('portfolios') }}" class="tab-btn {{ empty($categorySlug) ? 'active' : '' }}" data-filter="all">All</a>
                            @foreach($projectCategories as $category)
                                @php $slug = Str::slug($category->title); @endphp
                                <a href="{{ route('portfolios', ['category' => $slug]) }}" class="tab-btn {{ $categorySlug === $slug ? 'active' : '' }}" data-filter="{{ $slug }}">{{ $category->title }}</a>
                            @endforeach
                            <div class="tab-indicator"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="card flex-column all">

                    <div class="grid-b">
                        @foreach($projects as $project)
                        @php $categoryClass = $project->category ? Str::slug($project->category->title) : 'uncategorized'; @endphp
                        <div class="item {{ $categoryClass }}">

                            <div class="project-box relative">
                                <a href="{{ route('portfolio.show', $project->slug) }}" class="text-d-none">
                                    <div class="hover-box relative">
                                        <div class="hover-img">
                                           @if($project->feature_img) <img src="{{ asset('storage/'.$project->feature_img->url) }}" class="w-100 h-100 img-cover" alt="Image"> @endif
                                        </div>
                                        <div class="btn-box d-flex ">
                                            <span href="{{ route('portfolio.show', $project->slug) }}" class="btn btn-primary --outline">
                                                <span>
                                                    Get in touch with us
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
                                    <div class="norm-box">
                                        <div class="proj-img">
                                         @if($project->feature_img)   <img src="{{ asset('storage/'.$project->feature_img->url) }}" class="w-100 h-100 img-cover" alt="Image"> @endif
                                        </div>
                                        <div class="proj-text">
                                            <h6 class="font-18 primary-font text-uppercase line line-1">{{ $project->title }}
                                            </h6>
                                            <p class="m-0 font-16 text-uppercase line line-1"><img src="{{ asset('frontend/images/location.svg') }}"
                                                    alt="Icon"> {{ $project->location }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div>
                       @endforeach
                    </div>

                    <div class="pagination mt-4">
                        {{ $projects->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
@endsection