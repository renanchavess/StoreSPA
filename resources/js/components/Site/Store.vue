<template>
    <div>
        <menu-bar></menu-bar>
        
        <router-view class="container-fluid justify-content-md-center"/>
    </div>
</template>

<script>
import MenuBar from "./Menu.vue";
export default {
    components:{
        MenuBar
    }
}
</script>

<style scoped>

</style>