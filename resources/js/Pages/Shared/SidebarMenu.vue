<template>

<div class="sidebar flex flex-col text-white bg-slate-800 min-h-screen" :style="{ width: sidebarWidth }">
    <div @click="toggleSidebar" class="collapse-icon text-lg text-white border-solid border-2 border-sky-500 w-10 h-10 text-center float-right m-4">>></div>
    <nav class="mt-20 min-w-full flex flex-col ">
        <div :class="linkContainer">
            <div :class="navIcons"> </div>
            <Link v-if="!collapsed" :class="sideNavStyles" href="/dashboard">Dashboard</Link>
        </div>
        <div :class="linkContainer">
            <div :class="navIcons"> </div>
            <Link v-if="!collapsed" :class="sideNavStyles" href="/dashboard/properties">Manage Properties</Link>
        </div>
        <div :class="linkContainer">
            <div :class="navIcons"> </div>
            <Link v-if="!collapsed" :class="sideNavStyles" href="/dashboard/services">Manage Services</Link>
        </div>
        <div :class="linkContainer">
            <div :class="navIcons"> </div>
            <Link v-if="!collapsed" :class="sideNavStyles" :href="route('profile.show')">Profile</Link>
        </div>
    </nav>
</div>

</template>

<script>
import { collapsed, toggleSidebar, sidebarWidth } from './state';

export default {
    setup() {
        return { collapsed, toggleSidebar, sidebarWidth }
    },
    data(){
        return {
            sideNavStyles: 'text-white text-l py-3 px-3',
            navIcons: 'items-center ml-4 w-8 h-8 border-solid border-2 border-sky-500',
            linkContainer: 'flex items-center hover:bg-slate-600 pb-2 pt-2 overflow-hidden',

        }

    }
}
</script>

<style scoped>
.sidebar {
    float: left;
    position: sticky;
    z-index: 1;
    top: 0;
    left: 0;
    left: 0;
    bottom: 0;
    padding: 0.5em;


    transition: 0.3s ease;


}

</style>
