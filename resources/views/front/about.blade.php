@extends('front.layouts.master')
@section('title', 'About Us')
@section('content')
    <main id="about">

        <section class="banner relative">
            <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'banner_image')->first()?->path)}}" class="w-100 img-cover" alt="Banner Image">
            <div class="banner-content">
                <div class="container">
                    <div class="banner-head d-flex gap-35 flex-column">
                        <h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">
                            {!! $page->pageMetas->where('ref_key', 'banner_section_title')->first()?->ref_value !!}
                        </h1>
                        <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">
                            <a href="{!! $page->pageMetas->where('ref_key', 'banner_section_cta_link')->first()?->ref_value !!}" class="btn btn-primary --outline">
                                <span>
                                    {!! $page->pageMetas->where('ref_key', 'banner_section_cta_title')->first()?->ref_value !!}
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

        <!-- Responsile Start -->

        <section class="responsible o-hidden">
            <div class="row h-100 no-gutters">
                <div class="col-md-3 d-flex align-items-end">
                    <div class="response-left text-right">
                        <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_1_image_01')->first()?->path)}}" class="w-100 h-100 img-cover" id="response-right" alt="Response">
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="response-content" id="response-content">
                        <h2 class="font-64 fw-normal m-0 text-uppercase">{!! $page->pageMetas->where('ref_key', 'section_1_title')->first()?->ref_value !!}
                        </h2>
                        <div class="response-text">
                            <p class="m-0 font-18">
                                {!! $page->pageMetas->where('ref_key', 'section_1_description')->first()?->ref_value !!}
                            </p>
                        </div>
                        <div class="btn-box d-flex">
                            <a href="{!! $page->pageMetas->where('ref_key', 'section_1_cta_link')->first()?->ref_value !!}" class="btn btn-primary --outline --dark">
                                <span>
                                    {!! $page->pageMetas->where('ref_key', 'section_1_cta_text')->first()?->ref_value !!}
                                        
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
                <div class="col-md-3 ">
                    <div class="response-right">
                        <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_1_image_02')->first()?->path)}}" class="w-100 h-100 img-cover" id="response-left" alt="Response">
                    </div>
                </div>
            </div>
        </section>

        <!-- Responsile End -->

        <section class="property-transform">
            <div class="sec-heading wow fadeInUpBig">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h2 class="font-64 m-0 fc-secondary  text-uppercase fw-normal">
                                {!! $page->pageMetas->where('ref_key', 'section_2_title')->first()?->ref_value !!}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-sec wow fadeInUpBig" data-wow-delay="300ms">
                <div class="container-fluid">
                    <div class="property-transform-slider swiper">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="pt-box relative">
                                    <div class="pt-img">
                                        <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_2_tile_1_image')->first()?->path) }}" class="w-100 h-100 img-cover" alt="Image">
                                    </div>
                                    <div class="pt-content d-flex flex-column gap-19">
                                        <h3 class="primary-font text-uppercase fw-normal m-0 fc-white line line-2">{!! $page->pageMetas->where('ref_key', 'section_2_tile_1_title')->first()?->ref_value !!}</h3>
                                        <p class="m-0 fc-white">
                                            {!! $page->pageMetas->where('ref_key', 'section_2_tile_1_description')->first()?->ref_value !!}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="pt-box relative">
                                    <div class="pt-img">
                                        <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_2_tile_2_image')->first()?->path) }}" class="w-100 h-100 img-cover" alt="Image">
                                    </div>
                                    <div class="pt-content d-flex flex-column gap-19">
                                        <h3 class="primary-font text-uppercase fw-normal m-0 fc-white line line-2">
                                            {!! $page->pageMetas->where('ref_key', 'section_2_tile_2_title')->first()?->ref_value !!}
                                        </h3>
                                        <p class="m-0  fc-white">
                                            {!! $page->pageMetas->where('ref_key', 'section_2_tile_2_description')->first()?->ref_value !!}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="pt-box relative">
                                    <div class="pt-img">
                                        <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_2_tile_3_image')->first()?->path) }}" class="w-100 h-100 img-cover" alt="Image">
                                    </div>
                                    <div class="pt-content d-flex flex-column gap-19">
                                        <h3 class="primary-font text-uppercase fw-normal m-0 fc-white line line-2">
                                            {!! $page->pageMetas->where('ref_key', 'section_2_tile_3_title')->first()?->ref_value !!}
                                        </h3>
                                        <p class="m-0  fc-white">
                                            {!! $page->pageMetas->where('ref_key', 'section_2_tile_3_description')->first()?->ref_value !!}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="profesional-standards">
            <div class="container d-flex flex-column gap-39">

                <div class="sec-heading wow fadeInUpBig">

                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h2 class="font-64 m-0 fc-secondary  text-uppercase fw-normal">
                                {!! $page->pageMetas->where('ref_key', 'section_3_title')->first()?->ref_value !!}
                            </h2>
                        </div>
                        <div class="col-md-5">

                            <div class="text d-flex flex-column gap-27 wow fadeInUpBig" data-wow-delay="150ms">
                                <p class="m-0">
                                    {!! $page->pageMetas->where('ref_key', 'section_3_description')->first()?->ref_value !!}
                                </p>
                                <div class="btn-box  d-none d-md-flex wow fadeInUpBig" data-wow-delay="150ms">
                                    <a href="{!! $page->pageMetas->where('ref_key', 'section_3_cta_link')->first()?->ref_value !!}" class="btn btn-primary --outline --dark">
                                        <span>
                                            {!! $page->pageMetas->where('ref_key', 'section_3_cta_text')->first()?->ref_value !!}
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

                <div class="ps-img wow fadeInUpBig" data-wow-delay="400ms">
                    <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_3_image')->first()?->path) }}" class="w-100 h-100 img-cover" alt="Image">
                </div>

                <div class="ps-content wow fadeInUpBig" data-wow-delay="450ms">
                    <ul class="d-flex list-unstyled m-0 primary-font font-32 text-uppercase fc-black">
                        <li>
                            {!! $page->pageMetas->where('ref_key', 'section_3_tile_1_title')->first()?->ref_value !!}
                        </li>
                        <li>
                            {!! $page->pageMetas->where('ref_key', 'section_3_tile_2_title')->first()?->ref_value !!}
                        </li>
                        <li>
                            {!! $page->pageMetas->where('ref_key', 'section_3_tile_3_title')->first()?->ref_value !!}
                        </li>
                    </ul>
                </div>
                
                <div class="btn-box  d-flex d-md-none justify-content-center mt-4 wow fadeInUpBig" data-wow-delay="150ms">
                                    <a href="{!! $page->pageMetas->where('ref_key', 'section_3_cta_link')->first()?->ref_value !!}" class="btn btn-primary --outline --dark">
                                        <span>
                                            {!! $page->pageMetas->where('ref_key', 'section_3_cta_text')->first()?->ref_value !!}
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
        </section>

        <section class="property-group bg-primary sec-padding --xlarge">
            <div class="container">
                <div class="sec-heading wow fadeInUpBig">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h2 class="font-64 m-0 fc-white  text-uppercase fw-normal">
                                {!! $page->pageMetas->where('ref_key', 'section_4_title')->first()?->ref_value !!}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="pg-slider swiper wow fadeInUpBig" data-wow-delay="150ms">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="pg-box d-flex flex-column gap-16">
                                <div class="pg-img">
                                    <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_4_tile_1_image')->first()?->path) }}" class="w-100 h-100" alt="Logo">
                                </div>
                                <div class="tet">
                                    <p class="m-0 fc-white ">
                                        {!! $page->pageMetas->where('ref_key', 'section_4_tile_1_title')->first()?->ref_value !!}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pg-box d-flex flex-column gap-16">
                                <div class="pg-img">
                                    <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_4_tile_2_image')->first()?->path) }}" class="w-100 h-100" alt="Logo">
                                </div>
                                <div class="tet">
                                    <p class="m-0 fc-white ">
                                        {!! $page->pageMetas->where('ref_key', 'section_4_tile_2_title')->first()?->ref_value !!}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pg-box d-flex flex-column gap-16">
                                <div class="pg-img">
                                    <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_4_tile_3_image')->first()?->path) }}" class="w-100 h-100" alt="Logo">
                                </div>
                                <div class="tet">
                                    <p class="m-0 fc-white ">
                                        {!! $page->pageMetas->where('ref_key', 'section_4_tile_3_title')->first()?->ref_value !!}
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="btn-box d-flex justify-content-center wow fadeInUpBig" data-wow-delay="200ms">
                    <a href="{!! $page->pageMetas->where('ref_key', 'section_4_cta_link')->first()?->ref_value !!}" class="btn btn-primary --outline">
                        <span>
                            {!! $page->pageMetas->where('ref_key', 'section_4_cta_text')->first()?->ref_value !!}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                            <path
                                d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>

            </div>
        </section>
        
        <section class="contact-main sec-padding --small">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 wow fadeInLeftBig" data-wow-delay="150ms">
                        <div class="contact-content">
                            <h1 class="font-64 text-uppercase fw-normal">
                                {!! $page->pageMetas->where('ref_key', 'contact_title')->first()?->ref_value !!}
                            </h1>
                            <p class="m-0 font-18">
                                {!! $page->pageMetas->where('ref_key', 'contact_description')->first()?->ref_value !!}
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
                                        <a href="{{ $generalInfo->google_map_link ?? '#' }}" target="_blank" class="primary-font font-18">
    {!! $generalInfo->address !!}
</a>
                                    </div>
                                </li>

                            </ul>
         <!--                   <div class="social-share d-flex flex-column gap-15">-->
         <!--                       <span class="fc-black font-18 text-uppercase primary-font">Socials</span>-->
         <!--                       <ul class="list-unstyled d-flex align-items-center gap-7 m-0">-->
         <!--                           @if($generalInfo?->instagram_link)-->
									<!--<li><a href="{{ $generalInfo->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
    					<!--			@endif-->
    					<!--			@if($generalInfo?->facebook_link)-->
    					<!--				<li><a href="{{ $generalInfo->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
    					<!--			@endif-->
    					<!--			@if($generalInfo?->ticktok_link)-->
    					<!--				<li><a href="{{ $generalInfo->ticktok_link }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>-->
    					<!--			@endif-->
         <!--                       </ul>-->
         <!--                   </div>-->
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