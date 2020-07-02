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

Vue.component('home-page', require('./components/Home.vue').default);
Vue.component('menu-bar', require('./components/Menu.vue').default);
Vue.component('product-page', require('./components/Dashboard/ProductPage.vue').default);
Vue.component('product-card', require('./components/Dashboard/ProductCard.vue').default);
Vue.component('dashboard-menu', require('./components/Dashboard/DashboardMenu.vue').default);
Vue.component('sales-page', require('./components/Dashboard/Sales.vue').default);

const app = new Vue({   
    router,
    el: '#app',
});
