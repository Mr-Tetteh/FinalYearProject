<script setup>
import {ref, computed} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import usePayments from "@/composables/usePayments.js";
import useHospitalManagement from "@/composables/useHospitalManagement.js";
import {onMounted} from "vue";

const {
  Payments,
  fetch_drugs,
  drugs,
  fetch_consultation,
  consultation,
  makePayment
} = usePayments();

const {fetchLab, labs} = useHospitalManagement();

const showDrugDropdown = ref(false);
const showLabDropdown = ref(false);

// Compute selected drugs & labs by matching IDs
const selectedDrugs = computed(() =>
    drugs.value.filter((d) => Payments.value.selectedDrugIds.includes(d.id))
);
const selectedLabs = computed(() =>
    labs.value.filter((l) => Payments.value.selectedLabsIds.includes(l.id))
);

const removeDrug = (id) => {
  Payments.value.selectedDrugIds = Payments.value.selectedDrugIds.filter(
      (d) => d !== id
  );
};

const removeLab = (id) => {
  Payments.value.selectedLabsIds = Payments.value.selectedLabsIds.filter(
      (l) => l !== id
  );
};

onMounted(() => {
  fetchLab();
  fetch_drugs();
  fetch_consultation();
});


const handelSubmit = async () => {
  if (Payments.value.reasonForPayment === "Consultation" && consultation.value.length > 0) {
    Payments.value.consultationAmount = Number(consultation.value[0].price);
  }
  await makePayment();
};
</script>


<template>
  <AdminNavBar/>
  <main class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card payment-card shadow-lg">
          <div class="card-header text-white">
            <div class="d-flex align-items-center">
              <i class="bi bi-credit-card-fill fs-1 me-3"></i>
              <div>
                <h3 class="mb-1">Payment Management</h3>
                <p class="mb-0 opacity-90">Secure and convenient payment processing</p>
              </div>
            </div>
          </div>

          <div class="card-body p-4">
            <form @submit.prevent="handelSubmit">
              <!-- Service Selection -->
              <div class="mb-4">
                <h5 class="section-title">
                  <i class="bi bi-list-check"></i>
                  What are you paying for?
                </h5>

                <select v-model="Payments.reasonForPayment" class="form-select" id="serviceSelect">
                  <option value="" disabled selected>Choose a service...</option>
                  <option value="Consultation">💊 Consultation</option>
                  <option value="Labs">🧪 Laboratory Tests</option>
                  <option value="Drugs">💉 Medications</option>
                </select>

              </div>


              <!-- Fee Cards -->
              <div v-if="Payments.reasonForPayment === 'Consultation'" class="row mb-4">
                <div class="col-md-12">
                  <div class="card fee-card with-insurance">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-shield-fill-check text-success fs-4 me-2"></i>
                        <h6 class="mb-0 fw-bold">Consultation Fee</h6>
                      </div>
                      <div class="input-group">
                        <span class="input-group-text bg-success text-white border-0">GHS</span>
                        <div v-for="item in consultation" :key="item.id">
                          <input
                              type="text"
                              class="form-control w-100 border-0"
                              :value="item.price"
                              readonly
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Drug Selection -->
              <!-- Lab Selection -->
              <div class="mb-4" v-if="Payments.reasonForPayment === 'Labs'">
                <h5 class="section-title">
                  <i class="bi bi-flask"></i>
                  Select Labs
                </h5>

                <!-- Selection box -->
                <div
                    class="relative"
                >
                  <div
                      class="w-full px-5 py-3 bg-gradient-to-r from-sky-50 to-blue-50
        border-2 border-sky-200 rounded-xl shadow-sm flex flex-wrap gap-2 min-h-[50px] cursor-pointer"
                      @click="showLabDropdown = !showLabDropdown"
                  >
                      <span v-if="Payments.selectedLabsIds.length === 0" class="text-gray-400">
                        Select labs...
                      </span>
                    <span
                        v-for="lab in selectedLabs"
                        :key="lab.id"
                        class="bg-sky-200 text-sky-800 text-sm px-3 py-1 rounded-lg flex items-center gap-1"
                    >
        {{ lab.name }}
        <button
            type="button"
            class="ml-1 text-red-500 hover:text-red-700"
            @click.stop="removeLab(lab.id)"
        >
          ✕
        </button>
      </span>
                  </div>

                  <!-- Dropdown -->
                  <div
                      v-if="showLabDropdown"
                      class="absolute z-10 mt-2 w-full max-h-60 overflow-y-auto bg-white border border-sky-200 rounded-xl shadow-lg"
                  >
                    <label
                        v-for="lab in labs"
                        :key="lab.id"
                        class="flex items-center px-4 py-2 hover:bg-sky-50 cursor-pointer"
                    >
                      <input
                          type="checkbox"
                          :value="lab.id"
                          v-model="Payments.selectedLabsIds"
                          class="mr-3 w-4 h-4 text-sky-600 rounded border-gray-300 focus:ring-sky-500"
                      />
                      <span class="text-sky-800 font-medium">
          {{ lab.name }} - GHS {{ lab.price }}
        </span>
                    </label>
                  </div>
                </div>
              </div>

              <!-- Drug Selection -->
              <div class="mb-4" v-if="Payments.reasonForPayment === 'Drugs'">
                <h5 class="section-title">
                  <i class="bi bi-capsule"></i>
                  Select Medications
                </h5>

                <!-- Selection box -->
                <div class="relative">
                  <div
                      class="w-full px-5 py-3 bg-gradient-to-r from-emerald-50 to-teal-50
        border-2 border-emerald-200 rounded-xl shadow-sm flex flex-wrap gap-2 min-h-[50px] cursor-pointer"
                      @click="showDrugDropdown = !showDrugDropdown"
                  >
      <span
          v-if="Payments.selectedDrugIds.length === 0"
          class="text-gray-400"
      >
        Select drugs...
      </span>
                    <span
                        v-for="drug in selectedDrugs"
                        :key="drug.id"
                        class="bg-emerald-200 text-emerald-800 text-sm px-3 py-1 rounded-lg flex items-center gap-1"
                    >
        {{ drug.name }}
        <button
            type="button"
            class="ml-1 text-red-500 hover:text-red-700"
            @click.stop="removeDrug(drug.id)"
        >
          ✕
        </button>
      </span>
                  </div>

                  <!-- Dropdown -->
                  <div
                      v-if="showDrugDropdown"
                      class="absolute z-10 mt-2 w-full max-h-60 overflow-y-auto bg-white border border-emerald-200 rounded-xl shadow-lg"
                  >
                    <label
                        v-for="drug in drugs"
                        :key="drug.id"
                        class="flex items-center px-4 py-2 hover:bg-emerald-50 cursor-pointer"
                    >
                      <input
                          type="checkbox"
                          :value="drug.id"
                          v-model="Payments.selectedDrugIds"
                          class="mr-3 w-4 h-4 text-emerald-600 rounded border-gray-300 focus:ring-emerald-500"
                      />
                      <span class="text-emerald-800 font-medium">
          {{ drug.name }} - GHS {{ drug.price }}
        </span>
                    </label>
                  </div>
                </div>
              </div>

              <!-- Total Amount -->
              <div class="total-section">
                <div class="d-flex align-items-center justify-content-center mb-2">
                  <i class="bi bi-calculator fs-2 me-3"></i>
                  <h4 class="mb-0">Total Amount</h4>
                </div>

                <div class="total-amount">
                  <input type="text"
                         v-if="Payments.reasonForPayment === 'Labs'"
                         :value="selectedLabs.reduce((total, lab) => total + parseFloat(lab.price), 0).toFixed(2)"
                         readonly
                         disabled
                         class="form-control"/>

                  <input type="text"
                         v-if="Payments.reasonForPayment === 'Drugs'"
                         :value="selectedDrugs.reduce((total, lab) => total + parseFloat(lab.price), 0).toFixed(2)"
                         readonly
                         disabled
                         class="form-control"/>

                  <input type="text"
                         v-if="Payments.reasonForPayment === 'Consultation'"
                         :value="consultation.reduce((total, lab) => total + parseFloat(lab.price), 0).toFixed(2)"
                         readonly
                         disabled
                         class="form-control"/>
                </div>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn payment-btn w-100">
                <i class="bi bi-credit-card me-2"></i>
                Process Payment Securely
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style scoped>
body {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  min-height: 100vh;
  padding: 2rem 0;
}

