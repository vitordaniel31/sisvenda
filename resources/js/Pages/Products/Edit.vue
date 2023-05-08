<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Form from "./Form.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
    components: {
        DashboardLayout,
        Link,
        Form,
        PrimaryButton,
    },

    props: {
        product: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Produtos",
            description: "Editar Produto",
            form: useForm({
                name: this.product.name,
                price: this.product.price,
                password: "",
                password_confirmation: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.put(route("products.update", this.product), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('products.index')">Produtos</Link>
            </li>
            <li class="breadcrumb-item active">Editar Produto</li>
            <li class="breadcrumb-item active">{{ product.id }}</li>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="col-lg-12">
                    <Form :form="form" :create="false" :disabled="false"></Form>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Confirmar
                        </PrimaryButton>
                    </div>
                </div>
            </form>
        </template>
    </DashboardLayout>
</template>
