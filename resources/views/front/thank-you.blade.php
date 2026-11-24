@extends('front.layouts.master')
@section('title', 'Thank You')
@section('header-class','header-dark')
@section('content')

<main id="thank-you-page">
    <section class="contact-main contact-main-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 text-center wow fadeInUpBig" data-wow-delay="150ms">
                    <div class="d-flex flex-column align-items-center gap-35">
                        <h1 class="font-64 text-uppercase fw-normal m-0">Thank You</h1>
                        <p class="m-0 font-18">{{ session('contact_success') }}</p>
                        <div class="btn-box d-flex gap-15 flex-wrap justify-content-center">
                            <a href="{{ route('home') }}" class="btn btn-primary --outline --dark">
                                <span>Back to Home</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                                    <path d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="{{ route('portfolios') }}" class="btn btn-primary --outline --dark">
                                <span>View Portfolio</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                                    <path d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
