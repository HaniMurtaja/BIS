<template>
    <div>
      <h2>إضافة منتج</h2>
      <form @submit.prevent="submitProduct">
        <div>
          <label for="name_ar">اسم المنتج:</label>
          <input v-model="product.name_ar" type="text" id="name_ar" required placeholder="اسم المنتج باللغة العربية" />
        </div>
  
        <div>
          <label for="description_ar">وصف المنتج:</label>
          <textarea v-model="product.description_ar" id="description_ar" required placeholder="وصف المنتج باللغة العربية"></textarea>
        </div>
  
        <div>
          <label for="price">السعر:</label>
          <input v-model="product.price" type="number" id="price" required placeholder="السعر" />
        </div>
  
        <div>
          <label for="category">الفئة:</label>
          <select v-model="product.category_id" id="category" required>
            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name_ar }}</option>
          </select>
        </div>
  
        <div>
          <label for="image">الصورة:</label>
          <input type="file" @change="handleFileUpload" required />
        </div>
  
        <button type="submit">إضافة المنتج</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        product: {
          name_ar: '',
          description_ar: '',
          price: '',
          category_id: '',
          image: null,
        },
        categories: [],
      };
    },
    mounted() {
      // Fetch product categories from the API
      axios.get('/api/categories')
        .then(response => {
          this.categories = response.data;
        });
    },
    methods: {
      handleFileUpload(event) {
        this.product.image = event.target.files[0];
      },
      async submitProduct() {
        const formData = new FormData();
        formData.append('name_ar', this.product.name_ar);
        formData.append('description_ar', this.product.description_ar);
        formData.append('price', this.product.price);
        formData.append('category_id', this.product.category_id);
        formData.append('image', this.product.image);
  
        try {
          await axios.post('/api/products', formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
          });
          alert('تم إضافة المنتج بنجاح');
        } catch (error) {
          console.error('Error adding product', error);
        }
      },
    },
  };
  </script>
  
  