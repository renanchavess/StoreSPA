<template>
<div class="row" >
    <router-link             
            tag="button" 
            class="btn btn-success" 
            :to="`/dashboard/products/0`"> <i class="fas fa-plus"></i> New Product
    </router-link>
    <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" placeholder="Product name" v-model="filterName">
        <div class="input-group-append">
            <button class="btn btn-outline-success" type="button" @click="filterByName()">Search</button>
        </div>
    </div>

    <table  class="table table-striped table-condensed table-light table-hover mt-2" v-if=" this.products.length > 0">
        <thead class="thead-dark">
            <tr>
                <th @click="sortBy('id')"><i :class="this.sort.id.class"></i>  Id</th>
                <th @click="sortBy('name')"><i :class="this.sort.name.class"></i> Name</th>
                <th @click="sortBy('price')"><i :class="this.sort.price.class"></i> Price</th>
                <th>Stock</th>
                <th>Active</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="prod in products" :key="prod.id">
                <td>{{ prod.id }}</td>
                <td>{{ prod.name }}</td>
                <td>${{ prod.price }}</td>
                <td>{{ prod.stock }}</td>
                <td v-bind:class="getClass(prod.active)" >{{ prod.active ? 'Active' : 'Disabled' }}</td>
                <td>{{ prod.created_at }}</td>
                <td>{{ prod.updated_at }}</td>                
                <td>
                    <router-link tag="button" 
                        class="btn btn-outline-secondary" 
                        :to="`/dashboard/products/${prod.id}`">Editar
                    </router-link>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
import Swal from 'sweetalert2/dist/sweetalert2.js';
import ProductImage from './ProductImageCrud.vue';
export default {

    data: function(){
        return {            
            products: [],
            productsOriginal: [],
            filterName: '',
            sort:{
                id: {
                    active: false,
                    class: 'fas fa-sort-amount-down-alt'
                },
                name: {
                    active: true,
                    class: 'fas fa-minus'
                },
                price: {
                    active: true,
                    class: 'fas fa-minus'
                }
            }
        }
    },
    methods: {     
        getClass(property){
            return property ? 'text-success' : 'text-danger';
        },   
        sortBy(filter){
            switch (filter) {
                case 'id':
                    if(this.sort.id.active){
                        this.products.sort( (a, b) => (a.id > b.id) ? 1 : -1 );
                        this.sort.id.class = 'fas fa-sort-amount-down-alt';
                    }                            
                    else{
                        this.products.sort( (a, b) => (a.id < b.id) ? 1 : -1 );
                        this.sort.id.class = 'fas fa-sort-amount-down';
                    }                                                    
                    this.sort.name.class = 'fas fa-minus';    
                    this.sort.price.class = 'fas fa-minus';    
                    this.sort.id.active = !this.sort.id.active;
                    break;

                case 'name':
                    if(this.sort.name.active){
                        this.products.sort( (a, b) => (a.name > b.name) ? 1 : -1 );
                        this.sort.name.class = 'fas fa-sort-amount-down-alt';
                    }                            
                    else{
                        this.products.sort( (a, b) => (a.name < b.name) ? 1 : -1 );
                        this.sort.name.class = 'fas fa-sort-amount-down';
                    }                                                    
                    this.sort.id.class = 'fas fa-minus';    
                    this.sort.price.class = 'fas fa-minus';    
                    this.sort.name.active = !this.sort.name.active;
                    break;
                
                case 'price':
                    if(this.sort.price.active){
                        this.products.sort( (a, b) => (a.price > b.price) ? 1 : -1 );
                        this.sort.price.class = 'fas fa-sort-amount-down-alt';
                    }                            
                    else{
                        this.products.sort( (a, b) => (a.price < b.price) ? 1 : -1 );
                        this.sort.price.class = 'fas fa-sort-amount-down';                            
                    }                               

                    this.sort.id.class = 'fas fa-minus';          
                    this.sort.name.class = 'fas fa-minus';          
                    this.sort.price.active = !this.sort.price.active;
                    break;
            
                default:
                    break;
            }
        },
        filterByName(){
            console.log('filter');
            if( this.filterName.length > 0){
                this.products = this.productsOriginal.filter( x => x.name.includes( this.filterName) );

                if(this.products.length > 0)
                    return;
            }                                        
            
            this.products = this.productsOriginal;
            Swal.fire({
                title: 'Alert!',
                text: 'None product found.',
                icon: 'warning',
                confirmButtonText: 'Ok'
            });
        },
        getProducts: function (){

            let url = 'http://localhost/StoreSPA/public/api/product';
            this.$http.get(url).then(response => {
                // get body data                    
                this.products = response.body;                
                this.productsOriginal = response.body;                
            this.$loading.hide();

            }, response => {
                // error callback
                console.log('error get list products');
            });
        },
        edit: function ( id ){
            this.$router.push('/products/'+id)
        }
        
    },
    
    mounted(){
        console.log('search mounted');
        this.getProducts();      
    },
    beforeCreate: function(){
        this.$loading.show({ background: '#343A40', color: '#F1F3FA' });
    }
}
</script>

<style>

</style>