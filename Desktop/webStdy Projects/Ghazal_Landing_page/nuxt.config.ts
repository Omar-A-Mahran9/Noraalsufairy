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
        // lazy: true,
        langDir: "locales",
        strategy: "prefix_and_default",
        detectBrowserLanguage: false,
        locales: [
            {
                code: "en",
                iso: "en",
                dir: "ltr",
                name: "english",
                file: "en.json",
            },
            {
                code: "ar",
                iso: "ar",
                dir: "rtl",
                name: "عربي",
                file: "ar.json",
            },
        ],
        defaultLocale: "ar",
    },
    vite: {
        vue: {
            template: {
                transformAssetUrls,
            },
        },
    },
});
