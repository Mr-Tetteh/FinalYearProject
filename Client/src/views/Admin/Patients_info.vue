<script setup>

import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatients from "@/composerbles/usePatients.js";
import {onMounted} from "vue";

const {list_patients, patient} = usePatients()

onMounted(list_patients)
</script>

<template>
  <AdminNavBar/>

  <div id="app"  class="main min-vh-100">
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>List of all Patients</h3>
            </div>
          </div>
        </div>
        <section class="section">
          <div class="card">
            <div class="card-header">
              Simple Datatable
            </div>
            <div class="card-body">
              <table class="table  table-hover" id="table1">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>patient ID</th>
                  <th>Gender</th>
                  <th>Date of birth</th>
                  <th>Allergies</th>
                  <th>Medical conditions</th>
                  <th>Additional Notes</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in patient">
                  <td>{{ item.first_name }} {{item.other_name}} {{item.last_name}}</td>
                  <td>{{item.patient_number}}</td>
                  <td>{{ item.gender }}</td>
                  <td>{{item.date_of_birth}}</td>
                  <td>{{ item.allergies }}</td>
                  <td>{{ item.medical_history }}</td>
                  <td>{{ item.additional_notes }}</td>
                  <td>
                    <!-- Edit Button -->
                    <span class="badge bg-warning d-flex align-items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512" aria-hidden="true"
               focusable="false">
            <path fill="currentColor"
                  d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231z"/>
          </svg>
          Edit
        </span>
                    <span class="badge bg-primary d-flex align-items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512" aria-hidden="true"
               focusable="false">
            <path fill="currentColor"
                  d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
          </svg>
          From
        </span>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>

        </section>
      </div>

    </div>
  </div>


</template>

<style scoped>
.main{
  background-color: #81BFDA;
  border-radius: 5%;
}
</style>