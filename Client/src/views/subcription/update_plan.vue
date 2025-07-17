<script setup>
import NavBar from '@/components/NavBar.vue';
import useHospital from '@/composerbles/useHospital';
import useAuth from '@/composerbles/useAuth';
import { onMounted } from 'vue';
const { plan_input, is_loading } = useHospital();

const {hospital, hospitals_in_system } = useAuth();



onMounted(hospital)
</script>
<template>
  <div>
    <NavBar />
    <div class="register-page d-flex align-items-center justify-content-center min-vh-100">
      <div class="container">
        <div class="row ">
          <div class="col-6 col-xl-10 justify-content-center">
            <div class="card main-card shadow-lg border-0">
              <!-- Card Header with Gradient -->
              <div class="card-header text-center py-4 gradient-header">
                <h2 class="mb-0 text-white fw-bold display-6">Hospital Registration</h2>
                <p class="text-white-50 mb-0">Join our network of healthcare providers</p>
              </div>
      <!-- Card Body with Side-by-Side Layout -->
              <div class="card-body p-0">
                <div class="row g-0">
                  <!-- Left Side - Image -->
                  <div class="col-lg-6 image-section">
                    <div class="image-container d-flex align-items-center justify-content-center h-100">
                      <div class="image-content text-center">
                        <img src="../../assets/img/Credit Card Payment-amico.svg" alt="Credit Card Payment" class="img-fluid main-illustration">
                        <div class="image-text mt-4">
                          <h4 class="text-primary fw-bold mb-3">Secure Payment Processing</h4>
                          <p class="text-muted">Easy and secure payment options for your hospital registration</p>
                          <div class="feature-highlights">
                            <div class="feature-item">
                              <i class="fas fa-shield-alt text-success me-2"></i>
                              <span>SSL Encrypted</span>
                            </div>
                            <div class="feature-item">
                              <i class="fas fa-lock text-primary me-2"></i>
                              <span>PCI Compliant</span>
                            </div>
                            <div class="feature-item">
                              <i class="fas fa-check-circle text-success me-2"></i>
                              <span>Instant Approval</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Right Side - Form -->
                  <div class="col-lg-6 form-section">
                    <div class="form-container p-4 p-md-5">
                      <div class="form-header mb-4">
                        <h3 class="fw-bold text-dark mb-2">Complete Registration</h3>
                        <p class="text-muted">Fill in your details to get started</p>
                      </div>

                      <form class="registration-form" @submit.prevent="submitForm">
                        <div class="row g-4">
                          <!-- Hospital Name -->
                          <div class="col-12">
                            <div class="form-floating position-relative">
                              <select
                                id="hospital_address"
                                class="form-select form-select-lg enhanced-select"
                                v-model="plan_input.hospital_name"
                                required
                              >
                                <option value="" disabled selected></option>
                                <option v-for="hospital in hospitals_in_system" :key="hospital.id" value="{{hospital.id}}">{{hospital.hospital_name }}</option>
                    
                              </select>
                              <label for="hospital_address" class="fw-semibold">
                                Hospital Name
                              </label>
                              <div class="form-icon">
                                <i class="fas fa-hospital-alt"></i>
                              </div>
                            </div>
                          </div>

                          <!-- Monthly Payment -->
                          <div class="col-12">
                            <div class="form-floating position-relative">
                              <select
                                id="monthly_subscription"
                                class="form-select form-select-lg enhanced-select"
                                v-model="plan_input.subscription_type"
                                required
                              >
                                <option value="" disabled selected></option>
                                <option value="50">1 Month - GHC50</option>
                                <option value="150">6 Months - GHC150 (Save 50%)</option>
                                <option value="250">1 Year - GHC250 (Best Value)</option>
                              </select>
                              <label for="monthly_subscription" class="fw-semibold">
                                Payment Plan
                              </label>
                              <div class="form-icon">
                                <i class="fas fa-credit-card"></i>
                              </div>
                            </div>
                          </div>

                          <!-- Plan Benefits -->
                          <div class="col-12">
                            <div class="plan-benefits">
                              <h6 class="fw-semibold text-dark mb-3">
                                <i class="fas fa-star text-warning me-2"></i>
                                What's Included
                              </h6>
                              <div class="benefits-list">
                                <div class="benefit-item">
                                  <i class="fas fa-check-circle text-success me-2"></i>
                                  <span>Patient Management System</span>
                                </div>                    
                                <div class="benefit-item">
                                  <i class="fas fa-check-circle text-success me-2"></i>
                                  <span>Billing & Invoicing</span>
                                </div>
                                <div class="benefit-item">
                                  <i class="fas fa-check-circle text-success me-2"></i>
                                  <span>24/7 Technical Support</span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Submit Button -->
                          <div class="col-12 mt-4">
                            <button
                              :disabled="is_loading"
                              type="submit"
                              class="btn btn-primary btn-lg w-100 gradient-btn py-3"
                            >
                              <span class="button-content" v-if="!is_loading">
                                <i class="fas fa-hospital-user me-2"></i>
                                Register Hospital
                              </span>
                              <span v-else class="button-content">
                                <i class="fas fa-spinner fa-spin me-2"></i>
                                Processing...
                              </span>
                            </button>
                          </div>

                          <!-- Trust Indicators -->
                          <div class="col-12">
                            <div class="trust-indicators text-center mt-3">
                              <div class="row g-2">
                                <div class="col-4">
                                  <div class="trust-item">
                                    <i class="fas fa-shield-alt text-success mb-1"></i>
                                    <small class="text-muted d-block">Secure</small>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="trust-item">
                                    <i class="fas fa-clock text-primary mb-1"></i>
                                    <small class="text-muted d-block">Fast Setup</small>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="trust-item">
                                    <i class="fas fa-headset text-warning mb-1"></i>
                                    <small class="text-muted d-block">24/7 Support</small>
                                  </div>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.register-page {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  padding: 2rem 0;
  min-height: 100vh;
}

