<template>
  <section class="">
    <div class="main-sec">
      <div class="d-flex justify-content-center container arrow-sec">
        <img class="arrow" src="/images/arrow.svg" alt="" />
      </div>
      <div class="custom-container container-fluid">
        <div
          class="d-flex justify-content-between align-items-center gap-4 conte"
        >
          <div class="d-flex flex-column icoon">
            <img
              src="/images/locationicon.svg"
              width="100%"
              class="top-icon right"
              loading="lazy"
            />
            <img
              src="/images/papericon.svg"
              class="bottom-icon right"
              width="100%"
              loading="lazy"
            />
          </div>
          <div class="d-flex flex-column">
            <div class="d-flex flex-column text-center mb-5">
              <h2 class="fw-bold mb-5 title" style="font-size: 40px">
                {{ $t("Download app") }}
                <span class="circle" style="color: #2d9596; padding: 4%">
                  {{ $t("now") }}
                </span>
              </h2>
              <p class="description desc" style="font-size: 20px">
                {{ $t("desc-main-sec") }}
              </p>
            </div>
            <div class="d-flex justify-content-center apps">
              <div class="store-icons pt-5">
                <!-- Google Play Store Icon with Link -->
                <a href="https://play.google.com/store">
                  <img
                    class="store-icon"
                    src="/images/Play_Store.svg"
                    alt="Google Play Store"
                    style="width: 90%; height: auto"
                    loading="lazy"
                  />
                </a>

                <!-- Apple App Store Icon with Link -->
                <a href="https://apps.apple.com">
                  <img
                    class="store-icon"
                    src="/images/App_Store.svg"
                    alt="Apple App Store"
                    style="width: 90%; height: auto"
                    loading="lazy"
                  />
                </a>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column icoon">
            <img
              src="/images/caricon.svg"
              width="100%"
              class="top-icon left"
              loading="lazy"
            />
            <img
              class="bottom-icon left"
              src="/images/tagicon.svg"
              width="100%"
              loading="lazy"
            />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
.top-icon {
  margin-bottom: 160px;
  width: 80%;
}

.bottom-icon {
  width: 80%;
}
.description {
  margin: auto;
  width: 70%;
}
.apps {
  width: 65% !important;
  margin: auto;
}
.circle {
  background: url("/images/circle.svg") no-repeat center center;
  background-size: contain;
  padding: 10px; /* Adjust the padding as needed */
}
.main-sec {
  position: relative;
  height: 677px; /* Adjust based on your design needs */
  width: 100%; /* Ensure .main-sec spans the full width, adjust if necessary */
  margin-top: 200px;
}

.arrow-sec {
  position: absolute;
  left: 45%; /* Center horizontally */
  top: -7%; /* Center vertically */
  z-index: 9;
  transform: translate(
    -50%,
    -50%
  ); /* Adjust position to truly center based on .arrow-sec dimensions */
}
.arrow {
  width: 10%;
}

.custom-container {
  display: flex;
  flex-direction: column;
  justify-content: center; /* Center content vertically */
  align-items: center; /* Center content horizontally */
  background-image: url("/images/Bg.svg"); /* Ensure correct path */
  height: 498px; /* Adjust based on your design needs */
  background-repeat: no-repeat;
  background-position: center; /* Center the background image */
  background-size: cover; /* Use 'cover' to fill the entire container, or 'contain' to fit the image into the container */
}
.store-icons {
  display: flex;
  gap: 20px;
}
p {
  line-height: 30px;
  color: #7689a1;
}
@media screen and (min-width: 992px) and (max-width: 1250px) {
}
@media screen and (min-width: 960px) and (max-width: 991px) {
}
@media screen and (max-width: 960px) {
  .description {
    margin: auto;
    width: 100%;
  }
  .main-sec {
    margin-top: 100px;
    height: 577px; /* Adjust based on your design needs */
  }

  .arrow-sec {
    position: absolute;
    left: 45%; /* Center horizontally */
    top: -1%; /* Center vertically */
    transform: translate(
      -50%,
      -50%
    ); /* Adjust position to truly center based on .arrow-sec dimensions */
  }
  .arrow {
    width: 4rem;
  }
}
@media screen and (max-width: 767px) {
  .title {
    font-size: 30px !important;
  }
  .desc {
    font-size: 15px !important;
  }

  .store-icons {
    width: 100%;
    gap: 1px !important;
  }
  .custom-container {
    width: 100% !important;

    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
    align-items: center; /* Center content horizontally */
    background: var(--GREEN-BG, #eaf2f2);
    height: 498px; /* Adjust based on your design needs */
    background-repeat: no-repeat;
    background-position: center; /* Center the background image */
    background-size: cover; /* Use 'cover' to fill the entire container, or 'contain' to fit the image into the container */
  }

  .description {
    margin: auto;
    width: 100% !important;
    font-size: 16px;
  }

  .top-icon {
    top: 5%;
    position: absolute;
    width: 150px;
  }
  .top-icon.left {
    left: 10px;
  }

  .top-icon.right {
    right: 10px;
  }

  .bottom-icon {
    position: absolute;
    width: 150px;
    bottom: -20px;
  }
  .bottom-icon.left {
    left: 10px;
  }
  .bottom-icon.right {
    right: 10px;
  }
  .apps {
    width: 100% !important;
    margin: auto;
  }
  .conte {
    margin: 10%;
  }
}

@media screen and (min-width: 500px) {
}
</style>
