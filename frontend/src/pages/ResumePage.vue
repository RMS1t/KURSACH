<template>
  <div class="container">
    <header-component/>
    <div class="resume-page">
      <h2 class="resume-page__title">Резюме</h2>
      <desktop-modal :isOpen="modalIsOpen" @toggleModal="toggleModal">
        <template v-slot:open>
          Открыть
        </template>
        <template v-slot:title>Добавление своей компании</template>
        <template v-slot:content>
          <create-resume-form/>
        </template>
      </desktop-modal>
    </div>
  </div>
</template>
<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue";
import CreateResumeForm from "@/components/CreateResumeForm.vue";
import CompanyCreateForm from "@/components/CompanyCreateForm.vue";
import DesktopModal from "@/components/DesktopModal.vue";
import {ref} from "vue";

let modalIsOpen = ref(false);

const toggleModal = () => {
  modalIsOpen.value = !modalIsOpen.value;
};
</script>
<style lang="scss">
@import "../assets/app";
@import "../assets/base.css";
.resume-page {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: $interval-mid;
  &__title {
    color: var(--color-for-base-text);
    font-size: $interval-x-large;
    font-family: "Quicksand", sans-serif;
  }
}
</style>