import {createApp} from 'vue'
import {createPinia} from 'pinia'
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import App from './App.vue'
import router from './router'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap-icons/font/bootstrap-icons.css';






const app = createApp(App)
app.use(createPinia())
app.use(router)
app.use(ToastPlugin);
app.mount('#app')