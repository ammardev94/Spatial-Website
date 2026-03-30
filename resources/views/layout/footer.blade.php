<footer class="footer">
    <div class="container">
        <div class="row py-5 justify-content-between">
            <div class="col-xl-4 col-md-12">
                <img src="{{ asset('frontend/images/logo2.svg') }}" width="315px" />
            </div>
            <div class="col-xl-7 col-md-12 mt-5 mt-xl-0">
                <div class="newsletter-container">
                    <form action="{{ route('subscriber.store') }}" method="POST">
                        @csrf
                        <input
                            type="email"
                            name="email"
                            class="form-control search-input"
                            placeholder="Your Email" required="required" />
                        <button
                            type="submit"
                            class="butn btn-arrow-primary is-filled">
                            <span>Subscribe to newsletter
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="21"
                                    height="11"
                                    viewBox="0 0 21 11"
                                    fill="none">
                                    <path
                                        d="M0.713471 4.42178L0.713472 5.84873L17.7215 5.84873L14.3869 9.18334L15.3989 10.1954L20.459 5.13525L15.3989 0.0751371L14.3869 1.08716L17.7215 4.42177L0.713471 4.42178Z"
                                        fill="#1E1E1E" />
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="middle-row py-5 border-top border-bottom">
            <div class="foo-links foo-contact-details mt-md-0">
                <h5 class="text-uppercase">Contact us</h5>
                <ul class="list-unstyled p-0 mt-2">
                    <li class="py-lg-2 py-1">
                        <img src="{{ asset('icons/phone-svgrepo-com.svg') }}" style="max-width:15px;">
                        <a style="text-transform: none;padding-left: 2%;" href="tel:+97143999936">+971 4 3999936</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <img src="{{ asset('icons/whatsapp-svgrepo-com.svg') }}" style="max-width:18px;">
                        <a style="text-transform: none;padding-left: 2%;" href="https://wa.me/971503751280" target="_blank">+971 50 3751280</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <img src="{{ asset('icons/email-1564-svgrepo-com.svg') }}" style="max-width:15px;">
                        <a style="text-transform: none;padding-left: 2%;" href="mailto:info@prescott.ae">info@prescott.ae</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <img src="{{ asset('icons/email-1564-svgrepo-com.svg') }}" style="max-width:15px;">
                        <a style="text-transform: none;padding-left: 2%;" href="mailto:sales@prescott.ae">sales@prescott.ae</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <img src="{{ asset('icons/email-1564-svgrepo-com.svg') }}" style="max-width:15px;">
                        <a style="text-transform: none;padding-left: 4px;" href="mailto:customercare@prescott.ae">customercare@prescott.ae</a>
                    </li>
                </ul>
            </div>
            <div class="foo-links mt-4 mt-md-0">
                <h5 class="text-uppercase">on going projects</h5>
                <ul class="list-unstyled p-0 mt-2">
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/the-caden') }}">The Caden</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/verano') }}">Verano</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/legado') }}">Legado</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/fairway-residences') }}">Fairway Residences</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/serene-gardens-ii') }}">Serene Gardens II</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/serene-gardens') }}">Serene Gardens</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/elevate') }}">Elevate</a>
                    </li>
                </ul>
            </div>
            <div class="foo-links mt-4 mt-md-0">
                <h5 class="text-uppercase">Completed projects</h5>
                <ul class="list-unstyled p-0 mt-2">
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/prime-gardens') }}">Prime Gardens</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/prime-townhouses') }}">Prime Townhouses</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{url('/project/prime-views') }}">Prime Views</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{ url('/project/prime-villas')}}">Prime Villas</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{ url('/project/prime-business-centre')}}">Prime Business Center</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{ url('/project/prime-residency-3')}}">Prime Residency 3</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{ url('/project/prime-residency-i-ii')}}">Prime Residency I & II</a>
                    </li>
                </ul>
            </div>
            <div class="foo-links mt-4 mt-md-0">
                <h5 class="text-uppercase">Resources</h5>
                <ul class="list-unstyled p-0 mt-2">
                    <li class="py-lg-2 py-1">
                        <a href="{{ url('/news#blogs') }}">Blogs</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{ url('/news#pressrelease') }}">Press Release</a>
                    </li>
                    <li class="py-lg-2 py-1">
                        <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                    </li>
                    {{-- <li class="py-lg-2 py-1">
                        <a href="javascript:void(0);">FAQs</a>
                    </li> --}}
                    <li class="py-lg-2 py-1">
                        <a href="{{ route('site.cookiepolicy') }}">Cookie Policy</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row pt-4 pb-4 justify-content-between bottom-row align-items-center">
            <div class="col-md-4">
                <p class="text-uppercase">Prescott Developments 2025</p>
            </div>
            <div class="col-md-4">
                <div class="social-links">
                    <ul class="list-unstyled mb-0 d-flex justify-content-center">
                        <li>
                            <a href="https://www.instagram.com/prescottuae?igsh=ZG1renFuM2owYmpv" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                    <path d="M11.5885 0H4.74483C1.77217 0 0 1.77217 0 4.74483V11.5803C0 14.5612 1.77217 16.3333 4.74483 16.3333H11.5803C14.553 16.3333 16.3252 14.5612 16.3252 11.5885V4.74483C16.3333 1.77217 14.5612 0 11.5885 0ZM8.16667 11.3353C6.419 11.3353 4.998 9.91433 4.998 8.16667C4.998 6.419 6.419 4.998 8.16667 4.998C9.91433 4.998 11.3353 6.419 11.3353 8.16667C11.3353 9.91433 9.91433 11.3353 8.16667 11.3353ZM13.0013 3.98533C12.9605 4.08333 12.9033 4.17317 12.8298 4.25483C12.7482 4.32833 12.6583 4.3855 12.5603 4.42633C12.4623 4.46717 12.3562 4.49167 12.25 4.49167C12.0295 4.49167 11.8253 4.41 11.6702 4.25483C11.5967 4.17317 11.5395 4.08333 11.4987 3.98533C11.4578 3.88733 11.4333 3.78117 11.4333 3.675C11.4333 3.56883 11.4578 3.46267 11.4987 3.36467C11.5395 3.2585 11.5967 3.17683 11.6702 3.09517C11.858 2.90733 12.1438 2.8175 12.4052 2.87467C12.4623 2.88283 12.5113 2.89917 12.5603 2.92367C12.6093 2.94 12.6583 2.9645 12.7073 2.99717C12.7482 3.02167 12.789 3.0625 12.8298 3.09517C12.9033 3.17683 12.9605 3.2585 13.0013 3.36467C13.0422 3.46267 13.0667 3.56883 13.0667 3.675C13.0667 3.78117 13.0422 3.88733 13.0013 3.98533Z" fill="white" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://x.com/prescottdubai?s=21" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <g clip-path="url(#clip0_566_127)">
                                        <path d="M9.4893 6.77491L15.3176 0H13.9365L8.87577 5.88256L4.8338 0H0.171875L6.28412 8.89547L0.171875 16H1.55307L6.8973 9.78782L11.1659 16H15.8278L9.48896 6.77491H9.4893ZM7.59756 8.97384L6.97826 8.08805L2.05073 1.03974H4.17217L8.14874 6.72795L8.76804 7.61374L13.9371 15.0075H11.8157L7.59756 8.97418V8.97384Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_566_127">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/prescottuae?mibextid=wwXIfr&rdid=HV5NzoltSgyLNlns&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F16W4TbKuXC%2F%3Fmibextid%3DwwXIfr#" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                    <g clip-path="url(#clip0_566_120)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2264 4.2691C10.6173 3.90684 11.2224 3.94632 11.2668 3.9483L13.7987 3.94731L13.8539 0.294149L13.4719 0.200375C13.2271 0.140175 12.4779 0 10.8266 0C7.88608 0 5.90995 2.05805 5.90995 5.11995V5.94219H2.94873V9.89048H5.90995V16.8H9.85825V9.89048H12.9794L13.5223 5.94219H9.85826V5.33711C9.85826 4.85641 9.98262 4.49613 10.2264 4.2691Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_566_120">
                                            <rect width="16.8" height="16.8" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/prescott-uae/" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                    <g clip-path="url(#clip0_566_131)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.2 17.3726H14.1775V11.5562C14.1775 10.0338 13.5484 8.99446 12.1647 8.99446C11.1064 8.99446 10.5179 9.69582 10.2439 10.3717C10.1412 10.6144 10.1572 10.9523 10.1572 11.2903V17.3726H6.17226C6.17226 17.3726 6.22362 7.06944 6.17226 6.13289H10.1572V7.89687C10.3927 7.12559 11.6661 6.02482 13.6981 6.02482C16.2193 6.02482 18.2 7.64155 18.2 11.1229V17.3726ZM2.14231 4.72699H2.11663C0.832528 4.72699 0 3.86777 0 2.77865C0 1.66835 0.857137 0.827148 2.16692 0.827148C3.47563 0.827148 4.28034 1.66624 4.30602 2.77549C4.30602 3.8646 3.47563 4.72699 2.14231 4.72699ZM0.459055 6.13289H4.0064V17.3726H0.459055V6.13289Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_566_131">
                                            <rect width="18.2" height="18.2" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <p class="text-uppercase text-end" style="display:none!important;">
                    Designed by
                    <a href="https://brande.ae" target="_blank">Brande.ae</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<div class="sticky-whatsapp">
    <a href="https://api.whatsapp.com/send/?phone=9710503751280" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" enable-background="new 0 0 64 64" viewBox="0 0 64 64" width="300" height="300" version="1.1">
            <g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)">
                <g>
                    <path d="m5 59 12-3.3c4.3 2.7 9.5 4.3 15 4.3 15.5 0 28-12.5 28-28s-12.5-28-28-28-28 12.5-28 28c0 5.5 1.6 10.7 4.3 15z" fill="#000" stroke="#ffffff" stroke-miterlimit="10" stroke-width="3" fill-opacity="1" data-original-color="#25d366ff" stroke-opacity="1" data-original-stroke-color="#ffffffff" data-original-stroke-width="5" style="" />
                    <path d="m45.9 39.6c-1.9 4-5.4 4.5-5.4 4.5-3 .6-6.8-.7-9.8-2.1-4.3-2-8-5.2-10.5-9.3-1.1-1.9-2.1-4.1-2.2-6.2 0 0-.4-3.5 3-6.3.3-.2.6-.3 1-.3h1.5c.6 0 1.2.4 1.4 1l2.3 5.6c.2.6.1 1.2-.3 1.7l-1.5 1.6c-.5.5-.5 1.2-.2 1.8.1.2.3.5.6.8 1.8 2.4 4.2 4.2 6.9 5.4.4.2.7.3 1 .4.7.2 1.3-.1 1.7-.6l1.2-1.8c.3-.5.9-.8 1.5-.7l6 .9c.6.1 1.1.6 1.3 1.2l.4 1.5c.2.2.2.6.1.9z" fill="#ffffff" fill-opacity="1" data-original-color="#ffffffff" stroke="none" stroke-opacity="1" style="" />
                </g>
            </g>
        </svg>
    </a>
