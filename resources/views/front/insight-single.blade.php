@extends('front.layouts.master')
@section('title', 'Insights')
@section('header-class','header-dark')
@section('content')

    <main id="inner-insights-main">

        <section class="bannerimg banner-with-heading">
            <div class="container d-flex flex-column gap-50">
                <div class="banner-title">
                    <h1 class="m-0 fw-normal text-uppercase wow fadeInUpBig" data-wow-delay="150ms">
                        {{ $insight->title }}
                    </h1>
                </div>
                <div class="port-banner wow fadeInUpBig" data-wow-delay="150ms">
                    <img src="{{ asset('storage/' . $insight->featureImage->url) ?? '' }}" class="w-100 h-100 img-cover" alt="Banner">
                </div>
            </div>
        </section>

        <section class="insight-content sec-padding --small pt-0">
            <div class="container d-flex flex-column gap-45">
                <div class="row no-gutters">
                    <div class="col-xl-8 col-lg-7 wow fadeInLeftBig" data-wow-delay="150ms">
                        <div class="content-main d-flex flex-column gap-20 gap-md-20">
                            <div class="content-box d-flex flex-column gap-20">
                                <h3 class="font-32 m-0 primary-font text-uppercase">{{ $insight->outlook_title }}</h3>
                                <div class="insight-text text-justify">
                                    {!! $insight->outlook_description !!}
                                </div>
                            </div>

                            <div class="content-box d-flex flex-column gap-20 text-justify">
                                <h3 class="font-32 m-0 primary-font text-uppercase">{{ $insight->why_title }}</h3>
                                <div class="insight-list">
                                    {!! $insight->why_description !!}
                                </div>
                            </div>

                            <div class="content-box d-flex flex-column gap-20">
                                <h3 class="font-32 m-0 primary-font text-uppercase">{{ $insight->optimistic_title }}</h3>
                                <div class="insight-text text-justify">
                                    {!! $insight->optimistic_description !!}
                                </div>
                            </div>
                            
                            <div class="btn-box d-flex ">
                                <a class="btn btn-primary --outline --dark" id="download_btn">
                                    <span>download pdf</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                                        <path d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 wow fadeInRightBig" data-wow-delay="150ms">
                        <div class="subscribe-box d-flex flex-column gap-15">
                            <h2 class="m-0 fw-normal text-uppercase">Subscribe now to stay up to date </h2>
                            <form
                                class="updated-form d-flex flex-column gap-20 primary-font fc-secondary text-uppercase">
                                <div class="input-wrapper d-flex flex-column">
                                    <label>Name</label>
                                    <input type="text" placeholder="Your Name">
                                </div>
                                <div class="input-wrapper d-flex flex-column">
                                    <label>Email</label>
                                    <input type="text" placeholder="info@youremail.com">
                                </div>
                                <div class="input-btn">
                                    <button href="#" class="btn btn-secondary --outline ">
                                        <span>
                                            Subscribe now
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

                <!--<div class="social-share">-->
                <!--    <ul class="list-unstyled d-flex align-items-center gap-7 m-0">-->
                <!--        <li><a href="#"><i class="fab fa-instagram"></i></a></li>-->
                <!--        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>-->
                <!--        <li><a href="#"><i class="fab fa-tiktok"></i></a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
        </section>




        <!-- Related Portfolio Start -->

        <section class="related-portfolio related-insights portfolio-grid-with-btn bg-primary sec-padding">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="sec-heading text-center text-md-left">
                            <h2 class="font-64 m-0 font-light-grey  text-uppercase fw-normal wow fadeInLeftBig" data-wow-delay="150ms">
                                key insights shaping the vision!
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="btn-box justify-content-center justify-content-md-end d-flex wow fadeInRightBig" data-wow-delay="150ms">
                            <a href="{{ route('insights') }}" class="btn btn-primary --outline">
                                <span>
                                    See all insights
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

                @if($relatedInsights && $relatedInsights->count())
                <div class="related-slider  swiper wow fadeInUpBig" data-wow-delay="150ms">
                    <div class="swiper-wrapper ">

                        @foreach($relatedInsights as $r)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="item">
                                    <div class="project-box relative">
                                        <a href="{{ route('insights.show', $r->slug) }}" class="text-d-none">
                                            <div class="hover-box relative">
                                                <div class="hover-img">
                                                    <img src="{{ asset('storage/' . ($r->featureImage?->url ?? 'images/placeholder.jpg')) }}" class="w-100 h-100 img-cover" alt="{{ $r->title }}">
                                                </div>
                                            </div>
                                            <div class="norm-box">
                                                <div class="proj-img">
                                                    <img src="{{ asset('storage/' . ($r->featureImage?->url ?? 'images/placeholder.jpg')) }}" class="w-100 h-100 img-cover" alt="{{ $r->title }}">
                                                </div>
                                                <div class="proj-text">
                                                    <h6 class="font-18 primary-font line line-2 fw-normal fc-white text-uppercase">{{ $r->title }}</h6>
                                                    <p class="font-16 line line-2 fc-white">{{ \Illuminate\Support\Str::limit($r->outlook_description, 120, '...') }}</p>
                                                    <div class="btn-box d-flex ">
                                                        <span class="btn btn-primary --outline">
                                                            <span>Read More</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
                                                                <path d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
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
                @endif
            </div>
        </section>

        <!-- Related Portfolio End -->


    </main>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<button id="download_btn">Download PDF</button>

<script>
document.getElementById("download_btn").addEventListener("click", async () => {
    const btn = document.getElementById("download_btn");

    // save original text
    const originalText = btn.innerText;

    // update state
    btn.innerText = "Downloading...";
    btn.disabled = true;

    try {
        const element = document.getElementById("inner-insights-main");

        const canvas = await html2canvas(element, {
            scale: 2,
            useCORS: true,
            scrollY: -window.scrollY
        });

        const imgData = canvas.toDataURL("image/png");

        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF("p", "mm", "a4");

        const pageWidth = 210;
        const pageHeight = 297;

        const imgWidth = pageWidth;
        const imgHeight =
            (canvas.height * imgWidth) / canvas.width;

        let heightLeft = imgHeight;
        let position = 0;

        pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);

        heightLeft -= pageHeight;

        while (heightLeft > 0) {
            position = heightLeft - imgHeight;

            pdf.addPage();
            pdf.addImage(
                imgData,
                "PNG",
                0,
                position,
                imgWidth,
                imgHeight
            );

            heightLeft -= pageHeight;
        }

        pdf.save("{{ $insight->title }}.pdf");

    } finally {
        btn.innerText = originalText;
        btn.disabled = false;
    }
});
</script>
@endpush