<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="#">
        <img src="/images/logo.svg" alt="" loading="lazy"
      /></a>
      <div class="nav-text text-white fw-bold">
        {{ $t("Download app") }}
      </div>
    </div>
  </nav>
</template>
<style scoped>
.nav-link {
  color: white;
}
.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='white' stroke-linecap='round' stroke-miterlimit='100' stroke-width='3' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");

  background-size: contain; /* Ensure the image fits within the button */
  width: 30px; /* Adjust width as needed */
  height: 20px; /* Adjust height as needed */
  display: inline-block; /* Ensure the button maintains proper size */
}
.navbar-toggler {
  border: 2px solid #ffff;
}

@media screen and (max-width: 768px) {
  .nav-text {
    display: none;
  }
}
</style>
