// import './bootstrap';
import axios from 'axios'
import { createApp } from 'vue'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import router from './router.js'
import App from './components/app.vue'
import * as ElementPlusIconsVue from '@element-plus/icons-vue'

window.axios = axios;
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
axios.defaults.baseURL = 'http://127.0.0.1:8000';

const app = createApp(App)
app.use(router)
app.use(ElementPlus, { size: 'small', zIndex: 3000 })
app.component('App', App)

app.mount('#app')
for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
    app.component(key, component)
}
