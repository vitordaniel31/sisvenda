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
        pix: {
            type: Object,
        },

        keyTypes: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Pix",
            description: "Editar Pix",
            form: useForm({
                name: this.pix.name,
                key: this.pix.key,
                type_id: this.pix.type_id,
            }),
        };
    },

    methods: {
        submit() {
            this.form.put(route("pixes.update", this.pix));
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('pixes.index')">Pix</Link>
            </li>
            <li class="breadcrumb-item active">Editar Pix</li>
            <li class="breadcrumb-item active">{{ pix.id }}</li>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="col-lg-12">
                    <Form
                        :form="form"
                        :create="false"
                        :disabled="false"
                        :keyTypes="keyTypes"
                        :pix="pix"
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
