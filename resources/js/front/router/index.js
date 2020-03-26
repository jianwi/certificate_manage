import Vue from 'vue'
import VueRouter from 'vue-router'
import Test from "../views/Test";
import Home from "../views/Home";
import Certificate from "../views/Certificate";
Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/:code',
        name: 'info',
        component: Certificate
    }
]

const router = new VueRouter({
    routes
})

export default router
