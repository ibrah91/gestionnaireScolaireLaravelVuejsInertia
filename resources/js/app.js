import "./bootstrap";

import { createApp, h } from "vue";
// Link est ajoter ici pour être ici en utilisation globale
import { createInertiaApp, Link } from "@inertiajs/inertia-vue3";
import MainLayout from "./layouts/MainLayout.vue";

import { ZiggyVue } from "ziggy";
import { Ziggy } from "./ziggy";

createInertiaApp({
    resolve: (name) => {
        let page = require(`./Pages/${name}`).default
        page.layout ??= MainLayout
        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            // Link est ajoter ici pour être ici en utilisation globale
            .component("Link", Link)
            .mixin({ methods: { route } })
            .mount(el);
    },
});
