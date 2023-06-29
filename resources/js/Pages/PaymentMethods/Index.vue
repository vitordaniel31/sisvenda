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
            title: "Forma de Pagamento",
            description: "Uma lista de todos as formas de pagamento",
        };
    },

    props: {
        paymentMethods: {
            type: Object,
        },

        pixKeys: {
            type: Object,
        }
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item active">Forma de Pagamento</li>
        </template>
        <template #content>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between mb-0">
                        <h6 class="font-weight-bold">
                            {{ title }}
                        </h6>
                        <Link
                            v-show="can('paymentMethods.create')"
                            :href="route('paymentMethods.create')"
                            class="btn btn-capelli btn-sm mb-2"
                        >
                            <i class="fa fa-fw fa-plus"></i>Cadastrar Forma de Pagamento
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
                                    <th>Nome</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(paymentMethod, index) in paymentMethods">
                                    <td v-if="paymentMethod.pix_id != null">
                                        <Link
                                            :href="
                                                route('paymentMethods.show', paymentMethod)
                                            "
                                            >{{ paymentMethod.name.label }} | {{ pixKeys.key }}
                                        </Link>
                                    </td>
                                    <td v-else>
                                        <Link
                                            :href="
                                                route('paymentMethods.show', paymentMethod)
                                            "
                                            >{{ paymentMethod.name.label }}
                                        </Link>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <Link
                                                v-show="paymentMethod.can_update"
                                                class="btn btn-sm btn-outline-secondary"
                                                :href="
                                                    route(
                                                        'paymentMethods.edit',
                                                        paymentMethod
                                                    )
                                                "
                                            >
                                                <i
                                                    class="fa fa-fw fa-pencil-alt"
                                                ></i>
                                            </Link>
                                            <button
                                                v-show="paymentMethod.can_delete"
                                                class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                                                v-on:click="
                                                    deleteAlert(
                                                        route(
                                                            'paymentMethods.destroy',
                                                            paymentMethod
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
            </div>
        </template>
    </DashboardLayout>
</template>
