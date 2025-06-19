<script setup>
import NavBar from "@/components/NavBar.vue";
import useHospital from "@/composerbles/useHospital.js";
import {computed, ref} from "vue";
const { input, register_hospital } = useHospital();

const is_loading = ref(false)

const hospital = () => {
  register_hospital();
  is_loading.value = true;
};

const constituencies = [
  "JOMORO",
  "ELLEMBELE",
  "EVALUE AJOMORO GWIRA",
  "AHANTA WEST",
  "TAKORADI",
  "SEKONDI",
  "ESSIKADU-KETAN",
  "EFFIA",
  "KWESIMINTIM",
  "SHAMA",
  "WASSA EAST",
  "MPOHOR",
  "TARKWA NSUAEM",
  "PRESTEA HUNI-VALLEY",
  "WASSA AMENFI EAST",
  "AMENFI CENTRAL",
  "AMENFI WEST",
  "KOMENDA EDINA EGUAFO ABREM",
  "CAPE COAST SOUTH",
  "CAPE COAST NORTH",
  "ABURA/ASEBU/KWAAMANKESE",
  "MFANTSEMAN",
  "EKUMFI",
  "AJUMAKO ENYAN ESIAM",
  "GOMOA WEST",
  "GOMOA CENTRAL",
  "GOMOA EAST",
  "EFFUTU",
  "AWUTU SENYA WEST",
  "AWUTU SENYA EAST",
  "AGONA WEST",
  "AGONA EAST",
  "ASIKUMA/ODOBEN/BRAKWA",
  "ASSIN CENTRAL",
  "ASSIN NORTH",
  "ASSIN SOUTH",
  "TWIFO ATTI MORKWA",
  "HEMANG LOWER DENKYIRA",
  "UPPER DENKYIRA EAST",
  "UPPER DENKYIRA WEST",
  "BORTIANOR-NGLESHIE AMANFRO",
  "DOMEABRA/OBOM",
  "WEIJA / GBAWE",
  "ANYAA/SOWUTUOM",
  "TROBU",
  "AMASAMAN",
  "DOME/KWABENYA",
  "MADINA",
  "AYAWASO EAST",
  "AYAWASO NORTH",
  "AYAWASO CENTRAL",
  "AYAWASO WEST WUOGON",
  "OKAIKWEI SOUTH",
  "ABLEKUMA SOUTH",
  "ODODODIDDIOO",
  "OKAIKWEI CENTRAL",
  "OKAIKWEI NORTH",
  "ABLEKUMA NORTH",
  "ABLEKUMA CENTRAL",
  "ABLEKUMA WEST",
  "KORLE KLOTTEY",
  "DADEKOTOPON",
  "LEDZOKUKU",
  "KROWOR",
  "TEMA EAST",
  "TEMA CENTRAL",
  "TEMA-WEST",
  "KPONE KATAMANSO",
  "ASHAIMAN",
  "ADENTAN",
  "SHAI- OSUDOKU",
  "NINGO PRAMPRAM",
  "SEGE",
  "ADA",
  "KETA",
  "ANLO",
  "KETU SOUTH",
  "KETU NORTH",
  "AKATSI SOUTH",
  "AKATSI NORTH",
  "SOUTH TONGU",
  "CENTRAL TONGU",
  "NORTH TONGU",
  "ADAKLU",
  "AGOTIME-ZIOPE",
  "HO CENTRAL",
  "HO WEST",
  "SOUTH DAYI",
  "KPANDO",
  "NORTH DAYI",
  "HOHOE",
  "AFADJATO SOUTH",
  "ASUOGYAMAN",
  "LOWER MANYA KROBO",
  "UPPER MANYA KROBO",
  "YILO KROBO",
  "NEW JUABEN SOUTH",
  "NEW JUABEN NORTH",
  "AKROPONG",
  "OKERE",
  "AKUAPEM SOUTH",
  "NSAWAM/ADOAGYIRI",
  "SUHUM",
  "AYENSUANO",
  "LOWER WEST AKIM",
  "UPPER WEST AKIM",
  "AKIM ODA",
  "ASENE/AKROSO/MANSO",
  "AKIM SWEDRU",
  "ACHIASE",
  "OFOASE/AYIREBI",
  "KADE",
  "AKWATIA",
  "ABIREM",
  "ABUAKWA SOUTH",
  "ABUAKWA NORTH",
  "ATIWA WEST",
  "ATIWA EAST",
  "FANTEAKWA NORTH",
  "FANTEAKWA SOUTH",
  "NKAWKAW",
  "MPRAESO",
  "ABETIFI",
  "AFRAM PLAINS NORTH",
  "AFRAM PLAINS SOUTH",
  "NEW EDUBIASE",
  "AKROFUOM",
  "FOMENA",
  "ADANSI ASOKWA",
  "OBUASI WEST",
  "OBUASI EAST",
  "BEKWAI",
  "BOSOME FREHO",
  "ODOTOBIRI",
  "MANSO NKWANTA",
  "MANSO ADUBIA",
  "ATWIMA NWABIAGYA SOUTH",
  "ATWIMA NWABIAGYA NORTH",
  "ATWIMA MPONUA",
  "BOSOMTWE",
  "ATWIMA KWANWOMA",
  "BANTAMA",
  "NHYIAESO",
  "MANHYIA SOUTH",
  "MANHYIA NORTH",
  "SUBIN",
  "KWADASO",
  "OLD TAFO",
  "SUAME",
  "ASOKWA",
  "OFORIKROM",
  "ASAWASE",
  "KWABRE EAST",
  "AFIGYA KWABRE SOUTH",
  "AFIGYA KWABRE NORTH",
  "JUABEN",
  "EJISU",
  "ASANTE AKIM SOUTH",
  "ASANTE AKIM CENTRAL",
  "ASANTE AKIM NORTH",
  "EFFIDUASE / ASOKORE",
  "KUMAWU",
  "SEKYERE AFRAM PLAINS",
  "NSUTA/KWAMANG/BEPOSO",
  "MAMPONG",
  "EUURA SEKYEDUMASE",
  "AFIGYA SEKYERE EAST",
  "OFFINSO SOUTH",
  "OFFINSO NORTH",
  "AHAFO ANO SOUTH WEST",
  "AHAFO ANO SOUTH EAST",
  "AHAFO ANO NORTH",
  "AOWIN",
  "SUAMAN",
  "BIBIANI-ANHWIASO-BEKWAI",
  "SEFWI WIAWSO",
  "SEFWI AKONTOMBRA",
  "JUABOSO",
  "BODI",
  "BIA WEST",
  "BIA EAST",
  "ASUNAFO SOUTH",
  "ASUNAFO NORTH",
  "ASUTIFI SOUTH",
  "ASUTIFI NORTH",
  "TANO SOUTH",
  "TANO NORTH",
  "SUNYANI EAST",
  "SUNYANI WEST",
  "DORMAA WEST",
  "DORMAA CENTRAL",
  "DORMAA EAST",
  "BEREKUM EAST",
  "BEREKUM WEST",
  "JAMAN SOUTH",
  "JAMAN NORTH",
  "BANDA",
  "TAIN",
  "WENCHI",
  "TECHIMAN",
  "KINTAMPO NORTH",
  "KINTAMPO SOUTH",
  "NKORANZA NORTH",
  "NKORANZA SOUTH",
  "ATEBUBU/AMANTIN",
  "PRU WEST",
  "PRU EAST",
  "SENE WEST",
  "SENE EAST",
  "TECHIMAN NORTH",
    "BUEM",
  "BIAKOYE",
  "AKAN",
  "KRACHI EAST",
  "KRACHI WEST",
  "KRACHI-NCHUMURU",
  "NKWANTA SOUTH",
  "NKWANTA NORTH",
  "KPANDAI",
  "BIMBILLA",
  "WULENSI",
  "ZABZUGU",
  "TATALE/SANGULI",
  "YENDI",
  "MION",
  "SABOBA",
  "GUSHEGU",
  "KARAGA",
  "SAVEUGU",
  "NANTON",
  "TAMALE SOUTH",
  "TAMALE CENTRAL",
  "SAGNARIGU",
  "TAMALE NORTH",
  "TOLON",
  "KUMBUNGU",
  "BOLE/BAMBOI",
  "SAWLA TUNA KALBA",
  "DAMONGO",
  "DABOYA/MANKARIGU",
  "YAPEI-KUSAWGU",
  "SALAGA SOUTH",
  "SALAGA NORTH",
  "WA CENTRAL",
  "WA WEST",
  "WA EAST",
  "NADOWLI/KALEO",
  "DAFFIAMA/BUSSIE/ISSA",
  "JIRAPA",
  "LAMBUSSIE",
  "LAWRA",
  "NANDOM",
  "SISSALA WEST",
  "SISSALA EAST",
  "WALEWALE",
  "YAGABA /KUBORI",
  "NALERIGU / GAMBAGA",
  "BUNKPURUGU",
  "YUNYOO",
  "CHEREPONI",
  "BUILSA SOUTH",
  "BUILSA NORTH",
  "KASSENA/NANKANA EAST",
  "KASSENA/NANKANA WEST",
  "BOLGATANGA CENTRAL",
  "BOLGATANGA EAST",
  "BONGO",
  "TALENSI",
  "NABDAM",
  "BAWKU WEST",
  "BAWKU",
  "PUSIGA",
  "GARU",
  "TEMPANE",
  "BINDURI"



];


