import Vue from 'vue';
import Router from 'vue-router'

import Home from './components/Home.vue'
import ProductPage from './components/ProductPage.vue'
import ProductCrud from './components/ProductCrud.vue'

Vue.use(Router)

export default new Router({
    mode: 'hash',
    routes : [
        {
            path: '/',
            component: Home
        },
        {
            path: '/productpage',
            component: ProductPage
        },
        {
            path: '/product',
            component: ProductCrud
        }
    ]
})