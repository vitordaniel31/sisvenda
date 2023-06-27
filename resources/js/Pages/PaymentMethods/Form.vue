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

        keyNames: {
            type: Object,
        },

        method: {
            type: Object,
        },
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="form-group">
                <InputLabel
                    for="name_id"
                    value="Tipo da Forma de Pagamento"
                    :required="true"
                />
                <v-select
                    v-if="!disabled"
                    id="name_id"
                    required
                    v-model="form.name_id"
                    :disabled="disabled"
                    :options="keyNames"
                    :reduce="(keyName) => keyName.id"
                ></v-select>
                <TextInput
                    v-else
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="method.name.label"
                    required
                    autocomplete="name"
                    :disabled="disabled"
                />
                <InputError class="mt-2" :message="form.errors.name_id" />
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-group">
                <InputLabel for="pix_id" value="Chave Pix" :required="false" />
                <TextInput
                    id="pix_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.pix_id"
                    :disabled="disabled"
                />

                <InputError class="mt-2" :message="form.errors.pix_id" />
            </div>
        </div>
    </div>
</template>
