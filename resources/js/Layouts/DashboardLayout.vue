<script setup>
import { Link } from "@inertiajs/vue3";
import MasterLayout from "./MasterLayout.vue";

const props = defineProps({
    title: {
        type: String,
    },
    description: {
        type: String,
    },
});
</script>

<template>
    <MasterLayout>
        <template #layout>
            <div id="wrapper">
                <ul
                    class="navbar-nav bg-gradient-capelli sidebar sidebar-dark accordion toggled"
                    id="accordionSidebar"
                >
                    <a
                        class="sidebar-brand d-flex align-items-center justify-content-center"
                        href=""
                    >
                        <div class="sidebar-brand-icon">
                            <img class="img-fluid" src="" />
                        </div>
                    </a>
                    <hr class="sidebar-divider my-0" />
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
                </ul>
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <nav
                            class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow"
                        >
                            <button
                                id="sidebarToggleTop"
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
                                            href="/logout"
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
                                            href="/logout"
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
