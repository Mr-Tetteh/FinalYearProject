<script setup>
import { onMounted, ref, reactive } from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatients from "@/composerbles/usePatients.js";
import useSession from "@/composerbles/useSession.js";


import Stepper from 'primevue/stepper';
import StepList from 'primevue/steplist';
import StepPanels from 'primevue/steppanels';
import StepItem from 'primevue/stepitem';
import Step from 'primevue/step';
import StepPanel from 'primevue/steppanel';
import Button from 'primevue/button';

const { input, register_patient } = usePatients();
const currentStep = ref("1");




const handleSubmit = async () => {
 await register_patient()
}
</script>

<template>
  <div class="hospital-dashboard main">
    <div class="d-flex">
      <!-- Sidebar -->
      <AdminNavBar />

      <div class="content-wrapper">
        <div class="patient-registration-form">
          <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0">Patient Registration</h4>
              <p class="text-white-50 mb-0">Please fill in the patient information below</p>
            </div>

            <div class="card-body">
              <div class="stepper-container">
                <Stepper v-model:value="currentStep">
<!--                  <StepList>
                    <Step value="1"> Patient Details</Step>
                    <Step value="2"> Contact Info</Step>
                    <Step value="3"> Medical History</Step>
                    <Step value="4"> Primary Guardian</Step>
                    <Step value="5"> Secondary Guardian</Step>
                  </StepList>-->

                  <form @submit.prevent="handleSubmit">
                    <StepPanels>
                      <!-- Step 1: Patient Details -->
                      <StepPanel v-slot="{ activateCallback }" value="1">
                        <div class="panel-content">
                          <h5 class="section-title text-center">
                            <i class="bi bi-info-circle-fill me-2"></i> Basic Information
                          </h5>
                          <div class="row g-3">
                            <div class="col-md-6">
                              <label for="first-name" class="form-label">First name <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control"
                                         @input="input.first_name = input.first_name.replace(/[^a-zA-Z\s]/g, '')"
                                         placeholder="First Name" id="first-name" v-model="input.first_name">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>

                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="last-name" class="form-label">Last name <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control"
                                         @input="input.last_name = input.last_name.replace(/[^a-zA-Z\s]/g, '')"
                                         placeholder="Last Name" id="last-name" v-model="input.last_name">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="other-name" class="form-label">Other names</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control"
                                         @input="input.other_name = input.other_name.replace(/[^a-zA-Z\s]/g, '')"
                                         placeholder="Other Name" id="other-name" v-model="input.other_name">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="date-of-birth" class="form-label">Date of birth <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="date" class="form-control"
                                         id="date-of-birth" v-model="input.date_of_birth">
                                  <div class="form-control-icon">
                                    <i class="bi bi-calendar-date"></i>
                                  </div>

                                </div>
                              </div>
                            </div>


                            <div class="col-md-6">
                              <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <select id="gender" v-model="input.gender" class="form-select">
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                  <div class="form-control-icon">
                                    <i class="bi bi-gender-ambiguous"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                    <div class="button-group justify-content-center">
                      <Button label="Next" icon="pi pi-arrow-right" iconPos="right" class="w-auto btn bg-primary text-white rounded-3 p-1"
                              @click="activateCallback('2')" />
                    </div>
                      </StepPanel>

                      <!-- Step 2: Contact Information -->
                      <StepPanel v-slot="{ activateCallback }" value="2">
                        <div class="panel-content">
                          <h5 class="section-title text-center ">
                            <i class="bi bi-telephone-fill me-2"></i> Contact Details
                          </h5>

                          <div class="row g-3">
                            <div class="col-md-6">
                              <label for="contact" class="form-label">Phone Number <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="tel" class="form-control"
                                         @input="input.contact = input.contact.replace(/[^0-9]/g, '')"
                                         placeholder="Phone Number" id="contact" v-model="input.contact">
                                  <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="email" class="form-label">Email Address</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="email" class="form-control"
                                         placeholder="Email address" id="email" v-model="input.email">
                                  <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="address" class="form-label">GPS-Address/Residential Address  <span class="text-danger">*</span> </label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input id="address" v-model="input.address" class="form-control"
                                            placeholder="Enter GPS-Address/Residential Address"/>
                                  <div class="form-control-icon textarea-icon">
                                    <i class="bi bi-house"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="button-group">
                          <Button label="Back" severity="secondary" icon="pi pi-arrow-left" class="me-2 bg-success text-white rounded-3 p-1" @click="activateCallback('1')" />
                          <Button label="Next" icon="pi pi-arrow-right" class="bg-primary text-white rounded-3 p-1" iconPos="right" @click="activateCallback('3')" />
                        </div>
                      </StepPanel>

                      <!-- Step 3: Medical History -->
                      <StepPanel v-slot="{ activateCallback }" value="3">
                        <div class="panel-content">
                          <h5 class="section-title text-center">
                            <i class="bi bi-heart-pulse-fill me-2"></i> Medical Information
                          </h5>

                          <div class="row g-3">
                            <div class="col-md-6">
                              <label for="medical-condition" class="form-label">Underlying Conditions</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" id="medical-condition" v-model="input.medical_history"
                                         @input="input.medical_history = input.medical_history.replace(/[^a-zA-Z\s,]/g, '')"
                                         class="form-control" placeholder="E.g., Diabetes, Hypertension">
                                  <div class="form-control-icon">
                                    <i class="bi bi-clipboard-check"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="allergies" class="form-label">Allergies</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" id="allergies" v-model="input.allergies"
                                          @input="input.allergies = input.allergies.replace(/[^a-zA-Z\s,]/g, '')"
                                         class="form-control" placeholder="E.g., Peanuts, Dust, Medications">
                                  <div class="form-control-icon">
                                    <i class="bi bi-exclamation-triangle"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <label for="notes" class="form-label">Additional Medical Notes</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <textarea id="notes" v-model="input.additional_notes" class="form-control"
                                            rows="3" placeholder="Enter any additional medical information"></textarea>
                                  <div class="form-control-icon textarea-icon">
                                    <i class="bi bi-pencil-square"></i>
                                  </div>
                                </div>
                                <small class="form-text text-muted">
                                  Include any relevant medical information that may be important for treatment.
                                </small>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="button-group">
                          <Button label="Back" severity="secondary" icon="pi pi-arrow-left" class="me-2 bg-success text-white rounded-3 p-1" @click="activateCallback('2')" />
                          <Button label="Next" icon="pi pi-arrow-right" class="bg-primary text-white rounded-3 p-1" iconPos="right" @click="activateCallback('4')" />
                        </div>
                      </StepPanel>

                      <!-- Step 4: First Guardian Information -->
                      <StepPanel v-slot="{ activateCallback }" value="4">
                        <div class="panel-content">
                          <h5 class="section-title text-center">
                            <i class="bi bi bi-person-fill me-2"></i> Primary Guardian Information
                          </h5>

                          <div class="row g-3">
                            <div class="col-md-6">
                              <label for="guardian1-first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control"
                                          @input="input.guardian1_first_name = input.guardian1_first_name.replace(/[^a-zA-Z\s]/g, '')"
                                         placeholder="First Name" id="guardian1-first-name" v-model="input.guardian1_first_name">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian1-last-name" class="form-label">Last Name</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control" placeholder="Last Name"
                                         @input="input.guardian1_last_name = input.guardian1_last_name.replace(/[^a-zA-Z\s]/g, '')"
                                         id="guardian1-last-name" v-model="input.guardian1_last_name">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian1-other-names" class="form-label">Other Names</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control" placeholder="Other Names"
                                          @input="input.guardian1_other_names = input.guardian1_other_names.replace(/[^a-zA-Z\s]/g, '')"
                                         id="guardian1-other-names" v-model="input.guardian1_other_names">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian1-relation" class="form-label">Relationship <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control"
                                  @input="input.guardian1_relation = input.guardian1_relation.replace(/[^a-zA-Z\s]/g, '')"
                                         placeholder="e.g. Parent, Grandparent" id="guardian1-relation" v-model="input.guardian1_relation">
                                  <div class="form-control-icon">
                                    <i class="bi bi-people-fill"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian1-residence" class="form-label">GPS-Address/ Residential Address  <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control" placeholder="GPS-Address/ Residential Address"
                                          @input="input.guardian1_residence = input.guardian1_residence.replace(/[^a-zA-Z0-9\s,]/g, '')"
                                         id="guardian1-residence" v-model="input.guardian1_residence">
                                  <div class="form-control-icon">
                                    <i class="bi bi-house"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian1-contact" class="form-label">Contact Number <span class="text-danger">*</span></label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="tel" class="form-control"
                                  @input="input.guardian1_contact = input.guardian1_contact.replace(/[^0-9]/g, '')"
                                         placeholder="Phone Number" id="guardian1-contact" v-model="input.guardian1_contact">
                                  <div class="form-control-icon">
                                    <i class="bi bi-telephone"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="button-group">
                          <Button label="Back" severity="secondary" icon="pi pi-arrow-left" class="me-2 bg-success text-white rounded-3 p-1"  @click="activateCallback('3')" />
                          <Button label="Next" icon="pi pi-arrow-right"  class="bg-primary text-white rounded-3 p-1" iconPos="right" @click="activateCallback('5')" />
                        </div>
                      </StepPanel>

                      <!-- Step 5: Second Guardian Information -->
                      <StepPanel v-slot="{ activateCallback }" value="5">
                        <div class="panel-content">
                          <h5 class="section-title text-center">
                            <i class="bi bi-person-vcard-fill me-2"></i> Secondary Guardian Information <span class="text-muted">(Optional)</span>
                          </h5>

                          <div class="row g-3">
                            <div class="col-md-6">
                              <label for="guardian2-first-name" class="form-label">First Name</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control" placeholder="First Name"
                                         @input="input.guardian2_first_name = input.guardian2_first_name.replace(/[^a-zA-Z\s]/g, '')"
                                         id="guardian2-first-name" v-model="input.guardian2_first_name">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian2-last-name" class="form-label">Last Name</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control" placeholder="Last Name"
                                         @input="input.guardian2_last_name = input.guardian2_last_name.replace(/[^a-zA-Z\s]/g, '')"
                                         id="guardian2-last-name" v-model="input.guardian2_last_name">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian2-other-names" class="form-label">Other Names</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control" placeholder="Other Names"
                                         @input="input.guardian2_other_names = input.guardian2_other_names.replace(/[^a-zA-Z\s]/g, '')"
                                         id="guardian2-other-names" v-model="input.guardian2_other_names">
                                  <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian2-relation" class="form-label">Relationship</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control" placeholder="e.g. Parent, Grandparent"
                                         @input="input.guardian2_relation = input.guardian2_relation.replace(/[^a-zA-Z\s]/g, '')"
                                         id="guardian2-relation" v-model="input.guardian2_relation">
                                  <div class="form-control-icon">
                                    <i class="bi bi-people-fill"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian2-residence" class="form-label">GPS-Address/ Residential Address</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="text" class="form-control" placeholder="GPS-Address/ Residential Address"
                                         @input="input.guardian2_residence = input.guardian2_residence.replace(/[^a-zA-Z0-9\s,]/g, '')"
                                         id="guardian2-residence" v-model="input.guardian2_residence">
                                  <div class="form-control-icon">
                                    <i class="bi bi-house"></i>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <label for="guardian2-contact" class="form-label">Contact Number</label>
                              <div class="form-group has-icon-left">
                                <div class="position-relative">
                                  <input type="tel" class="form-control" placeholder="Phone Number"
                                         @input="input.guardian2_contact = input.guardian2_contact.replace(/[^0-9]/g, '')"
                                         id="guardian2-contact" v-model="input.guardian2_contact">
                                  <div class="form-control-icon">
                                    <i class="bi bi-telephone"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="button-group">
                          <Button label="Back" severity="secondary" icon="pi pi-arrow-left" class="me-2 bg-success text-white rounded-3 p-1" @click="activateCallback('4')" />
                          <Button type="submit" label="Register Patient" icon="pi pi-check"
                                  :loading="loading" class="submit-btn bg-primary text-white rounded-3 p-3" severity="success"/>
                        </div>
                      </StepPanel>
                    </StepPanels>
                  </form>
                </Stepper>
              </div>
            </div>

            <div class="card-footer bg-light">
              <div class="progress-indicator">
                <div class="step-indicator">
                  Step {{ currentStep }} of 5
                </div>
                <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar"
                       :style="{ width: ((parseInt(currentStep)/5)*100) + '%' }"
                       :aria-valuenow="(parseInt(currentStep)/5)*100" aria-valuemin="0" aria-valuemax="100">
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
.hospital-dashboard {
  min-height: 100vh;
  position: relative;
}

