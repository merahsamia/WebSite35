import { createRouter, createWebHistory } from "vue-router";
import Index from "./components/Index.vue";
import Actualites from "./components/Actualites.vue";
import AddActualite from "./components/AddActualite.vue";
import Actualite from "./components/Actualite.vue";
import LogoutComponent from "./components/auth/LogoutComponent.vue";



const routes = [

    { 
        path: "/", 
        component: Index,
        name: "Index"
    },

    { 
        path: "/actualites", 
        component: Actualites,
        name: "Actualites"
    },

    { 
        path: "/addActualite", 
        component: AddActualite,
        name: "AddActualite"
    },

    {
        path: "/actualites/actualite/:actualiteId",
        name: "Actualite",
        component: Actualite,
    },
    {
        path: "/logout",
        name: "Logout",
        component: LogoutComponent,
    },
];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;