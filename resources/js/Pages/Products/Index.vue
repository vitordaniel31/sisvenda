<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        DashboardLayout,
        Link,
    },

    data() {
        return {
            title: "Produtos",
            description: "Uma lista de todos os produtos",
        };
    },

    props: {
        products: {
            type: Object,
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item active">Produtos</li>
        </template>
        <template #content>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between mb-0">
                        <h6 class="font-weight-bold">
                            {{ title }}
                        </h6>
                        <Link
                            v-show="can('products.create')"
                            :href="route('products.create')"
                            class="btn btn-capelli btn-sm mb-2"
                        >
                            <i class="fa fa-fw fa-plus"></i>Cadastrar Produto
                        </Link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="table table-striped table-vcenter table-bordered hover"
                            id="dataTable"
                        >
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product, index) in products">
                                    <td>
                                        <Link
                                            :href="
                                                route('products.show', product)
                                            "
                                            >{{ product.name }}
                                        </Link>
                                    </td>
                                    <td>
                                        R$ {{ product.price.replace(".", ",") }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <Link
                                                v-show="product.can_update"
                                                class="btn btn-sm btn-outline-secondary"
                                                :href="
                                                    route(
                                                        'products.edit',
                                                        product
                                                    )
                                                "
                                            >
                                                <i
                                                    class="fa fa-fw fa-pencil-alt"
                                                ></i>
                                            </Link>
                                            <button
                                                v-show="product.can_delete"
                                                class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                                                v-on:click="
                                                    deleteAlert(
                                                        route(
                                                            'products.destroy',
                                                            product
                                                        )
                                                    )
                                                "
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </template>
    </DashboardLayout>
</template>
