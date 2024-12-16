<script setup>
import {onMounted, ref} from "vue";
import {RouterLink} from "vue-router";
import useAuth from "@/composerbles/useAuth.js";
import AdminNavBar from "@/components/AdminNavBar.vue";

const {input, register, hospital, hospitals_in_system} =  useAuth()

const registerUser = () =>{
  register()
}

onMounted(hospital)
</script>

<template>
  <AdminNavBar/>
  <div class="container-fluid vh-100 d-flex justify-content-center align-items-center"
       style="background-color: #eef2f6;">
    <div class="row w-75 shadow rounded overflow-hidden" style="max-width: 900px; background-color: #ffffff;">
      <!-- Left Section -->
      <div class="col-md-5 py-4 px-3 text-white" style="background-color: #6c63ff;">
        <div class="text-center">
          <img src="https://via.placeholder.com/100" alt="Healthcare Icon" class="mb-2"/>
          <h4>Swift Care</h4>
          <p class="mt-2">
            Stay Healthy, Stay On Track
          </p>
        </div>
      </div>

      <!-- Right Section -->
      <div class="col-md-7 py-4 px-3">
        <h3 class="mb-3 text-center">Register Staff Account</h3>
<!--        <div class="d-flex justify-content-center gap-2 mb-3">
          <button class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center">
            <i class="bi bi-google me-1"></i> Google
          </button>
          <button class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center">
            <i class="bi bi-facebook me-1"></i> Facebook
          </button>
        </div>-->
<!--
        <div class="text-center my-2">- OR -</div>
-->
        <form @submit.prevent="registerUser" class="mt-20">
          <div class="mb-2">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" id="firstName" class="form-control" v-model="input.first_name" />
          </div>
          <div class="mb-2">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" id="lastName" class="form-control" v-model="input.last_name" />
          </div>
          <div class="mb-2">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" id="birthday" class="form-control" v-model="input.birthday" />
          </div>
          <div class="mb-2">
            <label for="gender" class="form-label">Gender</label>
            <select v-model="input.gender" class="form-control">
              <option selected disabled>Select Option</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <div class="mb-2">
            <label for="role" class="form-label">Role</label>
            <select v-model="input.role" class="form-control">
              <option selected disabled>Select Option</option>
              <option value="Doctor">Doctor</option>
              <option value="Nurse">Nurse</option>
              <option value="Pharmacist">Pharmacist</option>
              <option value="Nurse">Account</option>
              <option value="Manger">Manager</option>
            </select>
          </div>

          <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" v-model="input.email" />
          </div>
          <div class="mb-2">
            <label for="role" class="form-label">Hospital</label>
            <select v-model="input.hospital" class="form-control">
              <option selected disabled>Select Option</option>
              <option
                  v-for="hospitals_in_systems in hospitals_in_system"
                  :key="hospitals_in_systems.id"
                  :value="hospitals_in_systems.hospital_name">
                {{hospitals_in_systems.hospital_name}}
              </option>
            </select>
          </div>
          <div class="mb-2">
            <label for="phone" class="form-label">Staff ID</label>
            <input type="text" class="form-control" v-model="input.staff_id" />
          </div>
          <div class="mb-2">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" id="phone" class="form-control" v-model="input.phone" />
          </div>

          <div class="mb-2">
            <label for="city" class="form-label">City</label>
            <input type="text" id="city" class="form-control" v-model="input.city" />
          </div>


          <button type="submit" class="btn btn-primary w-100">Create Account</button>
        </form>
        <div class="text-center mt-2">
          <p>
            Already have an account?
            <router-link to="/login" class="login-link">Login here</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>


<style scoped>
.container-fluid {
  font-family: "Arial", sans-serif;
}

img {
  max-width: 100px;
}

button.btn-outline-primary {
  border: 1px solid #007bff;
}

button.btn-outline-primary i {
  font-size: 1.2rem;
}
</style>
