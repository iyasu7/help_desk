    <template >
      <section class="w-[40vw] mx-auto flex justify-center items-center h-screen">
 <div>
  <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=green&shade=600"
          alt="Tahses ICT and Solution" />
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register an account</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Or
          {{ ' ' }}
          <RouterLink :to="{ name: 'Login' }" class="font-medium text-green-600 hover:text-green-500">Log-in to your account
          </RouterLink>
        </p>
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
              class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
              placeholder="Password Confirmation" />
          </div>
        </div>

        <div>
          <button type="submit"
            class="group relative flex w-full justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-green-300 group-hover:text-green-400" aria-hidden="true" />
            </span>
            Sign up
          </button>
        </div>
      </form>
      <!-- {{ store.state.user }} -->
 </div>
    </section>
    </template>
    <script setup>
    import { LockClosedIcon } from '@heroicons/vue/20/solid'
    import store from '../store'
    import { useRouter } from "vue-router"


    const router = useRouter();
    const user = {
          name: '',
          email: '',
          password: '',
          password_confirmation: ''
    };



    async function register() {
      await store.dispatch('register', user)
      .then(()=>{
        
        router.push({
          name:'Dashboard'
        })
      })
    }

    </script>