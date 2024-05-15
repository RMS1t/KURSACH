<template>
    <button @click="toggleModal">
      <slot name="open"/>
    </button>
  <div class="background" v-if="isOpen">
    <div class="desktop-modal">
      <div class="desktop-modal__container">
        <div class="desktop-modal__header">
          <h2><slot name="title"/></h2>
          <img src="../assets/img/close-modal.svg" alt="close-modal" @click="toggleModal">
        </div>
        <slot name="content"/>
      </div>
    </div>
  </div>
</template>

<script setup>
import {ref} from "vue";

let isOpen = ref(false);

const toggleModal = () => {
  isOpen.value = !isOpen.value;
};
</script>

<style lang="scss">
button {
  max-width: 1000px;
  padding: 0 20px 0 20px;
  height: 30px;
  background-color: var(--background-for-button);
  border: none;
  color: var(--color-for-button);
}
.background {
  top: 0;
  left: 0;
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 1;
  background: rgba(255, 255, 255, .6);
  display: flex;
  align-items: center;
  justify-content: center;
}
.desktop-modal {
  position: absolute;
  left: auto;
  top: auto;
  &__container {
    box-shadow: var(--drop-shadow-for-item);
    padding: 20px;
    background: white;
  }
  &__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
}
</style>