</div>

<div class="overlay"></div>

<div class="download-broucher-popup">
    <div class="download-broucher-popup-main">
        <div class="download-broucher-popup-form">
            <div class="db-close-btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <form id="downloadBrochureForm" action="javascript:void(0);" method="POST">
                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="fname" placeholder="Your Name"
                            required />
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" type="email" name="mail" placeholder="Email"
                            required />
                    </div>
                    <div class="col-md-12">
                        <input type="tel" name="phone" class="form-control" placeholder="XXXXXXXXX"
                            required id="phone1" />
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="butn btn-arrow-primary">
                            <span>Submit
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="11"
                                    viewBox="0 0 21 11" fill="none">
                                    <path
                                        d="M0.713471 4.42178L0.713472 5.84873L17.7215 5.84873L14.3869 9.18334L15.3989 10.1954L20.459 5.13525L15.3989 0.0751371L14.3869 1.08716L17.7215 4.42177L0.713471 4.42178Z"
                                        fill="#1E1E1E" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

                <!-- Hidden field to store full number -->
                <input type="hidden" name="full_phone" id="full_phone1" />
            </form>
        </div>
    </div>
</div>

@push('script')
<script type="text/javascript">
    $(document).ready(function() {

        $("#downloadBrochureForm").on("submit", function(e) {

            e.preventDefault();
            var projectId = "@if(!empty($project->id)){{ $project->id }}@endif";

            const form = $(this);
            const btn = form.find("button[type=submit]");
            
            // Phone validation using intl-tel-input
            const phoneInput = $("#phone1");
            const iti = phoneInput.data('itiInstance');
            
            if (iti && !iti.isValidNumber()) {
                alert("Please enter a valid phone number.");
                return false;
            }
            
            btn.prop("disabled", true).text("Submitting...");

            const data = {
                project_id: projectId,
                fname: form.find("input[name=fname]").val(),
                mail: form.find("input[name=mail]").val(),
                phone: form.find("input[name=phone]").val(),
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('project_brochure.store') }}",
                type: "POST",
                data: data,
                success: function(response) {
                    btn.prop("disabled", false).text("Submit");

                    if (response.status) {
                        alert(response.message);

                        // File already downloaded when button was clicked
                        // No need to download again on form submission

                        $(".close").click();
                        $(".overlay").removeClass("active");

                        form[0].reset();
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                },
                error: function(xhr) {
                    $(".close").click();
                    // $(".download-broucher-popup").fadeOut(300);
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        if (errors) {
                            let message = '';
                            Object.values(errors).forEach(msgArray => {
                                message += msgArray[0] + '\n';
                            });
                            alert(message);
                        } else if (xhr.responseJSON.message) {
                            alert(xhr.responseJSON.message);
                        } else {
                            alert('Validation failed.');
                        }
                    } else {
                        alert('Something went wrong. Please try again later.');
                    }
                }
            });
        });
    });
</script>
@endpush