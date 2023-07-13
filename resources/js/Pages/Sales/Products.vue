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
                    this.products?.length > 0 ? this.products[0].id : null,
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
                this.form.post(route("sales.products.save", this.sale), {
                    preserveScroll: true,
                });
            } else {
                this.form.post(route("sales.products.save"), {
                    preserveScroll: true,
                });
            }
        },

        add(productSale) {
            this.form.put(
                route("sales.products.add", [this.sale, productSale]),
                {
                    preserveScroll: true,
                }
            );
        },

        remove(productSale) {
            this.form.put(
                route("sales.products.remove", [this.sale, productSale]),
                {
                    preserveScroll: true,
                }
            );
        },
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <form
                v-show="!disabled && ((sale && sale.status_id == 0) || create)"
                @submit.prevent="submit"
            >
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

                            <InputError
                                class="mt-2"
                                :message="form.errors.product_id"
                            />
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

                            <InputError
                                class="mt-2"
                                :message="form.errors.quantity"
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
                                    <th width="250">Descrição</th>
                                    <th width="10">Quantidade</th>
                                    <th width="120">Valor Unitário</th>
                                    <th width="120">Valor Total</th>
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
                                        {{ productSale.quantity }}
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
                                                v-show="sale.canUpdate"
                                                class="btn btn-sm ms-1 ml-1 btn-outline-success"
                                                v-on:click="add(productSale)"
                                            >
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <button
                                                v-show="sale.canUpdate"
                                                class="btn btn-sm ms-1 ml-1 btn-outline-secondary"
                                                v-on:click="remove(productSale)"
                                            >
                                                <i class="fa fa-minus"></i>
                                            </button>
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
                                <tr
                                    v-show="
                                        !productSales || productSales.length < 1
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

                <div class="col-lg-3 mt-2 mb-2">
                    <div class="card border-left-danger shadow h-100">
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
                                        class="h5 text-center font-weight-bold text-danger text-uppercase mb-1"
                                    >
                                        R$
                                        {{
                                            sale
                                                ? sale.total.toLocaleString(
                                                      "pt-BR",
                                                      numberOptions
                                                  )
                                                : parseFloat(0).toLocaleString(
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
                <div class="col-lg-3 mt-2 mb-2">
                    <div class="card border-left-success shadow h-100">
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
                                        Valor Pago
                                    </div>
                                    <div
                                        class="h5 text-center font-weight-bold text-success text-uppercase mb-1"
                                    >
                                        R$
                                        {{
                                            sale && sale.bill
                                                ? parseFloat(
                                                      sale.bill.total
                                                  ).toLocaleString(
                                                      "pt-BR",
                                                      numberOptions
                                                  )
                                                : parseFloat(0).toLocaleString(
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
                <div class="col-lg-3 mt-2 mb-2">
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
                                        Valor Restante
                                    </div>
                                    <div
                                        class="h5 text-center font-weight-bold text-capelli text-uppercase mb-1"
                                    >
                                        R$
                                        {{
                                            sale && sale.bill
                                                ? parseFloat(
                                                      sale.total -
                                                          sale.bill.total
                                                  ).toLocaleString(
                                                      "pt-BR",
                                                      numberOptions
                                                  )
                                                : parseFloat(0).toLocaleString(
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
