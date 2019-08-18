<template>
    <div v-if="hasFlash" class="alert" role="alert">
        {{ message }}
    </div>
</template>

<script>
export default {
    props: {
        sessionKey: {
            type: String,
            default: () => 'status',
        },
        useMessage: {
            type: String,
            default: () => '',
        }
    },
    computed: {
        hasFlash() {
            return this.$page.flash[this.sessionKey] !== undefined
                ? this.$page.flash[this.sessionKey]
                : false;
        },
        message() {
            if (this.useMessage) {
                return this.useMessage;
            }

            return this.$page.flash[this.sessionKey] || '';
        },
    }
}
</script>
