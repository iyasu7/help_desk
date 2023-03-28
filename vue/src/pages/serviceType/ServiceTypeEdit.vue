<template>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg p-2 ">
                <div class="flex justifiy-start p-2">
                    <RouterLink :to="{ name: 'ServiceTypesIndex' }"
                        class="px-4 flex py-2 bg-green-500 hover:bg-green-700 rounded-md text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        <span class="pl-1">Service Types</span>
                    </RouterLink>
                </div>
                <div class="flex flex-col p-2 bg-gray-600">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-6">
                        <form @submit.prevent="saveServiceType">
                            <div>
                                    <label for="name"
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 mt-3 text-gray-800">Service
                                        Category</label>
                                    <div>
                                        <select v-model="serviceType.service_category_id"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            id="lang">
                                            <option value="" disabled >Select Service Category</option>
                                            <option v-for="serviceCategory in serviceCategories" :key="serviceCategory.id"
                                                :value="serviceCategory.id"
                                                class="py-3 px-4 bg-gray-600 dark:text-gray-200 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                                {{ serviceCategory.name }}
                                            </option>

                                        </select>
                                    </div>
                                    <label for="name"
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 mt-3 text-gray-800">Service
                                        Type</label>
                                    <div class="relative">
                                        <input type="text" v-model="serviceType.name" id="name" name="name"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required aria-describedby="email-error">
                                    </div>
                                    <!-- <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid ServiceType
                                    </p>
                                    {{ sameDataError }}
                                    <p v-if="sameData" class="hidden text-xs text-red-600 mt-2">Service Category already exists
                                    </p> -->
                                </div>
                                <div>
                                    <label for="description"
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 mt-3 text-gray-800">Description</label>
                                    <div class="relative">
                                        <textarea type="text" v-model="serviceType.description" id="description" name="description"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required>
                                                            </textarea>
                                    </div>
                                    <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid
                                        description
                                    </p>
                                </div>
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import useServiceTypes from '../../composables/serviceType';
import { onMounted,ref } from 'vue';
import { useRoute } from 'vue-router';
import useServiceCategories from '../../composables/serviceCategory';
const { errors, serviceType, serviceTypes, getServiceTypes, updateServiceType } = useServiceTypes();
const {  serviceCategories, getServiceCategories } = useServiceCategories();

const props = defineProps(['id']);

const filtered = async (id) => {
    // console.log(id);
    await getServiceTypes()
    console.log(serviceTypes);
    serviceTypes.value.filter((serviceCate)=>{
    if(serviceCate.id == id){
        serviceType.value = serviceCate
        console.log("serviceCate");
        console.log(serviceCate);
    }
})}



    onMounted(()=>{
        filtered(props.id);
        getServiceCategories();
    });

    const saveServiceType = async () => {
        serviceType.value = editServiceType.value;
        await updateServiceType(props.id)
    }

// import store from '../../store';
// const serviceType = {
//     name: 'me',
//     description: ''
// }

// function deletePermission(serviceType, permission) {
//     confirm('Are you sure?');
//     store.dispatch('deletePermission', { serviceType, permission })
//     // .then(());
// }
// function assignPermission(serviceType, permission) {
//     store.dispatch('assignPermission', { serviceType, permission })
//     // .then(());
// }
</script>

<style scoped></style>