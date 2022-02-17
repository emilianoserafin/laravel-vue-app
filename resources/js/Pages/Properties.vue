<template>
    <section class="p-3">
        <button class="block bg-blue-600 m-4 py-2 px-4 rounded-md hover:bg-blue-500 text-lg text-white" @click.stop="toggleModal()">Add Property</button>
        <div class="flex flex-col sm:flex-row flex-wrap">
            <PropertyCard v-for="property in properties"
                :key="property.id"
                :id="property.id"
                :streetAddress="property.street_address"
                :city="property.city"
                :province="property.province"
                :postalCode="property.postal_code"
                :userId="property.user_id"
                />

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
        AddPropertyModal,
    },
    data(){
        return {
            activeModal: 0,

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
