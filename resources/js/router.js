import Vue from 'vue';
import Router from 'vue-router'

import Store from './components/Site/Store.vue'
import Home from './components/Site/Home.vue'
import ProductPage from './components/Site/ProductPage.vue'
import Cart from './components/Site/Cart.vue'


import ProductCrud from './components/Dashboard/ProductCrud.vue'
import ProductImageCrud from './components/Dashboard/ProductImageCrud.vue'
import ProductSearch from './components/Dashboard/ProductSearch.vue'

import CategoryCrud from './components/Dashboard/CategoryCrud.vue'

import Sales from './components/Dashboard/Sales.vue'
import Graphics from './components/Dashboard/GraphicsPage.vue'
import Dashboard from './components/Dashboard/Dashboard.vue'

Vue.use(Router)

export default new Router({
    mode: 'hash',
    routes : [
        { 
            path: '*', redirect: '/store' 
        },
        {
            path: '/store', component: Store, props: true,
            children: [
                { path: '/', component: Home },
                { path: 'product/:id', component: ProductPage, props:true },
                { path: 'cart', component: Cart },               
            ]            
        },
        {
            path: '/dashboard', component: Dashboard, props: true,
            children: [
                { path: '/',component: ProductSearch },
                { path: 'sales', component: Sales },
                { path: 'graphics', component: Graphics },
                { path: 'products',component: ProductSearch },
                { path: 'products/:id', component: ProductCrud },
                { path: 'products/:id/images', component: ProductImageCrud, props:true },

                { path: 'category', component: CategoryCrud, props: true}
            ]            
        }

    ]
})