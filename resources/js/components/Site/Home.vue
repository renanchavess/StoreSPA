<template>
    <div>
        <div class="row justify-content-center ">
            <product-card v-for="product in this.products" :key="product.id"  :product="product"></product-card>  
        </div>    
              
    </div>    
</template>

<script>
import ProductCard from './ProductCard.vue';

    export default {
        components:{
            ProductCard
        },
        data(){
            return {
                products: []
            }
        },
        methods: {
            getProducts(){
                
                this.$http.get(this.$urls.api.home.getProducts).then( response => {
                    console.log(response.body);
                    this.products = response.body;
                }).catch( response => {
                    console.log('fail request!');
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getProducts();
        }
    }
</script>
<style scoped>
    
</style>