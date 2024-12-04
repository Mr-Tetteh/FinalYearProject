
Here's an updated version of your register page styled with Bootstrap, including an abstract animated background to make it visually appealing and aligned with the theme of a health app.

Updated Template
vue
Copy code
<template>
  <div class="container-fluid position-relative vh-100">
    <!-- Abstract moving background -->
    <div class="abstract-bg position-absolute w-100 h-100"></div>

    <!-- Form container -->
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px; background-color: #ffffffeb;">
        <div class="card-header text-center bg-primary text-white rounded">
          <h3>Health App Registration</h3>
        </div>
        <form @submit.prevent="registerUser" class="mt-4">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="firstName" class="form-label text-primary">First Name</label>
              <input
                type="text"
                id="firstName"
                class="form-control border-primary"
                v-model="form.firstName"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="lastName" class="form-label text-primary">Last Name</label>
              <input
                type="text"
                id="lastName"
                class="form-control border-primary"
                v-model="form.lastName"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label text-primary">Password</label>
              <input
                type="password"
                id="password"
                class="form-control border-primary"
                v-model="form.password"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="dob" class="form-label text-primary">Date of Birth</label>
              <input
                type="date"
                id="dob"
                class="form-control border-primary"
                v-model="form.dob"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="phone" class="form-label text-primary">Phone</label>
              <input
                type="tel"
                id="phone"
                class="form-control border-primary"
                v-model="form.phone"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="usertype" class="form-label text-primary">User Type</label>
              <select
                id="usertype"
                class="form-select border-primary"
                v-model="form.userType"
                required
              >
                <option value="">Select User Type</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                <option value="Guest">Guest</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="gender" class="form-label text-primary">Gender</label>
              <select
                id="gender"
                class="form-select border-primary"
                v-model="form.gender"
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
                v-model="form.country"
                required
              />
            </div>
          </div>
          <div class="mb-3 mt-3">
            <label for="address" class="form-label text-primary">Address</label>
            <textarea
              id="address"
              class="form-control border-primary"
              v-model="form.address"
              rows="3"
              required
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        firstName: "",
        lastName: "",
        password: "",
        dob: "",
        phone: "",
        userType: "",
        country: "",
        address: "",
        gender: "",
      },
    };
  },
  methods: {
    registerUser() {
      console.log("User registered with data:", this.form);
      alert("Registration successful!");
      this.resetForm();
    },
    resetForm() {
      this.form = {
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
    },
  },
};
</script>

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
