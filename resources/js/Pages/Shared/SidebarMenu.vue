<template>
    <div class="text-lg text-white border-solid border-2 border-sky-500 w-10 h-10 text-center float-right m-4">>></div>
    <nav class="mt-20 min-w-full flex flex-col divide-y divide-solid divide-slate-600">
        <div :class="linkContainer">
            <div :class="navIcons"> </div>
            <Link :class="sideNavStyles" href="/dashboard">Dashboard</Link>
        </div>
        <div :class="linkContainer">
            <div :class="navIcons"> </div>
            <Link :class="sideNavStyles" href="/dashboard/properties">Manage Properties</Link>
        </div>
        <div :class="linkContainer">
            <div :class="navIcons"> </div>
            <Link :class="sideNavStyles" href="/dashboard/services">Manage Services</Link>
        </div>
        <div :class="linkContainer">
            <div :class="navIcons"> </div>
            <Link :class="sideNavStyles" :href="route('profile.show')">Profile</Link>
        </div>
    </nav>
</template>

<script>


export default {
    data(){
        return {
            sideNavStyles: 'text-white text-xl py-3 px-2 overflow-hidden',
            navIcons: 'items-center ml-4 w-10 h-10 border-solid border-2 border-sky-500',
            linkContainer: 'flex items-center hover:bg-slate-600 '
        }

    }
}
</script>
