import router from "../router";
import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
    state() {
        return {
            user: {
                data: {},
                token: sessionStorage.getItem("TOKEN"),
            },
            users: null,
            roles: [],
            permissions: [],
            invoices: [
                {
                    id: "1",
                    name: "Payment for invoice #A1078",
                    serviceCategory: "Steven Spain",
                    serviceType: "Steven Spain",
                    date: "Jun 6, 2016, 1:38 PM",
                },
                {
                    id: "2",
                    name: "Payment for invoice #A1078",
                    serviceCategory: "Steven Spain",
                    serviceType: "Steven Spain",
                    date: "Jun 6, 2016, 1:38 PM",
                },
                {
                    id: "3",
                    name: "Payment for invoice #A1078",
                    serviceCategory: "Steven Spain",
                    serviceType: "Steven Spain",
                    date: "Jun 6, 2016, 1:38 PM",
                },
                {
                    id: "4",
                    name: "Payment for invoice #A1078",
                    serviceCategory: "Steven Spain",
                    serviceType: "Steven Spain",
                    date: "Jun 6, 2016, 1:38 PM",
                },
                {
                    id: "5",
                    name: "Payment for invoice #A1078",
                    serviceCategory: "Steven Spain",
                    serviceType: "Steven Spain",
                    date: "Jun 6, 2016, 1:38 PM",
                },
                {
                    id: "6",
                    name: "Payment for invoice #A1078",
                    serviceCategory: "Steven Spain",
                    serviceType: "Steven Spain",
                    date: "Jun 6, 2016, 1:38 PM",
                },
            ],
            // userList: [
            //     {
            //         id: "1",
            //         name: "Payment for invoice #A1078",
            //         role: "agent ",
            //     },
            //     {
            //         id: "2",
            //         name: "Payment for invoice #A1078",
            //         role: "techExpert ",
            //     },
            //     {
            //         id: "3",
            //         name: "Payment for invoice #A1078",
            //         role: "Steven Spain",
            //     },
            //     {
            //         id: "4",
            //         name: "Payment for invoice #A1078",
            //         role: "Admin",
            //     },
            //     {
            //         id: "5",
            //         name: "Payment for invoice #A1078",
            //         role: "Steven Spain",
            //     },
            //     {
            //         id: "6",
            //         name: "Payment for invoice #A1078",
            //         role: "Steven Spain",
            //     },
            // ],
        };
    },
    mutations: {
        setUser: (state, res) => {
            state.user.token = res.token;
            state.user.data = res.data;
            // console.log('from data mutation register');
            // console.log(res.data);
            sessionStorage.setItem("TOKEN", res.token);
        },

        setRegisterUser: (state, res) => {
            state.user.data = res.data;
        },

        rolesList: (state, res) => {
            state.roles = res;
            console.log("res");
            console.log(res);
            let r;
            for( r in state.roles){
                console.log('yes');
                console.log(r['name']);
            }
            console.log("state.roles");
            console.log(state.roles);
        },
        usersList: (state, data) => {
            console.log("mutaiton");
            console.log(data);
            state.users = data;
            console.log("state");
            console.log(state.users[0]);
            // console.log(state.users[0]);
        },
        permissionsList: (state, res) => {
            state.permissions = res.data;
        },
        saveRole: (state, role) => {
            state.roles = [...state.roles, role.data];
            console.log("saving role");
        },
        updateRole: (state, role) => {
            state.roles = state.roles.map((s) => {
                if (s.id == role.data.id) {
                    return role.data;
                }
                return s;
            });
        },

        logout: (state, res) => {
            state.user.token = {};
            state.user.data = null;
            sessionStorage.removeItem("TOKEN");
        },
    },
    actions: {
        // async usersList({ commit }) {
        //     await axiosClient.get("/users").then(( response ) => {
        //         const data = response.data.data;
        //         console.log('action');
        //         console.log(response.data.data);
        //         store.commit("usersList", response.data.data);
        //     });
        // },

        async usersList({ commit }) {
            await axiosClient.get("/roles").then((res) => {
                console.log('from data roleslist');
                console.log(res.data);
                store.commit("rolesList", res.data);
            });
        },
        async permissionsList({ commit }) {
            await axiosClient.get("/permissions").then(({ data }) => {
                // console.log('from data register');
                // console.log(res);
                store.commit("permissionsList", data);
            });
        },
        saveRole({ commit }, role) {
            let response;
            //updating role
            if (role.id) {
                response = axiosClient
                    .put(`/roles/${role.id}`, role)
                    .then((res) => {
                        store.commit("updateRole", res.data);
                        console.log(res);
                        return res;
                    });
            } else {
                //adding a new role
                response = axiosClient.post("/roles", role).then((res) => {
                    store.commit("saveRole", res.data);
                    console.log(res.data);
                    console.log(res.message);
                    return res;
                }).catch(function (error) {
                    console.log(error.toJSON());
                  });
            }
            return response;
        },
        async register({ commit }, user) {
            await axiosClient.post("/users/create", user).then(({ data }) => {
                // console.log('from data register');
                // console.log(res);
                store.commit("setRegisterUser", data);
            });
        },
        // async login({ commit }, user) {
        //     await axiosClient.post("/login", user).then(({ data }) => {
        //         store.commit("setUser", data);
        //     });
        // },

        async login({ commit }, user) {
            return await axiosClient.post("/login", user).then(({ data }) => {
                store.commit("setUser", data);
                return data;
            });
        },
        async logout({ commit }, user) {
            await axiosClient.get("/logout", user).then(({ data }) => {
                // console.log(router);
                store.commit("logout", data);
                $this.router.replace("/login");
            });
        },
    },
    getters:{
        getUserList(state){
            console.log("getters" + state.users);
            return state.users[0];
        }
    }
});
export default store;
