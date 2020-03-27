import Vue from 'vue'
import VueRouter from 'vue-router'
import Test from "../views/Test";
import Index from "../views/Index";
import Home from "../views/Home";
import Certificate from "../views/Certificate";

Vue.use(VueRouter)

const routes = [
    {
        path: '',
        component: Index
    },
    {
        path: '/home',
        name: 'home',
        component: Home
    },
    {
        path: '/info/:code',
        name: 'info',
        component: Certificate
    }
]

const router = new VueRouter({
    routes
})

export default router
