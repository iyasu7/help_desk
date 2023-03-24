<template >
  <!-- <section class="flex justify-center ">
    <div>
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=green&shade=600"
          alt="Tahses ICT and Solution" />
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register a User</h2>
        
      </div>
      <form class="mt-8 space-y-6" @submit.prevent="register">
        <input type="hidden" name="remember" value="true" />
        <div class="-space-y-px rounded-md shadow-sm">
          <div>
            <label for="full-name" class="sr-only">Full Name</label>
            <input id="full-name" name="name" type="text" autocomplete="name" required="" v-model="user.name"
              class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
              placeholder="Full name" />
          </div>
          <div>
            <label for="email-address" class="sr-only">Email Address</label>
            <input id="email-address" name="email" type="email" autocomplete="email" required="" v-model="user.email"
              class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
              placeholder="Email address" />
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required=""
              v-model="user.password"
              class="relative block w-full appearance-none rounded-none  border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
              placeholder="Password" />
          </div>
          <div>
            <label for="password_confirmation" class="sr-only">Password Confirmation</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
              autocomplete="current-password_confirmation" required="" v-model="user.password_confirmation"
              class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
              placeholder="Password Confirmation" />
          </div>
          <div>
            


             npm install vue3-dropdown-navbar -->
  <!-- <TheDropDownNavbar>
              <template #logo>
                <TheDropDownNavbarLogo>Role</TheDropDownNavbarLogo>
              </template>
              <TheDropDownItem link="/home">Home</TheDropDownItem>
              <TheDropDownMenu text="Dropdown 1" ref="dropdownMenu">
                <TheDropDownItem>Dropdown Item 1</TheDropDownItem>
                <TheDropDownItem>Dropdown Item 2</TheDropDownItem>
                <TheDropDownMenu text="Dropdown Item 3">
                  <TheDropDownItem>Dropdown Item 3-1</TheDropDownItem>
                  <TheDropDownItem>Dropdown Item 3-2</TheDropDownItem>
                </TheDropDownMenu>
                <TheDropDownDivideBlock>
                  <TheDropDownItem>Sign out</TheDropDownItem>
                </TheDropDownDivideBlock>
              </TheDropDownMenu>
              <TheDropDownItem @click="toggleDarkMode">Toggle Dark Mode</TheDropDownItem>
            </TheDropDownNavbar> -->
  <!-- <label class="mr-3 sr-only" for="lang">Roles</label>
            <select v-model="user.role"
              class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
               id="lang">
              <option value="">Select Role</option>
              <option v-for="role in roles" :key="role.name" :value="role.name">{{ role.name }}</option>

            </select>

          </div>
        </div>

        <div>
          <button type="submit"
            class="group relative flex w-full justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-green-300 group-hover:text-green-400" aria-hidden="true" />
            </span>
            Register
          </button>
        </div>
      </form>
    </div>
  </section>  -->

  <div>
    <form @submit.prevent="register" class="w-full h-auto p-4 flex items-center justify-center">
      <div class=" bg-gray-500 rounded-lg py-6 px-10 sm:max-w-md w-full ">
      <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12">
        User Registration
      </div>
      <div class="">
        <div>
          <input type="text" v-model="user.name" class="rounded-lg focus:outline-none border-b w-full bg-slate-500 py-2 px-3 border-sky-400 placeholder-gray-200"
            placeholder="Name " />
        </div>
        <div>
          <input type="email" v-model="user.email" class="rounded-lg focus:outline-none border-b w-full bg-slate-500 py-2 px-3 border-sky-400 placeholder-gray-200 my-8"
            placeholder="Email Address " />
        </div>
        <div>
          <input type="text" v-model="user.pasword" class="rounded-lg focus:outline-none border-b w-full bg-slate-500 py-2 px-3 border-sky-400 placeholder-gray-200 mb-8"
            placeholder="Country " />
        </div>
        <div>
          <select v-model="user.role"
              class="rounded-lg focus:outline-none border-b w-full bg-slate-500 py-2 px-3 border-sky-400 placeholder-gray-200 mb-8"
               id="lang">
              <option value="">Select Role</option>
              <option v-for="role in roles" :key="role.name" :value="role.name">{{ role.name }}</option>

            </select>
        </div>
        
        <div class="flex justify-center my-6">
          <button
            class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-blue-600  to-gray-800 text-gray-300 text-lg font-semibold ">
            Create User
          </button>
        </div>
      </div>
    </div>
    </form>
  </div>
</template>
<script >
import { LockClosedIcon } from '@heroicons/vue/20/solid'
import store from '../store'
// import { computed,ref,onMounted } from 'vue';
import { useRouter } from "vue-router"
import useRoles from '../composables/roles';
import { onMounted } from 'vue';


const router = useRouter();
const user = {
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  role: '',
};


// const { roles, getRoles, } = useRoles;
// onMounted(getRoles);



async function register() {
  await store.dispatch('register', user)
    // .then(
    //   () => {
    //     router.push({
    //       name: 'Dashboard'
    //     })
    //   })
    .then(user.name = '',
      user.email = '',
      user.password = '',
      user.password_confirmation = '',
      user.role = '',)
}

</script>