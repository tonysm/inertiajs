<template>
    <layout title="Home">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            <FlashMessages class="alert-success" />

                            You are logged in!
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
