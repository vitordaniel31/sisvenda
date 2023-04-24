<script>
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import MasterLayout from "@/Layouts/MasterLayout.vue";
import AuthenticationLayout from "@/Layouts/AuthenticationLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

export default {
    components: {
        AuthenticationLayout,
        InputLabel,
        TextInput,
        PrimaryButton,
        InputError,
        Link,
    },

    data() {
        return {
            form: useForm({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    props: {
        canResetPassword: {
            type: Boolean,
        },
        status: {
            type: String,
        },
    },

    methods: {
        submit() {
            this.form.post(route("login"), {
                onFinish: () => this.form.reset("password"),
            });
        },
    },
};
</script>

<template>
    <AuthenticationLayout>
        <template #content>
            <div class="row justify-content-center">
                <h4><b>Central de Autenticação - Sisvenda</b></h4>
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Senha" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Esqueceu sua senha?
                    </Link>

                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </template>
    </AuthenticationLayout>
</template>
