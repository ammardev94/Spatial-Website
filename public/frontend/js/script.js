$(function () {
    $("body").addClass("is-ready");
    // ==============================
    // RELOAD CONDITION
    // ==============================
    $(window).on("load", function () {
        if (
            window.location.hash ||
            performance.getEntriesByType("navigation")[0].type === "reload"
        ) {
            window.history.replaceState(null, null, window.location.pathname);
        }

        // Show body after fully loaded
        
    });


    setInterval(function () {
        if ($('.navbar-collapse').hasClass('show')) {
            $('body').addClass('overflow-hidden');
        } else {
            $('body').removeClass('overflow-hidden');
        }
    }, 300);

    // ==============================
    // HEADER MOBILE
    // ==============================
    if ($(window).width() < 992) {
        $(".toggle-submenu").on("click", function (e) {
            e.preventDefault();

            const $btn = $(this);
            const $submenu = $btn.closest("a").next(".submenu");

            $btn.toggleClass("active");
            $submenu.slideToggle(300);

            // Toggle icon
            const $icon = $btn.find("i");
            if ($icon.hasClass("bi-plus-lg")) {
                $icon.removeClass("bi-plus-lg").addClass("bi-dash-lg");
            } else {
                $icon.removeClass("bi-dash-lg").addClass("bi-plus-lg");
            }
        });
    }

    // ==============================
    // INTL INPUT
    // ==============================
    // const $input = $("#phone");
    // const $hiddenInput = $("#full_phone");

    // if ($input.length) {
    //     const iti = window.intlTelInput($input[0], {
    //         initialCountry: "ae",
    //         separateDialCode: true,
    //         utilsScript:
    //             "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.1.0/js/utils.js",
    //     });

    //     const updateHiddenInput = function () {
    //         $hiddenInput.val(iti.getNumber());
    //     };

    //     $input.on("input countrychange", updateHiddenInput);
    // }

    const $inputs = $("#phone, #phone1");
    const $hiddenInputs = $("#full_phone, #full_phone1");

    if ($inputs.length) {
        $inputs.each(function (index) {
            const input = this;
            const hiddenInput = $hiddenInputs.eq(index);

            const iti = window.intlTelInput(input, {
                initialCountry: "ae",
                separateDialCode: true,
                utilsScript:
                    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.1.0/js/utils.js",
            });

            const updateHiddenInput = function () {
                hiddenInput.val(iti.getNumber());
            };

            $(input).on("input countrychange", updateHiddenInput);
            
            // Store instance on the element for later access
            $(input).data('itiInstance', iti);
        });
    }

    // Enquire Popup
    function openDownloadPopup() {
        $(".download-broucher-popup").addClass("active");
        $("body").addClass("overflow-hidden");
        $(".overlay").addClass("active");
    }

    function closeDownloadPopup() {
        $(".download-broucher-popup").removeClass("active");
        $("body").removeClass("overflow-hidden");
        $(".overlay").removeClass("active");
    }

    $(".download-broucher-btn").click(function () {

        if (($(this).attr("data-href")) != 'NA') {
            var link = document.createElement('a');
            link.href = $(this).attr("data-href");
            var projectName = $(this).attr("data-project-name") || 'Project';
            link.download = projectName + " - Project Brochure.pdf";
            link.click();
            link.remove();
        }

        openDownloadPopup();
    });

    $(".db-close-btn").click(function () {
        closeDownloadPopup();
    });

    $(".overlay").click(function () {
        closeDownloadPopup();
    });

    // ==============================
    // NICE SELECT
    // ==============================
    const $select = $("#inq_about");
    if ($select.length) {
        $select.niceSelect();
    }

    // ==============================
    // SWIPER SLIDER
    // ==============================
    const spacesSwiper = new Swiper(".spaces-slider", {
        direction: "vertical",
        slidesPerView: 3,
        spaceBetween: 50,
        // mousewheel: {
        //     releaseOnEdges: true,
        //     sensitivity: 1,
        // },
        speed: 800,
        freeMode: false,
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },
        on: {
            slideChange: function () {
                const activeIndex = this.activeIndex + 1;
                if (activeIndex % 2 === 0) {
                    $(".spaces-wrapper").addClass("even-active");
                } else {
                    $(".spaces-wrapper").removeClass("even-active");
                }
            },
            // touchStart: function () {
            //     fullpage_api.setAllowScrolling(true);
            // },
            // reachEnd: function () {
            //     this.allowSlideNext = true;
            //     this.allowSlidePrev = true;
            //     fullpage_api.setAllowScrolling(false);
            //     this.once("slideNextTransitionEnd", function () {
            //         fullpage_api.setAllowScrolling(true, "down");
            //     });
            // },
            // reachBeginning: function () {
            //     this.allowSlideNext = true;
            //     this.allowSlidePrev = true;
            //     fullpage_api.setAllowScrolling(false);
            //     this.once("slidePrevTransitionEnd", function () {
            //         fullpage_api.setAllowScrolling(true, "up");
            //     });
            // },
            // fromEdge: function () {
            //     fullpage_api.setAllowScrolling(false);
            // },
        },

        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1101: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        },
    });

    // PG Swiper
    const pgSwiper = new Swiper(".pg", {
        slidesPerView: 2,
        spaceBetween: 40,
        navigation: {
            nextEl: ".pg-swiper-button-next",
            prevEl: ".pg-swiper-button-prev",
        },
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
        },
    });

    // PA Swiper
    const paSwiper = new Swiper(".pa", {
        slidesPerView: 4,
        spaceBetween: 20,
        navigation: {
            nextEl: ".pa-swiper-button-next",
            prevEl: ".pa-swiper-button-prev",
        },
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 25,
            },
        },
    });

    // Content With Bottom Image Swiper
    const cbimgSlider = new Swiper(".bottom-img-slider", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        speed: 500,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".bottom-img-slider .pa-swiper-button-next",
            prevEl: ".bottom-img-slider .pa-swiper-button-prev",
        },
        scrollbar: {
            el: ".bottom-img-slider .swiper-scrollbar",
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
    });


    // TIMELINE Swiper
    const timelineSwiper = new Swiper(".timeline-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        // initialSlide: 1,

        // pagination: {
        //     el: ".swiper-pagination-progress",
        //     type: "progressbar",
        // },

        on: {
            init: function () {
                const swiper = this;
                const bulletsContainer = document.querySelector(
                    ".swiper-pagination-bullets"
                );
                const progressLine = document.querySelector(
                    ".timeline-progress-line"
                );

                // Create bullets
                for (let i = 0; i < swiper.slides.length; i++) {
                    const bullet = document.createElement("span");
                    bullet.classList.add("swiper-pagination-bullet");
                    if (i === 0)
                        bullet.classList.add("swiper-pagination-bullet-active");
                    bullet.addEventListener("click", () => swiper.slideTo(i));
                    bulletsContainer.appendChild(bullet);
                }

                // Set initial line width
                updateProgressLine(swiper);
            },
            slideChange: function () {
                const swiper = this;
                const bullets = document.querySelectorAll(
                    ".swiper-pagination-bullet"
                );
                bullets.forEach((b) =>
                    b.classList.remove("swiper-pagination-bullet-active")
                );
                bullets[swiper.activeIndex].classList.add(
                    "swiper-pagination-bullet-active"
                );

                updateProgressLine(swiper);
            },
        },
    });


    // Calculate Width 	
    if ($(window).width() >= 991) {

        var secWidth = $(".forJqueryOnly").width();
        var containerWidth = $(".container").width();
        var marginLEftRight = secWidth - containerWidth;
        var finalMargin = marginLEftRight / 2;
        $('.forJqueryOnly .imgbox').css({ width: 'calc(100% + ' + finalMargin + 'px)' });
        $('.leftBoxforJqueryOnly .imgbox').css({ transform: 'translateX(-' + finalMargin + 'px)' });

    }

    // Calculate Width 	
    // if ($(window).width() >= 991) {

    //     var secWidth = $(".leftBoxforJqueryOnly").width();
    //     var containerWidth = $(".container").width();
    //     var marginLEftRight = secWidth - containerWidth;
    //     var finalMargin = marginLEftRight / 2;

    // }

    // Update line width dynamically
    function updateProgressLine(swiper) {
        const progressLine = document.querySelector(".timeline-progress-line");
        const total = swiper.slides.length - 1;
        const percentage = (swiper.activeIndex / total) * 100;
        progressLine.style.width = `${percentage}%`;
    }

    // ==============================
    // VIDEO PLAY BUTTON
    // ==============================

    const $video = $("#project-featured-ved, #about-ved");
    const $playBtn = $("#play-btn");

    $playBtn.on("click", function () {
        if ($video[0].paused) {
            $video[0].play();
            $playBtn.hide();
        }
    });

    // ==============================
    // SECTION ANIMATIONS GSAP
    // ==============================
    let isScrolling = false;

    if (window.innerWidth > 1100) {
        window.handleSectionAnimation = function (
            origin,
            destination,
            direction
        ) {
            // Down: Section 0 → 1
            if (origin === 0 && destination === 1 && direction === "down") {
                gsap.to(".header", {
                    backgroundColor: "rgba(255, 255, 255, 1)",
                    padding: "0",
                });
                $(".header").addClass("header-sticky");
                gsap.fromTo(
                    ".banner-heading",
                    { opacity: 0 },
                    { opacity: 1, duration: 1 }
                );
                gsap.to(".section2 .banner::before", {
                    opacity: "1",
                    duration: 0.5,
                });
                gsap.fromTo(
                    "clipPath#aa",
                    { x: 50, y: 0, scale: 1.5 },
                    { x: 0, y: 0, scale: 1, duration: 3, ease: "power3.out" }
                );
            }

            // Down: Section 1 → 2
            if (origin === 1 && destination === 2 && direction === "down") {
                const tl = gsap.timeline();

                tl.add(() => {
                    $("#homepage").removeClass("custom-mode");
                    $(
                        "#section-banner, #section-bannersub1, #section-bannersub2"
                    ).hide();
                });

                tl.fromTo(
                    "#banner-cutout",
                    { scale: 6, opacity: 1 },
                    {
                        scale: 1.5,
                        duration: 1.5,
                        ease: "power4.out",
                    }
                );

                tl.to("#banner-cutout", {
                    left: "0",
                    top: "0",
                    scale: 1,
                    duration: 0.5,
                    ease: "power4.out",
                });

                tl.to([".about-custom-col", ".about-custom-row"], {
                    opacity: 1,
                    y: 0,
                    visibility: "visible",
                    duration: 0.2,
                    ease: "power1.out",
                });
            }

            // Down: Section 2 → 3
            if (origin === 2 && destination === 3 && direction === "down") {
                // gsap.to(".header", { opacity: "0", visibility: "hidden" });
            }

            // Down: Section 3 → 4
            if (origin === 3 && destination === 4 && direction === "down") {
                gsap.fromTo(
                    "#animation-item",
                    { left: "-600px", right: "-600px", top: "0px" },
                    {
                        left: "0px",
                        right: "0px",
                        top: "0px",
                        backgroundColor: "rgba(242, 242, 242, 0.85)",
                        duration: 0.8,
                    }
                );
                gsap.fromTo(
                    ".ddlform",
                    { marginTop: "300px" },
                    { marginTop: "0px", duration: 0.8 }
                );
            }

            // Down: Section 5 → 6
            if (origin === 5 && destination === 6 && direction === "down") {
                gsap.fromTo(
                    "#animation-item",
                    { left: "0px", right: "0px" },
                    { left: "-600px", right: "-600px", duration: 0.8 }
                );
            }

            // // Down: Section 6 → 7
            // if (origin === 6 && destination === 7 && direction === "down") {

            // }

            // Up: Section 1 → 0
            if (origin === 1 && destination === 0 && direction === "up") {
                gsap.to(".banner-heading", { opacity: 1, duration: 0.5 });
                gsap.to(".header", {
                    backgroundColor: "rgba(0,0,0,0)",
                    padding: "20px 0",
                });
                $(".header").removeClass("header-sticky");
            }

            // Up: Section 2 → 1
            if (origin === 2 && destination === 1 && direction === "up") {
                const tl = gsap.timeline();

                tl.to([".about-custom-col", ".about-custom-row"], {
                    opacity: 0,
                    y: 40,
                    visibility: "hidden",
                    duration: 0.3,
                    ease: "power1.in",
                });

                tl.to("#banner-cutout", {
                    scale: 4,
                    opacity: 0,
                    left: "-376px",
                    top: "124px",
                    duration: 0.6,
                    ease: "power4.in",
                });

                // restore homepage sections
                tl.add(() => {
                    $("#homepage").addClass("custom-mode");
                    $(
                        "#section-banner, #section-bannersub1, #section-bannersub2"
                    ).show();
                });
            }

            // Up: Section 3 → 2
            if (origin === 3 && destination === 2 && direction === "up") {
                gsap.to(".header", { opacity: "1", visibility: "visible" });
            }

            // Up: Section 4 → 3
            if (origin === 4 && destination === 3 && direction === "up") {
                gsap.fromTo(
                    "#animation-item",
                    { left: "0px", right: "0px", top: "0px" },
                    {
                        left: "-600px",
                        right: "-600px",
                        top: "800px",
                        backgroundColor: "#777",
                        duration: 0.8,
                    }
                );
                gsap.fromTo(
                    ".ddlform",
                    { marginTop: "0px" },
                    { marginTop: "1300px", duration: 0.6 }
                );
            }

            // Up: Section 6 → 5
            if (origin === 6 && destination === 5 && direction === "up") {
                gsap.fromTo(
                    "#animation-item",
                    { left: "-600px", right: "-600px" },
                    { left: "0px", right: "0px", duration: 0.8 }
                );
            }

            // // Up: Section 7 → 6
            // if (origin === 7 && destination === 6 && direction === "up") {

            // }
        };
    } else {
        $("[data-aos]").removeAttr("data-aos");
        $(".entrance-animate").removeClass("entrance-animate");
    }

    // ==============================
    // RESPONSIVE GSAP
    // ==============================
    // const mm = gsap.matchMedia();
    // mm.add("(max-height: 768px)", (context) => {
    //     const originalHandler = window.handleSectionAnimation;
    //     window.handleSectionAnimation = function (
    //         origin,
    //         destination,
    //         direction
    //     ) {
    //         if (origin === 1 && destination === 2 && direction === "down") {
    //             gsap.fromTo(
    //                 ".vector-overlay",
    //                 { scale: 5 },
    //                 { scale: 1.3, duration: 1, delay: 0.5 }
    //             );
    //         } else {
    //             originalHandler(origin, destination, direction);
    //         }
    //     };
    //     return () => {
    //         window.handleSectionAnimation = originalHandler;
    //     };
    // });

    // ==============================
    // FULLPAGE.JS
    // ==============================
    // Defer heavy fullpage initialization to the next frame so the browser can paint above-the-fold content first.
    window.requestAnimationFrame(() => new fullpage("#homepage", {
        licenseKey: "gplv3-license",
        autoScrolling: true,
        fitToSection: true,
        lockAnchors: true,
        recordHistory: false,
        anchors: [
            "banner",
            "bannersub1",
            // "bannersub2",
            "about",
            "projects",
            "launches",
            "ddlform",
            "spaces",
            // "news",
        ],
        scrollingSpeed: 500,
        responsiveWidth: 1101,
        scrollOverflow: true,
        normalScrollElements: "about,launches,spaces",
        bigSectionsDestination: "top",

        afterLoad: function (origin, destination, direction) {
            const $section = $(destination.item);

            if (
                destination.item.id === "section-about" &&
                direction === "down"
            ) {
                isScrolling = true;
                setTimeout(() => {
                    isScrolling = false;
                }, 2100);
            }

            if (
                destination.item.id === "section-bannersub1" &&
                direction === "up"
            ) {
                isScrolling = true;
                setTimeout(() => {
                    isScrolling = false;
                }, 1000);
            }

            // if (
            //     destination.item.id === "section-bannersub2" &&
            //     direction === "up"
            // ) {
            //     setTimeout(() => {
            //         fullpage_api.moveTo(2);
            //     }, 600);
            // }

            // Restart videos
            const $video = $section.find("video");
            if ($video.length && $video[0].readyState > 0 && $video[0].src) {
                try {
                    $video[0].currentTime = 0;
                    $video[0]
                        .play()
                        .catch((err) =>
                            console.warn("Video play rejected:", err)
                        );
                } catch (err) {
                    console.warn("Video playback failed:", err);
                }
            }

            // Animate fade-ups
            $section.find("[data-aos='fade-up']").each(function () {
                gsap.fromTo(
                    $(this),
                    { y: 50, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.8, ease: "power2.out" }
                );
            });

            // Animate fade-lefts
            $section.find("[data-aos='fade-left']").each(function () {
                gsap.fromTo(
                    $(this),
                    { x: 50, opacity: 0 },
                    { x: 0, opacity: 1, duration: 0.8, ease: "power2.out" }
                );
            });

            // Animate fade-rights
            $section.find("[data-aos='fade-right']").each(function () {
                gsap.fromTo(
                    $(this),
                    { x: -50, opacity: 0 },
                    { x: 0, opacity: 1, duration: 0.8, ease: "power2.out" }
                );
            });

            // Counter animation
            const $counterWrapper = $section.find(".counter-wrapper");
            if ($counterWrapper.length) {
                $counterWrapper.find(".d-num").each(function () {
                    const $counter = $(this);
                    const target = parseInt($counter.data("target"));
                    const $num = $counter.find(".num");

                    if ($counter.data("animating")) return;
                    $counter.data("animating", true);

                    const obj = { val: 0 };
                    gsap.to(obj, {
                        val: target,
                        duration: 2,
                        ease: "power1.out",
                        onUpdate: function () {
                            $num.text(
                                Math.floor(obj.val).toLocaleString("en-US")
                            );
                        },
                        onComplete: function () {
                            $num.text(target.toLocaleString("en-US"));
                            $counter.data("animating", false);
                        },
                    });
                });
            }
        },

        onLeave: function (origin, destination, direction) {
            const $section = $(origin.item);

            // if (destination.item.id === "section-about" && direction === "up") {
            //     setTimeout(() => {
            //         fullpage_api.moveTo(1);
            //     }, 1000);
            // }

            // Pause video
            const $video = $section.find("video");
            if ($video.length) $video[0].pause();

            // Fade OUT animations
            $section.find("[data-aos='fade-up']").each(function () {
                gsap.to($(this), {
                    y: -50,
                    opacity: 0,
                    duration: 0.3,
                    ease: "power2.in",
                });
            });
            $section.find("[data-aos='fade-left']").each(function () {
                gsap.to($(this), {
                    x: 50,
                    opacity: 0,
                    duration: 0.3,
                    ease: "power2.in",
                });
            });
            $section.find("[data-aos='fade-right']").each(function () {
                gsap.to($(this), {
                    x: -50,
                    opacity: 0,
                    duration: 0.3,
                    ease: "power2.in",
                });
            });

            // Reset counters
            const $counterWrapper = $section.find(".counter-wrapper");
            if ($counterWrapper.length) {
                $counterWrapper.find(".d-num").each(function () {
                    const $counter = $(this);
                    const $num = $counter.find(".num");
                    const currentVal =
                        parseInt($num.text().replace(/,/g, "")) || 0;

                    if ($counter.data("animating")) return;
                    $counter.data("animating", true);

                    const obj = { val: currentVal };
                    gsap.to(obj, {
                        val: 0,
                        duration: 0.8,
                        ease: "power2.inOut",
                        onUpdate: function () {
                            $num.text(
                                Math.floor(obj.val).toLocaleString("en-US")
                            );
                        },
                        onComplete: function () {
                            $num.text("0");
                            $counter.data("animating", false);
                        },
                    });
                });
            }

            // Scroll delay logic
            if (isScrolling) return false;
            isScrolling = true;
            if (typeof window.handleSectionAnimation === "function") {
                window.handleSectionAnimation(
                    origin.index,
                    destination.index,
                    direction
                );
            }
            setTimeout(() => (isScrolling = false), 500);
        },

        afterRender: function () {
            // Intentionally no auto-navigation here.
            // Auto moveTo changes the viewport after initial render and can inflate LCP.
        },
    }));
});
