<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import useSession from "@/composerbles/useSession.js";
import usePatients from "@/composerbles/usePatients.js";
import {onMounted} from "vue";
import Editor from "@tinymce/tinymce-vue";
import usePatientRecord from "@/composerbles/usePatientRecord.js";

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
                                <label class="vital-label">Temperature}</label>
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
                          </div>
                        </div>


                        <!-- Doctor Section -->


                        <!-- Pharmacist Section -->
                        <div v-if="userRole == 'Pharmacist'" class="pharmacist-section">
                          <div
                              class="section-header bg-dark text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                            <i class="bi bi-file-medical me-2"></i>
                            <h5 class="mb-0">Pharmacist's Section</h5>
                          </div>
                          <div class="section-content p-3 bg-light rounded">
                            <editor
                                v-model="input.pharmacists_notes"
                                id="pharmacist-editor"
                                apiKey="ymk7tbhj4ul5sgm1y5zx7dc6g2qravp7l63cs23wxpvepxoh"
                                :init="editorConfig"
                                @update:modelValue="(value) => input.pharmacists_notes = value"
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
                                v-model="input.lab_tech_notes"
                                id="lab-tech-editor"
                                apiKey="ymk7tbhj4ul5sgm1y5zx7dc6g2qravp7l63cs23wxpvepxoh"
                                :init="editorConfig"
                                @update:modelValue="(value) => input.lab_tech_notes = value"
                            />
                          </div>
                        </div>

                        <div v-if="userRole == 'Doctor'" class="doctor-section">
                          <div
                              class="section-header bg-success text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                            <i class="bi bi-person-workspace me-2"></i>
                            <h5 class="mb-0">Doctor's Section</h5>
                          </div>
                          <div class="section-content p-3 bg-light rounded">
                            <div class="row justify-content-center g-3">
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">History of presenting complaints </label>
                                <div class="form-group has-icon-left">
                                  <div class="position-relative">
                                    <input
                                        type="text"
                                        class="form-control text-center"
                                        placeholder="History of presenting complaints"
                                        v-model="input.history"
                                        :disabled="userRole !== 'Doctor'"
                                    >
                                    <div class="form-control-icon">
                                      <i class="bi bi-clipboard2-pulse"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Examination findings
                                </label>
                                <div class="form-group has-icon-left">
                                  <div class="position-relative">
                                    <input class="form-select text-center" v-model="input.examination_findings"
                                           placeholder="Examination findings"
                                           :disabled="userRole !== 'Doctor'"
                                    >
                                    <div class="form-control-icon">
                                      <i class="bi bi-clipboard2-pulse"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Diagnosis</label>
                                <div class="form-group has-icon-left">
                                  <div class="position-relative">
                                    <input
                                        type="text"
                                        class="form-control text-center"
                                        placeholder="Diagnosis"
                                        v-model="input.diagnosis"
                                        :disabled="userRole !== 'Doctor'"
                                    >
                                    <div class="form-control-icon">
                                      <i class="bi bi-journal-medical"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Investigations/ Labs
                                </label>
                                <div class="form-group has-icon-left">
                                  <div class="position-relative">
                                    <input
                                        type="text"
                                        class="form-control text-center"
                                        placeholder="Labs"
                                        v-model="input.investigations"
                                        :disabled="userRole !== 'Doctor'"
                                    >
                                    <div class="form-control-icon">
                                      <i class="bi bi-capsule"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <label class="form-label text-center w-100">Treatment</label>
                                <div class="form-group has-icon-left">
                                  <div class="position-relative">
                                    <input
                                        type="text"
                                        class="form-control text-center"
                                        placeholder="Treatment"
                                        v-model="input.treatment"
                                        :disabled="userRole !== 'Doctor'"
                                    >
                                    <div class="form-control-icon">
                                      <i class="bi bi-capsule"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <label class="form-label text-center w-100">Additional Notes</label>
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
</style>