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
import usePatientRecord from "@/composerbles/usePatientRecord.js";

const props = defineProps({
  id: {
    type: String,
    required: true,
  },
});
const {userRole} = useSession()
const {input, upload_record} = usePatientRecord()

// const input = ref({
//   patient_id: props.id,
//   temperature: '',
//   pulse_rate: '',
//   respiratory_rate: '',
//   blood_pressure: '',
//   weight: '',
//   spo2: '',
//   fbs: '',
//   rbs: '',
//   nurse_additional_notes: '',
//
// });

const handleSubmit = async () => {
  await upload_record(props.id)
};
</script>
<template>
  <div class="hospital-dashboard main">
    <div class="d-flex h-100">
      <AdminNavBar/>
      <div class="content-wrapper flex-grow-1 overflow-auto">
        <div class="container-fluid p-0 h-100">
          <div class="card-header bg-gradient-primary text-white p-4 border-0">
            <div class="d-flex align-items-center justify-content-center">
              <i class="bi bi-clipboard2-pulse-fill fs-2 me-3"></i>
              <h2 class="mb-0 fw-bold">Patient Vital Signs Dashboard</h2>
            </div>
          </div>
          <div class="card-body p-0 h-100">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden backdrop-blur h-100">
              <form @submit.prevent="handleSubmit" class="text-center h-100 d-flex flex-column" disabled="false">

                <!-- Nurse Section -->
                <div class="nurse-section flex-grow-1 overflow-hidden d-flex flex-column">
                  <div
                      class="section-header bg-gradient-info text-white p-4 d-flex align-items-center justify-content-center position-relative overflow-hidden flex-shrink-0">
                    <div class="header-decoration"></div>
                    <i class="bi bi-person-badge-fill me-3 fs-3"></i>
                    <h3 class="mb-0 fw-bold">Nurse's Assessment Section</h3>
                  </div>

                  <div class="section-content p-4 p-md-5 bg-light-gradient flex-grow-1 overflow-y-auto">
                    <div class="row justify-content-center h-100">
                      <div class="col-12 h-100">
                        <form class="vital-signs-form" @submit.prevent="onsubmit()">

                          <!-- Primary Vital Signs -->
                          <div class="vitals-section mb-5">
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

                          <!-- Blood Sugar Section -->
                          <div class="vitals-section mb-5">
                            <div class="section-title-wrapper text-center mb-4">
                              <div
                                  class="section-title-icon bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                <i class="bi bi-graph-up-arrow fs-3"></i>
                              </div>
                              <h4 class="section-title text-dark fw-bold mb-2">Blood Sugar Levels</h4>
                              <div class="title-underline mx-auto"></div>
                            </div>

                            <div class="row g-4 justify-content-center">
                              <!-- FBS -->
                              <div class="col-12 col-md-6 col-lg-5">
                                <div class="vital-card h-100">
                                  <div class="vital-icon bg-warning-soft">
                                    <i class="bi bi-clipboard-data-fill text-warning"></i>
                                  </div>
                                  <label class="vital-label">FBS (Fasting Blood Sugar)</label>
                                  <div class="input-wrapper">
                                    <input
                                        type="text"
                                        class="form-control vital-input"
                                        placeholder="100 mg/dL"
                                        v-model="input.fbs"
                                        @input="input.fbs = input.fbs.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                        :disabled="userRole !== 'Nurse'"
                                    >
                                  </div>
                                </div>
                              </div>

                              <!-- RBS -->
                              <div class="col-12 col-md-6 col-lg-5">
                                <div class="vital-card h-100">
                                  <div class="vital-icon bg-orange-soft">
                                    <i class="bi bi-clipboard-data-fill text-orange"></i>
                                  </div>
                                  <label class="vital-label">RBS (Random Blood Sugar)</label>
                                  <div class="input-wrapper">
                                    <input
                                        type="text"
                                        class="form-control vital-input"
                                        placeholder="140 mg/dL"
                                        v-model="input.rbs"
                                        @input="input.rbs = input.rbs.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                        :disabled="userRole !== 'Nurse'"
                                    >
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="submit-section p-4 bg-white border-top flex-shrink-0">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-12 col-md-6 col-lg-4">
                        <button type="submit" class="btn btn-primary-gradient btn-lg w-100 py-3 fw-bold submit-btn">
                          <i class="bi bi-check-circle-fill me-2"></i>
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
</template>

<style scoped>
/* Custom Color Variables */
:root {
  --color-pink: #e91e63;
  --color-purple: #9c27b0;
  --color-cyan: #00bcd4;
  --color-orange: #ff9800;
  --header-height: 80px;
  --footer-height: 100px;
}

/* Background and Main Layout */
html, body, #app {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

.main {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  height: 100vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  position: relative;
  overflow: hidden;
}

.content-wrapper {
  flex: 1;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  margin-left: 250px; /* Adjust based on your sidebar width */
}

.card-body {
  flex: 1;
  display: flex;
  flex-direction: column;
  padding: 0;
  overflow: hidden;
}

.section-content {
  flex: 1;
  overflow-y: auto;
  padding: 1.5rem;
  /* Custom scrollbar styling */
  scrollbar-width: thin;
  scrollbar-color: rgba(102, 126, 234, 0.3) transparent;
}

