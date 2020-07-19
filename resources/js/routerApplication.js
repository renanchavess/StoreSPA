
import Vue from 'vue';

let urlBase = ''

if(Vue.config.productionTip)
    urlBase = 'http://store.renanchaves.com/'
else
    urlBase = 'http://localhost:8000/' 

export const urls = {
    urlBase: urlBase,
    login: urlBase + 'api/auth/login',
    categories: {
        all: urlBase + 'api/category'
    },
    public: {
        storage: {
            productImagePath( pathImage ) {
                return urlBase + 'storage/'+pathImage
            }
        }
    },
    api:{
        home: {
            getProducts: urlBase+ 'api/home/getProducts',
            getProductById(id){ return  urlBase+ 'api/home/product/'+ id +'/getAllInfo'},
        },
        paymentPlan:{
            get:{
                all: urlBase +'api/paymentPlan',
                byId(id) { return urlBase +'api/paymentPlan/'+ id +'/edit' }
            },
            post: urlBase+ 'api/paymentPlan',
            put: id => { return  urlBase + 'api/paymentPlan/'+ id}
        },
        checkout:{
            getPaymentPlans: 'api/checkout/paymentPlans'
        },
        product: {
            getById(id ){
                return urlBase + 'api/product/'+ id
            },
            getImages(id){
                return '/api/productImage/'+ id;
            },
            getAll: 'api/product',
            put: 'api/product',
            post: 'api/product',
            
        },
        productImage:{
            post: 'api/productImage'
        },
        category: {
            get(id){
                urlBase +'api/category/'+ id
            },
            getAll: 'api/category',
            post: 'api/category',
            put: 'api/category',
        },
        auth:{
            login: 'api/auth/login',
            logout: 'api/auth/logout',
            register: 'api/auth/register',
        },
    }
}