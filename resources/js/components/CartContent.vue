<template>
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Название</td>
                <td>Стоимость</td>
                <td>Колличество</td>
                <td>Сумма</td>
                <td>Действие</td>
            </tr>
        </thead>
        <tr v-for="cartItem in cartItems">
            <td>{{cartItem.id}}</td>
            <td>{{cartItem.name}}</td>
            <td>{{cartItem.price}}</td>
            <td><input type="number" v-model="cartItem.qty" @change="updateQty(cartItem.rowId, cartItem.qty)"></td>
            <td>{{cartItem.subtotal}}</td>
            <td><button class="btn btn-danger" @click="destroyItem(cartItem.rowId)">Удалить</button></td>
        </tr>
    </table>
</template>

<script>
    import {eventEmitter} from "../app";

    export default {
        data(){
            return{
                cartItems: [],
            }
        },

        methods:{
            fetch(){
                axios.get('/cartContent')
                    .then(response => {
                        this.cartItems = response.data;
                    })
            },
            destroyItem(id){
                axios.delete('/destroyItem', {
                    data:{
                        rowId: id
                    }
                })
                    .then(response =>{
                        this.cartItems = response.data;
                        eventEmitter.$emit('updateCart1')
                    });
            },
            updateQty(id, num){
                axios.post('/updateQty', {
                        rowId: id,
                        qty: num
                })
                    .then(response =>{
                        this.cartItems = response.data;
                        eventEmitter.$emit('updateCart1')
                    });
            }
        },

        mounted() {
            this.fetch();
        }

    }
</script>

<style scoped>

</style>