<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        DashboardLayout,
        Link,
    },

    data() {
        return {
            title: "Vendas",
            description: "Uma lista de todos os vendas",
        };
    },

    props: {
        sales: {
            type: Object,
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item active">Vendas</li>
        </template>
        <template #content>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between mb-0">
                        <h6 class="font-weight-bold">
                            {{ title }}
                        </h6>
                        <Link
                            v-show="can('sales.create')"
                            :href="route('sales.create')"
                            class="btn btn-capelli btn-sm mb-2"
                        >
                            <i class="fa fa-fw fa-plus"></i>Cadastrar Venda
                        </Link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="dataTable table table-striped table-vcenter table-bordered hover"
                        >
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(sale, index) in sales">
                                    <td>
                                        <Link :href="route('sales.show', sale)"
                                            >{{
                                                String(sale.id).padStart(9, "0")
                                            }}
                                        </Link>
                                    </td>
                                    <td>{{ sale.client }}</td>
                                    <td>
                                        {{
                                            $dayjs(sale.created_at).format(
                                                "DD/MM/YYYY HH:mm:ss"
                                            )
                                        }}
                                    </td>
                                    <td>{{ sale.status.label }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <Link
                                                v-show="sale.canUpdate"
                                                class="btn btn-sm btn-outline-secondary"
                                                :href="
                                                    route('sales.edit', sale)
                                                "
                                            >
                                                <i
                                                    class="fa fa-fw fa-pencil-alt"
                                                ></i>
                                            </Link>
                                        </div>
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
