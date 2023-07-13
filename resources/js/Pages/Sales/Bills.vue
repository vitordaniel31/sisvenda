<script>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
    components: {
        Link,
        TextInput,
        InputLabel,
        InputError,
        PrimaryButton,
    },

    props: {
        create: {
            type: Boolean,
        },

        disabled: {
            type: Boolean,
        },

        sale: {
            type: Object,
        },

        paymentMethods: {
            type: Object,
        },

        bill: {
            type: Object,
        },
    },

    data() {
        return {
            form: useForm({
                payment_method_id:
                    this.paymentMethods?.length > 0
                        ? this.paymentMethods[0].id
                        : null,
                value: "",
            }),

            numberOptions: {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
                decimalSeparator: ",",
                thousandsSeparator: ".",
            },
        };
    },

    methods: {
        submit() {
            this.form.post(route("sales.bills.store", this.sale), {
                preserveScroll: true,
            });
        },
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <h4 class="mt-2"><b>Pagamento</b></h4>
        <div class="col-lg-12">
            <form
                v-show="!disabled && ((sale && sale.status_id == 0) || create)"
                @submit.prevent="submit"
            >
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-7">
                        <div class="form-group">
                            <InputLabel
                                for="payment_method_id"
                                value="Forma de Pagamento"
                                :required="true"
                            />

                            <v-select
                                id="payment_method_id"
                                v-model="form.payment_method_id"
                                label="label"
                                required
                                :disabled="disabled"
                                :options="paymentMethods"
                                :reduce="(paymentMethod) => paymentMethod.id"
                            ></v-select>

                            <InputError
                                class="mt-2"
                                :message="form.errors.payment_method_id"
                            />
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="form-group">
                            <InputLabel
                                for="value"
                                value="Valor (R$)"
                                :required="true"
                            />

                            <TextInput
                                id="value"
                                type="number"
                                step="0.01"
                                class="mt-1 block w-full"
                                v-model="form.value"
                                required
                                :disabled="disabled"
                                style="height: 32px"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.value"
                            />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Adicionar
                    </PrimaryButton>
                </div>
            </form>
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-2">
                    <div class="table-responsive">
                        <table
                            class="table table-striped table-vcenter table-bordered hover"
                        >
                            <thead>
                                <tr>
                                    <th width="250">Forma de Pagamento</th>
                                    <th width="120">Valor (R$)</th>
                                    <th
                                        v-show="
                                            !disabled &&
                                            ((sale && sale.status_id == 0) ||
                                                create)
                                        "
                                        width="10"
                                        class="text-center"
                                    >
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-if="bill"
                                    v-for="(
                                        paymentMethod, index
                                    ) in bill.payment_methods"
                                >
                                    <td>
                                        {{ paymentMethod.name["label"] }}
                                        {{
                                            paymentMethod.notes
                                                ? ` (${paymentMethod.notes})`
                                                : ""
                                        }}
                                    </td>
                                    <td>
                                        R$
                                        {{
                                            parseFloat(
                                                paymentMethod.pivot.value
                                            ).toLocaleString(
                                                "pt-BR",
                                                numberOptions
                                            )
                                        }}
                                    </td>
                                    <td
                                        v-show="
                                            !disabled &&
                                            ((sale && sale.status_id == 0) ||
                                                create)
                                        "
                                        class="text-center"
                                    >
                                        <div class="btn-group">
                                            <button
                                                v-show="sale.canDelete"
                                                class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                                                v-on:click="
                                                    deleteAlert(
                                                        route(
                                                            'sales.bills.destroy',
                                                            [
                                                                sale,
                                                                paymentMethod,
                                                            ]
                                                        )
                                                    )
                                                "
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr
                                    v-show="
                                        !bill || bill.payment_methods.length < 1
                                    "
                                    class="odd"
                                >
                                    <td
                                        valign="top"
                                        colspan="5"
                                        class="dataTables_empty text-center"
                                    >
                                        Sem dados disponíveis na tabela
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
