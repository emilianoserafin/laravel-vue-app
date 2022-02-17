<template>
    <div>
        <modal :show="show" @close="close">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <h1 class="text-3xl text-slate-600 py-5 mb-4 text-left">Enter Property Details</h1>
        <form @submit.prevent="submit">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-6 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6">
                  <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                  <input v-model="form.street_address" required type="text" name="street_address" id="street_address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                  <input v-model="form.city" type="text" required name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                  <input v-model="form.province" type="text" required name="province" id="province" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal code</label>
                  <input v-model="form.postal_code" type="text" required name="postal_code" id="postalcode" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>
              </div>
            </div>
            <div class="flex px-4 py-3 bg-gray-50 text-right sm:px-6 justify-between">
              <div @click.stop="close" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-3 cursor-pointer">Cancel</div>
              <button @click.stop="close" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
          </div>
        </form>
      </div>
        </modal>
    </div>
</template>

<script>
    import Modal from './Modal.vue'
    import {defineComponent} from 'vue'


    export default defineComponent({
        props: [
            'show',
            'var'
            ],
        components: { Modal },
        methods: {
            close: function() {
                this.$emit('close')
            },
            submit(){
                //this.form.post(route(''));
                axios.post('/dashboard/properties', this.form).then(response => {
                    //alert('Property Added Successfully!');
                    window.location.reload(true);
                }).catch(error => {
                    if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                    }
                });
            }
        },
        data(){
            return{
                form: this.$inertia.form({
                    user_id: this.$parent.$attrs.user.id,
                    street_address: '',
                    city: '',
                    province: '',
                    postal_code: ''
                })
            }
        }
    });

</script>
