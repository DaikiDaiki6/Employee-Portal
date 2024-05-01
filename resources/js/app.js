// import './bootstrap';
import 'flowbite';

window.addEventListener('app:scroll-to', (ev) => {
    ev.stopPropagation();
  
    const selector = ev?.detail?.query;
  
    if (!selector) {
      return;
    }
  
    const el = window.document.querySelector(selector);
  
    if (!el) {
      return;
    }
  
    try {
      el.scrollIntoView({
        behavior: 'smooth',
      });
    } catch {}
  
  }, false);


// core version + navigation, pagination modules:
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// init Swiper:
const swiper = new Swiper('.swiper', {
  // configure Swiper to use modules
  slidesPerView: 3,
  spaceBetween: 10,
  loop: true,
  modules: [Navigation, Pagination],

  pagination: {
    el: '.swiper-pagination',
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },


});


