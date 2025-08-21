<script setup>
import usePatients from "@/composerbles/usePatients.js";
import { onMounted, ref } from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import UpdatePatientRecord from "@/components/updateUserRole.vue";
import usePatientRecord from "@/composerbles/usePatientRecord.js";

const props = defineProps({
  id: {
    type: String,
    required: true,
  },
});

const { patient_record, list_patients_record } = usePatientRecord();

onMounted(() => list_patients_record(props.id));

const modal = ref(false);
</script>

<template>
  <AdminNavBar />
  <div class="main min-vh-100 bg-light">
    <div id="main">
      <!-- Mobile Navbar Toggle -->
      <header class="mb-3 border-bottom pb-2 px-3 bg-white shadow-sm">
        <a href="#" class="burger-btn d-block d-xl-none text-primary">
          <i class="bi bi-list fs-2"></i>
        </a>
      </header>

      <div class="page-content px-4 py-3">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h2 class="fw-bold mb-1">
              <i class="bi bi-person-vcard me-2 text-primary"></i> Patient Records
            </h2>
            <p class="text-muted">Detailed medical history and examination reports</p>
          </div>
          <RouterLink class="btn btn-primary btn-lg shadow-sm" to="add-record">
            <i class="bi bi-plus-circle me-2"></i>
            Add Record
          </RouterLink>
        </div>

        <!-- Records Section -->
        <div class="records-container">
          <template v-if="patient_record && patient_record.length > 0">
            <div
                v-for="(record, index) in patient_record"
                :key="index"
                class="card shadow-sm border-0 mb-4 rounded-3 overflow-hidden"
            >
              <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                  <i class="bi bi-journal-medical me-2"></i> Record #{{ index + 1 }}
                </h5>
                <span class="badge bg-light text-dark">
                  <i class="bi bi-calendar-event me-1"></i>
                  {{ record.created_at }}
                </span>
              </div>

              <div class="card-body">
                <!-- Vital Signs -->
                <div class="mb-4">
                  <div class="section-header mb-3">
                    <i class="bi bi-activity text-danger me-2"></i>
                    <h5 class="fw-semibold mb-0">Vital Signs</h5>
                  </div>
                  <div class="row g-3">
                    <div
                        v-for="(value, label) in {
                        Temperature: record.temperature,
                        'Pulse Rate': record.pulse_rate,
                        'Respiratory Rate': record.respiratory_rate,
                        'Blood Pressure': record.blood_pressure,
                        Weight: record.weight,
                        'SPO2': record.spo2,
                        'FBS': record.fbs,
                      }"
                        :key="label"
                        class="col-md-6 col-lg-4"
                    >
                      <div class="vital-card p-3 rounded bg-light d-flex align-items-center shadow-sm">
                        <i class="bi bi-heart-pulse-fill text-primary fs-5 me-3"></i>
                        <div>
                          <p class="mb-0 fw-bold">{{ label }}</p>
                          <small class="text-muted">{{ value }}</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p
                      v-if="record.nurse_additional_notes"
                      class="mt-3 text-muted fst-italic"
                  >
                    <i class="bi bi-pencil-square me-2"></i>
                    {{ record.nurse_additional_notes }}
                  </p>
                </div>

                <hr />

                <!-- Doctor's Assessment -->
                <div v-if="record.doctor_notes" class="mb-4">
                  <div class="section-header mb-3">
                    <i class="bi bi-file-medical text-success me-2"></i>
                    <h5 class="fw-semibold mb-0">Doctor's Assessment</h5>
                  </div>
                  <div class="p-3 bg-light rounded shadow-sm">
                    <p><strong>History:</strong> {{ record.history }}</p>
                    <p><strong>Examination:</strong> {{ record.examination_findings }}</p>
                    <p><strong>Diagnosis:</strong> {{ record.diagnosis }}</p>
                    <p><strong>Investigation:</strong> {{ record.investigations }}</p>
                    <p><strong>Treatment:</strong> {{ record.treatment }}</p>
                    <p v-if="record.doctor_additional_notes">
                      <strong>Additional Notes:</strong> {{ record.doctor_additional_notes }}
                    </p>
                  </div>
                </div>

                <!-- Pharmacist Notes -->
                <div v-if="record.medication_notes" class="mb-4">
                  <div class="section-header mb-3">
                    <i class="bi bi-capsule-pill text-info me-2"></i>
                    <h5 class="fw-semibold mb-0">Pharmacist Notes</h5>
                  </div>
                  <div class="p-3 bg-light rounded shadow-sm">
                    <p><strong>Medication:</strong> {{ record.medication_notes }}</p>
                    <p><strong>Prescription:</strong> {{ record.prescription_notes }}</p>
                    <p v-if="record.pharmacist_additional_notes">
                      <strong>Additional Notes:</strong> {{ record.pharmacist_additional_notes }}
                    </p>
                  </div>
                </div>

                <!-- Action Button -->
                <div class="d-flex justify-content-end">
                  <router-link
                      :to="{ name: 'patient.record_update', params: { id: record.id } }"
                  >
                    <button class="btn btn-outline-primary">
                      <i class="bi bi-pencil-square me-2"></i> Update Record
                    </button>
                  </router-link>
                </div>
              </div>
            </div>
          </template>

          <!-- Empty State -->
          <div v-else class="card shadow-sm border-0 text-center p-5">
            <i class="bi bi-clipboard-x text-muted fs-1"></i>
            <h5 class="mt-3">No Records Found</h5>
            <p class="text-muted">This patient has no medical records yet.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.section-header {
  display: flex;
  align-items: center;
  font-size: 1.1rem;
  border-left: 4px solid var(--bs-primary);
  padding-left: 0.75rem;
}

.records-container {
  max-width: 1100px;
  margin: 0 auto;
}

.card {
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
}

.vital-card {
  background: var(--bs-light);
  border: 1px solid var(--bs-gray-200);
  transition: transform 0.2s ease, background 0.2s ease;
}
.vital-card:hover {
  transform: scale(1.03);
  background: var(--bs-white);
}

.empty-state {
  opacity: 0.9;
  animation: fadeIn 0.6s ease-in-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

</style>
