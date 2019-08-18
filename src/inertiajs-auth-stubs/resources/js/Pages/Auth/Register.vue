<template>
    <layout>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Register</div>

                        <div class="card-body">
                            <form method="POST" @submit.prevent="submit">

                                <TextInput
                                    id="nameField"
                                    class="row"
                                    type="text"
                                    v-model="form.name"
                                    label="Name"
                                    :errors="errors.name"
                                />

                                <TextInput
                                    id="emailField"
                                    class="row"
                                    type="email"
                                    v-model="form.email"
                                    label="E-Mail Address"
                                    :errors="errors.email"
                                />

                                <TextInput
                                    id="passwordField"
                                    class="row"
                                    type="password"
                                    v-model="form.password"
                                    label="Password"
                                    :errors="errors.password"
                                />

                                <TextInput
                                    id="passwordConfirmationField"
                                    class="row"
                                    type="password"
                                    v-model="form.passwordConfirmation"
                                    label="Password Confirmation"
                                />

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <LoadingButton type="submit" class="btn btn-primary" :loading="sending">
                                            Register
                                        </LoadingButton>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import LoadingButton from '@/Shared/LoadingButton'
import CheckboxInput from '@/Shared/CheckboxInput'
import TextInput from '@/Shared/TextInput'
import Layout from '@/Shared/Layout'

export default {
    components: {
        Layout,
        LoadingButton,
        TextInput,
        CheckboxInput,
    },
    props: {
        errors: Object,
    },
    data() {
        return {
            sending: false,
            form: {
                name: null,
                email: null,
                password: null,
                passwordConfirmation: null,
            },
        }
    },
    mounted() {
        document.title = 'Register'
    },
    methods: {
        submit() {
            this.sending = true
            this.$inertia.post(this.route('register'), {
                name: this.form.name,
                email: this.form.email,
                password: this.form.password,
                password_confirmation: this.form.passwordConfirmation,
            }).then(() => this.sending = false)
        },
    },
}
</script>
