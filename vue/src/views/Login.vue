<template class="">
	<div class=" w-full">
		<!-- <div>
			<img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
				alt="Your Company" />
			<h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
			<p class="mt-2 text-center text-sm text-gray-600">
				Or
				{{ ' ' }}
				<RouterLink :to="{ name: 'Register' }" class="font-medium text-indigo-600 hover:text-indigo-500">Register
					for
					free
				</RouterLink>
			</p>
		</div> -->
		<form class="mt-8 space-y-6" @submit.prevent="login">
			<div class="min-h-screen my-8 py-6 flex flex-col justify-center sm:py-12">
				<div class="relative py-3 sm:max-w-xl sm:mx-auto">
					<div
						class="absolute inset-0 bg-gradient-to-l from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:rotate-12 sm:rounded-3xl">
					</div>
					<div
						class="absolute inset-0 bg-gradient-to-r from-green-300 to-green-600 shadow-lg transform -skew-y-16 sm:skew-y-0 sm:-rotate-12 sm:rounded-3xl">
					</div>
					<div class="relative px-4 py-10 bg-white shadow-xl shadow-cyan-500/50 sm:rounded-3xl md:shadow-lg md:shadow-blue-500/50 sm:p-20">
						<div class="max-w-md mx-auto">
							<div class="">
								<p class="flex justify-center text-xl font-semibold">Welcome Back </p>
								<h1 class="flex justify-center text-2xl font-semibold">Login </h1>
							</div>
							<div class="text-red-500 text-sm">{{ errMsg }}</div>
							<div class="divide-y divide-gray-200">
								<div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
									<div class="relative">
										<label for="email"
											class=" left-0 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
											Address</label>
										<input autocomplete="off" v-model="user.email" id="email" name="email" type="text"
											class="peer rounded-lg placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
											placeholder="Email address" />
									</div>
									<div class="relative">
										<label for="password"
											class=" left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
										<input autocomplete="off" v-model="user.password" id="password" name="password"
											type="password"
											class="peer rounded-lg placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
											placeholder="Password" />
									</div>
									<div class="">
										<div class="flex items-center px-3 py-2 mb-2">
											<input id="remember-me" name="remember-me" type="checkbox"
												v-model="user.remember"
												class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
											<label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember
												me</label>
										</div>

										<div class="text-sm px-3 py-2 mb-2">
											<!-- <a href="#"
												class=" inline-block font-medium text-indigo-600 hover:text-indigo-500">
												Forgot your password?</a> -->
											<!-- <RouterLink :to="{ name: 'Register' }"
												class="flex justify-center font-medium text-indigo-600 hover:text-indigo-500">
												Forgot your password?
											</RouterLink> --> 
										</div>
									</div>
									<div class="relative flex justify-center">
										<button
											class="bg-green-500 hover:bg-green-700 text-white rounded-lg px-3 py-2">Login</button>
									</div>
								</div>
							</div>
						</div>
						<!-- <RouterLink :to="{ name: 'Register' }"
							class="flex justify-center font-medium text-indigo-600 hover:text-indigo-500">Register for free
						</RouterLink> -->

					</div>
				</div>
			</div>
		</form>
	</div>
</template>

<script setup>
import { LockClosedIcon } from '@heroicons/vue/20/solid'
import store from '../store'
import { useRouter } from 'vue-router'
import { ref } from 'vue';

const router = useRouter();

const user = {
	email: '',
	password: '',
	remember: false,
}
let errMsg = ref('');
function login() {
	store.dispatch('login', user)
		.then(() => {
			router.push({
				name: 'Dashboard'
			})
		})
		.catch((err) =>
			errMsg = err.response.data.error)
}
</script>
