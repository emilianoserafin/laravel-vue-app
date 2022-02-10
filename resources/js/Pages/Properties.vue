<template>
    <section class="p-3">
        <button class="block bg-blue-600 m-4 py-2 px-4 rounded-md hover:bg-blue-500 text-lg text-white" @click.stop="toggleModal()">Add Property</button>
        <div class="flex flex-col sm:flex-row flex-wrap">
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
                <add-property-modal
                :show="showModal()"
                @close="toggleModal()" />
</template>

<script>
import DashboardLayout  from './Shared/DashboardLayout.vue';
import PropertyCard from './Components/PropertyCard.vue';
import AddPropertyModal from './Components/AddPropertyModal.vue';

export default {
    layout: DashboardLayout,
    components: {
        PropertyCard,
        AddPropertyModal
    },
    data(){
        return {
            activeModal: 0
        }
    },
    props: {
        properties: Array,
    },
    methods: {
            showModal: function() {
                return this.activeModal === 1
            },
            toggleModal: function () {
                if(this.activeModal !== 0) {
                    this.activeModal = 0
                    return false
                }
                this.activeModal = 1
            },
        }
}
</script>
