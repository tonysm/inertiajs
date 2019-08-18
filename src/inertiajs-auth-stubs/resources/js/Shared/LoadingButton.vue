<template>
    <button :disabled="loading" class="btn btn-primary" type="button">
        <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span v-if="loading" class="sr-only">{{ loadingText }}</span>
        <slot />
    </button>
</template>

<script>
export default {
  props: {
    loading: Boolean,
    loadingText: {
        type: String,
        default: () => 'Loading...',
    }
  },
}
</script>
