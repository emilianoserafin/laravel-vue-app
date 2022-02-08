<template>
    <section class="p-3">
        <button class="block bg-blue-600 m-4 py-2 px-4 rounded-md hover:bg-blue-500 text-lg text-white">Add Property</button>
        <div class="flex">
            <PropertyCard v-for="property in properties" :key="property" >
                <template #propertyInfo>
                    <div class=""> IMAGE </div>
                    <p>Street: {{ property.street_address }}</p>
                    <p>City: {{ property.city }}</p>
                    <p>Province: {{ property.province }}</p>
                    <p>Postal Code: {{ property.postal_code }}</p>
                    <div class="flex justify-end">
                        <button class="py-1 px-3 bg-blue-600 hover:bg-blue-400 rounded-md text-white mx-2">Edit</button>
                        <button class="py-1 px-3 bg-red-600 hover:bg-red-400 rounded-md text-white mx-2">Delete</button>
                    </div>
                </template>
            </PropertyCard>
        </div>
    </section>
</template>

<script>
import  DashboardLayout  from './Shared/DashboardLayout.vue';
import PropertyCard from './Components/PropertyCard.vue';

export default {
    layout: DashboardLayout,
    components: {
        PropertyCard,
    },
    data(){
        return {

        }
    },
    props: {
        properties: Array,
    }
}
</script>
