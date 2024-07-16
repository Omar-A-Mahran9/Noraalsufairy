<template>
  <div style="direction: rtl">
    <div class="hero_section"></div>
    <div class="main_section container">
      <AppNav class="container mt-5 mb-5" />
      <Herosection style="margin-top: 40px" />
    </div>
    <secsection />
    <div class="container">
      <div class="video-container">
        <div class="overlay" :class="{ 'd-none': playVideoBtn }"></div>
        <img
          @click="(playVideoBtn = !playVideoBtn), playVideo()"
          class="play"
          src="/images/play.svg"
          alt=""
          :class="{ 'd-none': playVideoBtn }"
          loading="lazy"
        />
        <iframe
          v-if="playVideoBtn"
          :src="videoSrc"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
      gyroscope; picture-in-picture"
          allowfullscreen
        ></iframe>
        <img
          class="main"
          :class="{ 'd-none': playVideoBtn }"
          src="/images/illustration.svg"
          alt=""
          loading="lazy"
        />
      </div>
    </div>
    <sec-section />
    <third-section />
    <fifth-section style="margin-top: 50px; margin-bottom: 100px" />
    <last-section />
  </div>
</template>
<script setup>
const { locale } = useI18n();
let playVideoBtn = ref(false);
const videoSrc = ref(
  "https://www.youtube.com/embed/fsKFLZTKNvA?si=OBPFNINVEWNzDXan?autoplay=1"
);

function playVideo() {
  videoSrc.value += "&autoplay=1";
}
</script>
<style>
/* start video container ( home page ) */
.video-container {
  width: 100%;
  height: 584px;
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
  width: 50%;
}
/* end video container ( home page ) */
* {
  color: #363f4d;
}
.hero_section {
  position: absolute;
  width: 100%; /* Set the width as needed */
  height: 890px;
  top: 0;
  background: linear-gradient(to right, #2d9596 0%, #3cadae 100%);
  clip-path: ellipse(130% 80% at 35% 0%);
}
.main_section {
  height: 800px;
}
footer p {
  color: white;
}
@media screen and (max-width: 959px) {
  .hero_section {
    position: absolute;
    width: 100%; /* Set the width as needed */
    height: 600px;
    background: linear-gradient(to right, #2d9596 0%, #3cadae 100%);
    clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%);
  }
  .main_section {
    height: 650px;
  }
  .video-container .play {
    position: absolute;
    top: 35%;
    left: 50%;
    transform: translateX(-50%);
    z-index: 11;
    cursor: pointer;
  }
  .video-container {
    width: 100%;
    height: 300px;
  }
  .video-container .main {
    width: 60%;
  }
}
</style>
