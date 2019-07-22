<template>
    <div class="d-flex justify-content-end w-100 pr-5">
        <h3>Корзина: {{ cart.total }} ₽ [{{ cart.count }}]</h3>
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
                        console.log(response.data);
                        this.cart = response.data;
                    })
            },
            // created(){
            //     this.$on("updateCart", (total)=>{
            //         console.log('Измененые данные' + total);
            //     });
            // }
        },

        created(){
          eventEmitter.$on('updateCart', (cart) => {
              this.cart = cart;
          })
        },

        mounted() {
            this.fetch();
        }
    }
</script>

<style scoped>

</style>