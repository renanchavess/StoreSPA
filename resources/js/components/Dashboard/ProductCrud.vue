<template>
    <section class="row-fluid">
        <button type="button" class="btn btn-secondary" @click="back()"><i class="fas fa-long-arrow-alt-left"></i> Voltar</button>  
        <button type="button" class="btn btn-success" @click="save()" ><i class="far fa-save"></i> Salvar</button>
        
        <router-link 
                v-if="this.id > 0"
                tag="button" 
                class="btn btn-info" 
                :to="`/dashboard/products/${this.id}/images`"><i class="fas fa-camera-retro"></i> Imagens
        </router-link>
        <hr>
        <h3>Produto id: {{ id }}</h3>
        <form action="">
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="" id="" v-model="name">
            </div>
            <div class="form-group" > 
                <label for="">Ativo</label>
                <select v-model="active" class="form-control">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Preço</label>
                <input type="text" class="form-control" name="" id="" v-model="price">
            </div>

            <div class="form-group">
                <label for="">Categorias Disponíveis</label>
                <select name="categories[]" id="" multiple class="form-control">
                    <option v-for="(category, index) in categories" :key="index" @click="toSelected(index)" >{{category.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Categorias Selecionadas</label>
                <select name="categories[]" id="" multiple class="form-control">
                    <option v-for="(category, index) in categoriesSelected" :key="index" @click="toDisponible(index)" >{{category.name}}</option>
                </select>
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
                name: '',
                price: 0.0,
                stock: 0,
                active: 1,                
                saved : true,
                categories: [],
                categoriesSelected: []
            }
        },
       
        methods:{
            save(){
                let url = 'http://localhost/StoreSPA/public/api/product';

                let product = {
                    id: this.id,
                    name: this.name,
                    price: this.price,
                    active: this.active
                }
                if(this.id == 0){
                    this.$http.post(url, product).then(response => {                                        
                        this.clean();
                        this.saved = true;                        
                    }, response => {
                        console.log('error store');
                    });
                }
                else{
                   this.$http.put(url, product, {
                        headers: {
                            'Content-Type': 'application/json'
                        },
                   }).then(response => {                                        
                        //this.clean();                        
                        console.log('salvou');

                    }, response => {
                        console.log('error update');
                    });
                }
               
            },            
            clean(){
                this.id = 0
                this.name = '';
                this.price = 0.0;
                this.stock = 0;
                this.active = true;
                this.photos = [];
            },
            back(){
                this.$router.push('/dashboard/products')
            },
            getProduct(){
                let url = 'http://localhost/StoreSPA/public/api/product/'+ this.id;
               
                this.$http.get(url).then(response => {
                    // get body data       
                    console.log('product load...');
                    if(response.body.id === undefined)
                        this.clean()
                    else
                    {
                        this.name = response.body.name
                        this.price = response.body.price
                        this.stock = response.body.stock
                        this.active = response.body.active
                    }
                    
                    this.$loading.hide();
                }, response => {
                    // error callback
                    console.log('error get list products');
                });
            },
            getCategories(){

                this.$http.get(this.$urls.categories.all).then(response => {
                    this.categories = response.body;
                }, response => {
                    // error callback
                    console.log('error get all Cateories');
                });
            },
            toSelected(index){
                this.categoriesSelected.push( this.categories[index] )
                this.categories.splice(index, 1)
            },
            toDisponible(index){
                this.categories.push( this.categoriesSelected[index] )
                this.categoriesSelected.splice(index, 1)
            }
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
            
            this.getProduct();
            this.getCategories();
                
        },
        beforeCreate: function(){
            this.$loading.show({ background: '#343A40', color: '#F1F3FA' });
        }
    }
</script>
