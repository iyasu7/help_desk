<template>
    <div>
        <main id="content" role="main" class="w-full max-w-md mx-auto p-6">
            <div class="mt-7 bg-gray-200  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Create Role</h1>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">

                             
                        </p>
                    </div>

                    <div class="mt-5">
                        <form @submit.prevent="savePermission">
                            <div class="grid gap-y-4">
                                <div>
                                    <label for="email"
                                        class="block text-sm font-bold ml-1 mb-2 dark:text-white">Permission</label>
                                    <div class="relative">
                                        <input type="text" v-model="permission.name" id="permission" name="permission"
                                            class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                            required aria-describedby="email-error">
                                    </div>
                                    <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid permission
                                    </p>
                                </div>
                                <div class="flex justify-between">
                                    <button
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Save</button>
                                <RouterLink :to="{ name: 'RoleIndex'}"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    cancel</RouterLink>
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
import store from '../../store';
const permission = {
    name: ''
}
async function savePermission() {
    store.dispatch('savePermission', permission)
        .then(() => {
            router.push({
                name: 'PermissionsIndex'
            })
        })
}
</script>
