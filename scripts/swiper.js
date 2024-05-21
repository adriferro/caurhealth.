export function initializeSwiper() {
    if (typeof Swiper !== 'undefined') {
      new Swiper(".home-slider", {
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    }
}
  