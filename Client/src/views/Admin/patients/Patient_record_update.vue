<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import useSession from "@/composerbles/useSession.js";
import usePatients from "@/composerbles/usePatients.js";
import {onMounted} from "vue";
import Editor from "@tinymce/tinymce-vue";
import usePatientRecord from "@/composerbles/usePatientRecord.js";

const {userRole} = useSession();
const {record, edit, update_record} = usePatientRecord()


const props = defineProps({
  id: {
    type: String,
    required: true
  }
})

onMounted(() => edit(props.id))

const handleSubmit = () => (
    update_record(props.id)
)

</script>
<template>
  <div class="hospital-dashboard main">
    <div class="d-flex justify-content-center">
      <AdminNavBar/>
      <div class="patient-registration-form container">
        <div class="row justify-content-center">
          <div class="col-md-10">
     <div v-if="record" class="mb-4 p-4 bg-white rounded shadow">
       <h4 class="h5 font-weight-bold mb-3 text-dark">Current Record Data</h4>

       <div v-if="record.nurse_notes" class="mb-3">
         <h5 class="h6 font-weight-medium mb-2 text-primary">Nurse Notes:</h5>
         <div class="border p-3 bg-primary bg-opacity-10 rounded" v-html="record.nurse_notes"></div>
       </div>

       <div v-if="record.doctor_notes" class="mb-3">
         <h5 class="h6 font-weight-medium mb-2 text-success">Doctor Notes:</h5>
         <div class="border p-3 bg-success bg-opacity-10 rounded" v-html="record.doctor_notes"></div>
       </div>

       <div v-if="record.lab_tech_notes" class="mb-3">
         <h5 class="h6 font-weight-medium mb-2 text-purple">Laboratory Notes:</h5>
         <div class="border p-3" style="background-color: #f3e8ff;" v-html="record.lab_tech_notes"></div>
       </div>
     </div>

            <div class="card shadow-lg border-0">
              <div class="card-body">
                <form v-if="record" @submit.prevent="handleSubmit" class="text-center">

                  <!-- Nurse Section -->
                  <div class="nurse-section mb-5">
                    <div v-if="userRole === 'Nurse'"
                         class="section-header bg-info text-white p-2 rounded d-flex align-items-center mt-3 justify-content-center">
                      <i class="bi bi-person-badge me-2"></i>
                      <h5 class="mb-0">Nurse's Section</h5>
                    </div>
                    <div class="section-content p-3 bg-light rounded">
                      <div class="row justify-content-center g-3">
                        <editor
                            v-if="userRole === 'Nurse'"
                            v-model="record.nurse_notes"
                            id="nurse-editor"
                            apiKey="ymk7tbhj4ul5sgm1y5zx7dc6g2qravp7l63cs23wxpvepxoh"
                            :init="editorConfig"
                            @update:modelValue="(value) => record.nurse_notes = value"
                        />

                        <!-- Doctor Section -->
                        <div class="doctor-section">
                          <div v-if="userRole === 'Doctor'"
                               class="section-header bg-success text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                            <i class="bi bi-person-workspace me-2"></i>
                            <h5 class="mb-0">Doctor's Section</h5>
                          </div>
                          <div v-if="userRole === 'Doctor'" class="section-content p-3 bg-light rounded">
                            <editor
                                v-model="record.doctor_notes"
                                id="doctor-editor"
                                apiKey="ymk7tbhj4ul5sgm1y5zx7dc6g2qravp7l63cs23wxpvepxoh"
                                :init="editorConfig"
                                @update:modelValue="(value) => record.doctor_notes = value"
                            />
                          </div>
                        </div>

                        <!-- Pharmacist Section -->
                        <div v-if="userRole == 'Pharmacist'" class="pharmacist-section">
                          <div
                              class="section-header bg-dark text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                            <i class="bi bi-file-medical me-2"></i>
                            <h5 class="mb-0">Pharmacist's Section</h5>
                          </div>
                          <div class="section-content p-3 bg-light rounded">
                            <editor
                                v-model="record.pharmacists_notes"
                                id="pharmacist-editor"
                                apiKey="ymk7tbhj4ul5sgm1y5zx7dc6g2qravp7l63cs23wxpvepxoh"
                                :init="editorConfig"
                                @update:modelValue="(value) => record.pharmacists_notes = value"
                            />
                          </div>
                        </div>

                        <!-- Lab Technician Section -->
                        <div v-if="userRole == 'Lab Technician'" class="lab-tech-section">
                          <div
                              class="section-header bg-dark text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                            <i class="bi bi-file-medical me-2"></i>
                            <h5 class="mb-0">Lab Technician's Section</h5>
                          </div>
                          <div class="section-content p-3 bg-light rounded">
                            <editor
                                v-model="record.lab_tech_notes"
                                id="lab-tech-editor"
                                apiKey="ymk7tbhj4ul5sgm1y5zx7dc6g2qravp7l63cs23wxpvepxoh"
                                :init="editorConfig"
                                @update:modelValue="(value) => record.lab_tech_notes = value"
                            />
                          </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                          <button type="submit" class="btn btn-primary btn-lg">
                            Submit Patient Record
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>

                <!-- Loading state -->
                <div v-else class="text-center py-5">
                  <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <p class="mt-2">Loading patient record...</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.hospital-dashboard {
  min-height: 100vh;
  background-color: #f8f9fa;
}

.section-header {
  margin-bottom: 1rem;
}

.section-content {
  border: 1px solid #dee2e6;
}

/* Ensure proper spacing between sections */
.nurse-section,
.doctor-section,
.pharmacist-section,
.lab-tech-section {
  margin-bottom: 2rem;
}
</style>