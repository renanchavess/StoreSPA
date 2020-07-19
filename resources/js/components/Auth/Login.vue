<template>
<div>
    <div class="row">
        <div class="col-12 col-lg-4 offset-lg-4 mt-5 col-md-8 offset-md-2 bg-grey-dark text-green-live rounded-sm">       
            <form action="" id="form" class=" p-3 mt-4">
                <h1>Login Usuário</h1>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" id="email" v-model="email">
                </div>
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" class="form-control" name="password" v-model="password">
                </div>
                <button type="button" class="btn btn-green-live col-12" @click="login()">Login</button>
                <br/>
                <router-link             
                            class="text-green-live" 
                            :to="`/store/register`">Cadastrar
                </router-link>
                <br/>
                <a href="#" class="text-green-live">Recuperar Senha</a>
                
                
            </form>
        </div>
    </div>
</div>
    
</template>

<script>

import { mapMutations } from 'vuex';
import { mapActions } from 'vuex';

export default {
    data(){
        return {
            email: '',
            password: '',
        }
    },
    methods:{
        login(){

            let credentials = {
                email: this.email,
                password: this.password
            }
            
            this.$http.post( this.$urls.api.auth.login, credentials)
            .then( response => {           
                console.log(response.body);
                this.setLogin(response.body)                
                this.$router.push('/store');
            })
            .catch( response => {
                console.log( response.body )
                localStorage.removeItem('auth-token')
                localStorage.removeItem('user');
            })
        },
        ...mapActions(['setLogin'])
    },
    mounted(){

    },
}
</script>