<template>
  <div class="container">
    <header-component/>
    <div class="company-create-page">
      <h2 class="company-create-page__title">Создание компании</h2>
      <company-create-form/>
    </div>
  </div>
</template>
<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue";
import CompanyCreateForm from "@/components/CompanyCreateForm.vue";
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
    font-size: $interval-xx-large;
  }
}
</style>