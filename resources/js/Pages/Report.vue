<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { ref } from 'vue'

const picked = ref('One')

export default {
    components: {
        DashboardLayout,
    },

    data() {
        return {
            title: "Relatório",
            picked: null,
            dateInit: null,
            dateFinish: null
        };
    },

    props: {
        sales: {
            type: Object,
        },

        products: {
            type: Object,
        },

        proSales: {
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
                        <form action="./" method="GET">
                            <label id="dateInitLabel" for="dateInit">Data Inicial:</label>
                            <input
                                type="date"
                                name="dateInit"
                                id="dateInit"
                                v-model="dateInit"
                            />
                            <label id="dateFinishLabel" for="dateFinish">Data Final:</label>
                            <input
                                type="date"
                                name="dateFinish"
                                id="dateFinish"
                                v-model="dateFinish"
                            />
                            <input type="submit"/>
                        </form>
                    </div>
                    <div class="d-flex justify-content-between mb-0">
                        <label for="one">Relatório de Produtos</label>
                        <input type="radio" id="one" value="One" v-model="picked" />

                        <label for="two">Relatório de Lucros</label>
                        <input type="radio" id="two" value="Two" v-model="picked" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="dataTable table table-striped table-vcenter table-bordered hover"
                        >
                            <thead>
                                <tr v-if="picked === 'One'">
                                    <th>Nome</th>
                                    <th>Preço</th>
                                </tr>
                                <tr v-else>
                                    <th>Total de Vendas</th>
                                    <th>Total de Rendimentos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(proSale, index) in proSales">
                                    <td>
                                        {{proSale.name}}
                                    </td>
                                    <td>
                                        {{ proSale.price }}
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
