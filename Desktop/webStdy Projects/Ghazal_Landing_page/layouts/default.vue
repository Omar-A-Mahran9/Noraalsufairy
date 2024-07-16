<template>
  <div id="body">
    <preloader :loading="loading" />
    <div v-if="!loading">
      <slot></slot>
      <AppFooter />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
// import Preloader from "./Preloader.vue";

const loading = ref(true);

const hidePreloader = () => {
  loading.value = false;
};

const fetchData = () => {
  // Simulate fetching data with a timeout
  setTimeout(hidePreloader, 1000); // Hide preloader after 1.5 seconds
};

onMounted(() => {
  document.title = "GAZELL - غزال"; // Set the document title
  fetchData();
});
</script>

<style scoped>
#body {
  overflow-x: hidden;
}
</style>
