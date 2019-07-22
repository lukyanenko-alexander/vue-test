<template>
    <div class="d-flex justify-content-end w-100 pr-5">
        <h3>Корзина: {{ test.total }} ₽</h3>
    </div>
</template>

<script>
    import {eventEmitter} from "../app";

    export default {
        data(){
            return{
                test: 0,
            }
        },

        methods:{
            fetch(){
                axios.get('/')
                    .then(response => {
                        this.test = response.data;
                    })
            },
            created(){
                this.$on("updateCart", (total)=>{
                    console.log('Измененые данные' + total);
                });
            }
        },

        created(){
          eventEmitter.$on('updateCart', (cart) => {
              this.test = cart;
          })
        },

        mounted() {
            this.fetch();
        }
    }
</script>

<style scoped>

</style>