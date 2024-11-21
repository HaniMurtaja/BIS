<template>
    <form @submit.prevent="checkout">
      <input v-model="user.name" placeholder="اسم المستخدم" required />
      <input v-model="user.address" placeholder="العنوان" required />
      <button type="submit">إتمام الشراء</button>
    </form>
  </template>
  
  <script>
  export default {
    data() {
      return { user: { name: '', address: '' } };
    },
    methods: {
      async checkout() {
        await axios.post('/checkout', { ...this.user, cart: this.$store.state.cart });
        alert('Order completed!');
      },
    },
  };
  </script>
  