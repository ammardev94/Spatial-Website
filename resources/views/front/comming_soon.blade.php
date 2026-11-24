@extends('front.layouts.master')
@section('title', 'Comming Soon')
@section('content')


    <!--<main id="about">-->

    <!--    <section class="banner relative">-->
    <!--        <img src="https://spatialpropertygroup.com/ae/storage/page-images/3/jH2ZxwM8YFeIjJZ3SR4rm7tssc0mKymfT08evpBZ.png" class="w-100 img-cover" alt="Banner Image">-->
    <!--        <div class="banner-content">-->
    <!--            <div class="container">-->
    <!--                <div class="banner-head d-flex gap-35 flex-column">-->
    <!--                    <h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">-->
    <!--                        Springs Villa Contemporary <br> Renovation-->
    <!--                    </h1>-->
    <!--                    <p>Comming Soon</p>-->
    <!--                    <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">-->
    <!--                        <a href="https://spatialpropertygroup.com/ae/contact-us" class="btn btn-primary --outline">-->
    <!--                            <span>-->
    <!--                                Learn More-->
    <!--                            </span>-->
    <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="10" viewBox="0 0 21 10"-->
    <!--                                fill="none">-->
    <!--                                <path-->
    <!--                                    d="M20.4998 4.65385L0.500122 4.65384M20.4998 4.65385L16.4998 8.80769M20.4998 4.65385L16.4998 0.500003"-->
    <!--                                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />-->
    <!--                            </svg>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->
    <!--</main>-->
    
    
    
    <style>
.banner{position:relative;overflow:hidden}.banner img.w-100{display:block;width:100%;height:auto;max-width:100%}.banner-status{display:flex;align-items:flex-start;gap:16px;margin-top:-10px}.status-line{display:block;width:38px;height:1px;margin-top:8px;background:#c6a77b}.status-title{margin:0 0 8px!important;color:#c6a77b!important;font-size:12px!important;font-weight:600;text-transform:uppercase;letter-spacing:.16em}.status-copy{margin:0!important;color:rgba(255,255,255,.85)!important;font-size:14px;line-height:1.55}.banner .banner-head{position:relative;z-index:1}.banner .banner-head h1{max-width:900px}.banner:after{content:"";position:absolute;inset:0;background:linear-gradient(90deg,rgba(0,0,0,.68),rgba(0,0,0,.15));pointer-events:none}.banner-content{z-index:1}@media(max-width:576px){.desktop-break{display:none}.banner-status{gap:12px;margin-top:-8px}.status-copy{font-size:13px}.status-line{width:25px}}
</style>
<style>
@media(max-width:576px){
    .header{position:relative!important;background: #280000 !important;;z-index:10}
    .header .container{padding:0 18px}
    .banner{min-height:520px}
    .banner img.w-100{height:520px;object-fit:cover;object-position:58% center}
    .banner-content{position:absolute!important;inset:0;display:flex;align-items:center;min-height:520px;height:520px;padding:78px 0 44px}
    .banner-head{gap:22px!important;padding:0 18px}
    .banner .banner-head h1{max-width:330px;font-size:clamp(2.35rem,11vw,3.8rem);line-height:1.02;letter-spacing:-.025em}
    .desktop-break{display:none}
    .banner-status{gap:12px;margin-top:0}
    .status-copy{font-size:13px;line-height:1.45}
    .status-title{font-size:10px!important;margin-bottom:6px!important}
    .status-line{width:25px;margin-top:6px}
    .banner-head .btn-box{margin-top:4px}
    .banner-head .btn{padding:12px 15px;font-size:9px}
}
</style>
<main id="about">

        <section class="banner relative">
            <img src="https://spatialpropertygroup.com/ae/storage/page-images/3/jH2ZxwM8YFeIjJZ3SR4rm7tssc0mKymfT08evpBZ.png" class="w-100 img-cover" alt="Banner Image">
            <div class="banner-content">
                <div class="container">
                    <div class="banner-head d-flex gap-35 flex-column">
                        <h1 class="m-0 fw-normal text-uppercase fc-white wow fadeInUpBig" data-wow-delay="150ms">
                            Springs Villa Contemporary <br> Renovation
                        </h1>
                        <div class="banner-status">
                            <span class="status-line"></span>
                            <div>
                                <p class="status-title">Coming soon</p>
                            </div>
                        </div>
                        <div class="btn-box d-flex wow fadeInUpBig" data-wow-delay="300ms">
                            <a href="https://spatialpropertygroup.com/ae/contact-us" class="btn btn-primary --outline">
                                <span>
                                    Learn More
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
    </main>

@endsection