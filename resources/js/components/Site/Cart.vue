<template>
<div>
    <div class="row">
        <div class=" col-12 offset-lg-2 col-lg-8 col-xl-6 offset-xl-3 rounded  mt-5">
            <table class="table table-grey-dark table-condensed shadow mt-5 bg-dark text-green-live">
                <thead class="border-green-live">
                    <tr  class="text-center border-green-live">
                        <th colspan="4"> <h2> Produtos</h2></th>                    
                    </tr>            
                </thead>
                <tbody v-if="products.length > 0">                
                    <tr v-for="(product, index) in this.products" :key="index">
                        <td>{{ product.name }}</td>
                        <td>{{ product.price | money }}</td>
                        <td>{{ product.quantity }}</td>
                        <td>{{ product.price * product.quantity | money }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"> <span class="text-bold"><b>Total</b></span> {{ amount | money }}</td>
                    </tr>
                    <tr >
                        <td colspan="4">
                            <button  class="btn btn-lg btn-green-live  col-10 offset-1  mb-4 " @click="toCheckOut()"><b>Finalizar Compra</b></button>
                        </td>                        
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="4" class="text-center">
                            <h1> Carrinho vazio :(</h1>
                        </td> 
                    </tr>                    
                    <tr>
                        <td colspan="4" class="text-right"><span class="text-bold"><b>Total</b></span> {{ amount | money }}</td>
                    </tr>
                    
                </tbody>
            </table>
            
        </div>
    </div>
</div>

</template>

<script>
import { mapState } from 'vuex'
import { mapGetters } from 'vuex'
export default {
    computed:{
        ...mapState({
            products: state => state.cart.products
        }),
        ...mapGetters([ 'amount' ]),
    },
    methods: {
        toCheckOut(){ this.$router.push('/store/checkout')}
    }
}
</script>

<style scoped>
table th, table td {
    border: none !important;
}
</style>