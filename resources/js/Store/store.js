import Vue from 'vue'
import Vuex from 'vuex'

import cart from './modules/cart.js'
import auth from './modules/auth.js'
Vue.use(Vuex)

const store = new Vuex.Store({
    modules: { cart, auth }
})

export { store }