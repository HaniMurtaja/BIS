<template>
    <div>
      <h2>عربة التسوق</h2>
      <div v-if="cart.length === 0">
        <p>عربتك فارغة!</p>
      </div>
      <div v-else>
        <div v-for="item in cart" :key="item.id">
          <h3>{{ item.name_ar }}</h3>
          <p>{{ item.description_ar }}</p>
          <input v-model="item.quantity" type="number" min="1" />
          <button @click="removeItem(item.id)">حذف</button>
        </div>
  
        <button @click="checkout">إتمام الشراء</button>
      </div>
    </div>
  </template>
  
  <script>
  import { mapState, mapMutations } from 'vuex';
  import axios from 'axios';
  
  export default {
    computed: mapState(['cart']),
    methods: {
      ...mapMutations(['removeFromCart']),
      removeItem(productId) {
        this.removeFromCart(productId);
      },
      async checkout() {
        const orderData = {
          name: 'John Doe', // Get user details dynamically
          address: '123 Main St',
          payment_details: 'Visa **** 1234', // Payment gateway integration needed
          cart: this.cart,
        };
  
        try {
          await axios.post('/api/checkout', orderData);
          alert('تمت عملية الشراء بنجاح!');
        } catch (error) {
          console.error('Error during checkout', error);
        }
      },
    },
  };
  </script>
  
  