@extends('front.layouts.master')
@section('title', 'Home')
@section('content')
@php
$pm = fn($k) => $page?->pageMetas->firstWhere('ref_key', $k)?->ref_value;
$pf = fn($k) => $page?->pageFiles->firstWhere('ref_point', $k);
$src = fn($k, $fb) => ($f = $page?->pageFiles->firstWhere('ref_point', $k)) && $f->path ? asset('storage/'.$f->path) :
asset($fb);

// Banner
$bannerTitle = $pm('banner_title');
$bannerBtnText = $pm('banner_button_text');
$bannerBtnLink = $pm('banner_button_link') ?? '#';
$bannerImg = $src('banner_image', 'images/banner-img.jpg');

// Section 1
$s1Title = $pm('section_1_title');
$s1Desc = $pm('section_1_description');
$s1BtnText = $pm('section_1_button_text');
$s1BtnLink = $pm('section_1_button_link') ?? '#';

// Section 2
$s2Img = $src('section_2_image', 'images/strategy-img.jpg');
$s2Title = $pm('section_2_title');
$s2F1T = $pm('section_2_feature_1_title');
$s2F1D = $pm('section_2_feature_1_description');
$s2F2T = $pm('section_2_feature_2_title');
$s2F2D = $pm('section_2_feature_2_description');
$s2F3T = $pm('section_2_feature_3_title');
$s2F3D = $pm('section_2_feature_3_description');

// Section 3 - video
$s3Video = $src('section_3_video', 'video/showroom-video.mp4');
$s3Title = $pm('section_3_title');
$s3BtnText = $pm('section_3_button_text');
$s3BtnLink = $pm('section_3_button_link') ?? '#';

// Section 4 - slides
$s4S1Img = $src('section_4_slide_1_image', 'images/slide-1.jpg');
$s4S1Thumb = $src('section_4_slide_1_thumbnail', 'images/slide-small-1.jpg');
$s4S1Title = $pm('section_4_slide_1_title');
$s4S1Desc = $pm('section_4_slide_1_description');
$s4S1BtnText = $pm('section_4_slide_1_button_text');
$s4S1BtnLink = $pm('section_4_slide_1_button_link') ?? '#';
$s4S2Img = $src('section_4_slide_2_image', 'images/slide-2.jpg');
$s4S2Thumb = $src('section_4_slide_2_thumbnail', 'images/slide-small-2.jpg');
$s4S2Title = $pm('section_4_slide_2_title');
$s4S2Desc = $pm('section_4_slide_2_description');
$s4S2BtnText = $pm('section_4_slide_2_button_text');
$s4S2BtnLink = $pm('section_4_slide_2_button_link') ?? '#';

$s4S3Img = $src('section_4_slide_3_image', 'images/slide-2.jpg');
$s4S3Thumb = $src('section_4_slide_3_thumbnail', 'images/slide-small-2.jpg');
$s4S3Title = $pm('section_4_slide_3_title');
$s4S3Desc = $pm('section_4_slide_3_description');
$s4S3BtnText = $pm('section_4_slide_3_button_text');
$s4S3BtnLink = $pm('section_4_slide_3_button_link') ?? '#';

$s4S4Img = $src('section_4_slide_4_image', 'images/slide-2.jpg');
$s4S4Thumb = $src('section_4_slide_4_thumbnail', 'images/slide-small-2.jpg');
$s4S4Title = $pm('section_4_slide_4_title');
$s4S4Desc = $pm('section_4_slide_4_description');
$s4S4BtnText = $pm('section_4_slide_4_button_text');
$s4S4BtnLink = $pm('section_4_slide_4_button_link') ?? '#';

