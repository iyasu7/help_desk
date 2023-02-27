import { createStore } from 'vuex'
import axiosClient from '../axios';

const store = createStore({
    state(){
        return {
        user:{
            data:{},
            token:sessionStorage.getItem('TOKEN')
    }}
    },
    mutations:{
        setUser:(state,res)=>{
            state.user.token= res.token;
            state.user.data= res.data;
            sessionStorage.setItem('TOKEN',res.token);
        }

    },
    actions:{
        register({commit},user) {
            return axiosClient.post('/register', user)
            .then(({data})=>{
                store.commit('setUser',data);
                return data;
            })
        },
    }
})
export default store;