import axiosClient from "../axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function useUsers() {
    const users = ref([]);
    const user = ref([]);
    const roleUsers = ref([]);
    
    const router = useRouter()
    
    const getUsers = async () => {
        let res = await axiosClient.get("/users");
        console.log('get users');
        console.log(res);
        users.value = res.data.data;
    };
    const getRoleUsers = async()=>{
        let res = await axiosClient.get("/users/agents");
        console.log('res roleUser');
        console.log(res);
        roleUsers.value = res.data
    }
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
        await axiosClient.delete('/users/delete/' + id)
    }
    return {
        user,
        users,
        roleUsers,
        getUser,
        getUsers,
        getRoleUsers,
        storeUser,
        updateUser,
        destroyUser,
    };
}
