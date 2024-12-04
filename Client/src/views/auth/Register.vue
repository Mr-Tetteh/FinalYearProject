<script setup>
import useAuth from "@/composerbles/useAuth.js";

const {input, register} = useAuth()

</script>

<template>
  <div class="container mt-5">
    <h2 class="text-center text-primary">Register</h2>
    <form @submit.prevent="register" class="p-4 shadow rounded" style="background-color: #f8f9fa;">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="firstName" class="form-label text-primary">First Name</label>
          <input
            type="text"
            id="firstName"
            class="form-control border-primary"
            v-model="input.first_name"
            required
          />
        </div>
        <div class="col-md-6">
          <label for="lastName" class="form-label text-primary">Last Name</label>
          <input
            type="text"
            id="lastName"
            class="form-control border-primary"
            v-model="input.last_name"
            required
          />
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="password" class="form-label text-primary">Password</label>
          <input
            type="password"
            id="password"
            class="form-control border-primary"
            v-model="input.password"
            required
          />
        </div>


        <div class="col-md-6">
          <label for="email" class="form-label text-primary">Email</label>
          <input
              type="email"
              id="password"
              class="form-control border-primary"
              v-model="input.email"
              required
          />
        </div>
        <div class="col-md-6">
          <label for="dob" class="form-label text-primary">Date of Birth</label>
          <input
            type="date"
            id="dob"
            class="form-control border-primary"
            v-model="input.birthday"
            required
          />
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="phone" class="form-label text-primary">Phone</label>
          <input
            type="tel"
            id="phone"
            class="form-control border-primary"
            v-model="input.phone"
            required
          />
        </div>
<!--        <div class="col-md-6">-->
<!--          <label for="inputtype" class="form-label text-primary">input Type</label>-->
<!--          <select-->
<!--            id="inputtype"-->
<!--            class="form-select border-primary"-->
<!--            v-model="input.inputType"-->
<!--            required-->
<!--          >-->
<!--            <option value="">Select input Type</option>-->
<!--            <option value="Admin">Admin</option>-->
<!--            <option value="input">input</option>-->
<!--            <option value="Guest">Guest</option>-->
<!--          </select>-->
<!--        </div>-->
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="gender" class="form-label text-primary">Gender</label>
          <select
            id="gender"
            class="form-select border-primary"
            v-model="input.gender"
            required
          >
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="country" class="form-label text-primary">Country</label>
          <input
            type="text"
            id="country"
            class="form-control border-primary"
            v-model="input.country"
            required
          />
        </div>

        <div class="col-md-6">
          <label for="country" class="form-label text-primary">City</label>
          <input
              type="text"
              id="city"
              class="form-control border-primary"
              v-model="input.city"
              required
          />
        </div>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label text-primary">Address</label>
        <textarea
          id="address"
          class="form-control border-primary"
          v-model="input.address"
          rows="3"
          required
        ></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Register</button>
      <RouterLink to="login" class="ml-5">Login</RouterLink>

    </form>

  </div>
</template>



<style scoped>
.container {
  max-width: 600px;
}

.text-primary {
  color: #007bff;
}

.border-primary {
  border-color: #007bff !important;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #004085;
}
</style>
