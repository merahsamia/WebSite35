require('./bootstrap');
import {createApp} from 'vue'
import router from "./Router";


import Index from './components/Index.vue';
import Actualites from './components/Actualites.vue';
import AddActualite from './components/AddActualite.vue';
import Actualite from './components/Actualite.vue';

// Swiper imports

import SwiperClass, {Pagination} from 'swiper';
import VueAwesomeSwiper from 'vue-awesome-swiper';
import 'swiper/css'
import 'swiper/css/pagination'

SwiperClass.use([Pagination])

const app = createApp({
    components: {
        Index,
        Actualites,
        AddActualite,
        Actualite,
       
    }
});

app.use(router);

app.use(VueAwesomeSwiper);

app.mount('#app');


