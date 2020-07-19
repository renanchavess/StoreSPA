<template>
    <div>
        <div class="row">
            <div class="col-12 col-lg-4 offset-lg-4 mt-5 col-md-8 offset-md-2 bg-grey-dark text-green-live rounded-sm">       
                <form action="" id="form" class=" p-3 mt-4">
                    <h1>Cadastro Usuário</h1>

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" v-model="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="email" v-model="email">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" class="form-control" name="password" v-model="password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirmar Senha</label>
                        <input type="password" class="form-control" name="password_confirmation" v-model="password_confirmation">
                    </div>
                    <button type="button" class="btn btn-green-live col-12" @click="register()">Registrar</button>
                    <br/>                    
                    <router-link             
                            class="text-green-live" 
                            :to="`/store/login`">Login
                    </router-link>
                    <br/>
                    <a href="#" class="text-green-live">Recuperar senha</a>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data(){
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        }
    },
    methods:{
        register(){

            let data = {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            }

            this.$http.post(this.$urls.api.auth.register, data)
            .then( response => {           
                this.$swal.fire(this.$swalEffects.save.successSetTitle('Registrado com sucesso!'));                
            })
            .catch( response => {
                this.$swal.fire(this.$swalEffects.save.error);
            })
        },
    },
    mounted(){

    },
}
</script>