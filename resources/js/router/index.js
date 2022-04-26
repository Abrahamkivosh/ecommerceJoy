import { createWebHistory, createRouter } from "vue-router";
import Home from "../components/clientApp/templates/Welcome.vue";
import Contact from "../components/clientApp/templates/Contact.vue";
const routes = [{
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/contact",
        name: "Contact",
        component: Contact,
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;