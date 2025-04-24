<script setup>
import usePatients from "@/composerbles/usePatients.js";
import {onMounted, ref} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import UpdatePatientRecord from "@/components/updatePatientRecord.vue";

const props = defineProps({
  id: {
    type: String,
    required: true
  }
});

const { patient_record, list_patients_record } = usePatients();

onMounted(() => list_patients_record(props.id));

const modal = ref(false);
</script>

<template>
  <AdminNavBar />
  <div class="main min-vh-100 bg-light">
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-content px-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h3 class="mb-2">Patient Records</h3>
            <p class="text-muted">Medical history and examination details</p>
          </div>
          <RouterLink class="btn btn-primary" to="add-record">
            <i class="bi bi-plus-circle me-2"></i>
            Add New Record
          </RouterLink>
        </div>

        <!-- Records Display -->
        <div class="records-container">
          <template v-if="patient_record && patient_record.length > 0">
            <div v-for="(record, index) in patient_record" :key="index" class="card shadow-sm mb-4">
              <div class="card-body">
                <!-- Section Title -->
                <div class="d-flex align-items-center mb-4 gap-3">
                  <i class="bi bi-journal-medical text-primary fs-3 me-2"></i>
                  <h4 class="mb-0">Medical Record #{{ index + 1 }} </h4>
                  <p>{{record.created_at}}</p>
                </div>

                <!-- Vitals Section -->
                <div class="section-container">
                  <div class="section-header">
                    <i class="bi bi-activity text-primary me-2"></i>
                    <h5 class="mb-0">Vital Signs</h5>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-thermometer-half text-primary"></i>
                        <div>
                          <small class="text-muted">Temperature</small>
                          <p class="mb-0 fw-bold">{{ record.temperature }}°C </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-heart-pulse text-primary"></i>
                        <div>
                          <small class="text-muted">Pulse Rate</small>
                          <p class="mb-0 fw-bold">{{ record.pulse_rate }} bpm</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-lungs text-primary"></i>
                        <div>
                          <small class="text-muted">Respiratory Rate</small>
                          <p class="mb-0 fw-bold">{{ record.respiratory_rate }}  breaths/min </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-activity text-primary"></i>
                        <div>
                          <small class="text-muted">Blood Pressure</small>
                          <p class="mb-0 fw-bold">{{ record.blood_pressure }} mmHg</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-person text-primary"></i>
                        <div>
                          <small class="text-muted">Weight</small>
                          <p class="mb-0 fw-bold">{{ record.weight }} Kg</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-droplet text-primary"></i>
                        <div>
                          <small class="text-muted">Blood Sugar</small>
                          <p class="mb-0 fw-bold">{{ record.blood_and_sugar_rate }} mg/dL</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="my-4" />
                <!-- Doctor's Assessment -->
                <div class="section-container" v-if="record.history">
                  <div class="section-header gap-3">
                    <i class="bi bi-file-medical text-primary me-2"></i>
                    <h5 class="mb-0">Doctor's Assessment</h5>
                    <i>Assessed by {{record.first_name}} {{record.other_name}} {{record.last_name}} </i>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-journal-medical text-primary"></i>
                        <div>
                          <small class="text-muted mb-2">History of Complaints</small>
                          <p>{{ record.history }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-search-heart text-primary"></i>
                        <div>
                          <small class="text-muted mb-2">Examination Findings</small>
                          <p>{{ record.examination_findings }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-clipboard2-pulse text-primary"></i>
                        <div>
                          <small class="text-muted mb-2">Diagnosis</small>
                          <p>{{ record.diagnosis }}</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-card-checklist text-primary"></i>
                        <div>
                          <small class="text-muted mb-2">Investigation/Labs</small>
                          <p>{{ record.labs }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-capsule text-primary"></i>
                        <div>
                          <small class="text-muted mb-2">Treatment</small>
                          <p>{{ record.treatment }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="vital-card">
                        <i class="bi bi-chat-square-text text-primary"></i>
                        <div>
                          <small class="text-muted mb-2">Additional Notes</small>
                          <p>{{ record.additional_notes }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="my-4" v-if="record.admitted">

                <!-- Admission Details -->
                <div v-if="record.admitted" class="section-container">
                  <div class="section-header">
                    <i class="bi bi-hospital text-primary me-2"></i>
                    <h5 class="mb-0">Admission Details</h5>
                  </div>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                          <small class="text-muted">Status</small>
                          <p class="mb-0 fw-bold">Admitted</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-door-open text-primary"></i>
                        <div>
                          <small class="text-muted">Ward Number</small>
                          <p class="mb-0 fw-bold">{{ record.ward_number }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="my-4">

                <!-- Laboratory Results -->
                <div class="section-container" v-if="record.lab1">
                  <div class="section-header">
                    <i class="bi bi-flask text-primary me-2"></i>
                    <h5 class="mb-0">Laboratory Results</h5>
                  </div>
                  <div class="row g-3">
                    <div v-if="record.lab1" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab1 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab1_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab2" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab2 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab2_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab3" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab3 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab3_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab4" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab4 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab4_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab5" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab5 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab5_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab6" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab6 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab6_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab7" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab7 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab7_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab8" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab8 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab8_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab9" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab9 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab9_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div v-if="record.lab10" class="col-md-6">
                      <div class="vital-card">
                        <i class="bi bi-flask-fill text-primary"></i>
                        <div>
                          <small class="text-muted">{{ record.lab10 }}</small>
                          <p class="mb-0 fw-bold">
                            <embed class="pdf" :src="record.lab10_results" width="800" height="500" />
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <router-link :to="{ name: 'patient.record_update', params: { id: record.id } }">
                <div class="flex col-6 float-start">
                  <Button class="btn btn-primary" @click="modal = true">
                <i class="bi bi-plus-circle"></i>
                Additional Records</Button>
              </div>
              </router-link>
            </div>

          </template>

          <!-- Empty State -->
          <div v-else class="card shadow-sm">
            <div class="card-body text-center py-5">
              <i class="bi bi-clipboard-x text-muted fs-1"></i>
              <h5 class="mt-3">No Records Found</h5>
              <p class="text-muted">No medical records are available for this patient.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card {
  transition: transform 0.2s ease-in-out;
  border: none;
}

.card:hover {
  transform: translateY(-2px);
}

.section-container {
  padding: 1rem 0;
}

.section-header {
  display: flex;
  align-items: center;
  margin-bottom: 1.5rem;
}

.vital-card, .lab-card {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  padding: 1rem;
  background-color: #f8f9fa;
  border-radius: 0.5rem;
  height: 100%;
}

.vital-card i, .lab-card i {
  font-size: 1.2rem;
}

.assessment-item {
  margin-bottom: 1.5rem;
}

.assessment-item:last-child {
  margin-bottom: 0;
}

hr {
  opacity: 0.15;
}

.fs-3 {
  font-size: 1.75rem !important;
}

.records-container {
  max-width: 1200px;
  margin: 0 auto;
}
</style>