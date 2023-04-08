<template>
    <div>
        <main id="content" role="main" class="w-full max-w-lg mx-auto p-6">
            <div class="text-start">
                <h1 class="block text-2xl font-bold text-gray-800  dark:text-gray-200 ">Create Service Category</h1>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">

                     
                </p>
            </div>
            <div class="mt-7 bg-gray-200  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">


                    <div class="mt-5">
                        <form @submit.prevent="saveServiceType">
                            <div class="grid gap-y-4">
                                <div>
                                    <label for="name"
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 text-gray-800">Service
                                        Type</label>
                                    <div>
                                        <select v-model="form.service_category_id"
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
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 text-gray-800">Service
                                        Type</label>
                                    <div class="relative">
                                        <input type="text" v-model="form.name" id="name" name="name"
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
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 dark:text--gray-200 text--gray-800 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        Save</button>
                                    <RouterLink :to="{ name: 'ServiceTypesIndex' }"
                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 dark:text--gray-200 text--gray-800 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        Cancel</RouterLink>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <pre>
        {{ serviceCategories }}
    </pre>

        </main>
    </div>
</template>

<script setup>
import useServiceTypes from '../../composables/serviceType';
import useServiceCategories from '../../composables/serviceCategory';
import { reactive } from 'vue';
import { onMounted } from 'vue';

const form = reactive({
    service_category_id: '',
    name: '',
    description: ''
})

const { serviceCategories, getServiceCategories } = useServiceCategories();
onMounted(getServiceCategories);
const { storeServiceType } = useServiceTypes();



const saveServiceType = async () => {
    console.log('create');
    await storeServiceType({ ...form });
}


</script>
