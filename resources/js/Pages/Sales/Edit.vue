<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Form from "./Form.vue";
import ListProducts from "./Products.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

export default {
    components: {
        DashboardLayout,
        Link,
        Form,
        ListProducts,
        PrimaryButton,
        DangerButton,
    },

    props: {
        sale: {
            type: Object,
        },

        products: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Vendas",
            description: "Editar Venda",
            form: useForm({
                client: this.sale.client ? this.sale.client : "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.put(route("sales.update", this.sale));
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('sales.index')">Vendas</Link>
            </li>
            <li class="breadcrumb-item active">Editar Venda</li>
            <li class="breadcrumb-item active">
                {{ String(sale.id).padStart(9, "0") }}
            </li>
        </template>
        <template #content>
            <div class="col-lg-12">
                <form @submit.prevent="submit">
                    <Form
                        :form="form"
                        :create="false"
                        :disabled="false"
                        :sale="sale"
                    ></Form>
                </form>
            </div>
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <ListProducts
                            :products="products"
                            :productSales="sale.products"
                            :create="false"
                            :disabled="false"
                            :sale="sale"
                        ></ListProducts>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <DangerButton
                        v-show="sale.status_id != 2"
                        v-on:click="cancelAlert(route('sales.cancel', sale))"
                    >
                        Cancelar
                    </DangerButton>
                    <PrimaryButton
                        v-show="sale.status_id == 0"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Finalizar
                    </PrimaryButton>
                </div>
            </div>
        </template>
    </DashboardLayout>
</template>
