<script setup lang="ts">
import usePayments from "@/composables/usePayments.js";
import { onMounted, ref, computed } from "vue";

const { fetch_Last_HospitalPayments, latestPaymentRecord } = usePayments();

// Print function
const printReceipt = () => {
  const printContents = document.getElementById("receipt")?.innerHTML;
  const originalContents = document.body.innerHTML;

  if (printContents) {
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
  }
};

onMounted(() => {
  fetch_Last_HospitalPayments();
});

// 🔑 Computed properties to safely parse labNames and drugNames
const parsedLabs = computed(() => {
  try {
    return latestPaymentRecord.value?.labNames
        ? JSON.parse(latestPaymentRecord.value.labNames)
        : [];
  } catch {
    return [];
  }
});

const parsedDrugs = computed(() => {
  try {
    return latestPaymentRecord.value?.drugNames
        ? JSON.parse(latestPaymentRecord.value.drugNames)
        : [];
  } catch {
    return [];
  }
});
</script>

<template>
  <main class="container my-5">
    <div
        id="receipt"
        class="bg-white p-5 shadow-lg rounded"
        style="max-width: 700px; margin: auto; font-size: 1.1rem;"
    >
      <!-- Header -->
      <header
          class="mb-5 d-flex justify-content-between align-items-center border-bottom pb-3"
      >
        <h1 class="h3 mb-0 text-success fw-bold">Payment Receipt</h1>
        <button @click="printReceipt" class="btn btn-primary btn-sm">
          <i class="bi bi-printer me-1"></i> Print
        </button>
      </header>

      <!-- Receipt details -->
      <div v-if="latestPaymentRecord" class="mb-4">
        <div class="d-flex justify-content-between mb-2">
          <span class="fw-bold">Receipt ID:</span>
          <span>#{{ latestPaymentRecord.id }}</span>
        </div>

        <div class="d-flex justify-content-between mb-2">
          <span class="fw-bold">Reason for Payment:</span>
          <span>{{ latestPaymentRecord.reasonForPayment }}</span>
        </div>

        <!-- Consultation -->
        <div
            v-if="latestPaymentRecord.reasonForPayment === 'Consultation'"
            class="d-flex justify-content-between mb-2"
        >
          <span class="fw-bold">Consultation Fee:</span>
          <span>GHS {{ latestPaymentRecord.consultationAmount || "0.00" }}</span>
        </div>

        <!-- Labs -->
        <div v-if="latestPaymentRecord.reasonForPayment === 'Labs'" class="mb-3">
          <div class="fw-bold mb-2">Lab Names:</div>
          <ul class="list-group mb-2">
            <li
                v-for="(lab, index) in parsedLabs"
                :key="index"
                class="list-group-item"
            >
              {{ lab }}
            </li>
          </ul>
          <div class="d-flex justify-content-between fw-bold">
            <span>Total Labs:</span>
            <span>GHS {{ latestPaymentRecord.totalLabAmount || "0.00" }}</span>
          </div>
        </div>

        <!-- Drugs -->
        <div v-if="latestPaymentRecord.reasonForPayment === 'Drugs'" class="mb-3">
          <div class="fw-bold mb-2">Drug Names:</div>
          <ul class="list-group mb-2">
            <li
                v-for="(drug, index) in parsedDrugs"
                :key="index"
                class="list-group-item"
            >
              {{ drug }}
            </li>
          </ul>
          <div class="d-flex justify-content-between fw-bold">
            <span>Total Drugs:</span>
            <span>GHS {{ latestPaymentRecord.totalDrugAmount || "0.00" }}</span>
          </div>
        </div>
      </div>

      <hr v-if="latestPaymentRecord" class="my-4" />

      <!-- Final Total -->
      <div
          v-if="latestPaymentRecord"
          class="d-flex justify-content-between fw-bold text-success fs-4 mb-3"
      >
        <span>Total Paid:</span>
        <span>
          GHS
          {{
            Number(latestPaymentRecord.consultationAmount || 0) +
            Number(latestPaymentRecord.totalLabAmount || 0) +
            Number(latestPaymentRecord.totalDrugAmount || 0)
          }}
        </span>
      </div>

      <!-- Date -->
      <div
          v-if="latestPaymentRecord"
          class="d-flex justify-content-between text-muted mb-4"
      >
        <span>Date:</span>
        <span>{{ new Date(latestPaymentRecord.createdAt).toLocaleString() }}</span>
      </div>

      <!-- Footer -->
      <p class="mt-5 text-center text-muted small">
        Thank you for your payment 💚
      </p>
    </div>
  </main>
</template>