.section-content::-webkit-scrollbar {
  width: 8px;
}

.section-content::-webkit-scrollbar-track {
  background: transparent;
}

.section-content::-webkit-scrollbar-thumb {
  background: rgba(102, 126, 234, 0.3);
  border-radius: 10px;
}

.section-content::-webkit-scrollbar-thumb:hover {
  background: rgba(102, 126, 234, 0.5);
}

.vital-signs-form {
  height: 100%;
  display: flex;
  flex-direction: column;
}

.vitals-section {
  margin-bottom: 2rem;
  background: white;
  border-radius: 16px;
  padding: 1.5rem;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
}

/* Card Enhancements */
.backdrop-blur {
  backdrop-filter: blur(10px);
  background: rgba(255, 255, 255, 0.95) !important;
}

.rounded-4 {
  border-radius: 1.5rem !important;
}

/* Gradient Backgrounds */
.bg-gradient-primary {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

.bg-gradient-info {
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
}

.bg-light-gradient {
  background: linear-gradient(135deg, #f8f9ff 0%, #f0f4ff 100%) !important;
}

.btn-primary-gradient {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border: none;
  color: white;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.btn-primary-gradient:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
  background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
}

/* Header Decoration */
.header-decoration {
  position: absolute;
  top: -50%;
  right: -10%;
  width: 100px;
  height: 100px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-10px);
  }
}

/* Section Titles */
.section-title-wrapper {
  margin-bottom: 2rem;
}

.section-title-icon {
  width: 70px;
  height: 70px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  }
  50% {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
  }
  100% {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  }
}

.card-body {
  padding: 1.5rem;
}

.section-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: #2c3e50;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.title-underline {
  width: 80px;
  height: 4px;
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  border-radius: 2px;
}

/* Vital Cards */
.vital-card {
  background: white;
  border-radius: 16px;
  padding: 1.25rem;
  text-align: center;
  transition: all 0.3s ease;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
  border: 1px solid rgba(0, 0, 0, 0.05);
  position: relative;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
  margin-bottom: 1rem;
}

.vital-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
  transition: left 0.5s;
}

.vital-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.vital-card:hover::before {
  left: 100%;
}

/* Vital Icons */
.vital-icon {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1rem;
  font-size: 1.5rem;
}

/* Soft Color Backgrounds */
.bg-danger-soft {
  background: rgba(220, 53, 69, 0.1);
}

.bg-pink-soft {
  background: rgba(233, 30, 99, 0.1);
}

.bg-primary-soft {
  background: rgba(13, 110, 253, 0.1);
}

.bg-purple-soft {
  background: rgba(156, 39, 176, 0.1);
}

.bg-success-soft {
  background: rgba(25, 135, 84, 0.1);
}

.bg-cyan-soft {
  background: rgba(0, 188, 212, 0.1);
}

.bg-warning-soft {
  background: rgba(255, 193, 7, 0.1);
}

.bg-orange-soft {
  background: rgba(255, 152, 0, 0.1);
}

/* Custom Text Colors */
.text-pink {
  color: var(--color-pink);
}

.text-purple {
  color: var(--color-purple);
}

.text-cyan {
  color: var(--color-cyan);
}

.text-orange {
  color: var(--color-orange);
}

/* Vital Labels */
.vital-label {
  font-weight: 600;
  color: #495057;
  font-size: 0.95rem;
  margin-bottom: 1rem;
  display: block;
}

/* Input Styling */
.input-wrapper {
  position: relative;
}

.vital-input {
  border: 2px solid #e9ecef;
  border-radius: 12px;
  padding: 0.75rem 1rem;
  font-size: 1rem;
  font-weight: 500;
  text-align: center;
  transition: all 0.3s ease;
  background: rgba(248, 249, 250, 0.5);
}

.vital-input:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
  background: white;
  transform: scale(1.02);
}

.vital-input:disabled {
  background: rgba(248, 249, 250, 0.3);
  border-color: #dee2e6;
  cursor: not-allowed;
}

/* Submit Button Animation */
.submit-btn {
  position: relative;
  overflow: hidden;
}

.submit-btn::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  transition: width 0.6s, height 0.6s;
}

.submit-btn:hover::before {
  width: 300px;
  height: 300px;
}

/* Responsive Design */
@media (max-width: 768px) {
  .section-title {
    font-size: 1.25rem;
  }

  .vital-card {
    padding: 1rem;
  }

  .vital-icon {
    width: 50px;
    height: 50px;
    font-size: 1.25rem;
  }

  .section-title-icon {
    width: 60px;
    height: 60px;
  }

  .content-wrapper {
    margin-left: 0; /* Remove sidebar margin on mobile */
  }
}

/* Placeholder Styling */
::placeholder {
  color: #adb5bd;
  font-style: italic;
}

/* Focus Animations */
@keyframes focusGlow {
  0% {
    box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
  }
  50% {
    box-shadow: 0 0 20px rgba(102, 126, 234, 0.6);
  }
  100% {
    box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
  }
}

.vital-input:focus {
  animation: focusGlow 2s infinite;
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