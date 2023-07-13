<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

export default {
    components: {
        DashboardLayout,
        TextInput,
        InputLabel,
        InputError,
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

        types: {
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
            <form
                :action="route('reports.index')"
                method="GET"
            >
                <div class="row justify-content-center">
                    <div class="form-group mr-4">
                        <InputLabel for="dateInit" value="Data inicial" />

                        <TextInput
                            id="dateInit"
                            name="dateInit"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="dateInit"
                        />
                    </div>
                    <div class="form-group mr-4">
                        <InputLabel for="dateFinish" value="Data final" />

                        <TextInput
                            id="dateFinish"
                            name="dateFinish"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="dateFinish"
                        />
                    </div>
                    
                </div>
                <div class="row justify-content-center mb-2">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <InputLabel
                                value="Tipo do Relatório"
                                :required="true"
                            />
                            <div class="col-lg-12" v-for="reportType in types">
                                <div class="custom-control custom-switch">
                                    <input
                                        class="custom-control-input"
                                        type="radio"
                                        :id="'type' + reportType.id"
                                        name="type_id"
                                        v-model="picked"
                                        :value="reportType.id"
                                    />
                                    <InputLabel
                                        class="custom-control-label"
                                        :for="'type' + reportType.id"
                                        :value="reportType.label"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-capelli btn-sm mb-2">
                        Gerar Relatório
                    </button>
                </div>
            </form>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between mb-0"></div>
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
                                <tr v-else-if="picked === 'Three'">
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
                                        {{ payments.name.label }}
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
