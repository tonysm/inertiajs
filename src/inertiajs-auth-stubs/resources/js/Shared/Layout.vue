<template>
  <div>
      <MainMenu v-if="withMenu" />
      <slot></slot>
  </div>
</template>

<script>
import MainMenu from '@/Shared/MainMenu';
export default {
  components: {
      MainMenu,
  },
  props: {
    title: String,
    withMenu: {
        type: Boolean,
        default: () => true,
    },
  },
  watch: {
    title: {
      immediate: true,
      handler(title) {
        document.title = title ? `${title} | Laravel` : 'Laravel'
      },
    },
  },
}
</script>
