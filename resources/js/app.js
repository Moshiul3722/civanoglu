require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.$ = window.jQuery = require("jquery");

require("./slick-1.8.1.min");

$(window).on("scroll", function () {
    const scroll = jQuery(window).scrollTop();
    if (scroll >= 50) {
        jQuery(".sticky-header").addClass("sticky-header-active");
    } else {
        jQuery(".sticky-header").removeClass("sticky-header-active");
    }
});

jQuery(function ($) {
    $(".gallery-slider").slick({
        arrows: true,
        asNavFor: ".thumbnail-slider",
        prevArrow: '<span class="galleryPrevArrow"><i class="fas fa-chevron-right"></i></span>',
        nextArrow: '<span class="galleryNextArrow"><i class="fas fa-chevron-left"></i></span>',
    });
    $(".thumbnail-slider").slick({
        slidesToShow: 10,
        asNavFor: ".gallery-slider",
        centerMode: true,
        focusOnSelect: true,
        prevArrow:
            '<span class="thumbnailPrevArrow"><i class="fas fa-chevron-right"></i></span>',
        nextArrow:
            '<span class="thumbnailNextArrow"><i class="fas fa-chevron-left"></i></span>',
    });
});
