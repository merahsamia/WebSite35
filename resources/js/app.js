require('./bootstrap');
import {createApp} from 'vue'
import router from "./Router";


import Index from './components/Index.vue';
import Actualites from './components/Actualites.vue';
import AddActualite from './components/AddActualite.vue';
import Actualite from './components/Actualite.vue';

const app = createApp({
    components: {
        Index,
        Actualites,
        AddActualite,
        Actualite,
       
    }
});

app.use(router);
app.mount('#app');


