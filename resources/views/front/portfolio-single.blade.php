@extends('front.layouts.master')
@section('title', $project->title)
@section('header-class', 'header-dark')
@section('content')

<style>

header.sticky {
  background: rgb(255 255 255 / 61%);
    
}    
    
</style>
<main id="inner-portfolio">
    @php
        $bannerUrl = optional($project->main_img)->url
            ? asset('storage/' . $project->main_img->url)
            : asset('frontend/images/inner-port-bg.jpg');
        $overview = is_array($project->overview)
            ? $project->overview
            : (json_decode($project->overview, true) ?: []);
    @endphp
    <section class="bannerimg">
        <div class="container">
            <div class="port-banner wow fadeInUpBig">
                <img src="{{ $bannerUrl }}" class="w-100 h-100 img-cover" alt="{{ $project->title }}">
            </div>
        </div>
    </section>

    <section class="project-detail o-hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-7 wow fadeInLeftBig" data-wow-delay="150ms">
                    <div class="port-content-box d-flex flex-column gap-20">
                        <div class="port-title">
                            <h1 class="primary-font font-32 m-0 text-uppercase">{{ $project->title }}</h1>
                        </div>
                        <div class="port-location d-flex gap-10 align-items-center">
                            <div class="loation-img">
                                <img src="{{ asset('frontend/images/location.svg') }}" alt="Location" width="13" height="15.364">
                            </div>
                            <p class="m-0 text-uppercase font-18">{{ $project->location ?? 'Location not set' }}</p>
                        </div>
                        <div class="port-content font-16 text-justify">
                            {!! $project->description ?? 'No project description available.' !!}
                        </div>
                        <div class="btns d-flex gap-5">
                            <div class="btn-box d-flex ">
                                <a href="{{ asset('frontend/images/spatial-uae-brochure.pdf') }}" target="_blank" class="btn btn-primary --outline --dark" download>
                                    <span>download brochure</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                        viewBox="0 0 21 10" fill="none">
                                        <path
                                            d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
                                            stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>

                            <div class="btn-box d-flex ">
                                <a href="{{ route('contact') }}" class="btn btn-secondary --outline ">
                                    <span>Share On Linkedin</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                        viewBox="0 0 21 10" fill="none">
                                        <path
                                            d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
                                            stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 wow fadeInRightBig" data-wow-delay="150ms">
                    <div class="project-list d-flex flex-column gap-20">
                        <div class="overview-title">
                            <h2 class="font-32 primary-font m-0 text-uppercase">Project overview</h2>
                        </div>
                        <div class="overview-list">
                            <ul class="list-unstyled primary-font font-18 d-flex flex-column gap-20 text-uppercase m-0">
                                @forelse($overview as $item)
                                    @php
                                        $label = $item['label'] ?? $item['title'] ?? null;
                                        $value = $item['value'] ?? $item['description'] ?? null;
                                    @endphp
                                    @if($label && $value)
                                        <li class="d-flex">
                                            <span class="fc-black font-18">{{ $label }}</span>
                                            <p class="m-0 font-18">{{ $value }}</p>
                                        </li>
                                    @endif
                                @empty
                                    <li class="d-flex">
                                        <span class="fc-black font-18">Status</span>
                                        <p class="m-0 font-18">Complete</p>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="proj-gallery sec-padding --medium wow fadeInUpBig" data-wow-delay="150ms">
        <div class="container">
            <div class="grid">
                @forelse($project->gallery as $galleryImage)
                    <div class="item">
                        <a href="{{ asset('storage/' . $galleryImage->url) }}" data-fancybox="gallery">
                            <img src="{{ asset('storage/' . $galleryImage->url) }}" class="w-100 h-100 img-cover" alt="Gallery">
                        </a>
                    </div>
                @empty
                    <div class="item">
                        <a href="{{ asset('frontend/images/inner-port-bg.jpg') }}" data-fancybox="gallery">
                            <img src="{{ asset('frontend/images/inner-port-bg.jpg') }}" class="w-100 h-100 img-cover" alt="Gallery">
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Related Portfolio Start -->

    <section class="related-portfolio bg-primary sec-padding">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="sec-heading wow fadeInLeftBig text-center text-md-left">
                        <h2 class="font-64 m-0 font-light-grey  text-uppercase fw-normal">
                            You might like these!
                        </h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-box justify-content-md-end justify-content-center d-flex wow fadeInRightBig" data-wow-delay="150ms">
                        <a href="{{ route('portfolios') }}" class="btn btn-primary --outline">
                            <span>
                                See all case studies
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"
                                fill="none">
                                <path
                                    d="M20.5 4.65377L0.500366 4.65376M20.5 4.65377L16.5 8.80762M20.5 4.65377L16.5 0.499927"
                                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="related-slider swiper wow fadeInUpBig" data-wow-delay="200ms">
                <div class="swiper-wrapper ">
                    @forelse($relatedProjects as $relatedProject)
                        <div class="swiper-slide ">
                            <div class="card">
                                <div class="item">
                                    <div class="project-box relative">
                                        <a href="{{ route('portfolio.show', $relatedProject->slug) }}" class="text-d-none">
                                            <div class="hover-box relative">
                                                <div class="hover-img">
                                                    <img src="{{ asset('storage/' . optional($relatedProject->feature_img)->url) }}" class="w-100 h-100 img-cover" alt="{{ $relatedProject->title }}">
                                                </div>
                                                <div class="btn-box d-flex ">
                                                    <span href="{{ route('portfolio.show', $relatedProject->slug) }}" class="btn btn-primary --outline">
                                                        <span>Get in touch with us</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                                                            <path d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="norm-box">
                                                <div class="proj-img">
                                                    <img src="{{ asset('storage/' . optional($relatedProject->feature_img)->url) }}" class="w-100 h-100 img-cover" alt="{{ $relatedProject->title }}">
                                                </div>
                                                <div class="proj-text">
                                                    <h6 class="font-18 primary-font fc-white text-uppercase">{{ $relatedProject->title }}</h6>
                                                    <p class="m-0 font-16 fc-white text-uppercase">
                                                        <img src="{{ asset('frontend/images/location.svg') }}" alt="Icon"> {{ $relatedProject->location ?? 'Location not set' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                       
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Related Portfolio End -->
        

</main>
@endsection