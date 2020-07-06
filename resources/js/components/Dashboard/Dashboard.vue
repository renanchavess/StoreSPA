<template>
    <div class="dashboard">
        <dashboard-menu></dashboard-menu>
        <div class="content-dashboard">
            <router-view></router-view>
        </div>        
    </div>
    
</template>

<script>

import DashboardMenu from './DashboardMenu'

export default {
    components:{
        DashboardMenu
    }    
}
</script>