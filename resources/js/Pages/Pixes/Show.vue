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
    },

    data() {
        return {
            title: "Pix",
            description: "Detalhar Pix",
            form: useForm({
                name: this.pix.name,
                key: this.pix.key,
                type_id: this.pix.type_id,
            }),
        };
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('pixes.index')">Pix</Link>
            </li>
            <li class="breadcrumb-item active">Detalhar Pix</li>
            <li class="breadcrumb-item active">{{ pix.id }}</li>
        </template>
        <template #content>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title h5 mb-4 text-dark d-inline">
                        Dados Gerais
                    </h5>
                    <div class="btn-group float-right">
                        <Link
                            v-show="pix.canUpdate"
                            class="btn btn-sm ms-1 btn-outline-secondary"
                            :href="route('pixes.edit', pix)"
                        >
                            <i class="fa fa-pencil-alt"></i>
                        </Link>
                        <button
                            v-show="pix.canDelete"
                            class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                            v-on:click="
                                deleteAlert(route('pixes.destroy', this.pix))
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
                        :pix="pix"
                    ></Form>
                </div>
            </div>
        </template>
    </DashboardLayout>
</template>
