import axiosClient from "../axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function useUsers() {
    const users = ref([]);
    const user = ref([]);
    
    const router = useRouter()
    
    const getUsers = async () => {
        let res = await axiosClient.get("/users");
        console.log('get users');
        console.log(res);
        users.value = res.data.data;
    };
    //
    const getUser = async (id) => {
        let response = await axiosClient.get("/users/show/" + id);
        // console.log('id');
        // console.log(id);
        console.log("getROle from composables ; res");
        console.log(response);
        user.value = response.data.data;    
    };
    const storeUser = async(data) => {
        // errors.value = ''
        console.log('data');
        console.log(data);
        // try {
            axiosClient.post("/users/create", data)
            await router.push({name: 'UsersIndex'});    
        // } catch (e) {
        //     if (e.response.status === 422) {
        //         errors.value = e.response.data.errors
        //     }
        // }
    }
    const updateUser = async (id) => {
        errors.value = ''
        try {
            await axiosClient.put('/users/' + id, user.value)
            await router.push({name: 'UsersIndex'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyUser = async (id) => {
        console.log('deleteUser usersjs b');
        await axiosClient.delete('/users/' + id)
        console.log('deleteUser usersjs a');
    }
    return {
        user,
        users,
        getUser,
        getUsers,
        storeUser,
        updateUser,
        destroyUser,
    };
}
