<template>
    <section class="row-fluid">
        <button type="button" class="btn btn-secondary" @click="back()"><i class="fas fa-long-arrow-alt-left"></i> Back</button>  
        <button type="button" class="btn btn-success" @click="save()" ><i class="far fa-save"></i> Save</button>
        
        <router-link 
                v-if="this.id > 0"
                tag="button" 
                class="btn btn-info" 
                :to="`/dashboard/products/${this.id}/images`"><i class="fas fa-camera-retro"></i> Images
        </router-link>
        <hr>
        <h3>Product id: {{ id }}</h3>
        <form action="">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="" id="" v-model="name">
            </div>
            <div class="form-group" > 
                <label for="">Status</label>
                <select v-model="active" class="form-control">
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="" id="" v-model="price">
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
                saved : false,
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
                
        },
        beforeCreate: function(){
            this.$loading.show({ background: '#343A40', color: '#F1F3FA' });
        }
    }
</script>
