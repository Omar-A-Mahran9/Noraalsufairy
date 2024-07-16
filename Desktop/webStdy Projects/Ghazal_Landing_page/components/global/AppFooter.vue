<template>
  <footer>
    <div class="footer" dir="rtl">
      <div class="f"></div>

      <div class="footer-content container">
        <h2 class="text-center mb-5 fw-bold mt-5">
          {{ $t("download the app now") }}
        </h2>
        <div class="store-icons pt-5 d-flex gap-3 justify-content-center mb-5">
          <!-- Google Play Store Icon with Link -->
          <a href="https://play.google.com/store">
            <img
              class="store-icon"
              src="/images/Play_Store.svg"
              alt="Google Play Store"
              width="100%"
              loading="lazy"
            />
          </a>

          <!-- Apple App Store Icon with Link -->
          <a href="https://apps.apple.com">
            <img
              class="store-icon"
              src="/images/App_Store.svg"
              alt="Apple App Store"
              width="100%"
              loading="lazy"
            />
          </a>
        </div>

        <div class="row links">
          <div class="col-md-3 col-12 text-center text-md-start mb-5">
            <div class="d-flex flex-column gap-3 mb-5 mb-md-0">
              <div>
                <a class="navbar-brand" href="#">
                  <img src="/images/logo.svg" alt="" loading="lazy"
                /></a>
              </div>
              <div
                class="text-light text-center text-md-start"
                style="line-height: 29px; text-align: justify"
              >
                <p>{{ $t("footer description") }}</p>
              </div>

              <div
                class="social-icons d-flex gap-4 justify-content-center justify-content-md-start"
              >
                <!-- Instagram icon linked to its URL -->
                <div class="social-icon">
                  <a href="https://www.instagram.com/">
                    <img
                      src="/images/twitter.svg"
                      alt="Facebook"
                      loading="lazy"
                    />
                  </a>
                </div>

                <!-- Facebook icon linked to its URL -->
                <div class="social-icon">
                  <a href="https://www.facebook.com/">
                    <img
                      src="/images/facebook.svg"
                      alt="Facebook"
                      loading="lazy"
                    />
                  </a>
                </div>
                <!-- LinkedIn icon linked to its URL -->
                <div class="social-icon">
                  <a href="https://www.linkedin.com/">
                    <img
                      src="/images/linkedin.svg"
                      alt="LinkedIn"
                      loading="lazy"
                    />
                  </a>
                </div>

                <!-- Facebook icon linked to its URL -->
                <div class="social-icon">
                  <a href="https://www.facebook.com/">
                    <img
                      src="/images/twitter.svg"
                      alt="Facebook"
                      loading="lazy"
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-12 text-center text-md-right mb-5">
            <div>
              <h5 class="fw-bold text-light mb-5">
                {{ $t("Important links") }}
              </h5>
              <div class="important-links d-flex flex-column gap-2">
                <a href="#"> {{ $t("Contact us") }}</a>
                <a href="#">{{ $t("Join to us") }}</a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-12 text-center text-md-right mt-5 mt-md-0">
            <div>
              <h5 class="fw-bold text-light mb-5">
                {{ $t("Conatact") }}
              </h5>
              <div class="important-links d-flex flex-column gap-2">
                <a href="mailto:info@gazelleapp.net">
                  <p>
                    <span class="pl-5">
                      <img
                        src="/images/emailicon.svg"
                        alt="Email Icon"
                        loading="lazy"
                      />
                    </span>
                    info@gazelleapp.net
                  </p>
                </a>
                <a href="tel:+966114903861">
                  <p>
                    <span class="pl-5">
                      <img
                        src="/images/phoneicon.svg"
                        alt="Phone Icon"
                        loading="lazy"
                      />
                    </span>
                    011-490-3861
                  </p>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-12 text-center text-md-start pt-5 pt-md-0">
            <div class="">
              <h5 class="fw-bold text-light mb-5">
                {{ $t("address-header") }}
              </h5>
              <div class="important-links d-flex flex-column gap-2">
                <a href="#">
                  <p
                    class="text-center text-md-start"
                    style="line-height: 29px; text-align: justify"
                  >
                    <span>
                      <img src="/images/location.svg" alt="" loading="lazy"
                    /></span>
                    {{ $t("address") }}
                  </p></a
                >
              </div>
            </div>
          </div>

          <div
            class="d-flex justify-content-center align-items-center fw-bold fs-6"
          >
            <a
              href="https://webstdy.com/ar?utm_source=Gazelle-foorter&utm_medium=referral"
              target="_blank"
              class="text-white text-hover-dark px-2"
              style="text-decoration: none"
            >
              تم تطويرة بواسطة
              <img
                class="mx-4"
                src="https://webstdy.com/CDN/cr_white.png"
                loading="lazy"
              />
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>
<style>
footer {
  margin-top: 100px;
}
.footer {
  position: relative;
  height: 100%;
  padding-top: 80px;
  padding-bottom: 20px;
  overflow: hidden; /* Ensure the clip path doesn't overflow */
}

