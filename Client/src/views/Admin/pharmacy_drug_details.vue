<script setup>

import AdminNavBar from "@/components/AdminNavBar.vue";
import useHospital from "@/composerbles/useHospital.js";
import {onMounted} from "vue";

const props = defineProps({
  id: {
    type: String,
   required : true
  }
})

const { get_stock_drugs_edit, update_drug, drug } = useHospital()

const UpdateDrug = async () => {
  await update_drug()
}

onMounted(async () => {
  await get_stock_drugs_edit(props.id)
})
</script>

<template>
<AdminNavBar/>
  <div class="drugs_registration drug-entry min-vh-100 d-flex justify-content-center align-items-center py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8">
          <div class="card border-0 shadow-lg">
            <div class="card-header bg-primary p-4">
              <div class="d-flex align-items-center">
                <i class="bi bi-capsule text-white me-3 fs-3"></i>
                <h3 class="text-white mb-0">Edit Medications</h3>
              </div>
            </div>

            <div class="card-body p-4">
              <form v-if="drug" @submit.prevent="UpdateDrug" class="needs-validation">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Drug Name</label>
                    <input
                        type="text"
                        class="form-control"
                        v-model="drug.name"
                    />
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Price</label>
                    <div class="input-group">
                      <span class="input-group-text">GHS</span>
                      <input
                          type="number"
                          class="form-control"
                          v-model="drug.price"
                          step="0.01"
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select
                        class="form-select"
                        v-model="drug.category"
                        
                    >
                      <option value="" disabled selected>Select Category</option>
                      <option value="Vitamin">Vitamin</option>
                      <option value="Antibiotic">Antibiotic</option>
                      <option value="Analgesic">Analgesic</option>
                      <option value="Antidepressant">Antidepressant</option>
                      <option value="Antihistamine">Antihistamine</option>
                      <option value="Antiviral">Antiviral</option>
                      <option value="Antifungal">Antifungal</option>
                      <option value="Antiseptic">Antiseptic</option>
                      <option value="Antipsychotic">Antipsychotic</option>
                      <option value="Diuretic">Diuretic</option>
                      <option value="Hormone Therapy">Hormone Therapy</option>
                      <option value="Immunosuppressant">Immunosuppressant</option>
                      <option value="Sedative">Sedative</option>
                      <option value="Stimulant">Stimulant</option>
                      <option value="Laxative">Laxative</option>
                      <option value="Anticoagulant">Anticoagulant</option>
                      <option value="Antiemetic">Antiemetic</option>
                      <option value="Antidiabetic">Antidiabetic</option>
                      <option value="Cardiovascular">Cardiovascular</option>
                      <option value="Anticonvulsant">Anticonvulsant</option>
                      <option value="Bronchodilator">Bronchodilator</option>
                      <option value="Gastrointestinal">Gastrointestinal</option>
                      <option value="Anesthetic">Anesthetic</option>
                      <option value="Dermatological">Dermatological</option>
                      <option value="Ophthalmic">Ophthalmic</option>
                      <option value="Otic">Otic</option>
                      <option value="Antineoplastic">Antineoplastic</option>
                      <option value="Anti-inflammatory">Anti-inflammatory</option>
                      <option value="Antimalarial">Antimalarial</option>
                      <option value="Antirheumatic">Antirheumatic</option>
                      <option value="Antispasmodic">Antispasmodic</option>
                      <option value="Nutritional Supplement">Nutritional Supplement</option>
                      <option value="Probiotic">Probiotic</option>
                      <option value="Steroid">Steroid</option>
                      <option value="Anti-obesity">Anti-obesity</option>
                      <option value="Antiparasitic">Antiparasitic</option>
                      <option value="Expectorant">Expectorant</option>
                      <option value="Cough Suppressant">Cough Suppressant</option>
                      <option value="Antigout">Antigout</option>
                      <option value="Antiglaucoma">Antiglaucoma</option>
                      <option value="Muscle Relaxant">Muscle Relaxant</option>
                      <option value="Corticosteroid">Corticosteroid</option>
                      <option value="Antivertigo">Antivertigo</option>
                      <option value="Antiprotozoal">Antiprotozoal</option>
                      <option value="Antiseizure">Antiseizure</option>
                      <option value="Antituberculosis">Antituberculosis</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Quantity in Stock</label>
                    <input
                        type="number"
                        class="form-control"
                        v-model="drug.quantity"
                        min="0"
                        
                    />
                  </div>

                  <div class="col-12">
                    <label class="form-label">Usage Description</label>
                    <textarea
                        class="form-control"
                        v-model="drug.use"
                        rows="3"
                        placeholder="Enter medication usage instructions and information"
                        
                    ></textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Additional Notes</label>
                    <textarea
                        class="form-control"
                        v-model="drug.additional_notes"
                        rows="2"
                        placeholder="Enter any storage requirements, warnings, or special instructions"
                    ></textarea>
                  </div>
                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-plus-circle me-2"></i>
                    Edit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</template>

<style scoped>
.drugs_registration {
  background-image: url("@/assets/img/generic-drugs-istock.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
  border-radius: 2%;
}
.drug-entry {
  background-color: #f8f9fa;
  position: relative;
}

.card {
  border-radius: 10px;
  transition: all 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
}

.form-control, .form-select {
  border: 1.5px solid #e0e0e0;
  border-radius: 8px;
  padding: 0.75rem;
  transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
  border-color: var(--bs-primary);
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1);
}

.btn-primary {
  border-radius: 8px;
  padding: 0.75rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
}

@media (max-width: 767.98px) {
  .card-body {
    padding: 1rem !important;
  }
}
</style>
