<template>
    <section class="row-fluid">        
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
         <button type="button" class="btn btn-success" @click="save()" >Save</button>
         <button type="button" class="btn btn-danger" @click="clean()" >Clean</button>

         <button type="button" class="btn btn-dark" @click="getProducts()" >Get List</button>

         <hr>

         <table v-if=" this.products.length > 0" class="table table-striped table-condensed table-light table-hover">
             <thead class="thead-dark">
                 <tr>
                     <th @click="sortBy('id')"><i :class="this.sort.id.class"></i>  Id</th>
                     <th @click="sortBy('name')"><i :class="this.sort.name.class"></i> Name</th>
                     <th @click="sortBy('price')"><i :class="this.sort.price.class"></i> Price</th>
                     <th>Stock</th>
                     <th>Active</th>
                     <th>Created</th>
                     <th>Updated</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 <tr v-for="prod in products" :key="prod.id">
                     <td>{{ prod.id }}</td>
                     <td>{{ prod.name }}</td>
                     <td>${{ prod.price }}</td>
                     <td>{{ prod.stock }}</td>
                     <td>{{ prod.active }}</td>
                     <td>{{ prod.created_at }}</td>
                     <td>{{ prod.updated_at }}</td>
                     <td><button class="btn btn-primary" @click="edit( prod )">Edit</button></td>
                 </tr>
             </tbody>
         </table>
    </section>
</template>

<script>
    export default {
        
        data(){
            return {
                id: 0,
                name: '',
                price: 0.0,
                stock: 0,
                active: 1,
                products: [],
                sort:{
                    id: {
                        active: false,
                        class: 'fas fa-sort-amount-down-alt'
                    },
                    name: {
                        active: true,
                        class: 'fas fa-minus'
                    },
                    price: {
                        active: true,
                        class: 'fas fa-minus'
                    }
                }
            }
        },
        methods:{
            getProducts: function (){
                console.log('entrou');
                let url = 'http://localhost/StoreSPA/public/api/product';
                this.$http.get(url).then(response => {
                    // get body data                    
                    this.products = response.body;                
                    console.log (this.products);

                }, response => {
                    // error callback
                    console.log('error get list products');
                });
            },
            save: function (){
                let url = 'http://localhost/StoreSPA/public/api/product';

                let product = {
                    id: this.id,
                    name: this.name,
                    price: this.price,
                    stock: this.stock,
                    active: this.active,
                }

                if(this.id == 0){
                     this.$http.post(url, product, {emulateJSON: true}).then(response => {                                        
                        this.clean();
                        this.getProducts();

                    }, response => {
                        console.log('error store');
                    });
                }
                else{
                    this.$http.put(url, product, {emulateJSON: true}).then(response => {                                        
                        this.clean();
                        this.getProducts();

                    }, response => {
                        console.log('error update');
                    });
                }
               
            },
            clean: function(){
                this.id = 0
                this.name = '';
                this.price = 0.0;
                this.stock = 0;
                this.active = true;
            },
            edit(product){                
                this.id = product.id;
                this.name = product.name;
                this.price = product.price;
                this.stock = product.stock;
                this.active = product.active;
            },
            sortBy(filter)
            {
                switch (filter) {
                    case 'id':
                        if(this.sort.id.active){
                            this.products.sort( (a, b) => (a.id > b.id) ? 1 : -1 );
                            this.sort.id.class = 'fas fa-sort-amount-down-alt';
                        }                            
                        else{
                            this.products.sort( (a, b) => (a.id < b.id) ? 1 : -1 );
                            this.sort.id.class = 'fas fa-sort-amount-down';
                        }                                                    
                        this.sort.name.class = 'fas fa-minus';    
                        this.sort.price.class = 'fas fa-minus';    
                        this.sort.id.active = !this.sort.id.active;
                        break;

                    case 'name':
                        if(this.sort.name.active){
                            this.products.sort( (a, b) => (a.name > b.name) ? 1 : -1 );
                            this.sort.name.class = 'fas fa-sort-amount-down-alt';
                        }                            
                        else{
                            this.products.sort( (a, b) => (a.name < b.name) ? 1 : -1 );
                            this.sort.name.class = 'fas fa-sort-amount-down';
                        }                                                    
                        this.sort.id.class = 'fas fa-minus';    
                        this.sort.price.class = 'fas fa-minus';    
                        this.sort.name.active = !this.sort.name.active;
                        break;
                    
                    case 'price':
                        if(this.sort.price.active){
                            this.products.sort( (a, b) => (a.price > b.price) ? 1 : -1 );
                            this.sort.price.class = 'fas fa-sort-amount-down-alt';
                        }                            
                        else{
                            this.products.sort( (a, b) => (a.price < b.price) ? 1 : -1 );
                            this.sort.price.class = 'fas fa-sort-amount-down';                            
                        }                               

                        this.sort.id.class = 'fas fa-minus';          
                        this.sort.name.class = 'fas fa-minus';          
                        this.sort.price.active = !this.sort.price.active;
                        break;
                
                    default:
                        break;
                }
            }
        },
        mounted(){
            console.log('montado');   
            this.getProducts();      
        },
        created(){
            console.log('criado');            
        },
        beforeUpdate(){
            console.log('beforeUpdate');
        },
        updated(){
            console.log('updated');
        },
        beforeCreate(){
            console.log('beforeCreate');            
        }
    }
</script>