<template>
   <nav class="navbar navbar-expand-lg navbar bg-grey-dark">
        <div class="container-xl">
            <a class="navbar-brand text-green-live" href="#" @click="toHome()">VUE STORE</a>
            <button class="navbar-toggler collapsed text-green-live" type="button" data-toggle="collapse" data-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-green-live"></i>
            </button>

            <div class="navbar-collapse collapse" id="navbarsExample07XL" style="">
            <ul class="navbar-nav mr-auto">
                <router-link to="/store" active-class="active" class="nav-item" tag="li">
                    <a class="nav-link text-green-live"> Inicio</a>
                </router-link>
                <router-link to="/store/cart" active-class="active"  class="nav-item" tag="li">
                    <a class="nav-link text-green-live"> Carrinho [{{ this.$store.state.cart.products.length }}]</a>
                </router-link>
                
                <li v-if="this.$store.state.auth.authenticated" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-green-live" href="#" id="dropdown07XL" data-toggle="dropdown" aria-expanded="false"> {{ this.$store.state.auth.user.name }}</a>
                    <div class="dropdown-menu bg-black" aria-labelledby="dropdown07XL">
                        <a class="dropdown-item text-green-live" href="#">Painel</a>
                        <a class="dropdown-item text-green-live" href="#">Pedidos</a>
                        <a class="dropdown-item text-green-live" href="#" @click="exit()">Sair</a>
                    </div>
                </li>
                <router-link v-else to="/store/login" active-class="active"  class="nav-item" tag="li">
                    <a class="nav-link text-green-live"> Login/Cadastro </a>
                </router-link>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Buscar" aria-label="Search">
            </form>
            </div>
        </div>
    </nav>
</template>

<script>
    
import { mapActions } from 'vuex'
import { mapGetters } from 'vuex'

    export default {
        data(){
            return {
                countTime: 1
            }
        },
        methods: {
            ...mapActions(['authenticated', 'name', 'logout', 'reloadPage']),
            ...mapGetters(['getToken']),
            exit(){

                let url = 'http://localhost/StoreSPA/public/api/auth/logout'
                let token = this.getToken()
                var header = {
                    'Authorization': 'Bearer '+token,
                }

                this.$http.get(url, { headers: header })
                .then( resposne => {
                    this.logout();
                    this.$router.push('/store/login')
                    
                })
                .catch( resposne => {
                    localStorage.removeItem('auth-token')
                    console.log('fail logout')
                })
            },
            toHome(){
                this.$router.push('/store')
            }
        },
        mounted(){
            //console.log('authenticated:' +this.$store.state.auth.authenticated)
            this.reloadPage();   
        },
        created(){
            
        },
    }
</script>
