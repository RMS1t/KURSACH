<template>
  <div class="container">
    <header-component/>
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
  </div>
</template>
<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue";
import DesktopModal from "@/components/DesktopModal.vue";
import CreateVacanсy from "@/components/CreateVacanсy.vue";

let showModal = false;
let openModal = () => {
  showModal = !showModal
}
</script>
<style></style>