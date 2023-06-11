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
                <InputLabel for="key" value="Chave" :required="true" />
                <TextInput
                    id="key"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.key"
                    required
                    autofocus
                    autocomplete="key"
                    :disabled="disabled"
                />

                <InputError class="mt-2" :message="form.errors.key" />
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel for="type" value="Tipo" :required="true" />
                <TextInput
                    id="type"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.type"
                    required
                    autofocus
                    autocomplete="type"
                    :disabled="disabled"
                />

                <InputError class="mt-2" :message="form.errors.type" />
            </div>
        </div>
    </div>
</template>
