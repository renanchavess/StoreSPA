<template>
    <div>
        <table class="table table table-condensed table-bordered">
            <thead>
                <tr  class="text-center">
                    <th colspan="4">Produtos</th>                    
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
        ...mapState(['products']),
        ...mapGetters([ 'amount' ]),
    },
}
</script>