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
        <div class="col-lg-10">
            <div class="form-group">
                <InputLabel for="client" value="Cliente" :required="true" />

                <TextInput
                    id="client"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.client"
                    required
                    :autofocus="create"
                    autocomplete="client"
                    :disabled="disabled"
                />

                <InputError class="mt-2" :message="form.errors.client" />
            </div>
        </div>
    </div>
</template>
