require('./bootstrap');

window.Vue = require('vue');

import router from './router.js';
import VueResource from 'vue-resource';

import VueSweetalert2 from 'vue-sweetalert2';
import LoadingOverlay from 'vue-swal2-loading-overlay';
import axios from 'axios';
import VueAxios from 'vue-axios';
Vue.config.productionTip = false;

Vue.use(VueSweetalert2);
Vue.use(LoadingOverlay);
Vue.use(VueResource);


const app = new Vue({   
    router,
    el: '#app',
});
