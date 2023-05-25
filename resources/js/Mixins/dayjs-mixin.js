import dayjs from "dayjs";
import "dayjs/locale/pt-br";

export default {
    created() {
        this.$dayjs = dayjs;
    },
};
