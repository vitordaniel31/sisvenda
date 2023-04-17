import { usePage } from "@inertiajs/vue3";

export default {
    computed: {
        user() {
            return usePage().props.auth.user;
        },
    },

    methods: {
        can(permissions) {
            if (!Array.isArray(permissions)) {
                permissions = [permissions];
            }

            if (permissions.length === 0) {
                return true;
            }

            return permissions.some((v) => permissions.indexOf(v) >= 0);
        },

        hasRole(roles) {
            if (!Array.isArray(roles)) {
                roles = [roles];
            }

            if (roles.length === 0) {
                return true;
            }

            return roles.some((v) => roles.indexOf(v) >= 0);
        },
    },
};
