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
                    this.deleteForm.delete(route);
                }
            });
        },
    },

    data() {
        return {
            deleteForm: useForm({}),
        };
    },
};
