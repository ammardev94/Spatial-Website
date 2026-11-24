<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/themes/light.css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css') }}?{{ time() }}">
	<link rel="icon" href="{{ asset('frontend/images/favicon-img.svg') }}" type="image/svg">
	<title>@yield('title')</title>
</head>

<body class="">

	<!-- Background Overlay Start -->
	<div class="bg-overlay"></div>
	<!-- Background Overlay End -->

	<!-- Header Start -->

	<header class="header @yield('header-class')">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-2 col-lg-2 col-6">
					<div class="logo">
						<a href="{{ route('home') }}" class="h-logo d-block">
							@if($generalInfo?->header_logo)
								<img src="{{ asset('storage/'.$generalInfo->header_logo) }}" alt="Logo">
							@else
							<img src="{{ asset('frontend/images/logo-dark.svg') }}" alt="Logo">
							@endif
						</a>
					</div>
				</div>
				<div class="col-xl-10 col-lg-10 col-6">
					<nav class="align-items-center gap-25 justify-content-end">
						<ul class="list-unstyled text-uppercase d-flex align-items-center gap-25 m-0">
							<li><a href="{{ route('about') }}">About</a></li>
							<li><a href="{{ route('services') }}">Services</a></li>
							<li><a href="{{ route('portfolios') }}">Portfolio</a></li>
							<!--<li><a href="{{ route('workshop') }}">Workshop </a></li>-->
							<!--<li><a href="{{ route('showroom') }}">showroom</a></li>-->
							<li><a href="{{ route('partners') }}">Partners</a></li>
							<li><a href="{{ route('sustainability') }}">sustainability</a></li>
							<li><a href="{{ route('roi-calculator') }}">ROI CALculator</a></li>
							<li><a href="{{ route('insights') }}">insights</a></li>
						</ul>

                       <div class="dropdown">
                        
                            <button class="dropdown-btn">
                                <!-- Globe Icon -->
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 0c2.5 2.7 4 6.2 4 10s-1.5 7.3-4 10m0-20C9.5 4.7 8 8.2 8 12s1.5 7.3 4 10m-9-10h18M3 12h18"/>
                                </svg>
                        
                                <span>UAE</span>
                                <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                            </button>
                        
                            <ul class="dropdown-menu">
                                <li class="active"><a href="{{ route('home') }}">UAE</a></li>
                                <li ><a href="https://spatialpropertygroup.com/">UK</a></li>
                            </ul>
                        
                        </div>
						

						<div class="nav-btn">
							<a href="{{ route('contact') }}" class="btn btn-primary --outline">
								<span>Contact us</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"
									fill="none">
									<path
										d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
										stroke="white" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a>
						</div>
					</nav>
					
					 <div class="d-flex justify-content-end gap-20">
					 <div class="dropdown dropdown-mobile">
                        
                            <button class="dropdown-btn">
                                <!-- Globe Icon -->
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 0c2.5 2.7 4 6.2 4 10s-1.5 7.3-4 10m0-20C9.5 4.7 8 8.2 8 12s1.5 7.3 4 10m-9-10h18M3 12h18"/>
                                </svg>
                        
                                <span>UAE</span>
                                <span class="arrow"><i class="fas fa-chevron-down"></i></span>
                            </button>
                        
                            <ul class="dropdown-menu">
                                <li class="active"><a href="{{ route('home') }}">UAE</a></li>
                                <li ><a href="https://spatialpropertygroup.com/">UK</a></li>
                            </ul>
                        
                        </div>

					<div class="mobile-navbar-btn text-right">
							<svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" viewBox="0 0 26 22"
								fill="none">
								<rect y="0.608688" width="26" height="1.69565" fill="#fff"></rect>
								<rect y="10.2174" width="17.5217" height="1.69565" fill="#fff"></rect>
								<rect y="19.826" width="26" height="1.69565" fill="#fff"></rect>
							</svg>
						</div>
						</div>

				</div>
			</div>
		</div>
	</header>

	<!-- Header End -->

	<!-- Mobile Nav Start -->

	<div class="mobile-navbar-main">
		<div class="mobile-navbar">

			<div class="logo-close-btn-wrapper">
				<a href="{{ route('home') }}" class="h-logo mb-logo d-block">
					<img src="{{ asset('frontend/images/logo.svg') }}" alt="Logo">
				</a>

				<span class="mobile-nav-close-btn">
					<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M10.8534 0.854534C10.8999 0.808051 10.9367 0.752868 10.9619 0.692136C10.9871 0.631403 11 0.56631 11 0.500574C11 0.434838 10.9871 0.369745 10.9619 0.309013C10.9367 0.24828 10.8999 0.193097 10.8534 0.146615C10.8069 0.100132 10.7517 0.0632602 10.691 0.038104C10.6303 0.0129478 10.5652 0 10.4994 0C10.4337 0 10.3686 0.0129478 10.3079 0.038104C10.2471 0.0632602 10.1919 0.100132 10.1455 0.146615L5.5 4.79308L0.854534 0.146615C0.808051 0.100132 0.752868 0.0632602 0.692136 0.038104C0.631403 0.0129478 0.56631 4.89774e-10 0.500574 0C0.434838 -4.89774e-10 0.369745 0.0129478 0.309013 0.038104C0.24828 0.0632602 0.193097 0.100132 0.146615 0.146615C0.100132 0.193097 0.0632602 0.24828 0.038104 0.309013C0.0129478 0.369745 -4.89774e-10 0.434838 0 0.500574C4.89774e-10 0.56631 0.0129478 0.631403 0.038104 0.692136C0.0632602 0.752868 0.100132 0.808051 0.146615 0.854534L4.79308 5.5L0.146615 10.1455C0.0527388 10.2393 0 10.3667 0 10.4994C0 10.6322 0.0527388 10.7595 0.146615 10.8534C0.240491 10.9473 0.367814 11 0.500574 11C0.633335 11 0.760658 10.9473 0.854534 10.8534L5.5 6.20692L10.1455 10.8534C10.2393 10.9473 10.3667 11 10.4994 11C10.6322 11 10.7595 10.9473 10.8534 10.8534C10.9473 10.7595 11 10.6322 11 10.4994C11 10.3667 10.9473 10.2393 10.8534 10.1455L6.20692 5.5L10.8534 0.854534Z"
							fill="white" />
					</svg>
					<span>Close</span>
				</span>
			</div>

			<ul class="header-nav list-unstyled m-0 p-0">
				<li><a href="{{ route('about') }}">About Spatial</a></li>
				<li><a href="{{ route('services') }}">Services</a></li>
				<li><a href="{{ route('portfolios') }}">Portfolio</a></li>
				<!--<li><a href="{{ route('workshop') }}">Workshop </a></li>-->
				<!--<li><a href="{{ route('showroom') }}">showroom</a></li>-->
				<li><a href="{{ route('partners') }}">Partners</a></li>
				<li><a href="{{ route('sustainability') }}">sustainability</a></li>
				<li><a href="{{ route('roi-calculator') }}">ROI CALculator</a></li>
				<li><a href="{{ route('insights') }}">insights</a></li>
				<li><a href="{{ route('contact') }}">Contact Us</a></li>
			</ul>

		</div>
	</div>

	<!-- Mobile Nav End -->

	@yield('content')


	<!-- Footer Start -->

	<footer class="bg-white sec-padding --small">
		<div class="container">
			<div class="footer-top wow fadeInUpBig">
				<div class="row justify-content-between align-items-center">
					<div class="col-md-3">
						<div class="logo ">
							<a href="{{ route('home') }}">
								@if($generalInfo?->footer_logo)
									<img src="{{ asset('storage/'.$generalInfo->footer_logo) }}" alt="Logo">
								@else
									<img src="{{ asset('frontend/images/footer-logo.svg') }}" alt="Logo">
								@endif
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="f-form">
							<form>
								<div class="input-wrapper relative">
									<input type="email" class="primary-font" placeholder="info@youremail.com">
									<button class="btn "><span>Subscribe</span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-middle wow fadeInUpBig" data-wow-delay="150ms">
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<div class="f-content d-flex flex-column gap-28">
							<div class="f-text text-justify">
								@if($generalInfo?->footer_description)
									{!! $generalInfo->footer_description !!}
								@endif
							</div>
							<!--<div class="f-social">-->
							<!--	<ul class="list-unstyled d-flex align-items-center gap-7 m-0">-->
							<!--	@if($generalInfo?->instagram_link)-->
							<!--		<li><a href="{{ $generalInfo->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
							<!--	@endif-->
							<!--	@if($generalInfo?->facebook_link)-->
							<!--		<li><a href="{{ $generalInfo->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
							<!--	@endif-->
							<!--	@if($generalInfo?->ticktok_link)-->
							<!--		<li><a href="{{ $generalInfo->ticktok_link }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>-->
							<!--	@endif-->
							<!--	</ul>-->
							<!--</div>-->
						</div>
					</div>
					<div class="col-lg-8 col-md-12">
						<div class="f-list-main-box rightbox d-flex justify-content-between">
							<div class="f-list-box">
								<div class="f-list d-flex footer-menu flex-column gap-24">
									<h6 class="primary-font mb-dropdown-title fc-black font-14 fw-bold text-uppercase">QUICK LINKS</h6>
									<ul
										class="list-unstyled primary-font m-0 d-flex flex-column font-14 text-uppercase gap-16">
										<li><a href="{{ route('about') }}">ABOUT </a></li>
										<li><a href="#">Portfolio</a></li>
										<li><a href="{{ route('partners') }}">Partners</a></li>
										<li><a href="{{ route('sustainability') }}">Sustainability</a></li>
										<li><a href="{{ route('insights') }}">ROI Calculator</a></li>
										<li><a href="">Insights</a></li>
									</ul>
								</div>
							</div>
							<div class="f-list-box">
								<div class="f-list d-flex footer-menu flex-column gap-24">
									<h6 class="primary-font mb-dropdown-title fc-black font-14 fw-bold text-uppercase">Services</h6>
									<ul
										class="list-unstyled primary-font m-0 d-flex flex-column font-14 text-uppercase gap-16">
										<li><a href="#">Development and consultancy</a></li>
										<li><a href="#">Fit Out and Refurbishment</a></li>
										<li><a href="#">Renovate to sell</a></li>
									</ul>
								</div>
							</div>
							<div class="f-list-box">
								<div class="f-list d-flex footer-menu flex-column gap-24">
									<h6 class="primary-font mb-dropdown-title fc-black font-14 fw-bold text-uppercase">CONTACT</h6>
									<ul
										class="list-unstyled primary-font m-0 d-flex flex-column font-14 text-uppercase gap-16">
									@if($generalInfo?->phone)
										<li class="d-flex flex-column">
										    <span class="text-uppercase font-12">Mobile</span>
										    <a href="tel:{{ $generalInfo->phone }}">{{ $generalInfo->phone }}</a></li>
									@endif
									@if($generalInfo?->email)
										<li class="d-flex flex-column">
										    <span class="text-uppercase font-12">Email</span>
										    <a href="mailto:{{ $generalInfo->email }}">{{ $generalInfo->email }}</a></li>
									@endif
									@if($generalInfo?->address)
										<li class="d-flex flex-column">
										  <span class="text-uppercase font-12">office address</span>
										    <a href="{{ $generalInfo->google_map_link ?? '#' }}" target="{{ $generalInfo->google_map_link ? '_blank' : '_self' }}">{{ $generalInfo->address }}</a></li>
									@endif
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom wow fadeInUpBig" data-wow-delay="300ms">
				<div class="row">
					<div class="col-md-5">
						<div class="copyright-text d-flex gap-20 gap-md-10">
							<p class="m-0 font-12 text-uppercase">
							    © 2026 <a href="{{ route('home') }}"
									class="text-d-none">Spatial</a>. All rights reserved. </p>
									
									<div class="privacy">
							<ul
								class="list-unstyled primary-font font-12 text-uppercase justify-content-end d-flex m-0 gap-20">
							@if($generalInfo?->privacy_link)
								<li><a href="{{ $generalInfo->privacy_link }}">privacy policy</a></li>
							@endif
							@if($generalInfo?->cookie_policy_link)
								<li><a href="{{ $generalInfo->cookie_policy_link }}">Terms and conditions</a></li>
							@endif
							</ul>
						</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="registered text-left text-md-right">
                              <p class="m-0 font-12" style="    color: rgba(0, 0, 0, 0.7);">
                                  <strong>Spatial Elite Decoration Design &amp; Implementation LLC</strong> — Trading as Spatial<br>
                              Registered Address: P1 / Block I – 9I-SH, Saih Shuaib 2, Dubai Industrial City, Dubai, UAE<br>
                              Trade Licence No: 1620097
                              </p>
                            </div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Footer End -->


