// Owlcarousel
$(document).ready(function(){

    // campuseSlide-carousel
    $("#campuseSlide-carousel").owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        dots: true,
        // items:3,
        slideBy:1,
        center: false,
        lazyLoad: true,
        startPosition: "#slide1",
        animateOut: 'fadeOutDown',
        animateIn: 'fadeInDown',
        stagePadding: 0,
        navText: [
            "<div class='btnSlidePrev'><i class='fa-solid fa-caret-left'></i></div>",
            "<div class='btnSlideNext'><i class='fa-solid fa-caret-right'></i></div>"
        ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            900:{
                items: 1
            },
            1000:{
                items:1
            }
        }
  });

//   committee-carousel

$("#committee-carousel").owlCarousel({
    loop:true,
    margin:30,
    nav:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    dots: true,
    // items:3,
    slideBy:1,
    center: false,
    lazyLoad: true,
    startPosition: "#slide1",
    navText: [
        "<div class='btnSlidePrev'><i class='fa-solid fa-caret-left'></i></div>",
        "<div class='btnSlideNext'><i class='fa-solid fa-caret-right'></i></div>"
    ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        900:{
            items: 3
        },
        1000:{
            items:6
        }
    }
});

  $("#program-carousel").owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        dots: true,
        items:3,
        slideBy:1,
        center: false,
        lazyLoad: true,
        startPosition: "#slide1",
        stagePadding: 0,
        navText: [
            "<div class='btnSlidePrev'><i class='fa-solid fa-caret-left'></i></div>",
            "<div class='btnSlideNext'><i class='fa-solid fa-caret-right'></i></div>"
        ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            900:{
                items: 2
            },
            1000:{
                items:3
            }
        }
  });


});
