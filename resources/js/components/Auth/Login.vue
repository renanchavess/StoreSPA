<template>
    <div class="col-12 col-lg-4 offset-lg-4 mt-5 col-md-8 offset-md-2 border shadow-lg">
       
        <form action="" id="form" class=" p-3 mt-2">
             <h1>Login Usuário</h1>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" id="email" v-model="email">
            </div>
            <div class="form-group">
                <label for="">Senha</label>
                <input type="password" class="form-control" name="password" v-model="password">
            </div>
            <button type="button" class="btn btn-dark col-12" @click="login()">Login</button>
            <br/>
            <a href="#" class="">Recuperar Senha</a>
            <br/>
            <a href="#" class="dark-link">Cadastrar</a>
        </form>
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

            let url = 'http://localhost/StoreSPA/public/api/auth/login'
            
            this.$http.post(this.$urls.LOGIN, credentials)
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
        console.log(this.$urls);
    },
}
</script>