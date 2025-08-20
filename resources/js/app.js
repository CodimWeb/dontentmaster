import.meta.glob([
    '../img/**',
]);

import {Collapse} from "bootstrap";

import SmoothScroll from 'smooth-scroll';
import { Fancybox } from "@fancyapps/ui/dist/fancybox/";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

// core version + navigation, pagination modules:
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import '../scss/style.scss'

var scroll = new SmoothScroll('.smooth-scroll', {
    speed: 250,
    speedAsDuration: true
});

// init Swiper:
const swiper = new Swiper('.swiper', {
    // configure Swiper to use modules
    modules: [Navigation, Pagination ],
    slidesPerView: 5,
    spaceBetween: 24,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
        1399: {
            slidesPerView: 5,
        },
    },
});

Fancybox.bind("[data-fancybox]", {
    // Your custom options
});


window.onload = function() {
    if(document.querySelector('.map')) {
        ymaps.ready(init)
    }
}



async function init() {
    var myMap = new ymaps.Map('map', {
        center: [48.034167, 37.757449],
        zoom: 17,
        // controls: [],
    })
    myMap.behaviors
        .disable(['rightMouseButtonMagnifier' , 'scrollZoom'])
    var myPlacemark = new ymaps.Placemark([48.034167, 37.757449], {
        // hintContent: ['']
    }, {
        iconImageSize: [46, 76],
        iconImageOffset: [-23, -70]
    });
    myMap.geoObjects.add(myPlacemark);
}
