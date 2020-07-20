<template>
<div>
    <div class="row">
        <div class="col-12 col-lg-6 mt-lg-5">
            <div id="carouselExampleIndicators" class="carousel carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li  v-for="(image, indexTarget) in product.images" :key="image.id" class="bg-dark" @click="setIndex(indexTarget)"
                    data-target="#carouselExampleIndicators" :data-slide-to="indexTarget" :class="getClass(indexTarget)"></li>                   
                </ol>
                <div class="carousel-inner row">
                    <div v-for="(image, index) in product.images" :key="image.id" class="carousel-item col-12 col-lg-10" :class="getClass(index)">
                        <img :src=" urlBase+ 'storage/'+image.path " class="d-block w-100 rounded list-group-item-grey-dark " alt="image-item">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" @click="prev()">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true" style="border-radius: 5px;"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" @click="next()">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true" style="border-radius: 5px;"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-12 col-lg-6 align-middle mt-lg-5">
            <h2 class="mt-lg-5">{{ this.product.name }}</h2>
            <h4>Nota média: 4.8/5.0</h4>
            <h5>
                <span v-if="this.product.stock > 0" class="badge badge-green text-wrap">Disponível em estoque</span>
                <span v-else class="badge badge-orange text-wrap">Estoque indisnonível</span>
            </h5>
            <div class="form-group">
                <label for="">Quantidade</label>
                <div class=" row">
                    <div class="col-3 col-lg-2">
                        <input type="number" class="form-control" v-model="quantity">
                    </div>
                    <div class="col-6">
                        <button class="btn btn-grey-dark" @click="addToCart()">Adicionar no Carrinho</button>
                    </div>
                </div>   
            </div>
            <h3>Preço: <b> {{ product.price.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) }}</b></h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
            <div class="row">
                <div class="col-md-4"><h6 class="font-14">Estoque disnponível:</h6><p class="text-sm lh-150">{{ this.product.stock }}</p></div>
                <div class="col-md-4"><h6 class="font-14">Vendido:</h6><p class="text-sm lh-150">7341</p></div>
                <div class="col-md-4"><h6 class="font-14">Avaliações:</h6><p class="text-sm lh-150">567</p></div>
            
            </div>
        </div>
        
    </div>
</div>
    
</template>

<script>
import { mapActions } from 'vuex'
    export default {
        data(){
            return {
                urlBase : '',
                product: {
                    id: this.$route.params.id,
                    name: '',
                    price: 0,
                    stock: 0,
                    images: []
                },
                quantity: 1,
                imageActive: 0
            }
        },
        methods:{
            ...mapActions([
                'addProduct'
            ]),
            getClass( index){
                //console.log(index);
                return index == this.imageActive ? 'active' : '';
            },
            next(){
                console.log('next index antes:' + this.imageActive);
               this.imageActive > this.product.images.length -1 ? this.imageActive = 0 : this.imageActive++
               console.log('next index depois:' + this.imageActive);
            },
            setIndex(index){
                console.log(index);
                this.imageActive = index;
            },
            prev(){
                console.log('prev index antes:' + this.imageActive);
               this.imageActive == 0 ? this.product.images.length -1 : this.imageActive--
               console.log('prev index depois:' + this.imageActive);
            },
            getProduct(){
                                
                this.$http.get(this.$urls.api.home.getProductById(this.product.id))
                .then( response => {
                    console.log(response.body);
                    this.product = response.body;
                })
                .catch( response => {
                    console.log('fail get product all info')
                });
            },
            addToCart(){               
                let produto = {
                    id: this.product.id,
                    name: this.product.name,
                    quantity:  this.quantity,
                    price: this.product.price,
                    product_id: this.product.id
                }

                this.addProduct(produto);
                this.$swal.fire(this.$swalEffects.save.successSetTitle('Adicionado!'));
            }
        },
        mounted(){
            this.urlBase = this.$urls.urlBase
            this.getProduct();

            $('#myCarousel').on('slide.bs.carousel', function () {
                console.log('teste');
            })
           
        },
    }
</script>

<style scoped>
    
</style>