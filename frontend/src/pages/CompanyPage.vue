<template>
  <div class="container">
    <header-component/>
    <div class="company-create-page">
      <h2 class="company-create-page__title">Создание компании</h2>
      <desktop-modal :isOpen="modalIsOpen" @toggleModal="toggleModal">
        <template v-slot:open>
          Открыть
        </template>
        <template v-slot:title>Добавление своей компании</template>
        <template v-slot:content>
          <company-create-form/>
        </template>
      </desktop-modal>
      <get-company/>
    </div>
  </div>
</template>
<script setup>
import {ref} from "vue";
import HeaderComponent from "@/components/HeaderComponent.vue";
import CompanyCreateForm from "@/components/CompanyCreateForm.vue";
import GetCompany from "@/components/GetCompany.vue";
import DesktopModal from "@/components/DesktopModal.vue";

let modalIsOpen = ref(false);

const toggleModal = () => {
  modalIsOpen.value = !modalIsOpen.value;
};
</script>
<style lang="scss">
@import "../assets/app";
@import "../assets/base.css";
.company-create-page{
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
  &__add {
    max-width: 500px;
    padding: 0 20px 0 20px;
    height: 30px;
    background-color: var(--background-for-button);
    border: none;
    color: var(--color-for-button);
  }
}
</style>