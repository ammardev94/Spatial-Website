@extends('front.layouts.master')
@section('title', $service->title)
@section('content')

    <main id="inner-services">


        <section class="banner overlay relative">
            <img src="{{ asset('storage/'.$service->heroImage->url) }}" class="w-100 img-cover" alt="Banner Image">
            <div class="banner-content">
                <div class="container">
                    <div class="banner-head d-flex gap-35 flex-column">
                        <h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">
                            {!! $service->hero_title !!}
                        </h1>
                        <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">
                            <a href="{{ $service->button_link }}" @if($service->open_in_new_tab) target="_Blank" @endif class="btn btn-primary --outline">
                                <span>
                                    {!! $service->button_text !!}
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
        

        @foreach($service->sections as $sec)
        @if($sec->type=='text')
        <section class="sustain-with-slider o-hidden innerservice-with-slider">
            <div class="container">
                <div class="sec-heading">

                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-left">
                            <h2 class="font-64 m-0 fc-secondary  text-uppercase fw-normal wow fadeInLeftBig" data-wow-delay="150ms">{{ $sec->title }}
                            </h2>
                        </div>
                        <div class="col-md-6 wow fadeInRighttBig" data-wow-delay="150ms">
                            <div class="btn-box justify-content-center justify-content-md-end  d-none d-md-flex wow fadeInUpBig" data-wow-delay="150ms">
                                <button class="btn open-popup-1 btn-primary --outline --dark">
                                    <span>
                                        book an appointment
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"
                                        fill="none">
                                        <path
                                            d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                            stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="esg-slider swiper wow fadeInUpBig" data-wow-delay="200ms">
                    <div class="swiper-wrapper">

                        @foreach($sec->items as $key=>$item)

                        <div class="swiper-slide">
                            <div class="esg-box d-flex flex-column gap-20">
                                <div class="esg-img">
                                    <img src="{{ asset('storage/'.$item->image->url) }}" class="w-100 h-100 img-cover" alt="Image">
                                </div>
                                <div class="esg-content d-flex flex-column gap-20">
                                    <h4
                                        class="primary-font font-32 m-0 text-uppercase d-flex align-items-center justify-content-between gap-15 fc-black">

                                        {{ $item->title }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="84" height="8" viewBox="0 0 84 8"
                                            fill="none">
                                            <path
                                                d="M83.3536 4.03555C83.5488 3.84029 83.5488 3.52371 83.3536 3.32845L80.1716 0.146466C79.9763 -0.0487963 79.6597 -0.0487962 79.4645 0.146466C79.2692 0.341728 79.2692 0.658311 79.4645 0.853573L82.2929 3.682L79.4645 6.51043C79.2692 6.70569 79.2692 7.02227 79.4645 7.21753C79.6597 7.4128 79.9763 7.4128 80.1716 7.21753L83.3536 4.03555ZM0 3.68201L4.37114e-08 4.18201L83 4.182L83 3.682L83 3.182L-4.37114e-08 3.18201L0 3.68201Z"
                                                fill="black" />
                                        </svg>
                                    </h4>
                                    <p class="m-0">{!! $item->description !!}</p>

                                    <div class="number">
                                        <h3 class="primary-font fw-normal">0{{ $key+1; }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
                
                <div class="btn-box justify-content-center justify-content-md-center mt-5 d-flex d-md-none wow fadeInUpBig"
                    data-wow-delay="150ms">
                    <button class="btn open-popup-1 btn-primary --outline --dark">
                        <span>
                            book an appointment
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                            <path
                                d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                
                
            </div>
        </section>
        @endif
        
        @endforeach

        
        @if($service->sections->whereIn('type', ['list-left','list-right'])->count())
        <section class="left-right-box o-hidden is-left-right-box inner-service-left-right">
            @foreach($service->sections as $sec)
            @if($sec->type=='list-left')
            <div class="rightimgtext  lefttimgtext forJqueryOnly leftBoxforJqueryOnly">
                <div class="container">
                    <div class="row align-items-center no-gutters">

                        <div class="col-md-6">
                            <div class="imgbox wow fadeInLeftBig" data-wow-delay="150ms">
                                <img src="{{ asset('storage/'.$sec->image->url) }}" class="w-100 h-100 img-cover" style="object-position: top;"
                                    alt="Image">
                            </div>
                        </div>

                        <div class="col-md-6 wow fadeInRightBig" data-wow-delay="150ms">
                            <div class="content-box d-flex flex-column gap-30 gap-md-70">
                                <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">
                                    {{ $sec->title }}
                                </h4>
                                <ul class="list-unstyled work-list d-flex flex-column gap-50 m-0">
                                    @foreach($sec->items as $item)
                                    <li class="d-flex">
                                        <div class="arrow-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="84" height="8"
                                                viewBox="0 0 84 8" fill="none">
                                                <path
                                                    d="M83.3536 4.03543C83.5488 3.84017 83.5488 3.52359 83.3536 3.32832L80.1716 0.146344C79.9763 -0.0489183 79.6597 -0.0489183 79.4645 0.146344C79.2692 0.341606 79.2692 0.658189 79.4645 0.853451L82.2929 3.68188L79.4645 6.5103C79.2692 6.70557 79.2692 7.02215 79.4645 7.21741C79.6597 7.41267 79.9763 7.41267 80.1716 7.21741L83.3536 4.03543ZM0 3.68188L4.37114e-08 4.18188L83 4.18188L83 3.68188L83 3.18188L-4.37114e-08 3.18188L0 3.68188Z"
                                                    fill="black" />
                                            </svg>
                                        </div>
                                        <div class="work-text">
                                            <h6 class="text-uppercase font-20 primary-font">{{ $item->title }}</h6>
                                            <p class="m-0">
                                                {!! $item->description !!}
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif
            @if($sec->type=='list-right')
            <div class="rightimgtext forJqueryOnly" >
                <div class="container">
                    <div class="row align-items-center no-gutters">
                        <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="150ms">
                            <div class="content-box d-flex flex-column gap-30 gap-md-70">
                                <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">
                                    {{ $sec->title }}
                                </h4>
                                <ul class="list-unstyled work-list d-flex flex-column gap-50 m-0">
                                    @foreach($sec->items as $item)
                                    <li class="d-flex">
                                        <div class="arrow-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="84" height="8"
                                                viewBox="0 0 84 8" fill="none">
                                                <path
                                                    d="M83.3536 4.03543C83.5488 3.84017 83.5488 3.52359 83.3536 3.32832L80.1716 0.146344C79.9763 -0.0489183 79.6597 -0.0489183 79.4645 0.146344C79.2692 0.341606 79.2692 0.658189 79.4645 0.853451L82.2929 3.68188L79.4645 6.5103C79.2692 6.70557 79.2692 7.02215 79.4645 7.21741C79.6597 7.41267 79.9763 7.41267 80.1716 7.21741L83.3536 4.03543ZM0 3.68188L4.37114e-08 4.18188L83 4.18188L83 3.68188L83 3.18188L-4.37114e-08 3.18188L0 3.68188Z"
                                                    fill="black" />
                                            </svg>
                                        </div>
                                        <div class="work-text">
                                            <h6 class="text-uppercase font-20 primary-font">{{ $item->title }}
                                            </h6>
                                            <p class="m-0">
                                                {!! $item->description !!}
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>

                                <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="150ms">
                                    <button class="btn open-popup-1 btn-primary --outline --dark">
                                        <span>
                                            book an appointment
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                            viewBox="0 0 21 10" fill="none">
                                            <path
                                                d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"
                                                stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeInRightBig" data-wow-delay="150ms">
                            <div class="imgbox">
                                <img src="{{ asset('storage/' . $sec->image->url) }}" class="w-100 h-100 img-cover" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach





        </section>
        @endif
        @foreach($service->sections as $sec)
        @if($sec->type=='grid')


        <section class="sustain-with-slider sec-padding">
            <div class="container">
                <div class="sec-heading wow fadeInUpBig">

                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h2 class="font-64 m-0 fc-secondary  text-uppercase fw-normal">{{ $sec->title }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="property-slider swiper wow fadeInUpBig" data-wow-delay="150ms">
                    <div class="swiper-wrapper">
                    @foreach($sec->items as $key=>$item)
                        <div class="swiper-slide">
                            <div class="esg-box d-flex flex-column gap-20">
                                <div class="esg-img">
                                    <img src="{{ asset('storage/' . $item->image->url) }}" class="w-100 h-100 img-cover" alt="Image">
                                </div>
                                <div class="esg-content d-flex flex-column gap-10">
                                    <h4 class="primary-font font-20 fw-normal m-0 text-uppercase fc-black">{{ $item->title }}</h4>
                                    <p class="m-0">
                                        {!! $item->description !!}
                                    </p>
                                    <div class="number">
                                        <h3 class="primary-font m-0 font-20 fw-normal">0{{ $key+1 }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section> 

        @endif

        @endforeach
        <!-- Related Portfolio Start -->

        <section class="related-portfolio bg-primary sec-padding">
            <div class="container">

                <div class="row align-items-center" style="gap:0;">
                    <div class="col-md-6">
                        <div class="sec-heading wow text-center text-md-left wow fadeInLeftBig" data-wow-delay="150ms">
                            <h2 class="font-64 m-0 font-light-grey  text-uppercase fw-normal">
                                You might like these!
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="btn-box justify-content-center justify-content-md-end d-none d-md-flex wow fadeInRightBig" data-wow-delay="150ms">
                            <a href="#" class="btn btn-primary --outline">
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

                <div class="related-slider swiper wow fadeInUpBig" data-wow-delay="150ms">
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
                
                <div class="btn-box justify-content-center mt-5 justify-content-md-center d-flex d-md-none wow fadeInUpBig"
                    data-wow-delay="150ms">
                    <a href="#" class="btn btn-primary --outline">
                        <span>
                            See all case studies
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
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
                                Get in touch with us to, inquire about projects!
                            </h1>
                            <p class="m-0 font-18">
                                Thank you for your interest in Spatial. Please complete the form below to help us
                                understand your requirements. A member of our team will be in touch shortly.
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
    <!-- Popup -->
    <div class="popup-overlay customPopup-1">
        <div class="popup-box">

            <button class="close-popup">&times;</button>
            <div class="inquire-popup d-flex flex-column gap-15">
                <h3 class="font-64 fw-normal text-uppercase fc-secondary">Get in touch with us today!</h3>
                @php
                            $submitText = $submitText ?? 'Submit request';
                        @endphp
                        
                        
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


@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            // check if work-list exists
            const allLists = document.querySelectorAll(".work-list");

            // agar page me class nahi hai to JS run hi nahi hoga
            if (!allLists.length) return;

            // loop through all lists
            allLists.forEach((list) => {

                const items = list.querySelectorAll("li");

                // agar list me items nahi hain to skip
                if (!items.length) return;

                let current = 0;

                // first active
                items[current].classList.add("active");

                setInterval(() => {

                    // remove all active classes
                    items.forEach((item) => {
                        item.classList.remove("active");
                    });

                    // add active class
                    items[current].classList.add("active");

                    // next item
                    current++;

                    // restart
                    if (current >= items.length) {
                        current = 0;
                    }

                }, 2000);

            });

        });
    </script>

    <script>
        // Popup 1
        const popup1 = document.querySelector('.customPopup-1');

        if (popup1) {
            const openBtns1 = document.querySelectorAll('.open-popup-1');
            const closeBtn1 = popup1.querySelector('.close-popup');

            // Open Popup
            openBtns1.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    popup1.classList.add('active');
                });
            });

            // Close Popup on Close Button
            if (closeBtn1) {
                closeBtn1.addEventListener('click', function () {
                    popup1.classList.remove('active');
                });
            }

            // Close Popup on Outside Click
            popup1.addEventListener('click', function (e) {
                if (e.target === popup1) {
                    popup1.classList.remove('active');
                }
            });

            // Close Popup on ESC Key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    popup1.classList.remove('active');
                }
            });
        }
    </script>
@endpush