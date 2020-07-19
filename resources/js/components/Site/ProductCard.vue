<template>
    
    <div class="card-group product-card mx-4 my-2 product-card">
        <router-link style="text-decoration: none;"
        tag="a" 
        class="" 
        :to="`/store/product/${product.id}`">
            <div class="row card bg-grey-dark text-white img-card-limit">
                <img :src=" this.$urls.public.storage.productImagePath(this.product.images[0].path)" 
                    class="card-img-top img-fluid " alt="Abajur-image"/>
                <div class="card-body ">
                    <h5 class="card-title mt-1 prod-name">{{product.name}}</h5>
                    <p class="text-warning mt-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>                        
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </p>
                    <h5 class="card-title mt-1">
                        <button type="button" class="btn btn-primary">Conferir</button>
                        {{ product.price | money }}
                    </h5>
                    <h5 class="mt-1">
                        Até 5x de {{ product.price/5 | money }}
                    </h5>
            
                </div>
            </div>
        </router-link>
    </div>
    
</template>

<script>
    export default {
        props: {
            product: null
        },
        data(){
            
            return {
                description: 'Este aabajur serve para deixar o seu ambiente mais clean e iluminado com seu designe',
            }
        },
        mounted() {
            console.log('Component mounted ProductCard');
           

        },
    }
</script>

<style scoped>
    img{
        height: 300px;
        width: auto;
    }

    .product-card{        
        margin: 5px;
        box-shadow: 3px 3px 3px rgba(0,0,0,0.5);
        text-align: center;
        width: 275px;
    }
    .product-price{        
        font-size: 35px;
    }

    .alert-light{
        line-height:30px;
    }

    .prod-name{
        height: 60px;
    }

</style>
