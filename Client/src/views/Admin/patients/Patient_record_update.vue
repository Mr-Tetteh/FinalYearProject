<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import useSession from "@/composables/useSession.js";
import usePatients from "@/composables/usePatients.js";
import {onMounted} from "vue";
import Editor from "@tinymce/tinymce-vue";
import usePatientRecord from "@/composables/usePatientRecord.js";

const {userRole} = useSession();
const {input, edit, update_record} = usePatientRecord()


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
            <!--     <div v-if="input"class="mb-4 p-4 bg-white rounded shadow">
                   <h4 class="h5 font-weight-bold mb-3 text-dark">Current Record Data</h4>

                   <div v-if="input.nurse_notes" class="mb-3">
                     <h5 class="h6 font-weight-medium mb-2 text-primary">Nurse Notes:</h5>
                     <div class="border p-3 bg-primary bg-opacity-10 rounded" v-html="input.nurse_notes"></div>
                   </div>

                   <div v-if="input.doctor_notes" class="mb-3">
                     <h5 class="h6 font-weight-medium mb-2 text-success">Doctor Notes:</h5>
                     <div class="border p-3 bg-success bg-opacity-10 rounded" v-html="input.doctor_notes"></div>
                   </div>

                   <div v-if="input.lab_tech_notes" class="mb-3">
                     <h5 class="h6 font-weight-medium mb-2 text-purple">Laboratory Notes:</h5>
                     <div class="border p-3" style="background-color: #f3e8ff;" v-html="input.lab_tech_notes"></div>
                   </div>
                 </div>-->

            <div class="card shadow-lg border-0">
              <div class="card-body">
                <form v-if="input" @submit.prevent="handleSubmit" class="text-center">

                  <!-- Nurse Section -->
                  <div class="nurse-section mb-5">
                    <div v-if="userRole === 'Nurse'"
                         class="section-header bg-info text-white p-2 rounded d-flex align-items-center mt-3 justify-content-center">
                      <i class="bi bi-person-badge me-2"></i>
                      <h5 class="mb-0">Nurse's Section</h5>
                    </div>
                    <div class="section-content p-3 bg-light rounded">
                      <div class="row justify-content-center g-3">
                        <div v-if="userRole === 'Nurse'" class="vitals-section mb-5">
                          <div class="section-title-wrapper text-center mb-4">
                            <div
                                class="section-title-icon bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                              <i class="bi bi-heart-pulse-fill fs-3"></i>
                            </div>
                            <h4 class="section-title text-dark fw-bold mb-2">Primary Vital Signs</h4>
                            <div class="title-underline mx-auto"></div>
                          </div>

                          <div class="row g-4">
                            <!-- Temperature -->
                            <div class="col-12 col-md-6 col-lg-4">
                              <div class="vital-card h-100">
                                <div class="vital-icon bg-danger-soft">
                                  <i class="bi bi-thermometer-half text-danger"></i>
                                </div>
                                <label class="vital-label">Temperature</label>
                                <div class="input-wrapper">
                                  <input
                                      type="text"
                                      class="form-control vital-input"
                                      placeholder="36.5°C"
                                      v-model="input.temperature"
                                      :disabled="userRole !== 'Nurse'"
                                      @input="input.temperature = input.temperature.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                  >
                                </div>
                              </div>
                            </div>

                            <!-- Pulse Rate -->
                            <div class="col-12 col-md-6 col-lg-4">
                              <div class="vital-card h-100">
                                <div class="vital-icon bg-pink-soft">
                                  <i class="bi bi-heart-pulse-fill text-pink"></i>
                                </div>
                                <label class="vital-label">Pulse Rate</label>
                                <div class="input-wrapper">
                                  <input
                                      type="text"
                                      class="form-control vital-input"
                                      placeholder="72 bpm"
                                      v-model="input.pulse_rate"
                                      @input="input.pulse_rate = input.pulse_rate.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                      :disabled="userRole !== 'Nurse'"
                                  >
                                </div>
                              </div>
                            </div>

                            <!-- Respiratory Rate -->
                            <div class="col-12 col-md-6 col-lg-4">
                              <div class="vital-card h-100">
                                <div class="vital-icon bg-primary-soft">
                                  <i class="bi bi-lungs-fill text-primary"></i>
                                </div>
                                <label class="vital-label">Respiratory Rate</label>
                                <div class="input-wrapper">
                                  <input
                                      type="text"
                                      class="form-control vital-input"
                                      placeholder="16 /min"
                                      v-model="input.respiratory_rate"
                                      @input="input.respiratory_rate = input.respiratory_rate.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                      :disabled="userRole !== 'Nurse'"
                                  >
                                </div>
                              </div>
                            </div>

                            <!-- Blood Pressure -->
                            <div class="col-12 col-md-6 col-lg-4">
                              <div class="vital-card h-100">
                                <div class="vital-icon bg-purple-soft">
                                  <i class="bi bi-activity text-purple"></i>
                                </div>
                                <label class="vital-label">Blood Pressure</label>
                                <div class="input-wrapper">
                                  <input
                                      type="text"
                                      class="form-control vital-input"
                                      placeholder="120/80 mmHg"
                                      @input="input.blood_pressure = input.blood_pressure.replace(/[^0-9/]/g, '').replace(/(\/.*)\/+/, '$1')"
                                      v-model="input.blood_pressure"
                                      :disabled="userRole !== 'Nurse'"
                                  >
                                </div>
                              </div>
                            </div>

                            <!-- Weight -->
                            <div class="col-12 col-md-6 col-lg-4">
                              <div class="vital-card h-100">
                                <div class="vital-icon bg-success-soft">
                                  <i class="bi bi-person-fill text-success"></i>
                                </div>
                                <label class="vital-label">Weight</label>
                                <div class="input-wrapper">
                                  <input
                                      type="text"
                                      class="form-control vital-input"
                                      placeholder="70 kg"
                                      @input="input.weight = input.weight.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                      v-model="input.weight"
                                      :disabled="userRole !== 'Nurse'"
                                  >
                                </div>
                              </div>
                            </div>

                            <!-- SPO2 -->
                            <div class="col-12 col-md-6 col-lg-4">
                              <div class="vital-card h-100">
                                <div class="vital-icon bg-cyan-soft">
                                  <i class="bi bi-droplet-fill text-cyan"></i>
                                </div>
                                <label class="vital-label">SPO2</label>
                                <div class="input-wrapper">
                                  <input
                                      type="text"
                                      class="form-control vital-input"
                                      placeholder="98%"
                                      @input="input.spo2 = input.spo2.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                      v-model="input.spo2"
                                      :disabled="userRole !== 'Nurse'"
                                  >
                                </div>
                              </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                              <div class="vital-card h-100">
                                <div class="vital-icon bg-cyan-soft">
                                  <i class="bi bi-droplet-fill text-cyan"></i>
                                </div>
                                <label class="vital-label">RBS</label>
                                <div class="input-wrapper">
                                  <input
                                      type="text"
                                      class="form-control vital-input"
                                      placeholder="140mg/dL"
                                      @input="input.rbs = input.rbs.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                      v-model="input.rbs"
                                      :disabled="userRole !== 'Nurse'"
                                  >
                                </div>
                              </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                              <div class="vital-card h-100">
                                <div class="vital-icon bg-cyan-soft">
                                  <i class="bi bi-droplet-fill text-cyan"></i>
                                </div>
                                <label class="vital-label">FBS</label>
                                <div class="input-wrapper">
                                  <input
                                      type="text"
                                      class="form-control vital-input"
                                      placeholder="100mg/dL"
                                      @input="input.fbs = input.fbs.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                      v-model="input.fbs"
                                      :disabled="userRole !== 'Nurse'"
                                  >
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                        <!-- Doctor Section -->

                        <div v-if="userRole == 'Doctor'" class="doctor-section">
                          <div
                              class="section-header bg-success text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                            <i class="bi bi-person-workspace me-2 fs-5"></i>
                            <h5 class="mb-0">Doctor's Section</h5>
                          </div>

                          <div class="section-content p-3 bg-light rounded">
                            <div class="row justify-content-center g-3">

                              <!-- History -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">History of presenting complaints</label>
                                <div class="input-group">
                                  <span class="input-group-text bg-white">
                                    <i class="bi bi-clipboard2-pulse"></i>
                                  </span>
                                  <textarea class="form-control text-center"
                                            placeholder="History of presenting complaints"
                                            v-model="input.history"
                                            :disabled="userRole !== 'Doctor'" name="" id=""
                                            cols="2"></textarea>
                                </div>
                              </div>

                              <!-- Examination findings -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Examination findings</label>
                                <div class="input-group">
                            <span class="input-group-text bg-white">
                              <i class="bi bi-clipboard2-pulse"></i>
                            </span>

                                  <textarea class="form-control text-center"
                                            placeholder="Examination findings"
                                            v-model="input.examination_findings"
                                            :disabled="userRole !== 'Doctor'"
                                            cols="2"></textarea>

                                </div>
                              </div>

                              <!-- Diagnosis -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Diagnosis</label>
                                <div class="input-group">
          <span class="input-group-text bg-white">
            <i class="bi bi-journal-medical"></i>
          </span>
                                  <textarea class="form-control text-center"
                                            placeholder="Diagnosis"
                                            v-model="input.diagnosis"
                                            :disabled="userRole !== 'Doctor'"
                                            cols="2"></textarea>
                                </div>
                              </div>

                              <!-- Investigations / Labs -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Investigations / Labs</label>
                                <div class="input-group">
          <span class="input-group-text bg-white">
            <i class="bi bi-flask"></i>
          </span>

                                  <textarea class="form-control text-center"
                                            placeholder="Labs"
                                            v-model="input.investigations"
                                            :disabled="userRole !== 'Doctor'"
                                            cols="2"></textarea>
                                </div>
                              </div>

                              <!-- Treatment -->
                              <div class="col-md-12">
                                <label class="form-label text-center w-100">Treatment</label>
                                <div class="input-group">
          <span class="input-group-text bg-white">
            <i class="bi bi-capsule"></i>
          </span>
                                  <textarea class="form-control text-center"
                                            placeholder="Treatment"
                                            v-model="input.treatment"
                                            :disabled="userRole !== 'Doctor'"
                                            cols="2"></textarea>
                                </div>
                              </div>

                              <!-- Additional Notes -->
                              <div class="col-md-12">
                                <label class="form-label text-center w-100">Additional Notes</label>
                                <div class="input-group">
          <span class="input-group-text bg-white">
            <i class="bi bi-sticky"></i>
          </span>
                                  <textarea
                                      class="form-control text-center"
                                      rows="3"
                                      placeholder="Enter any additional notes"
                                      v-model="input.doctor_additional_notes"
                                      :disabled="userRole !== 'Doctor'"
                                  ></textarea>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>


                        <div class="bg-light py-4">
                          <div class="container">
                            <!-- Enhanced Pharmacist Form Section -->
                            <div v-if="userRole == 'Pharmacist'" class="pharmacist-section fade-in">
                              <div class="save-indicator" id="saveIndicator">
                                <i class="bi bi-check-circle me-1"></i>
                                Auto-saved
                              </div>

                              <div class="section-header">
                                <h5 class="section-title">
                                  <div class="header-icon pulse">
                                    <i class="bi bi-person-workspace"></i>
                                  </div>
                                  Pharmacist's Professional Section
                                </h5>
                              </div>

                              <div class="section-content">
                                <div class="row g-4">
                                  <div class="col-lg-6">
                                    <div class="form-field-container medication-field">
                                      <label class="form-label">
                                        <i class="bi bi-capsule-pill label-icon"></i>
                                        Medication Information & Notes
                                      </label>
                                      <div class="form-control-wrapper">
                                <textarea
                                    class="form-control enhanced-textarea"
                                    rows="4"
                                    placeholder="Enter detailed medication information, dosage instructions, and clinical notes..."
                                    v-model="input.medication_notes"
                                    :disabled="userRole !== 'Pharmacist'"
                                >
                                </textarea>
                                        <div class="form-control-icon">
                                          <i class="bi bi-clipboard2-pulse"></i>
                                        </div>
                                        <div class="floating-label">Medication Details</div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-lg-6">
                                    <div class="form-field-container prescription-field">
                                      <label class="form-label">
                                        <i class="bi bi-prescription2 label-icon"></i>
                                        Prescription Instructions
                                      </label>
                                      <div class="form-control-wrapper">
                                <textarea
                                    class="form-control enhanced-textarea"
                                    rows="4"
                                    placeholder="Enter prescription details, dosage schedule, duration, and patient counseling points..."
                                    v-model="input.prescription_notes"
                                    :disabled="userRole !== 'Pharmacist'"
                                >
                                </textarea>
                                        <div class="form-control-icon">
                                          <i class="bi bi-file-medical"></i>
                                        </div>
                                        <div class="floating-label">Prescription Notes</div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-12">
                                    <div class="form-field-container additional-notes-field">
                                      <label class="form-label">
                                        <i class="bi bi-chat-square-text label-icon"></i>
                                        Additional Clinical & Safety Notes
                                      </label>
                                      <div class="form-control-wrapper">
                                <textarea
                                    class="form-control enhanced-textarea"
                                    rows="3"
                                    placeholder="Enter additional clinical observations, drug interactions, allergies, contraindications, or special patient counseling notes..."
                                    v-model="input.pharmacist_additional_notes"
                                    :disabled="userRole !== 'Pharmacist'"
                                >
                                </textarea>
                                        <div class="form-control-icon">
                                          <i class="bi bi-exclamation-triangle"></i>
                                        </div>
                                        <div class="floating-label">Additional Notes</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                          <button type="submit" class="btn btn-primary btn-lg">
                            Submit Record
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

  <!-- Doctor Section -->

  <!--
                      <div v-if="userRole == 'Lab Technician'" class="doctor-section">

                        <div
                            class="section-header bg-secondary text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                          <i class="bi bi-person-workspace me-2"></i>
                          <h5 class="mb-0">Lab Technician Section</h5>
                        </div>
                        <div class="section-content p-3 bg-light rounded">
                          <div class="row justify-content-center g-3">
                            &lt;!&ndash; Lab 1 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab1" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'" placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 1)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 2 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab2" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'" placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 2)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 3 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab3" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'"
                                     placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 3)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 4 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab4" :disabled="userRole !== 'Lab Technician'"
                                     class="form-control" placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 4)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 5 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab5" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'" placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 5)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 6 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab6" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'" placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 6)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 7 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab7" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'" placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 7)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 8 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab8" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'"
                                     placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 8)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 9 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab9" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'" placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 9)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>

                            &lt;!&ndash; Lab 10 &ndash;&gt;
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Name of Lab</label>
                              <input type="text" v-model="record.lab10" class="form-control"
                                     :disabled="userRole !== 'Lab Technician'" placeholder="Name of Lab">
                            </div>
                            <div class="col-md-6">
                              <label class="form-label text-center w-100">Lab Report</label>
                              <input
                                  type="file"
                                  @change="(e) => handleFileUpload(e, 10)"
                                  class="form-control text-center"
                                  multiple
                                  :disabled="userRole !== 'Lab Technician'"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
  -->
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

