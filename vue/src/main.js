import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import store from "./store";
// import { abilitiesPlugin } from '@casl/vue';
// import ability from './services/ability';


createApp(App)
.use(store)
// .use(abilitiesPlugin, ability)
.use(router)
.mount('#app')
