<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatientRecord from "@/composerbles/usePatientRecord.js";
import axios from "axios";
import {ref} from "vue";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
const {lab, handleFileUpload, uploadLabReport} = usePatientRecord()

const props = defineProps({
  id: String,
  patient: String
});

const handleSubmit = async () => {
  uploadLabReport(props.id, props.patient)
}

</script>

<template>
  <div class="hospital-dashboard main">
    <div class="d-flex justify-content-center min-vh-100 bg-light">
      <AdminNavBar/>
      <div class="patient-registration-form container py-5">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
              <div class="card-header bg-primary text-white text-center py-4">
                <h3 class="mb-0 fw-bold">
                  <i class="fas fa-flask me-2"></i>
                  Laboratory Report Upload
                </h3>
                <p class="mb-0 opacity-75">Upload and manage lab reports</p>
              </div>

              <div class="card-body p-5">
                <form class="needs-validation" @submit.prevent="handleSubmit" novalidate>
                  <!-- Lab Name Field -->
                  <div class="mb-4">
                    <label for="labName" class="form-label fw-semibold text-dark">
                      <i class="fas fa-tag me-2 text-primary"></i>
                      Lab Name
                    </label>
                    <input
                        type="text"
                        class="form-control form-control-lg shadow-sm"
                        id="labName"
                        placeholder="Enter laboratory name"
                        v-model="lab.lab_name"
                    >
                  </div>

                  <!-- Lab Report Upload Field -->
                  <div class="mb-4">
                    <label for="labReport" class="form-label fw-semibold text-dark">
                      <i class="fas fa-file-medical me-2 text-primary"></i>
                      Lab Report
                    </label>
                    <div class="file-upload-wrapper">
                      <input
                          type="file"
                          class="form-control form-control-lg shadow-sm"
                          id="labReport"
                          accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                          @change="handleFileUpload"
                      >
                      <small class="form-text text-muted mt-2">
                        <i class="fas fa-info-circle me-1"></i>
                        Supported formats: PDF, DOC, DOCX, (Max: 10MB)
                      </small>
                    </div>
                  </div>

                  <!-- Action Buttons -->
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary btn-lg px-4">
                      <i class="fas fa-upload me-2"></i>
                      Upload Report
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Progress Indicator -->
            <div class="progress-container mt-4 d-none">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-cloud-upload-alt text-primary me-2"></i>
                    <span class="fw-semibold">Uploading...</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                         role="progressbar"
                         style="width: 0%"
                         aria-valuenow="0"
                         aria-valuemin="0"
                         aria-valuemax="100">
                    </div>
                  </div>
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
/* Custom CSS Enhancements */
.hospital-dashboard {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  min-height: 100vh;
}

.bg-light {
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) !important;
}

.card {
  border-radius: 15px;
  transition: transform 0.2s ease-in-out;
}

.card:hover {
  transform: translateY(-2px);
}

.card-header {
  border-radius: 15px 15px 0 0 !important;
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
  border-bottom: none;
}

.form-control {
  border-radius: 10px;
  border: 2px solid #e9ecef;
  transition: all 0.3s ease;
  font-size: 1rem;
}

.form-control:focus {
  border-color: #4facfe;
  box-shadow: 0 0 0 0.2rem rgba(79, 172, 254, 0.25);
  transform: translateY(-1px);
}

.form-control-lg {
  padding: 0.75rem 1rem;
  font-size: 1.1rem;
}

.form-label {
  margin-bottom: 0.75rem;
  font-size: 1rem;
  color: #495057;
}

.btn {
  border-radius: 10px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  border: none;
}

.btn-primary {
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
}

.btn-primary:hover {
  background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
}

.btn-outline-secondary {
  border: 2px solid #6c757d;
  color: #6c757d;
}

.btn-outline-secondary:hover {
  background-color: #6c757d;
  transform: translateY(-1px);
  box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
}

.file-upload-wrapper {
  position: relative;
}

.file-upload-wrapper input[type="file"] {
  cursor: pointer;
}

.file-upload-wrapper input[type="file"]::-webkit-file-upload-button {
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  margin-right: 10px;
  transition: all 0.3s ease;
}

.file-upload-wrapper input[type="file"]::-webkit-file-upload-button:hover {
  background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
  transform: translateY(-1px);
}

.progress {
  height: 8px;
  border-radius: 10px;
  background-color: #e9ecef;
  overflow: hidden;
}

.progress-bar {
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  border-radius: 10px;
}

.text-primary {
  color: #4facfe !important;
}

.shadow-lg {
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
}

.shadow-sm {
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
  .card-body {
    padding: 2rem 1.5rem !important;
  }

  .btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
  }

  .form-control-lg {
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
  }
}

/* Animation for form validation */
.was-validated .form-control:invalid {
  animation: shake 0.5s ease-in-out;
}

@keyframes shake {
  0%, 100% {
    transform: translateX(0);
  }
  10%, 30%, 50%, 70%, 90% {
    transform: translateX(-5px);
  }
  20%, 40%, 60%, 80% {
    transform: translateX(5px);
  }
}

/* Loading state styles */
.progress-container .card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
}

/* Custom scrollbar for textarea */
textarea.form-control::-webkit-scrollbar {
  width: 8px;
}

textarea.form-control::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
}

textarea.form-control::-webkit-scrollbar-thumb {
  background: #4facfe;
  border-radius: 10px;
}

textarea.form-control::-webkit-scrollbar-thumb:hover {
  background: #00f2fe;
}
</style>