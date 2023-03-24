import axiosClient from "../axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function useServiceCategories() {
    const serviceCategories = ref([]);
    const serviceCategory = ref([]);
    
    const router = useRouter()
    
    const getServiceCategories = async () => {
        let res = await axiosClient.get("/serviceCategory");
        serviceCategories.value = res.data;
        // console.log('getROles');
        // console.log(res.data);
    };
    //
    const getServiceCategory = async (id) => {
        let response = await axiosClient.get("/serviceCategory/show/" + id);
        // console.log('id');
        // console.log(id);
        console.log("getserviceCategory from composables ; res");
        console.log(response);
        serviceCategory.value = response.data.data;    
    };
    const storeServiceCategory = async(data) => {
        // errors.value = ''
        console.log('data');
        console.log(data);
        // try {
            axiosClient.post("/serviceCategory", data)
            await router.push({name: 'ServiceCategoriesIndex'});
        // } catch (e) {
        //     if (e.response.status === 422) {
        //         errors.value = e.response.data.errors
        //     }
        // }
    }
    const updateServiceCategory = async (id) => {
        errors.value = ''
        try {
            await axiosClient.put('/serviceCategory/' + id, serviceCategory.value)
            await router.push({name: 'ServiceCategoriesIndex'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyServiceCategory = async (id) => {
        console.log('deleteServiceCategory serviceCategoryjs b');
        await axiosClient.delete('/serviceCategory/' + id)
        console.log('deleteServiceCategory serviceCategoryjs a');
    }
    return {
        serviceCategory,
        serviceCategories,
        getServiceCategory,
        getServiceCategories,
        storeServiceCategory,
        updateServiceCategory,
        destroyServiceCategory,
    };
}
