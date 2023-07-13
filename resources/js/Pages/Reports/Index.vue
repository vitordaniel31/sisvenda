<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { ref } from "vue";

const picked = ref("One");

export default {
    components: {
        DashboardLayout,
    },

    data() {
        return {
            title: "Relatório",
            picked: null,
            dateInit: null,
            dateFinish: null,
        };
    },

    props: {
        sales: {
            type: Object,
        },

        products: {
            type: Object,
        },

        reportSales: {
            type: Object,
        },

        productBestSeller: {
            type: Object,
        },

        payments: {
            type: Object,
        },

        paymentMethods: {
            type: Object,
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title">
        <template #breadcrumbs>
            <li class="breadcrumb-item active">Relatório</li>
        </template>
        <template #content>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between mb-0">
                        <form
                            :action="route('reports.index')"
                            method="GET"
                            class="d-flex"
                        >
                            <div class="form-group mr-4">
                                <label
                                    id="dateInitLabel"
                                    for="dateInit"
                                    class="mr-1"
                                >
                                    Data Inicial:
                                </label>
                                <input
                                    type="date"
                                    name="dateInit"
                                    id="dateInit"
                                    v-model="dateInit"
                                />
                            </div>
                            <div class="form-group mr-4">
                                <label
                                    id="dateFinishLabel"
                                    for="dateFinish"
                                    class="mr-1"
                                >
                                    Data Final:
                                </label>
                                <input
                                    type="date"
                                    name="dateFinish"
                                    id="dateFinish"
                                    v-model="dateFinish"
                                />
                            </div>
                            <button
                                type="submit"
                                class="btn btn-capelli btn-sm mb-2"
                            >
                                Gerar Relatório
                            </button>
                        </form>
                    </div>
                    <div class="d-flex justify-content-between mb-0">
                        <label for="one">Relatório de Produtos</label>
                        <input
                            type="radio"
                            id="one"
                            value="One"
                            v-model="picked"
                        />

                        <label for="two">Relatório de Lucros</label>
                        <input
                            type="radio"
                            id="two"
                            value="Two"
                            v-model="picked"
                        />

                        <label for="three"
                            >Relatório de Formas de Pagamento</label
                        >
                        <input
                            type="radio"
                            id="three"
                            value="Three"
                            v-model="picked"
                        />
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="dataTable table table-striped table-vcenter table-bordered hover"
                        >
                            <thead>
                                <tr v-if="picked === 'One'">
                                    <th>Produto</th>
                                    <th>Total Vendido</th>
                                    <th>Total</th>
                                </tr>
                                <tr v-else-if="picked === 'Two'">
                                    <th>Total de Vendas</th>
                                    <th>Total de Produtos Vendidos</th>
                                    <th>Total de Rendimentos</th>
                                </tr>
                                <tr v-else>
                                    <th>Forma de Pagamento</th>
                                    <th>Total Utilizado</th>
                                    <th>Total de Rendimentos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-if="picked === 'One'"
                                    v-for="(
                                        productBestSeller, index
                                    ) in productBestSeller"
                                >
                                    <td>
                                        {{ productBestSeller.name }}
                                    </td>
                                    <td>
                                        {{ productBestSeller.totalQuantity }}
                                    </td>
                                    <td>
                                        {{ productBestSeller.totalSalesAmount }}
                                    </td>
                                </tr>
                                <tr
                                    v-else-if="picked === 'Two'"
                                    v-for="(reportSales, index) in reportSales"
                                >
                                    <td>
                                        {{ reportSales.totalSales }}
                                    </td>
                                    <td>
                                        {{ reportSales.totalProducts }}
                                    </td>
                                    <td>
                                        {{ reportSales.totalSalesAmount }}
                                    </td>
                                </tr>
                                <tr
                                    v-else-if="picked === 'Three'"
                                    v-for="(payments, index) in payments"
                                >
                                    <td>
                                        {{ payments.name_id }}
                                    </td>

                                    <td>
                                        {{ payments.totalPaymentMethod }}
                                    </td>

                                    <td>
                                        {{ payments.totalPago }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </template>
    </DashboardLayout>
</template>
