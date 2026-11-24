@extends('front.layouts.master')
@section('title', 'Partners')
@section('content')
<main id="partnership">
    
     <section class="banner relative">
        <img src="{{ asset('frontend/images/part-banner.png') }}" class="w-100 img-cover" alt="Banner Image">
        <div class="banner-content">
            <div class="container">
                <div class="banner-head d-flex gap-35 flex-column">
                    <h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">
                        Partner With Spatial
                    </h1>
                    <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">
                        <a href="{{ url('/contact') }}" class="btn btn-primary --outline">
                            <span>
                                Get in touch
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
    
    
       <section class="left-right-box o-hidden is-left-right-box inner-service-left-right">
            <div class="rightimgtext forJqueryOnly">
                <div class="container">
                    <div class="row align-items-center no-gutters">
                        <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="150ms">
                            <div class="content-box d-flex flex-column gap-25">
                                <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">Great outcomes start with great connections</h4>
                                <div class="text text-justify">
                                    <p>
                                        At Spatial, we believe the best opportunities come from trusted people. We're actively building a network of like-minded professionals and community connectors across the UAE who share our commitment to exceptional property outcomes. If that sounds like you, we'd love to talk.
                                    </p>
                                </div>
    
                                <div class="btn-box d-none wow fadeInUpBig" data-wow-delay="150ms">
                                    <button class="btn open-popup-1 btn-primary --outline --dark">
                                        <span>
                                                {{ $page->pageMetas->where('ref_key', 'section_1_button_text')->first()?->ref_value }}
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
                                <img src="{{ asset('frontend/images/sec-two.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="rightimgtext  lefttimgtext forJqueryOnly leftBoxforJqueryOnly">
                <div class="container">
                    <div class="row align-items-center no-gutters">

                        <div class="col-md-6">
                            <div class="imgbox wow fadeInLeftBig" data-wow-delay="150ms">
                                <img src="{{ asset('frontend/images/whoweare.jpg') }}" class="w-100 h-100 img-cover" style="object-position: top;"
                                    alt="Image">
                            </div>
                        </div>

                        <div class="col-md-6 wow fadeInRightBig" data-wow-delay="150ms">
                            <div class="content-box d-flex flex-column gap-30 gap-md-70">
                                <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">
                                    Who We Work With
                                </h4>
                                <ul class="list-unstyled work-list d-flex flex-column gap-50 m-0">
                                    
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
                                            <h6 class="text-uppercase font-20 primary-font">Real Estate Agents & Property Consultants </h6>
                                            <p class="m-0">
                                                You know your clients' needs better than anyone. When a property has potential beyond the transaction, Spatial can help you deliver more and strengthen the relationship you've already built
                                            </p>
                                        </div>
                                    </li>
                                    
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
                                            <h6 class="text-uppercase font-20 primary-font">Interior Designers & Architects </h6>
                                            <p class="m-0">
                                                Transformation is at the heart of what we both do. Partnering with Spatial means your clients have access to a full property transformation team from day one.
                                            </p>
                                        </div>
                                    </li>
                                    
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
                                            <h6 class="text-uppercase font-20 primary-font">Developers & Project Managers </h6>
                                            <p class="m-0">
                                               If you're working on sites or schemes where our expertise could add value, we're always open to a conversation about how we can collaborate.
                                            </p>
                                        </div>
                                    </li>
                                    
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
                                            <h6 class="text-uppercase font-20 primary-font">Community Connectors & Local Networks </h6>
                                            <p class="m-0">
                                               Sometimes the most valuable introductions come from the most unexpected places. If you're embedded in your community, whether through a residents' group, school network, business circle, want to hear from you too.
                                            </p>
                                        </div>
                                    </li>
                                 

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="rightimgtext forJqueryOnly" >
                <div class="container">
                    <div class="row align-items-center no-gutters">
                        <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="150ms">
                            <div class="content-box d-flex flex-column gap-30 gap-md-70">
                                <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">
                                    How It Works
                                </h4>
                                <ul class="list-unstyled work-list d-flex flex-column gap-50 m-0">
                                  
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
                                            <h6 class="text-uppercase font-20 primary-font">Make an Introduction
                                            </h6>
                                            <p class="m-0">
                                                Point us in the right direction. Whether it's a client, a contact, or a conversation you've had. If you think there's a fit with Spatial, that's all it takes to get started.
                                            </p>
                                        </div>
                                    </li>
                                    
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
                                            <h6 class="text-uppercase font-20 primary-font">We Handle Everything 
                                            </h6>
                                            <p class="m-0">
                                                We handle the entire journey with the care and professionalism your reputation deserves.
                                            </p>
                                        </div>
                                    </li>
                                    
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
                                            <h6 class="text-uppercase font-20 primary-font">You’re Rewarded  
                                            </h6>
                                            <p class="m-0">
                                               When an introduction leads to a successful outcome, we make sure it's worthwhile for you too. Get in touch to find out what a Spatial partnership looks like in practice.
                                            </p>
                                        </div>
                                    </li>
                                    

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
                                <img src="{{ asset('frontend/images/howitwork.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </section>
    
    
    <section class="sustain-with-slider sec-padding">
            <div class="container">
                <div class="sec-heading wow fadeInUpBig">

                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h2 class="font-64 m-0 fc-secondary  text-uppercase fw-normal">Why Partner With Spatial? 
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="property-slider swiper wow fadeInUpBig" data-wow-delay="150ms">
                    <div class="swiper-wrapper">
                   
                        <div class="swiper-slide">
                            <div class="esg-box d-flex flex-column gap-20">
                                <div class="esg-img">
                                    <img src="{{ asset('frontend/images/trnasactions.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                                </div>
                                <div class="esg-content d-flex flex-column gap-10">
                                    <h4 class="primary-font font-20 fw-normal m-0 text-uppercase fc-black">Built on trust, not transactions </h4>
                                    <p class="m-0">
                                        We're not looking for one-off referrals. We invest in long-term professional relationships with people who believe in what we're building. 
                                    </p>
                                    <div class="number">
                                        <h3 class="primary-font m-0 font-20 fw-normal">01</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                   
                   <div class="swiper-slide">
                            <div class="esg-box d-flex flex-column gap-20">
                                <div class="esg-img">
                                    <img src="{{ asset('frontend/images/client-safe.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                                </div>
                                <div class="esg-content d-flex flex-column gap-10">
                                    <h4 class="primary-font font-20 fw-normal m-0 text-uppercase fc-black">Your clients are in <br>safe hands </h4>
                                    <p class="m-0">
                                        We communicate clearly, act with integrity, and treat every introduction as a reflection of the person who made it. Your reputation matters to us as much as it does to you. 
                                    </p>
                                    <div class="number">
                                        <h3 class="primary-font m-0 font-20 fw-normal">02</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                   
                   <div class="swiper-slide">
                            <div class="esg-box d-flex flex-column gap-20">
                                <div class="esg-img">
                                    <img src="{{ asset('frontend/images/local.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                                </div>
                                <div class="esg-content d-flex flex-column gap-10">
                                    <h4 class="primary-font font-20 fw-normal m-0 text-uppercase fc-black">Local knowledge, backed by experience </h4>
                                    <p class="m-0">
                                       Spatial brings international expertise with genuine on-the-ground presence. Your clients benefit from a team that understands both the market and the opportunity.
                                    </p>
                                    <div class="number">
                                        <h3 class="primary-font m-0 font-20 fw-normal">03</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                   
                   <div class="swiper-slide">
                            <div class="esg-box d-flex flex-column gap-20">
                                <div class="esg-img">
                                    <img src="{{ asset('frontend/images/partnership-grows.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                                </div>
                                <div class="esg-content d-flex flex-column gap-10">
                                    <h4 class="primary-font font-20 fw-normal m-0 text-uppercase fc-black">A partnership that grows with you </h4>
                                    <p class="m-0">
                                        As our network expands, so do the opportunities for the people in it. The earlier you're part of the Spatial story, the more you stand to gain from where we're heading.
                                    </p>
                                    <div class="number">
                                        <h3 class="primary-font m-0 font-20 fw-normal">04</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                   
                    </div>
                </div>
            </div>
        </section> 
        
        
        <section class="responsible pb-0 o-hidden">
            <div class="row h-100 no-gutters">
                <div class="col-md-3 d-flex align-items-end">
                    <div class="response-left text-right">
                        <img src="{{ asset('frontend/images/built-1.jpg') }}" class="w-100 h-100 img-cover" id="response-right" alt="Response">
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="response-content" id="response-content">
                        <h2 class="font-64 fw-normal m-0 text-uppercase">We Don't Just Build Properties. We Build People.
                        </h2>
                        <div class="response-text">
                            <p class="font-18">
                               Some of the most valuable introductions come from people who simply know their community well, such as a friend thinking about buying, or a neighbour exploring investment options. 
                            </p>
                            
                            <p class="m-0 font-18">
                               And sometimes, that introduction is just the beginning. At Spatial, we invest in those who want to think bigger and add more to their career. If we see the drive and the ambition, we'll back you with real training, real opportunities, and a team that's genuinely committed to your growth.
                            </p>
                        </div>
                        <div class="btn-box d-flex">
                            <a href="{{ url('/contact') }}" class="btn btn-primary --outline --dark">
                                <span>
                                   Get in touch
                                        
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
                        <img src="{{ asset('frontend/images/built-2.jpg') }}" class="w-100 h-100 img-cover" id="response-left" alt="Response">
                    </div>
                </div>
            </div>
        </section>
        
        
        
         <section class="contact-main sec-padding --small">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 wow fadeInLeftBig" data-wow-delay="150ms">
                        <div class="contact-content">
                            <h1 class="font-64 text-uppercase fw-normal">
                                Let's Start a Conversation
                            </h1>
                            <p class="m-0 font-18">
                               Interested in exploring a partnership with Spatial? We'd love to hear from you. 
                               Fill in your details below and a member of our team will be in touch.
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