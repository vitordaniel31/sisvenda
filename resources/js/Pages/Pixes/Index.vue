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
            title: "Pix",
            description: "Uma lista de todos os pix",
        };
    },

    props: {
        pixes: {
            type: Object,
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item active">Pix</li>
        </template>
        <template #content>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between mb-0">
                        <h6 class="font-weight-bold">
                            {{ title }}
                        </h6>
                        <Link
                            v-show="can('pixes.create')"
                            :href="route('pixes.create')"
                            class="btn btn-capelli btn-sm mb-2"
                        >
                            <i class="fa fa-fw fa-plus"></i>Cadastrar Pix
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
                                    <th>Chave</th>
                                    <th>Tipo</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(pix, index) in pixes">
                                    <td>
                                        <Link
                                            :href="
                                                route('pixes.show', pix)
                                            "
                                            >{{ pix.name }}
                                        </Link>
                                    </td>
                                    <td>
                                        {{ pix.key }}
                                    </td>
                                    <td>
                                        {{ pix.type }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <Link
                                                v-show="pix.can_update"
                                                class="btn btn-sm btn-outline-secondary"
                                                :href="
                                                    route(
                                                        'pixes.edit',
                                                        pix
                                                    )
                                                "
                                            >
                                                <i
                                                    class="fa fa-fw fa-pencil-alt"
                                                ></i>
                                            </Link>
                                            <button
                                                v-show="pix.can_delete"
                                                class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                                                v-on:click="
                                                    deleteAlert(
                                                        route(
                                                            'pixes.destroy',
                                                            pix
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
