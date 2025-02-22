import { createApp } from 'vue'
import { createPinia } from 'pinia'
//import { useAuthStore } from '@/stores/auth';
import router from '@/router';
import App from '@/App.vue';
import '../css/app.css';
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Content-Type'] = 'application/json';
window.axios.defaults.headers.common['Accept'] = 'application/json';
window.axios.defaults.withCredentials = true;
window.axios.defaults.withXSRFToken = true;

// import Echo from 'laravel-echo';
 
// import Pusher from 'pusher-js';
// window.Pusher = Pusher;
 
// window.Echo = new Echo({
//     broadcaster: 'reverb',
//     key: import.meta.env.VITE_REVERB_APP_KEY,
//     wsHost: import.meta.env.VITE_REVERB_HOST,
//     wsPort: import.meta.env.VITE_REVERB_PORT,
//     wssPort: import.meta.env.VITE_REVERB_PORT,
//     forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

const pinia = createPinia()
const app = createApp(App)
  .use(pinia)

  app.use(router)
    .mount('#app');


    
// const userStore = useAuthStore()
// userStore.attempt_user()
//   .catch((error) => {
//     console.log('Please login.')
//   })
//   .finally(() => {
//     app.use(router)
//       .mount('#app');
//   })