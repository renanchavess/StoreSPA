<template>
    <div class="photos-container">                
        <input type="file" name="photos" id="photos" multiple  ref="photo_data" accept="image/*" @change="handleFile($event)" hidden>
        <router-link                 
                tag="button" 
                class="btn btn-secondary" 
                :to="`/dashboard/products/${this.productId}`"><i class="fas fa-long-arrow-alt-left"></i> Back
        </router-link>
        <button type="button" class="btn btn-primary" @click="openFileDialog()"><i class="fas fa-file-upload"></i> File</button>
        <button type="button" class="btn btn-success" @click="save()"><i class="far fa-save"></i> Save</button>
        
        <hr>

        <div class="mt-2 " v-if="this.photos.length > 0 || this.photosSaved.length > 0">
            <div class="row"  id="image-display">
                <div class="image-list">
                    <div v-for="(photo,index)  in this.photos" v-bind:key="index" class="photo-group">
                        <img :src="photo.uriImg" alt="" class="imagem-item" @click="selectPhoto(index)">
                        <button type="button" class="btn badge btn-danger " @click="removePhoto(index)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>

                    <div v-for="(photo,index)  in this.photosSaved" v-bind:key="index" class="photo-group">
                        <img :src=" 'http://localhost/StoreSPA/public/storage/'+photo.path" alt="" class="imagem-item" @click="selectPhoto(index)">
                        <button type="button" class="btn badge btn-danger " @click="addToDelete(index)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="photo-selected" v-if="uriSelected">
                    <img :src="uriSelected" alt="" class="image-selected">
                </div>                            
            </div>
                                
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2/dist/sweetalert2.js';
export default {
    data(){
        return {
            photos: [],
            photosSaved: [],
            photosDelete: [],
            photoSelected: null,
            uriSelected: '',
            productId: this.$route.params.id
        }
    },
    methods:{
        getProductImages(){

            console.log('images load...');
            console.log('productId: '+ this.productId);
            let url = 'http://localhost/StoreSPA/public/api/productimage/'+ this.productId;
            
            this.$http.get(url).then(response => {     
                console.log('images load...');               
                console.log(response.body);
                
                this.photosSaved = response.body;

                this.uriSelected = 'http://localhost/StoreSPA/public/storage/'+ this.photosSaved[0].path;
            }, response => {
                console.log('error get list image');
            });
        },
        handleFile(ev){
                
            for (let i = 0; i < ev.target.files.length; i++) {
                this.photos.push(ev.target.files[i]);
                
            }
            
            for (let i = 0; i < this.photos.length; i++) {
                this.photos[i].uriImg = URL.createObjectURL(this.photos[i]);                    
            }

            this.photoSelected = this.photos[0];
            this.uriSelected = this.photoSelected.uriImg;
        },        
        openFileDialog(){
            this.$refs.photo_data.value = null;
            this.$refs.photo_data.click();
        },
        removePhoto(index){
            this.photos.splice(index,1);              
        },
        selectPhoto(index){
            console.log('change');
            console.log(this.photos[index]);
            this.photoSelected = this.photos[index];
            this.uriSelected = this.photoSelected.uriImg;
            console.log(this.photoSelected.uriImg);
        },
        save(){
            if( this.photos.length > 0)
                this.uploadFile();

            if(this.photosDelete.length > 0)
                this.deleteFile();
        },
        uploadFile(){
            let url = 'http://localhost/StoreSPA/public/api/productimage';

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let formData = new FormData();
            formData.append('productId', this.productId);
            for (let i = 0; i < this.photos.length; i++) {
                formData.append('files[]', this.photos[i]);                    
            }
            
            axios.post(url, formData, config)
            .then(function (response) {
                console.log('upload Sucess');
            })
            .catch(function (error) {
                console.log('upload fail');
            });

        },
        deleteFile(){
            let url = 'http://localhost/StoreSPA/public/api/productimage/';

            this.photosDelete.forEach( file => {                

                axios.delete(url+file.id, this.photosDelete)
                .then(function (response){
                    console.log('delete file sucess');
                })
                .catch(function (error){
                    console.log('delete file error');
                });
            });
            
        },
        addToDelete(index){
            this.photosDelete.push( this.photosSaved.pop(index) );
        }
    },
     mounted: function(){
        console.log('mounted images');
        this.getProductImages();
    },
}
</script>

<style scoped>
    .imagem-item{
        height: auto;
        width: 150px;
        border-radius: 5px;
        box-shadow: 10px 10px 8px #888888;
    }

    .imagem-item:hover{
        border-style: solid;
        
        border-width: 1px;
    }

    .image-list{
        vertical-align: top;
        display: inline-block;
        max-height: 550px;
        padding: 10px;
        overflow: scroll;
        background-color: #F1F3FA;
        overflow: scroll;
    }

    .photo-selected{
        vertical-align: top;
        display: inline-block;
        background-color: #F1F3FA;
        height: 540px;
        margin-left: 20px;
    }

    .image-selected{
        width: auto;
        height: 540px;
        box-shadow: 10px 10px 8px #888888;
    }

    #image-display{
        display: grid;
        /* aqui eu defino que o Grid tem Duas colunas uma com width:auto e outra com 50px */
        grid-template-columns: 200px auto; 
        max-height: 550px;
    }
    
    /* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
    width: 5px;
  height: 5px;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>