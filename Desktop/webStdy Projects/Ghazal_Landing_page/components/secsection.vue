<template>
  <section class="container">
    <div class="d-flex flex-column">
      <div
        class="d-flex flex-column justify-content-center align-items-center w-100 text-center"
      >
        <p class="main_title text-dark" style="font-size: 40px">
          {{ $t("About Gazell") }}
        </p>
        <p class="description">{{ $t("description") }}</p>
      </div>
    </div>
  </section>
</template>
<script setup>
import { ref } from "vue";
let playVideoBtn = ref(false);
const videoSrc = ref(
  "https://www.youtube.com/embed/fsKFLZTKNvA?si=OBPFNINVEWNzDXan?autoplay=1"
);

function playVideo() {
  videoSrc.value += "&autoplay=1";
}
</script>

<style scoped>
.video-container {
  width: 100%;
  height: 1000px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 24px;
  position: relative;
}
.video-container .play {
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translateX(-50%);
  z-index: 11;
  cursor: pointer;
}
.video-container iframe {
  width: 100%;
  height: 100%;
  border-radius: 24px;
}
.video-container .overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 24px;
  background-color: #22272e;
  opacity: 0.64;
}
.video-container .main {
  width: 40%;
}
.sec-section {
  margin-bottom: 100px;
}
.description {
  font-size: 20px;
  font-weight: 400;
  line-height: 32px;
  letter-spacing: 0em;
  text-align: center;
  color: #7689a1;
  width: 44%;
  margin-bottom: 60px;
}
.video-container {
  position: relative;
  width: 100%;
  height: 100%;
  margin: 0 auto;
  border-radius: 24px;
}

.play-button {
  position: relative;
  display: block;
  width: 100%;
  overflow: hidden;
  cursor: pointer;
  z-index: 99;
}

.play-button img {
  width: 100%;
  height: auto;
}

.play-icon {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80px; /* Adjust the size of the play button */
  height: 80px; /* Adjust the size of the play button */
  background: url("/images/play.svg") no-repeat center center;
  background-size: contain;
  z-index: 99999999;
}

.youtube-player {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 999999;
}
.youtube-player iframe {
  border-radius: 24px;
}
.thumbnail-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 24px;
  background: #22272e;
  opacity: 0.64;
  z-index: 9;
}
.thumbnail-image {
  width: 50% !important;
  display: block;
  margin: auto;
  padding: 100px;
}
@media screen and (max-width: 959px) {
  .description {
    font-size: 1rem;
    font-weight: 400;
    line-height: 25px;
    letter-spacing: 0em;
    text-align: center;
    color: #7689a1;
    width: 90%;
  }
}
</style>
