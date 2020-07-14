<template>
    <section class="row-fluid">
        <button type="button" class="btn btn-secondary" @click="back()"><i class="fas fa-long-arrow-alt-left"></i> Voltar</button>  
        <button type="button" class="btn btn-success" @click="save()" ><i class="far fa-save"></i> Salvar</button>
        
        <hr>
        <h3>Plano id: {{ id }}</h3>
        <form action="">
            <div class="row">
                <div class="form-group col-12 col-lg-4">
                    <label for="">Descrição</label>
                    <input type="text" class="form-control"  id="" v-model="description">
                </div>

                <div class="form-group col-12 col-lg-4" > 
                    <label for="">Ativo</label>
                    <select v-model="active" class="form-control">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>

                <div class="form-group col-12 col-lg-4">
                    <label for="">Parcelas</label>
                    <input type="text" class="form-control"  id="" v-model="installments">
                </div>

                <div class="form-group col-12 col-lg-4">
                    <label for="">Juros %</label>
                    <input type="text" class="form-control"  id="" v-model="interest">
                </div>
            </div>            
        </form>
    </section>
</template>

<script>
import Swal from 'sweetalert2/dist/sweetalert2.js';
import axios from 'axios';

    export default {  
            components:{
        },  
        data(){
            return {
                id: this.$route.params.id,
                description: '',
                installments: 1,
                interest: 0,
                active: 1,                
                saved : true,
            }
        },
       
        methods:{
            save(){

                let paymentPlan = {
                    id: this.id,
                    description: this.description,
                    active: this.active,
                    installments: this.installments,
                    interest: this.interest,
                    active: this.active
                }

                if(this.id == 0){
                    this.$http.post(this.$urls.api.paymentPlan.post, paymentPlan).then(response => {
                        this.id = response.body.id
                        this.$swal.fire(this.$swalEffects.save.success);
                        this.getPaymentPlan();                        
                    }, response => {
                        this.$swal.fire(this.$swalEffects.save.error);
                    });
                }
                else{
                   this.$http.put(this.$urls.api.paymentPlan.put(this.id), paymentPlan, {
                        headers: {
                            'Content-Type': 'application/json'
                        },
                   }).then(response => {              
                        this.$swal.fire(this.$swalEffects.save.success);
                        console.log('salvou');

                    })
                    .catch( response => {
                        this.$swal.fire(this.$swalEffects.save.error);
                        console.log('error update');
                    });
                }
               
            },            
            clean(){
                this.id = 0
                this.description = '';
                this.installments = 1;
                this.interest = 0.00;
                this.active = true;
            },
            back(){
                this.$router.push('/dashboard/paymentplan')
            },
            getPaymentPlan(){

                this.$http.get( this.$urls.api.paymentPlan.get.byId(this.id) ).then(response => {
                    // get body data       
                    console.log('product load...');
                    if(response.body.id === undefined)
                        this.clean()
                    else
                    {
                        this.description = response.body.description
                        this.installments = response.body.installments
                        this.interest = response.body.interest
                        this.active = response.body.active
                    }
                    
                    this.$loading.hide();
                }, response => {
                    // error callback
                    console.log('error get list products');
                });
            },

        },
        beforeRouteLeave(to, from, next){
            if( this.saved )
                next();
            else{
                if( confirm('Tem certeza que deseja sair?') )
                    next();
                else
                    next(false);
            }
        },
        mounted: function(){
            console.log('mounted');
            
            if(this.id > 0)
                this.getPaymentPlan();
            else
                this.clean();
                
        },
        beforeCreate: function(){
            //this.$loading.show({ background: '#343A40', color: '#F1F3FA' });
        }
    }
</script>
