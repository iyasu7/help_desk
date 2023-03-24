<template>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justifiy-start p-2">
                    <RouterLink :to="{ name: 'RoleIndex' }"
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
                        <form @submit.prevent="saveRole">
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Role name </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" v-model="role.name"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>

                                <!-- <span v-if="error" class="text-red-400 text-sm">{{ $message }}</span> -->

                            </div>

                            <div class="sm:col-span-6">
                                <h2 class="text-2xl font-semibold my-4">Role Permissions</h2>
                                <div v-if="rolePermissions && rolePermissions.length !=0">
                                    <div v-for="role_permission in rolePermissions">
                                        <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                            @click="deletePermission(role.id, role_permission.id)">
                                            {{ role_permission.name }}
                                        </button>
                                    </div>
                                </div>
                                <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="permission in permissions" :key="permission.id" :value="permission.name">
                                        {{ permission.name }}
                                    </option>
                                </select>
                            </div>

                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                            </div>

                            <!-- <span v-if="" class="text-red-400 text-sm">{{ $message }}</span> -->

                            <!-- <div class="sm:col-span-6 pt-5">
                                <button class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                            </div> -->
                        </form>
                    </div>
                </div>
                <div class="mt-6 p-2 bg-slate-100">
                    <div class="flex space-x-2 mt-4 p-2">

                    </div>
                    <div class="max-w-xl mt-6">
                        <!-- <form @submit.prevent="assignPermission">

                           
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import useRoles from '../../composables/roles';
// import { usePermissions } from '../../composables/permissions';
import usePermissions from '../../composables/permissions';
import { onMounted } from 'vue';
// import { useRoute } from 'vue-router';
const { role, rolePermissions, getRole, updateRole } = useRoles();
const { permissions, getPermissions } = usePermissions();

const props = defineProps(['id']);
// const route = useRoute();

// const roleId = route.params.id;
// const editRole = ref({});

// editRole.value = roles.value.filter((role)=>{
//     role.id === roleId;
// })


onMounted(() => {
    getRole(props.id);
    getPermissions();
});
console.log('permission');
console.log(permissions.value);

const saveRole = async () => {
    // role.value = editRole.value;
    await updateRole(props.id)
}

// import store from '../../store';
// const role = {
//     name: 'me',
//     description: ''
// }

// function deletePermission(role, permission) {
//     confirm('Are you sure?');
//     store.dispatch('deletePermission', { role, permission })
//     // .then(());
// }
// function assignPermission(role, permission) {
//     store.dispatch('assignPermission', { role, permission })
//     // .then(());
// }
</script>

<style scoped></style>