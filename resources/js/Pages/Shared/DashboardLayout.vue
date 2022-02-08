<template>

    <app-layout title="Dashboard">
        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $page.component }}
            </h2>
        </template>
        <section class="flex">
            <!-- SIDE MENU -->

                <sidebar-menu />

            <slot />
        </section>

    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import SidebarMenu from './SidebarMenu.vue'

    export default defineComponent({
        components: {
            AppLayout,
            SidebarMenu,
        },
        props: {

        }

    })
</script>
