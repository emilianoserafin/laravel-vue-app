<template>

    <app-layout title="Dashboard">
        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $page.component }}
            </h2>
        </template>
        <section class="flex">
            <!-- SIDE MENU -->
            <div class="flex-grow max-w-xs bg-slate-800 min-h-screen">
                <sidebar-menu />
            </div>
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

    })
</script>
