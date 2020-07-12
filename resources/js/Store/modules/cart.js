export default{
    state: {
        products: [],
        loading: false,
    },
    mutations: {
        addProduct(state, payload){
            state.products.push(payload)
        },
        setProducts(state, list){
            state.products = list
        },
        setLoading(state, status){
            state.loading = status            
        }
    },
    getters:{
        amount(state){
            return state.products.map( p => p.price * p.quantity).reduce( (total, current) => total+current, 0)
        }
    },
    actions: {
        addProduct({ commit }, payload){
            //console.log(payload)
            if(payload.quantity > 0)
                commit('addProduct', payload)
            else
                alert('Quantidade minima é 1')
        },
    }
}