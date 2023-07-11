<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Form from "./Form.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ListProducts from "./Products.vue";
import DangerButton from "@/Components/DangerButton.vue";

export default {
    components: {
        DashboardLayout,
        Link,
        Form,
        PrimaryButton,
        ListProducts,
        DangerButton,
    },

    props: {
        sale: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Vendas",
            description: "Detalhar Venda",
            form: useForm({
                client: this.sale.client ? this.sale.client : "",
            }),
        };
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('sales.index')">Vendas</Link>
            </li>
            <li class="breadcrumb-item active">Detalhar Venda</li>
            <li class="breadcrumb-item active">
                {{ String(sale.id).padStart(9, "0") }}
            </li>
        </template>
        <template #content>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title h5 mb-4 text-dark d-inline">
                        Dados Gerais
                    </h5>
                    <div class="btn-group float-right">
                        <Link
                            v-show="sale.canUpdate"
                            class="btn btn-sm ms-1 btn-outline-secondary"
                            :href="route('sales.edit', sale)"
                        >
                            <i class="fa fa-pencil-alt"></i>
                        </Link>
                    </div>
                </div>
                <div class="card-body">
                    <Form :form="form" :create="false" :disabled="true"></Form>
                    <ListProducts
                        :productSales="sale.products"
                        :create="false"
                        :disabled="true"
                        :sale="sale"
                    ></ListProducts>
                    <div class="row justify-content-center">
                        <DangerButton
                            v-show="sale.status_id != 2"
                            v-on:click="
                                cancelAlert(route('sales.cancel', sale))
                            "
                        >
                            Cancelar
                        </DangerButton>
                    </div>
                </div>
            </div>
        </template>
    </DashboardLayout>
</template>
