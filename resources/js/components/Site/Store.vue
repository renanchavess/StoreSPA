<template>
    <div>
        <menu-bar></menu-bar>
        
        <router-view class="container-fluid bg-gradient h-body"/>
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