import { Swiper } from "swiper";
import {
    Navigation,
    Pagination,
    Autoplay,
    EffectCoverflow,
} from "swiper/modules";

const container = document.querySelector(".testimonials-swiper");

if (container) {
    new Swiper(container, {
        modules: [Navigation, Pagination, Autoplay, EffectCoverflow],
        effect: "coverflow",
        centeredSlides: true,
        grabCursor: true,
        loop: true,
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        autoplay: {
            delay: 3500,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".testimonials-swiper .swiper-button-next",
            prevEl: ".testimonials-swiper .swiper-button-prev",
        },
        pagination: {
            el: ".testimonials-swiper .swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: { slidesPerView: 1.2 },
            768: { slidesPerView: 2.2 },
            1024: { slidesPerView: 3 },
        },
    });
}
