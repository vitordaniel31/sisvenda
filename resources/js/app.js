import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

import permissionsMixin from "./Mixins/permissions-mixin";
import sweetAlertMixin from "./Mixins/sweet-alert-mixin";
import dayJsMixin from "./Mixins/dayjs-mixin";

import { toast } from "vue3-toastify";
import Vue3Toastify from "vue3-toastify";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import "dayjs/locale/pt-br";
import "vue3-toastify/dist/index.css";
import VueSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import VueTheMask from "vue-the-mask";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - Sisvenda`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .component("v-select", VueSelect)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueSweetalert2)
            .use(Vue3Toastify, {
                autoClose: 5000,
                theme: "colored",
            })
            .use(VueTheMask)
            .mixin(permissionsMixin)
            .mixin(sweetAlertMixin)
            .mixin(dayJsMixin)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
