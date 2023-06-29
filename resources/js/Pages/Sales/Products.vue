<script>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        TextInput,
    },

    props: {
        create: {
            type: Boolean,
        },

        disabled: {
            type: Boolean,
        },

        products: {
            type: Object,
        },

        productSales: {
            type: Object,
        },
    },

    mounted() {
        $("#dataTable").DataTable({
            ordering: false,
        });
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-group">
                        <InputLabel
                            for="client"
                            value="Cliente"
                            :required="true"
                        />

                        <v-select
                            id="product_id"
                            required
                            :disabled="disabled"
                            :options="products"
                            label="name"
                            :reduce="(product) => product.id"
                        ></v-select>

                        <InputError class="mt-2" />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <InputLabel
                            for="client"
                            value="Cliente"
                            :required="true"
                        />

                        <TextInput
                            id="client"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            :autofocus="create"
                            autocomplete="client"
                            :disabled="disabled"
                        />

                        <InputError class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
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
                                    <td>{{ productSale.price }}</td>
                                    <td>{{ productSale.total }}</td>
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
