<template>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand neon-on" href="" id="logo">Neon Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <router-link to="/store"  class="menu-bar-item" tag="li">
                <a class="nav-link neon-link"> Inicio</a>
            </router-link>
            <li class="nav-item">
                <a class="nav-link neon-link" href="#">Promoções</a>
            </li>
            <li class="nav-item">
                <a class="nav-link neon-link" href="#">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link neon-link" href="#">Sobre</a>
            </li>
        </ul>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
  </nav>
</template>

<script>
    

    export default {
        data(){
            return {
                countTime: 1
            }
        },
        methods: {
            animation(){
                //console.log(this.countTime);
                const logo = document.getElementById('logo');
                if(logo.classList.contains('neon-on') && (this.countTime%22 === 0 || this.countTime%23 === 0))
                    logo.classList.replace('neon-on', 'neon-off');
                else
                    logo.classList.replace('neon-off', 'neon-on');

                this.countTime++;
            }
        },
        mounted(){
            setInterval(this.animation, 200);            
        }
    }
</script>

<style scoped>
.neon-on{
    font-size: 15px;
    color: #fff;
    text-align: center;
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #0073e6, 0 0 20px #0073e6, 0 0 25px #0073e6, 0 0 30px #0073e6, 0 0 35px #0073e6;
    border-style: solid;
    border-width: 3px;
    border-color: #fff;
    box-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #0073e6, 0 0 10px #0073e6, 0 0 15px #0073e6, 0 0 20px #0073e6, 0 0 20px #0073e6;
    border-radius: 5px;
    padding-left: 10px;
    padding-right: 10px;
}

.neon-off{
    font-size: 15px;
    text-align: center;
    color: rgb(100, 100, 100);
    text-shadow: none;
    border-color: #fff;
    border-style: solid;
    border-radius: 5px;
    border-color: rgb(100, 100, 100);
    box-shadow: none;
    padding-left: 10px;
    padding-right: 10px;
}

.neon-link:hover{    
    color:#fff;
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #0073e6, 0 0 20px #0073e6, 0 0 25px #0073e6, 0 0 30px #0073e6, 0 0 35px #0073e6;

}
</style>