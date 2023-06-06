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
        roles: {
            type: Object,
        },
    },

    data() {
        return {
            title: "Usuários",
            description: "Cadastrar Usuário",
            form: useForm({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                role_id: null,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(route("users.store"), {
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
                <Link :href="route('users.index')">Usuários</Link>
            </li>
            <li class="breadcrumb-item active">Cadastrar Usuário</li>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="col-lg-12">
                    <Form
                        :form="form"
                        :create="true"
                        :disabled="false"
                        :roles="roles"
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
