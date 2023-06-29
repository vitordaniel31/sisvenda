<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Form from "./Form.vue";
import ListProducts from "./Products.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
    components: {
        DashboardLayout,
        Link,
        Form,
        ListProducts,
        PrimaryButton,
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
                client: this.sale.client,
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
            <form @submit.prevent="submit">
                <div class="col-lg-12">
                    <Form :form="form" :create="false" :disabled="false"></Form>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Confirmar
                        </PrimaryButton>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <ListProducts
                                :products="products"
                                :productSales="sale.products"
                                :create="false"
                                :disabled="false"
                            ></ListProducts>
                        </div>
                    </div>
                </div>
            </form>
        </template>
    </DashboardLayout>
</template>
