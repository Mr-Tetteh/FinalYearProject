<script setup lang="ts">
import usePayments from "@/composables/usePayments.js";
import {onMounted, computed} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";

const {
  fetch_AllHospitalPayments,
  HospitalPaymentRecord
} = usePayments();

onMounted(() => {
  fetch_AllHospitalPayments()
});

// Split payments by type
const consultationPayments = computed(() =>
    HospitalPaymentRecord.value.filter(p => p.reasonForPayment === "Consultation")
);
const labsPayment = computed(() =>
    HospitalPaymentRecord.value.filter(p => p.reasonForPayment === "Labs")
);
const drugsPayment = computed(() =>
    HospitalPaymentRecord.value.filter(p => p.reasonForPayment === "Drugs")
);

// Totals
const totalConsultationPrice = computed(() =>
    consultationPayments.value.reduce((sum, c) => sum + Number(c.consultationAmount || 0), 0)
);
const totalLabPrice = computed(() =>
    labsPayment.value.reduce((sum, l) => sum + Number(l.totalLabAmount || 0), 0)
);
const totalDrugsPrice = computed(() =>
    drugsPayment.value.reduce((sum, d) => sum + Number(d.totalDrugAmount || 0), 0)
);
</script>

<template>
  <AdminNavBar/>
  <main class="min-vh-100">
    <div id="main">

      <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary mb-2">Hospital Payments Dashboard</h1>
        <p class="lead text-muted">Real-time overview of all payment transactions</p>
      </div>
      <!-- Payment Tables Grid -->
      <div class="row g-4 mb-5">
        <!-- Consultation Payments -->
        <div class="col-xl-4 col-lg-12">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-gradient-primary text-white py-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-user-md me-2"></i>
                <h5 class="mb-0 fw-bold">Consultation Payments</h5>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive" style="max-height: 400px;">
                <table class="table table-hover mb-0">
                  <thead class="bg-light sticky-top">
                  <tr>
                    <th class="py-3 px-4 fw-semibold text-dark border-0">#</th>
                    <th class="py-3 px-4 fw-semibold text-dark border-0">Amount Paid</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(consult, index) in consultationPayments" :key="consult.id" class="border-0">
                    <td class="py-3 px-4 text-muted">{{ index + 1 }}</td>
                    <td class="py-3 px-4 fw-bold text-success">GHC
                      {{ Number(consult.consultationAmount || 0).toLocaleString() }}
                    </td>
                  </tr>
                  <tr v-if="consultationPayments.length === 0">
                    <td colspan="2" class="text-center text-muted py-5">
                      <i class="fas fa-inbox fa-2x mb-2"></i>
                      <p class="mb-0">No consultation payments found</p>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-footer bg-primary bg-opacity-10 border-0">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="text-muted">Total Amount:</span>
                  <strong class="h5 mb-0 text-primary">GHC {{ totalConsultationPrice.toLocaleString() }}</strong>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Lab Payments -->
        <div class="col-xl-4 col-lg-12">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-gradient-success text-white py-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-flask me-2"></i>
                <h5 class="mb-0 fw-bold">Laboratory Payments</h5>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive" style="max-height: 400px;">
                <table class="table table-hover mb-0">
                  <thead class="bg-light sticky-top">
                  <tr>
                    <th class="py-3 px-4 fw-semibold text-dark border-0">Lab Tests</th>
                    <th class="py-3 px-4 fw-semibold text-dark border-0">Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="lab in labsPayment" :key="lab.id" class="border-0">
                    <td class="py-3 px-4">
                      <div class="d-flex flex-wrap gap-1">
                        <span
                            v-for="labName in JSON.parse(lab.labNames || '[]')"
                            :key="labName"
                            class="badge bg-success bg-opacity-10 text-success"
                        >
                          {{ labName }}
                        </span>
                        <span v-if="JSON.parse(lab.labNames || '[]').length === 0" class="text-muted">—</span>
                      </div>
                    </td>
                    <td class="py-3 px-4 fw-bold text-success">GHC {{
                        Number(lab.totalLabAmount || 0).toLocaleString()
                      }}
                    </td>
                  </tr>
                  <tr v-if="labsPayment.length === 0">
                    <td colspan="2" class="text-center text-muted py-5">
                      <i class="fas fa-inbox fa-2x mb-2"></i>
                      <p class="mb-0">No laboratory payments found</p>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-footer bg-success bg-opacity-10 border-0">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="text-muted">Total Amount:</span>
                  <strong class="h5 mb-0 text-success">GHC {{ totalLabPrice.toLocaleString() }}</strong>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Drug Payments -->
        <div class="col-xl-4 col-lg-12">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-gradient-danger text-white py-3">
              <div class="d-flex align-items-center">
                <i class="fas fa-pills me-2"></i>
                <h5 class="mb-0 fw-bold">Pharmacy Payments</h5>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive" style="max-height: 400px;">
                <table class="table table-hover mb-0">
                  <thead class="bg-light sticky-top">
                  <tr>
                    <th class="py-3 px-4 fw-semibold text-dark border-0">Medications</th>
                    <th class="py-3 px-4 fw-semibold text-dark border-0">Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="drug in drugsPayment" :key="drug.id" class="border-0">
                    <td class="py-3 px-4">
                      <div class="d-flex flex-wrap gap-1">
                        <span
                            v-for="drugName in JSON.parse(drug.drugNames || '[]')"
                            :key="drugName"
                            class="badge bg-danger bg-opacity-10 text-danger"
                        >
                          {{ drugName }}
                        </span>
                        <span v-if="JSON.parse(drug.drugNames || '[]').length === 0" class="text-muted">—</span>
                      </div>
                    </td>
                    <td class="py-3 px-4 fw-bold text-success">GHC {{
                        Number(drug.totalDrugAmount || 0).toLocaleString()
                      }}
                    </td>
                  </tr>
                  <tr v-if="drugsPayment.length === 0">
                    <td colspan="2" class="text-center text-muted py-5">
                      <i class="fas fa-inbox fa-2x mb-2"></i>
                      <p class="mb-0">No pharmacy payments found</p>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-footer bg-danger bg-opacity-10 border-0">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="text-muted">Total Amount:</span>
                  <strong class="h5 mb-0 text-danger">GHC {{ totalDrugsPrice.toLocaleString() }}</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Overall Total Summary -->
      <div class="row">
        <div class="col-12">
          <div class="card border-0 shadow-lg">
            <div class="card-body text-center py-4">
              <div class="row align-items-center">
                <div class="col-md-8">
                  <h2 class="display-6 fw-bold text-primary mb-0">
                    <i class="fas fa-chart-line me-2"></i>
                    Total Revenue Generated
                  </h2>
                  <p class="text-muted mb-0">Combined revenue from all payment channels</p>
                </div>
                <div class="col-md-4">
                  <div class="bg-primary bg-gradient rounded-3 p-3 text-white">
                    <h1 class="display-4 fw-bold mb-0">
                      GHC {{ (totalLabPrice + totalConsultationPrice + totalDrugsPrice).toLocaleString() }}
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style scoped>
.bg-gradient-primary {
  background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
}

.bg-gradient-success {
  background: linear-gradient(135deg, #198754 0%, #146c43 100%);
}

.bg-gradient-danger {
  background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);
}

.card {
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.card:hover {
  transform: translateY(-2px);
  box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.1) !important;
}

.table-responsive::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}

.table-responsive::-webkit-scrollbar-track {
  background: #f1f3f4;
  border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb {
  background: #c1c8cd;
  border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
  background: #a8b3ba;
}

.badge {
  font-size: 0.75rem;
  padding: 0.375rem 0.75rem;
}

@media (max-width: 1199.98px) {
  .col-xl-4 {
    margin-bottom: 1.5rem;
  }
}
</style>