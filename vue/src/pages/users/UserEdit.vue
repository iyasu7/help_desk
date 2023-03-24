<template>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justifiy-start p-2">
                    <RouterLink :to="{ name: 'UsersIndex' }"
                        class="px-4 flex py-2 bg-green-500 hover:bg-green-700 rounded-md text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        <span class="pl-1">Users</span>
                    </RouterLink>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-6">
                        <form @submit="saveUser">
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> User name </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" v-model="editUser.name"
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
                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">User Permissions</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        <!-- <div v-if="user.permissions">
                            <div v-for="user_permission in user.permissions">
                                <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                    @click="deletePermission(user.id, user_permission.id)">
                                    {{ user_permission.name }}
                                </button>
                            </div>
                        </div> -->
                    </div>
                    <div class="max-w-xl mt-6">
                        <form @submit.prevent="assignPermission">

                            <div class="sm:col-span-6">
                                <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="permission in permissions" :value="permission.name">
                                        {{ $permission.name }}
                                    </option>
                                </select>
                            </div>

                            <!-- <span v-if="" class="text-red-400 text-sm">{{ $message }}</span> -->

                            <div class="sm:col-span-6 pt-5">
                                <button class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import useUsers from '../../composables/users';
import { onMounted,ref } from 'vue';
import { useRoute } from 'vue-router';
const { errors, user, users, getUser, updateUser } = useUsers();

const props = defineProps(['id']);
const route = useRoute();

const userId = route.params.id;
const editUser = ref({});

editUser.value = users.value.filter((user)=>{
    user.id === userId;
})



    onMounted(getUser(props.id));

    const saveUser = async () => {
        user.value = editUser.value;
        await updateUser(props.id)
    }

// import store from '../../store';
// const user = {
//     name: 'me',
//     description: ''
// }

// function deletePermission(user, permission) {
//     confirm('Are you sure?');
//     store.dispatch('deletePermission', { user, permission })
//     // .then(());
// }
// function assignPermission(user, permission) {
//     store.dispatch('assignPermission', { user, permission })
//     // .then(());
// }
</script>

<style scoped></style>