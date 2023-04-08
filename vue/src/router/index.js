import { createRouter, createWebHistory } from "vue-router";
import Login from "../views/Login.vue";
import Dashboard from "../views/Dashboard.vue";
import UsersIndex from "../pages/users/UsersIndex.vue";
import UserCreate from "../pages/users/UserCreate.vue";
import UserEdit from "../pages/users/UserEdit.vue";
import RolesIndex from "../pages/roles/RolesIndex.vue";
import RoleCreate from "../pages/roles/RoleCreate.vue";
import RoleEdit from "../pages/roles/RoleEdit.vue";
import PermissionsIndex from "../pages/permissions/PermissionsIndex.vue";
import PermissionCreate from "../pages/permissions/PermissionCreate.vue";
import PermissionEdit from "../pages/permissions/PermissionEdit.vue";
import ServiceCategoriesIndex from "../pages/serviceCategory/ServiceCategoriesIndex.vue";
import ServiceCategoryCreate from "../pages/serviceCategory/ServiceCategoryCreate.vue";
import ServiceCategoryEdit from "../pages/serviceCategory/ServiceCategoryEdit.vue";
import ServiceTypesIndex from "../pages/serviceType/ServiceTypesIndex.vue";
import ServiceTypeCreate from "../pages/serviceType/ServiceTypeCreate.vue";
import ServiceTypeEdit from "../pages/serviceType/ServiceTypeEdit.vue";
import ServiceRequestsIndex from "../pages/serviceRequest/ServiceRequestsIndex.vue";
import ServiceRequestCreate from "../pages/serviceRequest/ServiceRequestCreate.vue";
import ServiceRequestEdit from "../pages/serviceRequest/ServiceRequestEdit.vue";
import SLAIndex from "../pages/SLA/SLAIndex.vue";
import SLAEdit from "../pages/SLA/SLAEdit.vue";
import SLACreate from "../pages/SLA/SLACreate.vue";
import DefaultLayout from "../Layouts/DefaultLayout.vue";
import CmsLayout from "../Layouts/CmsLayout.vue";
import AuthLayout from "../Layouts/AuthLayout.vue";
import store from "../store";
const routes = [
    {
        path: "/",
        component: DefaultLayout,
        // component: CmsLayout,
        meta: { requiresAuth: true },
        children: [
            { path: "/", name: "Dashboard", component: Dashboard },

            { 
                path: "users", name: "UsersIndex", component: UsersIndex 
            }, { 
                path: "users/:id/edit", name: "UserEdit", component: UserEdit ,props: true
            }, {
                path: "users/create",name: "UserCreate",component: UserCreate,
            },


            { path: "roles", name: "RoleIndex", component: RolesIndex },
            { path: "roles/create", name: "RoleCreate", component: RoleCreate },
            { path: "roles/:id/edit", name: "RoleEdit", component: RoleEdit , props: true},
            
            { path: "permissions", name: "PermissionsIndex", component: PermissionsIndex, },
            { path: "permissions/create", name: "PermissionCreate", component: PermissionCreate, },
            { path: "permissions/:id/edit", name: "PermissionEdit", component: PermissionEdit, props: true },

            { path: "serviceCategorys", name: "ServiceCategoriesIndex", component: ServiceCategoriesIndex },
            { path: "serviceCategorys/create", name: "ServiceCategoryCreate", component: ServiceCategoryCreate },
            { path: "serviceCategorys/:id/edit", name: "ServiceCategoryEdit", component: ServiceCategoryEdit , props: true},

            { path: "serviceTypes", name: "ServiceTypesIndex", component: ServiceTypesIndex },
            { path: "serviceTypes/create", name: "ServiceTypeCreate", component: ServiceTypeCreate },
            { path: "serviceTypes/:id/edit", name: "ServiceTypeEdit", component: ServiceTypeEdit , props: true},

            { path: "serviceRequests", name: "ServiceRequestsIndex", component: ServiceRequestsIndex },
            { path: "serviceRequests/create", name: "ServiceRequestCreate", component: ServiceRequestCreate },
            { path: "serviceRequests/:id/edit", name: "ServiceRequestEdit", component: ServiceRequestEdit , props: true},

            { path: "SLA", name: "SLAIndex", component: SLAIndex },
            { path: "SLA/create", name: "SLACreate", component: SLACreate },
            { path: "SLA/:id/edit", name: "SLAEdit", component: SLAEdit , props: true},
            // {
            //     path: "permissions",
            //     component: PermissionsList,
            //     childern: [
            //         {
            //             path: "/",
            //             name: "PermissionsIndex",
            //             component: PermissionsIndex,
            //         },
            //         {
            //             path: "/create",
            //             name: "PermissionCreate",
            //             component: PermissionCreate,
            //         },
            //         {
            //             path: "/:id/edit",
            //             name: "PermissionEdit",
            //             component: PermissionEdit,
            //         },
            //     ],
            // },
            // {
            //     path: "slas/:id/edit",
            //     name: "SLACreate",
            //     component: SLACreate,
            // },
        ],
    },
    {
        path: "/auth",
        redirect: "/login",
        name: "Auth",
        component: AuthLayout,
        // to redirect if the user doesnt have an authorization
        meta: { isGuest: true },
        children: [
            // {
            //     path: "/register",
            //     name: "Register",
            //     component: Register,
            // },
            {
                path: "/login",
                name: "Login",
                component: Login,
            },
        ],
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.beforeEach((to, from, next) => {
    if (sessionStorage.getItem("TOKEN")) {
        store.state.user.token = sessionStorage.getItem("TOKEN");
    }
    //if user is NOT authorized
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: "Login" });
        // if user is already authorized
    } else if (store.state.user.token &&  to.name === 'Login') {
        next({ name: "Dashboard" });
    }
     else {
        next();
    }
});
export default router;
