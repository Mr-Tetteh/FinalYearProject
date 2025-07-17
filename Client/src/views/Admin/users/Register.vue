<script setup>
import { onMounted, ref, computed } from "vue";
import { RouterLink } from "vue-router";
import useAuth from "@/composerbles/useAuth.js";
import AdminNavBar from "@/components/AdminNavBar.vue";
import useSession from "@/composerbles/useSession.js";

const { input, register, hospital, hospitals_in_system } = useAuth();
const {userRole} = useSession()

const registerUser = async () => {
  register()
};

onMounted(hospital);
</script>

<template>
  <AdminNavBar />
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
                        <label class="form-label">Birthday</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="input.birthday"
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
                        <label class="form-label">Role</label>
                        <select
                            class="form-select"
                            v-model="input.role"
                        >
                          <option value="" disabled selected>Select Role</option>
                          <option value="Receptionist">Receptionist</option>
                          <option value="Doctor">Doctor</option>
                          <option value="Nurse">Nurse</option>
                          <option value="Pharmacist">Pharmacist</option>
                          <option value="Account">Account</option>
                          <option value="Manager">Manager</option>
                          <option value="Lab Technician">Lab Technician</option>


                        </select>
                      </div>
                      <div class="col-md-6" v-if="userRole === 'Admin'">
                        <label class="form-label">Hospital</label>
                        <select
                            class="form-select"
                            v-model="input.hospital"
                        >
                          <option value="" disabled selected>Select Hospital</option>
                          <option
                              v-for="hospital in hospitals_in_system"
                              :key="hospital.id"
                              :value="hospital.hospital_name"
                          >
                            {{ hospital.hospital_name }}
                          </option>
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
                        <label class="form-label">Staff ID</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="input.staff_id"
                        />
                      </div>

                    </div>

                    <div class="mt-4">
                      <button
                          type="submit"
                          class="btn btn-primary w-100 py-2"
                      >
                        <span class="  me-2"> Creat Staff Account</span>
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