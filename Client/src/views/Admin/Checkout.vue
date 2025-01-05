<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import {onMounted, ref} from "vue";
import useSession from "@/composerbles/useSession.js";

const print = () => {
  window.print();
  router.push('/').catch(() => {});
};
const currentDateTime = ref(new Date().toLocaleString());

const cartItems = ref([])

const removeItem = (itemId) =>{
  localStorage.removeItem(cartItems)
  cartItems.value = cartItems.value.filter(item => item.id !== itemId);

  localStorage.setItem("cartItems", JSON.stringify(cartItems.value));
  if (cartItems.value.length === 0) {
    localStorage.removeItem("cartItems");
  }
}

onMounted( ()=> {
  const items =  localStorage.getItem("cartItems")
  cartItems.value = JSON.parse(items)
})


const {hospital} =  useSession()
</script>

<template>
  <!--  <AdminNavBar />-->

  <div class="max-w-2xl mx-auto my-8 bg-white p-6 shadow-sm border border-gray-100">
    <!-- Simple Header -->
    <div class="mb-8">
      <h1 class="text-2xl font-light text-gray-800">Receipt</h1>
      <p class="text-sm text-gray-500 mt-1">{{ currentDateTime }}</p>
    </div>

    <!-- Print Button -->
    <div class="mb-8 no-print">
      <button
          @click="print()"
          class="text-sm text-gray-600 hover:text-gray-800 flex items-center gap-2"
      >
        <i class="fas fa-print"></i> Print
      </button>
    </div>

    <!-- Logo Section -->
    <div class="mb-12 text-center">
      <!--<img src="../../../tsclogo.png" alt="Logo" width="50" class="mb-2">-->
      <p class="text-sm text-gray-600">Transaction Details</p>
    </div>

    <!-- Table -->
    <div class="w-100 mb-4 bg-white p-4 rounded">
      <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
          <thead class="table-light">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Drugs</th>
            <th class="text-center">Price</th>
            <th class="text-center">Quantity</th>
            <th class="text-center no-print">Action</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(item, index) in cartItems" :key="item.id">
            <td class="text-center">{{index +1}}</td>
            <td class="text-center">{{ item.name }}</td>
            <td class="text-center">{{ item.price }}</td>
            <td class="text-center">{{ item.quantity }}</td>
            <td class="text-center no-print"><button class="btn btn-secondary" @click="removeItem(item.id)">Remove</button></td>
          </tr>
          <tr v-if="cartItems.length > 0" class="table-secondary">
          <td colspan="2" class="text-end fw-bold">Total:</td>
          <td colspan="2" class="text-center fw-bold">
            GHC{{ cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0).toFixed(2) }}
          </td>
          <td class="no-print"></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Footer -->
    <div class="text-center text-sm text-gray-500">
      Thank you for your business
    </div>
  </div>
</template>

<style scoped>
@media print {
  .max-w-2xl {
    max-width: none;
    margin: 0;
    box-shadow: none;
    border: none;
  }

  .no-print {
    display: none !important;
  }
}
</style>