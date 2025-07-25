<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import axios from "axios";
import router from "@/router/index.js";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import Editor from '@tinymce/tinymce-vue'

const $toast = useToast();

import {reactive, ref} from 'vue';
import useSession from "@/composerbles/useSession.js";

const props = defineProps({
  id: {
    type: String,
    required: true,
  },
});
const {userRole} = useSession()

const record = ref({
  patient_id: props.id,
  nurse_notes: 'Temperature:  pulse_rate:  respiratory_rate:  blood_pressure:  rbs:   fbs:  spo2:  weight:'

});


const handleSubmit = async () => {

  try {
    const token = localStorage.getItem('AUTH_TOKEN');
    const config = {
      headers: {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'multipart/form-data',
      },
    };

    await axios.post(`${import.meta.env.VITE_API}/patient_rec`, record.value, config);

    await router.push('/hospital_patient');
  } catch (err) {
    $toast.error(err.response.data.message, {
      position: 'top-right',
    })
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
                <form @submit.prevent="handleSubmit" class="text-center" disabled="false">

                  <!-- Nurse Section -->
                  <div class="nurse-section mb-5">
                    <div
                        class="section-header bg-info text-white p-2 rounded d-flex align-items-center mt-3 justify-content-center">
                      <i class="bi bi-person-badge me-2"></i>
                      <h5 class="mb-0">Nurse's Section</h5>
                    </div>
                    <div class="section-content p-3 bg-light rounded">
                      <div class="row justify-content-center g-3">
                        <editor
                            v-model="record.nurse_notes"
                            id="nurse-editor"
                            apiKey="ymk7tbhj4ul5sgm1y5zx7dc6g2qravp7l63cs23wxpvepxoh"
                            :init="{
                    plugins: 'advlist anchor autolink charmap code fullscreen help image insertdatetime link lists media preview searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | styles | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    height: 300
                  }"
                        />
                      </div>
                    </div>
                  </div>

                  <!-- Doctor Section -->
                  <!--                  <div v-if="userRole == 'Doctor'" class="doctor-section">
                                      <div
                                          class="section-header bg-success text-white p-2 rounded d-flex align-items-center mb-3 justify-content-center">
                                        <i class="bi bi-person-workspace me-2"></i>
                                        <h5 class="mb-0">Doctor's Section</h5>
                                      </div>
                                      <div class="section-content p-3 bg-light rounded">
                                        <div class="row justify-content-center g-3">
                                          &lt;!&ndash; Existing doctor section fields with centered text &ndash;&gt;
                                          <div class="col-md-6">
                                            <label class="form-label text-center w-100">History of presenting complaints </label>
                                            <div class="form-group has-icon-left">
                                              <div class="position-relative">
                                                <input
                                                    type="text"
                                                    class="form-control text-center"
                                                    placeholder="History of presenting complaints"
                                                    v-model="record.history"
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
                                                <input class="form-select text-center" v-model="record.examination_findings"
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
                                                    v-model="record.diagnosis"
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
                                                    v-model="record.labs"
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
                                                    v-model="record.treatment"
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
                                                v-model="record.additional_notes"
                                                :disabled="userRole !== 'Doctor'"
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
                                    </div>-->
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
  pointer-events: none;
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


// const handleFileUpload = (event, labNumber) => {
//   const files = event.target.files;
//   const fileArray = Array.from(files);
//   record[`lab${labNumber}_results`] = fileArray;
// };


// const formData = new FormData();
//
// // Append non-file data
// Object.keys(record).forEach((key) => {
//   if (!key.includes('_results')) {
//     formData.append(key, record[key]);
//   }
// });
//
// // Append files with unique names
// for (let i = 1; i <= 10; i++) {
//   const files = record[`lab${i}_results`];
//   if (files && files.length > 0) {
//     files.forEach((file, index) => {
//       formData.append(`lab${i}_results[]`, file);
//     });
//   }
// }