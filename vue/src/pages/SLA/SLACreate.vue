<template>
    <form @submit.prevent="saveSla">
        <div class="grid gap-6 mb-4 mx-6 mt-2 md:grid-cols-2">
            <div>
                <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                    Company
                </label>
                <input type="text" id="company_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" required>
            </div>
            <div>
                <label for="company_representative" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                    Company Repersentative
                </label>
                <input type="text" id="company_representative"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Doe" required>
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                    Company Repersentative Phone number
                </label>
                <input type="tel" id="phone"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
            </div>
            <div>
                <label for="agent_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                    Agent Name
                </label>
                <input type="text" id="agent_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Flowbite" required>
            </div>
            <div>
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                    Start Date</label>
                <input type="date" id="start_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-48Pw4HEUGAuiaJUkba6BNTUwdGVAfUe1FXhkn4UxfmGb6EQhmA1XWc3DUZMbQKZWrs9QuM7oDmFKL28TNF4NNxi7RhnZwurcom"
                    required>
            </div>
            <div>
                <label for="expire_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                    Expire Date</label>
                <input type="date" id="expire_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-48Pw4HEUGAuiaJUkba6BNTUwdGVAfUe1FXhkn4UxfmGb6EQhmA1XWc3DUZMbQKZWrs9QuM7oDmFKL28TNF4NNxi7RhnZwurcom"
                    required>
            </div>
            <div>
                <label for="sla_file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                    Sevice Level Agreement File</label>
                <input type="file" id="sla_file"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-48Pw4HEUGAuiaJUkba6BNTUwdGVAfUe1FXhkn4UxfmGb6EQhmA1XWc3DUZMbQKZWrs9QuM7oDmFKL28TNF4NNxi7RhnZwurcom"
                    required>
            </div>
            <!-- <div>
                <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Unique visitors
                    (per month)</label>
                <input type="number" id="visitors"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
            </div> -->
        </div>
        <div class=" mb-6 mx-6 mt-2">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                    Sevice Level Agreement in words</label>
            <Editor class="dark:bg-slate-800" api-key="no-api-key" :init="{
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link',  'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'

            }" />
        </div>
        <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
                <input id="agree" type="checkbox" value=""
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                    required>
            </div>
            <label for="agree" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <span
                    class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</span>.</label>
        </div>
        <button type="submit"
            class="text-white mb-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</template>

<script setup>
import Editor from '@tinymce/tinymce-vue'

</script>

<style scoped></style>