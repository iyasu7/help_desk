<template>
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl flex justify-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create a User
                    </h1>
                    <form class="space-y-4 md:space-y-6">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Name</label>
                            <input v-model="form.name" type="name" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Email</label>
                            <input v-model="form.email" type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input v-model="form.password" type="password" name="password" id="password" placeholder="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div>
                            <label for="confirm-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <input v-model="form.password_confirmation" type="password" name="confirm-password" id="confirm-password"
                                placeholder="confirm password "
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <label for="name" class="block text-sm font-bold ml-1 mb-2 dark:text-gray-200 text-gray-800">
                            Role</label>
                        <div>
                            <select v-model="form.role"
                                class="py-3 px-4 bg-gray-700 dark:text-gray-300 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                id="lang">
                                <option value="" disabled>Select Role</option>
                                <option v-for="role in roles" :key="role.id" :value="role.name"
                                    class="py-3 px-4 bg-gray-600 dark:text-gray-200 block w-full border-2 border-gray-500 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm">
                                    {{ role.name }}
                                </option>

                            </select>
                        </div>
                        <div class="flex justify-between mx-3">
                            <button type="button" @click="saveUser">
                                <span
                                    class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Save</span>
                            </button>
                            <RouterLink :to="{ name: 'UsersIndex' }">
                                <span
                                    class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Cancel</span>
                            </RouterLink>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { RouterLink } from 'vue-router';
import useUsers from '../../composables/users';
import { reactive } from 'vue';
import useRoles from '../../composables/roles';
import { onMounted } from 'vue';

const { roles, getRoles } = useRoles();
onMounted(getRoles);
const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: ''
})

const { storeUser } = useUsers();

const saveUser = async () => {
    console.log('create');
    await storeUser({ ...form });
}


</script>
