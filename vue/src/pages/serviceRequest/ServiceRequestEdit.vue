<template>
    <div class="py-12 w-full ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 dark:bg-gray-600">
                <div class="flex justifiy-start p-2">
                    <RouterLink :to="{ name: 'ServiceRequestsIndex' }"
                        class="px-4 flex py-2 bg-green-500 hover:bg-green-700 rounded-md text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                        </svg>
                        <span class="pl-1">Service Request</span>
                    </RouterLink>
                </div>
                <div class="flex flex-col p-2 bg-slate-100 dark:bg-gray-600">
                    <div class="space-y-8 divide-y divide-gray-200 mt-6">
                        <form @submit.prevent="saveServiceRequest">
                            <div class="grid gap-6 mb-4 mx-6 mt-2 md:grid-cols-2">s
                                <div>
                                    <label for="name"
                                        class="block text-sm font-bold ml-1 my-2 dark:text-gray-200 text-gray-800">
                                        Service Category</label>
                                    <div>
                                        service_category_id: {{ serviceRequest.service_category_id }}
                                        <select name="category"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required v-model="serviceRequest.service_category_id" v-on:change="getTypes()">
                                            <option value="">-- Choose Service Category --</option>
                                            <option v-for="serviceCategory in serviceCategories" :value="serviceCategory.id"
                                                :key="serviceCategory.id"
                                                class="py-3 px-4 bg-gray-600 dark:text-gray-200 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                                {{ serviceCategory.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="assigned_to"
                                        class="block text-sm font-bold ml-1 my-2 dark:text-gray-200 text-gray-800">
                                    Assigned To    
                                    </label>
                                        <select name="assigned_to"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required v-model="serviceRequest.assigned_agent_id">
                                            <option v-for="agent in roleUsers" :value="agent.id"
                                                :key="agent.id"
                                                class="py-3 px-4 mx-4 my-2 bg-gray-600 dark:text-gray-200 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                                {{ agent.name }}
                                            </option>
                                        </select>
                                </div>
                                <div>
                                    <label for="name"
                                        class="block text-sm font-bold ml-1 my-2 dark:text-gray-200 text-gray-800">Service
                                        Type</label>
                                    <div>
                                        service_type_id: {{ serviceRequest.service_type_id }}
                                        <select name="city"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required v-model="serviceRequest.service_type_id">
                                            <option value="" v-if="editServiceType.length == 0">-- Choose Category First --
                                            </option>
                                            <option v-for="serviceType in editServiceType" :value="serviceType.id"
                                                class="py-8 px-4 bg-gray-600 dark:text-gray-200 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                                :key="serviceType.id">
                                                {{ serviceType.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="status"
                                        class="block text-sm font-bold ml-1 my-2 dark:text-gray-200 text-gray-800">
                                    Status   
                                    </label>
                                        <select name="status"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required v-model="serviceRequest.status">
                                            <option v-for="status in statuses" :value="status"
                                                :key="status"
                                                class="py-3 px-4 mx-4 my-2 bg-gray-600 dark:text-gray-200 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                                {{ status }}
                                            </option>
                                        </select>
                                </div>
                                <div>
                                    <label for="description"
                                        class="block text-sm font-bold ml-1 my-2 dark:text-gray-200 text-gray-800">Description</label>
                                    <div class="relative">
                                        <textarea type="text" v-model="serviceRequest.description" id="description"
                                            name="description"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required>
                                                </textarea>
                                    </div>
                                    <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid
                                        description
                                    </p>
                                </div>
                                <!-- <div>
                <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Unique visitors
                    (per month)</label>
                <input type="number" id="visitors"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
            </div> -->
                            </div>
                            <div class="sm:col-span-6">
                                

                                <!-- <span v-if="error" class="text-red-400 text-sm">{{ $message }}</span> -->

                            </div>
                            <div class="sm:col-span-6 pt-5">
                                <button class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <pre>
                            {{ serviceRequest }}
                        </pre>
            </div>
        </div>
    </div>
</template>

<script setup>
import useServiceRequests from '../../composables/serviceRequest';
import useServiceCategories from '../../composables/serviceCategory';
import useServiceTypes from '../../composables/serviceType';
import useUsers from '../../composables/users';
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router';

const { errors, serviceRequest, serviceRequests, getServiceRequests, updateServiceRequest } = useServiceRequests();
const { serviceCategories, getServiceCategories } = useServiceCategories();
const { serviceTypes, getServiceTypes } = useServiceTypes();
const { roleUsers , getRoleUsers } = useUsers();

const statuses = [
    "PENNDING",
    "DONE",
]
const editServiceType = ref([]);
onMounted(() => {
    getServiceTypes();
    filteredReq(props.id)
    getServiceCategories()
    getRoleUsers(3)
    console.log('onmount serviceRequest');
    console.log(serviceRequest);
});

const props = defineProps(['id']);


const filteredReq = async (id) => {
    console.log(id);
    await getServiceRequests()
    console.log('serviceR');
    console.log(serviceRequest);
    serviceRequests.value.filter((serviceReq) => {
        // console.log('serviceReq');
        // console.log(serviceReq);
        if (serviceReq.id == id) {
            serviceRequest.value = serviceReq

        };
    })
    console.log('serviceRequest filReq');
    console.log(serviceRequest.value);
}

const getTypes = async () => {
    await getServiceTypes();
    console.log(serviceTypes);
    editServiceType.length = 0;
    serviceTypes.value.filter((serviceTy) => {
        if (serviceTy.service_category_id == serviceRequest.value.service_category_id) {
            editServiceType.value.push(serviceTy);
        }
    })
}
// let id = 
// const getTypes = async (serviceRequest.service_type_id) => {
//     await getServiceTypes()
//     filtered.length=0;
//     serviceTypes.value.filter((service) => {
//         if(service.service_category_id === form.service_category_id){
//             filtered.push(service)
//         }

//     })
// }


const saveServiceRequest = async () => {
    // serviceRequest.value = editServiceRequest.value;
    await updateServiceRequest(props.id)
}

</script>

<style scoped></style>