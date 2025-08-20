import { createRouter, createWebHistory } from 'vue-router'
import routes from "./routes.js";

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('access_token');
    if(token) {
        if(to.path === '/admin/login') {
            return next({path: '/admin'})
        }
        next()
    }
    else {
        if(to.path === '/admin/login') {
            next()
        }
        else {
            return next({path: '/admin/login'})
        }
    }
})

export default router
