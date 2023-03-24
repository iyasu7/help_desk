<template>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justifiy-start p-2">
                    <RouterLink :to="{ name: 'ServiceTypesIndex' }"
                        class="px-4 flex py-2 bg-green-500 hover:bg-green-700 rounded-md text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        <span class="pl-1">Roles</span>
                    </RouterLink>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-6">
                        <form @submit="saveRole">
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Service Category name </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" v-model="editServiceType.name"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>

                                <!-- <span v-if="error" class="text-red-400 text-sm">{{ $message }}</span> -->

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
const { errors, serviceType, serviceTypes, getServiceType, updateServiceType } = useServiceTypes();

const props = defineProps(['id']);
const route = useRoute();

const serviceTypeId = route.params.id;
const editServiceType = ref({});

editServiceType.value = serviceTypes.value.filter((serviceType)=>{
    serviceType.id === serviceTypeId;
})



    onMounted(getServiceType(props.id));

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