.main {
  background-image: url("@/assets/img/Online Doctor-rafiki.svg");
  background-position: center;
  background-repeat: repeat;
  position: relative;
}

.button-group.justify-content-center {
  justify-content: center;
}

.content-wrapper {
  position: relative;
  z-index: 1;
  width: 100%;
  padding: 1rem;
}

.patient-registration-form {
  max-width: 1000px;
  margin: 2rem auto;
  position: relative;
}

.card {
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
  transition: all 0.3s ease;
}

.card:hover {
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15) !important;
}

.card-header {
  border-radius: 15px 15px 0 0;
  padding: 1.25rem 1.5rem;
}

.card-body {
  padding: 1.5rem;
}

.card-footer {
  padding: 1rem 1.5rem;
  border-top: 1px solid #e9ecef;
}

.section-title {
  color: #2c3e50;
  margin-bottom: 1.5rem;
  font-weight: 600;
  padding-bottom: 0.5rem;
  border-bottom: 2px solid #e9ecef;
}

.form-group {
  margin-bottom: 1rem;
}

.form-label {
  font-weight: 500;
  color: #344767;
  margin-bottom: 0.5rem;
}

.form-control, .form-select {
  border-radius: 8px;
  padding: 0.6rem 0.75rem;
  padding-left: 2.5rem;
  border: 1px solid #ced4da;
  transition: all 0.2s ease;
}

