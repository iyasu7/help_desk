<template>
    <div id="app" class="min-h-screen flex justify-center pt-12 flex-col">
        <span class="font-medium text-4xl">client List</span>

        <div class="rounded bg-white shadow-md" style="width: 1063px;">
            <div class="py-4 px-5 flex justify-between">
                <div class="flex">
                    <button class="border border-gray-400 rounded shadow py-1 px-2 mr-2 flex items-center">
                        <svg class="mr-1" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"
                            style="height: 12px; width: 12px;">
                            <path
                                d="M13.994.004c.555 0 1.006.448 1.006 1a.997.997 0 0 1-.212.614l-5.782 7.39L9 13.726a1 1 0 0 1-.293.708L7.171 15.97A.1.1 0 0 1 7 15.9V9.008l-5.788-7.39A.996.996 0 0 1 1.389.214a1.01 1.01 0 0 1 .617-.21z">
                            </path>
                        </svg> Filter</button>
                    <div class="relative mr-2">
                        <input v-model="search" class="border border-gray-400 rounded shadow py-1 pl-8 pr-2" type="text"
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
                    <RouterLink class="border border-gray-400 rounded shadow py-1 px-2 flex items-center mr-2" :to="{name: 'CreateClient' }">
                        <svg class="mr-1" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"
                            style="height: 12px; width: 12px;">
                            <path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z"
                                fill-rule="evenodd"></path>
                        </svg> Add Client</RouterLink>
                    <!-- <button class="border border-gray-400 rounded shadow py-1 px-2 flex items-center">
                        <svg class="mr-1" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"
                            style="height: 12px; width: 12px;">
                            <path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z"
                                fill-rule="evenodd"></path>
                        </svg> Export</button> -->
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-fixed w-auto min-w-full">
                    <thead class="bg-gray-200 border-gray-300 border-t border-b">
                        <tr>
                            <!-- <th class="pl-5 pr-2 py-2 text-left" style="width: 51.11px;"><input class="mr-2 leading-tight"
                                    type="checkbox"></th> -->
                            <th class="font-medium text-sm p-2 text-center" style="width: 100px;">Id</th>
                            <th class="font-medium text-sm p-2 text-left" style="width: 500px;">Name</th>
                            <th class="font-medium text-sm p-2 text-left" style="width: 200px;">Service Name</th>
                            <th class="font-medium text-sm p-2 text-left" style="width: 200px;">Service Type</th>
                            <th class="font-medium text-sm p-2 text-left" style="width: 200px;">Requested date</th>
                            <th class="font-medium text-sm p-2 text-left" style="width: 200px;"><strong>
                                    <svg height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"
                                        style="height: 16px; width: 12px;">
                                        <path
                                            d="M2 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z">
                                        </path>
                                    </svg>
                                </strong></th>
                            <th class="font-medium text-sm p-2" style="min-width: 60px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-gray-300 border-b hover:bg-gray-100" v-for="(invoice, index) in filteredInvoices"
                            :key="index">
                            <!-- @click="viewInDetails" -->
                            <!-- <td>
                                <a  class="inline-block pl-5 pr-2 py-2 w-full">
                                    <input class="mr-2 leading-tight" type="checkbox">
                                </a>
                            </td> -->
                            <td class="inline-block pl-5 pr-2 py-2 w-full">
                                {{ invoice.id }}
                            </td>
                            <td class="text-sm font-medium ">{{
                                invoice.name }}</td>
                            <td class="text-sm" style="max-width: 200px;"><a class="inline-block p-2 w-full truncate">{{
                                invoice.serviceCategory }}</a></td>
                            <td class="text-sm">
                                <a class="inline-block p-2 w-full truncate">{{ invoice.serviceType
                                }}</a>
                            </td>
                            <td class="text-sm">
                                <a class="inline-block p-2 w-full truncate">{{ invoice.date }}</a>
                            </td>
                            <td>
                                <div class="flex">
                                    <button
                                        class="hover:border-gray-400 hover:shadow bg-blue-400 hover:bg-blue-700 hover:text-gray-200 border border-transparent rounded py-1 px-2 flex items-center">
                                        Edit
                                    </button>
                                    <button
                                        class="hover:border-gray-400 hover:shadow bg-red-400 ml-2 hover:bg-red-700 hover:text-gray-200 border border-transparent rounded py-1 px-2 flex items-center">
                                        Delete
                                    </button>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="py-4 px-5 flex justify-between items-center">
                <p>
                    <span class="font-medium">{{ filteredInvoices.length + " "}}</span>
                    <span v-if="filteredInvoices.length === 1">result</span>
                    <span v-else>results</span>
                </p>
                <div>

                    <span class="border hover:bg-gray-500 ml-2 hover:text-gray-100  border-gray-400 rounded shadow py-1 px-2 mr-1"
                        @click="setPage(currentPageIndex - 1)">Prev</span>
                    <span v-for="page in pages" @click="setPage(page)" :class="{ 'current': currentPageIndex === page }">
                        {{ page + 1 }}</span>
                    <span class="border  hover:bg-gray-500 ml-2 hover:text-gray-100 border-gray-400 rounded shadow py-1 px-2"
                        @click="setPage(currentPageIndex + 1)">Next</span>

                </div>
            </div>
        </div>
    </div>
