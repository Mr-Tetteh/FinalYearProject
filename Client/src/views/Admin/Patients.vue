<script setup>
import {onMounted, ref} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatients from "@/composerbles/usePatients.js";
import useSession from "@/composerbles/useSession.js";

const {input, register_patient} = usePatients()

const registerPatient = () => {
  register_patient()
};
</script>
<template>
  <div class="hospital-dashboard main">
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
                  <label for="fullName" class="form-label">First name</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control"
                             placeholder="First Name" id="first-name-icon" v-model="input.first_name">
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="fullName" class="form-label">Last name</label>

                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control"
                             placeholder="Last Name" id="first-name-icon" v-model="input.last_name"
                      >
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="fullName" class="form-label">other names</label>

                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control"
                             placeholder="Other Name" id="first-name-icon" v-model="input.other_name"
                      >
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="fullName" class="form-label">Age </label>

                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="number" class="form-control"
                             placeholder="Age" id="first-name-icon" v-model="input.age"
                      >
                      <div class="form-control-icon">
                        <i class="bi bi-calendar-date"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="gender" class="form-label">Gender</label>
                  <select
                      id="gender"
                      v-model="input.gender"
                      class="form-select"

                  >

                    <option selected disabled>Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="fullName" class="form-label">Date of birth</label>

                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="date" class="form-control"
                             placeholder="Date of birth" id="first-name-icon" v-model="input.date_of_birth"
                      >
                      <div class="form-control-icon">
                        <i class="bi bi-calendar-date"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <hr class="my-4"/>

              <!-- Contact Information -->
              <h5 class="mb-3">Contact Information</h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="fullName" class="form-label">Contact</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="tel" class="form-control"
                             placeholder="Phone Number" id="first-name-icon" v-model="input.contact"
                      >
                      <div class="form-control-icon">
                        <i class="bi bi-phone"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="fullName" class="form-label">Email Address</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="email" class="form-control"
                             placeholder="Enter your email address" id="first-name-icon" v-model="input.email"
                      >
                      <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-12">
                  <label for="fullName" class="form-label">Home Address</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">

                      <textarea
                          id="address"
                          v-model="input.address"
                          class="form-control"
                          rows="3"

                      ></textarea>
                      <div class="form-control-icon">
                        <i class="bi bi-house"></i>
                      </div>
                    </div>
                  </div>
                </div>


              </div>

              <hr class="my-4"/>

              <!-- Contact Information -->
              <h5 class="mb-3">First Guardian Information</h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="guardian1FirstName" class="form-label">First Name *</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter First Name" id="guardian1FirstName" v-model="input.guardian1_first_name">
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian1LastName" class="form-label">Last Name *</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter Last Name" id="guardian1LastName" v-model="input.guardian1_last_name">
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian1OtherNames" class="form-label">Other Names</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter Other Names" id="guardian1OtherNames" v-model="input.guardian1_other_names">
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="guardian1Relation" class="form-label">Relation *</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter Relation (e.g., Parent)" id="guardian1Relation" v-model="input.guardian1_relation">
                      <div class="form-control-icon">
                        <i class="bi bi-people-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian1Residence" class="form-label">Residence *</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter Residence Address" id="guardian1Residence" v-model="input.guardian1_residence">
                      <div class="form-control-icon">
                        <i class="bi bi-house"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian1Contact" class="form-label">Contact *</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="tel" class="form-control" placeholder="Enter Contact Number" id="guardian1Contact" v-model="input.guardian1_contact">
                      <div class="form-control-icon">
                        <i class="bi bi-telephone"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <h5 class="mt-5">Second Guardian Information</h5>
              <div class="row g-3 mt-3">
                <div class="col-md-6">
                  <label for="guardian2FirstName" class="form-label">First Name *</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter First Name" id="guardian2FirstName" v-model="input.guardian2_first_name">
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian2LastName" class="form-label">Last Name</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter Last Name" id="guardian2LastName" v-model="input.guardian2_last_name">
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian2OtherNames" class="form-label">Other Names</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter Other Names" id="guardian2OtherNames" v-model="input.guardian2_other_names">
                      <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian2Relation" class="form-label">Relation</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter Relation" id="guardian2Relation" v-model="input.guardian2_relation">
                      <div class="form-control-icon">
                        <i class="bi bi-people-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian2Residence" class="form-label">Residence</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="text" class="form-control" placeholder="Enter Residence Address" id="guardian2Residence" v-model="input.guardian2_residence">
                      <div class="form-control-icon">
                        <i class="bi bi-house"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="guardian2Contact" class="form-label">Contact</label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input type="tel" class="form-control" placeholder="Enter Contact Number" id="guardian2Contact" v-model="input.guardian2_contact">
                      <div class="form-control-icon">
                        <i class="bi bi-telephone"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>




              <hr class="my-4"/>

              <!-- Medical History -->
              <h5 class="mb-3">Medical History</h5>
              <div class="row g-3">

                <div class="col-md-6">
                  <label for="fullName" class="form-label">Underlying condition </label>
                  <div class="form-group has-icon-left">
                    <div class="position-relative">
                      <input
                          type="text"
                          id="medicalCondition"
                          v-model="input.medical_history"
                          class="form-control"
                          placeholder="E.g., Diabetes, Hypertension"

                      />
                      <div class="form-control-icon">
                        <i class="bi bi-clipboard-check"></i>
                      </div>
                    </div>
                  </div>
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


                <div class="col-md-12">
                  <div class="form-group">
                    <label for="notes" class="form-label">Additional Note</label>
                    <div class="input-group has-icon-left">
      <textarea
          id="notes"
          v-model="input.additional_notes"
          class="form-control"
          rows="3"
          placeholder="Enter any additional medical notes"
      ></textarea>
                      <span class="input-group-text">
        <i class="bi bi-pencil-square"></i>
      </span>
                    </div>
                    <div class="form-text">
                      Enter any additional notes or comments related to the patient's medical history.
                    </div>
                  </div>
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

.main {
  background-image: url("@/assets/img/istockphoto-1344935909-2048x2048.jpg");
  border-radius: 1%;
  background-size: cover;

}

main::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(255, 255, 255, 0.1); /* Adjust opacity and color as needed */
}
</style>
