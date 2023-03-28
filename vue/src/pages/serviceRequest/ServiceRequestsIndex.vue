<template>
    <!-- <div id="app" class="min-h-screen flex justify-center pt-12 flex-col">
        <span class="font-medium text-4xl mb-4">Client List</span> -->
    <div class="rounded bg-white shadow-md" style="width: 1063px;">

        <div class="py-12 w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                    <div class="py-4 px-5 flex justify-between">
                        <div class="flex">
                            <button class="border border-gray-400 rounded shadow py-1 px-2 mr-2 flex items-center">
                                <svg class="mr-1" height="16" viewBox="0 0 16 16" width="16"
                                    xmlns="http://www.w3.org/2000/svg" style="height: 12px; width: 12px;">
                                    <path
                                        d="M13.994.004c.555 0 1.006.48Pw4HEUGAuiaJUkba6BNTUwdGVAfUe1FXhkn4UxfmGb6EQhmA1XWc3DUZMbQKZWrs9QuM7oDmFKL28TNF4NNxi7RhnZwur0 1 7 15.9V9.008l-5.788-7.39A.996.996 0 0 1 1.389.214a1.01 1.01 0 0 1 .617-.21z">
                                    </path>
                                </svg> Filter</button>
                            <div class="relative mr-2">
                                <input class="border border-gray-400 rounded shadow py-1 pl-8 pr-2" type="text"
                                    placeholder="Search...">
                                <div class="absolute inset-y-0 left-0 pl-2 flex items-center">
                                    <svg class="h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex">

                            <RouterLink :to="{ name: 'ServiceRequestCreate' }"
                                class="flex pl-2 pr-4 py-2 bg-green-700 hover:bg-green-500 dark:text-green-100 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                                Create Service Request
                            </RouterLink>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead
                                            class="bg-gray-300  dark:bg-gray-800 dark:border-b dark:text-gray-400 dark:border-gray-200">
                                            <tr>
                                                <th scope="col"
                                                    class="w-1/12 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Id</th>
                                                <th scope="col"
                                                    class="w-1/4 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Service Category</th>
                                                <th scope="col"
                                                    class="w-1/4 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Service Type</th>
                                                <th scope="col"
                                                    class="w-1/2 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Description</th>
                                                <th scope="col"
                                                    class="w-1/4 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Date</th>
                                                <th scope="col"
                                                    class="w-1/4 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Status</th>
                                                <th scope="col"
                                                    class="w-1/4 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Assigned To</th>
                                                <th scope="col"
                                                    class="w-1/4 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Completed</th>
                                                <th scope="col" class="relative w-2/12 px-6 py-3 dark:text-gray-300">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:text-gray-300 divide-gray-400">

                                            <tr v-for="serviceRequest in serviceRequests" :key="serviceRequest.id"
                                                class=" dark:bg-gray-700  dark:border-b dark:border-gray-400">

                                                <td class="px-6 py-4 whitespace-nowrap ">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.id }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.service_category_id }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.service_type_id }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.description }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.created_at }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.status ? serviceRequest.status: 'PENDING'}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.assigned_to ? serviceRequest.assigned_to : 'NOT ASSIGNED' }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.completed ? 'DONE' : 'NOT YET'}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex justify-end mr-2">
                                                        <div class="flex space-x-2">
                                                            <!--  -->
                                                            <RouterLink
                                                                :to="{ name: 'ServiceRequestEdit', params: { id: serviceRequest.id } }"
                                                                class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">
                                                                Edit</RouterLink>
                                                            <button @click="deleteServiceRequest(serviceRequest.id)"
                                                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <pre>
                        {{ serviceTypes }}
                    </pre>
                    <pre>
                        hi
                        {{ serviceRequests }}
                    </pre>
                </div>
            </div>
        </div>
    </div>
</template>

<script >
import { RouterLink } from 'vue-router';
import useServiceRequests from '../../composables/serviceRequest';
import useServiceTypes from '../../composables/serviceType';
import useServiceCategories from '../../composables/serviceCategory';
import { onMounted , computed } from 'vue';

export default {
    setup() {
        const { serviceRequests, getServiceRequests, destroyServiceRequest } = useServiceRequests();
        const { serviceTypes, getServiceTypes } = useServiceTypes();
        const { serviceCategories, getServiceCategories } = useServiceCategories();
        // onMounted(getServiceRequests);
        onMounted(() => {
            getServiceRequests(),
            getServiceTypes(),
            getServiceCategories()
        });
        // onMounted(callOnMounted);

        // const callOnMounted = () => {
        //     getServiceRequests,
        //     getServiceCategories
        // }
        // const category = (id) => {
        //     return serviceCategories.find(id);
        // }
        const deleteServiceRequest = async (id) => {
            if (!window.confirm('Are you sure?')) {
                return
            }
            await destroyServiceRequest(id);
            await getServiceRequests();
        }

        const serviceCategory = computed((id)=>{
         serviceCategories.value.filter((service)=>{
                service.id === id;
            })
        })

        return {
            serviceRequests,
            serviceCategory,
            serviceTypes,
            serviceCategories,
            deleteServiceRequest,
        }
    }
}

</script>

