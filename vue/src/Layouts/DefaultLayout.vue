<template>
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100">
    <body class="h-full">
    ```
  -->
  <div class="relative min-h-screen md:flex" data-dev-hint="container">
    <input type="checkbox" id="menu-open" class="hidden" />

    <label for="menu-open"
      class="absolute right-2 bottom-2 shadow-lg rounded-full p-2 bg-gray-100 text-gray-600 md:hidden"
      data-dev-hint="floating action button">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </label>

    <header class="bg-gray-600 text-gray-100 flex justify-between md:hidden" data-dev-hint="mobile menu bar">
      <!-- <a href="#" class="block p-4 text-white font-bold whitespace-nowrap truncate">
        Tahses
      </a> -->

      <label for="menu-open" id="mobile-menu-button"
        class="m-2 p-2 focus:outline-none hover:text-white hover:bg-gray-700 rounded-md">
        <svg id="menu-open-icon" class="h-6 w-6 transition duration-200 ease-in-out" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg id="menu-close-icon" class="h-6 w-6 transition duration-200 ease-in-out" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </label>
    </header>

    <aside id="sidebar"
      class="bg-gray-800 text-gray-100 md:w-64 w-3/4 space-y-6 pt-6 px-0 absolute inset-y-0 left-0 transform md:relative md:translate-x-0 transition duration-200 ease-in-out  md:flex md:flex-col md:justify-between overflow-y-auto"
      data-dev-hint="sidebar; px-0 for frameless; px-2 for visually inset the navigation">
      <div class="flex flex-col space-y-6 items-center justify-center" data-dev-hint="optional div for having an extra footer navigation">
        <!-- <a href="#" class="text-white flex items-center space-x-2 px-4" title="Tahses"> -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-0" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
          </svg>
          <span class="text-2xl font-extrabold whitespace-nowrap truncate mx-auto">Tahses</span>
        <!-- </a> -->

        <nav data-dev-hint="main navigation">
          <div class="flex items-center">
            <div class="hidden md:block">
              <div v-for="item in navigation" :key="item.name" class="ml-10 flex items-baseline space-x-4">
                <RouterLink  :to="item.to"
                  active-class="'bg-gray-900 text-white" :class="[route.name === item.to.name ? ''
                    : 'text-gray-300 hover:bg-gray-700 hover:text-white'
                    , 'px-3 py-2 rounded-md text-sm font-medium']">{{ item.name }}</RouterLink>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">


              <!-- Profile dropdown -->
              <Menu as="div" class="relative ml-3">
                <div>
                  <MenuButton
                    class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="sr-only">Open user menu</span>
                    <!-- <img class="h-8 w-8 rounded-full" :src="user.imageUrl" alt="" /> -->
                  </MenuButton>
                </div>
                <transition enter-active-class="transition ease-out duration-100"
                  enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                  leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100"
                  leave-to-class="transform opacity-0 scale-95">
                  <MenuItems
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <MenuItem v-slot="{ active }">
                    <a @click="logout" :class="[active ? 'bg-gray-100': '' , 
                      'block px-4 py-2 text-sm text-gray-700']">Signout</a>
                    </MenuItem>
                  </MenuItems>
                </transition>
              </Menu>
            </div>
          </div>
        </nav>
      </div>

      <nav data-dev-hint="second-main-navigation or footer navigation">
        <div class="hidden md:block  py-2 px-4 transition duration-200 bg-gray-900 hover:text-white">
          <div class="flex items-center">


            

            <Disclosure >
            <div class="flex items-center justify-center mx-2" >
              <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" :src="user.imageUrl" alt="" />
              </div>
              <div class="ml-1">
                <div class="text-base font-medium leading-none text-white">{{ user.name }}</div>
                <!-- <div class="text-sm font-medium leading-none text-gray-400">{{ user.email }}</div> -->
              </div>
            </div>
            <div class="mt-3 space-y-1 px-2 flex items-center">
              <DisclosureButton  as="a" @click="logout" 
              class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 bg-gray-900 hover:bg-gray-700 hover:text-white"
              > Signout </DisclosureButton>
            </div>
            </div>
          </Disclosure>

          </div>
        </div>
      </nav>
    </aside>

    <main id="content" class="flex-1 p-6 lg:px-8 dark:bg-gray-700">
      <div class="max-w-7xl mx-auto">
        <RouterView></RouterView>
      </div>
    </main>
  </div>
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { RouterLink, useRouter, useRoute } from 'vue-router';
import store from '../store'
import { computed } from 'vue';
const user = {
  name: 'Tom Cook',
  email: 'tom@example.com',
  imageUrl:
    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',

}

const navigation = [
  { name: 'Dashboard', to: { name: "Dashboard" } },
  { name: 'Users', to: { name: "UsersIndex" } },
  { name: 'Roles', to: { name: "RoleIndex" } },
  { name: 'Permissions', to: { name: "PermissionsIndex" } },
  { name: 'Service Categories', to: { name: "ServiceCategoriesIndex" } },
  { name: 'Service Types', to: { name: "ServiceTypesIndex" } },
  { name: 'Service Request', to: { name: "ServiceRequestsIndex" } },
  { name: 'SLA', to: { name: "SLAIndex" } },
  // { name: 'SLACreate', to: { name: "SLACreate" } },
  // { name: 'TechExpert', to: { name: "TechExpert" } },
  // { name: 'Roles & Permission', to: { name: "RolesPermission" } },
  // { name: 'Services', to: { name: "Services" } },
  // { name: 'Surveys', to:{name:"Surveys"} },
  // { name: 'Setting', to: { name: "Setting" } },
]
// const userNavigation = [
//   { name: 'Your Profile', href: '#' },
//   { name: 'Settings', href: '#' },
//   { name: 'Sign out', href: '#' },
// ]

const router = useRouter();
const route = useRoute();
// console.log(route);
// console.log(router);

function logout() {
  store.dispatch('logout')
  .then(()=>{
        router.push({
          name:'Login'
        })
      })
}
//     const user = ref(1)
// const plusOne = computed(() => count.value + 1)
    // const data = computed(() => store.state.user.data);
    // console.log(data.value);

</script>