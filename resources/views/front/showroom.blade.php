@extends('front.layouts.master')
@section('title', 'Showroom')
@section('content')
<main id="showroom">

    <section class="banner relative">
        @php
            $bannerFile = $page?->pageFiles->firstWhere('ref_point', 'banner_image');
            $bannerMeta = $page?->pageMetas->firstWhere('ref_key', 'banner_title')?->ref_value;
            $bannerBtnText = $page?->pageMetas->firstWhere('ref_key', 'banner_button_text')?->ref_value;
            $bannerBtnLink = $page?->pageMetas->firstWhere('ref_key', 'banner_button_link')?->ref_value ?? '#';
        @endphp

        <img src="{{ $bannerFile ? asset('storage/'.$bannerFile->path) : asset('images/showroom.jpg') }}" class="w-100 img-cover" alt="{{ $bannerFile?->alt_text ?? 'Banner Image' }}">
        <div class="banner-content">
            <div class="container">
                <div class="banner-head d-flex gap-35 flex-column">
                    <h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">
                        {!! $bannerMeta !!}
                    </h1>
                    <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">
                        <a href="{{ $bannerBtnLink }}" class="btn btn-primary --outline">
                            <span>
                                {{ $bannerBtnText }}
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

    @php
        $section1Title = $page?->pageMetas->firstWhere('ref_key', 'section_1_title')?->ref_value;
    @endphp
    <section class="material-finishes o-hidden sec-padding --medium">
        <div class="container">
            <div class="sec-heading">

                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left">
                        <h2 class="font-64 m-0 fc-secondary  text-uppercase fw-normal wow fadeInLeftBig" data-wow-delay="150ms">
                            {{ $section1Title }}
                        </h2>
                    </div>
                    <div class="col-md-6">
                        <div class="btn-box justify-content-end d-none d-md-flex wow fadeInRightBig" data-wow-delay="150ms">
                            <a href="{{ route('contact') }}" class="btn btn-primary --outline --dark">
                                <span>
                                    Get in touch
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
        </div>
        <div class="mms" >
        <div class="mv-slide forJqueryOnly wow fadeInUpBig" data-wow-delay="200ms">
            <div class="container">
                <div class="material-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($materials as $m)
                        <div class="swiper-slide">
                            <div class="material-box d-flex flex-column gap-14" data-popup="popup{{ $m->id }}">
                                <div class="material-img">
                                    <img src="{{ asset('storage/' . $m->feature_img->url) }}" class="w-100 h-100 img-cover" alt="Image">
                                </div>
                                <div class="material-content d-flex flex-column gap-5">
                                    <h5 class="primary-font m-0 text-uppercase font-18 fc-black">{{ $m->title }}</h5>
                                    <p class="m-0 line line-2">{{ strip_tags($m->description) }}</p>
                                    <div class="arrow ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                            viewBox="0 0 21 10" fill="none">
                                            <path
                                                d="M20.5 4.65377L0.500366 4.65376M20.5 4.65377L16.5 8.80762M20.5 4.65377L16.5 0.499927"
                                                stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="btn-box justify-content-center mt-5 d-flex d-md-none wow fadeInUpBig" data-wow-delay="150ms">
                            <a href="{{ route('contact') }}" class="btn btn-primary --outline --dark">
                                <span>
                                    Get in touch
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
    </section>

    @php
        $videoFile      = $page?->pageFiles->firstWhere('ref_point', 'section_video');
        $videoHeading   = $page?->pageMetas->firstWhere('ref_key', 'section_video_title')?->ref_value;
        $videoBtnText   = $page?->pageMetas->firstWhere('ref_key', 'section_video_button_text')?->ref_value;
        $videoBtnLink   = $page?->pageMetas->firstWhere('ref_key', 'section_video_button_link')?->ref_value ?? route('contact');
    @endphp
    <section class="spatial-showroom-video wow fadeInUpBig" data-wow-delay="150ms">
        <div class="container-fluid">
            <div class="sh-video-box relative">
                <video class="bg-video w-100 img-cover" muted autoplay playsinline>
                    <source src="{{ $videoFile ? asset('storage/'.$videoFile->path) : asset('video/showroom-video.mp4') }}" type="video/mp4">
                </video>
                <div class="showroom-content d-flex flex-column justify-content-center gap-22 text-center">
                    <h2 class="fw-normal m-0 text-uppercase fc-white font-64 wow fadeInUpBig">
                        {{ $videoHeading ?? 'Inside our showroom' }}
                    </h2>
                    <div class="btn-box d-flex justify-content-center wow fadeInUpBig" data-wow-delay="300ms">
                        <a href="{{ $videoBtnLink }}" class="btn btn-primary --outline">
                            <span>
                                {{ $videoBtnText ?? 'book an appointment today' }}
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

        <section class="contact-main sec-padding --small">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 wow fadeInLeftBig" data-wow-delay="150ms">
                    <div class="contact-content">
                        <h1 class="font-64 text-uppercase fw-normal">
                            {{ optional($page->pageMetas->where('ref_key', 'contact_title')->first())->ref_value }}
                        </h1>
                        <p class="m-0 font-18">
                            {{ optional($page->pageMetas->where('ref_key', 'contact_description')->first())->ref_value }}
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
                                    <a href="{{ $generalInfo->google_map_link ?? '#' }}" target="_Blank" class="primary-font font-18">{{ $generalInfo->address }}</a>
                                </div>
                            </li>

                        </ul>
                        <div class="social-share d-flex flex-column gap-15">
                            <span class="fc-black font-18 text-uppercase primary-font">Socials</span>
                            <ul class="list-unstyled d-flex align-items-center gap-7 m-0">
                                @if($generalInfo?->instagram_link)
									<li><a href="{{ $generalInfo->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
								@endif
								@if($generalInfo?->facebook_link)
									<li><a href="{{ $generalInfo->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								@endif
								@if($generalInfo?->ticktok_link)
									<li><a href="{{ $generalInfo->ticktok_link }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>
								@endif
                            </ul>
                        </div>
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
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="info@youremal.com" required>
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
                                            <option value="Design and luxury fit-out" {{ old('service') === 'Design and luxury fit-out' ? 'selected' : '' }}>Design and luxury fit-out</option>
                                            <option value="Renovate to sell" {{ old('service') === 'Renovate to sell' ? 'selected' : '' }}>Renovate to sell</option>
                                            <option value="Fit out and refurbishment" {{ old('service') === 'Fit out and refurbishment' ? 'selected' : '' }}>Fit out and refurbishment</option>
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


    <!-- Gallery Start -->

    @php
        $galleryTitle   = $page?->pageMetas->firstWhere('ref_key', 'related_insights_title')?->ref_value;
        $galleryBtnText = $page?->pageMetas->firstWhere('ref_key', 'related_insights_button_text')?->ref_value;
        $galleryBtnLink = $page?->pageMetas->firstWhere('ref_key', 'related_insights_button_link')?->ref_value ?? route('insights');
    @endphp
    <section class="gallery bg-primary">
        <div class="sec-padding --large d-flex flex-column gap-45 gap-md-65">
            <div class="container">
                <div class="sec-heading d-flex flex-column gap-39 text-center wow fadeInUpBig">
                    <h2 class="font-64 m-0 font-light-grey  text-uppercase fw-normal">
                        {!! $galleryTitle ?? 'Follow Spatial for the Latest <br> Projects and Insights' !!}
                    </h2>
                    <div class="btn-box justify-content-center d-flex wow fadeInUpBig" data-wow-delay="150ms">
                        <a href="{{ $galleryBtnLink }}" class="btn btn-primary --outline">
                            <span>
                                {{ $galleryBtnText ?? 'Follow us on instagram' }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="instagram" width="18" height="18"
                                viewBox="0 0 18 18" fill="none">
                                <g clip-path="url(#clip0_17_142)">
                                    <path
                                        d="M5.29395 0.360352C9.66419 0.15901 12.1509 0.246623 13.6768 0.515625C14.4362 0.649546 14.9488 0.827154 15.333 1.03027C15.7152 1.23241 15.9832 1.46628 16.25 1.73242C16.9016 2.38327 17.3341 3.11229 17.5615 4.67285C17.7629 6.05506 17.8004 8.07285 17.6846 11.2344L17.626 12.6611C17.585 13.5879 17.4376 14.2102 17.2275 14.75C16.9284 15.5159 16.533 16.0878 15.9971 16.5166C15.4594 16.9467 14.7633 17.2462 13.8428 17.4424C11.9886 17.8374 9.28992 17.8 5.29395 17.6191C4.36388 17.5764 3.74102 17.431 3.2002 17.2207H3.19922C2.04428 16.7735 1.1683 15.8951 0.722656 14.751C0.562725 14.3405 0.448127 13.6102 0.373047 12.7021C0.298741 11.8034 0.264848 10.7586 0.253906 9.73828C0.237506 8.2084 0.273393 6.74032 0.300781 5.91211L0.323242 5.31836C0.387942 3.90301 0.730088 2.69826 1.69824 1.73242L1.69922 1.7334C2.66441 0.772291 3.86383 0.424881 5.29395 0.360352ZM12.6055 1.46777C8.66705 1.29003 6.38828 1.30955 4.97852 1.48926C4.27128 1.57941 3.76975 1.71092 3.38184 1.88574C2.98945 2.06261 2.72478 2.27874 2.48633 2.5166C1.79553 3.2075 1.54546 4.07047 1.46191 4.97754L1.43555 5.36816C1.41163 5.89584 1.35558 7.77964 1.37207 9.70312C1.38032 10.6648 1.4068 11.64 1.46484 12.4619C1.52195 13.2705 1.61182 13.968 1.76074 14.3496C2.07269 15.1524 2.66242 15.7705 3.44336 16.1201L3.60254 16.1865C3.90081 16.302 4.32153 16.4323 5.02539 16.4902L5.34473 16.5107C9.30023 16.6922 11.7785 16.7133 13.3701 16.4209C14.1706 16.2738 14.7688 16.0437 15.2236 15.6982C15.6823 15.3498 15.975 14.8993 16.1895 14.3496C16.3218 14.0095 16.474 13.51 16.5146 12.6113C16.6955 8.68814 16.676 6.41495 16.4951 5.00684C16.4044 4.3004 16.2714 3.7991 16.0957 3.41113C15.918 3.01875 15.7014 2.75455 15.4629 2.5166V2.51562C14.6717 1.72847 13.6555 1.51526 12.6055 1.46777ZM8.97461 4.65332C11.3769 4.65332 13.3232 6.59454 13.3232 8.98926C13.3232 11.384 11.3768 13.3262 8.97461 13.3262C6.57258 13.326 4.62603 11.3839 4.62598 8.98926C4.62598 6.59466 6.57245 4.65352 8.97461 4.65332ZM8.97461 5.76172C7.18858 5.76192 5.74023 7.20706 5.74023 8.98926C5.74028 10.7722 7.18851 12.2176 8.97461 12.2178C10.7609 12.2178 12.2099 10.7723 12.21 8.98926C12.21 7.20694 10.7608 5.76172 8.97461 5.76172ZM13.7549 3.39844C14.2113 3.39844 14.5811 3.76817 14.5811 4.2207C14.581 4.67336 14.2112 5.04297 13.7549 5.04297C13.2991 5.04272 12.9307 4.67347 12.9307 4.2207C12.9307 3.76805 13.2989 3.39869 13.7549 3.39844Z"
                                        fill="white" stroke="#280000" stroke-width="0.5" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_17_142">
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container-fluid wow fadeInUpBig" data-wow-delay="300ms">
                <div class="gallery-slider swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="gallery-box">
                                <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'gallery_image_1')->first()?->path)}}" class="w-100 h-100 img-cover" alt="Gallery">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="gallery-box">
                                <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'gallery_image_2')->first()?->path)}}" class="w-100 h-100 img-cover" alt="Gallery">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="gallery-box">
                                <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'gallery_image_3')->first()?->path)}}" class="w-100 h-100 img-cover" alt="Gallery">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="gallery-box">
                                <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'gallery_image_4')->first()?->path)}}" class="w-100 h-100 img-cover" alt="Gallery">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="gallery-box">
                                <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'gallery_image_5')->first()?->path)}}" class="w-100 h-100 img-cover" alt="Gallery">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery End -->

