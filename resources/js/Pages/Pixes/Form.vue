<script>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

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

        keyTypes: {
            type: Object,
        },

        pix: {
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
                    autocomplete="name"
                    :disabled="disabled"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel
                    for="type_id"
                    value="Tipo da Chave"
                    :required="true"
                />
                <v-select
                    v-if="!disabled"
                    id="type_id"
                    required
                    v-model="form.type_id"
                    :disabled="disabled"
                    :options="keyTypes"
                    :reduce="(keyType) => keyType.id"
                ></v-select>
                <TextInput
                    v-else
                    id="type"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="pix.type.label"
                    required
                    autocomplete="key"
                    :disabled="disabled"
                />
                <InputError class="mt-2" :message="form.errors.type_id" />
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-group">
                <InputLabel for="key" value="Chave" :required="true" />
                <TextInput
                    id="key"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.key"
                    required
                    v-mask="'99/99/9999'"
                    :disabled="disabled"
                />

                <InputError class="mt-2" :message="form.errors.key" />
            </div>
        </div>
    </div>
</template>
