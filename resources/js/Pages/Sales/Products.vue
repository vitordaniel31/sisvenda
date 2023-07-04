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

        products: {
            type: Object,
        },

        productSales: {
            type: Object,
        },
    },

    data() {
        return {
            form: useForm({
                product_id: 1,
                quantity: "1",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(route("sales.products.store", this.sale));
        },
    },

    mounted() {
        $("#dataTable").DataTable({
            ordering: false,
            paging: false,
            dom: "rtp",
        });
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <form @submit.prevent="submit">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="form-group">
                            <InputLabel
                                for="product_id"
                                value="Produto"
                                :required="true"
                            />

                            <v-select
                                id="product_id"
                                v-model="form.product_id"
                                label="label"
                                required
                                :disabled="disabled"
                                :options="products"
                                :reduce="(product) => product.id"
                            ></v-select>

                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="form-group">
                            <InputLabel
                                for="quantity"
                                value="Quantidade"
                                :required="true"
                            />

                            <TextInput
                                id="quantity"
                                v-model="form.quantity"
                                type="number"
                                min="1"
                                class="mt-1 block w-full"
                                required
                                :disabled="disabled"
                                style="height: 32px"
                            />

                            <InputError class="mt-2" />
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
                <div class="col-lg-10">
                    <div class="table-responsive">
                        <table
                            id="dataTable"
                            class="table table-striped table-vcenter table-bordered hover"
                        >
                            <thead>
                                <tr>
                                    <th width="250">Descrição</th>
                                    <th width="10">Quantidade</th>
                                    <th width="120">Valor Unitário</th>
                                    <th width="120">Valor Total</th>
                                    <th width="10" class="text-center">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(productSale, index) in productSales"
                                >
                                    <td>
                                        <Link
                                            :href="
                                                route(
                                                    'products.show',
                                                    productSale.product_id
                                                )
                                            "
                                            >{{ productSale.product.name }}
                                        </Link>
                                    </td>
                                    <td>{{ productSale.quantity }}</td>
                                    <td>
                                        R$
                                        {{
                                            productSale.price.replace(".", ",")
                                        }}
                                    </td>
                                    <td>R$ {{ productSale.total }}</td>
                                    <td class="text-center">
                                        <div class="btn-group"></div>
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
