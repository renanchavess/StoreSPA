<template>
    <nav class="menu-bar bg-dark">
        <div class="menu-icon text-center">
            <img :src="urlUser" alt="user photo" class="rounded-circle"><br/>
            <span class="align-middle">Renan Chaves</span>
        </div>
        <hr>
        <ul>

            <router-link to="/dashboard/products" 
                active-class="menu-bar-item-active" 
                class="menu-bar-item"
                title="Produtos"
                tag="li">
                <a><i class="fas fa-box"></i> Produtos</a>
            </router-link>


            <router-link to="/dashboard/category" 
                active-class="menu-bar-item-active" 
                class="menu-bar-item"
                title="Categorias"
                tag="li">
                <a href="#"><i class="fas fa-layer-group"></i> Categorias</a>
            </router-link>

            <router-link to="/dashboard/graphics" 
                active-class="menu-bar-item-active" 
                class="menu-bar-item"
                title="Gráficos"
                tag="li">
                <a><i class="fas fa-chart-bar"></i> Gráficos</a>
            </router-link>

            <router-link to="/dashboard/paymentplan" 
                active-class="menu-bar-item-active"                 
                class="menu-bar-item" 
                tag="li"
                title="Plano de pagamento">
                <a><i class="fas fa-money-check-alt"></i> Planos</a>
            </router-link>

            <router-link to="/dashboard/sales" active-class="menu-bar-item-active" class="menu-bar-item" tag="li">
                <a><i class="fas fa-funnel-dollar"></i> Vendas</a>
            </router-link>
            

            
            <li class="menu-bar-item"><a href="#"><i class="fas fa-cubes"></i> Estoque</a></li>
            <li class="menu-bar-item"><a href="#"><i class="fas fa-percent"></i> Promoções</a></li>
            
            <li class="menu-bar-item"><a href="#"><i class="fas fa-calendar-alt"></i> Eventos</a></li>
            <li class="menu-bar-item"><a href="#"><i class="fas fa-sticky-note"></i> Relatórios</a></li>

            

            <router-link to="/store" active-class="menu-bar-item-active" class="menu-bar-item" tag="li">
                <a><i class="fas fa-paper-plane"></i> Site</a>
            </router-link>
        </ul>
    </nav>
</template>

<script>
    
    export default {
        data(){
            return {
                urlUser: this.$urls.public.images('user.png')
            }
        },
        mounted(){

        }
    }
</script>