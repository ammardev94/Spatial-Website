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
    
     <section class="bannerimg bannerimg-contact  sec-padding --small  pt-0">
        <div class="container">
            <div class="port-banner wow fadeInUpBig" data-wow-delay="150ms">
                <img src="{{ asset('storage/'.$page->pageFiles->where('ref_point', 'section_one_image')->first()->path) }}" class="w-100 h-100 img-cover" alt="Banner">
            </div>
        </div>
    </section>
</main>

@endsection