<script setup>
import { RouterLink, RouterView } from 'vue-router'
const props = defineProps({
  isAuth: {
    type: Boolean,
    default: false
  },
  user: {
    type: [Object, Array],
    required: false
  }
})
</script>

<template>


  <RouterView />

</template>

<style scoped>


</style>
