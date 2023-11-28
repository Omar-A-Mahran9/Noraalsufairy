<template>
  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand"><img src="@/assets/image/Logo.svg" /></a>
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <h5 class="text-white h4">Collapsed content</h5>
          <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>
      </div>
      <form
        class="d-flex align-items-center"
        style="background-color: #f3f3f3; border-radius: 15px; width: 40%"
      >
        <button class="searc btn" type="submit">
          <img src="@/assets/image/search.svg" />
        </button>
        <input
          class="searc"
          type="search"
          placeholder="Type for Search"
          aria-label="Search"
          style="background-color: transparent; border: none; width: 100%"
        />
      </form>
      <div class="d-flex gap-4 align-items-center">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarToggleExternalContent"
          aria-controls="navbarToggleExternalContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="prof"> <img src="@/assets/image/profileicon.svg" /> </a>
      </div>
    </div>
  </nav>
</template>
<style>
.navbar-toggler {
  display: block !important;
  border: none !important;
}
span {
  background-image: URL("@/assets/image/menuicon.svg") !important;
  color: red !important;
}
.res {
  margin-left: 20px;
  margin-bottom: 6px;
  border: none !important;
  font-size: 20px !important;
}
ul {
  display: none;
}

@media only screen and (max-width: 991px) {
  .botto {
    width: 150px;

    margin: 10px;
  }
  .res {
    margin-left: 20px;
    margin-bottom: 6px;
    border: none !important;
    font-size: 20px !important;
  }
  .prof,
  .searc {
    display: none !important;
  }
}
</style>
