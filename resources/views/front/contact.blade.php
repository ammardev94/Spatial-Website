@extends('front.layouts.master')
@section('title', 'Contact Us')
@section('header-class','header-dark')
@section('content')

<main id="contact-page">
   

    <section class="contact-main contact-main-page">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 wow fadeInLeftBig" data-wow-delay="150ms">
                    <div class="contact-content">
                        <h1 class="font-64 text-uppercase fw-normal">
                            {{ $page->pageMetas->where('ref_key', 'section_one_title')->first()->ref_value }}
                        </h1>
                        <p class="m-0 font-18">
                            {{ $page->pageMetas->where('ref_key', 'section_one_description')->first()->ref_value }}
                        </p>
                        <ul
                            class="list-unstyled d-flex font-18 text-uppercase primary-font flex-column gap-35 mb-0 ">
                            <li class="d-flex flex-column gap-15">
                                <span class="fc-black">{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_title')->first()->ref_value }}</span>
                                <div class="anchor d-flex gap-10">
                                    <a href="tel:{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_phone')->first()->ref_value }}" class="primary-font font-18">Phone : {{ $page->pageMetas->where('ref_key', 'section_one_contact_information_phone')->first()->ref_value }}</a>
                                    <!--<a href="tel:+971 042410303" class="primary-font font-18">Landline : +971 042410303</a>-->
                                    
                                    <a href="mailto:{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_email')->first()->ref_value }}"
                                        class="primary-font font-18">{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_email')->first()->ref_value }}</a>
                                </div>
                            </li>

                            <li class="d-flex flex-column gap-15">
                                <span class="fc-black">{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_office_title')->first()->ref_value }}</span>
                               <div class="anchor d-flex gap-10">
                                <a href="{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_office_address_cta')->first()->ref_value }}" class="primary-font font-18">
                                    {!! $page->pageMetas->where('ref_key', 'section_one_contact_information_office_address')->first()->ref_value !!}
                                </a>
                            </div>
                            </li>

                        </ul>
                        <!--<div class="social-share d-flex flex-column gap-15">-->
                        <!--    <span class="fc-black font-18 text-uppercase primary-font">Socials</span>-->
                        <!--    <ul class="list-unstyled d-flex align-items-center gap-7 m-0">-->
                        <!--        <li><a href="{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_social_links_instagram')->first()->ref_value }}" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
                        <!--        <li><a href="{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_social_links_facebook')->first()->ref_value }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
                        <!--        <li><a href="{{ $page->pageMetas->where('ref_key', 'section_one_contact_information_social_links_tiktok')->first()->ref_value }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
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
                                        <input type="tel" name="phone" id="contact-phone" value="{{ old('phone') }}" placeholder="55 9245456" required>
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
    
    @php
        $pm = fn ($key, $default) => $page?->pageMetas->firstWhere('ref_key', $key)?->ref_value ?: $default;
        $arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none"><path d="M20.5 4.65389L0.500366 4.65389M20.5 4.65389L16.5 8.80774M20.5 4.65389L16.5 0.500049" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" /></svg>';
    @endphp

    @if($services->isNotEmpty())
    <section class="contact-services sec-padding --small o-hidden">
        <div class="container">
            <h2 class="font-64 fw-normal text-uppercase m-0 wow fadeInLeftBig" data-wow-delay="150ms">
                {{ $pm('services_section_title', 'Everything your property needs') }}
            </h2>

            <div class="swiper contact-services-slider wow fadeInUpBig" data-wow-delay="300ms">
                <div class="swiper-wrapper">
                    @foreach($services as $service)
                    <div class="swiper-slide">
                        <div class="cs-card d-flex flex-column">
                            <a href="{{ route('service.details', $service->slug) }}" class="cs-img d-block">
                                @if($service->heroImage)
                                    <img src="{{ asset('storage/'.$service->heroImage->url) }}" class="w-100 h-100 img-cover" alt="{{ $service->title }}" loading="lazy">
                                @endif
                            </a>
                            <h3 class="font-18 primary-font text-uppercase m-0">{{ $service->title }}</h3>
                            <p class="cs-text m-0 line line-2">{{ \Illuminate\Support\Str::limit(trim(html_entity_decode(strip_tags($service->hero_description))), 140) }}</p>
                            <div class="btn-box d-flex">
                                <a href="{{ route('service.details', $service->slug) }}" class="btn btn-primary --outline --dark">
                                    <span>See more</span>
                                    {!! $arrow !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($projects->isNotEmpty())
    <section class="contact-projects portfolio-grid sec-padding --small pt-0 o-hidden">
        <div class="container">
            <h2 class="font-64 fw-normal text-uppercase text-center m-0 wow fadeInUpBig" data-wow-delay="150ms">
                {!! $pm('projects_section_title', 'Have a look at our <br> transformation in action!') !!}
            </h2>

            <div class="card flex-column wow fadeInUpBig" data-wow-delay="300ms">
                <div class="grid-b">
                    @foreach($projects as $project)
                    <div class="item">
                        <div class="project-box relative">
                            <a href="{{ route('portfolio.show', $project->slug) }}" class="text-d-none">
                                <div class="hover-box relative">
                                    <div class="hover-img">
                                        @if($project->feature_img)
                                            <img src="{{ asset('storage/'.$project->feature_img->url) }}" class="w-100 h-100 img-cover" alt="{{ $project->title }}" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="btn-box d-flex">
                                        <span class="btn btn-primary --outline">
                                            <span>See full case study</span>
                                            {!! $arrow !!}
                                        </span>
                                    </div>
                                </div>
                                <div class="norm-box">
                                    <div class="proj-img">
                                        @if($project->feature_img)
                                            <img src="{{ asset('storage/'.$project->feature_img->url) }}" class="w-100 h-100 img-cover" alt="{{ $project->title }}" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="proj-text">
                                        <h6 class="font-18 primary-font text-uppercase line line-1">{{ $project->title }}</h6>
                                        <p class="m-0 font-16 text-uppercase line line-1">
                                            <img src="{{ asset('frontend/images/location.svg') }}" alt="Icon"> {{ $project->location }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
</main>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.0/build/css/intlTelInput.css">
<link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}?v={{ filemtime(public_path('frontend/css/contact.css')) }}">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.0/build/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Phone number with country flag + dial code; submit the full international number
        const phone = document.getElementById('contact-phone');
        if (phone && window.intlTelInput) {
            const iti = window.intlTelInput(phone, {
                initialCountry: 'ae',
                separateDialCode: true,
                countrySearch: true,
                utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.0/build/js/utils.js',
            });
            phone.form.addEventListener('submit', function () {
                if (phone.value.trim() !== '') {
                    phone.value = iti.getNumber() || phone.value;
                }
            });
        }

        if (window.Swiper && document.querySelector('.contact-services-slider')) {
            new Swiper('.contact-services-slider', {
                speed: 800,
                spaceBetween: 30,
                slidesPerView: 1.15,
                breakpoints: {
                    768: { slidesPerView: 2.15 },
                    1200: { slidesPerView: 2.72 },
                },
            });
        }
    });
</script>
@endpush