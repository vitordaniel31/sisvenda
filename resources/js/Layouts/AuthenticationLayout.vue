<script setup>
    import MasterLayout from './MasterLayout.vue';
    console.log(route().current());
</script>

<template>
    <MasterLayout>
        <template #layout>
            <div style="height: 100vh;" class="d-flex align-items-center">
                <div class="row justify-content-center" style="width: 200vh;">
                    <div class="col-lg-5 col-md-10">
                        <div class="card o-hidden border-0 shadow-lg mx-2">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <div class="p-5">
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
