<script setup>
import NavBar from "@/components/NavBar.vue";
import useHospital from "@/composerbles/useHospital.js";
const { input, register_hospital } = useHospital();

const hospital = () => {
  register_hospital();
};
</script>

<template>
  <NavBar />
  <div class="login-page d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div
      class="card shadow-lg"
      style="max-width: 700px; width: 100%; border-radius: 20px;"
    >
      <!-- Card Header -->
      <div
        class="card-header text-center py-4"
        style="background-color: #001f3f; color: white; border-radius: 20px 20px 0 0;"
      >
        <h2 class="mb-0">Register Hospital</h2>
      </div>

      <!-- Form -->
      <form class="p-5" @submit.prevent="hospital">
        <!-- Hospital Name -->
        <div class="form-group mb-4">
          <label for="hospital_name" class="form-label fw-bold">Hospital Name</label>
          <input
            id="hospital_name"
            type="text"
            class="form-control form-control-lg"
            v-model="input.hospital_name"
            placeholder="Enter hospital name"
            required
          />
        </div>

        <!-- Hospital Address -->
        <div class="form-group mb-4">
          <label for="hospital_address" class="form-label fw-bold">Hospital Address</label>
          <input
            id="hospital_address"
            type="text"
            v-model="input.hospital_address"
            class="form-control form-control-lg"
            placeholder="Enter hospital address"
            required
          />
        </div>

        <!-- Hospital Contact -->
        <div class="form-group mb-4">
          <label for="hospital_contact" class="form-label fw-bold">Hospital Contact</label>
          <input
            id="hospital_contact"
            type="tel"
            v-model="input.hospital_contact"
            class="form-control form-control-lg"
            placeholder="Enter hospital contact"
            required
          />
        </div>

        <!-- Hospital Email -->
        <div class="form-group mb-4">
          <label for="hospital_email" class="form-label fw-bold">Hospital Email</label>
          <input
            id="hospital_email"
            type="email"
            v-model="input.hospital_email"
            class="form-control form-control-lg"
            placeholder="Enter hospital email"
            required
          />
        </div>

        <!-- Select Country -->
        <div class="form-group mb-4">
          <label for="hospital_country" class="form-label fw-bold">Country</label>
          <select
            id="hospital_country"
            class="form-control form-control-lg"
            v-model="input.hospital_country"
            required
          >
            <option value="" disabled selected>Select country</option>
            <option value="Ghana">Ghana</option>
            <option value="Nigeria">Nigeria</option>
            <option value="South Africa">South Africa</option>
            <option value="Kenya">Kenya</option>
            <option value="Egypt">Egypt</option>
            <option value="Morocco">Morocco</option>
            <option value="Uganda">Uganda</option>
            <option value="Tanzania">Tanzania</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Algeria">Algeria</option>
          </select>
        </div>

        <!-- Hospital City -->
        <div class="form-group mb-4">
          <label for="hospital_city" class="form-label fw-bold">City</label>
          <input
            id="hospital_city"
            type="text"
            v-model="input.hospital_city"
            class="form-control form-control-lg"
            placeholder="Enter hospital city"
            required
          />
        </div>

        <!-- User Name -->
        <div class="form-group mb-4">
          <label for="user_name" class="form-label fw-bold">Your Full Name</label>
          <input
            id="user_name"
            type="text"
            v-model="input.user_name"
            class="form-control form-control-lg"
            placeholder="Enter your full name"
            required
          />
        </div>

        <!-- User Phone Number -->
        <div class="form-group mb-4">
          <label for="user_phone" class="form-label fw-bold">Your Phone Number</label>
          <input
            id="user_phone"
            type="tel"
            v-model="input.user_phone_number"
            class="form-control form-control-lg"
            placeholder="Enter your phone number"
            required
          />
        </div>

        <!-- User Email -->
        <div class="form-group mb-4">
          <label for="user_email" class="form-label fw-bold">Your Email</label>
          <input
            id="user_email"
            type="email"
            v-model="input.user_email"
            class="form-control form-control-lg"
            placeholder="Enter your email"
            required
          />
        </div>

        <!-- Monthly Payment -->
        <div class="form-group mb-4">
          <label for="monthly_subscription" class="form-label fw-bold">Monthly Payment Plan</label>
          <select
            id="monthly_subscription"
            class="form-control form-control-lg"
            v-model="input.number_of_monthly_subscription"
            required
          >
            <option value="" disabled selected>Select plan</option>
            <option value="1 month">1 Month - GHC200</option>
            <option value="6 Month">6 Months - GHC1000</option>
            <option value="1 Year">1 Year - GHC2000</option>
          </select>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="btn btn-primary btn-lg w-100"
          style="background-color: #001f3f; border-color: #001f3f; border-radius: 10px;"
        >
          Register
        </button>
      </form>
    </div>
  </div>
</template>

<style scoped>
.login-page {
  background: linear-gradient(135deg, #001f3f, #0074d9);
  color: #fff;
  padding: 2rem;
}

.card {
  background-color: #ffffff;
  border-radius: 20px;
}

.card-header h2 {
  font-weight: bold;
}

input::placeholder,
select::placeholder {
  color: #6c757d;
  opacity: 1;
}

button {
  font-size: 1.2rem;
  font-weight: bold;
}

.form-control:focus {
  border-color: #001f3f;
  box-shadow: 0 0 0 0.2rem rgba(0, 31, 63, 0.25);
}
</style>
