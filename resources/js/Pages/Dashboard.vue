<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";


export default {
    components: {
        DashboardLayout,
    },
    props: {
        products: {
            type: Object,
        },
        paymentMethod: {
            type: Object,
        },
        administrators: {
            type: Object,
        },
        maneger: {
            type: Object,
        },
        reportSales: {
            type: Object,
        },
    },
    data() {
        return {
            numberOptions: {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
                decimalSeparator: ",",
                thousandsSeparator: ".",
            },
        };
    },

};
</script>

<template>
    <DashboardLayout title="Dashboard" description="Widgets e Estatísticas">
        <template #content>
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-2 mb-2">
                    <div class="card border-left-capelli shadow h-100">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active"><i
                                            class="fas fa-dollar-sign text-gray-300 mr-2"></i>Venda</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h4 text-center font-weight-bold text-secondary text-uppercase mb-1">
                                        Venda total do dia
                                    </div>
                                    <div class="h5 text-center font-weight-bold text-capelli text-uppercase mb-1">
                                        R$
                                        {{
                                            reportSales.toLocaleString(
                                                "pt-BR",
                                                numberOptions
                                            )
                                        }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 mt-2 mb-2">
                    <div class="card border-left-capelli shadow h-100">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active"><i
                                            class="fas fa-shopping-bag text-gray-300 mr-2"></i>produto</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h4 text-center font-weight-bold text-secondary text-uppercase mb-1">
                                        Produtos
                                    </div>
                                    <div class="h5 text-center font-weight-bold text-capelli text-uppercase mb-1">
                                        {{ products }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
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
                                    <a class="nav-link active"><i
                                            class="fas fa-money-check-alt text-gray-300 mr-2"></i>Forma de Pagamento</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h4 text-center font-weight-bold text-secondary text-uppercase mb-1">
                                        Formas de Pagamento
                                    </div>
                                    <div class="h5 text-center font-weight-bold text-capelli text-uppercase mb-1">
                                        {{
                                            paymentMethod
                                        }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
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
                                    <a class="nav-link active"><i
                                            class="fas fa-user-tie text-gray-300 mr-2"></i>Administrador</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h4 text-center font-weight-bold text-secondary text-uppercase mb-1">
                                        Administrador
                                    </div>
                                    <div class="h5 text-center font-weight-bold text-capelli text-uppercase mb-1">
                                        {{
                                            administrators
                                        }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-tie fa-2x text-gray-300"></i>
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
                                    <a class="nav-link active"><i class="fas fa-user-alt text-gray-300 mr-2"></i>Gerente</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h4 text-center font-weight-bold text-secondary text-uppercase mb-1">
                                        Gerente
                                    </div>
                                    <div class="h5 text-center font-weight-bold text-capelli text-uppercase mb-1">
                                        {{
                                            maneger
                                        }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </template>
    </DashboardLayout>
</template>