</main>
    @foreach($materials as $m)
    <!-- POPUP 1 -->
    <div class="custom-popup" id="popup{{ $m->id }}">
        <div class="popup-inner container">
            <span class="close-popup primary-font">&times;</span>
            <h4 class="fw-normal font-64 text-uppercase">{{ $m->title }}</h4>

            <div class="swiper popupSwiper1">
                <div class="swiper-wrapper">

                    @foreach($m->gallery as $img)

                    <div class="swiper-slide">
                        <div class="m-popup-img">
                            <img src="{{ asset('storage/'.$img->url) }}" class="w-100 h-100 img-cover" alt="img">

                        </div>
                    </div>
                    @endforeach
                    

                </div>


            </div>


            <div class="swiper-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="17" viewBox="0 0 40 17" fill="none">
                    <path d="M39.5 8.5L0.5 8.49998M39.5 8.5L31.6999 16.5M39.5 8.5L31.6999 0.499997" stroke="#1E1E1E"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="swiper-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="17" viewBox="0 0 40 17" fill="none">
                    <path d="M0.500001 8.5L39.5 8.49998M0.500001 8.5L8.30014 16.5M0.500001 8.5L8.30014 0.499997"
                        stroke="#1E1E1E" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <!-- Dots -->
            <div class="swiper-pagination"></div>
        </div>

    </div>
    @endforeach
