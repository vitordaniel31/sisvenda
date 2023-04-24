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
    },

    data() {
        return {
            title: "Usuários",
            description: "Editar Usuário",
            form: useForm({
                name: this.user.name,
                email: this.user.email,
                password: "",
                password_confirmation: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.put(route("users.update", this.user), {
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
            <li class="breadcrumb-item active">Editar Usuário</li>
            <li class="breadcrumb-item active">{{ user.id }}</li>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="col-lg-12">
                    <Form :form="form" :create="false" :disabled="false"></Form>
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
