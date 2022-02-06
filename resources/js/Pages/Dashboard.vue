<template>
    <h1>TEST</h1>
</template>

<script>
    import { defineComponent } from 'vue'
    // import AppLayout from '@/Layouts/AppLayout.vue'
    import DashboardLayout from './Shared/DashboardLayout.vue'


    export default defineComponent({
        components: {
             DashboardLayout,

        },
        layout: DashboardLayout,

    })
</script>
