<template>
    <div class="m-3 shadow-xl bg-gray-600 p-3 rounded-lg">
        <form @submit.prevent="saveSla">
            <div class="grid gap-6 mb-4 mx-6 mt-2 md:grid-cols-2">
                <div>
                    <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                        Company
                    </label>
                    <input type="text" id="company_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.name" placeholder="John" required>
                </div>
                <div>
                    <label for="company_representative"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                        Company Repersentative
                    </label>
                    <input type="text" id="company_representative"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.company_repersentative" placeholder="Doe" required>
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                        Company Repersentative Phone number
                    </label>
                    <input type="tel" id="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.phone" placeholder="0912-34-5678" required>
                </div>
                <div>
                    <label for="agent_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                        Agent Name
                    </label>
                    <input type="text" id="agent_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.agent_name" placeholder="Flowbite" required>
                </div>
                <div>
                    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                        Start Date</label>
                    <input v-model="form.start_date" type="date" id="start_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-300 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div>
                    <label for="expire_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                        Expire Date</label>
                    <input v-model="form.expire_date" type="date" id="expire_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-300 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div>
                    <label for="sla_file"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                        Sevice Level Agreement File</label>
                    <input  type="file" @change="onChange" id="sla_file"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-300 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <!-- <div>
                <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Unique visitors
                    (per month)</label>
                <input type="number" id="visitors"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    v-model="form." placeholder="" required>
            </div> -->
            </div>
            <div class="flex items-start mb-6">
                <div class="flex ml-3 my-3 items-center h-5">
                    <input v-model="form.sign" id="agree" type="checkbox" value=true
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                        required>
                </div>
                <label for="agree" class="ml-2 my-3 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the
                    <span class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</span>.</label>
            </div>
            <button
                class="text-white mb-6 ml-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
        </form>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import useSLAs  from '../../composables/sla';
const { storeSLA } = useSLAs();
const form = reactive({
    name: '',
    company_repersentative: '',
    phone: '',
    agent_name: '',
    start_date: '',
    expire_date: '',
    file: '',
    sign: '',
});
// const file =reactive({});
const onChange = (event) => {
        console.log('e 2');
        form.file = event.target.files[0];
        console.log(form.file);
};
// const onChange = (e)=>{
//     console.log('e');
//     console.log(e);
//     form.file = e.target.files[0];
// }
const saveSla = async () => {
    let data = new FormData();
    data.append('file', 'this.file');
    console.log('data'); 
    console.log(data.get('file'));
    // storeSLA(data)
    await storeSLA({ ...form });
}


</script>

<style scoped></style>