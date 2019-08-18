<template>
    <layout>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Reset Password</div>

                        <div class="card-body">
                            <FlashMessages
                                session-key="status"
                                class="alert-success"
                            />

                            <form method="POST" @submit.prevent="submit">

                                <TextInput
                                    id="emailField"
                                    class="row"
                                    type="email"
                                    v-model="form.email"
                                    label="E-Mail Address"
                                    :errors="errors.email"
                                />

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <LoadingButton type="submit" class="btn btn-primary" :loading="sending">
                                            Send Password Reset Link
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
import FlashMessages from "@/Shared/FlashMessages";
import LoadingButton from '@/Shared/LoadingButton'
import CheckboxInput from '@/Shared/CheckboxInput'
import TextInput from '@/Shared/TextInput'
import Layout from '@/Shared/Layout'

export default {
    components: {
        FlashMessages,
        LoadingButton,
        CheckboxInput,
        TextInput,
        Layout,
    },
    props: {
        errors: Object,
    },
    data() {
        return {
            sending: false,
            form: {
                email: '',
            },
        };
    },
    methods: {
        submit() {
            this.sending = true;

            this.$inertia.post(this.route('password.email'), {
                email: this.form.email,
            }).then(() => this.sending = false);
        },
    },
};
</script>
