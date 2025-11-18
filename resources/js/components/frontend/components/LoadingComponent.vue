<template>
  <div v-if="isActive" class="fixed inset-0 flex items-center justify-center bg-black/30 z-[9999]">
    <span class="loader-wrap">
      <span class="loader-base">Shopee </span>
      <span class="loader-mask">Shopee </span>
    </span>
  </div>
</template>

<script>
export default {
  name: "LoadingComponent",
  props: {
    props: { type: Object, default: () => ({ isActive: false }) },
    active: { type: Boolean, default: null }
  },
  computed: {
    isActive() {
      if (this.active !== null) return this.active;
      return this.props && this.props.isActive;
    }
  }
};
</script>

<style scoped>
.loader-wrap {
  position: relative;
  display: inline-block;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: 700;
  font-size: 48px;
  letter-spacing: 2px;
  text-transform: uppercase;
}

/* base (orange) */
.loader-base {
  color: #FD8B0E;
  display: block;
}

/* mask layer slides across hiding/revealing white text */
.loader-mask {
  position: absolute;
  left: 0;
  top: 0;
  color: #ffffff;
  overflow: hidden;
  white-space: nowrap;
  width: 0%;
  box-sizing: border-box;
  animation: wipe 2s linear infinite;
}

/* animate width from 0% to 100% then reset */
@keyframes wipe {
  0% { width: 0%; }
  50% { width: 100%; }
  100% { width: 0%; }
}

@media (max-width: 640px) {
  .loader-wrap { font-size: 32px; }
}
</style>