.pharmacist-section {
  background: linear-gradient(145deg, #ffffff 0%, #f8fdff 100%);
  border-radius: 16px;
  border: 2px solid #e1f5fe;
  box-shadow: 0 8px 32px rgba(23, 162, 184, 0.1);
  overflow: hidden;
  position: relative;
  transition: all 0.3s ease;
}

.pharmacist-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 6px;
  background: linear-gradient(90deg, #17a2b8, #20c997, #6f42c1);
  z-index: 1;
}

.pharmacist-section:hover {
  box-shadow: 0 12px 40px rgba(23, 162, 184, 0.15);
  transform: translateY(-2px);
}

.section-header {
  background: linear-gradient(135deg, #17a2b8 0%, #20c997 50%, #138496 100%);
  padding: 20px 24px;
  margin: 0;
  border-radius: 0;
  position: relative;
  overflow: hidden;
}

.section-header::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  animation: shimmer 3s ease-in-out infinite;
}

@keyframes shimmer {
  0% {
    left: -100%;
  }
  50% {
    left: 100%;
  }
  100% {
    left: 100%;
  }
}

.section-title {
  color: white;
  font-weight: 700;
  font-size: 1.3rem;
  margin: 0;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  display: flex;
  align-items: center;
  justify-content: center;
}

.header-icon {
  background: rgba(255, 255, 255, 0.2);
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 12px;
  font-size: 1.2rem;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.section-content {
  padding: 32px 24px;
  background: #ffffff;
  position: relative;
}

.form-field-container {
  background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
  border-radius: 12px;
  padding: 20px;
  border: 1px solid #e9ecef;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.form-field-container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, #17a2b8, #20c997);
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.form-field-container:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(23, 162, 184, 0.15);
  border-color: #17a2b8;
}

.form-field-container:hover::before {
  transform: scaleX(1);
}

.form-field-container:focus-within {
  border-color: #17a2b8;
  box-shadow: 0 0 0 3px rgba(23, 162, 184, 0.1);
}

.form-field-container:focus-within::before {
  transform: scaleX(1);
}

.form-label {
  color: #495057;
  font-weight: 600;
  font-size: 0.95rem;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.label-icon {
  color: #17a2b8;
  margin-right: 8px;
  font-size: 1.1rem;
}

.form-control-wrapper {
  position: relative;
}

.enhanced-textarea {
  border: 2px solid #e9ecef;
  border-radius: 10px;
  padding: 16px 50px 16px 16px;
  font-size: 0.95rem;
  line-height: 1.6;
  background: #ffffff;
  transition: all 0.3s ease;
  resize: vertical;
  min-height: 100px;
}

.enhanced-textarea:focus {
  border-color: #17a2b8;
  box-shadow: 0 0 0 3px rgba(23, 162, 184, 0.1);
  background: #f8fdff;
  outline: none;
}

.enhanced-textarea:hover:not(:focus) {
  border-color: #6c757d;
}

.enhanced-textarea::placeholder {
  color: #6c757d;
  font-style: italic;
}

.form-control-icon {
  position: absolute;
  right: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: #17a2b8;
  font-size: 1.2rem;
  pointer-events: none;
  transition: all 0.3s ease;
}

.enhanced-textarea:focus + .form-control-icon {
  color: #138496;
  transform: translateY(-50%) scale(1.1);
}

.medication-field {
  border-left: 4px solid #17a2b8;
}

.prescription-field {
  border-left: 4px solid #6f42c1;
}

.additional-notes-field {
  border-left: 4px solid #fd7e14;
  background: linear-gradient(135deg, #fff8f0 0%, #ffffff 100%);
}

.character-count {
  position: absolute;
  bottom: 8px;
  right: 16px;
  font-size: 0.75rem;
  color: #6c757d;
  background: rgba(255, 255, 255, 0.9);
  padding: 2px 6px;
  border-radius: 4px;
}

.floating-label {
  position: absolute;
  top: 16px;
  left: 16px;
  background: #ffffff;
  padding: 0 4px;
  color: #6c757d;
  font-size: 0.9rem;
  transition: all 0.3s ease;
  pointer-events: none;
}

.enhanced-textarea:focus ~ .floating-label,
.enhanced-textarea:not(:placeholder-shown) ~ .floating-label {
  top: -8px;
  font-size: 0.75rem;
  color: #17a2b8;
  font-weight: 600;
}

.save-indicator {
  position: absolute;
  top: 20px;
  right: 20px;
  background: #28a745;
  color: white;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.save-indicator.show {
  opacity: 1;
}

@media (max-width: 768px) {
  .section-content {
    padding: 20px 16px;
  }

  .form-field-container {
    padding: 16px;
  }

  .enhanced-textarea {
    padding: 12px 40px 12px 12px;
    min-height: 80px;
  }
}

.fade-in {
  animation: fadeIn 0.8s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.pulse {
  animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.7;
  }
}
</style>