// Section 5 - property investment
$s5Title = $pm('section_5_title');
$s5Items = [];
for ($i = 1; $i <= 5; $i++) { $s5Items[]=[ 'num'=> $pm("section_5_item_{$i}_number"),
	'title' => $pm("section_5_item_{$i}_title"),
	'desc' => $pm("section_5_item_{$i}_description"),
	];
	}
	$s5BtnText = $pm('section_5_button_text');
	$s5BtnLink = $pm('section_5_button_link') ?? '#';

	// Section 6 - ROI
	$s6Title = $pm('section_6_title');
	$s6Desc = $pm('section_6_description');
	$s6Item1 = $pm('section_6_item_1');
	$s6Item2 = $pm('section_6_item_2');
	$s6Item3 = $pm('section_6_item_3');
	$s6Item4 = $pm('section_6_item_4');
	$s6BtnText = $pm('section_6_button_text');
	$s6BtnLink = $pm('section_6_button_link') ?? '#';
	$s6Img = $src('section_6_image', 'images/right-img.jpg');

	// Section 7 - gallery
	$s7Title = $pm('section_7_title');
	$s7BtnText = $pm('section_7_button_text');
	$s7BtnLink = $pm('section_7_button_link') ?? '#';
	$s7Gal = [];
	for ($i = 1; $i <= 5; $i++) { $s7Gal[]=$src("section_7_gallery_{$i}", "images/gal-{$i}.jpg" ); } 
         $s8ImgLeft=$src('section_8_image_left', 'images/response-2.jpg' );
		$s8ImgRight=$src('section_8_image_right', 'images/response-1.jpg' ); $s8Title=$pm('section_8_title');
		$s8Desc=$pm('section_8_description'); $s8BtnText=$pm('section_8_button_text');
		$s8BtnLink=$pm('section_8_button_link') ?? '#' ; @endphp <main id="homepage">
		<!-- Banner Start -->

		<section class="banner relative">
			<img src="{{ $bannerImg }}" class="w-100 img-cover" alt="Banner Image">
			<div class="banner-content">
				<div class="container">
					<div class="banner-head d-flex gap-35 flex-column">
						<h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">
							{!! $bannerTitle ?? 'Strategic property transformation for the UAE' !!}</h1>
						<div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">
							<a href="{{ $bannerBtnLink }}" class="btn btn-primary --outline">
								<span>
									{{ $bannerBtnText ?? 'Get in touch with us' }}
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

		<!-- Banner End -->

		<!-- Title With Content Start -->

		<section class="title-with-content d-flex align-items-center text-center sec-padding --xxlarge ">
			<div class="container wow fadeInUpBig">

				<div class="title-head">
					<h2 class="font-64 fw-normal text-uppercase">{!! $s1Title ?? 'We advise, acquire, and transform
						exceptional property across Dubai.' !!}</h2>
					<p class="m-0 font-20">{!! $s1Desc ?? 'Combining British standards with deep local market insight,
						we deliver thoughtful property strategies, luxury renovations, and intelligent investment
						outcomes.' !!}</p>
				</div>

				<div class="btn-box mt-5 d-flex justify-content-center">
					<a href="{{ $s1BtnLink }}" class="btn btn-primary --outline --dark">
						<span>
							{{ $s1BtnText ?? 'Get in touch with us' }}
						</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
							<path
								d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
								stroke="white" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</a>
				</div>

			</div>
		</section>


		<!-- Title With Content End -->

		<div class="animate-sec o-hidden" id="multi-animation">
			<!-- Image WIth Content Start -->

			<section class="img-with-content left-img-with-content  forJqueryOnly o-hidden leftBoxforJqueryOnly">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-5">
							<div class="imgbox">
								<div class="left-img">
									<img src="{{ $s2Img }}" id="leftimgbox" class="w-100 img-cover"
										alt="Strategy Image">
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="img-title-content ml-2 d-flex flex-column gap-50" id="leftimgcontent">
								<h3 class="font-64 fw-normal text-uppercase m-0">{!! $s2Title ?? 'Strategic Property
									Transformation for Dubai\'s Luxury Market' !!}</h3>

								<div class="img-text-box d-flex flex-column gap-30 gap-md-60">
									<div class="text-box d-flex flex-column gap-16">
										<h6 class="m-0 font-20 fw-normal fc-black text-uppercase primary-font">
											{{ $s2F1T ?? 'Development Consulting & Advisory' }}
										</h6>
										<p class="m-0">
											{{ $s2F1D ?? 'Strategic property guidance and access to exceptional
											acquisition opportunities across Dubai.' }}
										</p>
									</div>

									<div class="text-box d-flex flex-column gap-16">
										<h6 class="m-0 font-20 fw-normal fc-black text-uppercase primary-font">
											{{ $s2F2T ?? 'Development Consulting & Advisory' }}
										</h6>
										<p class="m-0">
											{{ $s2F2D ?? 'Strategic property guidance and access to exceptional
											acquisition opportunities across Dubai.' }}
										</p>
									</div>

									<div class="text-box d-flex flex-column gap-16">
										<h6 class="m-0 font-20 fw-normal fc-black text-uppercase primary-font">
											{{ $s2F3T ?? 'Development Consulting & Advisory' }}
										</h6>
										<p class="m-0">
											{{ $s2F3D ?? 'Strategic property guidance and access to exceptional
											acquisition opportunities across Dubai.' }}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Image WIth Content End -->

			<!-- Transformation Start -->

			<div class="transform ">
				<section class="transformation o-hidden relative">
					<!-- <img src="images/transformation.jpg" class="w-100 img-cover" alt=""> -->
					<video class="bg-videos w-100 img-cover" muted autoplay playsinline loop preload="auto">
						<source src="{{ $s3Video }}" type="video/mp4">
					</video>
					<div class="tranformation-content">
						<div class="container d-flex flex-column gap-30 text-center">
							<h2 class="font-64 fw-normal text-uppercase font-grey">{!! $s3Title ?? 'Strategic Property
								Transformation for Dubai\'s Luxury Market' !!}</h2>
							<div class="btn-box d-flex justify-content-center">
								<a href="{{ $s3BtnLink }}" class="btn btn-primary --outline">
									<span>
										{{ $s3BtnText ?? 'Get in touch with us' }}
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
			</div>

			<!-- Transformation End -->

			<!-- Slider Image Sec Start -->

			<section class="mainslidesec  o-hidden">

				<div class="slide-sec slide-sec-1  relative">
					<img src="{{ $s4S1Img }}" class="w-100 slide-main-img img-cover" alt="Slide">
					<div class="slide-content-box d-flex align-items-center h-100 w-100">
						<div class="container">
							<div class="side-box d-flex gap-10 flex-column">
								<div class="slide-title">
									<h4 class="m-0 fw-normal primary-font text-uppercase line line-2">{{ $s4S1Title ??
										'Title of the project comes here' }}</h4>
								</div>
								<div class="slide-img">
									<img src="{{ $s4S1Thumb }}" class="w-100 img-cover" alt="Slide Image">
								</div>
								<div class="slide-content">
									<p class="m-0 font-18 lh-normal line line-3">{{ $s4S1Desc ?? '' }}</p>
								</div>
								<div class="btn-box mt-2 d-flex">
									<a href="{{ $s4S1BtnLink }}" class="btn btn-primary --outline --dark">
										<span>{{ $s4S1BtnText ?? 'Learn more' }}</span>
										<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
											viewBox="0 0 21 10" fill="none">
											<path
												d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
												stroke="white" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="slide-sec slide-sec-2 relative">
					<img src="{{ $s4S2Img }}" class="w-100 slide-main-img img-cover" alt="Slide">
					<div class="slide-content-box d-flex align-items-center h-100 w-100">
						<div class="container">
							<div class="side-box d-flex gap-10 flex-column">
								<div class="slide-title">
									<h4 class="m-0 fw-normal primary-font text-uppercase line line-2">{{ $s4S2Title ??
										'Title of the project comes here' }}</h4>
								</div>
								<div class="slide-img">
									<img src="{{ $s4S2Thumb }}" class="w-100 img-cover" alt="Slide Image">
								</div>
								<div class="slide-content">
									<p class="m-0 font-18 lh-normal line line-3">{{ $s4S2Desc ?? '' }}</p>
								</div>
								<div class="btn-box mt-2 d-flex">
									<a href="{{ $s4S2BtnLink }}" class="btn btn-primary --outline --dark">
										<span>{{ $s4S2BtnText ?? 'Learn more' }}</span>
										<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
											viewBox="0 0 21 10" fill="none">
											<path
												d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
												stroke="white" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="slide-sec slide-sec-3 relative">
					<img src="{{ $s4S3Img }}" class="w-100 slide-main-img img-cover" alt="Slide">
					<div class="slide-content-box d-flex align-items-center h-100 w-100">
						<div class="container">
							<div class="side-box d-flex gap-10 flex-column">
								<div class="slide-title">
									<h4 class="m-0 fw-normal primary-font text-uppercase line line-2">{{ $s4S3Title ??
										'Title of the project comes here' }}</h4>
								</div>
								<div class="slide-img">
									<img src="{{ $s4S3Thumb }}" class="w-100 img-cover" alt="Slide Image">
								</div>
								<div class="slide-content">
									<p class="m-0 font-18 lh-normal line line-3">{{ $s4S3Desc ?? '' }}</p>
								</div>
								<div class="btn-box mt-2 d-flex">
									<a href="{{ $s4S3BtnLink }}" class="btn btn-primary --outline --dark">
										<span>{{ $s4S3BtnText ?? 'Learn more' }}</span>
										<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
											viewBox="0 0 21 10" fill="none">
											<path
												d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
												stroke="white" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="slide-sec slide-sec-4 relative">
					<img src="{{ $s4S4Img }}" class="w-100 slide-main-img img-cover" alt="Slide">
					<div class="slide-content-box d-flex align-items-center h-100 w-100">
						<div class="container">
							<div class="side-box d-flex gap-10 flex-column">
								<div class="slide-title">
									<h4 class="m-0 fw-normal primary-font text-uppercase line line-2">{{ $s4S4Title ??
										'Title of the project comes here' }}</h4>
								</div>
								<div class="slide-img">
									<img src="{{ $s4S4Thumb }}" class="w-100 img-cover" alt="Slide Image">
								</div>
								<div class="slide-content">
									<p class="m-0 font-18 lh-normal line line-3">{{ $s4S4Desc ?? '' }}</p>
								</div>
								<div class="btn-box mt-2 d-flex">
									<a href="{{ $s4S4BtnLink }}" class="btn btn-primary --outline --dark">
										<span>{{ $s4S4BtnText ?? 'Learn more' }}</span>
										<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
											viewBox="0 0 21 10" fill="none">
											<path
												d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
												stroke="white" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				


			</section>

			<!-- For Mobile -->

			<section class="mainslidesec mainslidesec-formobile o-hidden">

				<div class="container">
					<div class="mainslidehome-slider swiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="slide-sec relative">
									<img src="{{ $s4S1Img }}" class="w-100 slide-main-img img-cover" alt="Slide">
									<div class="slide-content-box d-flex align-items-center h-100 w-100">
										<div class="container">
											<div class="side-box d-flex gap-10 flex-column">
												<div class="slide-title">
													<h4 class="m-0 fw-normal primary-font text-uppercase line line-2">{{
														$s4S1Title ?? 'Title of the project comes here' }}</h4>
												</div>
												<div class="slide-img">
													<img src="{{ $s4S1Thumb }}" class="w-100 img-cover"
														alt="Slide Image">
												</div>
												<div class="slide-content">
													<p class="m-0 fw-normal lh-normal line line-3">{{ $s4S1Desc ?? '' }}
													</p>
												</div>
												<div class="btn-box mt-2 d-flex">
													<a href="{{ $s4S1BtnLink }}"
														class="btn btn-primary --outline --dark">
														<span>{{ $s4S1BtnText ?? 'Learn more' }}</span>
														<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
															viewBox="0 0 21 10" fill="none">
															<path
																d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
																stroke="white" stroke-linecap="round"
																stroke-linejoin="round" />
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							
							<div class="swiper-slide">
								<div class="slide-sec relative">
									<img src="{{ $s4S2Img }}" class="w-100 slide-main-img img-cover" alt="Slide">
									<div class="slide-content-box d-flex align-items-center h-100 w-100">
										<div class="container">
											<div class="side-box d-flex gap-10 flex-column">
												<div class="slide-title">
													<h4 class="m-0 fw-normal primary-font text-uppercase line line-2">{{
														$s4S2Title ?? 'Title of the project comes here' }}</h4>
												</div>
												<div class="slide-img">
													<img src="{{ $s4S2Thumb }}" class="w-100 img-cover"
														alt="Slide Image">
												</div>
												<div class="slide-content">
													<p class="m-0 fw-normal lh-normal line line-3">{{ $s4S2Desc ?? '' }}
													</p>
												</div>
												<div class="btn-box mt-2 d-flex">
													<a href="{{ $s4S2BtnLink }}"
														class="btn btn-primary --outline --dark">
														<span>{{ $s4S2BtnText ?? 'Learn more' }}</span>
														<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
															viewBox="0 0 21 10" fill="none">
															<path
																d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
																stroke="white" stroke-linecap="round"
																stroke-linejoin="round" />
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="swiper-slide">
								<div class="slide-sec relative">
									<img src="{{ $s4S3Img }}" class="w-100 slide-main-img img-cover" alt="Slide">
									<div class="slide-content-box d-flex align-items-center h-100 w-100">
										<div class="container">
											<div class="side-box d-flex gap-10 flex-column">
												<div class="slide-title">
													<h4 class="m-0 fw-normal primary-font text-uppercase line line-2">{{
														$s4S3Title ?? 'Title of the project comes here' }}</h4>
												</div>
												<div class="slide-img">
													<img src="{{ $s4S3Thumb }}" class="w-100 img-cover"
														alt="Slide Image">
												</div>
												<div class="slide-content">
													<p class="m-0 fw-normal lh-normal line line-3">{{ $s4S3Desc ?? '' }}
													</p>
												</div>
												<div class="btn-box mt-2 d-flex">
													<a href="{{ $s4S3BtnLink }}"
														class="btn btn-primary --outline --dark">
														<span>{{ $s4S3BtnText ?? 'Learn more' }}</span>
														<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
															viewBox="0 0 21 10" fill="none">
															<path
																d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
																stroke="white" stroke-linecap="round"
																stroke-linejoin="round" />
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="swiper-slide">
								<div class="slide-sec relative">
									<img src="{{ $s4S4Img }}" class="w-100 slide-main-img img-cover" alt="Slide">
									<div class="slide-content-box d-flex align-items-center h-100 w-100">
										<div class="container">
											<div class="side-box d-flex gap-10 flex-column">
												<div class="slide-title">
													<h4 class="m-0 fw-normal primary-font text-uppercase line line-2">{{
														$s4S4Title ?? 'Title of the project comes here' }}</h4>
												</div>
												<div class="slide-img">
													<img src="{{ $s4S4Thumb }}" class="w-100 img-cover"
														alt="Slide Image">
												</div>
												<div class="slide-content">
													<p class="m-0 fw-normal lh-normal line line-3">{{ $s4S4Desc ?? '' }}
													</p>
												</div>
												<div class="btn-box mt-2 d-flex">
													<a href="{{ $s4S4BtnLink }}"
														class="btn btn-primary --outline --dark">
														<span>{{ $s4S4BtnText ?? 'Learn more' }}</span>
														<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10"
															viewBox="0 0 21 10" fill="none">
															<path
																d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"
																stroke="white" stroke-linecap="round"
																stroke-linejoin="round" />
														</svg>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>

			</section>
		</div>

		<!-- Slider Image Sec End -->

		<!-- Property Investment Start -->

		<section class="properrty-investment ">
			<div class="sec-padding --xlarge">
				<div class="container">
					<div class="sec-heading text-center wow fadeInUpBig">
						<h2 class="font-64 m-0 text-uppercase fw-normal">{!! $s5Title ?? 'A Boutique Approach to
							Property Investment &amp; Transformation' !!}</h2>
					</div>
					<div class="wow fadeInUpBig" data-wow-delay="150ms">
						<div class="property-slider swiper ">
							<div class="swiper-wrapper">

								<div class="swiper-slide">
									<div class="pi-box">
										<h5 class="primary-font m-0">{{ $s5Items[0]['num'] ?? '01' }}</h5>
										<div class="line"></div>
										<p class="fc-black font-20 text-uppercase fw-normal">{{ $s5Items[0]['title'] ??
											'Boutique &amp; Selective' }}</p>
										<p class="fw-normal font-14">{{ $s5Items[0]['desc'] ?? '' }}</p>
									</div>
								</div>

								<div class="swiper-slide">
									<div class="pi-box">
										<h5 class="primary-font m-0">{{ $s5Items[1]['num'] ?? '02' }}</h5>
										<div class="line"></div>
										<p class="fc-black font-20 text-uppercase fw-normal">{{ $s5Items[1]['title'] ??
											'Discreet &amp; Relationship-Driven' }}</p>
										<p class="fw-normal font-14">{{ $s5Items[1]['desc'] ?? '' }}</p>
									</div>
								</div>

								<div class="swiper-slide">
									<div class="pi-box">
										<h5 class="primary-font m-0">{{ $s5Items[2]['num'] ?? '03' }}</h5>
										<div class="line"></div>
										<p class="fc-black font-20 text-uppercase fw-normal">{{ $s5Items[2]['title'] ??
											'Meticulous &amp; Expert-Led' }}</p>
										<p class="fw-normal font-14">{{ $s5Items[2]['desc'] ?? '' }}</p>
									</div>
								</div>

								<div class="swiper-slide">
									<div class="pi-box">
										<h5 class="primary-font m-0">{{ $s5Items[3]['num'] ?? '04' }}</h5>
										<div class="line"></div>
										<p class="fc-black font-20 text-uppercase fw-normal">{{ $s5Items[3]['title'] ??
											'Craft Meets Strategy' }}</p>
										<p class="fw-normal font-14">{{ $s5Items[3]['desc'] ?? '' }}</p>
									</div>
								</div>

								<div class="swiper-slide d-none">
									<div class="pi-box">
										<h5 class="primary-font m-0">{{ $s5Items[4]['num'] ?? '05' }}</h5>
										<div class="line"></div>
										<p class="fc-black font-20 text-uppercase fw-normal">{{ $s5Items[4]['title'] ??
											'Results-Oriented' }}</p>
										<p class="fw-normal font-14">{{ $s5Items[4]['desc'] ?? '' }}</p>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="btn-box justify-content-center d-flex wow fadeInUpBig" data-wow-delay="300ms">
						<a href="{{ $s5BtnLink }}" class="btn btn-primary --outline --dark">
							<span>{{ $s5BtnText ?? 'Learn more about us' }}</span>
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

		<!-- Right Image WIth Content Start -->

		<section class="img-with-content right-img-with-content o-hidden forJqueryOnly">
			<div class="container">
				<div class="row align-items-center">

					<div class="col-md-7">
						<div class="img-title-content d-flex flex-column gap-30" id="right-img-content">
							<h3 class="font-64 fw-normal text-uppercase m-0">{!! $s6Title ?? 'Understand Your Return
								Before You Invest' !!}</h3>
							<p class="fw-normal font-20 m-0">{!! $s6Desc ?? 'Our calculator provides an estimated return
								based on a few simple property and investment inputs.' !!}</p>
							<div class="roi-list">
							    <ul class="list-unstyled m-0 text-uppercase d-flex primary-font gap-40">
								<li>{{ $s6Item1 ?? 'Property Size' }}</li>
								<li>{{ $s6Item2 ?? 'Renovation Budget' }}</li>
								<li>{{ $s6Item3 ?? 'Current Valuation' }}</li>
								<li>{{ $s6Item4 ?? 'Resale Value' }}</li>
							</ul>
							</div>

							<div class="btn-box mt-4 d-flex">
								<a href="{{ $s6BtnLink }}" class="btn btn-primary --outline --dark">
									<span>{{ $s6BtnText ?? 'Launch ROI Calculator' }}</span>
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

					<div class="col-md-5">
						<div class="imgbox">
							<img src="{{ $s6Img }}" class="w-100 img-cover" id="right-img" alt="Right Image">
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Right Image WIth Content End -->

		<!-- Gallery Start -->

		<section class="gallery bg-primary">
			<div class="sec-padding --large d-flex flex-column gap-65">
				<div class="container">
					<div class="sec-heading d-flex flex-column gap-39 text-center wow fadeInUpBig">
						<h2 class="font-64 m-0 font-light-grey text-uppercase fw-normal">{{ $s7Title ?? 'Follow Spatial
							for the Latest Projects and Insights' }}</h2>
						<div class="btn-box justify-content-center d-flex wow fadeInUpBig" data-wow-delay="150ms">
							<a href="{{ $s7BtnLink }}" class="btn btn-primary --outline">
								<span>{{ $s7BtnText ?? 'Follow us on instagram' }}</span>
								<!--<svg xmlns="http://www.w3.org/2000/svg" class="instagram" width="18" height="18"-->
								<!--	viewBox="0 0 18 18" fill="none">-->
								<!--	<g clip-path="url(#clip0_17_142)">-->
								<!--		<path-->
								<!--			d="M5.29395 0.360352C9.66419 0.15901 12.1509 0.246623 13.6768 0.515625C14.4362 0.649546 14.9488 0.827154 15.333 1.03027C15.7152 1.23241 15.9832 1.46628 16.25 1.73242C16.9016 2.38327 17.3341 3.11229 17.5615 4.67285C17.7629 6.05506 17.8004 8.07285 17.6846 11.2344L17.626 12.6611C17.585 13.5879 17.4376 14.2102 17.2275 14.75C16.9284 15.5159 16.533 16.0878 15.9971 16.5166C15.4594 16.9467 14.7633 17.2462 13.8428 17.4424C11.9886 17.8374 9.28992 17.8 5.29395 17.6191C4.36388 17.5764 3.74102 17.431 3.2002 17.2207H3.19922C2.04428 16.7735 1.1683 15.8951 0.722656 14.751C0.562725 14.3405 0.448127 13.6102 0.373047 12.7021C0.298741 11.8034 0.264848 10.7586 0.253906 9.73828C0.237506 8.2084 0.273393 6.74032 0.300781 5.91211L0.323242 5.31836C0.387942 3.90301 0.730088 2.69826 1.69824 1.73242L1.69922 1.7334C2.66441 0.772291 3.86383 0.424881 5.29395 0.360352ZM12.6055 1.46777C8.66705 1.29003 6.38828 1.30955 4.97852 1.48926C4.27128 1.57941 3.76975 1.71092 3.38184 1.88574C2.98945 2.06261 2.72478 2.27874 2.48633 2.5166C1.79553 3.2075 1.54546 4.07047 1.46191 4.97754L1.43555 5.36816C1.41163 5.89584 1.35558 7.77964 1.37207 9.70312C1.38032 10.6648 1.4068 11.64 1.46484 12.4619C1.52195 13.2705 1.61182 13.968 1.76074 14.3496C2.07269 15.1524 2.66242 15.7705 3.44336 16.1201L3.60254 16.1865C3.90081 16.302 4.32153 16.4323 5.02539 16.4902L5.34473 16.5107C9.30023 16.6922 11.7785 16.7133 13.3701 16.4209C14.1706 16.2738 14.7688 16.0437 15.2236 15.6982C15.6823 15.3498 15.975 14.8993 16.1895 14.3496C16.3218 14.0095 16.474 13.51 16.5146 12.6113C16.6955 8.68814 16.676 6.41495 16.4951 5.00684C16.4044 4.3004 16.2714 3.7991 16.0957 3.41113C15.918 3.01875 15.7014 2.75455 15.4629 2.5166V2.51562C14.6717 1.72847 13.6555 1.51526 12.6055 1.46777ZM8.97461 4.65332C11.3769 4.65332 13.3232 6.59454 13.3232 8.98926C13.3232 11.384 11.3768 13.3262 8.97461 13.3262C6.57258 13.326 4.62603 11.3839 4.62598 8.98926C4.62598 6.59466 6.57245 4.65352 8.97461 4.65332ZM8.97461 5.76172C7.18858 5.76192 5.74023 7.20706 5.74023 8.98926C5.74028 10.7722 7.18851 12.2176 8.97461 12.2178C10.7609 12.2178 12.2099 10.7723 12.21 8.98926C12.21 7.20694 10.7608 5.76172 8.97461 5.76172ZM13.7549 3.39844C14.2113 3.39844 14.5811 3.76817 14.5811 4.2207C14.581 4.67336 14.2112 5.04297 13.7549 5.04297C13.2991 5.04272 12.9307 4.67347 12.9307 4.2207C12.9307 3.76805 13.2989 3.39869 13.7549 3.39844Z"-->
								<!--			fill="white" stroke="#280000" stroke-width="0.5" />-->
								<!--	</g>-->
								<!--	<defs>-->
								<!--		<clipPath id="clip0_17_142">-->
								<!--			<rect width="18" height="18" fill="white" />-->
								<!--		</clipPath>-->
								<!--	</defs>-->
								<!--</svg>-->
								<svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10" fill="none">
										<path d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003" stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
							</a>
						</div>
					</div>
				</div>
				<div class="container-fluid wow fadeInUpBig" data-wow-delay="300ms">
					<div class="gallery-slider swiper">
						<div class="swiper-wrapper">

							<div class="swiper-slide">
								<div class="gallery-box"><img src="{{ $s7Gal[0] }}" class="w-100 h-100 img-cover"
										alt="Gallery"></div>
							</div>
							<div class="swiper-slide">
								<div class="gallery-box"><img src="{{ $s7Gal[1] }}" class="w-100 h-100 img-cover"
										alt="Gallery"></div>
							</div>
							<div class="swiper-slide">
								<div class="gallery-box"><img src="{{ $s7Gal[2] }}" class="w-100 h-100 img-cover"
										alt="Gallery"></div>
							</div>
							<div class="swiper-slide">
								<div class="gallery-box"><img src="{{ $s7Gal[3] }}" class="w-100 h-100 img-cover"
										alt="Gallery"></div>
							</div>
							<div class="swiper-slide">
								<div class="gallery-box"><img src="{{ $s7Gal[4] }}" class="w-100 h-100 img-cover"
										alt="Gallery"></div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Gallery End -->

		<!-- Responsile Start -->

		<section class="responsible o-hidden">
			<div class="row h-100 no-gutters">
				<div class="col-md-3 d-flex align-items-end">
					<div class="response-left text-right">
						<img src="{{ $s8ImgLeft }}" class="w-100 h-100 img-cover" id="response-right" alt="Response">
					</div>
				</div>
				<div class="col-md-6 d-flex align-items-center">
					<div class="response-content" id="response-content">
						<h2 class="font-64 fw-normal m-0 text-uppercase">{!! $s8Title ?? 'Responsible Luxury.
							Future-Proofed Investment.' !!}</h2>
						<div class="response-text">
							<p class="m-0 font-18">{!! $s8Desc ?? '' !!}</p>
						</div>
						<div class="btn-box d-flex">
							<a href="{{ $s8BtnLink }}" class="btn btn-primary --outline --dark">
								<span>{{ $s8BtnText ?? 'Learn more' }}</span>
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
						<img src="{{ $s8ImgRight }}" class="w-100 h-100 img-cover" id="response-left" alt="Response">
					</div>
				</div>
			</div>





		</section>

		<!-- Responsile End -->
		</main>
		@endsection