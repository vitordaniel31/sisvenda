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

        roles: {
            type: Object,
        },
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel for="name" value="Nome" :required="true" />

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
                <InputLabel for="email" value="Email" :required="true" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    :disabled="disabled"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>
        </div>
    </div>
    <div v-if="!disabled" class="row justify-content-center">
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel for="password" value="Senha" :required="create" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    :required="create"
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password"
                    :required="true"
                />
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel
                    for="password_confirmation"
                    value="Confirme a senha"
                    :required="create"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    :required="create"
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
            <div class="form-group">
                <InputLabel value="Perfil" :required="true" />
                <div class="row">
                    <div v-for="role in roles" class="col-lg-3">
                        <div class="custom-control custom-switch">
                            <input
                                class="custom-control-input"
                                type="radio"
                                :id="'role' + role.id"
                                name="role_id"
                                v-model="form.role_id"
                                :disabled="disabled"
                                :value="role.id"
                            />
                            <InputLabel
                                class="custom-control-label"
                                :for="'role' + role.id"
                                :value="role.name"
                            />
                        </div>
                    </div>
                </div>

                <InputError class="mt-2" :message="form.errors.role_id" />
            </div>
        </div>
    </div>
</template>
