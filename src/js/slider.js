import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import { Navigation, Mousewheel } from 'swiper/modules';


document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.slider')) {

        const opciones = {
            slidesPerView: 1,
            spaceBetween: 15,
            FreeMode: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            Mousewheel: {
                forceToAxis: true,
                invert: false,
                sensitivity: 1,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
                1200: {
                    slidesPerView: 4
                }
            }
        }

        Swiper.use([Navigation, Mousewheel]);
        new Swiper('.slider', opciones);
    }
})