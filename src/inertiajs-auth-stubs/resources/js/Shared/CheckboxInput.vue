<template>
    <div class="form-group">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" :id="id" :checked="value" @change="$emit('input', !value)">

                <label class="form-check-label" :for="id">
                    {{ label }}
                </label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `checkbox-input-${this._uid}`
            },
        },
        value: Boolean,
        label: String,
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
    },
}
</script>
