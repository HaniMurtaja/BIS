<template>
    <div>
      <button @click="downloadInvoice(orderId)">تحميل الفاتورة</button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        orderId: 1, // Example order ID, dynamically passed
      };
    },
    methods: {
      async downloadInvoice(orderId) {
        try {
          // Make a request to the backend to generate the invoice PDF
          const response = await axios.get(`/api/order/${orderId}/invoice`, { responseType: 'blob' });
  
          // Create a Blob from the PDF data
          const blob = new Blob([response.data], { type: 'application/pdf' });
  
          // Create an anchor element to trigger the download
          const link = document.createElement('a');
          link.href = URL.createObjectURL(blob);
          link.download = `invoice_${orderId}.pdf`; // Set the filename dynamically
          link.click(); // Trigger the download
        } catch (error) {
          console.error('Error while downloading the invoice:', error);
          alert('حدث خطأ أثناء تحميل الفاتورة');
        }
      },
    },
  };
  </script>
  