</template>

<script >
import store from '../../store'
export default {
    data() {
        return {
            search: '',
            currentPageIndex: 0,
            filteredLength: null,

        };
    },
    methods: {
        setPage(index) {
            if (index >= 0 && index < this.pages) {
                this.currentPageIndex = index;
            }
        },
    },
    watch: {
        search() {
            if (this.currentPageIndex + 1 > this.pages)
                this.currentPageIndex = this.pages - 1;

            filteredLength = filteredInvoices.length
        }
    },
    computed: {
        
    //   pages: function() {
    //     var filterBy = this.$options.filters.filterBy;       
    //     var filteredData = filterBy(this.data, this.searchKey);
    //     return Math.ceil(filteredData.length / this.perpage);
    //   },
    //   offset: function() {
    //     console.log(this.currentPageIndex, this.perpage);
    //     return this.currentPageIndex * this.perpage;
    //   },
        filteredInvoices() {
            return store.state.invoices
            // store.state.invoices.filter(invoice => {
            //     return invoice.name.toLowerCase().includes(this.search.toLowerCase()) ||
            //         invoice.serviceCategory.toLowerCase().includes(this.search.toLowerCase()) ||
            //         invoice.serviceType.toLowerCase().includes(this.search.toLowerCase()) ||
            //         invoice.date.toLowerCase().includes(this.search.toLowerCase())
            // })
        }
    },
    // Vue.component('list', Vue.extend({

    //     data: function () {
    //         return {
    //             searchKey: '',
    //             currentPageIndex: 0,
    //             orderKey: 'age'
    //         }
    //     },

    //     methods: {
    //         setPage: function (index) {
    //             if (index >= 0 && index < this.pages) {
    //                 this.currentPageIndex = index;
    //             }
    //         }
    //     },

    //         computed: {
    //             pages: function () {
    //                 var filterBy = this.$options.filters.filterBy;
    //                 var filteredData = filterBy(this.data, this.searchKey);
    //                 return Math.ceil(filteredData.length / this.perpage);
    //             },
    //             offset: function () {
    //                 console.log(this.currentPageIndex, this.perpage);
    //                 return this.currentPageIndex * this.perpage;
    //             }
    //         },

    //         watch: {
    //             searchKey: function () {
    //                 if (this.currentPageIndex + 1 > this.pages)
    //                     this.currentPageIndex = this.pages - 1;
    //             }
    //         },

    //         ready: function () {

    //         }

    //     }));

    //     Vue.filter('limit', function (arr, limit) {
    //         if (!Array.isArray(arr)) return false;
    //         return arr.slice(0, limit);
    //     })

    // Vue.filter('offset', function (arr, offset) {
    //         if (!Array.isArray(arr)) return false;
    //         return arr.slice(offset, arr.length)
    //     });

    //     var app = new Vue({
    //         'el': '#app'
    //     });
}

</script>

<style scoped>
.hover\:border-gray-400:hover {
    border-color: #cbd5e0;
}
</style>