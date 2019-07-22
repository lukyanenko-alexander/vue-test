<template>
    <div class="d-flex justify-content-end w-100">
        <h3><a href="/cart"> Корзина: {{ cart.total }} ₽ [{{ cart.count }}]</a></h3>
    </div>
</template>

<script>
    import {eventEmitter} from "../app";

    export default {
        data(){
            return{
                cart: [],
            }
        },

        methods:{
            fetch(){
                axios.get('/getCart')
                    .then(response => {
                        this.cart = response.data;
                    })
            },
        },

        created(){
          eventEmitter.$on('updateCart', (cart) => {
              this.cart = cart;
          });
          eventEmitter.$on('updateCart1', () => {
              this.fetch();
          })
        },

        mounted() {
            this.fetch();
        }
    }
</script>

<style scoped>

</style>