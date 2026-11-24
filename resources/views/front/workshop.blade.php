@extends('front.layouts.master')
@section('title', 'Workshop')
@section('content')
<main id="workshop">
    @php
        $page = \App\Models\Page::with('pageMetas', 'pageFiles')->where('slug', 'workshop')->first();
        $bannerImage = $page->pageFiles->where('ref_point', 'banner_image')->first();
        $section1Image = $page->pageFiles->where('ref_point', 'section_1_image')->first();
        $section2Image = $page->pageFiles->where('ref_point', 'section_2_image')->first();
        $section3Image = $page->pageFiles->where('ref_point', 'section_3_image')->first();
    @endphp
    <section class="banner relative">
        <img src="{{ $bannerImage ? asset('storage/'.$bannerImage->path) : asset('images/workshop.jpg') }}" class="w-100 img-cover" alt="Banner Image">
        <div class="banner-content">
            <div class="container">
                <div class="banner-head d-flex gap-35 flex-column">
                    <h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">
                        {!! $page->pageMetas->where('ref_key', 'banner_title')->first()?->ref_value !!}
                    </h1>
                    <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">
                        <a href="{{ $page->pageMetas->where('ref_key', 'banner_button_link')->first()?->ref_value }}" class="btn btn-primary --outline">
                            <span>
                                {{ $page->pageMetas->where('ref_key', 'banner_button_text')->first()?->ref_value }}
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

    <section class="left-right-box workshopleft-right-box">
        <div class="rightimgtext forJqueryOnly">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="150ms">
                        <div class="content-box d-flex flex-column gap-25">
                            <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">{{ $page->pageMetas->where('ref_key', 'section_1_title')->first()?->ref_value }}</h4>
                            <div class="text text-justify">
                                <p>
                                    {{ $page->pageMetas->where('ref_key', 'section_1_description')->first()?->ref_value }}
                                </p>
                            </div>

                            <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="150ms">
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
                                
                                <!--<a href="{{ $page->pageMetas->where('ref_key', 'section_1_button_link')->first()?->ref_value }}" class="btn btn-primary --outline --dark">-->
                                <!--    <span>-->
                                <!--        {{ $page->pageMetas->where('ref_key', 'section_1_button_text')->first()?->ref_value }}-->
                                <!--    </span>-->
                                <!--    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"-->
                                <!--        viewBox="0 0 21 10" fill="none">-->
                                <!--        <path-->
                                <!--            d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"-->
                                <!--            stroke="black" stroke-linecap="round" stroke-linejoin="round" />-->
                                <!--    </svg>-->
                                <!--</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRightBig" data-wow-delay="150ms">
                        <div class="imgbox">
                            <img src="{{ $section1Image ? asset('storage/'.$section1Image->path) : asset('images/lr-1.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="rightimgtext  lefttimgtext forJqueryOnly leftBoxforJqueryOnly">
            <div class="container">
                <div class="row align-items-center no-gutters">

                    <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="150ms">
                        <div class="imgbox">
                            <img src="{{ $section2Image ? asset('storage/'.$section2Image->path) : asset('images/ws-2.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                        </div>
                    </div>

                    <div class="col-md-6 wow fadeInRightBig" data-wow-delay="150ms">
                        <div class="content-box d-flex flex-column gap-25">
                            <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">
                                {{ $page->pageMetas->where('ref_key', 'section_2_title')->first()?->ref_value }}
                            </h4>
                            <div class="text text-justify">
                                <p>
                                    {{ $page->pageMetas->where('ref_key', 'section_2_description')->first()?->ref_value }}
                                </p>
                            </div>

                            <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="150ms">
                                <!--<a href="{{ $page->pageMetas->where('ref_key', 'section_2_button_link')->first()?->ref_value }}" class="btn btn-primary --outline --dark">-->
                                <!--    <span>-->
                                <!--        {{ $page->pageMetas->where('ref_key', 'section_2_button_text')->first()?->ref_value }}-->
                                <!--    </span>-->
                                <!--    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"-->
                                <!--        viewBox="0 0 21 10" fill="none">-->
                                <!--        <path-->
                                <!--            d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"-->
                                <!--            stroke="black" stroke-linecap="round" stroke-linejoin="round" />-->
                                <!--    </svg>-->
                                <!--</a>-->
                                
                                 <button class="btn open-popup-1 btn-primary --outline --dark">
                                    <span>
                                            {{ $page->pageMetas->where('ref_key', 'section_2_button_text')->first()?->ref_value }}
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

                </div>
            </div>
        </div>

        <div class="rightimgtext forJqueryOnly">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-md-6 wow fadeInLeftBig" data-wow-delay="150ms">
                        <div class="content-box d-flex flex-column gap-25">
                            <h4 class="m-0 font-64 fc-secondary text-uppercase fw-normal">
                                {{ $page->pageMetas->where('ref_key', 'section_3_title')->first()?->ref_value }}
                            </h4>
                            <div class="text text-justify">
                                <p>
                                    {{ $page->pageMetas->where('ref_key', 'section_3_description')->first()?->ref_value }}
                                </p>
                            </div>

                            <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="150ms">
                                <!--<a href="{{ $page->pageMetas->where('ref_key', 'section_3_button_link')->first()?->ref_value }}" class="btn btn-primary --outline --dark">-->
                                <!--    <span>-->
                                <!--        {{ $page->pageMetas->where('ref_key', 'section_3_button_text')->first()?->ref_value }}-->
                                <!--    </span>-->
                                <!--    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"-->
                                <!--        viewBox="0 0 21 10" fill="none">-->
                                <!--        <path-->
                                <!--            d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049"-->
                                <!--            stroke="black" stroke-linecap="round" stroke-linejoin="round" />-->
                                <!--    </svg>-->
                                <!--</a>-->
                                
                                 <button class="btn open-popup-1 btn-primary --outline --dark">
                                    <span>
                                           {{ $page->pageMetas->where('ref_key', 'section_3_button_text')->first()?->ref_value }}
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
                            <img src="{{ $section3Image ? asset('storage/'.$section3Image->path) : asset('images/ws-3.jpg') }}" class="w-100 h-100 img-cover" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- Property Investment Start -->

    <section class="properrty-investment properrty-investment-dark bg-primary">
        <div class="sec-padding --xlarge">
            <div class="container">
                <div class="sec-heading text-center wow fadeInUpBig">
                    <h2 class="font-64 m-0 text-uppercase fw-normal fc-white">
                        {{ $page->pageMetas->where('ref_key', 'property_section_title')->first()?->ref_value }}
                    </h2>
                </div>
                <div class="wow fadeInUpBig" data-wow-delay="150ms">
                    <div class="property-slider swiper ">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="pi-box">
                                    <h5 class="primary-font fc-white m-0">{{ $page->pageMetas->where('ref_key', 'slider_1_number')->first()?->ref_value }}</h5>
                                    <div class="line"></div>
                                    <p class="font-20 text-uppercase fc-white fw-normal">{{ $page->pageMetas->where('ref_key', 'slider_1_title')->first()?->ref_value }}</p>
                                    <p class="fw-normal fc-white font-14 --light">
                                        {{ $page->pageMetas->where('ref_key', 'slider_1_description')->first()?->ref_value }}</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="pi-box">
                                    <h5 class="primary-font fc-white m-0">{{ $page->pageMetas->where('ref_key', 'slider_2_number')->first()?->ref_value }}</h5>
                                    <div class="line"></div>
                                    <p class="fc-white font-20 text-uppercase fw-normal">
                                        {{ $page->pageMetas->where('ref_key', 'slider_2_title')->first()?->ref_value }}
                                    </p>
                                    <p class="fc-white fw-normal font-14 --light">
                                        {{ $page->pageMetas->where('ref_key', 'slider_2_description')->first()?->ref_value }}
                                    </p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="pi-box">
                                    <h5 class="primary-font m-0 fc-white">{{ $page->pageMetas->where('ref_key', 'slider_3_number')->first()?->ref_value }}</h5>
                                    <div class="line"></div>
                                    <p class="fc-white font-20 text-uppercase fw-normal">{{ $page->pageMetas->where('ref_key', 'slider_3_title')->first()?->ref_value }}</p>
                                    <p class="fc-white fw-normal font-14 --light">
                                        {{ $page->pageMetas->where('ref_key', 'slider_3_description')->first()?->ref_value }}
                                    </p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="pi-box">
                                    <h5 class="primary-font m-0 fc-white"> {{ $page->pageMetas->where('ref_key', 'slider_4_number')->first()?->ref_value }}</h5>
                                    <div class="line"></div>
                                    <p class="fc-white font-20 text-uppercase fw-normal">{{ $page->pageMetas->where('ref_key', 'slider_4_title')->first()?->ref_value }}</p>
                                    <p class="fc-white fw-normal font-14 --light">
                                        {{ $page->pageMetas->where('ref_key', 'slider_4_description')->first()?->ref_value }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="btn-box justify-content-center d-flex wow fadeInUpBig" data-wow-delay="300ms">
                    <a href="{{ $page->pageMetas->where('ref_key', 'property_button_link')->first()?->ref_value }}" class="btn btn-primary --outline ">
                        <span>
                            {{ $page->pageMetas->where('ref_key', 'property_button_text')->first()?->ref_value }}
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
    </section>

    <!-- Property Investment End -->

</main>

    <!-- Popup -->
    <div class="popup-overlay customPopup-1">
        <div class="popup-box">

            <button class="close-popup">&times;</button>
            <div class="inquire-popup d-flex flex-column gap-15">
                <h3 class="font-64 fw-normal text-uppercase fc-secondary">Get in touch with us today!</h3>
                <!--<form class="updated-form d-flex flex-column gap-20 primary-font fc-secondary text-uppercase">-->
                <!--    <div class="row no-gutters">-->
                <!--        <div class="col-md-6">-->
                <!--            <div class="input-wrapper d-flex flex-column">-->
                <!--                <label>First Name</label>-->
                <!--                <input type="text" placeholder="First Name">-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="col-md-6">-->
                <!--            <div class="input-wrapper d-flex flex-column">-->
                <!--                <label>Last Name</label>-->
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
                <!--                </select>-->
                <!--                <img src="{{ asset('frontend/images/select-arrow.svg') }}" alt="Arrow">-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->

                <!--    <div class="row no-gutters">-->
                <!--        <div class="col-md-12">-->
                <!--            <div class="input-wrapper d-flex flex-column">-->
                <!--                <label>Do you have a budget range?</label>-->
                <!--                <select>-->
                <!--                    <option>500K - 1 million</option>-->
                <!--                </select>-->
                <!--                <img src="{{ asset('frontend/images/select-arrow.svg') }}" alt="Arrow">-->
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
                <!--            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"-->
                <!--                fill="none">-->
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

@endsection
@push('scripts')
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