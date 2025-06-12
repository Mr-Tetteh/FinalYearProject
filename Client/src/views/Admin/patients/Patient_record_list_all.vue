<script setup>
import usePatients from "@/composerbles/usePatients.js";
import {onMounted, ref} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import UpdatePatientRecord from "@/components/updateUserRole.vue";
import usePatientRecord from "@/composerbles/usePatientRecord.js";

const props = defineProps({
  id: {
    type: String,
    required: true
  }
});

const {patient_record, list_patients_record} = usePatientRecord();

onMounted(() => list_patients_record(props.id));

const modal = ref(false);
</script>

<template>
  <AdminNavBar/>
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
                  <p>{{ record.created_at }}</p>
                </div>
                <!-- Vitals Section -->
                <div class="section-container">
                  <div class="section-header">
                    <i class="bi bi-activity text-primary me-2"></i>
                    <h5 class="mb-0">Vital Signs</h5>
                  </div>
                  <div class="row g-3">
                    <div class="col-12">
                      <div class="vital-card w-100">
                        <div class="w-100">
                          <p class="mb-0 fw-bold" v-html="record.nurse_notes"></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="my-4"/>
                <!-- Doctor's Assessment -->
                <div class="section-container" v-if="record.doctor_notes">
                  <div class="section-header gap-3">
                    <i class="bi bi-file-medical text-primary me-2"></i>
                    <h5 class="mb-0">Doctor's Assessment</h5>
                    <i>Assessed by {{ record.first_name }} {{ record.other_name }} {{ record.last_name }} </i>
                  </div>
                  <div class="row g-3" v-if="record.doctor_notes">
                    <div class="row g-3">
                      <div class="col-12">
                        <div class="vital-card w-100">
                          <div class="w-100">
                            <p class="mb-0 fw-bold" v-html="record.doctor_notes"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <hr class="my-4" v-if="record.lab_tech_notes">
                <!-- Laboratory Results -->
                <div class="section-header gap-3" v-if="record.lab_tech_notes">
                  <i class="bi bi-file-medical text-primary me-2"></i>
                  <h5 class="mb-0">Lab Tech</h5>
                </div>
                <div class="row g-3" v-if="record.lab_tech_notes">
                  <div class="row g-3">
                    <div class="col-12">
                      <div class="vital-card w-100">
                        <div class="w-100">
                          <p class="mb-0 fw-bold" v-html="record.lab_tech_notes"></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-4" v-if="record.pharmacists_notes">
              <!-- Laboratory Results -->
              <div class="section-header gap-3" v-if="record.pharmacists_notes">
                <i class="bi bi-file-medical text-primary me-2"></i>
                <h5 class="mb-0">Pharmacist Notes</h5>
              </div>
              <div class="row g-3" v-if="record.pharmacists_notes">
                <div class="row g-3">
                  <div class="col-12">
                    <div class="vital-card w-100">
                      <div class="w-100">
                        <p class="mb-0 fw-bold" v-html="record.pharmacists_notes"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <router-link :to="{ name: 'patient.record_update', params: { id: record.id } }">
                <div class="flex col-6 float-start">
                  <Button class="btn btn-primary" @click="modal = true">
                    <i class="bi bi-plus-circle"></i>
                    Additional Records
                  </Button>
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