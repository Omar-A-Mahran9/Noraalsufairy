<template>
  <section class="container" dir="rtl">
    <div class="row setion5">
      <div class="col-12 sec1">
        <div class="about-us">
          <p>
            <strong style="color: #2d9596">نقدم</strong>{{ $t("about-us") }}
          </p>
        </div>
        <div class="image-container">
          <img
            src="/images/Macbook.png"
            alt=""
            class="macbook-img"
            loading="lazy"
          />
          <img
            src="/images/mobile.png"
            alt=""
            class="mobile-img"
            loading="lazy"
          />
        </div>
      </div>
      <div class="col-12 sec2">
        <div class="row">
          <div class="col-lg-4 col-12 mb-5">
            <div class="column-content">
              <div
                class="d-flex flex-column flex-md-row align-items-center gap-5"
              >
                <div>
                  <img src="/images/1icon.svg" alt="" loading="lazy" />
                </div>
                <div>
                  <p class="title-icons text-center text-md-right">
                    {{ $t("first-title") }}
                  </p>
                  <p class="description-icons text-center text-md-right">
                    {{ $t("first-description") }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12 mb-5">
            <div class="column-content">
              <div
                class="d-flex flex-column flex-md-row align-items-center gap-5"
              >
                <div>
                  <img src="/images/2dicon.svg" alt="" loading="lazy" />
                </div>
                <div>
                  <p class="title-icons text-center text-md-right">
                    {{ $t("secound-title") }}
                  </p>
                  <p class="description-icons text-center text-md-right">
                    {{ $t("secound-description") }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="column-content">
              <div
                class="d-flex flex-column flex-md-row align-items-center gap-5"
              >
                <div>
                  <img src="/images/3dicon.svg" alt="" loading="lazy" />
                </div>
                <div>
                  <p class="title-icons text-center text-md-right">
                    {{ $t("third-title") }}
                  </p>
                  <p class="description-icons text-center text-md-right">
                    {{ $t("third-description") }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
.section5 {
}
.about-us {
  width: 60%;
  text-align: center;
  margin: auto;
  font-size: 24px;
}
.image-container {
  position: relative;
  margin-top: 50px;
  height: 659px !important;
}

.column-content {
  width: 90%; /* Makes the content occupy 90% of the column width */
  margin: auto; /* Centers the content within the column */
}
.macbook-img,
.mobile-img {
  width: 100%;
  position: absolute;
}

.macbook-img {
  z-index: 1;
  top: 0;
  left: 0;
}

.mobile-img {
  z-index: 2;
  width: 25%;
  top: 40%;
  right: 9%;
}
.title-icons {
  font-weight: bold;
  font-size: 20px;
}
.description-icons {
  text-align: justify;
  font-size: 16px;
}
.sec2 {
  margin-top: 140px;
}

.description-icons {
  color: #7689a1;
}
@media screen and (min-width: 992px) and (max-width: 1250px) {
  .mobile-img {
    z-index: 2;
    top: 12rem;
    right: 6rem;
  }
  .sec2 {
    margin-top: -10px;
  }
}
@media screen and (min-width: 960px) and (max-width: 991px) {
  .mobile-img {
    z-index: 2;
    top: 7.5rem;
    right: 4rem;
  }
  .sec2 {
    margin-top: -180px;
  }
}
@media screen and (max-width: 960px) {
  .about-us {
    width: 90%;
    text-align: center;
    margin: auto;
    font-size: 1.3rem;
  }
  .mobile-img {
    z-index: 2;
    top: 7.5rem;
    right: 4rem;
  }
  .image-container {
    position: relative;
    margin-top: 50px;
    height: 300px !important;
  }
  .column-content {
    width: 80%; /* Makes the content occupy 90% of the column width */
  }
  .sec2 {
    margin-top: 130px;
  }
}
@media screen and (max-width: 767px) {
  .mobile-img {
    z-index: 2;
    top: 5.8rem;
    right: 2.7rem;
  }
  .about-us {
    width: 90%;
    text-align: center;
    margin: auto;
    font-size: 17px;
  }
  .sec1 {
    margin-bottom: -60px;
  }
  .sec2 {
    margin-top: 50px;
  }
}

@media screen and (max-width: 500px) {
  .mobile-img {
    z-index: 2;
    top: 4rem;
    right: 2rem;
  }
}
</style>