.payment-card {
  border-radius: 20px;
  border: none;
  backdrop-filter: blur(10px);
  box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
}

.card-header {
  background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
  border-radius: 20px 20px 0 0 !important;
  padding: 2rem;
  border: none;
}

.form-floating {
  margin-bottom: 1.5rem;
}

.form-select, .form-control {
  border: 2px solid #e9ecef;
  border-radius: 12px;
  padding: 0.75rem 1rem;
  transition: all 0.3s ease;
  background: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(10px);
}

.form-select:focus, .form-control:focus {
  border-color: #28a745;
  box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
  background: white;
}

.fee-card {
  border-radius: 15px;
  border: none;
  margin-bottom: 1.5rem;
  transition: all 0.3s ease;
  transform: translateY(0);
}

.fee-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.fee-card.with-insurance {
  background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
  border-left: 5px solid #28a745;
}

.fee-card.without-insurance {
  background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
  border-left: 5px solid #dc3545;
}

.drug-selection {
  background: linear-gradient(135deg, #e2e3e5 0%, #d6d8db 100%);
  border-radius: 15px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
}

.drug-option {
  background: white;
  border: 2px solid #e9ecef;
  border-radius: 10px;
  margin-bottom: 0.75rem;
  padding: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.drug-option:hover {
  border-color: #28a745;
  background: #f8f9fa;
  transform: translateX(10px);
}

.drug-option.selected {
  border-color: #28a745;
  background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
}

.drug-price {
  font-weight: bold;
  color: #28a745;
}

.total-section {
  background: linear-gradient(135deg, #343a40 0%, #495057 100%);
  border-radius: 15px;
  padding: 2rem;
  text-align: center;
  margin-bottom: 2rem;
  color: white;
  position: relative;
  overflow: hidden;
}

.total-section::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: repeating-linear-gradient(
      45deg,
      transparent,
      transparent 10px,
      rgba(255, 255, 255, 0.05) 10px,
      rgba(255, 255, 255, 0.05) 20px
  );
  animation: shimmer 3s linear infinite;
}

@keyframes shimmer {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

.total-amount {
  font-size: 3rem;
  font-weight: bold;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
  position: relative;
  z-index: 1;
}

.payment-btn {
  background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
  border: none;
  border-radius: 12px;
  padding: 1rem 2rem;
  font-size: 1.2rem;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.payment-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(40, 167, 69, 0.4);
}

.payment-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
      90deg,
      transparent,
      rgba(255, 255, 255, 0.2),
      transparent
  );
  transition: left 0.5s;
}

.payment-btn:hover::before {
  left: 100%;
}

.icon-wrapper {
  display: inline-block;
  margin-right: 0.5rem;
  font-size: 1.2em;
}

.section-title {
  color: #495057;
  font-weight: 600;
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
}

.section-title i {
  margin-right: 0.5rem;
  color: #28a745;
}
</style>