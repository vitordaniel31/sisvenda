<script>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        TextInput,
        InputLabel,
        InputError,
    },

    props: {
        create: {
            type: Boolean,
        },
        disabled: {
            type: Boolean,
        },
        form: {
            type: Object,
        },
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel for="name" value="Nome" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    :disabled="disabled"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel for="password" value="Senha" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel
                    for="password_confirmation"
                    value="Confirme a senha"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>
        </div>
    </div>
</template>
