require('./bootstrap');
import { createApp } from 'vue'
import router from "./Router";


import Index from './components/Index.vue';
import Actualites from './components/Actualites.vue';
import Documents from './components/documents/Documents';
import AddActualite from './components/AddActualite.vue';
import AddDocument from './components/documents/AddDocument.vue';
import Actualite from './components/Actualite.vue';
import Contact from './components/Contact.vue';
import LogoutComponent from './components/auth/LogoutComponent.vue';

// Swiper imports

import SwiperClass, { Pagination } from 'swiper';
import VueAwesomeSwiper from 'vue-awesome-swiper';
import 'swiper/css'
import 'swiper/css/pagination'

SwiperClass.use([Pagination])

import Swal from 'sweetalert2'
window.Swal = Swal

let locale = window.locale;
console.log(window.locale);

import messagesFile from './messages';
const messages = messagesFile.messages;

import { createI18n } from 'vue-i18n/dist/vue-i18n.cjs';


const i18n = createI18n({
  locale: locale,
  fallbackLocale: 'en',
  messages,
})

const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});

window.Toast = Toast


// var Emitter = require('tiny-emitter')
// window.emitter = new Emitter()


const app = createApp({
  components: {
    Index,
    Actualites,
    Documents,
    AddActualite,
    AddDocument,
    Actualite,
    Contact,
    LogoutComponent,

  }
});

app.use(router);

app.use(VueAwesomeSwiper);

app.use(i18n)


app.mount('#app');


