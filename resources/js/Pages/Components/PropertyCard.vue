<template>


<div   class="flex flex-col justify-between items-center p-3 m-4 border rounded-md bg-slate-200 w-64 h-64 shadow-md">

        <p>Street: {{ streetAddress }}</p>
        <p>City: {{ city }}</p>
        <p>Province: {{ province }}</p>
        <p>Postal Code: {{ postalCode }}</p>
        <div class="flex justify-end">
            <button @click="toggleModal()" class="py-1 px-3 bg-blue-600 hover:bg-blue-400 rounded-md text-white mx-2">Edit</button>
            <button @click.prevent="destroy( id )"  class="py-1 px-3 bg-red-600 hover:bg-red-400 rounded-md text-white mx-2">Delete</button>
        </div>
        <EditPropertyModal
            :show="showModal()"
            @close="toggleModal()"
            :id="id"
            :streetAddress="streetAddress"
            :city="city"
            :province="province"
            :postalCode="postalCode"
            :userId="userId"/>
</div>


</template>

<script>
import EditPropertyModal from './EditPropertyModal.vue'

export default {
    name: 'PropertyCard',

    components: {
        EditPropertyModal
    },

    data(){
        return {
            activeModal: 0,
        }
    },

    props: [
        'id', 'streetAddress', 'city', 'province', 'postalCode', 'userId'
    ],
    methods: {
        destroy(id){
            if(confirm('Are you sure you want to delete this property?')){
                axios.post(`/properties`, {_method: 'delete', id});
                window.location.reload(true);
            }

        },
        showModal() {
                return this.activeModal === 1
            },
        toggleModal() {
                if(this.activeModal !== 0) {
                    this.activeModal = 0
                    return false
                }
                this.activeModal = 1
            },
    }

}
</script>
