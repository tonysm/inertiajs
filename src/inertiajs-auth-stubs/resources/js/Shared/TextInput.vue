<template>
    <div class="form-group">
        <label v-if="label" class="col-md-4 col-form-label text-md-right" :for="id">{{ label }}:</label>

        <div class="col-md-6">
            <input :id="id" ref="input" v-bind="$attrs" class="form-control" :class="{ 'is-invalid': errors.length }" :type="type" :value="value" @input="$emit('input', $event.target.value)">

            <span v-if="errors.length" class="invalid-feedback" role="alert">
                <strong>{{ errors[0] }}</strong>
            </span>
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
        return `text-input-${this._uid}`
      },
    },
    type: {
      type: String,
      default: 'text',
    },
    value: String,
    label: String,
    errors: {
      type: Array,
      default: () => [],
    },
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
