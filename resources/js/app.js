require('./bootstrap');

window.Vue = require('vue');
Vue.component('home-page', require('./components/Home.vue').default);
Vue.component('menu-bar', require('./components/Menu.vue').default);
Vue.component('product-page', require('./components/ProductPage.vue').default);
Vue.component('product-card', require('./components/ProductCard.vue').default);

import router from './router.js';

const app = new Vue({   
    router,
    el: '#app',
});
