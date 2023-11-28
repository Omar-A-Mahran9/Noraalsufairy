<template>
  <section class="section2">
    <div
      class="container-fluid d-flex flex-column align-items-center justify-content-center"
    >
      <p class="text-center" style="color: #f59e0b">
        See O<span style="border-top: 2px solid #f59e0b; padding-top: 8px"
          >ur Se</span
        >rvices
      </p>
      <h3 class="text-center">Explore our cloud Solutions</h3>
    </div>
    <div class="row gap-5">
      <div
        style="height: 355px !important"
        v-for="service in services"
        :key="service.title"
        class="cardimage col-4 mb-5"
      >
        <div class="card-body">
          <div style="margin: 40px">
            <h4>{{ service.title }}</h4>
            <p style="font-weight: lighter">{{ service.description }}</p>
            <button
              class="btn btn-primary float-right"
              style="
                position: absolute;

                margin-right: 30px;
                right: 0 !important;
              "
            >
              Learn More
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  data() {
    return {
      services: [
        { title: "Service1", description: "service brief" },
        { title: "Service1", description: "service brief" },
        { title: "Service1", description: "service brief" },
      ],
    };
  },
};
</script>
<style scoped>
.section2 {
  height: 564px;
}
.cardimage {
  background: url("@/assets/image/Rectangle21.svg");
  background-repeat: no-repeat;
  background-size: cover;
  margin: auto;
  border-radius: 20px;
  width: 600px;
  height: 355px;
  position: relative;
}
.card-body {
  background-color: white;
  border-radius: 20px;
  width: 80%;
  height: 199px;
  position: absolute;
  bottom: -100px;
  margin-left: 40px;
}
@media only screen and (max-width: 768px) {
  .cardimage {
    background: url("@/assets/image/Rectangle21.svg");
    background-repeat: no-repeat;
    background-size: cover;
    margin: auto;
    border-radius: 20px;
    width: 350px;
    height: 355px;
    position: relative;
  }
  .card-body {
    background-color: white;
    border-radius: 20px;
    width: 80%;
    height: 199px;
    position: absolute;
    bottom: -100px;
    margin-left: 20px;
  }
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (max-width: 1400px) {
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 600px) and (max-width: 1250px) {
}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 1250px) {
}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1400px) and (max-width: 1600px) {
}
</style>
