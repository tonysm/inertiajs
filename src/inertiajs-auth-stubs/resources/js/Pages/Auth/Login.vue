<template>
    <layout>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>

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

                                <CheckboxInput
                                    v-model="form.remember"
                                    id="rememberField"
                                    class="row"
                                    label="Remember Me"
                                />

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <LoadingButton type="submit" class="btn btn-primary" :loading="sending">
                                            Login
                                        </LoadingButton>

                                        <a class="btn btn-link" :href="route('password.request')">
                                            Forgot Your Password?
                                        </a>
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
                email: null,
                password: null,
                remember: null,
            },
        }
    },
    mounted() {
        document.title = 'Login'
    },
    methods: {
        submit() {
            this.sending = true
            this.$inertia.post(this.route('login'), {
                email: this.form.email,
                password: this.form.password,
                remember: this.form.remember,
            }).then(() => this.sending = false)
        },
    },
}
</script>
