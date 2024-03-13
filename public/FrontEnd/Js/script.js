$(document).ready(function () {

    //======= Lazy Loading =======
    const images = document.querySelectorAll("[data-src]");

    function preloadImage(img) {
        const src = img.getAttribute("data-src");
        if (!src) {
            return;
        }

        img.src = src;
    }

    const imgObtions = {
        threshold: 0,
        rootMargin: "0px 0px 100px 0px",
    };

    const imgObserver = new IntersectionObserver((entries, imgObserver) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            } else {
                preloadImage(entry.target);
                imgObserver.unobserve(entry.target);
            }
        }, imgObtions);
    });

    images.forEach((image) => {
        imgObserver.observe(image);
    });
    //======= Lazy Loading =======
   

});



$('.gallery').magnificPopup({
    type: 'image',
    delegate: '.img-popup',
    gallery: {
        enabled: true
    }
});



// All Animation
// new WOW().init();

 

