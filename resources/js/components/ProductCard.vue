<template>
    <div class="card-group product-card ">
        <div class="card bg-dark text-white">
            <img :src="imageSrc" 
                class="card-img-top img-fluid" alt="Abajur-image"/>
            <div class="card-body ">
                <h5 class="card-title">{{title}}</h5>
                <p class="card-text">{{ description }}</p>
                <p class="card-text alignt-height"><button class="btn btn-orange">Buy</button><strong class="product-price"> ${{price}}</strong></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                imageSrc: "https://casadorada.vteximg.com.br/arquivos/ids/166539-550-550/abajur-preto-pequeno-60354-2.jpg?v=637190393876130000",
                title: 'Abajur Preto',
                description: 'Este aabajur serve para deixar o seu ambiente mais clean e iluminado com seu designe',
                price: '129,99'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    img{
        width: 100%;
        height: auto;
    }

    .product-card{
        max-width: 300px;
        margin: 17px;
        box-shadow: 3px 3px 3px rgba(0,0,0,0.5);
        text-align: center;
    }
    .product-price{
        
        font-size: 35px;
    }

    .alert-light{
        line-height:30px;
    }
</style>
