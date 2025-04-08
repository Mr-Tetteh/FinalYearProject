<script setup>
import NavBar from "@/components/NavBar.vue";
import useHospital from "@/composerbles/useHospital.js";
import {computed, ref} from "vue";
const { input, register_hospital } = useHospital();

const hospital = () => {
  register_hospital();
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

        <div class="form-group mb-4">
          <label for="hospital_email" class="form-label fw-bold">Hospital Location</label>
          <input
              id="hospital_email"
              type="text"
              v-model="input.hospital_location"
              class="form-control form-control-lg"
              placeholder="Enter hospital location"
              required
          />
        </div>


        <!-- Select Country -->
        <!-- Select Country -->
        <div class="form-group mb-4">
          <label for="hospital_country" class="form-label fw-bold">Select Consistency </label>
          <input class="form-control form-control-lg" type="text" v-model="input.hospital_country" @input="filterConstituencies"/>
          <div v-if="input.hospital_country">
            <p v-for="constituency in filteredConstituencies" @click="input.hospital_country = constituency">{{constituency}}</p>
          </div>
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
