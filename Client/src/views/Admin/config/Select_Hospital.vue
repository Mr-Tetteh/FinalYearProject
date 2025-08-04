<script setup>
import useSession from "@/composerbles/useSession.js";
import useAuth from "@/composerbles/useAuth.js";
import {ref} from "vue";
import {useToast} from "vue-toast-notification";
import 'vue-toast-notification/dist/theme-sugar.css';
const {username, user_id} = useSession()
const {GetUserHospital, user_hospital_get} = useAuth()
const $toast = useToast();

GetUserHospital(user_id)
const input = {
  id: '',
}
const enter = () => {
  if (input.id === ''){
    return $toast.error('Please select a hospital portal', {
      position: 'top-right'
    })
  }
  localStorage.setItem('HOSPITAL_ID', input.id)
  window.location.href = '/dashboard'
}

</script>

<template>
  <div class="page login-page d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <!-- Error Alert -->

          <!-- Login Card -->
          <div class="card border-0 shadow-lg">
            <!-- Card Header -->
            <div class="card-header bg-transparent border-bottom-0 text-center pt-4">
              <h4 class="card-title mb-0 font-monospace">Hello {{username}}</h4>
            </div>
            <div class="card-header bg-transparent border-bottom-0 text-center pt-4">
              <h5 class="card-title mb-0 font-monospace">Select a hospital portal</h5>
            </div>
            <!-- Card Body -->
            <div class="card-body px-4 py-5">
              <form @submit.prevent="enter">
                <!-- Staff ID Input -->
                <div class="form-floating mb-4">
                  <div class="input-group">
                    <select class="form-control border-start-0 border-end-0" v-model="input.id">
                      <option v-for="item in user_hospital_get" :value="item.id" >{{ item.hospital_name }}</option>
                    </select>
                  </div>
                </div>

                <!-- Login Button -->
                <div class="d-grid gap-2">
                  <button
                      type="submit"
                      class="btn btn-primary py-3"
                  >
                    Select
                  </button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<style scoped>
.page {
  background-position: center;
  position: relative;
}

.page::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1;
}

.container {
  position: relative;
  z-index: 2;
}

.card {
  backdrop-filter: blur(10px);
  background-color: rgba(255, 255, 255, 0.95);
  border-radius: 1rem;
}

.btn-primary {
  background-color: #001f3f;
  border-color: #001f3f;
  transition: all 0.3s ease;
}

.btn-primary:hover:not(:disabled) {
  background-color: #003366;
  border-color: #003366;
  transform: translateY(-1px);
}

.form-control:focus,
.form-check-input:focus {
  box-shadow: 0 0 0 0.25rem rgba(0, 31, 63, 0.25);
  border-color: #001f3f;
}

.form-check-input:checked {
  background-color: #001f3f;
  border-color: #001f3f;
}

.input-group-text {
  color: #6c757d;
}

.alert {
  border-radius: 1rem;
  border: none;
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label {
  color: #001f3f;
}
</style>