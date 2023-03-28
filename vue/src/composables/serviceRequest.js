import axiosClient from "../axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default function useServiceRequests() {
    const serviceRequests = ref([]); 
    const serviceRequest = ref([]);
    
    const router = useRouter()
    
    const getServiceRequests = async () => {
        let res = await axiosClient.get("/serviceRequest");
        serviceRequests.value = res.data;
        console.log('serviceRequests');
        console.log(res);
    };
    //
    const getServiceRequest = async (id) => {
        let response = await axiosClient.get("/serviceRequest/show/" + id);
        // console.log('id');
        // console.log(id);
        console.log("getserviceRequest from composables ; res");
        console.log(response);
        serviceRequest.value = response.data.data;    
    };
    const storeServiceRequest = async(data) => {
        // errors.value = ''
        console.log('COMdata');
        console.log(data);
        // try {
            await axiosClient.post("/serviceRequest/create", data)
            await router.push({name: 'ServiceRequestsIndex'});
        // } catch (e) {
        //     if (e.response.status === 422) {
        //         errors.value = e.response.data.errors
        //     }
        // }
    }
    const updateServiceRequest = async (id) => {
        errors.value = ''
        try {
            await axiosClient.put('/serviceRequest/update/' + id, serviceRequest.value)
            await router.push({name: 'ServiceRequestsIndex'});
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyServiceRequest = async (id) => {
        console.log('deleteServiceRequest serviceRequestjs b');
        await axiosClient.delete('/serviceRequest/delete/' + id)
        console.log('deleteServiceRequest serviceRequestjs a');
    }
    return {
        serviceRequest,
        serviceRequests,
        getServiceRequest,
        getServiceRequests,
        storeServiceRequest,
        updateServiceRequest,
        destroyServiceRequest,
    };
}
