<template>
    <!-- <div id="app" class="min-h-screen flex justify-center pt-12 flex-col">
        <span class="font-medium text-4xl mb-4">Client List</span> -->
    <div class="rounded bg-white shadow-md" style="width: 1063px;">

        <div class="py-4 w-full">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                    <div class="py-4 px-5 flex justify-between">
                        <div class="flex">
                            <button class="border border-gray-400 rounded shadow py-1 px-2 mr-2 flex items-center">
                                Filter</button>
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
                                                <th scope="col" class="relative w-2/12 px-6 py-3 dark:text-gray-300">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:text-gray-300 divide-gray-400">

                                            <tr v-for="serviceRequest in serviceRequests" :key="serviceRequest.id"
                                                class=" dark:bg-gray-700  dark:border-b dark:border-gray-400">

                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.service_category.name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.service_type.name }}
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
                                                        {{ serviceRequest.status ? serviceRequest.status : 'PENDING' }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceRequest.assigned_to ? serviceRequest.assigned_to : 'NOT ASSIGNED' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex justify-end mr-2">
                                                        <div class="flex space-x-2">
                                                            <!--  -->
                                                            <RouterLink
                                                                :to="{ name: 'ServiceRequestEdit', params: { id: serviceRequest.id } }"
                                                                class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">
                                                                Edit
                                                            </RouterLink>
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
                                    <table
                                        class="mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg overflow-hidden sm:shadow-lg">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Title</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Role</th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    John Doe</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    CEO</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600 dark:text-green-400">
                                                    Active</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    Admin</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Jane Smith</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    Manager</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-yellow-600 dark:text-yellow-400">
                                                    Pending</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    Moderator</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Bob Johnson</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    Developer</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600 dark:text-red-400">
                                                    Inactive</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                    User</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="bg-white dark:bg-gray-800">
                                        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                                            <div class="overflow-x-auto">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <pre>
                            {{ serviceTypes }}
                        </pre>
                    <pre>
                            hi
                            {{ serviceRequests }}
                        </pre> -->
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
import { onMounted, computed } from 'vue';

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

        const serviceCategory = computed((id) => {
            serviceCategories.value.filter((service) => {
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

