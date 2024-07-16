<template>
  <section class="container section-three">
    <div class="row align-items-center">
      <div class="col-12 col-md-6">
        <div class="text_container">
          <span class="sub_title">{{ $t("section3span") }}</span>
          <p class="tiltle">{{ $t("why Ghazell") }}</p>
          <p class="description" style="color: #7689a1">
            {{ $t("description2") }}
          </p>
        </div>
        <div class="row">
          <div class="col-6" style="margin-bottom: 64px">
            <div class="d-flex flex-column">
              <div class="mb-5 icon">
                <img src="/images/Icon1.svg" alt="" loading="lazy" />
              </div>
              <div class="w-4">
                <h4 class="title-sec">{{ $t("first-title-sec3") }}</h4>
                <p class="desc-sec">{{ $t("first-description-sec3") }}</p>
              </div>
            </div>
          </div>
          <div class="col-6" style="margin-bottom: 64px">
            <div class="d-flex flex-column">
              <div class="mb-5 icon">
                <img src="/images/Icon2.svg" alt="" loading="lazy" />
              </div>
              <div class="w-4">
                <h4 class="title-sec">{{ $t("secound-title-sec3") }}</h4>
                <p class="desc-sec">{{ $t("secound-description-sec3") }}</p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex flex-column">
              <div class="mb-5 icon">
                <img src="/images/Icon3.svg" alt="" loading="lazy" />
              </div>
              <div class="w-4">
                <h4 class="title-sec">{{ $t("third-title-sec3") }}</h4>
                <p class="desc-sec">{{ $t("third-description-sec3") }}</p>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex flex-column">
              <div class="mb-5 icon">
                <img src="/images/Icon4.svg" alt="" loading="lazy" />
              </div>
              <div class="w-4">
                <h4 class="title-sec">{{ $t("fourd-title-sec3") }}</h4>
                <p class="desc-sec">{{ $t("fourd-description-sec3") }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 mob-image">
        <img
          src="/images/image_circles.svg"
          alt=""
          width="100%"
          loading="lazy"
        />
      </div>
    </div>
  </section>
</template>
<style scoped>
.title-sec {
  font-weight: bold;
  line-height: 24px;
}
.desc-sec {
  color: #7689a1; /* Use a muted gray color */
  width: 70%;
  line-height: 24px;
}
.section-three {
  margin-bottom: 150px;
}
.text_container {
  text-align: right;
  width: 474px;
  margin-bottom: 72px;
}
.sub_title {
  font-size: 14px;
  font-weight: 400;
  line-height: 24px;
  letter-spacing: 0px;
  color: #2d9596;
}
.tiltle {
  font-family: "Janna-Bold";
  font-size: 40px;
  font-weight: 700;
  letter-spacing: 0px;
  text-align: right;
}
.description {
  font-size: 20px;
}

/* @media screen and (min-width: 992px) and (max-width: 1250px) {
}
@media screen and (min-width: 960px) and (max-width: 991px) {
}
@media screen and (max-width: 960px) {
}
*/
@media screen and (max-width: 767px) {
  .text_container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
    width: 100%;
    overflow: hidden;
  }
  .description {
    text-align: center;
    width: 100%;
  }
  .sub_title {
    font-size: 14px;
    font-weight: 400;
    line-height: 24px;
    letter-spacing: 0px;
    color: #2d9596;
  }
  .tiltle {
    font-family: "Janna-Bold";
    font-size: 40px;
    font-weight: 700;
    letter-spacing: 0px;
    text-align: right;
  }
  .description {
    font-size: 15px;
  }
  .mob-image {
    display: none;
  }
  .title-sec {
    text-align: center;
  }
  .desc-sec {
    text-align: center;
    width: 100%;
  }
  .icon {
    display: flex;
    justify-content: center;
  }
}

/* @media screen and (max-width: 1200px) {
  .text_container {
    text-align: right;
    width: 300px;
   }
  .description {
    font-size: 15px;
  }
} */
</style>
