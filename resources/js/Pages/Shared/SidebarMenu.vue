<template>
<transition name="slide-in">
<div v-if="show" class="flex-grow max-w-xs bg-slate-800 min-h-screen">
    <div @click="show = !show" class="text-lg text-white border-solid border-2 border-sky-500 w-10 h-10 text-center float-right m-4">>></div>
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
</div>
</transition>
</template>

<script>


export default {
    data(){
        return {
            sideNavStyles: 'text-white text-xl py-3 px-2 overflow-hidden',
            navIcons: 'items-center ml-4 w-10 h-10 border-solid border-2 border-sky-500',
            linkContainer: 'flex items-center hover:bg-slate-600 ',

            show: true,
        }

    }
}
</script>

<style scoped>
.slide-in-enter-active {
  transition: all 0.5s ease-in;
}

.slide-in-enter-from{
  transform: translateX(50px);
}
</style>