const filteredConstituencies = computed(() => {
  return constituencies.filter((constituency) => constituency.toLowerCase().includes(input.value.hospital_country.toLowerCase()));
})


</script>

<template>
  <NavBar />
  <div class="register-page d-flex align-items-center justify-content-center min-vh-100">
    <div class="card animated-card shadow-lg" style="max-width: 800px; width: 100%;">
      <!-- Card Header with Gradient -->
      <div class="card-header text-center py-4 gradient-header">
        <h2 class="mb-0 text-white fw-bold display-6">Hospital Registration</h2>
        <p class="text-white-50 mb-0">Join our network of healthcare providers</p>
      </div>

      <!-- Form with Floating Labels -->
      <form class="p-4 p-md-5" @submit.prevent="hospital">
        <div class="row g-4">
          <!-- Hospital Name -->
          <div class="col-md-6">
            <div class="form-floating">
              <input
                  id="hospital_name"
                  type="text"
                  class="form-control form-control-lg"
                  v-model="input.hospital_name"
                  placeholder=" "
                  required
              />
              <label for="hospital_name" class="fw-semibold">Hospital Name</label>
              <div class="form-icon">
                <i class="fas fa-hospital"></i>
              </div>
            </div>
          </div>

          <!-- Hospital Email -->
          <div class="col-md-6">
            <div class="form-floating">
              <input
                  id="hospital_email"
                  type="email"
                  v-model="input.hospital_email"
                  class="form-control form-control-lg"
                  placeholder=" "
                  required
              />
              <label for="hospital_email" class="fw-semibold">Hospital Email</label>
              <div class="form-icon">
                <i class="fas fa-envelope"></i>
              </div>
            </div>
          </div>

          <!-- Hospital Address -->
          <div class="col-12">
            <div class="form-floating">
              <input
                  id="hospital_address"
                  type="text"
                  v-model="input.hospital_address"
                  class="form-control form-control-lg"
                  placeholder=" "
                  required
              />
              <label for="hospital_address" class="fw-semibold">Hospital Address</label>
              <div class="form-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
            </div>
          </div>

          <!-- Hospital Contact -->
          <div class="col-md-6">
            <div class="form-floating">
              <input
                  id="hospital_contact"
                  type="tel"
                  v-model="input.hospital_contact"
                  class="form-control form-control-lg"
                  placeholder=" "
                  required
              />
              <label for="hospital_contact" class="fw-semibold">Hospital Contact</label>
              <div class="form-icon">
                <i class="fas fa-phone"></i>
              </div>
            </div>
          </div>

          <!-- Hospital Location -->
          <div class="col-md-6">
            <div class="form-floating">
              <input
                  id="hospital_location"
                  type="text"
                  v-model="input.hospital_location"
                  class="form-control form-control-lg"
                  placeholder=" "
                  required
              />
              <label for="hospital_location" class="fw-semibold">Hospital Location</label>
              <div class="form-icon">
                <i class="fas fa-map-pin"></i>
              </div>
            </div>
          </div>

          <!-- Select Constituency -->
          <div class="col-md-6">
            <div class="form-floating">
              <input
                  id="hospital_country"
                  type="text"
                  v-model="input.hospital_country"
                  class="form-control form-control-lg"
                  placeholder=" "
                  @input="filterConstituencies"
              />
              <label for="hospital_country" class="fw-semibold">Select Constituency</label>
              <div class="form-icon">
                <i class="fas fa-globe-africa"></i>
              </div>
              <div v-if="input.hospital_country" class="dropdown-options mt-2">
                <div
                    v-for="constituency in filteredConstituencies"
                    @click="input.hospital_country = constituency"
                    class="dropdown-item"
                >
                  {{constituency}}
                </div>
              </div>
            </div>
          </div>

          <!-- Hospital City -->
          <div class="col-md-6">
            <div class="form-floating">
              <input
                  id="hospital_city"
                  type="text"
                  v-model="input.hospital_city"
                  class="form-control form-control-lg"
                  placeholder=" "
                  required
              />
              <label for="hospital_city" class="fw-semibold">City</label>
              <div class="form-icon">
                <i class="fas fa-city"></i>
              </div>
            </div>
          </div>

          <!-- Monthly Payment -->
          <div class="col-12">
            <div class="form-floating">
              <select
                  id="monthly_subscription"
                  class="form-select form-select-lg"
                  v-model="input.number_of_monthly_subscription"
                  required
              >
                <option value="" disabled selected></option>
                <option value="50">1 Month - GHC50</option>
                <option value="150">6 Months - GHC150</option>
                <option value="250">1 Year - GHC250</option>
              </select>
              <label for="monthly_subscription" class="fw-semibold">Monthly Payment Plan</label>
              <div class="form-icon">
                <i class="fas fa-credit-card"></i>
              </div>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="col-12 mt-4">
            <button
                :disabled="is_loading"
                type="submit"
                class="btn btn-primary btn-lg w-100 gradient-btn py-3"
            >
              <span class="button-content">
                <i class="fas fa-hospital-user me-2"></i>
                Register Hospital
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>
.register-page {
  padding: 2rem;
  background-image: url(@/assets/img/Doctor-amico.svg);
  background-size: cover;
  background-blend-mode: overlay;
}

