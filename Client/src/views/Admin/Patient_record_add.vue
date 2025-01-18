<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatients from "@/composerbles/usePatients.js";
import {onMounted, ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";

import { reactive } from 'vue';

const props = defineProps({
  id: {
    type: String,
    required: true,
  },
});

const record = reactive({
  patient_id: props.id,
  history: '',
  examination_findings: '',
  diagnosis: '',
  treatment: '',
  respiratory_rate: '',
  blood_pressure: '',
  blood_and_sugar_rate: '',
  temperature: '',
  pulse_rate: '',
  weight: '',
  admitted: '',
  labs: '',
  ward_number: '',
  additional_notes: '',
  lab1: '',
  lab1_results: [],
  lab2: '',
  lab2_results: [],
  lab3: '',
  lab3_results: [],
  lab4: '',
  lab4_results: [],
  lab5: '',
  lab5_results: [],
  lab6: '',
  lab6_results: [],
  lab7: '',
  lab7_results: [],
  lab8: '',
  lab8_results: [],
  lab9: '',
  lab9_results: [],
  lab10: '',
  lab10_results: [],
});

const handleFileUpload = (event, labNumber) => {
  const files = event.target.files;
  const fileArray = Array.from(files);
  record[`lab${labNumber}_results`] = fileArray;
};

const handleSubmit = async () => {
  try {
    const token = localStorage.getItem('AUTH_TOKEN');
    const config = {
      headers: {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'multipart/form-data',
      },
    };
    const formData = new FormData();

    // Append non-file data
    Object.keys(record).forEach((key) => {
      if (!key.includes('_results')) {
        formData.append(key, record[key]);
      }
    });

    // Append files with unique names
    for (let i = 1; i <= 10; i++) {
      const files = record[`lab${i}_results`];
      if (files && files.length > 0) {
        files.forEach((file, index) => {
          formData.append(`lab${i}_results[]`, file);
        });
      }
    }

    await axios.post('https://health.local.stay/api/patient_rec', formData, config);
    await router.push('/hospital_patient');
  } catch (err) {
    alert(err.response?.data?.data || 'An error occurred');
  }
};
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
                <form @submit.prevent="handleSubmit" class="text-center">
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
                          <label class="form-label text-center w-100">Respiratory Rate</label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Respiratory Rate"
                                  v-model="record.respiratory_rate"
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
                              <select class="form-control form-select" v-model="record.admitted">
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
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="History of presenting complaints  "
                                  v-model="record.history"
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
                              <input class="form-select text-center" v-model="record.examination_findings"
                                     placeholder="Examination findings">
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

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Investigations/ Labs
                          </label>
                          <div class="form-group has-icon-left">
                            <div class="position-relative">
                              <input
                                  type="text"
                                  class="form-control text-center"
                                  placeholder="Labs"
                                  v-model="record.labs"
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
                                  v-model="record.treatment"
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
                              v-model="record.additional_notes"
                          ></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="doctor-section">
                    <div class="section-header bg-secondary text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
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
                          <input type="text" v-model="record.lab10" class="form-control" placeholder="Name of Lab">
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
.main {
  background-image: url("@/assets/img/doctor-talking-to-patient-in-hospital-office-medical-consultation-in-clinic-cartoon-character-illustration-vector.jpg");
  background-size: contain; /* Or use auto if exact fit isn't necessary */
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
}

.main::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(255, 255, 255, 0.1); /* Adjust opacity and color as needed */
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
