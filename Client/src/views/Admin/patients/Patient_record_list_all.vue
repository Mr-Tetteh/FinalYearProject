<script setup>
import usePatients from "@/composerbles/usePatients.js";
import {onMounted, ref} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import UpdatePatientRecord from "@/components/updateUserRole.vue";
import usePatientRecord from "@/composerbles/usePatientRecord.js";
import useSession from "@/composerbles/useSession.js";

const API_URL = import.meta.env.VITE_API;

const props = defineProps({
  id: {
    type: String,
    required: true,
  },
});

const {patient_record, list_patients_record, lab, list_lab_report} = usePatientRecord();
const {userRole} = useSession()

onMounted(async () => {
  await list_patients_record(props.id);

  if (patient_record.value && patient_record.value.length > 0) {
    for (let rec of patient_record.value) {
      await list_lab_report(props.id, rec);
    }
  }
});


const modal = ref(false);
</script>

<template>
  <AdminNavBar/>
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

                <hr/>

                <!-- Doctor's Assessment -->
                <div class="bg-light py-4">
                  <div class="container">
                    <!-- Enhanced Medical Record Component -->
                    <div v-if="record.history" class="medical-record-card fade-in mb-4">
                      <div class="status-badge">
                        <i class="bi bi-check-circle me-1"></i>
                        Completed
                      </div>

                      <div class="section-header">
                        <h5 class="section-title">
                          <div class="header-icon">
                            <i class="bi bi-file-medical"></i>
                          </div>
                          Doctor's Assessment
                        </h5>
                      </div>

                      <div class="medical-content">
                        <div class="medical-field">
                          <div class="field-label">
                            <i class="bi bi-clock-history field-icon"></i>
                            Patient History
                          </div>
                          <p class="field-content">{{ record.history }}</p>
                        </div>

                        <div class="medical-field">
                          <div class="field-label">
                            <i class="bi bi-search field-icon"></i>
                            Physical Examination
                          </div>
                          <p class="field-content">{{ record.examination_findings }}</p>
                        </div>

                        <div class="medical-field">
                          <div class="field-label">
                            <i class="bi bi-clipboard-check field-icon"></i>
                            Clinical Diagnosis
                          </div>
                          <p class="field-content">{{ record.diagnosis }}</p>
                        </div>

                        <div class="medical-field">
                          <div class="field-label">
                            <i class="bi bi-graph-up field-icon"></i>
                            Investigations Ordered
                          </div>
                          <p class="field-content">{{ record.investigations }}</p>
                        </div>

                        <div class="medical-field">
                          <div class="field-label">
                            <i class="bi bi-heart-pulse field-icon"></i>
                            Treatment Plan
                          </div>
                          <p class="field-content">{{ record.treatment }}</p>
                        </div>

                        <div v-if="record.doctor_additional_notes" class="medical-field additional-notes">
                          <div class="field-label">
                            <i class="bi bi-chat-square-text field-icon"></i>
                            Additional Clinical Notes
                          </div>
                          <p class="field-content">{{ record.doctor_additional_notes }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pharmacist Notes -->
                <div class="bg-light py-4">
                  <div class="container">
                    <!-- Enhanced Pharmacist Notes Component -->
                    <div v-if="record.medication_notes" class="pharmacist-record-card fade-in mb-4">
                      <div class="status-badge">
                        <i class="bi bi-check2-circle me-1"></i>
                        Reviewed
                      </div>

                      <div class="section-header">
                        <h5 class="section-title">
                          <div class="header-icon pill-animation">
                            <i class="bi bi-capsule-pill"></i>
                          </div>
                          Pharmacist Notes & Medication Review
                        </h5>
                      </div>

                      <div class="pharmacist-content">
                        <div class="medication-field medication-notes">
                          <div class="field-label">
                            <i class="bi bi-capsule field-icon"></i>
                            Medication Information
                          </div>
                          <p class="field-content">{{ record.medication_notes }}</p>
                        </div>

                        <div class="medication-field prescription-notes">
                          <div class="field-label">
                            <span class="rx-symbol">℞</span>
                            Prescription Details
                          </div>
                          <p class="field-content">{{ record.prescription_notes }}</p>
                        </div>

                        <div v-if="record.pharmacist_additional_notes" class="medication-field additional-notes">
                          <div class="field-label">
                            <i class="bi bi-clipboard2-check field-icon"></i>
                            Pharmacist Additional Notes
                          </div>
                          <p class="field-content">{{ record.pharmacist_additional_notes }}</p>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>


                <div class="bg-light py-4" v-if="lab">
                  <div class="container">
                    <div class="pharmacist-record-card fade-in mb-4">
                      <div class="section-header">
                        <h5 class="section-title">
                          <div class="header-icon pill-animation">
                            <i class="bi bi-capsule-pill"></i>
                          </div>
                          Lab Reports
                        </h5>
                      </div>
                      <div  class="pharmacist-content" v-for="report in lab" :key="report.id">
                        <div class="medication-field medication-notes">
                          <div class="field-label">
                            <i class="bi bi-flask field-icon"></i>
                            Lab Name
                          </div>
                          <p class="field-content">{{ report.lab_name }}</p>
                        </div>
                        <div class="medication-field prescription-notes">
                          <div class="field-label">
                            <span class="rx-symbol">℞</span>
                            Laboratory Report
                          </div>
                          <iframe :src="report.lab_report" width="100%" height="500px"></iframe>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <!-- Action Button -->
                <div class="d-flex justify-content-end">
                  <router-link
                      v-if="userRole !== 'Lab Technician'"
                      :to="{ name: 'patient.record_update', params: { id: record.id } }"
                  >
                    <button class="btn btn-outline-primary">
                      <i class="bi bi-pencil-square me-2"></i> Update Record
                    </button>
                  </router-link>
                  <router-link
                      v-if="userRole === 'Lab Technician'"
                      :to="{ name: 'lab.report', params: { id: record.id, patient: record.patient_id } }"
                  >
                    <button class="btn btn-outline-primary">
                      <i class="bi bi-pencil-square me-2"></i> Add Lab Report
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
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.medical-record-card {
  border: 1px solid #e3f2fd;
  border-radius: 12px;
  background: linear-gradient(145deg, #ffffff 0%, #f8fdff 100%);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.medical-record-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #28a745, #20c997, #17a2b8);
}

.medical-record-card:hover {
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
  transform: translateY(-2px);
}

.section-header {
  background: linear-gradient(135deg, #e8f5e8 0%, #f0f9ff 100%);
  border-radius: 8px;
  padding: 16px 20px;
  border-left: 4px solid #28a745;
  position: relative;
}

.section-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, #28a745, transparent);
}

.section-title {
  color: #2d5a3d;
  font-weight: 600;
  margin: 0;
  display: flex;
  align-items: center;
  font-size: 1.1rem;
}

.header-icon {
  background: #28a745;
  color: white;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 12px;
  box-shadow: 0 2px 6px rgba(40, 167, 69, 0.3);
}

.medical-content {
  padding: 24px;
  background: #ffffff;
}

.medical-field {
  margin-bottom: 18px;
  padding: 16px;
  border-radius: 8px;
  background: #f8f9fa;
  border-left: 3px solid transparent;
  transition: all 0.2s ease;
  position: relative;
}

.medical-field:hover {
  background: #f0f8f0;
  border-left-color: #28a745;
  box-shadow: 0 2px 8px rgba(40, 167, 69, 0.1);
}

.field-label {
  color: #495057;
  font-weight: 600;
  font-size: 0.9rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 6px;
  display: flex;
  align-items: center;
}

.field-content {
  color: #212529;
  font-size: 0.95rem;
  line-height: 1.6;
  margin: 0;
}

.field-icon {
  width: 16px;
  height: 16px;
  margin-right: 8px;
  color: #28a745;
}

.additional-notes {
  background: linear-gradient(135deg, #fff3cd 0%, #fef7e0 100%);
  border: 1px solid #ffeaa7;
  border-radius: 8px;
  position: relative;
}

.additional-notes::before {
  content: '💡';
  position: absolute;
  top: -8px;
  left: 16px;
  background: #fff3cd;
  padding: 0 8px;
  font-size: 0.9rem;
}

.status-badge {
  position: absolute;
  top: 16px;
  right: 16px;
  background: #28a745;
  color: white;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 500;
}

@media (max-width: 768px) {
  .medical-content {
    padding: 16px;
  }

  .section-header {
    padding: 12px 16px;
  }

  .section-title {
    font-size: 1rem;
  }
}

.fade-in {
  animation: fadeIn 0.6s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.pharmacist-record-card {
  border: 1px solid #e1f5fe;
  border-radius: 12px;
  background: linear-gradient(145deg, #ffffff 0%, #f0feff 100%);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.pharmacist-record-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #17a2b8, #20c997, #6f42c1);
}

.pharmacist-record-card:hover {
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
  transform: translateY(-2px);
}

.section-header {
  background: linear-gradient(135deg, #e8f4fd 0%, #f0f9ff 100%);
  border-radius: 8px;
  padding: 16px 20px;
  border-left: 4px solid #17a2b8;
  position: relative;
}

.section-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, #17a2b8, transparent);
}

.section-title {
  color: #2d4a5a;
  font-weight: 600;
  margin: 0;
  display: flex;
  align-items: center;
  font-size: 1.1rem;
}

.header-icon {
  background: #17a2b8;
  color: white;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 12px;
  box-shadow: 0 2px 6px rgba(23, 162, 184, 0.3);
}

.pharmacist-content {
  padding: 24px;
  background: #ffffff;
}

.medication-field {
  margin-bottom: 18px;
  padding: 16px;
  border-radius: 8px;
  background: #f8f9fa;
  border-left: 3px solid transparent;
  transition: all 0.2s ease;
  position: relative;
}

.medication-field:hover {
  background: #f0f9ff;
  border-left-color: #17a2b8;
  box-shadow: 0 2px 8px rgba(23, 162, 184, 0.1);
}

.field-label {
  color: #495057;
  font-weight: 600;
  font-size: 0.9rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 6px;
  display: flex;
  align-items: center;
}

.field-content {
  color: #212529;
  font-size: 0.95rem;
  line-height: 1.6;
  margin: 0;
}

.field-icon {
  width: 16px;
  height: 16px;
  margin-right: 8px;
  color: #17a2b8;
}

.medication-notes {
  background: linear-gradient(135deg, #e3f2fd 0%, #f0f9ff 100%);
  border: 1px solid #90caf9;
}

.prescription-notes {
  background: linear-gradient(135deg, #f3e5f5 0%, #fce4ec 100%);
  border: 1px solid #ce93d8;
}

.prescription-notes:hover {
  background: #fce4ec;
  border-left-color: #9c27b0;
}

.prescription-notes .field-icon {
  color: #9c27b0;
}

.additional-notes {
  background: linear-gradient(135deg, #fff3e0 0%, #fef7e0 100%);
  border: 1px solid #ffcc02;
  border-radius: 8px;
  position: relative;
}

.additional-notes::before {
  content: '⚠️';
  position: absolute;
  top: -8px;
  left: 16px;
  background: #fff3e0;
  padding: 0 8px;
  font-size: 0.9rem;
}

.status-badge {
  position: absolute;
  top: 16px;
  right: 16px;
  background: #17a2b8;
  color: white;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 500;
}

.dosage-highlight {
  background: linear-gradient(135deg, #e8f5e8 0%, #f0fff4 100%);
  border: 1px solid #81c784;
  border-radius: 6px;
  padding: 8px 12px;
  margin: 8px 0;
  font-family: 'Courier New', monospace;
  font-weight: 500;
}

.warning-box {
  background: linear-gradient(135deg, #ffebee 0%, #fef5e7 100%);
  border: 1px solid #ef5350;
  border-radius: 6px;
  padding: 10px 12px;
  margin: 8px 0;
  border-left: 4px solid #f44336;
}

.warning-box::before {
  content: '⚠️ ';
  color: #f44336;
  font-weight: bold;
}

@media (max-width: 768px) {
  .pharmacist-content {
    padding: 16px;
  }

  .section-header {
    padding: 12px 16px;
  }

  .section-title {
    font-size: 1rem;
  }
}

.fade-in {
  animation: fadeIn 0.6s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.pill-animation {
  animation: pillBounce 2s ease-in-out infinite;
}

@keyframes pillBounce {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
  }
  25% {
    transform: translateY(-2px) rotate(1deg);
  }
  75% {
    transform: translateY(-1px) rotate(-1deg);
  }
}

.rx-symbol {
  font-family: 'Times New Roman', serif;
  font-weight: bold;
  font-size: 1.2rem;
  color: #17a2b8;
  margin-right: 8px;
}

</style>
