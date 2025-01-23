<script setup>
import useAuth from "@/composerbles/useAuth.js";
import {ref, computed, reactive} from "vue";
import {useRoute} from "vue-router";

const {reset, setPass} = useAuth();

const route = useRoute()

const password_set = reactive({
  token: route.params.token,
  password: "",
  confirm_password:""
})
const handelPassword = async () => {
  await setPass({...password_set})
};


</script>

<template>
  <div class="page login-page d-flex align-items-center justify-content-center">
    <div class="container py-5">
      <div class="row align-items-center g-5">
        <!-- Image Column -->
        <div class="col-lg-6 image-column">
          <div class="image-wrapper floating">
            <img src="../../assets/img/password-reset-icon-flat-design-vector.jpg" alt="Record Management"
                 class="img-fluid">
          </div>
        </div>

        <!-- Form Column -->
        <div class="col-lg-6">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header text-center">
                  <h4 class="card-title">Reset Password</h4>
                  <p class="text-secondary mb-0">Enter your new password to reset your password</p>
                </div>

                <div class="card-body p-4">
                  <form @submit.prevent="handelPassword">
                    <div class="form-floating mb-4">
                      <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-key text-primary"></i>
                                            </span>
                        <input type="password"
                               class="form-control"
                               v-model="password_set.password"
                               placeholder="New Password"
                               required>
                      </div>
                      <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-key text-primary"></i>
                                            </span>
                        <input type="password"
                               class="form-control"
                               v-model="password_set.confirm_password"
                               placeholder="Confirm Password"
                               required>
                      </div>
                    </div>
                    <div class="d-grid gap-2">
                      <button type="submit" class="btn btn-primary text-black">
                        Reset Password
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

:root {
  --primary-color: #2563eb;
  --primary-dark: #1d4ed8;
  --secondary-color: #64748b;
}

body {
  background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
  min-height: 100vh;
}

.page {
  min-height: 100vh;
  position: relative;
  overflow: hidden;
}

.page::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, rgba(37, 99, 235, 0.1) 0%, rgba(99, 102, 241, 0.1) 100%);
  z-index: 1;
}

.container {
  position: relative;
  z-index: 2;
}

.image-column {
  position: relative;
}

.image-wrapper {
  position: relative;
  overflow: hidden;
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  transform: perspective(1000px) rotateY(-5deg);
  transition: all 0.5s ease;
}

.image-wrapper:hover {
  transform: perspective(1000px) rotateY(0deg);
}

.image-wrapper img {
  width: 100%;
  height: auto;
  object-fit: cover;
  transition: all 0.5s ease;
}

.image-wrapper:hover img {
  transform: scale(1.05);
}

.card {
  border: none;
  backdrop-filter: blur(10px);
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  transform: translateY(0);
  transition: all 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
}

.card-header {
  background: transparent;
  padding: 2rem 2rem 1rem;
}

.card-title {
  color: var(--primary-color);
  font-weight: 700;
  font-size: 1.75rem;
  margin-bottom: 0.5rem;
}

.form-floating {
  margin-bottom: 1.5rem;
}

.input-group {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
}

.input-group:focus-within {
  box-shadow: 0 5px 15px rgba(37, 99, 235, 0.2);
}

.input-group-text {
  background-color: white;
  border: 1px solid #e2e8f0;
  border-right: none;
  padding: 1rem;
}

.form-control {
  border: 1px solid #e2e8f0;
  border-left: none;
  padding: 1rem;
  font-size: 1rem;
}

.form-control:focus {
  box-shadow: none;
  border-color: #e2e8f0;
}

.btn-primary {
  background: linear-gradient(45deg, var(--primary-color), var(--primary-dark));
  border: none;
  padding: 1rem;
  font-weight: 600;
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background: linear-gradient(45deg, var(--primary-dark), var(--primary-color));
  transform: translateY(-2px);
  box-shadow: 0 6px 8px rgba(37, 99, 235, 0.3);
}

@keyframes float {
  0% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-10px);
  }
  100% {
    transform: translateY(0px);
  }
}

.floating {
  animation: float 3s ease-in-out infinite;
}

@media (max-width: 768px) {
  .image-column {
    margin-bottom: 2rem;
  }
}
</style>