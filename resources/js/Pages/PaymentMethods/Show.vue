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
        paymentMethod: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Forma de Pagamento",
            description: "Detalhar Forma de Pagamento",
            form: useForm({
                name_id: this.paymentMethod.name_id,
                pix_id: this.paymentMethod.pix_id,
            }),
        };
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('paymentMethods.index')">Forma de Pagamento</Link>
            </li>
            <li class="breadcrumb-item active">Detalhar Forma de Pagamento</li>
            <li class="breadcrumb-item active">{{ paymentMethod.id }}</li>
        </template>
        <template #content>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title h5 mb-4 text-dark d-inline">
                        Dados Gerais
                    </h5>
                    <div class="btn-group float-right">
                        <Link
                            v-show="paymentMethod.can_update"
                            class="btn btn-sm ms-1 btn-outline-secondary"
                            :href="route('paymentMethods.edit', paymentMethod)"
                        >
                            <i class="fa fa-pencil-alt"></i>
                        </Link>
                        <button
                            v-show="paymentMethod.can_delete"
                            class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                            v-on:click="
                                deleteAlert(route('paymentMethods.destroy', this.paymentMethod))
                            "
                        >
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <Form
                        :form="form"
                        :create="false"
                        :disabled="true"
                        :paymentMethod="paymentMethod"
                    ></Form>
                </div>
            </div>
        </template>
    </DashboardLayout>
</template>