.footer::before {
  overflow: hidden; /* Ensure the clip path doesn't overflow */
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(113.68deg, #363f4d -1.62%, #0e131b 64.19%);
  clip-path: polygon(
    -42.153% 8.145%,
    -42.153% 8.145%,
    -41.141% 8.467%,
    -38.255% 9.341%,
    -33.717% 10.628%,
    -27.75% 12.192%,
    -20.578% 13.894%,
    -12.424% 15.596%,
    -3.51% 17.159%,
    5.939% 18.447%,
    15.702% 19.321%,
    25.556% 19.643%,
    25.556% 19.643%,
    34.919% 19.202%,
    43.437% 17.99%,
    51.22% 16.174%,
    58.379% 13.923%,
    65.026% 11.404%,
    71.27% 8.784%,
    77.223% 6.231%,
    82.995% 3.912%,
    88.699% 1.996%,
    94.444% 0.648%,
    94.444% 0.648%,
    100.298% 0.043%,
    106.155% 0.14%,
    111.87% 0.788%,
    117.297% 1.838%,
    122.289% 3.138%,
    126.701% 4.54%,
    130.386% 5.891%,
    133.199% 7.043%,
    134.994% 7.844%,
    135.625% 8.145%,
    135.625% 99.926%,
    -42.153% 99.926%,
    -42.153% 8.145%
  );
  z-index: -1; /* Ensure the background stays behind content */
}

.footer-content {
  position: relative; /* Required for z-index to work */
  z-index: 1; /* Ensure content is above the background */
}

/* Style for the h2 tag */
.footer h2 {
  font-size: 24px; /* Adjust size as needed */
  color: white; /* Text color */
  /* Add any other styles you need */
}

.important-links a {
  color: white; /* Set text color to white */
  text-decoration: none; /* Remove underline */
}

.important-links a:hover {
  text-decoration: none; /* Remove underline on hover */
}
.links {
  margin-top: 64.5px;
}

.footer .f {
  margin-top: -100px;
  width: 100%;
  height: 154.51px;
  opacity: 0.2;
  background: #ffffff;
  clip-path: polygon(
    26.956% 93.458%,
    26.956% 93.458%,
    17.139% 91.645%,
    7.375% 86.722%,
    -2.104% 79.468%,
    -11.069% 70.66%,
    -19.289% 61.074%,
    -26.531% 51.488%,
    -32.566% 42.68%,
    -37.163% 35.425%,
    -40.09% 30.503%,
    -41.117% 28.689%,
    -41.117% 65.865%,
    -41.117% 65.865%,
    -40.111% 66.813%,
    -37.242% 69.387%,
    -32.73% 73.181%,
    -26.799% 77.788%,
    -19.668% 82.801%,
    -11.562% 87.814%,
    -2.7% 92.42%,
    6.695% 96.214%,
    16.401% 98.788%,
    26.197% 99.736%,
    26.197% 99.736%,
    32.14% 99.213%,
    37.737% 97.724%,
    43.013% 95.39%,
    47.997% 92.335%,
    52.716% 88.679%,
    57.196% 84.545%,
    61.465% 80.054%,
    65.551% 75.328%,
    69.481% 70.489%,
    73.281% 65.658%,
    73.281% 65.658%,
    75.489% 62.842%,
    77.667% 60.097%,
    79.82% 57.449%,
    81.955% 54.923%,
    84.076% 52.547%,
    86.19% 50.343%,
    88.301% 48.34%,
    90.417% 46.561%,
    92.543% 45.033%,
    94.684% 43.781%,
    94.684% 43.781%,
    100.504% 41.998%,
    106.327% 42.282%,
    112.009% 44.192%,
    117.403% 47.284%,
    122.366% 51.116%,
    126.753% 55.245%,
    130.417% 59.227%,
    133.213% 62.619%,
    134.998% 64.98%,
    135.625% 65.865%,
    135.625% 28.689%,
    135.625% 28.689%,
    135.039% 27.669%,
    133.364% 24.942%,
    130.73% 21.007%,
    127.263% 16.365%,
    123.091% 11.515%,
    118.343% 6.957%,
    113.145% 3.19%,
    107.626% 0.716%,
    101.913% 0.032%,
    96.134% 1.64%,
    96.134% 1.64%,
    93.828% 3.15%,
    91.534% 5.298%,
    89.244% 8.025%,
    86.953% 11.27%,
    84.652% 14.974%,
    82.337% 19.077%,
    80% 23.52%,
    77.634% 28.243%,
    75.234% 33.186%,
    72.792% 38.289%,
    72.792% 38.289%,
    69.053% 46.082%,
    65.184% 53.901%,
    61.165% 61.545%,
    56.972% 68.817%,
    52.585% 75.516%,
    47.98% 81.444%,
    43.137% 86.402%,
    38.033% 90.189%,
    32.647% 92.608%,
    26.956% 93.458%
  );
}

@media screen and (max-width: 768px) {
  .footer {
    background: linear-gradient(113.68deg, #363f4d -1.62%, #0e131b 64.19%);
    padding-left: 30px;
    padding-right: 30px;
  }
  .f {
    display: none;
  }
}

@media screen and (max-width: 960px) {
}
</style>
