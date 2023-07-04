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

        keyNames: {
            type: Object,
        },

        pixKeys: {
            type: Object,
        }
    },

    data() {
        return {
            title: "Forma de Pagamento",
            description: "Editar Forma de Pagamento",
            form: useForm({
                name_id: this.paymentMethod.name_id,
                pix_id: this.paymentMethod.pix_id,
                notes: this.paymentMethod.notes,
            }),
        };
    },

    methods: {
        submit() {
            this.form.put(route("paymentMethods.update", this.paymentMethod), {
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
                <Link :href="route('paymentMethods.index')">Forma de Pagamento</Link>
            </li>
            <li class="breadcrumb-item active">Editar Forma de Pagamento</li>
            <li class="breadcrumb-item active">{{ paymentMethod.id }}</li>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="col-lg-12">
                    <Form
                        :form="form"
                        :create="false"
                        :disabled="false"
                        :keyNames="keyNames"
                        :pixKeys="pixKeys"
                        :paymentMethod="paymentMethod"
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
