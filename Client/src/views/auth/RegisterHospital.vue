<script setup>
import NavBar from "@/components/NavBar.vue";
import useHospital from "@/composerbles/useHospital.js";
const {input,register_hospital} = useHospital()

const hospital = () =>{
  register_hospital()
}
</script>

<template>
  <NavBar/>
  <div class="login-page d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg" style="width: 400px; border: none;">
      <div class="card-header text-center" style="background-color: #001f3f; color: white;">
        <h3>Register Hospital</h3>
      </div>
      <form class="p-4 rounded-full"  @submit.prevent="hospital">
        <div class="form-group mb-3">
          <input
              type="text"
              class="form-control"
              v-model="input.hospital_name"
              placeholder="Hospital Name"
              required
          />
        </div>
        <div class="form-group mb-3">
          <input
              type="text"
              v-model="input.hospital_address"
              class="form-control"
              placeholder="Hospital Address"
              required
          />
        </div>


        <div class="form-group mb-3">
          <input
              type="tel"
              v-model="input.hospital_contact"
              class="form-control"
              placeholder="Hospital Contact"
              required
          />
        </div>
        <div class="form-group mb-3">
          <input
              type="email"
              v-model="input.hospital_email"
              class="form-control"
              placeholder="Hospital Email"
              required
          />
        </div>

        <div class="form-group mb-3">
          <label for="">Select Country</label>
          <select name="country" class="form-control" v-model="input.hospital_country">
            <option selected disabled>Select Country</option>
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
        <div class="form-group mb-3">
          <input
              type="email"
              v-model="input.hospital_city"
              class="form-control"
              placeholder="Hospital City"
              required
          />
        </div>

        <div class="form-group mb-3">
          <input
              type="email"
              v-model="input.user_name"
              class="form-control"
              placeholder="Enter Your Full Name"
              required
          />
        </div>

        <div class="form-group mb-3">
          <input
              type="tel"
              v-model="input.user_phone_number"
              class="form-control"
              placeholder="Enter your phone number"
              required
          />
        </div>

        <div class="form-group mb-3">
          <input
              type="email"
              v-model="input.user_email"
              class="form-control"
              placeholder="Enter your Email"
              required
          />
        </div>

        <div class="form-group mb-3">
          <label for="">Select Number of Monthly Payment</label>
          <select class="form-control" v-model="input.number_of_monthly_subscription">
            <option selected disabled>Select Month</option>
            <option value="1 month">1 Month GHC200</option>
            <option value="6 Month">6 Month GHC1000</option>
            <option value="1 Year">1 Year GHC2000</option>

          </select>
        </div>


        <button
            type="submit"
            class="btn btn-primary w-100"
            style="background-color: #001f3f; border-color: #001f3f;">
          Register
        </button>
      </form>
    </div>
  </div>

</template>

<style scoped>

</style>