require('./bootstrap');

window.Vue = require('vue');

import router from './router.js';
import { store } from'./Store/store';
import VueResource from 'vue-resource';
import VueSweetalert2 from 'vue-sweetalert2';
import LoadingOverlay from 'vue-swal2-loading-overlay';
import Vue from 'vue';

Vue.config.productionTip = false;

Vue.filter('money', value =>{
    return value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})
});

Vue.prototype.$urls = {
    LOGIN: 'http://localhost/StoreSPA/public/api/auth/login',
    categories: {
        all: 'http://localhost/StoreSPA/public/api/category'
    }
}

Vue.use(VueSweetalert2);
Vue.use(LoadingOverlay);
Vue.use(VueResource);

const app = new Vue({   
    router,
    store,
    el: '#app',
});
