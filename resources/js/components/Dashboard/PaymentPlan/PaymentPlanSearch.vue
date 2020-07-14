<template>
<div class="row" >
    <router-link             
            tag="button" 
            class="btn btn-success" 
            :to="`/dashboard/paymentplan/0`"> <i class="fas fa-plus"></i> Novo Plano
    </router-link>
    <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" placeholder="Nome do produto" v-model="filterDescription">
        <div class="input-group-append">
            <button class="btn btn-outline-success" type="button" @click="filterByDescription()">Buscar</button>
        </div>
    </div>

    <table  class="table table-striped table-condensed table-light table-hover mt-2" v-if=" this.PaymentPlans.length > 0">
        <thead class="thead-dark">
            <tr>
                <th @click="sortBy('id')"><i :class="this.sort.id.class"></i>  Id</th>
                <th @click="sortBy('description')"><i :class="this.sort.description.class"></i> Descrição</th>
                <th>Ativo</th>
                <th>Juros</th>
                <th>Parcelas</th>
                <th>Criado</th>
                <th>Atualizado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="plan in PaymentPlans" :key="plan.id">
                <td>{{ plan.id }}</td>
                <td>{{ plan.description }}</td>
                <td v-bind:class="getClass(plan.active)" >{{ plan.active ? 'Sim' : 'Não' }}</td>
                <td>% {{ plan.interest }}</td>
                <td>{{ plan.installments }}</td>
                <td>{{ plan.created_at }}</td>
                <td>{{ plan.updated_at }}</td>                
                <td>
                    <router-link tag="button" 
                        class="btn btn-outline-secondary" 
                        :to="`/dashboard/paymentplan/${plan.id}`">Editar
                    </router-link>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>

export default {

    data: function(){
        return {            
            PaymentPlans: [],
            PaymentPlansOriginal: [],
            filterDescription: '',
            sort:{
                id: {
                    active: false,
                    class: 'fas fa-sort-amount-down-alt'
                },
                description: {
                    active: true,
                    class: 'fas fa-minus'
                },
            }
        }
    },
    methods: {     
        getClass(property){
            return property ? 'text-success' : 'text-danger';
        },   
        sortBy(filter){
            switch (filter) {
                case 'id':
                    if(this.sort.id.active){
                        this.PaymentPlans.sort( (a, b) => (a.id > b.id) ? 1 : -1 );
                        this.sort.id.class = 'fas fa-sort-amount-down-alt';
                    }                            
                    else{
                        this.PaymentPlans.sort( (a, b) => (a.id < b.id) ? 1 : -1 );
                        this.sort.id.class = 'fas fa-sort-amount-down';
                    }                                                    
                    this.sort.description.class = 'fas fa-minus';    
                    this.sort.price.class = 'fas fa-minus';    
                    this.sort.id.active = !this.sort.id.active;
                    break;

                case 'description':
                    if(this.sort.description.active){
                        this.PaymentPlans.sort( (a, b) => (a.description > b.description) ? 1 : -1 );
                        this.sort.description.class = 'fas fa-sort-amount-down-alt';
                    }                            
                    else{
                        this.PaymentPlans.sort( (a, b) => (a.description < b.description) ? 1 : -1 );
                        this.sort.description.class = 'fas fa-sort-amount-down';
                    }                                                    
                    this.sort.id.class = 'fas fa-minus';    
                    this.sort.price.class = 'fas fa-minus';    
                    this.sort.description.active = !this.sort.description.active;
                    break;
                
                case 'price':
                    if(this.sort.price.active){
                        this.PaymentPlans.sort( (a, b) => (a.price > b.price) ? 1 : -1 );
                        this.sort.price.class = 'fas fa-sort-amount-down-alt';
                    }                            
                    else{
                        this.PaymentPlans.sort( (a, b) => (a.price < b.price) ? 1 : -1 );
                        this.sort.price.class = 'fas fa-sort-amount-down';                            
                    }                               

                    this.sort.id.class = 'fas fa-minus';          
                    this.sort.description.class = 'fas fa-minus';          
                    this.sort.price.active = !this.sort.price.active;
                    break;
            
                default:
                    break;
            }
        },
        filterByDescription(){
            console.log('filter');
            if( this.filterDescription.length > 0){
                this.PaymentPlans = this.PaymentPlansOriginal.filter( x => x.description.includes( this.filterDescription) );

                if(this.PaymentPlans.length > 0)
                    return;
            }                                        
            
            this.PaymentPlans = this.PaymentPlansOriginal;
            this.$swal.fire({
                title: 'Alert!',
                text: 'None payment plans found.',
                icon: 'warning',
                confirmButtonText: 'Ok'
            });
        },
        getPaymentPlans: function (){

            this.$http.get(this.$urls.api.paymentPlan.get.all).then(response => {
                // get body data                    
                this.PaymentPlans = response.body;                
                this.PaymentPlansOriginal = response.body;                
            this.$loading.hide();

            }, response => {
                // error callback
                console.log('error get list PaymentPlans');
            });
        },
        
    },
    
    mounted(){
        console.log('search mounted');
        this.getPaymentPlans();      
    },
    beforeCreate: function(){
        this.$loading.show({ background: '#343A40', color: '#F1F3FA' });
    }
}
</script>

<style>

</style>