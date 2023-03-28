import router from "../router";
import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
    state() {
        return {
            user: {
                data: {},
                token: '',
            }
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

        logout: (state, res) => {
            state.user.token = {};
            state.user.data = null;
            sessionStorage.removeItem("TOKEN");
        },
    },
    actions: {
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
});
export default store;
