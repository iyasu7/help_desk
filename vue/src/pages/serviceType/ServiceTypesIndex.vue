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

                            <RouterLink :to="{ name: 'ServiceTypeCreate' }"
                                class="px-4 py-2 bg-green-700 hover:bg-green-500 dark:text-green-100 rounded-md">Create
                                Service Type
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
                                                    Name</th>
                                                <th scope="col"
                                                    class="w-1/2 px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Description</th>
                                                <th scope="col" class="relative w-2/12 px-6 py-3 dark:text-gray-300">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:text-gray-300 divide-gray-400">

                                            <tr v-for="serviceType in serviceTypes" :key="serviceType.id"
                                                class=" dark:bg-gray-700  dark:border-b dark:border-gray-400">

                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceType.serviceCategory.name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ serviceType.name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ serviceType.description }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex justify-end mr-2">
                                                        <div class="flex space-x-2">
                                                            <!--  -->
                                                            <RouterLink
                                                                :to="{ name: 'ServiceTypeEdit', params: { id: serviceType.id } }"
                                                                class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">
                                                                Edit</RouterLink>
                                                                <!-- {{ serviceType.id }} -->
                                                            <button @click="deleteServiceType(serviceType.id)"
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
                </div>
            </div>
        </div>
    </div>
</template>

<script >
// import { CIcon } from '@coreui/icons-vue';
// import { cilArrowCircleLeft } from '@coreui/icons';
import { RouterLink } from 'vue-router';
import useServiceTypes from '../../composables/serviceType';
import useServiceCategories from '../../composables/serviceCategory';
import { onMounted } from 'vue';

export default {
    setup() {
        const { serviceTypes, getServiceTypes, destroyServiceType } = useServiceTypes();
        const { serviceCategories, getServiceCategories } = useServiceCategories();
        onMounted(getServiceTypes);
        // onMounted(() => {
        //     getServiceTypes,
        //         getServiceCategories
        // });
        // onMounted(callOnMounted);

        // const callOnMounted = () => {
        //     getServiceTypes,
        //     getServiceCategories
        // }
        // const category = (id) => {
        //     return serviceCategories.find(id);
        // }
        const deleteServiceType = async (id) => {
            if (!window.confirm('Are you sure?')) {
                return
            }
            console.log('deleteServiceType index');
            await destroyServiceType(id);
            await getServiceTypes();
        }

        return {
            serviceTypes,
            deleteServiceType,
        }
    }
}

</script>