.main-card {
  border-radius: 20px;
  background: white;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  max-width: 6000px;
  margin: 0 auto;
  animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.gradient-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border: none;
}

.image-section {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  border-right: 1px solid #dee2e6;
  min-height: 800px;
}

.image-container {
  padding: 2rem;
}

.main-illustration {
  max-width: 300px;
  height: auto;
}

.feature-highlights {
  margin-top: 1.5rem;
}

.feature-item {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 0.5rem;
  font-size: 0.9rem;
}

.form-section {
  background: white;
  min-height: 600px;
}

.form-container {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.form-header {
  text-align: center;
  position: relative;
}

.form-header::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 50px;
  height: 3px;
  background: linear-gradient(45deg, #667eea, #764ba2);
  border-radius: 2px;
}

.enhanced-select {
  border: 2px solid #e9ecef;
  border-radius: 15px;
  padding: 1.2rem 3rem 1.2rem 3.5rem;
  font-size: 1rem;
  transition: all 0.3s ease;
  background: #fff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
}

.enhanced-select:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
  transform: translateY(-2px);
}

.enhanced-select:hover {
  border-color: #667eea;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.15);
}

.form-floating {
  position: relative;
  margin-bottom: 1.5rem;
}

.form-floating label {
  color: #495057;
  font-weight: 500;
  padding-left: 3.5rem;
  font-size: 0.9rem;
}

.form-icon {
  position: absolute;
  left: 1.2rem;
  top: 50%;
  transform: translateY(-50%);
  color: #667eea;
  font-size: 1.2rem;
  z-index: 4;
}

.gradient-btn {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border: none;
  border-radius: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.gradient-btn:hover:not(:disabled) {
  background: linear-gradient(135deg, #5a67d8 0%, #667eea 100%);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.gradient-btn:active {
  transform: translateY(0);
}

.gradient-btn:disabled {
  opacity: 0.7;
  cursor: not-allowed;
  transform: none;
}

.plan-benefits {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  border-radius: 15px;
  padding: 1.5rem;
  border: 1px solid #dee2e6;
  transition: all 0.3s ease;
}

.plan-benefits:hover {
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.benefits-list {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.benefit-item {
  display: flex;
  align-items: center;
  font-size: 0.9rem;
  color: #495057;
}

.trust-indicators {
  margin-top: 1rem;
  padding: 1rem;
  background: rgba(102, 126, 234, 0.05);
  border-radius: 10px;
}

.trust-item {
  text-align: center;
}

.trust-item i {
  font-size: 1.5rem;
  display: block;
}

/* Mobile Responsive */
@media (max-width: 991.98px) {
  .image-section {
    border-right: none;
    border-bottom: 1px solid #dee2e6;
    min-height: 400px;
  }
  
  .form-container {
    min-height: auto;
  }
  
  .main-illustration {
    max-width: 250px;
  }
}

@media (max-width: 768px) {
  .display-6 {
    font-size: 1.5rem;
  }
  
  .image-container {
    padding: 1.5rem;
  }
  
  .form-container {
    padding: 2rem 1.5rem;
  }
  
  .main-illustration {
    max-width: 200px;
  }
}
</style>