.form-control:focus, .form-select:focus {
  border-color: #4361ee;
  box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
}

.form-control-icon {
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
  color: #6c757d;
}

.textarea-icon {
  top: 1rem;
  transform: none;
}

.form-text {
  color: #6c757d;
  font-size: 0.8rem;
  margin-top: 0.25rem;
}

.stepper-container {
  padding: 0.5rem;
}

.panel-content {
  padding: 1.5rem 0.5rem;
  min-height: 400px;
}

.button-group {
  display: flex;
  justify-content: space-between;
  padding-top: 1.5rem;
  border-top: 1px solid #e9ecef;
}

.button-group button {
  min-width: 120px;
}

.submit-btn {
  background-color: #16a34a;
  border-color: #16a34a;
}

.submit-btn:hover {
  background-color: #15803d;
  border-color: #15803d;
}

.progress-indicator {
  margin-top: 0.5rem;
}

.step-indicator {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 0.5rem;
  font-weight: 500;
  color: #4b5563;
}

.progress {
  height: 0.5rem;
  border-radius: 0.25rem;
  background-color: #e9ecef;
}

.progress-bar {
  transition: width 0.3s ease;
}

/* PrimeVue Stepper Customization */
:deep(.p-stepper) {
  background: transparent;
  border: none;
}

