<section id="faq-section" class="sec-padding pt-0">
    <div class="faq-wrapper sec-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-uppercase">faqs</h2>
                </div>
                <div class="col-md-4 text-start text-lg-end mt-3 mt-xl-0">
                    <!-- {{route('site.faqs')}} -->
                    <!-- <a href="#" class="butn btn-arrow-primary">
                        <span>See all FAQS
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="11" viewBox="0 0 21 11"
                                fill="none">
                                <path
                                    d="M0.713471 4.42178L0.713472 5.84873L17.7215 5.84873L14.3869 9.18334L15.3989 10.1954L20.459 5.13525L15.3989 0.0751371L14.3869 1.08716L17.7215 4.42177L0.713471 4.42178Z"
                                    fill="#1E1E1E" />
                            </svg>
                        </span>
                    </a> -->
                </div>
            </div>
            <div class="row mt-4 mt-lg-5">
                <div class="accordion" id="faqAccordion">
                    <div class="row align-items-start">
                        @php
                            $x = 0;
                        @endphp
                        @foreach ($faqs as $faq)
                            <div class="col-xl-6">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $x }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $x }}" aria-expanded="true"
                                            aria-controls="collapse{{ $x }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $x }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $x }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <p>
                                                {!! $faq->answer !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $x++;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
