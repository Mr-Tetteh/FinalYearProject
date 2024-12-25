<script setup>
import usePatients from "@/composerbles/usePatients.js";
import {onMounted} from "vue";

const props = defineProps({
  id:{
    type:String,
    required:true
  }
})
const {patient_record, list_patients_record} = usePatients()

onMounted(()=> list_patients_record(props.id))
</script>

<template>

</template>

<style scoped>

</style>