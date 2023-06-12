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
    },

    data() {
        return {
            formData: {
                type_id: 0,
            },
            types: [
                { id: 0, label: 'CPF/CNPJ' },
                { id: 1, label: 'Celular' },
                { id: 2, label: 'Email' },
                { id: 3, label: 'Chave aleatória' },
            ],
        };
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
                <InputLabel for="type_id" value="Tipo" :required="true" />
                <select
                    id="type_id"
                    class="mt-1 block w-full rounded"
                    v-model="form.type_id"
                    required
                    autofocus
                    autocomplete="type_id"
                    :disabled="disabled"
                >
                    <option v-for="type in types" :value="type.id"> {{ type.label }} </option>
                </select>
                <InputError class="mt-2" :message="form.errors.type_id" />
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
            </div>    
        </div>
    </div>
</template>