@endsection
@push('scripts')
    <script>
        // POPUP SWIPERS — initialise one swiper per popup dynamically
        document.querySelectorAll('.custom-popup').forEach(function(popup) {
            var popupId = '#' + popup.id;
            new Swiper(popup.querySelector('.swiper'), {
                navigation: {
                    nextEl: popupId + ' .swiper-button-next',
                    prevEl: popupId + ' .swiper-button-prev',
                },
                pagination: {
                    el: popupId + ' .swiper-pagination',
                    clickable: true,
                },
            });
        });


        // OPEN POPUP
        document.querySelectorAll(".material-box").forEach(card => {

            card.addEventListener("click", function () {

                let popupID = this.getAttribute("data-popup");

                document.getElementById(popupID).classList.add("active");

                document.body.style.overflow = "hidden";
            });

        });

        // CLOSE POPUP
        document.querySelectorAll(".close-popup").forEach(closeBtn => {

            closeBtn.addEventListener("click", function () {

                this.closest(".custom-popup").classList.remove("active");

                document.body.style.overflow = "";
            });

        });

        // CLOSE ON OUTSIDE CLICK
        document.querySelectorAll(".custom-popup").forEach(popup => {

            popup.addEventListener("click", function (e) {

                if (e.target === this) {
                    this.classList.remove("active");
                    document.body.style.overflow = "";
                }

            });

        });


        const video = document.querySelector(".bg-video");
        const content = document.querySelector(".showroom-content");

        // when video ends
        video.addEventListener("ended", () => {

            content.classList.add("active");

        });
    </script>
@endpush
