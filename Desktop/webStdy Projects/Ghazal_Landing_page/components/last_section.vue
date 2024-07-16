<template>
  <section class="pt-5 mb-5" dir="rtl">
    <div class="last-section container back">
      <div class="row content-div">
        <div class="col-md-6 col-12 mobilesection">
          <h2 class="mb-5 fw-bold text-center text-light" style="line-height:34px; ">
            {{ $t("description last section") }}
          </h2>
        </div>
        <div class="col-md-6 col-12 p-5 form">
          <div>
            <form id="contact_form" name="contact_form" method="post">
              <div class="col">
                <input
                  type="text"
                  required
                  maxlength="100"
                  :placeholder="$t('Name')"
                  class="form-control"
                  id="name"
                  name="name"
                />
              </div>
              <div class="col">
                <input
                  type="text"
                  required
                  maxlength="50"
                  :placeholder="$t('Garage Name')"
                  class="form-control"
                  id="garage_name"
                  name="garage_name"
                />
              </div>
              <div class="col">
                <input
                  type="text"
                  required
                  maxlength="50"
                  class="form-control"
                  :placeholder="$t('Phone')"
                  id="phone_input"
                  name="Phone"
                />
              </div>
              <div class="mb-5">
                <textarea
                  class="form-control"
                  id="message"
                  name="message"
                  rows="5"
                  :placeholder="$t('Message')"
                ></textarea>
              </div>
              <div>
                <input
                  class="form-check-input ml-4"
                  type="checkbox"
                  value=""
                  id="approveCheckbox"
                  style="width: 20px; height: 20px"
                />
                <label class="form-check-label" for="approveCheckbox">
                  {{ $t("Approved") }}
                </label>
              </div>
              <button
                type="submit"
                class="btn d-flex align-items-center justify-content-between"
                style="width: 205px; color: white"
              >
                <div class="m-1 text-white">
                  {{ $t("Send") }}
                </div>
                <div>
                  <span><img src="/images/arrow-left.svg" alt="" loading="lazy"/></span>
                </div>
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-12 rightsection">
          <h1 class="mb-5 fw-bold text-light" style="line-height:60px; font-size: 40px;">
            {{ $t("description last section") }}
          </h1>
          <p class="text-light text-justify" style="font-size: 20px;">{{ $t("subdescription") }}</p>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