:deep(.p-steplist) {
  margin-bottom: 2rem;
}

:deep(.p-step-action) {
  background-color: #f3f4f6;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 10px;
}

:deep(.p-step-title) {
  font-weight: 500;
  color: #4b5563;
}

:deep(.p-step-active .p-step-action) {
  background-color: #4361ee;
  color: white;
}

:deep(.p-step-active .p-step-title) {
  color: #4361ee;
  font-weight: 600;
}

:deep(.p-step-completed .p-step-action) {
  background-color: #16a34a;
  color: white;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .patient-registration-form {
    margin: 1rem;
    max-width: 100%;
  }

  .card-body {
    padding: 1rem;
  }

  .panel-content {
    min-height: 300px;
  }

  :deep(.p-steplist) {
    flex-direction: column;
  }

  :deep(.p-step) {
    margin-bottom: 0.5rem;
  }

  .button-group {
    flex-direction: column;
    gap: 0.5rem;
  }

  .button-group button {
    width: 100%;
  }
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

.panel-content {
  animation: fadeIn 0.3s ease-out;
}

/* Form validation styles */
.is-invalid {
  border-color: #dc3545 !important;
}

.invalid-feedback {
  display: block;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 0.875em;
  color: #dc3545;
}

/* Required field indicator */
.text-danger {
  color: #dc3545;
}

/* Dark mode considerations */
@media (prefers-color-scheme: dark) {
  .form-control, .form-select {
    background-color: #1f2937;
    border-color: #374151;
    color: #f3f4f6;
  }

  .form-label {
    color: #e5e7eb;
  }

  .section-title {
    color: #f3f4f6;
    border-bottom-color: #374151;
  }

  .card {
    background-color: #111827;
  }

  .card-footer {
    background-color: #1f2937;
    border-top-color: #374151;
  }

  .form-text {
    color: #9ca3af;
  }
}
</style>