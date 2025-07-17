<script setup>

import AdminNavBar from "@/components/AdminNavBar.vue";
import {RouterLink} from "vue-router";
import useHospital from "@/composerbles/useHospital.js";

const { data, stock_drugs} = useHospital()

const registerDrug = () =>{
  stock_drugs()
}
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
                  <h3 class="text-white mb-0">Add New Medication</h3>
                </div>
              </div>

              <div class="card-body p-4">
                <form @submit.prevent="registerDrug" class="needs-validation">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label">Drug Name</label>
                      <input
                          type="text"
                          class="form-control"
                          v-model="data.name"
                          @input="data.name = data.name.replace(/[^a-zA-Z0-9\s]/g, '')"
                      />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label">Price</label>
                      <div class="input-group">
                        <span class="input-group-text">GHS</span>
                        <input
                            type="number"
                            class="form-control"
                            v-model="data.price"
                            step="0.01"
                            required
                        />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label">Category</label>
                      <select
                          class="form-select"
                          v-model="data.category"
                          required
                      >
                        <option value="" disabled selected>Select Category</option>
                        <option value="Adrenergic">Adrenergic</option>
                        <option value="Alkylating Agent">Alkylating Agent</option>
                        <option value="Analgesic">Analgesic</option>
                        <option value="Anabolic Steroid">Anabolic Steroid</option>
                        <option value="Anesthetic">Anesthetic</option>
                        <option value="Angiotensin Blocker">Angiotensin Blocker</option>
                        <option value="Antacid">Antacid</option>
                        <option value="Anthelmintic">Anthelmintic</option>
                        <option value="Antiandrogen">Antiandrogen</option>
                        <option value="Antianginal">Antianginal</option>
                        <option value="Antiarrhythmic">Antiarrhythmic</option>
                        <option value="Antibiotic">Antibiotic</option>
                        <option value="Anticholinergic">Anticholinergic</option>
                        <option value="Anticoagulant">Anticoagulant</option>
                        <option value="Anticonvulsant">Anticonvulsant</option>
                        <option value="Antidepressant">Antidepressant</option>
                        <option value="Antidiabetic">Antidiabetic</option>
                        <option value="Antidiarrheal">Antidiarrheal</option>
                        <option value="Antidote">Antidote</option>
                        <option value="Antiemetic">Antiemetic</option>
                        <option value="Antifibrinolytic">Antifibrinolytic</option>
                        <option value="Antifungal">Antifungal</option>
                        <option value="Antigout">Antigout</option>
                        <option value="Antiglaucoma">Antiglaucoma</option>
                        <option value="Antihistamine">Antihistamine</option>
                        <option value="Antihypertensive">Antihypertensive</option>
                        <option value="Anti-inflammatory">Anti-inflammatory</option>
                        <option value="Antimalarial">Antimalarial</option>
                        <option value="Antimigraine">Antimigraine</option>
                        <option value="Antineoplastic">Antineoplastic</option>
                        <option value="Antiobesity">Antiobesity</option>
                        <option value="Antiparkinsonian">Antiparkinsonian</option>
                        <option value="Antiparasitic">Antiparasitic</option>
                        <option value="Antiplatelet">Antiplatelet</option>
                        <option value="Antiprotozoal">Antiprotozoal</option>
                        <option value="Antipsychotic">Antipsychotic</option>
                        <option value="Antipyretic">Antipyretic</option>
                        <option value="Antirheumatic">Antirheumatic</option>
                        <option value="Antiseborrheic">Antiseborrheic</option>
                        <option value="Antiseizure">Antiseizure</option>
                        <option value="Antiseptic">Antiseptic</option>
                        <option value="Antispasmodic">Antispasmodic</option>
                        <option value="Antithyroid">Antithyroid</option>
                        <option value="Antituberculosis">Antituberculosis</option>
                        <option value="Antitussive">Antitussive</option>
                        <option value="Antivertigo">Antivertigo</option>
                        <option value="Antiviral">Antiviral</option>
                        <option value="Anxiolytic">Anxiolytic</option>
                        <option value="Beta Blocker">Beta Blocker</option>
                        <option value="Bile Acid Sequestrant">Bile Acid Sequestrant</option>
                        <option value="Biological Therapy">Biological Therapy</option>
                        <option value="Bisphosphonate">Bisphosphonate</option>
                        <option value="Bronchodilator">Bronchodilator</option>
                        <option value="Calcium Channel Blocker">Calcium Channel Blocker</option>
                        <option value="Cardiac Glycoside">Cardiac Glycoside</option>
                        <option value="Cardiovascular">Cardiovascular</option>
                        <option value="Chelating Agent">Chelating Agent</option>
                        <option value="Cholinergic">Cholinergic</option>
                        <option value="Corticosteroid">Corticosteroid</option>
                        <option value="Cough Suppressant">Cough Suppressant</option>
                        <option value="Cycloplegic">Cycloplegic</option>
                        <option value="Decongestant">Decongestant</option>
                        <option value="Dermatological">Dermatological</option>
                        <option value="Diuretic">Diuretic</option>
                        <option value="Dopaminergic">Dopaminergic</option>
                        <option value="Emetic">Emetic</option>
                        <option value="Enzyme Inhibitor">Enzyme Inhibitor</option>
                        <option value="Expectorant">Expectorant</option>
                        <option value="Gastrointestinal">Gastrointestinal</option>
                        <option value="Hormone Therapy">Hormone Therapy</option>
                        <option value="Immunomodulator">Immunomodulator</option>
                        <option value="Immunosuppressant">Immunosuppressant</option>
                        <option value="Laxative">Laxative</option>
                        <option value="Lipid-Lowering">Lipid-Lowering</option>
                        <option value="Local Anesthetic">Local Anesthetic</option>
                        <option value="Miotic">Miotic</option>
                        <option value="Muscle Relaxant">Muscle Relaxant</option>
                        <option value="Narcotic">Narcotic</option>
                        <option value="Neuroprotective">Neuroprotective</option>
                        <option value="NSAID">NSAID</option>
                        <option value="Nutritional Supplement">Nutritional Supplement</option>
                        <option value="Ophthalmic">Ophthalmic</option>
                        <option value="Otic">Otic</option>
                        <option value="Prokinetic">Prokinetic</option>
                        <option value="Proton Pump Inhibitor">Proton Pump Inhibitor</option>
                        <option value="Psychostimulant">Psychostimulant</option>
                        <option value="Sedative">Sedative</option>
                        <option value="Serotonin Modulator">Serotonin Modulator</option>
                        <option value="Stimulant">Stimulant</option>
                        <option value="Steroid">Steroid</option>
                        <option value="Sympathomimetic">Sympathomimetic</option>
                        <option value="Thyroid Hormone">Thyroid Hormone</option>
                        <option value="Tranquilizer">Tranquilizer</option>
                        <option value="Vaccine">Vaccine</option>
                        <option value="Vasoconstrictor">Vasoconstrictor</option>
                        <option value="Vasodilator">Vasodilator</option>
                        <option value="Vitamin">Vitamin</option>
                        <option value="Vulnerary">Vulnerary</option>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label">Quantity in Stock</label>
                      <input
                          type="number"
                          class="form-control"
                          v-model="data.quantity"
                          min="0"
                          required
                      />
                    </div>

                    <div class="col-12">
                      <label class="form-label">Usage Description</label>
                      <textarea
                          class="form-control"
                          v-model="data.use"
                          rows="3"
                          placeholder="Enter medication usage instructions and information"
                          required
                      ></textarea>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Additional Notes</label>
                      <textarea
                          class="form-control"
                          v-model="data.additional_notes"
                          rows="2"
                          placeholder="Enter any storage requirements, warnings, or special instructions"
                      ></textarea>
                    </div>
                  </div>

                  <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-100">
                      <i class="bi bi-plus-circle me-2"></i>
                      Add to Inventory
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
  background-image: url("@/assets/img/Medicine-amico.svg");
  background-position: center;
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

