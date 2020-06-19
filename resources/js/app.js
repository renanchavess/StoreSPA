require('./bootstrap');

window.Vue = require('vue');

import router from './router.js';
import VueResource from 'vue-resource';

Vue.use(VueResource);

Vue.component('home-page', require('./components/Home.vue').default);
Vue.component('menu-bar', require('./components/Menu.vue').default);
Vue.component('product-page', require('./components/ProductPage.vue').default);
Vue.component('product-card', require('./components/ProductCard.vue').default);
Vue.component('dashboard-menu', require('./components/DashboardMenu.vue').default);




const app = new Vue({   
    router,
    el: '#app',
});
