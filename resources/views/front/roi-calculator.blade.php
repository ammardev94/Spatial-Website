@extends('front.layouts.master')
@section('title', 'ROI Calculator')
@section('header-class', 'header-dark')
@section('content')

    <main id="contact-page">

        <section class="contact-main roi-calculator-box">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 col-md-12 wow fadeInLeftBig" data-wow-delay="150ms">
                        <div class="contact-content">
                            <h1 class="font-64 text-uppercase fw-normal">
                                {!! $page->pageMetas->where('ref_key', 'main_title')->first()?->ref_value !!}
                            </h1>
                            <p class="m-0 font-18">
                                {!! $page->pageMetas->where('ref_key', 'main_description')->first()?->ref_value !!}
                            </p>
                            <div class="roi-list">
                                <ul class="d-flex list-unstyled primary-font text-uppercase fc-black">
                                    <li>
                                        {!! $page->pageMetas->where('ref_key', 'main_tile_1')->first()?->ref_value !!}
                                    </li>

                                    <li>
                                            {!! $page->pageMetas->where('ref_key', 'main_tile_2')->first()?->ref_value !!}
                                    </li>

                                    <li>
                                        {!! $page->pageMetas->where('ref_key', 'main_tile_3')->first()?->ref_value !!}
                                    </li>

                                    <li>
                                        {!! $page->pageMetas->where('ref_key', 'main_tile_4')->first()?->ref_value !!}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow fadeInRightBig" data-wow-delay="150ms">
                        <div class="contact-box d-flex flex-column gap-15">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Please correct the following errors:</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('roi-calculator.store') }}"
                                class="updated-form d-flex flex-column gap-20 primary-font fc-secondary text-uppercase">
                                @csrf
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="input-wrapper d-flex flex-column">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" id="full_name" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required>
                                            @error('full_name')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-wrapper d-flex flex-column">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" placeholder="info@youremail.com" value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="input-wrapper d-flex flex-column">
                                            <label for="purchase_price">Property Address</label>
                                            <input type="text" id="purchase_price" name="purchase_price" placeholder="Street A Villa A etc" value="{{ old('purchase_price') }}" required>
                                            @error('purchase_price')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="input-wrapper d-flex flex-column">
                                            <label for="target_sale_price">Built Up Area Size</label>
                                            <input type="text" id="target_sale_price" name="target_sale_price" placeholder="Built Up Area Size" value="{{ old('target_sale_price') }}" required>
                                            @error('target_sale_price')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="input-wrapper d-flex flex-column">
                                            <label for="target_sale_price">Plot Size</label>
                                            <input type="text" id="plot_size" name="plot_size" placeholder="Plot Size" value="{{ old('plot_size') }}" required>
                                            @error('plot_size')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="input-wrapper d-flex flex-column">
                                            <label for="renovation_budget">renovation budget</label>
                                            <select id="renovation_budget" name="renovation_budget" required>
                                                <option value="">Select a range</option>
                                                <option value="500K - 1 million" {{ old('renovation_budget') === '500K - 1 million' ? 'selected' : '' }}>500K - 1 million</option>
                                                <option value="1 million - 2 million" {{ old('renovation_budget') === '1 million - 2 million' ? 'selected' : '' }}>1 million - 2 million</option>
                                                <option value="2 million - 5 million" {{ old('renovation_budget') === '2 million - 5 million' ? 'selected' : '' }}>2 million - 5 million</option>
                                                <option value="5 million+" {{ old('renovation_budget') === '5 million+' ? 'selected' : '' }}>5 million+</option>
                                            </select>
                                            <img src="{{ asset('frontend/images/select-arrow.svg') }}" alt="Arrow">
                                            @error('renovation_budget')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="input-wrapper d-flex flex-column">
                                            <label for="timeline">Timeline</label>
                                            <select id="timeline" name="timeline" required>
                                                <option value="">Select timeline</option>
                                                <option value="3-6 months" {{ old('timeline') === '3-6 months' ? 'selected' : '' }}>3 - 6 months</option>
                                                <option value="6-12 months" {{ old('timeline') === '6-12 months' ? 'selected' : '' }}>6 - 12 months</option>
                                                <option value="1-2 years" {{ old('timeline') === '1-2 years' ? 'selected' : '' }}>1 - 2 years</option>
                                                <option value="2+ years" {{ old('timeline') === '2+ years' ? 'selected' : '' }}>2+ years</option>
                                            </select>
                                            <img src="{{ asset('frontend/images/select-arrow.svg')}}" alt="Arrow">
                                            @error('timeline')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="input-btn">
                                    <button type="submit" class="btn btn-secondary --outline ">
                                        <span>
                                            CALCULATE ROI
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
                                            viewBox="0 0 21 10" fill="none">
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