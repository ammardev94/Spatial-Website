$(function () {
    gsap.registerPlugin(ScrollTrigger);

    const mm = gsap.matchMedia();

    mm.add("(min-width: 1025px)", () => {
        // Refresh on window load
        $(window).on("load", function () {
            ScrollTrigger.refresh();
        });

        // HOME PAGE Animations
        if ($("#homepage").length) {
            // ABOUT
            let multianimationTL = gsap.timeline({
                scrollTrigger: {
                    trigger: "#homepage #multi-animation",
                    start: "top top",
                    end: "+=250%",
                    scrub: true,
                    pin: true,
                    // markers: true,
                    // ease:"power1.in"
                },
            });

            // Animation 1
            multianimationTL
                .fromTo(
                    "#homepage  img#leftimgbox",
                    { left: "-100%" },
                    { left: 0, ease: "none", duration: 4 }, // duration seconds mein
                )
                .fromTo(
                    "#homepage #leftimgcontent",
                    { x: 1200 },
                    { x: 0, ease: "none", duration: 4, },
                    "<",
                )
                .fromTo(
                    "#homepage .left-img-with-content",
                    { x: 0 },
                    { x: "100%", ease: "none", opacity: 0, duration: 5 },
                    "+=0.5",
                )
                .fromTo(
                    "#homepage .transform",
                    { x: "-100%" },
                    { x: 0, ease: "none", duration: 4 },
                    "<",
                )
                .fromTo(
                    "#homepage .slide-sec-1",
                    { x: 2200 },
                    { x: 0, ease: "none", duration: 4 },
                    "+=0.3"
                )
                .fromTo(
                    "#homepage .slide-sec-2",
                    { x: 2200 },
                    { x: 0, ease: "none", duration: 4 },
                    "+=0.3"
                );

            let rightimagecontentTL = gsap.timeline({
                scrollTrigger: {
                    trigger: "#homepage .right-img-with-content",
                    start: "top top",
                    end: "+=100%",
                    scrub: true,
                    pin: true,
                    // markers: true,
                    // ease:"power1.in"
                },
            });

            rightimagecontentTL
                .fromTo(
                    "#homepage #right-img-content",
                    { x: -1100 },
                    { x: 0, ease: "none", duration: 4 },
                )
                .fromTo(
                    "#homepage #right-img",
                    { x: 1200 },
                    { x: 0, ease: "none", duration: 4 },
                    "<",
                );


            let responseTL = gsap.timeline({
                scrollTrigger: {
                    trigger: "#homepage .responsible",
                    start: "top top",
                    end: "+=100%",
                    scrub: true,
                    pin: true,
                    // markers: true,
                    // ease:"power1.in"
                },
            });

            responseTL
                .fromTo(
                    "#homepage #response-left",
                    { x: 1000 },
                    { x: 0, ease: "none", duration: 4 },
                )
                .fromTo(
                    "#homepage #response-content",
                    { y: 1000 },
                    { y: 0, ease: "none", duration: 4 },
                    "<",
                )
                .fromTo(
                    "#homepage #response-right",
                    { x: -1000 },
                    { x: 0, ease: "none", duration: 4 },
                    "<",
                );

        }


        if ($("#about").length) {
            let responseTL = gsap.timeline({
                scrollTrigger: {
                    trigger: "#about .responsible",
                    start: "-150% top",
                    end: "+=150%",
                    scrub: true,
                    // pin: true,
                    // markers: true,
                    // ease:"power1.in"
                },
            });

            responseTL
                .fromTo(
                    "#about #response-left",
                    { x: 1000 },
                    { x: 0, ease: "none", duration: 4 },
                )
                .fromTo(
                    "#about #response-content",
                    { y: 1000 },
                    { y: 0, ease: "none", duration: 4 },
                    "<",
                )
                .fromTo(
                    "#about #response-right",
                    { x: -1000 },
                    { x: 0, ease: "none", duration: 4 },
                    "<",
                );
        }
    });


    if ($("#homepage").length) {
        const video = document.querySelector(".bg-video");

        ScrollTrigger.create({
            trigger: ".transformation",
            start: "top 80%",
            end: "bottom 20%",

            onEnter: () => {
                video.currentTime = 0;
                video.play();
            },

            onEnterBack: () => {
                video.currentTime = 0;
                video.play();
            },

            onLeave: () => {
                video.pause();
            },

            onLeaveBack: () => {
                video.pause();
            }
        });
    }

    // For Smooth Scroll
    const lenis = new Lenis({
        duration: 1,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        direction: "vertical",
        gestureDirection: "vertical",
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);
});




// Sticky Header

$(window).on('scroll', function () {
    if ($(window).scrollTop() > 50) {
        $('.header').addClass('sticky');
    } else {
        $('.header').removeClass('sticky');
    }
});


$(function () {


    $(document).ready(function () {

        if ($(window).width() >= 991) {

            // WOW Init
            new WOW().init();

            /*
            =========================
            RIGHT SIDE EXTEND
            =========================
            */

            var secWidth = $(".forJqueryOnly").width();
            var containerWidth = $(".container").width();

            var marginLEftRight = (secWidth - containerWidth) / 2;

            $('.forJqueryOnly .imgbox-main').css({
                width: 'calc(100% + ' + marginLEftRight + 'px)'
            });

            $('.forJqueryOnly .imgbox').css({
                width: 'calc(100% + ' + marginLEftRight + 'px)'
            });

            $('.forJqueryOnly .material-slider').css({
                width: 'calc(100% + ' + marginLEftRight + 'px)'
            });

            $('.banner-sec .swiper-pagination').css({
                right: marginLEftRight + 'px'
            });


            /*
            =========================
            LEFT SIDE EXTEND
            =========================
            */

            var leftSecWidth = $(".leftBoxforJqueryOnly").width();
            var leftContainerWidth = $(".container").width();

            var leftFinalMargin = (leftSecWidth - leftContainerWidth) / 2;

            $('.leftBoxforJqueryOnly .imgbox').css({
                width: 'calc(100% + ' + leftFinalMargin + 'px)',
                marginLeft: '-' + leftFinalMargin + 'px'
            });

        }

    });


    // Select all menu links
    document.querySelectorAll('footer .rightbox .footer-menu ul li a').forEach(link => {
        // Wrap the existing text in a <span>
        const text = link.textContent.trim();
        link.innerHTML = `<span>${text}</span>`;
        // Set data-text attribute for ::after content
        link.setAttribute('data-text', text);
    });


    // Banner slider
    var bannerSlider = new Swiper(".main-banner-slider", {
        loop: true,
        speed: 1000,
        effect: "fade",
        fadeEffect: {
            crossFade: true
        },
        // autoplay: {
        //     delay: 2500,
        //     disableOnInteraction: false,
        // },
        navigation: {
            nextEl: ".banner-next-btn",
            prevEl: ".banner-prev-btn",
        },
        pagination: {
            el: ".banner-pagination",
            clickable: true,
        },
        mousewheel: false,
        keyboard: true,

    });


    // Aesthetic Treatment Slider
    const relatedPortfolio = new Swiper(".related-slider", {
        loop: true,
        slidesPerView: 3,
        spaceBetween: 0,
        speed: 800,
        allowTouchMove: true,

        // navigation: {
        //     nextEl: ".facilities-dots-n-arrow .cs-swiper-button-next",
        //     prevEl: ".facilities-dots-n-arrow .cs-swiper-button-prev",
        // },


        breakpoints: {

            0: {
                slidesPerView: 1,
                spaceBetween: 0,
            },

            768: {
                slidesPerView: 2,
                spaceBetween: 0,
            },
            1081: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
            pauseOnMouseEnter: true,
        },

    });


    // Aesthetic Treatment Slider
    const propertySlider = new Swiper(".property-slider", {
        loop: true,
        slidesPerView: 4,
        spaceBetween: 0,
        speed: 800,
        allowTouchMove: true,

        // navigation: {
        //     nextEl: ".facilities-dots-n-arrow .cs-swiper-button-next",
        //     prevEl: ".facilities-dots-n-arrow .cs-swiper-button-prev",
        // },


        breakpoints: {

            0: {
                slidesPerView: 1,
                spaceBetween: 0,
            },

            768: {
                slidesPerView: 2,
                spaceBetween: 0,
            },
            1081: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
            pauseOnMouseEnter: true,
        },

    });





    // Services Slider
    var servicessSlider = new Swiper(".gallery-slider", {
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {

            0: {
                slidesPerView: 1.3,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 24,
            },

        },
    });


    const galleryThumbsSlider = new Swiper(".thumbs-slider", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 800,
        watchSlidesProgress: true,
        breakpoints: {

            320: {
                slidesPerView: 2,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
        },
    });

    const esgSlider = new Swiper(".esg-slider", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 800,
        watchSlidesProgress: true,
        breakpoints: {

            320: {
                slidesPerView: 2,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 35,
            },
        },
    });

    const propSlider = new Swiper(".property-slider", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 800,
        watchSlidesProgress: true,
        breakpoints: {

            320: {
                slidesPerView: 2,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
    });

    // Gallery Sliders 
    const galleryMainSlider = new Swiper(".main-gallery-slider", {
        loop: true,
        slidesPerView: 1,
        effect: "fade",
        fadeEffect: {
            crossFade: true,
        },
        speed: 800,
        thumbs: {
            swiper: galleryThumbsSlider,
        },

        navigation: {
            nextEl: ".gallery-sec .cs-swiper-button-next",
            prevEl: ".gallery-sec .cs-swiper-button-prev",
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });



    const materialSlider = new Swiper(".material-slider", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 800,
        watchSlidesProgress: true,
        breakpoints: {

            320: {
                slidesPerView: 2,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3.2,
                spaceBetween: 30,
            },
        },
    });

     const ptlSlider = new Swiper(".property-transform-slider", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 800,
        watchSlidesProgress: true,
        breakpoints: {

            320: {
                slidesPerView: 2,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 45,
            },
        },
    });

    const pgSlider = new Swiper(".pg-slider", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        speed: 800,
        watchSlidesProgress: true,
        breakpoints: {

            320: {
                slidesPerView: 2,
            },
            640: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
        },
    });

    const listItems = document.querySelectorAll(".insight-list ul li");

    listItems.forEach((item, index) => {
        item.setAttribute("data-number", index + 1);
    });


    // accordion
    accordionBox();

    function accordionBox() {
        $('.faq-question').click(function () {
            let $this = $(this);
            let $accordionRoot = $this.parents('[accordion-root]');

            if ($this.parents('[is-multiple]').attr('is-multiple') == 'true') {
                // In "multiple" mode, toggle the clicked accordion
                $this.toggleClass('active').siblings('.faq-answer').slideToggle();
            } else {
                // In "single" mode, deactivate all other accordions
                if (!$this.hasClass('active')) {
                    // Close all other accordions
                    $accordionRoot.find('.faq-accordion').removeClass('active');
                    $accordionRoot.find('.faq-question').removeClass('active');
                    $accordionRoot.find('.faq-answer').slideUp();

                    // Activate the clicked accordion
                    $this.addClass('active').siblings('.faq-answer').slideDown();
                    $this.parents('.faq-accordion').addClass('active');
                } else {
                    // Deactivate the current accordion if it's already active
                    $this.removeClass('active').siblings('.faq-answer').slideUp();
                    $this.parents('.faq-accordion').removeClass('active');
                }
            }
        });
    }

    // Bottom To Top Button
    $('#bottomToTop').on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
    });


    // signature Project Gallery Tabbing
    $('.tabbing-wrapper .tab-links li').click(function () {
        $('.tabbing-wrapper .tab-links li').removeClass('active');
        $('.tabbing-wrapper .tabbing-content .tab-content').removeClass('active');
        $(this).addClass('active');
        var tab_id = $(this).index();
        tab_id += 1;
        $('.tabbing-wrapper .tabbing-content .tab-content:nth-child(' + tab_id + ')').addClass('active');

    });
    $('.tabbing-wrapper .tab-links li:first-child').addClass('active');
    $('.tabbing-wrapper .tabbing-content .tab-content:first-child').addClass('active');


    // Footer Accordion Responsive
    if ($(window).width() < 641) {
        $('.footer-menu .mb-dropdown-title').click(function () {
            let $this = $(this);
            let $accordionRoot = $this.parents('.rightbox');


            // In "single" mode, deactivate all other accordions
            if (!$this.hasClass('open')) {
                // Close all other accordions
                $accordionRoot.find('.footer-menu').removeClass('open');
                $accordionRoot.find('.footer-menu ul').slideUp();

                // Activate the clicked accordion
                $this.addClass('open').siblings('.footer-menu ul').slideDown();
                $this.parents('.footer-menu').addClass('open');
            } else {
                // Deactivate the current accordion if it's already open
                $this.removeClass('open').siblings('.footer-menu ul').slideUp();
                $this.parents('.footer-menu').removeClass('open');
            }

        });
    }

    // For Mobile 
    if ($(window).width() < 600) {
        // Who We Are Slider
        $('.mb-who-we-are-slider').slick({
            dots: false,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            speed: 500,
            rows: 0,
            pauseOnHover: false,
            vertical: false,
            verticalSwiping: false,
            verticalReverse: false,
            responsive: [
                {
                    breakpoint: 601,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                        draggable: true,
                        swipe: true,
                    },
                    breakpoint: 476,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                        draggable: true,
                        swipe: true,
                    }
                }
            ]
        });
    };


    // Bottom To Top Button
    $('#bottomToTop').on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
    });

});

