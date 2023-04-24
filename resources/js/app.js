import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import permissionsMixin from "./Mixins/permissions-mixin";
import { toast } from "vue3-toastify";
import Vue3Toastify from "vue3-toastify";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

//css
import "vue3-toastify/dist/index.css";
import sweetAlertMixin from "./Mixins/sweet-alert-mixin";

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
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueSweetalert2)
            .use(Vue3Toastify, {
                autoClose: 5000,
                theme: "colored",
            })
            .mixin(permissionsMixin)
            .mixin(sweetAlertMixin)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
