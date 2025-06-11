<script setup>
import useSession from "@/composerbles/useSession.js";
import {ref} from 'vue';

const {hospital} = useSession();
const {userRole} = useSession()
const isCollapsed = ref(false);
const toggleSidebar = () => {
  isCollapsed.value = !isCollapsed.value;

};
</script>

<template>
  <div :class="['sidebar-wrapper', { 'collapsed': isCollapsed }]">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
      <div class="logo-container">
        <div class="logo">
          <i class="bi bi-heart-pulse-fill text-primary"></i>
        </div>
        <h5 class="hospital-name">{{ hospital }} Hospital</h5>
      </div>
    </div>
    <button @click="toggleSidebar" class="toggle-btn text-primary">
      <i class="bi" :class="isCollapsed ? 'bi-chevron-right' : 'bi-chevron-left'"></i>
    </button>

    <!-- Sidebar Menu -->
    <div class="sidebar-menu">
      <div class="menu-category">Main</div>

      <!-- Dashboard Link -->
      <RouterLink to="/dashboard" class="menu-item" active-class="active">
        <div class="menu-icon">
          <i class="bi bi-grid-fill"></i>
        </div>
        <span class="menu-text">Dashboard</span>
      </RouterLink>

      <!-- Patients Section -->
      <div class="menu-category">Patient Management</div>
      <div class="menu-group">
        <div class="menu-item" @click="$event.currentTarget.classList.toggle('open')">
          <div class="menu-header">
            <div class="menu-icon">
              <i class="bi bi-people-fill"></i>
            </div>
            <span class="menu-text">Patients</span>
            <i class="bi bi-chevron-down menu-arrow"></i>
          </div>
          <div class="submenu">
            <RouterLink to="/patients" class="submenu-item" v-if="userRole !== 'Admin'">
              <i class="bi bi-plus-circle"></i>
              <span>Register Patient</span>
            </RouterLink>
            <RouterLink to="/hospital_patient" class="submenu-item" v-if="userRole !=='Admin'">
              <i class="bi bi-plus-circle"></i>
              <span>Patients</span>
            </RouterLink>
            <RouterLink v-if="userRole === 'Admin'" to="/patients_info" class="submenu-item">
              <i class="bi bi-list-ul"></i>
              <span>All Patients</span>
            </RouterLink>
          </div>
        </div>
      </div>

      <!-- Users Section -->
      <div class="menu-category">User Management</div>
      <div class="menu-group">
        <div class="menu-item" @click="$event.currentTarget.classList.toggle('open')">
          <div class="menu-header">
            <div class="menu-icon">
              <i class="bi bi-person-fill-add"></i>
            </div>
            <span class="menu-text">Users</span>
            <i class="bi bi-chevron-down menu-arrow"></i>
          </div>
          <div class="submenu">
            <RouterLink v-if="userRole === 'Admin' || userRole === 'Manager'" to="/register" class="submenu-item">
              <i class="bi bi-person-plus"></i>
              <span>Register Staff</span>
            </RouterLink>
            <RouterLink to="/staff_info" class="submenu-item" v-if="userRole === 'Admin'">
              <i class="bi bi-people"></i>
              <span>All Admin Users</span>
            </RouterLink>
            <RouterLink to="/staff_info" class="submenu-item" v-if="userRole !== 'Admin'">
              <i class="bi bi-people"></i>
              <span>All Staff</span>
            </RouterLink>
            <RouterLink v-if="userRole === 'Admin' " to="/user_info" class="submenu-item">
              <i class="bi bi-person-lines-fill"></i>
              <span>All Users</span>
            </RouterLink>
          </div>
        </div>
      </div>

      <div v-if="userRole === 'Pharmacist' || userRole === 'Manager'">
        <div class="menu-category">Hospital Management</div>
        <div class="menu-group">
          <div class="menu-item" @click="$event.currentTarget.classList.toggle('open')">
            <div class="menu-header">
              <div class="menu-icon">
                <i class="bi bi-prescription" style="color: black; font-size: 1.2em;"></i>
              </div>
              <span class="menu-text">Pharmacy</span>
              <i class="bi bi-chevron-down menu-arrow"></i>
            </div>
            <div class="submenu">
              <RouterLink to="/pharmacy_add" class="submenu-item">
                <i class="bi bi-plus-circle"></i> <!-- Icon for adding a drug -->
                <span>Add Drug</span>
              </RouterLink>
              <RouterLink to="/Pharmacy_all_drugs" class="submenu-item">
                <i class="bi bi-list-ul"></i> <!-- Icon for viewing all drugs -->
                <span>All Drugs</span>
              </RouterLink>
              <RouterLink to="/Pharmacy_all_drugs_edit" class="submenu-item">
                <i class="bi bi-list-ul"></i> <!-- Icon for viewing all drugs -->
                <span>Update Drugs</span>
              </RouterLink>
            </div>
          </div>
        </div>
      </div>


      <div class="menu-category" v-if="userRole === 'Admin'" >Hospitals Management</div>
      <div class="menu-group" v-if="userRole === 'Admin'" >
        <div class="menu-item" @click="$event.currentTarget.classList.toggle('open')">
          <div class="menu-header">
            <div class="menu-icon">
              <i class="bi bi-hospital-fill"></i>
            </div>
            <span class="menu-text">Hospital</span>
            <i class="bi bi-chevron-down menu-arrow"></i>
          </div>
          <div class="submenu">
            <RouterLink to="/register_hospital" class="submenu-item">
              <i class="bi bi-hospital"></i>
              <span>Register Hospital</span>
            </RouterLink>
            <RouterLink to="/registered_hospitals" class="submenu-item">
              <i class="bi bi-building-add"></i>
              <span>Registered Hospitals</span>
            </RouterLink>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<style scoped>
