<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{test}}</h1>
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>

                    <input type="text" v-model="test">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                test: 'Laravel + Vue'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