<!--Floating Icon-->

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/97141234567" class="whatsapp-float" 
   id="whatsappFloat"
   target="_blank">

    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 32 32" fill="none">
        <path fill="#fff" d="M19.11 17.34c-.27-.14-1.6-.79-1.85-.88-.25-.09-.43-.14-.61.14-.18.27-.7.88-.86 1.06-.16.18-.31.2-.58.07-.27-.14-1.12-.41-2.14-1.31-.79-.7-1.33-1.57-1.49-1.84-.16-.27-.02-.41.12-.55.13-.13.27-.31.41-.47.14-.16.18-.27.27-.45.09-.18.05-.34-.02-.48-.07-.14-.61-1.47-.84-2.02-.22-.53-.45-.46-.61-.47h-.52c-.18 0-.48.07-.73.34-.25.27-.95.93-.95 2.27s.98 2.64 1.12 2.82c.14.18 1.93 2.95 4.68 4.13.66.29 1.18.46 1.58.59.66.21 1.27.18 1.75.11.53-.08 1.6-.65 1.82-1.28.23-.63.23-1.17.16-1.28-.07-.11-.25-.18-.52-.32Z"/>
        <path fill="#fff" d="M16 3C8.83 3 3 8.73 3 15.8c0 2.5.73 4.83 1.99 6.81L3 29l6.61-1.92A13 13 0 0 0 16 28.6c7.17 0 13-5.73 13-12.8S23.17 3 16 3Zm0 23.26c-2.04 0-3.95-.55-5.59-1.52l-.4-.24-3.92 1.14 1.17-3.81-.26-.39a10.14 10.14 0 0 1-1.62-5.45c0-5.6 4.74-10.16 10.57-10.16 5.83 0 10.57 4.56 10.57 10.16 0 5.6-4.74 10.16-10.57 10.16Z"/>
    </svg>

</a>

	<!-- Gsap Script -->
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
	<!-- Scrolltrigger Script -->
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
	<!-- ScrollSmoother Script -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.19/bundled/lenis.min.js"></script>

	<script src="{{ asset('frontend/js/theme-lib.js') }}"></script>
	<script src="{{ asset('frontend/js/swiper-slider.js') }}"></script>
	<script src="{{ asset('frontend/js/wow.js') }}"></script>
	<script src="{{ asset('frontend/js/theme-fun.js') }}"></script>
	
<script>
    const whatsappBtn = document.getElementById("whatsappFloat");

    whatsappBtn.classList.add("show");
</script>

<script>
    const dropdowns = document.querySelectorAll(".dropdown");

    dropdowns.forEach((dropdown) => {

        const btn = dropdown.querySelector(".dropdown-btn");

        btn.addEventListener("click", () => {

            // optional: close other dropdowns
            dropdowns.forEach((item) => {
                if(item !== dropdown){
                    item.classList.remove("active");
                }
            });

            dropdown.classList.toggle("active");
        });
    });

    window.addEventListener("click", (e) => {
        dropdowns.forEach((dropdown) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove("active");
            }
        });
    });
</script>

	@stack('scripts')
</body>

</html>