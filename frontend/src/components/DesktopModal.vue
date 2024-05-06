<template>
  <button @click="openModal">
    <slot name="open"/>
  </button>
  <div class="desktop-modal" v-if="stateModal">
    <div class="desktop-modal__container">
      <div class="desktop-modal__header">
        <slot name="title"/>
        <img src="../assets/img/close-modal.svg" alt="close-modal" @click="openModal">
      </div>
      <slot name="content"/>
    </div>
  </div>
</template>
<script setup>
let stateModal = false;
let openModal = () => {
  stateModal = !stateModal;
}
</script>
<style>
.desktop-modal {
  &__container {
    width: 200px;
    height: 200px;
    box-shadow: var(--drop-shadow-for-item);
    padding: 20px;
  }
  &__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
}
</style>