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
                product_id:
                    this.products.length > 0 ? this.products[0].id : null,
                quantity: "1",
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
            if (this.sale) {
                this.form.post(route("sales.products.save", this.sale));
            } else {
                this.form.post(route("sales.products.save"));
            }
        },

        add(productSale) {
            this.form.put(
                route("sales.products.add", [this.sale, productSale])
            );
        },

        remove(productSale) {
            this.form.put(
                route("sales.products.remove", [this.sale, productSale])
            );
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
                <div class="col-lg-10 mt-2">
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
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                {{ productSale.quantity }}
                                            </div>
                                            <div class="col-lg-4">
                                                <div
                                                    class="row justify-content-end"
                                                >
                                                    <button
                                                        v-show="sale.canUpdate"
                                                        class="btn btn-sm ms-1 ml-1 btn-outline-success"
                                                        v-on:click="
                                                            add(productSale)
                                                        "
                                                    >
                                                        <i
                                                            class="fa fa-plus"
                                                        ></i>
                                                    </button>
                                                    <button
                                                        v-show="sale.canUpdate"
                                                        class="btn btn-sm ms-1 ml-1 btn-outline-secondary"
                                                        v-on:click="
                                                            remove(productSale)
                                                        "
                                                    >
                                                        <i
                                                            class="fa fa-minus"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        R$
                                        {{
                                            parseFloat(
                                                productSale.price
                                            ).toLocaleString(
                                                "pt-BR",
                                                numberOptions
                                            )
                                        }}
                                    </td>
                                    <td>
                                        R$
                                        {{
                                            productSale.total.toLocaleString(
                                                "pt-BR",
                                                numberOptions
                                            )
                                        }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button
                                                v-show="sale.canDelete"
                                                class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                                                v-on:click="
                                                    deleteAlert(
                                                        route(
                                                            'sales.products.destroy',
                                                            [sale, productSale]
                                                        )
                                                    )
                                                "
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 mt-2 mb-2">
                    <div class="card border-left-capelli shadow h-100">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active"
                                        ><i
                                            class="fas fa-dollar-sign text-gray-300 mr-2"
                                        ></i
                                        >Venda</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div
                                        class="h4 text-center font-weight-bold text-secondary text-uppercase mb-1"
                                    >
                                        Valor Total
                                    </div>
                                    <div
                                        class="h5 text-center font-weight-bold text-capelli text-uppercase mb-1"
                                    >
                                        R$
                                        {{
                                            sale.total.toLocaleString(
                                                "pt-BR",
                                                numberOptions
                                            )
                                        }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i
                                        class="fas fa-dollar-sign fa-2x text-gray-300"
                                    ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