.sidebar-wrapper {
  width: 260px;
  height: 100vh;
  background: #ffffff;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 1000;
  overflow-y: auto;
}

.sidebar-wrapper.collapsed {
  width: 70px;
}

.sidebar-wrapper.collapsed .menu-text,
.sidebar-wrapper.collapsed .menu-arrow,
.sidebar-wrapper.collapsed .menu-category,
.sidebar-wrapper.collapsed .hospital-name {
  opacity: 0;
  visibility: hidden;
}

.sidebar-wrapper.collapsed .submenu {
  display: none;
}

.sidebar-header {
  padding: 1.2rem 1.5rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.logo-container {
  display: flex;
  align-items: center;
  gap: 0.8rem;
}

.logo {
  font-size: 1.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hospital-name {
  margin: 0;
  font-size: 1rem;
  font-weight: 600;
  color: #333;
  white-space: nowrap;
  transition: all 0.3s ease;
}

.toggle-btn {
  background: none;
  border: none;
  color: #666;
  cursor: pointer;
  padding: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.toggle-btn:hover {
  color: #333;
}

.sidebar-menu {
  padding: 1.5rem 0;
}

.menu-category {
  padding: 0 1.5rem;
  margin: 1rem 0 0.5rem;
  font-size: 0.75rem;
  text-transform: uppercase;
  color: #666;
  font-weight: 600;
  transition: all 0.3s ease;
}

.menu-item {
  padding: 0.8rem 1.5rem;
  cursor: pointer;
  text-decoration: none;
  color: #666;
  display: block;
  transition: all 0.3s ease;
  position: relative;
}

.menu-header {
  display: flex;
  align-items: center;
  gap: 0.8rem;
}

.menu-icon {
  width: 1.5rem;
  height: 1.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  flex-shrink: 0;
}

.menu-text {
  transition: all 0.3s ease;
  white-space: nowrap;
}

.menu-arrow {
  margin-left: auto;
  transition: transform 0.3s ease;
  font-size: 0.8rem;
}

.menu-item:hover,
.menu-item.active {
  color: #435ebe;
  background: rgba(67, 94, 190, 0.05);
}

.menu-item.open .menu-arrow {
  transform: rotate(-180deg);
}

.submenu {
  margin-top: 0.5rem;
  display: none;
  padding-left: 2.3rem;
}

.menu-item.open .submenu {
  display: block;
}

.submenu-item {
  padding: 0.5rem 0;
  display: flex;
  align-items: center;
  gap: 0.8rem;
  color: #666;
  text-decoration: none;
  font-size: 0.9rem;
  transition: all 0.3s ease;
}

.submenu-item:hover,
.submenu-item.active {
  color: #435ebe;
}

/* Scrollbar Styling */
.sidebar-wrapper::-webkit-scrollbar {
  width: 5px;
}

.sidebar-wrapper::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.sidebar-wrapper::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 5px;
}

.sidebar-wrapper::-webkit-scrollbar-thumb:hover {
  background: #555;
}


</style>