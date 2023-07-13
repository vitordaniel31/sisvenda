<script>
import MasterLayout from "./MasterLayout.vue";

export default {
    components: {
        MasterLayout,
    },
};
</script>

<template>
    <MasterLayout title="Autenticação">
        <template #layout>
            <div style="height: 100vh" class="d-flex align-items-center">
                <div class="row justify-content-center" style="width: 250vh">
                    <div class="col-lg-5 col-md-10">
                        <div class="card o-hidden border-0 shadow-lg mx-2">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <div class="p-5">
                                            <div
                                                class="row justify-content-center mb-4"
                                            >
                                                <img
                                                    height="150"
                                                    width="150"
                                                    class="img-fluid"
                                                    src="images/sisvenda_logo_pink.png"
                                                />
                                            </div>
                                            <slot name="content"></slot>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </MasterLayout>
</template>
