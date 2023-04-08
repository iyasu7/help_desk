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

                            <RouterLink :to="{ name: 'PermissionCreate' }"
                                class="px-4 py-2 bg-green-700 hover:bg-green-500 dark:text-green-100 rounded-md">Create
                                Permission
                            </RouterLink>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead
                                            class="bg-gray-300 ml-3 dark:bg-gray-800 dark:border-b dark:text-gray-400 dark:border-gray-200">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                    Name</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:text-gray-300 divide-gray-400">

                                            <tr v-for="permission in permissions" :key="permission.id"
                                                class=" dark:bg-gray-700  dark:border-b dark:border-gray-400">
                                                <td class="px-6 py-4 whitespace-nowrap dark:border-gray-400">
                                                    <div class="flex items-center">
                                                        {{ permission.name }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <span class="bg-gray-500 px-3 py-2" @click="permissionsList">click</span> -->
                </div>
            </div>
        </div>
        <div class="py-4 px-5 flex justify-between items-center">

        </div>
    </div>
</template>

<script >
import { RouterLink } from 'vue-router';
import usePermissions from '../../composables/permissions';
import { onMounted } from 'vue';

export default {
    setup() {
        const { permissions, getPermissions, destroyPermission } = usePermissions();
        onMounted(getPermissions);

        const deletePermission = async (id) => {
            if (!window.confirm('Are you sure?')) {
                return
            }
            console.log('deletePermission index');
            await destroyPermission(id);
            await getPermissions();
        }

        return {
            permissions,
            deletePermission,
        }
    }
}

</script>

<style scoped>
.hover\:border-gray-400:hover {
    border-color: #cbd5e0;
}
</style>