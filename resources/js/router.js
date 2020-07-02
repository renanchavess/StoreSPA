import Vue from 'vue';
import Router from 'vue-router'

import Home from './components/Home.vue'
import ProductCrud from './components/Dashboard/ProductCrud.vue'
import ProductImageCrud from './components/Dashboard/ProductImageCrud.vue'
import ProductSearch from './components/Dashboard/ProductSearch.vue'
import Sales from './components/Dashboard/Sales.vue'
import Graphics from './components/Dashboard/GraphicsPage.vue'
import Dashboard from './components/Dashboard/Dashboard.vue'

Vue.use(Router)

export default new Router({
    mode: 'hash',
    routes : [
        {
            path: '/',
            component: Home
        },
        {
            path: '/dashboard', component: Dashboard, props: true,
            children: [
                { path: 'sales', component: Sales },
                { path: 'graphics', component: Graphics },
                { path: '/',component: ProductSearch },
                { path: 'products',component: ProductSearch },
                { path: 'products/:id', component: ProductCrud },
                { path: 'products/:id/images', component: ProductImageCrud, props:true },
            ]            
        }

    ]
})