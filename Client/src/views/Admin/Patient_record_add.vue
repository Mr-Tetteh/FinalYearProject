<script setup>

import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatients from "@/composerbles/usePatients.js";

const {record} = usePatients()
</script>

<template>
  <div class="hospital-dashboard main">
    <div class="d-flex justify-content-center">
      <AdminNavBar/>
      <div class="patient-registration-form container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card shadow-lg border-0">
              <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Patient Registration</h4>
              </div>
              <div class="card-body">
                <form @submit.prevent="handleSubmit" class="text-center">
                  <!-- Nurse Section -->
                  <div class="nurse-section mb-5">
                    <div class="section-header bg-info text-white p-2 rounded d-flex align-items-center mt-3 justify-content-center">
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
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Temperature"
                                  v-model="record.temperature"
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
                              >
                              <div class="form-control-icon">
                                <i class="bi bi-heart-pulse"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label text-center w-100">Sugar Rate</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Sugar Rate"
                                  v-model="record.sugar_rate"
                              >
                              <div class="form-control-icon">
                                <i class="bi bi-droplet"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Doctor Section -->
                  <div class="doctor-section">
                    <div class="section-header bg-success text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                      <i class="bi bi-person-workspace me-2"></i>
                      <h5 class="mb-0">Doctor's Section</h5>
                    </div>
                    <div class="section-content p-3 bg-light rounded">
                      <div class="row justify-content-center g-3">
                        <!-- Existing doctor section fields with centered text -->
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Symptoms</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Symptoms"
                                  v-model="record.symptoms"
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
                                  v-model="record.diagnosis"
                              >
                              <div class="form-control-icon">
                                <i class="bi bi-journal-medical"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Continue with other fields... -->
                        <!-- All other fields follow the same pattern with text-center class added -->

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Treatment</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Treatment"
                                  v-model="record.treatment"
                              >
                              <div class="form-control-icon">
                                <i class="bi bi-capsule"></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Admitted</label>
                          <select class="form-select text-center" v-model="record.admitted">
                            <option value="" disabled>Select an option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </div>

                        <!-- Rest of the form fields with centered alignment -->
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Ward Number</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Ward Number"
                                  v-model="record.ward_number"
                              >
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Surgery Required</label>
                          <select class="form-select text-center" v-model="record.surgery">
                            <option value="" disabled>Select an option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </div>

                        <div class="col-md-6" v-if="record.surgery === 'Yes'">
                          <label class="form-label text-center w-100">Surgery Date</label>
                          <input
                              type="date"
                              class="form-control text-center"
                              v-model="record.surgery_date"
                          >
                        </div>

                        <div class="col-md-12" v-if="record.surgery === 'Yes'">
                          <label class="form-label text-center w-100">Surgery Reason</label>
                          <textarea
                              class="form-control text-center"
                              rows="3"
                              placeholder="Enter surgery reason"
                              v-model="record.surgery_reason"
                          ></textarea>
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

                  <!-- Submit Button -->
                  <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                      Submit Patient Record
                    </button>
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
.form-control-icon {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  padding: 0.5rem;
}

.main{
  background-image: url("@/assets/img/patient_rec.jpg");
}

.form-control-icon i {
  width: 1.2rem;
  height: 1.2rem;
}

.form-group.has-icon-left .form-control {
  padding-left: 2.5rem;
}

.form-group.has-icon-left .form-control-icon {
  left: 0;
}

.section-header {
  border-left: 4px solid currentColor;
}

/* Center align text in select dropdowns */
select.form-select {
  text-align: center;
  text-align-last: center;
}

/* Center align placeholder text */
::placeholder {
  text-align: center;
}
</style>
