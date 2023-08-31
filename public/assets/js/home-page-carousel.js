$(document).ready(function () {
    $(".carousel-auction").owlCarousel({
        autoPlay: false,
        goToFirst: true,
        items: 4,
        itemsDesktop: [1000, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [600, 2],
        itemsMobile: false,
        navigation: true,
        navigationText: [
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fas fa-arrow-right"></i>',
        ],
        pagination: false
    });

    $(".carousel-category").owlCarousel({
        autoPlay: false,
        items: 5,
        scrollPerPage: true,
        rewind: true,
        itemsDesktop: [1000, 5],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [600, 2],
        itemsMobile: false,
        navigation: true,
        navigationText: [
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fas fa-arrow-right"></i>',
        ],
        pagination: false
    });

    $(".carousel-nearby").owlCarousel({
        autoPlay: false,
        goToFirst: true,
        items: 4,
        itemsDesktop: [1000, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [600, 2],
        itemsMobile: false,
        navigation: true,
        navigationText: [
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fas fa-arrow-right"></i>',
        ],
        pagination: false
    });

    $(".carousel-popular-products").owlCarousel({
        autoPlay: false,
        goToFirst: true,
        items: 4,
        itemsDesktop: [1000, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [600, 2],
        itemsMobile: false,
        navigation: true,
        navigationText: [
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fas fa-arrow-right"></i>',
        ],
        pagination: false
    });

    $(".carousel-community").owlCarousel({
        autoPlay: false,
        goToFirst: true,
        itemsTablet: [600, 2],
        itemsMobile: 2,
        navigation: true,
        navigationText: [
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fas fa-arrow-right"></i>',
        ],
        pagination: false
    });

    $(".carousel-community-products").owlCarousel({
        autoPlay: false,
        goToFirst: true,
        items: 4,
        itemsDesktop: [1000, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [600, 2],
        // items: 5,
        // itemsDesktop: [1400, 5],
        // itemsDesktopSmall: [1000, 4],
        // itemsTablet: [600, 2],
        itemsMobile: false,
        navigation: true,
        navigationText: [
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fas fa-arrow-right"></i>',
        ],
        pagination: false
    });

    $(".carousel-recently-viewed").owlCarousel({
        autoPlay: false,
        goToFirst: true,
        items: 4,
        itemsDesktop: [1000, 4],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [600, 2],
        itemsMobile: false,
        navigation: true,
        navigationText: [
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fas fa-arrow-right"></i>',
        ],
        pagination: false
    });
});
