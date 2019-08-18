<template>
    <layout>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>

                        <div class="card-body">
                            <form method="POST" @submit.prevent="submit">
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
                                    :errors="errors.password_confirmation"
                                />

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <LoadingButton type="submit" class="btn btn-primary" :loading="sending">
                                            Reset Password
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
        TextInput,
        CheckboxInput,
        LoadingButton,
    },
    props: {
        errors: Object,
        token: String,
        email: String,
    },
    data() {
        return {
            sending: false,
            form: {
                email: this.email,
                password: null,
                passwordConfirmation: null,
            },
        }
    },
    methods: {
        submit() {
            this.sending = true;

            this.$inertia.post(this.route('password.update'), {
                token: this.token,
                email: this.form.email,
                password: this.form.password,
                password_confirmation: this.form.passwordConfirmation,
            }).then(() => this.sending = false)
        }
    }
}
</script>
