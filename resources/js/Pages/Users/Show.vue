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
        user: {
            type: Object,
        },

        roles: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Usuários",
            description: "Detalhar Usuário",
            form: useForm({
                name: this.user.name,
                email: this.user.email,
                role_id: this.user.role_id,
            }),
        };
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item">
                <Link :href="route('users.index')">Usuários</Link>
            </li>
            <li class="breadcrumb-item active">Detalhar Usuário</li>
            <li class="breadcrumb-item active">{{ user.id }}</li>
        </template>
        <template #content>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title h5 mb-4 text-dark d-inline">
                        Dados Gerais
                    </h5>
                    <div class="btn-group float-right">
                        <Link
                            v-show="user.canUpdate"
                            class="btn btn-sm ms-1 btn-outline-secondary"
                            :href="route('users.edit', user)"
                        >
                            <i class="fa fa-pencil-alt"></i>
                        </Link>
                        <button
                            v-show="user.canDelete"
                            class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                            v-on:click="
                                deleteAlert(route('users.destroy', this.user))
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
                        :roles="roles"
                    ></Form>
                </div>
            </div>
        </template>
    </DashboardLayout>
</template>
