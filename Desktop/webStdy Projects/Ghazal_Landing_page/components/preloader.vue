<template>
  <div class="preloader" v-if="loading">
    <!-- Image logo for the preloader (white logo) -->
    <img src="/images/logo.svg" alt="Logo" class="logo" loading="lazy" />

    <!-- Pulsating circle -->
    <div class="pulsating-circle"></div>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
  loading: {
    type: Boolean,
    required: true,
  },
});
</script>

<style scoped>
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #2d9596; /* Change background to highlight white logo */
  display: flex;
  flex-direction: column; /* To align logo and pulsating circle vertically */
  align-items: center;
  justify-content: center;
}

.logo {
  width: 100px; /* Adjust the size as needed */
  margin-bottom: 20px; /* Space between the logo and the pulsating circle */
}

.pulsating-circle {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: white;
  animation: pulse 1.5s infinite;
}

@keyframes pulse {
  0% {
    transform: scale(1);
    opacity: 1;
  }
  50% {
    transform: scale(1.5);
    opacity: 0.5;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}
</style>