$(function () {

    // Mobile Navbar
    function openMobileNavbar() {
        $('.mobile-navbar-main').addClass('active');
        $('html').addClass('overflow-hidden');
        $('.bg-overlay').addClass('active');

    }

    function closeMobileNavbar() {
        $('.mobile-navbar-main').removeClass('active');
        $('html').removeClass('overflow-hidden');
        $('.bg-overlay').removeClass('active');
    }

    $('.mobile-navbar-btn').click(function () {
        openMobileNavbar();
    });

    $('.mobile-nav-close-btn').click(function () {
        closeMobileNavbar();
    });

    $('.bg-overlay').click(function () {
        closeMobileNavbar();
    });


    // Menu Has Dropdown For Mobile
    $('.mobile-navbar-main ul > li.menu-item-has-children').each(function () {
        // Add a <span> element inside each parent <li>
        $(this).prepend('<span class="dropdown-arrow"><i class="fa fa-chevron-down"></i></span>');
    });
    // mobile nav
    $('.mobile-navbar-main  ul > li > .dropdown-arrow').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).parents('li').children('.sub-menu').slideUp();
        } else {
            //              $('.menu-item-has-children > a').removeAttr("href");
            $(this).addClass('active');
            $(this).parents('li').children('.sub-menu').slideDown();
            $(this).parents('li').siblings('li').children('a').removeClass('active');
            $(this).parents('li').siblings('li').children('.sub-menu').slideUp();
        }
    });


    // Animated Tabing

    const buttons = document.querySelectorAll(".tab-btn");
    const cards = document.querySelectorAll(".card");
    const indicator = document.querySelector(".tab-indicator");

    // Run only if elements exist
    if (buttons.length && cards.length && indicator) {

        function moveIndicator(el) {
            indicator.style.width = el.offsetWidth + "px";
            indicator.style.left = el.offsetLeft + "px";
        }

        function showCards(filter) {
            let visibleCards = [];

            cards.forEach(card => {
                if (filter === "all" || card.classList.contains(filter)) {
                    card.style.display = "flex";
                    visibleCards.push(card);
                } else {
                    card.style.display = "none";
                }
            });

            gsap.fromTo(visibleCards,
                { y: 40, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.6,
                    stagger: 0.1,
                    ease: "power3.out"
                }
            );
        }

        moveIndicator(document.querySelector(".active"));
        showCards("all");

        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                buttons.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                moveIndicator(btn);
                const filter = btn.getAttribute("data-filter");
                showCards(filter);
            });
        });
    }


});