input {
  margin-bottom: 20px;
  height: 60px;
  border-radius: 8px;
}
.form {
  margin-top: -50px; /* Moves the form up by 30px */
  margin-right: 90px;
  margin-bottom: 50px;
  background-color: white;
  border-radius: 25px;
  width: 546px;
  box-shadow: 0px 80.5999984741211px 105.70134735107422px 0px #3333331a;
}
input:focus,
textarea:focus {
  border: 2px solid black !important;
  box-shadow: none !important;
  margin-bottom: 14px;
}
button {
  background: linear-gradient(247.15deg, #2d9596 130.42%, #3cadae 1021.43%);
  color: white;
  border: none; /* Optionally remove the border */
  transition: box-shadow 0.3s ease; /* Add a transition for smooth hover effect */
}

button:hover {
  box-shadow: 8px 8px 1px rgba(0, 0, 0, 1); /* Add the box-shadow on hover */
}

.form-check-input:checked {
  background-color: #2c9596;
  border-color: #2c9596;
}
.back {
  position: relative;
  background-color: transparent; /* Make the actual background transparent */
  border-radius: 25px; /* Border radius to create rounded corners */
  z-index: 0; /* Create stacking context without changing stack order */
}
.mobilesection{
    display: none;
  }
.back::before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: -1; /* Ensure the pseudo-element is behind the content */
  background: url("/images/Vectorrr.png") center no-repeat,
    linear-gradient(
      rgba(60, 171, 175, 1) 4%,
      rgba(60, 173, 174, 1) 8%,
      rgba(60, 173, 173, 1) 96%
    );

  clip-path: polygon(
    0% 92.027%,
    0% 92.027%,
    0% 92.823%,
    0.002% 93.542%,
    0.007% 94.19%,
    0.017% 94.774%,
    0.033% 95.3%,
    0.056% 95.773%,
    0.09% 96.202%,
    0.134% 96.591%,
    0.19% 96.948%,
    0.261% 97.279%,
    0.261% 97.279%,
    0.334% 97.555%,
    0.415% 97.82%,
    0.503% 98.073%,
    0.599% 98.313%,
    0.702% 98.54%,
    0.811% 98.754%,
    0.927% 98.953%,
    1.048% 99.137%,
    1.176% 99.305%,
    1.308% 99.457%,
    1.308% 99.457%,
    1.467% 99.604%,
    1.639% 99.722%,
    1.826% 99.814%,
    2.032% 99.883%,
    2.26% 99.932%,
    2.513% 99.965%,
    2.793% 99.985%,
    3.105% 99.996%,
    3.451% 99.999%,
    3.834% 100%,
    95.01% 100%,
    95.01% 100%,
    95.641% 99.999%,
    96.208% 99.992%,
    96.718% 99.974%,
    97.172% 99.938%,
    97.575% 99.88%,
    97.931% 99.792%,
    98.243% 99.669%,
    98.516% 99.507%,
    98.752% 99.297%,
    98.957% 99.036%,
    98.957% 99.036%,
    99.116% 98.771%,
    99.263% 98.481%,
    99.397% 98.167%,
    99.517% 97.832%,
    99.624% 97.479%,
    99.715% 97.108%,
    99.792% 96.721%,
    99.853% 96.322%,
    99.898% 95.91%,
    99.926% 95.49%,
    99.926% 95.49%,
    99.929% 94.991%,
    99.894% 94.461%,
    99.822% 93.89%,
    99.713% 93.27%,
    99.567% 92.589%,
    99.385% 91.839%,
    99.167% 91.009%,
    98.914% 90.09%,
    98.626% 89.072%,
    98.304% 87.945%,
    78.827% 19.959%,
    78.827% 19.959%,
    78.724% 19.6%,
    78.63% 19.276%,
    78.544% 18.984%,
    78.465% 18.721%,
    78.391% 18.484%,
    78.32% 18.271%,
    78.251% 18.078%,
    78.183% 17.903%,
    78.113% 17.742%,
    78.041% 17.594%,
    78.041% 17.594%,
    77.975% 17.469%,
    77.907% 17.35%,
    77.837% 17.236%,
    77.765% 17.128%,
    77.691% 17.025%,
    77.615% 16.929%,
    77.538% 16.838%,
    77.459% 16.753%,
    77.378% 16.674%,
    77.296% 16.602%,
    77.296% 16.602%,
    77.201% 16.528%,
    77.102% 16.465%,
    76.997% 16.409%,
    76.884% 16.36%,
    76.761% 16.315%,
    76.626% 16.274%,
    76.478% 16.235%,
    76.315% 16.195%,
    76.134% 16.154%,
    75.934% 16.111%,
    4.235% 0.428%,
    4.235% 0.428%,
    3.816% 0.337%,
    3.438% 0.259%,
    3.098% 0.196%,
    2.791% 0.152%,
    2.514% 0.129%,
    2.264% 0.131%,
    2.038% 0.16%,
    1.833% 0.22%,
    1.643% 0.313%,
    1.468% 0.443%,
    1.468% 0.443%,
    1.321% 0.583%,
    1.18% 0.743%,
    1.044% 0.922%,
    0.915% 1.119%,
    0.793% 1.333%,
    0.678% 1.564%,
    0.57% 1.81%,
    0.47% 2.071%,
    0.379% 2.347%,
    0.296% 2.636%,
    0.296% 2.636%,
    0.216% 2.986%,
    0.152% 3.367%,
    0.102% 3.787%,
    0.064% 4.251%,
    0.037% 4.767%,
    0.019% 5.342%,
    0.008% 5.981%,
    0.002% 6.692%,
    0% 7.482%,
    0% 8.358%,
    0% 92.027%
  );

  border-radius: 25px; /* Apply border-radius to match the element */
}

.rightsection {
  padding-right: 80px;
  width: 45%;
  margin: auto;
  margin-right: 0;
  line-height: 30px;
}

@media screen and (max-width: 1200px) {
  input {
  }
  input:focus,
  textarea:focus {
    border: 2px solid black !important;
    margin-bottom: 14px;
  }
  .form {
    margin-top: 20px !important;
    background-color: white;
    border-radius: 20px;
    width: 85%;
    margin: auto;
    box-shadow: 102px 180.5999984741211px 105.70134735107422px 120px #3333331a;
    margin-bottom: 100px;
  }

  button {
    background: linear-gradient(247.15deg, #2d9596 130.42%, #3cadae 1021.43%);
    color: white;
  }
  .form-check-input:checked {
    background-color: #2c9596;
    border-color: #2c9596;
  }
  .back {
    padding: 10px;
    border-radius: 0 !important;
    background: linear-gradient(
      180deg,
      rgba(60, 171, 175, 1) 4%,
      rgba(60, 173, 174, 1) 8%,
      rgba(60, 173, 173, 1) 96%
    );
    clip-path: polygon(0 0, 100% 5%, 100% 100%, 0% 100%);

  }
  .back::before {
    background: linear-gradient(
      rgba(60, 171, 175, 1) 4%,
      rgba(60, 173, 174, 1) 8%,
      rgba(60, 173, 173, 1) 96%
    );

  }

  .rightsection {
    padding: 20px;
    width: 100%;
    text-align: center;
    margin: auto;
    line-height: 30px;
    display: none;
  }
  .mobilesection{
    padding-right: 20px;
    padding-left: 20px;
    margin-top: 80px !important;
    display: block;
  }
}
</style>
