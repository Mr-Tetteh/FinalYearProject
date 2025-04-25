<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import useSession from "@/composerbles/useSession.js";
import usePatients from "@/composerbles/usePatients.js";
import {onMounted} from "vue";

const {userRole} = useSession();
const {record, edit, update_record} = usePatients()


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
            <div class="card shadow-lg border-0">
              <div class="card-body">
                <form v-if="record" @submit.prevent="handleSubmit" class="text-center" disabled="false">

                  <!-- Nurse Section -->
                  <div class="nurse-section mb-5">
                    <div
                        class="section-header bg-info text-white p-2 rounded d-flex align-items-center mt-3 justify-content-center">
                      <i class="bi bi-person-badge me-2"></i>
                      <h5 class="mb-0">Nurse's Section</h5>
                    </div>
                    <div class="section-content p-3 bg-light rounded">
                      <div class="row justify-content-center g-3">
                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Temperature</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  v-model="record.temperature"
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Temperature"
                                  :disabled="userRole !== 'Nurse'"
                              >
                              <div class="form-control-icon">
                                <i class="bi bi-thermometer"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Pulse Rate</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Pulse Rate"
                                  v-model="record.pulse_rate"
                                  :disabled="userRole !== 'Nurse'"

                              >
                              <div class="form-control-icon">
                                <i class="bi bi-heart-pulse"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Respiratory Rate</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Respiratory Rate"
                                  v-model="record.respiratory_rate"
                                  :disabled="userRole !== 'Nurse'"

                              >
                              <div class="form-control-icon">
                                <i class="bi bi-heart-pulse"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Blood Pressure</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Blood Pressure"
                                  v-model="record.blood_pressure"
                                  :disabled="userRole !== 'Nurse'"

                              >
                              <div class="form-control-icon">
                                <i class="bi bi-heart-pulse"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Weight</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Weight (kg)"
                                  v-model="record.weight"
                                  :disabled="userRole !== 'Nurse'"
                              >
                              <div class="form-control-icon">
                                <i class="bi bi-clipboard-data"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Blood and sugar rate</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Blood and sugar rate"
                                  v-model="record.blood_and_sugar_rate"
                                  :disabled="userRole !== 'Nurse'"

                              >
                              <div class="form-control-icon">
                                <i class="bi bi-droplet"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Admitted</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <select class="form-control form-select" v-model="record.admitted"
                                      :disabled="userRole !== 'Nurse'"
                              >
                                <option> Select an option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                              <div class="form-control-icon">
                                <i class="bi bi-clipboard-data"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Ward Number</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Ward Number"
                                  v-model="record.ward_number"
                                  :disabled="userRole !== 'Nurse'"

                              >
                              <div class="form-control-icon">
                                <i class="bi bi-droplet"></i>
                              </div>
                            </div>
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
                              <!-- Existing doctor section fields with centered text -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">History of presenting complaints </label>
                                <div class="form-group has-icon-left">
                                  <div class="position-relative">

                                    <textarea class="form-control text-center"
                                              placeholder="History of presenting complaints  "
                                              v-model="record.history" rows="8"></textarea>
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
                                    <textarea class="form-control text-center" v-model="record.examination_findings"
                                              placeholder="Examination findings" rows="8"></textarea>
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
                                    <textarea class="form-control text-center" v-model="record.diagnosis"
                                              placeholder="Diagnosis" rows="8"></textarea>
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
                                    <textarea class="form-control text-center" v-model="record.labs" placeholder="Investigations/ Labs" rows="8"></textarea>
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
                                    <textarea class="form-control text-center" v-model="record.treatment" placeholder="Treatment" rows="3"></textarea>
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
                                    v-model="record.additional_notes"
                                ></textarea>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div v-if="userRole == 'Lab Technician'" class="doctor-section">

                          <div
                              class="section-header bg-secondary text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                            <i class="bi bi-person-workspace me-2"></i>
                            <h5 class="mb-0">Lab Technician Section</h5>
                          </div>
                          <div class="section-content p-3 bg-light rounded">
                            <div class="row justify-content-center g-3">
                              <!-- Lab 1 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab1" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 1)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 2 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab2" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 2)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 3 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab3" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 3)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 4 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab4" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 4)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 5 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab5" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 5)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 6 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab6" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 6)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 7 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab7" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 7)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 8 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab8" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 8)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 9 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab9" class="form-control" placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 9)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>

                              <!-- Lab 10 -->
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Name of Lab</label>
                                <input type="text" v-model="record.lab10" class="form-control"
                                       placeholder="Name of Lab">
                              </div>
                              <div class="col-md-6">
                                <label class="form-label text-center w-100">Lab Report</label>
                                <input
                                    type="file"
                                    @change="(e) => handleFileUpload(e, 10)"
                                    class="form-control text-center"
                                    multiple
                                />
                              </div>
                            </div>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>
<style scoped>

</style>