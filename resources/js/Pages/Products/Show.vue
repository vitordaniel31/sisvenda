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
            description: "Detalhar Produto",
            form: useForm({
                name: this.product.name,
                price: this.product.price,
            }),
        };
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('products.index')">Produtos</Link>
            </li>
            <li class="breadcrumb-item active">Detalhar Produto</li>
            <li class="breadcrumb-item active">{{ product.id }}</li>
        </template>
        <template #content>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title h5 mb-4 text-dark d-inline">
                        Dados Gerais
                    </h5>
                    <div class="btn-group float-right">
                        <Link v-show="product.can_update" class="btn btn-sm ms-1 btn-outline-secondary"
                            :href="route('products.edit', product)">
                        <i class="fa fa-pencil-alt"></i>
                        </Link>
                        <button v-show="product.can_delete" class="btn btn-sm ms-1 ml-1 btn-outline-danger" v-on:click="
                            deleteAlert(route('products.destroy', this.product))
                            ">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <Form :form="form" :create="false" :disabled="true"></Form>
                </div>
            </div>
        </template>
    </DashboardLayout>
</template>
