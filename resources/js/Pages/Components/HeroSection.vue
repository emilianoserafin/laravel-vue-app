<template>
<main class="flex w-full min-h-screen bg-slate-300">


  </main>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

export default defineComponent({
        components: {
            JetValidationErrors,
            Link,
        },

        props: {

        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    })
</script>
