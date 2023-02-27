
import { createRouter, createWebHashHistory } from "vue-router";
import Login from '../views/Login.vue'
import Dashboard from '../views/Dashboard.vue'
import DefaultLayout from '../components/DefaultLayout.vue'
import AuthLayout from '../components/AuthLayout.vue'
import Register from '../views/Register.vue'
import store from "../store";
const routes = [
    {
        path:'/',
        component: DefaultLayout,
        meta:{requiresAuth:true},
        children:[
            {path:'/dashboard', name:'Dashboard', component:Dashboard}
        ]
    },
    {
        path:'/auth',
        redirect:'/login',
        name:'Auth',
        component: AuthLayout,
        // to redirect if the user doesnt have an authorization
        meta:{ isGuest:true },
        children:[{ 
                path:'/register',
                name:'Register',
                component: Register
                },
                {
                path:'/login',
                name:'Login',
                component: Login
                },
    ]
    },
]
const router = createRouter({
    history: createWebHashHistory(),
    routes
})
router.beforeEach((to, from, next) => {
    if (sessionStorage.getItem('TOKEN')) {
        store.state.user.token = sessionStorage.getItem('TOKEN');
    }
    //if user is NOT authorized
    if(to.meta.requiresAuth && !store.state.user.token){
        next({name:'Login'})
        // if user is already authorized
    }else if(store.state.user.token && (to.meta.isGuest)) {
        next({name: 'Dashboard'})
    }
    else{
        next();
    }
})
export default router;