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
            title: "Usuários",
            description: "Uma lista de todos os usuários",
        };
    },

    props: {
        users: {
            type: Object,
        },
    },
};
</script>

<template>
    <DashboardLayout :title="title" :description="description">
        <template #breadcrumbs>
            <li class="breadcrumb-item active">Usuários</li>
        </template>
        <template #content>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between mb-0">
                        <h6 class="font-weight-bold">
                            {{ title }}
                        </h6>
                        <Link
                            v-show="can('users.create')"
                            :href="route('users.create')"
                            class="btn btn-capelli btn-sm mb-2"
                        >
                            <i class="fa fa-fw fa-plus"></i>Cadastrar Usuário
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
                                    <th>Email</th>
                                    <th>Perfil</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(user, index) in users">
                                    <td>
                                        <Link :href="route('users.show', user)"
                                            >{{ user.name }}
                                        </Link>
                                    </td>
                                    <td>
                                        {{ user.email }}
                                    </td>
                                    <td>
                                        {{
                                            user.roles
                                                .map((role) => {
                                                    return role.name;
                                                })
                                                .join(", ")
                                        }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <Link
                                                v-show="user.can_update"
                                                class="btn btn-sm btn-outline-secondary"
                                                :href="
                                                    route('users.edit', user)
                                                "
                                            >
                                                <i
                                                    class="fa fa-fw fa-pencil-alt"
                                                ></i>
                                            </Link>
                                            <button
                                                v-show="user.can_delete"
                                                class="btn btn-sm ms-1 ml-1 btn-outline-danger"
                                                v-on:click="
                                                    deleteAlert(
                                                        route(
                                                            'users.destroy',
                                                            user
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
