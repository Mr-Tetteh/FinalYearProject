<script setup>
import {onMounted, ref, computed} from "vue";
import {RouterLink} from "vue-router";
import useAuth from "@/composerbles/useAuth.js";
import AdminNavBar from "@/components/AdminNavBar.vue";
import useSession from "@/composerbles/useSession.js";

const {input, register, hospital, hospitals_in_system, is_loading} = useAuth();
const {userRole, hospital_id} = useSession()

const showPassword = ref(false);


const togglePasswordVisibility = () => {
  showPassword.value = !showPassword.value;
};
const registerUser = async () => {
  await register();
};
onMounted(hospital);
</script>

<template>
  <div class="registration-page min-vh-100 d-flex justify-content-center align-items-center py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
          <div class="card border-0 shadow-lg overflow-hidden">
            <div class="row g-0">
              <!-- Left Column -->
              <div class="col-lg-4 bg-primary text-white d-flex flex-column justify-content-center p-4 p-lg-5">
                <div class="text-center">
                  <div class="mb-4">
                    <i class="bi bi-hospital display-1"></i>
                  </div>
                  <h2 class="h3 mb-4">Swift Care</h2>
                  <p class="lead mb-4">Join our healthcare community and make a difference in patients' lives.</p>
                  <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center">
                      <i class="bi bi-check-circle-fill me-2"></i>
                      <span>Professional Healthcare Network</span>
                    </div>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-check-circle-fill me-2"></i>
                      <span>Seamless Communication</span>
                    </div>
                    <div class="d-flex align-items-center">
                      <i class="bi bi-check-circle-fill me-2"></i>
                      <span>Efficient Patient Care</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Right Column -->
              <div class="col-lg-8 bg-white">
                <div class="p-4 p-lg-5">
                  <h3 class="text-center mb-4">Staff Registration</h3>

                  <form @submit.prevent="registerUser" class="needs-validation">
                    <div class="row g-3">
                      <!-- Personal Information -->
                      <div class="col-md-6">
                        <label class="form-label">First Names</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="input.first_name"
                            @input="input.first_name = input.first_name.replace(/[^a-zA-Z\s]/g, '')"
                        />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="input.last_name"
                            @input="input.last_name = input.last_name.replace(/[^a-zA-Z\s]/g, '')"
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Other Names</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="input.other_names"
                            @input="input.other_names = input.other_names.replace(/[^a-zA-Z\s]/g, '')"
                        />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Contact</label>
                        <input
                            type="tel"
                            class="form-control"
                            v-model="input.contact"
                            @input="input.contact = input.contact.replace(/[^0-9]/g, '')"
                        />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Date Of Birth</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="input.date_of_birth"
                        />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select
                            class="form-select"
                            v-model="input.gender"
                        >
                          <option value="" disabled selected>Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>

                      <!-- Professional Information -->
                      <div class="col-md-6">
                        <label class="form-label">Position</label>
                        <select
                            class="form-select"
                            v-model="input.position"
                        >
                          <option value="" disabled selected>Select Role</option>
                          <option value="Receptionist">Receptionist</option>
                          <option value="Doctor">Doctor</option>
                          <option value="Nurse">Nurse</option>
                          <option value="Pharmacist">Pharmacist</option>
                          <option value="Accountant">Accountant</option>
                          <option value="Manager">Manager</option>
                          <option value="Lab Technician">Lab Technician</option>
                          <!--                          <option v-if="userRole === 'Admin'" value="Admin">Admin</option>-->

                        </select>
                      </div>
                      <!-- Contact Information -->
                      <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            v-model="input.email"
                        />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                      <i class="bi bi-lock"></i>
                    </span>
                          <input
                              :type="showPassword ? 'text' : 'password'"
                              class="form-control border-start-0 border-end-0"
                              id="password"
                              placeholder="Password"
                              v-model="input.password"
                          />
                          <button
                              class="input-group-text bg-light border-start-0"
                              type="button"
                              @click="togglePasswordVisibility"
                          >
                            <i :class="showPassword ? 'bi bi-eye-slash' : 'bi bi-eye'"></i>
                          </button>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                      <i class="bi bi-lock"></i>
                    </span>
                          <input
                              :type="showPassword ? 'text' : 'password'"
                              class="form-control border-start-0 border-end-0"
                              id="password"
                              placeholder="Password"
                              v-model="input.confirm_password"
                          />
                          <button
                              class="input-group-text bg-light border-start-0"
                              type="button"
                              @click="togglePasswordVisibility"
                          >
                            <i :class="showPassword ? 'bi bi-eye-slash' : 'bi bi-eye'"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4">
                      <button type="submit" class="btn btn-primary w-100 py-2" :disabled="is_loading">Creat Staff
                        Account
                      </button>
                    </div>
                  </form>
                  <span>Already have an account? <RouterLink to="login" class="text-decoration-none">Login</RouterLink></span>
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
.registration-page {
  background-image: url("@/assets/img/Doctors-bro.svg");
  background-position: center;
  position: relative;
}

.registration-page::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(255, 255, 255, 0.9);
  z-index: 0;
}

.container {
  position: relative;
  z-index: 1;
}

.card {
  border-radius: 1rem;
}

.form-control,
.form-select {
  padding: 0.75rem 1rem;
  border-radius: 0.5rem;
  border: 1px solid #dee2e6;
  transition: all 0.2s ease-in-out;
}

.form-control:focus,
.form-select:focus {
  border-color: #6c63ff;
  box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
}

.btn-primary {
  background-color: #6c63ff;
  border-color: #6c63ff;
  padding: 0.75rem 1.5rem;
  font-weight: 500;
  transition: all 0.2s ease-in-out;
}

.btn-primary:hover:not(:disabled) {
  background-color: #5b52ff;
  border-color: #5b52ff;
  transform: translateY(-1px);
}

.bg-primary {
  background-color: #6c63ff !important;
}

.form-label {
  font-weight: 500;
  margin-bottom: 0.5rem;
}

.invalid-feedback {
  font-size: 0.875rem;
}

@media (max-width: 991.98px) {
  .card {
    margin: 1rem;
  }
}
</style>