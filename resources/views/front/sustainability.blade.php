@extends('front.layouts.master')
@section('title', 'Sustainability')
@section('content')
<main id="sustainability">
    @php
        $bannerImage = $page ? $page->pageFiles->where('ref_point', 'banner_image')->first() : null;
        $esg1Image = $page ? $page->pageFiles->where('ref_point', 'esg_1_image')->first() : null;
        $esg2Image = $page ? $page->pageFiles->where('ref_point', 'esg_2_image')->first() : null;
        $esg3Image = $page ? $page->pageFiles->where('ref_point', 'esg_3_image')->first() : null;
        $section1Image = $page ? $page->pageFiles->where('ref_point', 'section_1_image')->first() : null;
        $section2Image = $page ? $page->pageFiles->where('ref_point', 'section_2_image')->first() : null;
        $section3Image = $page ? $page->pageFiles->where('ref_point', 'section_3_image')->first() : null;
    @endphp

    <section class="banner relative">
        <img src="{{ asset('storage/'.$bannerImage->path) }}" class="w-100 img-cover" alt="Banner Image">
        <div class="banner-content">
            <div class="container">
                <div class="banner-head d-flex gap-35 flex-column">
                    <h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">
                        {!! optional($page->pageMetas->where('ref_key', 'banner_title')->first())->ref_value !!}
                    </h1>
                    <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">
                        <a href="{{ optional($page->pageMetas->where('ref_key', 'banner_button_link')->first())->ref_value }}" class="btn btn-primary --outline">
                            <span>
                                {{ optional($page->pageMetas->where('ref_key', 'banner_button_text')->first())->ref_value }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"
                                fill="none">
                                <path
                                    d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
                                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sustain-with-slider sec-padding">
        <div class="container">
            <div class="sec-heading">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left">
                        <h2 class="font-64 m-0 fc-secondary text-uppercase fw-normal wow fadeInLeftBig" data-wow-delay="200ms">
                            {{ optional($page->pageMetas->where('ref_key', 'esg_section_title')->first())->ref_value }}
                        </h2>
                    </div>
                    <div class="col-md-6">
                        <div class="btn-box justify-content-center justify-content-md-end  d-none d-md-flex wow fadeInRightBig" data-wow-delay="150ms">
                            <a href="{{ optional($page->pageMetas->where('ref_key', 'esg_button_link')->first())->ref_value }}" class="btn btn-primary --outline --dark">
                                <span>
                                    {{ optional($page->pageMetas->where('ref_key', 'esg_button_text')->first())->ref_value }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"
                                    fill="none">
                                    <path
                                        d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="esg-slider swiper wow fadeInUpBig" data-wow-delay="200ms">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="esg-box d-flex flex-column gap-20">
                            <div class="esg-img">
                                <img src="{{ asset('storage/'.optional($esg1Image)->path ?? 'images/esg-1.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                            </div>
                            <div class="esg-content d-flex flex-column gap-20">
                                <h4 class="primary-font font-32 m-0 text-uppercase fc-black line line-1">{{ optional($page->pageMetas->where('ref_key', 'esg_1_title')->first())->ref_value }}</h4>
                                <p class="m-0 line line-3">{{ optional($page->pageMetas->where('ref_key', 'esg_1_description')->first())->ref_value }}</p>
                                <div class="number">
                                    <h3 class="primary-font m-0 fw-normal">{{ optional($page->pageMetas->where('ref_key', 'esg_1_number')->first())->ref_value }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="esg-box d-flex flex-column gap-20">
                            <div class="esg-img">
                                <img src="{{ asset('storage/'.optional($esg2Image)->path ?? 'images/esg-2.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                            </div>
                            <div class="esg-content d-flex flex-column gap-20">
                                <h4 class="primary-font font-32 m-0 text-uppercase fc-black line line-1">{{ optional($page->pageMetas->where('ref_key', 'esg_2_title')->first())->ref_value }}</h4>
                                <p class="m-0 line line-3">{{ optional($page->pageMetas->where('ref_key', 'esg_2_description')->first())->ref_value }}</p>
                                <div class="number">
                                    <h3 class="primary-font m-0 fw-normal">{{ optional($page->pageMetas->where('ref_key', 'esg_2_number')->first())->ref_value }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="esg-box d-flex flex-column gap-20">
                            <div class="esg-img">
                                <img src="{{ asset('storage/'.optional($esg3Image)->path ?? 'images/esg-3.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                            </div>
                            <div class="esg-content d-flex flex-column gap-20">
                                <h4 class="primary-font font-32 m-0 text-uppercase fc-black line line-1">{{ optional($page->pageMetas->where('ref_key', 'esg_3_title')->first())->ref_value }}</h4>
                                <p class="m-0 line line-3">{{ optional($page->pageMetas->where('ref_key', 'esg_3_description')->first())->ref_value }}</p>
                                <div class="number">
                                    <h3 class="primary-font m-0 fw-normal">{{ optional($page->pageMetas->where('ref_key', 'esg_3_number')->first())->ref_value }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="btn-box justify-content-center justify-content-md-end d-flex d-md-none mt-5 wow fadeInUpBig"
                    data-wow-delay="150ms">
                     <a href="{{ optional($page->pageMetas->where('ref_key', 'esg_button_link')->first())->ref_value }}" class="btn btn-primary --outline --dark">
                                <span>
                                    {{ optional($page->pageMetas->where('ref_key', 'esg_button_text')->first())->ref_value }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"
                                    fill="none">
                                    <path
                                        d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                </div>
            
        </div>
    </section>

    <section class="left-right-box o-hidden left-right-sustain">
        <div class="rightimgtext forJqueryOnly">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="200ms">
                        <div class="content-box d-flex flex-column gap-25">
                            <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">{{ optional($page->pageMetas->where('ref_key', 'section_1_title')->first())->ref_value }}</h4>
                            <div class="text text-justify">
                                
                                    {!! optional($page->pageMetas->where('ref_key', 'section_1_description')->first())->ref_value !!}
                                
                            </div>
                            <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="150ms">
                                <a href="{{ optional($page->pageMetas->where('ref_key', 'section_1_button_link')->first())->ref_value }}" class="btn btn-primary --outline --dark">
                                    <span>
                                        {{ optional($page->pageMetas->where('ref_key', 'section_1_button_text')->first())->ref_value }}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                        viewBox="0 0 21 10" fill="none">
                                        <path
                                            d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                            stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRightBig" data-wow-delay="200ms">
                        <div class="imgbox">
                            <img src="{{ asset('storage/'.optional($section1Image)->path ?? 'images/lr-1.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rightimgtext lefttimgtext forJqueryOnly leftBoxforJqueryOnly">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="200ms">
                        <div class="imgbox">
                            <img src="{{ asset('storage/'.optional($section2Image)->path ?? 'images/lr-2.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRightBig" data-wow-delay="200ms">
                        <div class="content-box d-flex flex-column gap-25">
                            <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">{{ optional($page->pageMetas->where('ref_key', 'section_2_title')->first())->ref_value }}</h4>
                            <div class="text text-justify">
                               
                                    {!! optional($page->pageMetas->where('ref_key', 'section_2_description')->first())->ref_value !!}
                                
                            </div>
                            <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="150ms">
                                <a href="{{ optional($page->pageMetas->where('ref_key', 'section_2_button_link')->first())->ref_value }}" class="btn btn-primary --outline --dark">
                                    <span>
                                        {{ optional($page->pageMetas->where('ref_key', 'section_2_button_text')->first())->ref_value }}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                        viewBox="0 0 21 10" fill="none">
                                        <path
                                            d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                            stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rightimgtext forJqueryOnly">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="200ms">
                        <div class="content-box d-flex flex-column gap-25">
                            <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">{{ optional($page->pageMetas->where('ref_key', 'section_3_title')->first())->ref_value }}</h4>
                            <div class="text text-justify">
                              
                                    {!! optional($page->pageMetas->where('ref_key', 'section_3_description')->first())->ref_value !!}
                                
                            </div>
                            <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="150ms">
                                <a href="{{ optional($page->pageMetas->where('ref_key', 'section_3_button_link')->first())->ref_value }}" class="btn btn-primary --outline --dark">
                                    <span>
                                        {{ optional($page->pageMetas->where('ref_key', 'section_3_button_text')->first())->ref_value }}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                        viewBox="0 0 21 10" fill="none">
                                        <path
                                            d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                            stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRightBig" data-wow-delay="200ms">
                        <div class="imgbox">
                            <img src="{{ asset('storage/'.optional($section3Image)->path ?? 'images/lr-3.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Portfolio Start -->

    <section class="related-portfolio bg-primary sec-padding">
        <div class="container">
            <div class="row align-items-center" style="gap:0;">
                <div class="col-md-6">
                    <div class="sec-heading wow text-center text-md-left wow fadeInLeftBig" data-wow-delay="150ms">
                        <h2 class="font-64 m-0 font-light-grey text-uppercase fw-normal">
                            {{ optional($page->pageMetas->where('ref_key', 'related_portfolio_title')->first())->ref_value }}
                        </h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-box justify-content-center justify-content-md-end d-none d-md-flex wow fadeInRightBig" data-wow-delay="150ms">
                        <a href="{{ optional($page->pageMetas->where('ref_key', 'related_portfolio_button_link')->first())->ref_value }}" class="btn btn-primary --outline">
                            <span>
                                {{ optional($page->pageMetas->where('ref_key', 'related_portfolio_button_text')->first())->ref_value }}
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

            <div class="related-slider swiper wow fadeInUpBig" data-wow-delay="150ms">
                <div class="swiper-wrapper">
                    @foreach($projects as $project)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="item">
                                    <div class="project-box relative">
                                        <a href="{{ route('portfolio.show', $project->slug) }}" class="text-d-none">
                                            <div class="hover-box relative">
                                                <div class="hover-img">
                                                    <img src="{{ $project->feature_img ? asset('storage/'.$project->feature_img->url) : asset('images/pro-1.jpg') }}" class="w-100 h-100 img-cover" alt="{{ $project->title }}">
                                                </div>
                                                <div class="btn-box d-flex">
                                                    <span class="btn btn-primary --outline">
                                                        <span>
                                                            {{ optional($page->pageMetas->where('ref_key', 'banner_button_text')->first())->ref_value }}
                                                        </span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                                                            <path d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="norm-box">
                                                <div class="proj-img">
                                                    <img src="{{ $project->feature_img ? asset('storage/'.$project->feature_img->url) : asset('images/pro-1.jpg') }}" class="w-100 h-100 img-cover" alt="{{ $project->title }}">
                                                </div>
                                                <div class="proj-text">
                                                    <h6 class="font-18 primary-font fc-white text-uppercase">{{ $project->title }}</h6>
                                                    <p class="m-0 font-16 fc-white text-uppercase"><img src="{{ asset('frontend/images/location.svg') }}" alt="Icon"> {{ $project->location }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
              <div class="btn-box justify-content-center justify-content-md-end  mt-5 d-flex d-md-none wow fadeInUpBig"
                            data-wow-delay="150ms">
                            <a href="{{ optional($page->pageMetas->where('ref_key', 'related_portfolio_button_link')->first())->ref_value }}" class="btn btn-primary --outline">
                            <span>
                                {{ optional($page->pageMetas->where('ref_key', 'related_portfolio_button_text')->first())->ref_value }}
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
    </section>

    <!-- Related Portfolio End -->


    <section class="contact-main sec-padding --small">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 wow fadeInLeftBig" data-wow-delay="150ms">
                    <div class="contact-content">
                        <h1 class="font-64 text-uppercase fw-normal">
                            {!! optional($page->pageMetas->where('ref_key', 'contact_title')->first())->ref_value !!}
                        </h1>
                        <p class="m-0 font-18">
                            {!! optional($page->pageMetas->where('ref_key', 'contact_description')->first())->ref_value !!}
                        </p>
                        <ul
                            class="list-unstyled d-flex font-18 text-uppercase primary-font flex-column gap-35 mb-0 ">
                            <li class="d-flex flex-column gap-15">
                                <span class="fc-black">Contact information</span>
                                <div class="anchor d-flex gap-10">
                                    <a href="tel:+{{ $generalInfo->phone }}" class="primary-font font-18">{{ $generalInfo->phone }}</a>
                                    <a href="mailto:{{ $generalInfo->email }}"
                                        class="primary-font font-18">{{ $generalInfo->email }}</a>
                                </div>
                            </li>

                            <li class="d-flex flex-column gap-15">
                                <span class="fc-black">Office address</span>
                                <div class="anchor d-flex gap-10">
                                    <a href="{{ $generalInfo->google_map_link ?? '#' }}" target="_Blank" class="primary-font font-18"> {!! $generalInfo->address !!}</a>
                                </div>
                            </li>

                        </ul>
        <!--                <div class="social-share d-flex flex-column gap-15">-->
        <!--                    <span class="fc-black font-18 text-uppercase primary-font">Socials</span>-->
        <!--                    <ul class="list-unstyled d-flex align-items-center gap-7 m-0">-->
        <!--                        @if($generalInfo?->instagram_link)-->
								<!--	<li><a href="{{ $generalInfo->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
								<!--@endif-->
								<!--@if($generalInfo?->facebook_link)-->
								<!--	<li><a href="{{ $generalInfo->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
								<!--@endif-->
								<!--@if($generalInfo?->ticktok_link)-->
								<!--	<li><a href="{{ $generalInfo->ticktok_link }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>-->
								<!--@endif-->
        <!--                    </ul>-->
        <!--                </div>-->
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInRightBig" data-wow-delay="150ms">
                    <div class="contact-box d-flex flex-column gap-15">
                        <!--<form-->
                        <!--    class="updated-form d-flex flex-column gap-20 primary-font fc-secondary text-uppercase">-->
                        <!--    <div class="row no-gutters">-->
                        <!--        <div class="col-md-6">-->
                        <!--            <div class="input-wrapper d-flex flex-column">-->
                        <!--                <label>First Name</label>-->
                        <!--                <input type="text" placeholder="First Name">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-md-6">-->
                        <!--            <div class="input-wrapper d-flex flex-column">-->
                        <!--                <label>LAST Name</label>-->
                        <!--                <input type="text" placeholder="Last Name">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->

                        <!--    <div class="row no-gutters">-->
                        <!--        <div class="col-md-6">-->
                        <!--            <div class="input-wrapper d-flex flex-column">-->
                        <!--                <label>Email</label>-->
                        <!--                <input type="text" placeholder="info@youremal.com">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="col-md-6">-->
                        <!--            <div class="input-wrapper d-flex flex-column">-->
                        <!--                <label>phone number</label>-->
                        <!--                <input type="tel" placeholder="+971 55 9245456">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->

                        <!--    <div class="row no-gutters">-->
                        <!--        <div class="col-md-12">-->
                        <!--            <div class="input-wrapper d-flex flex-column">-->
                        <!--                <label>WHat service are you looking for?</label>-->
                        <!--                <select>-->
                        <!--                    <option>Fit out and refurbishment</option>-->
                        <!--                    <option>Fit out and refurbishment</option>-->
                        <!--                </select>-->
                        <!--                <img src="images/select-arrow.svg" alt="Arrow">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->

                        <!--    <div class="row no-gutters">-->
                        <!--        <div class="col-md-12">-->
                        <!--            <div class="input-wrapper d-flex flex-column">-->
                        <!--                <label>Do you have a budget range?</label>-->
                        <!--                <select>-->
                        <!--                    <option>500K - 1 million</option>-->
                        <!--                    <option>500K - 1 million</option>-->
                        <!--                </select>-->
                        <!--                <img src="images/select-arrow.svg" alt="Arrow">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->

                        <!--    <div class="row no-gutters">-->
                        <!--        <div class="col-md-12">-->
                        <!--            <div class="input-wrapper d-flex flex-column">-->
                        <!--                <label>Comments</label>-->
                        <!--                <textarea placeholder="Anything else you’d like to add"></textarea>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->

                        <!--    <div class="input-btn">-->
                        <!--        <button href="#" class="btn btn-secondary --outline ">-->
                        <!--            <span>-->
                        <!--                Submit request-->
                        <!--            </span>-->
                        <!--            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"-->
                        <!--                viewBox="0 0 21 10" fill="none">-->
                        <!--                <path-->
                        <!--                    d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"-->
                        <!--                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />-->
                        <!--            </svg>-->
                        <!--        </button>-->
                        <!--    </div>-->
                        <!--</form>-->
                        @php
                            $submitText = $submitText ?? 'Submit request';
                        @endphp
                        
                        @if (session('contact_success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('contact_success') }}
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('contact.store') }}"
                            class="updated-form d-flex flex-column gap-20 primary-font fc-secondary text-uppercase">
                            @csrf
                        
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="input-wrapper d-flex flex-column">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>
                                        @error('first_name')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrapper d-flex flex-column">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
                                        @error('last_name')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="input-wrapper d-flex flex-column">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="info@youremail.com" required>
                                        @error('email')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrapper d-flex flex-column">
                                        <label>Phone number</label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+971 55 9245456" required>
                                        @error('phone')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="input-wrapper d-flex flex-column">
                                        <label>What service are you looking for?</label>
                                        <select name="service">
                                            <option value="">Select service</option>
                                            <option value="Development and consultancy" {{ old('service') === 'Development and consultancy' ? 'selected' : '' }}>Development and consultancy</option>
                                            <!--<option value="Design and luxury fit-out" {{ old('service') === 'Design and luxury fit-out' ? 'selected' : '' }}>Design and luxury fit-out</option>-->
                                            <option value="Renovate to sell" {{ old('service') === 'Renovate to sell' ? 'selected' : '' }}>Renovate to sell</option>
                                            <option value="Fit out and refurbishment" {{ old('service') === 'Fit out and refurbishment' ? 'selected' : '' }}>Fit out and refurbishment</option>
                                            <option value="Other" {{ old('service') === 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        <img src="{{ asset('frontend/images/select-arrow.svg') }}" alt="Arrow">
                                        @error('service')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="input-wrapper d-flex flex-column">
                                        <label>Do you have a budget range?</label>
                                        <select name="budget">
                                            <option value="">Select budget</option>
                                            <option value="Below 500K" {{ old('budget') === 'Below 500K' ? 'selected' : '' }}>Below 500K</option>
                                            <option value="500K - 1 million" {{ old('budget') === '500K - 1 million' ? 'selected' : '' }}>500K - 1 million</option>
                                            <option value="1 million - 2 million" {{ old('budget') === '1 million - 2 million' ? 'selected' : '' }}>1 million - 2 million</option>
                                            <option value="2 million+" {{ old('budget') === '2 million+' ? 'selected' : '' }}>2 million+</option>
                                        </select>
                                        <img src="{{ asset('frontend/images/select-arrow.svg') }}" alt="Arrow">
                                        @error('budget')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <div class="input-wrapper d-flex flex-column">
                                        <label>Comments</label>
                                        <textarea name="comments" placeholder="Anything else you’d like to add">{{ old('comments') }}</textarea>
                                        @error('comments')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="input-btn">
                                <button type="submit" class="btn btn-secondary --outline ">
                                    <span>{{ $submitText }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                                        <path
                                            d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
                                            stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection