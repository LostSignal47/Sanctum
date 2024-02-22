<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

var { products } = defineProps(['products']);
</script>

<template>
    <AppLayout title="Dashboard">
        <!-- เนื้อหาอื่น ๆ ของหน้า Dashboard -->
        <div class="header">Product List</div>
        <div class="product grid grid-cols-4 gap-4">
             <div v-for="item in products" :key="item.id" class="product-item bg-white p-9 rounded shadow">
                 <div class="text-lg font-bold">{{ item.product_name }}</div>
                 <div><span class="content">Product ID:</span> {{ item.product_code }}</div>
                 <div><span class="content">Price:</span> {{ item.product_price }}</div>
                 <div><span class="content">Quantity:</span> {{ item.product_quantity }}</div>
                 <div><span class="content">Details: </span>{{ item.description }}</div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.header {
  font-size: 1.5rem;
  color: #333;
  margin-bottom: 1rem;
  display: flex;
  justify-content: center; /* จัดตำแหน่งตรงกลางแนวนอน */
  align-items: center; /* จัดตำแหน่งตรงกลางนอนตัวหนังสือ */
}

.product {
  margin-top: 2rem;
}

.product-item {
  padding: 1.5rem;
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  transition: transform 0.3s ease-in-out;
  
  &:hover {
    transform: scale(1.05);
  }

  .content {
    font-weight: bold;
    color: #555;
  }
  
}
</style>
