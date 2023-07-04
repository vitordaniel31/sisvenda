<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Form from "./Form.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ListProducts from "./Products.vue";

export default {
    components: {
        DashboardLayout,
        Link,
        Form,
        PrimaryButton,
        ListProducts,
    },

    props: {
        products: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Vendas",
            description: "Cadastrar Venda",
            form: useForm({
                client: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(route("sales.store"));
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
            <li class="breadcrumb-item active">Cadastrar Venda</li>
        </template>
        <template #content>
            <div class="col-lg-12">
                <form @submit.prevent="submit">
                    <Form :form="form" :create="true" :disabled="false"></Form>
                </form>
            </div>
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <ListProducts
                            :products="products"
                            :create="true"
                            :disabled="false"
                        ></ListProducts>
                    </div>
                </div>
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
        </template>
    </DashboardLayout>
</template>
