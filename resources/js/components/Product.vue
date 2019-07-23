<template>
    <div class="row">
        <div v-for="product in products" class="col-3 p-5">
            <div class="border shadow-sm p-2">
                <div class="form-group d-flex justify-content-center">
                    <h5>{{ product.title }}</h5>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <h5>{{ product.price}}</h5>
                </div>
                <div class="d-flex justify-content-center">
                    <button @click="increase(product.id)" class="btn btn-primary ">В корзину</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {eventEmitter} from "../app";

    export default {
        data(){
            return{
                products: [],
            }
        },

        methods:{
            fetch(){
                axios.get('/getProducts')
                    .then(response => {
                        this.products = response.data;
                    })
            },

            increase: function (pid) {
                axios.post('/addCart', {
                    id: pid
                })
                    .then(response =>{
                        eventEmitter.$emit('updateCart', response.data);
                    })
            }
        },

        mounted() {
            this.fetch();
        }
    }

</script>


<style scoped>

</style>