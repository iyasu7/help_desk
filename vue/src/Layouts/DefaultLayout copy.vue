<template>
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100">
    <body class="h-full">
    ```
  -->
  <!-- component -->
 
  <div x-data="" :class="{ 'dark': isDark }">
    <div
      class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

      <!-- Header -->
      <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
        <div
          class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none">
          <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden"
            src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" />
          <span class="hidden md:block">{{role}}role</span>
        </div>
        <div class="flex justify-between items-center h-14 bg-blue-800 dark:bg-gray-800 header-right">
          
          <!-- serach bar -->
          <!-- <div class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
            <button class="outline-none focus:outline-none">
              <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </button>
            <input type="search" name="" id="" placeholder="Search"
              class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
          </div> -->
          <ul class="flex items-center">
            <li>
              <button aria-hidden="true" @click="toggleTheme"
                class="group p-2 transition-colors duration-200 rounded-full shadow-md bg-blue-200 hover:bg-blue-200 dark:bg-gray-50 dark:hover:bg-gray-200 text-gray-900 focus:outline-none">
                toggle
              </button>
            </li>
            <li>
              <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
            </li>
            <li>
            </li>
          </ul>
        </div>
      </div>
      <!-- ./Header -->

      <!-- Sidebar -->
      <div
        class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
          <ul v-for="nav in navigation" class="flex flex-col py-4 space-y-1">
            <!-- <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
              </div>
            </li> -->
            <li>
              <RouterLink
               :to="nav.to"
                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  svg
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">{{ nav.name }}</span>
              </RouterLink>
            </li>
            
          </ul>
          <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">
                <span class="flex mr-1  justify-end">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                  </svg>
                </span>
                Logout</p>
        </div>
      </div>
      <div class="h-full ml-32 mt-20 mb-20 md:ml-64">
        <RouterView></RouterView>

      </div>
      <!-- ./Sidebar -->
      
    </div>
</div>




<!-- <main id="content" class="flex-1 p-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
        <RouterView></RouterView>
      </div>
    </main>
  </div> -->

<!-- <Disclosure>
          <div class="flex justify-center mx-2">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" :src="user.imageUrl" alt="" />
              </div>
              <div class="ml-1">
                <div class="text-base font-medium leading-none text-white">{{ user.name }}</div>
                <div class="text-sm font-medium leading-none text-gray-400">{{ user.email }}</div>
              </div>
            </div>
            <div class="mt-3 space-y-1 px-2 flex items-center">
              <DisclosureButton @click="logout"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                Signout 
              </DisclosureButton>
            </div>
          </div>
        </Disclosure> --></template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { RouterLink, useRouter, useRoute } from 'vue-router';
import { useStore } from 'vuex';
import { computed } from 'vue';
const user = {
  name: 'Tom Cook',
  email: 'tom@example.com',
  imageUrl:
    'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',

}


var sideBar = document.getElementById("mobile-nav");
var openSidebar = document.getElementById("openSideBar");
var closeSidebar = document.getElementById("closeSideBar");
// sideBar.style.transform = "translateX(-260px)";

function sidebarHandler(flag) {
  if (flag) {
    sideBar.style.transform = "translateX(0px)";
    openSidebar.classList.add("hidden");
    closeSidebar.classList.remove("hidden");
  } else {
    sideBar.style.transform = "translateX(-260px)";
    closeSidebar.classList.add("hidden");
    openSidebar.classList.remove("hidden");
  }
}

const navigation = [
  { name: 'Dashboard', to: { name: "Dashboard" } },
  { name: 'ClientList', to: { name: "ClientList" } },
  { name: 'AgentList', to: { name: "AgentList" } },
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

const store = useStore();
const router = useRouter();
const route = useRoute();
// console.log(route);
// console.log(router);

function logout() {
  store.dispatch('logout')
}
//     const user = ref(1)
// const plusOne = computed(() => count.value + 1)
    // const data = computed(() => store.state.user.data);
    // console.log(data.value);

</script>
<style>
/* Compiled dark classes from Tailwind */
.dark .dark\:divide-gray-700> :not([hidden])~ :not([hidden]) {
  border-color: rgba(55, 65, 81);
}

.dark .dark\:bg-gray-50 {
  background-color: rgba(249, 250, 251);
}

.dark .dark\:bg-gray-100 {
  background-color: rgba(243, 244, 246);
}

.dark .dark\:bg-gray-600 {
  background-color: rgba(75, 85, 99);
}

.dark .dark\:bg-gray-700 {
  background-color: rgba(55, 65, 81);
}

.dark .dark\:bg-gray-800 {
  background-color: rgba(31, 41, 55);
}

.dark .dark\:bg-gray-900 {
  background-color: rgba(17, 24, 39);
}

.dark .dark\:bg-red-700 {
  background-color: rgba(185, 28, 28);
}

.dark .dark\:bg-green-700 {
  background-color: rgba(4, 120, 87);
}

.dark .dark\:hover\:bg-gray-200:hover {
  background-color: rgba(229, 231, 235);
}

.dark .dark\:hover\:bg-gray-600:hover {
  background-color: rgba(75, 85, 99);
}

.dark .dark\:hover\:bg-gray-700:hover {
  background-color: rgba(55, 65, 81);
}

.dark .dark\:hover\:bg-gray-900:hover {
  background-color: rgba(17, 24, 39);
}

.dark .dark\:border-gray-100 {
  border-color: rgba(243, 244, 246);
}

.dark .dark\:border-gray-400 {
  border-color: rgba(156, 163, 175);
}

.dark .dark\:border-gray-500 {
  border-color: rgba(107, 114, 128);
}

.dark .dark\:border-gray-600 {
  border-color: rgba(75, 85, 99);
}

.dark .dark\:border-gray-700 {
  border-color: rgba(55, 65, 81);
}

.dark .dark\:border-gray-900 {
  border-color: rgba(17, 24, 39);
}

.dark .dark\:hover\:border-gray-800:hover {
  border-color: rgba(31, 41, 55);
}

.dark .dark\:text-white {
  color: rgba(255, 255, 255);
}

.dark .dark\:text-gray-50 {
  color: rgba(249, 250, 251);
}

.dark .dark\:text-gray-100 {
  color: rgba(243, 244, 246);
}

.dark .dark\:text-gray-200 {
  color: rgba(229, 231, 235);
}

.dark .dark\:text-gray-400 {
  color: rgba(156, 163, 175);
}

.dark .dark\:text-gray-500 {
  color: rgba(107, 114, 128);
}

.dark .dark\:text-gray-700 {
  color: rgba(55, 65, 81);
}

.dark .dark\:text-gray-800 {
  color: rgba(31, 41, 55);
}

.dark .dark\:text-red-100 {
  color: rgba(254, 226, 226);
}

.dark .dark\:text-green-100 {
  color: rgba(209, 250, 229);
}

.dark .dark\:text-blue-400 {
  color: rgba(96, 165, 250);
}

.dark .group:hover .dark\:group-hover\:text-gray-500 {
  color: rgba(107, 114, 128);
}

.dark .group:focus .dark\:group-focus\:text-gray-700 {
  color: rgba(55, 65, 81);
}

.dark .dark\:hover\:text-gray-100:hover {
  color: rgba(243, 244, 246);
}

.dark .dark\:hover\:text-blue-500:hover {
  color: rgba(59, 130, 246);
}

/* Custom style */
.header-right {
  width: calc(100% - 3.5rem);
}

.sidebar:hover {
  width: 16rem;
}

@media only screen and (min-width: 768px) {
  .header-right {
    width: calc(100% - 16rem);
  }
}
</style>