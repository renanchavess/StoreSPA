<template>
    <div>
        <canvas id="canvas" width="500" height="300"></canvas>
    </div>

    
</template>

<script>

export default {
    mounted: function (){
        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        ctx.fillRect(100,100,300,300);  
        this.vueCanvas = ctx;
    }
}
</script>

<style scoped >
    #canvas {
        border: 3px solid black;
        height: 100px;
        width: 100px
    }
</style>