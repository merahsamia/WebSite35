import { createRouter, createWebHistory } from "vue-router";
import Index from "./components/Index.vue";
import Actualites from "./components/Actualites.vue";
import AddActualite from "./components/AddActualite.vue";
import Actualite from "./components/Actualite.vue";
import LogoutComponent from "./components/auth/LogoutComponent.vue";
import EditActualite from "./components/EditActualite.vue";
import Documents from "./components/documents/Documents.vue";
import AddDocument from "./components/documents/AddDocument.vue";



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
        name: "AddActualite",
        meta: { requiresAuth: true }, // Ajout d'une propriété meta pour indiquer que cette route nécessite une auth

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

    { 
        path: "/editActualite/:actualiteId", 
        component: EditActualite,
        name: "EditActualite",
        meta: { requiresAuth: true }, // Ajout d'une propriété meta pour indiquer que cette route nécessite une auth

    },
    { 
        path: "/AllDocuments", 
        component: Documents,
        name: "Documents"
    },
    { 
        path: "/AddDocument", 
        component: AddDocument,
        name: "AddDocument",
        meta: { requiresAuth: true }, // Ajout d'une propriété meta pour indiquer que cette route nécessite une auth

    },

];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

 // Guard de navigation pour vérifier si l'utilisateur est authentifié
 router.beforeEach((to, from, next) => {
    // Vérifie si la route nécessite une authentification
    if (to.matched.some(record => record.meta.requiresAuth)) {
    // Si l'utilisateur n'est pas authentifié (token manquant)
    if (!window.token) {
        // Redirige vers la page de connexion
        next({ path: '/login' });
    } else {
        next(); // Continue la navigation si l'utilisateur est authentifié
    }
    } else {
    next(); // Si la route ne nécessite pas d'authentification, continue normalement
    }
});

export default router;