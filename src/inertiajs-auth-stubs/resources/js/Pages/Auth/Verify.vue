<template>
    <layout title="Home">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Verify Your Email Address</div>

                        <div class="card-body">
                            <FlashMessages
                                session-key="resent"
                                use-message="A fresh verification link has been sent to your email address."
                                class="alert-success"
                            />

                            Before proceeding, please check your email for a verification link. <br>
                            If you did not receive the email, <inertia-link :href="route('verification.resend')">click here to request another</inertia-link>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import FlashMessages from "@/Shared/FlashMessages";

export default {
    components: {
        Layout,
        FlashMessages,
    },
}
</script>
