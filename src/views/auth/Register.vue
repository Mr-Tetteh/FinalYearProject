<template>
  <div class="container-fluid vh-100 d-flex justify-content-center align-items-center" style="background-color: #eef2f6;">
    <div class="row w-75 shadow rounded overflow-hidden" style="max-width: 900px; background-color: #ffffff;">
      <!-- Left Section -->
      <div class="col-md-5 py-5 px-4 text-white" style="background-color: #6c63ff;">
        <div class="text-center">
          <img src="https://via.placeholder.com/100" alt="Healthcare Icon" class="mb-3" />
          <h4>CareOnTheGo</h4>
          <p class="mt-3">
            Stay Healthy, Stay On Track
          </p>
        </div>
      </div>

      <!-- Right Section -->
      <div class="col-md-7 py-5 px-4">
        <h3 class="mb-4 text-center">Create Account</h3>
        <div class="d-flex justify-content-center gap-3 mb-3">
          <button class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center">
            <i class="bi bi-google me-2"></i> Sign up with Google
          </button>
          <button class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center">
            <i class="bi bi-facebook me-2"></i> Sign up with Facebook
          </button>
        </div>
        <div class="text-center my-3">- OR -</div>
        <form @submit.prevent="registerUser">
          <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input
              type="text"
              id="fullName"
              class="form-control"
              v-model="form.firstName"
              required
            />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              id="email"
              class="form-control"
              v-model="form.email"
              required
            />
          </div>
          <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>
            <input
              :type="passwordVisible ? 'text' : 'password'"
              id="password"
              class="form-control"
              v-model="form.password"
              required
            />
            <button
              type="button"
              class="btn position-absolute end-0 top-0"
              @click="togglePasswordVisibility"
              style="background: transparent; border: none;"
            >
              <i :class="passwordVisible ? 'bi bi-eye-slash' : 'bi bi-eye'"></i>
            </button>
          </div>
          <button type="submit" class="btn btn-primary w-100">Create Account</button>
        </form>
        <div class="text-center mt-3">
          <p>
            Already have an account?  <router-link to="/login" class="login-link">Login here</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";
import { RouterLink } from "vue-router";

export default {
  setup() {
    const form = ref({
      firstName: "",
      lastName: "",
      password: "",
      dob: "",
      phone: "",
      userType: "",
      country: "",
      address: "",
      gender: "",
    });

    const passwordVisible = ref(false);

    const registerUser = () => {
      console.log("User registered with data:", form.value);
      alert("Registration successful!");
      resetForm();
    };

    const resetForm = () => {
      form.value = {
        firstName: "",
        lastName: "",
        password: "",
        dob: "",
        phone: "",
        userType: "",
        country: "",
        address: "",
        gender: "",
      };
    };

    const togglePasswordVisibility = () => {
      passwordVisible.value = !passwordVisible.value;
    };

    return {
      form,
      passwordVisible,
      registerUser,
      resetForm,
      togglePasswordVisibility,
    };
  },
};
</script>

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
