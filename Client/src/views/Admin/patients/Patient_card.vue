<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import {useRoute} from "vue-router";
import usePatients from "@/composables/usePatients.js";
import {onMounted} from "vue";
import dayjs from "dayjs";
import advancedFormat from 'dayjs/plugin/advancedFormat'
import useSession from "@/composables/useSession.js";
dayjs.extend(advancedFormat)


const params = useRoute().params;
const {patient_card, card_details} = usePatients()


const getAge = (dob) => {
  return dayjs().diff(dayjs(dob), 'year')
}


onMounted( async () => {
  await patient_card(params.id)
})

const print = () => {
  const printContents = document.getElementById('print-section').innerHTML
  const originalContents = document.body.innerHTML
  document.body.innerHTML = printContents
  window.print()
  document.body.innerHTML = originalContents
  location.reload() // restore interactivity
}

</script>

<template>
  <AdminNavBar/>
  <div class="main min-vh-100 bg-light">
    <div id="main">
      <div class="mb-3 d-flex justify-content-end">
        <Button class="btn btn-secondary" @click="print">Print</Button>
      </div>

      <div id="print-section" class="page page-content px-4 ">
        <div class="patient-card">
          <!-- Hospital Header -->
          <div class="card-header-custom">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <div class="hospital-logo">
                  <i class="bi bi-hospital text-white fs-3"></i>
                </div>
                <div class="ms-3">
                  <h6 class="mb-0 text-white fw-bold" v-if="card_details.hospital">
                    {{ card_details.hospital.hospital_name }}
                  </h6>
                  <small class="text-white-50">Patient Identification Card</small>
                </div>
              </div>
              <div class="medical-cross">
                <i class="bi bi-plus-circle text-white fs-2"></i>
              </div>
            </div>
          </div>

          <!-- Patient Photo and Basic Info -->
        <div class="patient-main-info">
          <div class="row align-items-center">
            <div class="col-8">
              <span class="fw-bold fs-6">Surname:</span> <h5 class="badge text-primary fs-6 ml-5">{{card_details.last_name}}</h5>
            </div>
            <div class="col-8">
              <span class="fw-bold fs-6">Other names:</span> <h5 class="badge text-primary fs-6 ">{{ card_details.other_name }}</h5>
            </div>
            <div class="col-8">
              <span class="fw-bold fs-6">ID:</span><h5 class="badge text-primary fs-6"> {{ card_details.patient_number }}</h5>
            </div>
          </div>
        </div>

          <!-- Patient Details -->
          <div class="patient-details">
            <div class="row g-3">
              <div class="col-6">
                <div class="detail-item">
                  <div class="detail-icon">
                    <i class="bi bi-calendar3 text-primary"></i>
                  </div>
                  <div class="detail-content">
                    <small class="text-muted">Date of Birth</small>
                    <div class="fw-semibold">{{card_details.date_of_birth}}</div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="detail-item">
                  <div class="detail-icon">
                    <i class="bi bi-hourglass text-primary"></i>
                  </div>
                  <div class="detail-content">
                    <small class="text-muted">Age</small>
                    <div class="fw-semibold">{{ getAge(card_details.date_of_birth) }} years</div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="detail-item">
                  <div class="detail-icon">
                    <i class="bi bi-gender-ambiguous text-primary"></i>
                  </div>
                  <div class="detail-content">
                    <small class="text-muted">Gender</small>
                    <div class="fw-semibold">{{ card_details.gender }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- QR Code Footer -->
          <div class="card-footer-custom">
            <div class="d-flex justify-content-between align-items-center">
              <div class="qr-placeholder">
                <div class="qr-code">
                  <i class="bi bi-qr-code fs-4"></i>
                </div>
              </div>
              <div class="text-end">
                <small class="text-muted">Issued: {{ dayjs(card_details.created_at).format('Do MMM, YYYY') }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.page {
  margin: 5%;
  padding: 2%;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: 80vh;
}

.patient-card {
  width: 50%;
  background: white;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  border: 1px solid #e3f2fd;
}

.card-header-custom {
  background: linear-gradient(135deg, #1976d2 0%, #42a5f5 100%);
  padding: 20px;
  position: relative;
}

.hospital-logo {
  width: 50px;
  height: 50px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  backdrop-filter: blur(10px);
}

.medical-cross {
  opacity: 0.7;
}

.patient-main-info {
  padding: 25px;
  background: #f8fffe;
  border-bottom: 1px solid #e0e7ff;
}



.patient-details {
  padding: 25px;
}

.detail-item {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
}

.detail-icon {
  width: 35px;
  height: 35px;
  background: #f0f8ff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 12px;
  font-size: 16px;
}

.detail-content small {
  display: block;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.card-actions .btn {
  border-radius: 10px;
  font-weight: 600;
  padding: 12px;
  transition: all 0.3s ease;
}

.card-actions .btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.card-footer-custom {
  background: #f5f5f5;
  padding: 15px 25px;
  border-top: 1px solid #e0e0e0;
}

.qr-code {
  width: 50px;
  height: 50px;
  background: white;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 2px solid #ddd;
}

/* Responsive Design */
@media (max-width: 768px) {
  .page {
    margin: 2%;
    padding: 1%;
  }

  .patient-card {
    width: 100%;
    max-width: 400px;
  }

  .card-header-custom {
    padding: 15px;
  }

  .patient-main-info,
  .patient-details {
    padding: 20px;
  }
}

/* Animation */
.patient-card {
  animation: cardAppear 0.6s ease-out;
}

@keyframes cardAppear {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.detail-item:hover .detail-icon {
  background: #e3f2fd;
  transform: scale(1.1);
  transition: all 0.3s ease;
}

@media print {
  body * {
    visibility: hidden;
  }

  #print-section, #print-section * {
    visibility: visible;
  }

  #print-section {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
  }
}

</style>