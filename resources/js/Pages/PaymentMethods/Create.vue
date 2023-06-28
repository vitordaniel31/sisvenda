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
        keyNames: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Forma de Pagamento",
            description: "Cadastrar Forma de Pagamento",
            form: useForm({
                name_id: "",
                pix_id: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(route("paymentMethods.store"));
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('paymentMethods.index')">Forma de Pagamento</Link>
            </li>
            <li class="breadcrumb-item active">Cadastrar Forma de Pagamento</li>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="col-lg-12">
                    <Form
                        :form="form"
                        :create="true"
                        :disabled="false"
                        :keyNames="keyNames"
                    ></Form>
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
            </form>
        </template>
    </DashboardLayout>
</template>
