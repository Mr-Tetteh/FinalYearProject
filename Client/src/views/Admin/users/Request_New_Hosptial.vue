<script setup>
import NavBar from "@/components/NavBar.vue";
import useHospitalRequest from "@/composerbles/useHospitalRequest.js";
import {onMounted} from "vue";

const {input, requestHospital, request_hospital, request_hospitals_data} = useHospitalRequest()

const onSubmit = async () => {
  await requestHospital()
}

onMounted(async () => {
  await request_hospital()
})
</script>

<template>
  <NavBar/>

  <!-- Hero Section -->
  <div class="hero-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h1 class="display-4 fw-bold text-white mb-3">Hospital Request</h1>
          <p class="lead text-white-50">Request to join a hospital of your choice</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Form Section -->
  <div class="form-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="form-card">
            <div class="card-header">
              <h3 class="mb-0 text-center">
                <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"/>
                  <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                  <line x1="19" y1="8" x2="19" y2="14" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"/>
                  <line x1="22" y1="11" x2="16" y2="11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"/>
                </svg>
                Information Detail
              </h3>
            </div>

            <form class="p-4" @submit.prevent="onSubmit">
              <!-- Email -->
              <div class="mb-4">
                <label for="email" class="form-label fw-semibold">
                  <svg class="me-2 text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                    <path d="m4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2h-16c-1.1 0-2-.9-2-2v-12c0-1.1.9-2 2-2z"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                  </svg>
                  Email Address
                </label>
                <input
                    type="email"
                    class="form-control form-control-lg"
                    id="email"
                    placeholder="Enter your email address"
                    v-model="input.email"
                >
              </div>

              <!-- Unique ID -->
              <div class="mb-4">
                <label for="uniqueId" class="form-label fw-semibold">
                  <svg class="me-2 text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="1" y1="10" x2="23" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                  </svg>
                  Unique ID
                </label>
                <input
                    type="text"
                    class="form-control form-control-lg"
                    id="uniqueId"
                    placeholder="Enter unique identifier"
                    v-model="input.unique_id"
                >
              </div>

              <!-- Name Fields Row -->

              <!-- Position and Contact Row -->
              <div class="mb-4">
                <label for="contact" class="form-label fw-semibold">
                  <svg class="me-2 text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  Contact Number
                </label>
                <input
                    type="tel"
                    class="form-control form-control-lg"
                    id="contact"
                    placeholder="Enter phone number"
                    v-model="input.contact"
                >
                <span class="text-muted font-size-sm">contact should be in this format: 233244xxxxxxxx</span>

              </div>

              <!-- Hospital Selection -->
              <div class="mb-4">
                <label for="hospital" class="form-label fw-semibold">
                  <svg class="me-2 text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="13" y1="8" x2="13" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <line x1="11" y1="10" x2="15" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                  </svg>
                  Select Hospital
                </label>
                <select class="form-select form-select-lg" id="hospital" v-model="input.hospital">
                  <option value="" disabled selected>Select Hospital</option>
                  <option  v-for="requests in request_hospitals_data" :value="requests.hospital_name" key="requests.id">{{requests.hospital_name}}</option>

                </select>
              </div>

              <!-- Submit Button -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg submit-btn">
                  <svg class="me-2" width="20" height="20" viewBox="0 0 24 24" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                    <line x1="22" y1="2" x2="11" y2="13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <polygon points="22,2 15,22 11,13 2,9 22,2" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  Submit Request
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Hero Section */
.hero-section {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  padding: 80px 0 60px 0;
  margin-bottom: -40px;
  position: relative;
  overflow: hidden;
}

.hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" fill-opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" fill-opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" fill-opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
  opacity: 0.3;
}

/* Form Section */
.form-section {
  padding: 60px 0 80px 0;
  background: linear-gradient(to bottom, #f8f9fa 0%, #ffffff 100%);
  min-height: 100vh;
}

/* Form Card */
.form-card {
  background: white;
  border-radius: 20px;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
  border: none;
  overflow: hidden;
  transform: translateY(0);
  transition: all 0.3s ease;
}

.form-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
}

.card-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border: none;
  padding: 25px 30px;
  color: white;
}

.card-header h3 {
  font-weight: 600;
  font-size: 1.5rem;
}

/* Form Controls */
.form-control, .form-select {
  border: 2px solid #e9ecef;
  border-radius: 12px;
  padding: 14px 16px;
  font-size: 1rem;
  transition: all 0.3s ease;
  background-color: #ffffff;
}

.form-control:focus, .form-select:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
  background-color: #ffffff;
}

.form-control::placeholder {
  color: #6c757d;
  opacity: 0.8;
}

/* Labels */
.form-label {
  color: #495057;
  margin-bottom: 8px;
  font-size: 0.95rem;
  display: flex;
  align-items: center;
}

.form-label svg {
  width: 18px;
  height: 18px;
  flex-shrink: 0;
}

/* Form Text */
.form-text {
  color: #6c757d;
  font-size: 0.85rem;
}

/* Custom Checkbox */
.form-check-custom {
  padding: 15px;
  background-color: #f8f9fa;
  border-radius: 10px;
  border: 1px solid #e9ecef;
}

.form-check-input:checked {
  background-color: #667eea;
  border-color: #667eea;
}

.form-check-input:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

/* Submit Button */
.submit-btn {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border: none;
  border-radius: 12px;
  padding: 16px 24px;
  font-size: 1.1rem;
  font-weight: 600;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.submit-btn:hover {
  background: linear-gradient(135deg, #5a67d8 0%, #6b5b95 100%);
  transform: translateY(-2px);
  box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
}

.submit-btn:active {
  transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-section {
    padding: 60px 0 40px 0;
  }

  .form-section {
    padding: 40px 0 60px 0;
  }

  .form-card {
    margin: 0 15px;
    border-radius: 15px;
  }

  .card-header {
    padding: 20px 25px;
  }

  .card-header h3 {
    font-size: 1.3rem;
  }
}

/* Loading Animation for Submit Button */
.submit-btn.loading {
  pointer-events: none;
}

.submit-btn.loading::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  margin: auto;
  border: 2px solid transparent;
  border-top-color: #ffffff;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/* Focus indicators for accessibility */
.form-control:focus-visible,
.form-select:focus-visible,
.btn:focus-visible {
  outline: 2px solid #667eea;
  outline-offset: 2px;
}
</style>