import axiosClient from "../axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function useServiceTypes() {
    const serviceTypes = ref([]); 
    const serviceType = ref([]);
    const typeByCategory = ref([]);
    
    const router = useRouter()
    
    const getServiceTypes = async () => {
        let res = await axiosClient.get("/serviceType");
        serviceTypes.value = res.data.data;
        // console.log('serviceTypes');
        // console.log(res.data.data);
    };
    //
    const getServiceType = async (id) => {
        let response = await axiosClient.get("/serviceType/show/" + id);
        
        serviceType.value = response.data.data;    
    };
    
    const getTypeByCategory = async (id) => {
        let response = await axiosClient.get("/serviceType/serviceCategory/" + id);
        // console.log('id');
        // console.log(id);
        console.log("getTypeByCategory:$$$ res");
        console.log(response);
        typeByCategory.value = response.data.data;    
    };
    const storeServiceType = async(data) => {
        // errors.value = ''
        console.log('data');
        console.log(data);
        // try {
            axiosClient.post("/serviceType", data)
            await router.push({name: 'ServiceTypesIndex'});
        // } catch (e) {
        //     if (e.response.status === 422) {
        //         errors.value = e.response.data.errors
        //     }
        // }
    }
    const updateServiceType = async (id) => {
        errors.value = ''
        try {
            await axiosClient.put('/serviceType/' + id, serviceType.value)
            await router.push({name: 'ServiceTypesIndex'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyServiceType = async (id) => {
        console.log('deleteServiceType serviceTypejs b');
        await axiosClient.delete('/serviceType/' + id)
        console.log('deleteServiceType serviceTypejs a');
    }
    return {
        serviceType,
        serviceTypes,
        typeByCategory,
        getServiceType,
        getServiceTypes,
        getTypeByCategory,
        storeServiceType,
        updateServiceType,
        destroyServiceType,
    };
}
