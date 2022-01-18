require('./bootstrap');

window.Vue = require('vue').default;
import myheader from "./components/Myheader";
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import VueSlideBar from 'vue-slide-bar'

Vue.component('VueSlideBar', VueSlideBar)
import { Datetime } from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'

import VueSingleSelect from "vue-single-select";
Vue.component('vue-single-select', VueSingleSelect);

import vSelect from 'vue-select'

Vue.component('v-select', vSelect)

Vue.use(Datetime)
Vue.use(ViewUI)
Vue.use(Vuetify)
Vue.use(VueRouter)
import routes from "./routes";
import Swal from 'sweetalert2';
Vue.component('pagination', require('laravel-vue-pagination'));

window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast;


const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})


const app = new Vue({
    el: '#app',
    router,
    components: {
        myheader
    }
});
