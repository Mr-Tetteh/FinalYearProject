<script setup>
import useSession from "@/composerbles/useSession.js";

const {hospital} = useSession()
</script>

<template>
  <div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header">
        <div class="d-flex justify-content-between">
          <div class="logo"></div>
          <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-block">
              <i class="bi bi-x bi-middle"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <h3>{{ hospital }} Hospital</h3>

          <li class="sidebar-item">
            <RouterLink to="/dashboard" class="sidebar-link">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </RouterLink>
          </li>

          <li class="sidebar-item dropdown">
            <a
                href="#"
                class="sidebar-link dropdown-toggle"
                id="patientsDropdown"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
              <i class="bi bi-people-fill"></i>
              <span>Patients</span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="patientsDropdown">
              <li>
                <RouterLink to="/patients" class="dropdown-item">
                  Register New Patient
                </RouterLink>
              </li>
              <li>
                <RouterLink to="/patients_info" class="dropdown-item">
                  All Patients
                </RouterLink>
              </li>
            </ul>
          </li>


          <li class="sidebar-item dropdown">
            <a
                href="#"
                class="sidebar-link dropdown-toggle"
                id="patientsDropdown"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
              <i class="bi bi-person-fill-add"></i>
              <span>Users</span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="patientsDropdown">
              <li>
                <RouterLink to="/register" class="dropdown-item">
                  Register New Staff
                </RouterLink>
              </li>
              <li>
                <RouterLink to="/patients" class="dropdown-item">
                  All Staff
                </RouterLink>
              </li>


              <li>
                <RouterLink to="/patients" class="dropdown-item">
                  All Users
                </RouterLink>
              </li>
            </ul>
          </li>

        </ul>
      </div>

      <button class="sidebar-toggler btn x">
        <i data-feather="x"></i>
      </button>
    </div>
  </div></template>

<style scoped>

</style>