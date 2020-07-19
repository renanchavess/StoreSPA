<template>
    <div>
        <h1>Categoria id: {{ this.id }}</h1>
        <div class="form-group">            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control input" v-model="name">
        </div>    
        
        <button type="button" @click="save()" class="btn btn-success">Save</button>
        <button type="button" @click="clean()" class="btn btn-danger">Clean</button>
        <div class="row" v-if="this.categories.length > 0">
            <table class=" mt-2 table table-condensed table-hover table-striped">
                <thead class=" thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Criado</th>
                        <th>Atualizado</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category, index) in this.categories" :key="index">
                        <td>{{ category.id }}</td>                        
                        <td>{{ category.name }}</td>                        
                        <td>{{ category.created_at }}</td>                        
                        <td>{{ category.updated_at }}</td>
                        <td>
                            <button class="btn btn-outline-dark" @click="edit(index)">Edit</button>
                        </td>                    
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            id: 0,
            name: '',
            categories: []
        }
    },
    methods: {
        save(){            
            
            let category = {
                id: this.id,
                name: this.name
            }

            if(this.id == 0)
            {
                this.$http.post(this.$urls.api.category.post, category)
                .then( response => {
                    this.$swal.fire(this.$swalEffects.save.success)
                    this.clean();
                })
                .catch( response => {
                    this.$swal.fire(this.$swalEffects.save.error)
                });
            }
            else
            {
                this.$http.put(this.$urls.api.category.put, category)
                .then( response => {
                    this.$swal.fire(this.$swalEffects.save.success)
                    this.clean();
                })
                .catch( response => {
                    this.$swal.fire(this.$swalEffects.save.error)
                });
            }
            
            this.getCategories();
            
        },
        clean(){
            this.id = 0
            this.name = ''
        },
        getCategories(){

            this.$http.get(this.$urls.api.category.getAll)
            .then( response => {
                this.categories = response.body
            })
            .catch( response => {
                console.log( response.body)
            });
        },
        edit(index){
            this.id = this.categories[index].id
            this.name = this.categories[index].name
        }
    },
    mounted(){
        this.getCategories();
    }
}
</script>