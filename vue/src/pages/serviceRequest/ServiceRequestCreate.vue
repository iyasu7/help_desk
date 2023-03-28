<template>
    <div>
        <main id="content" role="main" class="w-full max-w-lg mx-auto p-6">
            <div class="text-start">
                <h1 class="block text-2xl font-bold text-gray-800  dark:text-gray-200 ">Create Service Request</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">

                     
                </p>
            </div>
            <div class="mt-7 bg-gray-200  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">


                    <div class="mt-5">
                        <form @submit.prevent="saveServiceRequest">
                            <div class="grid gap-y-4">
                                <div>
                                    <label for="name"
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 text-gray-800">
                                        Service Request</label>
                                    <div>
                                        <select name="category"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required v-model="form.service_category_id"
                                            v-on:change="getTypes(selectedCategory.id)">
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
                                    <label for="name"
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 text-gray-800">Service
                                        Type</label>
                                    <div>
                                        <select name="city" 
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required v-model="form.service_type_id">
                                            <option value="" v-if="serviceTypes.length == 0">-- Choose Category First --
                                            </option>
                                            <option v-for="serviceType in filtered" :value="serviceType.id"
                                                class="py-8 px-4 bg-gray-600 dark:text-gray-200 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                                :key="serviceType.id">
                                                {{ serviceType.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="description"
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 text-gray-800">Description</label>
                                    <div class="relative">
                                        <textarea type="text" v-model="form.description" id="description" name="description"
                                            class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required>
                                        </textarea>
                                    </div>
                                    <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid
                                        description
                                    </p>
                                </div>
                                <div class="flex justify-between">
                                    <button
                                        class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 dark:text--gray-200 text--gray-800 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        Save</button>
                                    <RouterLink :to="{ name: 'ServiceRequestsIndex' }"
                                        class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 dark:text--gray-200 text--gray-800 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        Cancel
                                    </RouterLink>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
</template>

<script setup>
import useServiceRequests from '../../composables/serviceRequest';
import useServiceCategories from '../../composables/serviceCategory';
import useServiceTypes from '../../composables/serviceType';
import { reactive, ref } from 'vue';
import { onMounted } from 'vue';

const form = reactive({
    service_category_id: null,
    service_type_id: null,
    description: ''
})

const { storeServiceRequest } = useServiceRequests();
const { serviceCategories, getServiceCategories } = useServiceCategories();
const { serviceTypes, getServiceTypes } = useServiceTypes();
const selectedCategory = ref("")
const filtered = reactive([])

onMounted(() => {
    getServiceCategories()
});



const getTypes = async (id) => {
    await getServiceTypes()
    filtered.length=0;
    serviceTypes.value.filter((service) => {
        if(service.service_category_id === form.service_category_id){
            filtered.push(service)
        }

    })
}
const saveServiceRequest = async () => {
    console.log('create');
    await storeServiceRequest({ ...form });
}


</script>
