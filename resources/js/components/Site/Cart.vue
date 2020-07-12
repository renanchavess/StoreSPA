<template>
    <div>
        <table class="table table table-condensed table-bordered mt-2">
            <thead>
                <tr  class="text-center">
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
            </tbody>
            <tbody v-else>
                <tr>
                   <td colspan="4" class="text-center">
                       <img src="http://localhost/StoreSPA/public/images/empty-shopping-cart-icon.png" alt="cart empty image">
                    </td> 
                </tr>
                <tr>
                    <td colspan="4" class="text-center"> <h3> Carrinho vazio!</h3></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"> <span class="text-bold"><b>Total</b></span> {{ amount | money }}</td>
                </tr>
            </tbody>
        </table>
        <button  class="btn btn-green col-12 col-lg-2 float-right">Finalizar Compra</button>
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
}
</script>