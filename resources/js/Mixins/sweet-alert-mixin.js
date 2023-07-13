import { useForm } from "@inertiajs/vue3";

export default {
    methods: {
        deleteAlert(route) {
            this.$swal({
                title: "Você tem certeza?",
                text: "Você não poderá recuperar este item!",
                icon: "warning",
                showCancelButton: !0,
                customClass: {
                    confirmButton: "btn btn-danger m-1",
                    cancelButton: "btn btn-secondary m-1",
                },
                confirmButtonText: "Sim, exclua!",
                cancelButtonText: "Cancelar",
            }).then((action) => {
                if (action.isConfirmed) {
                    this.sweetForm.delete(route, {
                        preserveScroll: true,
                    });
                }
            });
        },

        cancelAlert(route) {
            this.$swal({
                title: "Você tem certeza?",
                text: "Você está mudando o status deste item!",
                icon: "warning",
                showCancelButton: !0,
                customClass: {
                    confirmButton: "btn btn-danger m-1",
                    cancelButton: "btn btn-secondary m-1",
                },
                confirmButtonText: "Sim, cancele!",
                cancelButtonText: "Desfazer",
            }).then((action) => {
                if (action.isConfirmed) {
                    this.sweetForm.put(route);
                }
            });
        },

        finishSaleAlert(route) {
            this.$swal({
                title: "Você tem certeza?",
                text: "Você está finalizando essa venda!",
                icon: "warning",
                showCancelButton: !0,
                customClass: {
                    confirmButton: "btn btn-success m-1",
                    cancelButton: "btn btn-secondary m-1",
                },
                confirmButtonText: "Sim, finalize!",
                cancelButtonText: "Desfazer",
            }).then((action) => {
                if (action.isConfirmed) {
                    this.sweetForm.put(route);
                }
            });
        },
    },

    data() {
        return {
            sweetForm: useForm({}),
        };
    },
};
