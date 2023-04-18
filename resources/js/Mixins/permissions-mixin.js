import { usePage } from "@inertiajs/vue3";

export default {
    computed: {
        auth() {
            return usePage().props.auth;
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

            return this.auth.user.permissions.some((v) => permissions.indexOf(v) >= 0);
        },

        hasRole(roles) {
            if (!Array.isArray(roles)) {
                roles = [roles];
            }

            if (roles.length === 0) {
                return true;
            }

            return this.auth.user.roles.some((v) => roles.indexOf(v) >= 0);
        },
    },
};
