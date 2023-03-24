import axiosClient from "../axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function useRoles() {
    const roles = ref([]);
    const role = ref([]);
    const rolePermissions = ref([]);
    const errors = ref(null);
    
    const router = useRouter()
    
    const getRoles = async () => {
        let res = await axiosClient.get("/roles");
        roles.value = res.data;
        // console.log('getROles');
        // console.log(res.data);
    };
    //
    const getRole = async (id) => {
        console.log('id');
        console.log(id);
        let response = await axiosClient.get("/roles/show/" + id);
        console.log("getPermisson from composables ; res");
        console.log(response.data.permissions);
        role.value = response.data.returnedRole;    
        rolePermissions.value = response.data.permissions;    
    };
    const storeRole = async(data) => {
        // errors.value = ''
        console.log('data');
        console.log(data);
        // try {
            axiosClient.post("/roles", data)
            await router.push({name: 'RoleIndex'});
        // } catch (e) {
        //     if (e.response.status === 422) {
        //         errors.value = e.response.data.errors
        //     }
        // }
    }
    const updateRole = async (id) => {
        errors.value = ''
        try {
            await axiosClient.put('/roles/update/' + id, role.value)
            await router.push({name: 'RoleIndex'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyRole = async (id) => {
        console.log('deleteRole rolesjs b');
        await axiosClient.delete('/roles/' + id)
        console.log('deleteRole rolesjs a');
    }
    return {
        errors,
        role,
        rolePermissions,
        roles,
        getRole,
        getRoles,
        storeRole,
        updateRole,
        destroyRole,
    };
}