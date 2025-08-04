<script setup>
import useAuth from "@/composerbles/useAuth.js";
import { ref, computed } from "vue";

const { user, login } = useAuth();

const isLoading = ref(false);
const errorMessage = ref("");
const showPassword = ref(false);
const rememberMe = ref(false);



const enter = async () => {
  login()
};

const togglePasswordVisibility = () => {
  showPassword.value = !showPassword.value;
};
</script>

<template>
  <div class="page login-page d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <!-- Error Alert -->
          <div v-if="errorMessage"
               class="alert alert-danger alert-dismissible fade show"
               role="alert">
            {{ errorMessage }}
            <button type="button"
                    class="btn-close"
                    @click="errorMessage = ''"
                    aria-label="Close">
            </button>
          </div>

          <!-- Login Card -->
          <div class="card border-0 shadow-lg">
            <!-- Card Header -->
            <div class="card-header bg-transparent border-bottom-0 text-center pt-4">
              <h4 class="card-title mb-0">Staff Login</h4>
            </div>

            <!-- Card Body -->
            <div class="card-body px-4 py-5">
              <form @submit.prevent="enter">
                <!-- Staff ID Input -->
                <div class="form-floating mb-4">
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                      <i class="bi bi-person"></i>
                    </span>
                    <input
                        type="email"
                        class="form-control border-start-0"
                        id="staff-id"
                        placeholder="Email"
                        v-model="user.identifier"
                    />
                  </div>
                </div>

                <!-- Password Input -->
                <div class="form-floating mb-4">
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                      <i class="bi bi-lock"></i>
                    </span>
                    <input
                        :type="showPassword ? 'text' : 'password'"
                        class="form-control border-start-0 border-end-0"
                        id="password"
                        placeholder="Password"
                        v-model="user.password"
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

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div class="form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="remember-me"
                        v-model="rememberMe"
                    />
                    <label class="form-check-label" for="remember-me">
                      Remember me
                    </label>
                  </div>
                  <RouterLink to="rest_password" class="text-decoration-none">Reset Password?</RouterLink>
                </div>

                <!-- Login Button -->
                <div class="d-grid gap-2">
                  <button
                      type="submit"
                      class="btn btn-primary py-3"
                  >
                    <span v-if="isLoading"
                          class="spinner-border spinner-border-sm me-2"
                          role="status">
                    </span>
                    {{ isLoading ? 'Logging in...' : 'Login' }}
                  </button>
                </div>
              </form>
              <span>Don't have an account? <RouterLink to="register" class="text-decoration-none">Register</RouterLink></span>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.page {
  background-image: url(@/assets/img/Doctors-rafiki.svg);
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