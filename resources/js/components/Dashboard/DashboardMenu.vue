<template>
    <nav class="menu-bar bg-dark">
        <div class="menu-icon text-center">
            <img src="http://localhost/StoreSPA/public/images//user.png" alt="user photo" class="rounded-circle"><br/>
            <span class="align-middle">Renan Chaves</span>
        </div>
        <hr>
        <ul>

            <router-link to="/dashboard/products" active-class="menu-bar-item-active" class="menu-bar-item" tag="li">
                <a><i class="fas fa-box"></i> Products</a>
            </router-link>


            <router-link to="/dashboard/category" active-class="menu-bar-item-active" class="menu-bar-item" tag="li">
                <a href="#"><i class="fas fa-layer-group"></i> Category</a>
            </router-link>

            <router-link to="/dashboard/graphics" active-class="menu-bar-item-active" class="menu-bar-item" tag="li">
                <a><i class="fas fa-chart-bar"></i> Graphics</a>
            </router-link>
            <router-link to="/dashboard/sales" active-class="menu-bar-item-active" class="menu-bar-item" tag="li">
                <a><i class="fas fa-funnel-dollar"></i> Sales</a>
            </router-link>
            

            
            <li class="menu-bar-item"><a href="#"><i class="fas fa-cubes"></i> Stock</a></li>
            <li class="menu-bar-item"><a href="#"><i class="fas fa-percent"></i> Promotion</a></li>
            
            <li class="menu-bar-item"><a href="#"><i class="fas fa-calendar-alt"></i> Events</a></li>
            <li class="menu-bar-item"><a href="#"><i class="fas fa-sticky-note"></i> Reports</a></li>

            

            <router-link to="/store" active-class="menu-bar-item-active" class="menu-bar-item" tag="li">
                <a><i class="fas fa-paper-plane"></i> Site</a>
            </router-link>
        </ul>
    </nav>
</template>

<script>
    export default {
        
    }
</script>