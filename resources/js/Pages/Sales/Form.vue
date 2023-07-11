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

        sale: {
            type: Object,
        },
    },

    methods: {
        handleClientChange() {
            if (this.sale) {
                this.$inertia.put(
                    route("sales.update", this.sale),
                    {
                        client: this.form.client,
                    },
                    {
                        preserveScroll: true,
                    }
                );
            } else {
                this.$inertia.post(
                    route("sales.store"),
                    {
                        client: this.form.client,
                    },
                    {
                        preserveScroll: true,
                    }
                );
            }
        },
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-group">
                <InputLabel for="client" value="Cliente" />

                <TextInput
                    id="client"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.client"
                    required
                    :autofocus="create"
                    :disabled="disabled"
                    @change="handleClientChange"
                />

                <InputError class="mt-2" :message="form.errors.client" />
            </div>
        </div>
    </div>
</template>
