<template>
  <!-- component -->
  <section class="max-w-4xl p-6 mx-auto rounded-md shadow-lg border border-gray-200 mt-20">
    <h1 class="text-xl font-bold text-white capitalize dark:text-white">Register A Client</h1>
    <form @submit.prevent="registerClient">
      <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
        <div>
          <label class="text-white " for="Name">company Name</label>
          <input id="Name" type="text" v-model="userClient.name" placeholder="Name"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </div>
        <div>
          <label class="text-white " for="emailAddress">Email Address</label>
          <input id="emailAddress" v-model="userClient.email" placeholder="email" type="email"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </div>
        <div>
          <label class="text-white " for="password">Password</label>
          <input id="password" v-model="userClient.password" placeholder="password" type="password"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </div>

        <div>
          <label class="text-white " for="passwordConfirmation">Password Confirmation</label>
          <input id="passwordConfirmation" v-model="userClient.password_confirmation" placeholder="Confirm password" type="password"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </div>
        <div>
          <label class="text-white " for="phone">Phone Number</label>
          <input id="phone" v-model="userClient.phone" placeholder="phone number" type="phone"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </div>
        <div>
          <label class="text-white " for="pobox">PO BOX</label>
          <input id="pobox" v-model="userClient.pobox" placeholder="PO BOX" type="text"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </div>

        <div>
          <label class="text-white " for="contact_person">Contact Person</label>
          <input id="contact_person" v-model="userClient.contact_person" placeholder="Contact Person for the Company" type="text"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </div>



        <!-- <div>
          <label class="text-white " for="passwordConfirmation">Date</label>
          <input id="date" v-model="userClient." placeholder="" type="date"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </div> -->
        <div>
          <label class="text-white " for="Description">Description about the Company</label>
          <textarea id="Description" v-model="userClient.description" placeholder="Description" type="textarea"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        </textarea>
        </div>
        <!-- <div>
          <label class="text-white " for="passwordConfirmation">Biography</label>
          <textarea id="textarea" v-model="userClient." placeholder="Biography" type="textarea"
            class="block w-full px-4 py-2 mt-2 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
        </div> -->
        <!-- <div>
                <label class="block text-sm font-medium text-white">
                Image
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span class="">Upload a file</span>
                      <input id="file-upload" name="file-upload" v-model="userClient." placeholder="" type="file" class="sr-only">
                    </label>
                    <p class="pl-1 text-white">or drag and drop</p>
                  </div>
                  <p class="text-xs text-white">
                    PNG, JPG, GIF up to 10MB
                  </p>
                </div>
              </div>
            </div> -->
      </div>

      <div class="flex justify-end mt-6">
        <button
          class="px-6 py-2 leading-5 border border-green-700 text-black hover:text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-700 focus:outline-none focus:bg-gray-600">
          Save</button>
      </div>
    </form>
  </section>
</template>

<script>
export default {

}
const userClient = {
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  pobox:'',
  phone: '',
  contact_person: '',
  description: ','
}
function registerClient() {
//
}
</script>

<style scoped></style>

            