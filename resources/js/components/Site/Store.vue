<template>
    <div>
        <menu-bar></menu-bar>
        
        <router-view class="container-fluid bg-gradient"/>
    </div>
</template>

<script>
import MenuBar from "./Menu.vue";
export default {
    components:{
        MenuBar
    },
    mounted(){
        
    }
}
</script>

<style scoped>

</style>