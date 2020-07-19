require('./bootstrap');

window.Vue = require('vue');

import router from './router.js';
import { store } from'./Store/store';
import VueResource from 'vue-resource';
import VueSweetalert2 from 'vue-sweetalert2';
import LoadingOverlay from 'vue-swal2-loading-overlay';
import Vue from 'vue';
import { urls } from './routerApplication'

Vue.config.productionTip = true;

Vue.prototype.$urls = urls;

Vue.filter('money', value =>{
    return value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})
});

Vue.filter('storage', path => {
    return 'storage/'+ path
})

Vue.prototype.$swalEffects = {   
    save: {
        success:{
            icon: 'success',
            title: 'Salvo com sucesso',
            showConfirmButton: false,
            timer: 1000
        },
        successSetTitle(title){
            return {
                icon: 'success',
                title: title,
                showConfirmButton: false,
                timer: 1000
            }
        },
        error:{
            icon: 'error',
            title: 'Erro ao salvar',
        }
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
