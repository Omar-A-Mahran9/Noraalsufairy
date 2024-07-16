// https://nuxt.com/docs/api/configuration/nuxt-config
import vuetify, { transformAssetUrls } from "vite-plugin-vuetify";

export default defineNuxtConfig({
  devtools: { enabled: true },
  build: {
    transpile: ["vuetify"],
  },
  css: ["@/assets/style/main.css"],
  modules: [
    "@nuxtjs/i18n",
    (_options, nuxt) => {
      nuxt.hooks.hook("vite:extendConfig", (config) => {
        // @ts-expect-error
        config.plugins.push(vuetify({ autoImport: true }));
      });
    },
  ],

  i18n: {
    vueI18n: "./i18n.config.ts", // if you are using custom path, default
  },
  vite: {
    vue: {
      template: {
        transformAssetUrls,
      },
    },
  },
});