.card {
  border: none;
  border-radius: 20px;
  overflow: hidden;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.animated-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 31, 63, 0.2);
}

.gradient-header {
  background: linear-gradient(135deg, #001f3f 0%, #003366 100%);
  border-bottom: none;
}

.form-floating {
  position: relative;
}

.form-icon {
  position: absolute;
  top: 50%;
  right: 15px;
  transform: translateY(-50%);
  color: #001f3f;
  opacity: 0.7;
}

.form-control, .form-select {
  padding-left: 15px;
  padding-right: 45px;
  height: 60px;
  border-radius: 10px;
  border: 1px solid #e0e0e0;
  transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
  border-color: #001f3f;
  box-shadow: 0 0 0 0.25rem rgba(0, 31, 63, 0.15);
  outline: none;
}

.form-control:focus + .form-icon, .form-select:focus + .form-icon {
  color: #001f3f;
  opacity: 1;
}

.gradient-btn {
  background: linear-gradient(to right, #001f3f, #003366);
  border: none;
  border-radius: 10px;
  font-weight: 600;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.gradient-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0, 31, 63, 0.3);
}

.gradient-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: all 0.5s ease;
}

.gradient-btn:hover::before {
  left: 100%;
}

.dropdown-options {
  position: absolute;
  width: 100%;
  max-height: 200px;
  overflow-y: auto;
  background: white;
  border: 1px solid #e0e0e0;
  border-radius: 8px;
  z-index: 1000;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
  padding: 10px 15px;
  cursor: pointer;
  transition: all 0.2s ease;
}

.dropdown-item:hover {
  background-color: #f8f9fa;
  color: #001f3f;
}

/* Floating label animation */
.form-floating label {
  transition: all 0.2s ease;
  color: #6c757d;
}

.form-floating .form-control:not(:placeholder-shown) ~ label,
.form-floating .form-control:focus ~ label {
  transform: scale(0.85) translateY(-1.5rem) translateX(0.15rem);
  color: #001f3f;
  background: white;
  padding: 0 5px;
  border-radius: 4px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .card {
    margin: 1rem;
  }

  .register-page {
    padding: 1rem;
  }
}
</style>