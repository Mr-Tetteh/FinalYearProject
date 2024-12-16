<script setup>
import {ref} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatients from "@/composerbles/usePatients.js";

const {input, register_patient} = usePatients()
const registerPatient = () => {
  register_patient()
};
</script>
<template>
  <div class="hospital-dashboard">
    <div class="d-flex">
      <!-- Sidebar -->
      <AdminNavBar/>
      <div class="patient-registration-form">
        <div class="card shadow-lg border-0">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Patient Registration</h4>
          </div>
          <div class="card-body">
            <form @submit.prevent="registerPatient">
              <!-- Patient Details -->
              <h5 class="mb-3">Patient Details</h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="fullName" class="form-label">Full Name</label>
                  <input
                      type="text"
                      id="fullName"
                      v-model="input.full_name"
                      class="form-control"
                      placeholder="Enter full name"
                      required
                  />
                </div>
                <div class="col-md-6">
                  <label for="age" class="form-label">Age</label>
                  <input
                      type="number"
                      id="age"
                      v-model="input.age"
                      class="form-control"
                      placeholder="Enter age"
                      required
                  />
                </div>
                <div class="col-md-6">
                  <label for="gender" class="form-label">Gender</label>
                  <select
                      id="gender"
                      v-model="input.gender"
                      class="form-select"
                      required
                  >
                    <option selected disabled>Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="dob" class="form-label">Date of Birth</label>
                  <input
                      type="date"
                      id="dob"
                      v-model="input.date_of_birth"
                      class="form-control"
                      required
                  />
                </div>
              </div>

              <hr class="my-4"/>

              <!-- Contact Information -->
              <h5 class="mb-3">Contact Information</h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input
                      type="tel"
                      id="phone"
                      v-model="input.contact"
                      class="form-control"
                      placeholder="Enter phone number"
                      required
                  />
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email Address</label>
                  <input
                      type="email"
                      id="email"
                      v-model="input.email"
                      class="form-control"
                      placeholder="Enter email address"
                  />
                </div>
                <div class="col-12">
                  <label for="address" class="form-label">Home Address</label>
                  <textarea
                      id="address"
                      v-model="input.address"
                      class="form-control"
                      rows="3"
                      placeholder="Enter home address"
                      required
                  ></textarea>
                </div>
              </div>

              <hr class="my-4"/>

              <!-- Medical History -->
              <h5 class="mb-3">Medical History</h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="medicalCondition" class="form-label">Medical Condition</label>
                  <input
                      type="text"
                      id="medicalCondition"
                      v-model="input.medical_history"
                      class="form-control"
                      placeholder="E.g., Diabetes, Hypertension"
                      required
                  />
                </div>
                <div class="col-md-6">
                  <label for="allergies" class="form-label">Allergies</label>
                  <input
                      type="text"
                      id="allergies"
                      v-model="input.allergies"
                      class="form-control"
                      placeholder="E.g., Peanuts, Dust"
                  />
                </div>
                <div class="col-12">
                  <label for="notes" class="form-label">Additional Notes</label>
                  <textarea
                      id="notes"
                      v-model="input.additional_notes"
                      class="form-control"
                      rows="3"
                      placeholder="Enter any additional medical notes"
                  ></textarea>
                </div>
              </div>

              <hr class="my-4"/>

              <!-- Submit Button -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">
                  Register Patient
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
.patient-registration-form {
  max-width: 800px;
  margin: 2rem auto;
}

.card-header {
  border-radius: 10px 10px 0 0;
}

.card {
  border-radius: 10px;
}

button {
  border-radius: 5px;
}
</style>
