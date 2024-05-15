<template>
  <div class="container">
    <header-component/>
    <div class="vacancy">
      <h2 class="vacancy__title">Создание компании</h2>
      <desktop-modal>
        <template v-slot:open>
          Создать вакансию
        </template>
        <template v-slot:title>
          Создание вакансии
        </template>
        <template v-slot:content=>
          <create-vacanсy/>
        </template>
      </desktop-modal>
      <get-vacancy/>
    </div>
  </div>
</template>
<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue";
import DesktopModal from "@/components/DesktopModal.vue";
import CreateVacanсy from "@/components/CreateVacanсy.vue";
import GetVacancy from "@/components/GetVacancy.vue";

let showModal = false;
let openModal = () => {
  showModal = !showModal
}
</script>
<style>
.vacancy{
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