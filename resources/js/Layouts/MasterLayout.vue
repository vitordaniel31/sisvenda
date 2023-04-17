<script>
import { Head, usePage } from "@inertiajs/vue3";

//css
import "../Static/template/vendor/fontawesome-free/css/all.min.css";
import "../Static/template/css/sb-admin-2.css";
import "../Static/template/vendor/datatables/dataTables.bootstrap4.min.css";

//scripts
import "../Static/template/vendor/jquery/jquery.min.js";
import "../Static/template/vendor/bootstrap/js/bootstrap.bundle.min.js";
import "../Static/template/vendor/jquery-easing/jquery.easing.min.js";
import "../Static/template/js/sb-admin-2.min.js";
import "../Static/template/vendor/datatables/jquery.dataTables.js";
import "../Static/template/js/demo/datatables-demo.js";
import "../Static/template/vendor/datatables/dataTables.bootstrap4.js";
import "../Static/plugins/toastr/toastr.min.js";

export default {
    components: {
        Head,
    },

    props: {
        title: {
            type: String,
        },
    },
};
</script>

<style>
#app {
    height: 100vh;
}
</style>

<template>
    <Head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        />

        <title>{{ title }}</title>

        <!-- Icons -->
        <!--<link rel="shortcut icon" href="{{ asset('Imagens/favicon.png') }}" /> -->

        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"
        />
        <slot name="css_after"></slot>
    </Head>

    <body id="page-top" class="sidebar-toggled bg-capelli">
        <slot name="layout"></slot>
        <slot name="js_after"></slot>
    </body>
</template>
