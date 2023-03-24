import axiosClient from "../axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function usePermissions() {
    const permissions = ref([]);
    const permission = ref([]);
    
    const router = useRouter()
    
    const getPermissions = async () => {
        let res = await axiosClient.get("/permissions");
        permissions.value = res.data;
        // console.log('getROles');
        // console.log(res.data);
    }
    //
    const getPermission = async (id) => {
        let response = await axiosClient.get("/permissions/show/" + id);
        // console.log('id');
        // console.log(id);
        console.log("getPermission from composables ; res");
        console.log(response);
        permission.value = response.data.data;    
    };
    const storePermission = async(data) => {
        // errors.value = ''
        console.log('data');
        console.log(data);
        // try {
            axiosClient.post("/permissions", data)
            await router.push({name: 'PermissionsIndex'});
        // } catch (e) {
        //     if (e.response.status === 422) {
        //         errors.value = e.response.data.errors
        //     }
        // }
    }
    const updatePermission = async (id) => {
        errors.value = ''
        try {
            await axiosClient.put('/permissions/' + id, permission.value)
            await router.push({name: 'PermissionsIndex'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyPermission = async (id) => {
        console.log('deletePermission permissionsjs b');
        await axiosClient.delete('/permissions/' + id)
        console.log('deletePermission permissionsjs a');
    }
    return {
        permission,
        permissions,
        getPermission,
        getPermissions,
        storePermission,
        updatePermission,
        destroyPermission,
    };
}
