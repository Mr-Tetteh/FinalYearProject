<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatients from "@/composerbles/usePatients.js";
import {onMounted, ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";

const props = defineProps({
  id: {
    type: String,
    required: true,
  },
});


const record = ref({
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
  sugar_rate: '',
  admitted: '',
  labs: '',
  ward_number: '',
  additional_notes: '',
  lab1: '',
  lab1_results: '',
  lab2: '',
  lab2_results: '',
  lab3: '',
  lab3_results: '',
  lab4: '',
  lab4_results: '',
  lab5: '',
  lab5_results: '',
  lab6: '',
  lab6_results: '',
  lab7: '',
  lab7_results: '',
  lab8: '',
  lab8_results: '',
  lab9: '',
  lab9_results: '',
  lab10: '',
  lab10_results: '',


})
const handleSubmit = async () => {
  try {
    const token = localStorage.getItem('AUTH_TOKEN');
    const config = {
      headers: {Authorization: `Bearer ${token}`}
    };
    await axios.post('https://health.local.stay/api/patient_rec', record.value, config);
    await router.push('/hospital_patient');
  } catch (err) {
    alert(err.response.data.data);
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
              <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Patient Registration</h4>
              </div>
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
                                  placeholder="Blood and sugar rate"
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
                    <div
                        class="section-header bg-secondary text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                      <i class="bi bi-person-workspace me-2"></i>
                      <h5 class="mb-0">Lab Technician Section</h5>
                    </div>
                    <div class="section-content p-3 bg-light rounded">
                      <div class="row justify-content-center g-3">
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 1</label>
                          <input type="text" v-model="record.lab1" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 1 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab1_results')"
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 2</label>
                          <input type="text" v-model="record.lab2" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 2 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab2_results')"
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 3</label>
                          <input type="text" v-model="record.lab3" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 3 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab3_results')"
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 4</label>
                          <input type="text" v-model="record.lab4" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 4 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab4_results')"
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 5</label>
                          <input type="text" v-model="record.lab5" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 5 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab5_results')"
                          >
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 6</label>
                          <input type="text" v-model="record.lab6" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 6 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab6_results')"
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 7</label>
                          <input type="text" v-model="record.lab7" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 7 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab7_results')"
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 8</label>
                          <input type="text" v-model="record.lab8" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 8 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab8_results')"
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 9</label>
                          <input type="text" v-model="record.lab9" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 9 Report</label>
                          <input
                              type="file"
                              class="form-control text-center"
                              @change="handleFileUpload($event, 'lab9_results')"
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 10</label>
                          <input type="text" v-model="record.lab10" class="form-control" placeholder="Name of Lab">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label text-center w-100">Lab 10 Report</label>    <input
                            type="file"
                            class="form-control text-center"
                            @change="handleFileUpload($event, 'lab10_results')"
                        >
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
