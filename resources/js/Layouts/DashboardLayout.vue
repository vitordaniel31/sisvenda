<script>
import { Link } from "@inertiajs/vue3";
import MasterLayout from "./MasterLayout.vue";
import { toast } from "vue3-toastify";
import { usePage } from "@inertiajs/vue3";

export default {
    components: {
        MasterLayout,
        Link,
    },

    props: {
        title: {
            type: String,
        },
        description: {
            type: String,
        },
    },

    methods: {
        toastr(type, message) {
            if (type && message) {
                toast[type](message);
            }
        },

        menu() {
            $("body").toggleClass("sidebar-toggled");
            $(".sidebar").toggleClass("toggled");

            if ($(".sidebar").hasClass("toggled")) {
                $(".sidebar .collapse").collapse("hide");
            }
        },
    },

    computed: {
        alert() {
            return usePage().props.flash.alert;
        },
    },

    mounted() {
        $(".dataTable").DataTable();

        this.$watch(
            "alert",
            (alert) => {
                if (alert) {
                    this.toastr(alert["type"], alert["message"]);
                }
            },
            {
                deep: true,
                immediate: true,
            }
        );
    },
};
</script>

<template>
    <MasterLayout :title="title">
        <template #layout>
            <div id="wrapper">
                <ul
                    class="navbar-nav bg-gradient-capelli sidebar sidebar-dark accordion toggled"
                    id="accordionSidebar"
                >
                    <a
                        class="sidebar-brand d-flex align-items-center justify-content-center"
                        :href="route('dashboard')"
                    >
                        <div class="sidebar-brand-icon">
                            <img
                                class="img-fluid"
                                src="../Static/images/sisvenda_logo.png"
                            />
                        </div>
                    </a>
                    <hr class="sidebar-divider my-0" />
                    <div>
                        <li class="nav-item active">
                            <Link
                                class="nav-link collapsed"
                                :href="route('dashboard')"
                            >
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </Link>
                        </li>
                        <hr class="sidebar-divider my-0" />
                    </div>
                    <div v-if="can('paymentMethods.read')">
                        <li class="nav-item active">
                            <Link
                                class="nav-link collapsed"
                                :href="route('paymentMethods.index')"
                            >
                                <i class="fas fa-money-check-alt"></i>
                                <span>Formas de Pagamento</span>
                            </Link>
                        </li>
                        <hr class="sidebar-divider my-0" />
                    </div>
                    <div v-if="can('pixes.read')">
                        <li class="nav-item active">
                            <Link
                                class="nav-link collapsed"
                                :href="route('pixes.index')"
                            >
                                <i class="fas fa-qrcode"></i>
                                <span>Pix</span>
                            </Link>
                        </li>
                        <hr class="sidebar-divider my-0" />
                    </div>
                    <div v-if="can('products.read')">
                        <li class="nav-item active">
                            <Link
                                class="nav-link collapsed"
                                :href="route('products.index')"
                            >
                                <i class="fab fa-product-hunt"></i>
                                <span>Produtos</span>
                            </Link>
                        </li>
                        <hr class="sidebar-divider my-0" />
                    </div>
                    <div v-if="can('reports.read')">
                        <li class="nav-item active">
                            <Link
                                class="nav-link collapsed"
                                :href="route('reports.index')"
                            >
                                <i class="fas fa-chart-line"></i>
                                <span>Relatórios</span>
                            </Link>
                        </li>
                        <hr class="sidebar-divider my-0" />
                    </div>
                    <div v-if="can('sales.read')">
                        <li class="nav-item active">
                            <Link
                                class="nav-link collapsed"
                                :href="route('sales.index')"
                            >
                                <i class="fas fa-shopping-cart"></i>
                                <span>Vendas</span>
                            </Link>
                        </li>
                        <hr class="sidebar-divider my-0" />
                    </div>
                    <div v-if="can('users.read')">
                        <li class="nav-item active">
                            <Link
                                class="nav-link collapsed"
                                :href="route('users.index')"
                            >
                                <i class="fas fa-users"></i>
                                <span>Usuários</span>
                            </Link>
                        </li>
                        <hr class="sidebar-divider my-0" />
                    </div>
                </ul>
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <nav
                            class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow"
                        >
                            <button
                                id="sidebarToggleTop"
                                :onclick="menu"
                                class="btn text-capelli btn-link d-md-none rounded-circle mr-3"
                            >
                                <i class="fa fa-bars"></i>
                            </button>
                            <ul class="navbar-nav ml-auto">
                                <div
                                    class="topbar-divider d-none d-sm-block"
                                ></div>
                                <li class="nav-item dropdown no-arrow">
                                    <a
                                        class="nav-link dropdown-toggle"
                                        href="#"
                                        id="userDropdown"
                                        role="button"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        <span
                                            class="mr-2 d-none d-lg-inline text-gray-600 small"
                                            >{{
                                                $page.props.auth.user.name
                                            }}</span
                                        >
                                        <i class="fas fa-user"></i>
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown"
                                    >
                                        <Link
                                            :href="
                                                route(
                                                    'users.show',
                                                    $page.props.auth.user.id
                                                )
                                            "
                                            as="button"
                                            type="button"
                                            class="btn btn-sm text-dark"
                                        >
                                            <i
                                                class="fas fa-user fa-md fa-fw mr-2 text-gray-400"
                                            ></i>
                                            Perfil
                                        </Link>
                                        <div class="dropdown-divider"></div>
                                        <Link
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                            type="button"
                                            class="btn btn-sm text-dark"
                                        >
                                            <i
                                                class="fas fa-sign-out-alt fa-md fa-fw mr-2 text-gray-400"
                                            ></i>
                                            Sair
                                        </Link>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <div class="container-fluid bg-gray-light p-4">
                            <div class="row mb-0 mx-4">
                                <div class="col-lg-6 mt-4">
                                    <h1
                                        class="h3 mb-2 text-dark"
                                        id="page-title"
                                    >
                                        {{ title }}
                                    </h1>
                                    <h1 class="h6 text-gray-800">
                                        {{ description }}
                                    </h1>
                                </div>
                                <div
                                    v-if="!route().current('dashboard')"
                                    class="col-lg-6 mt-2 w-lg-50 justify-content-end"
                                >
                                    <ol
                                        class="breadcrumb bg-transparent mt-2 justify-content-end"
                                        id="breadcrumb-index"
                                    >
                                        <li class="breadcrumb-item">
                                            <a :href="route('dashboard')"
                                                >Dashboard</a
                                            >
                                        </li>

                                        <slot name="breadcrumbs"></slot>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="content p-4 bg-white">
                            <slot name="content"></slot>
                        </div>
                    </div>
                    <footer class="sticky-footer bg-gray-light">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span
                                    >Sisvenda - Copyright &copy;
                                    {{ new Date().getFullYear() }}
                                </span>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </template>
    </MasterLayout>
</template>
