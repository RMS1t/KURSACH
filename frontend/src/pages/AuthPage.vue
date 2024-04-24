<template>
  <div class="container">
    <header-component/>
    <div class="auth-page">
      <h2 class="auth-page__title">Авторизация</h2>
      <auth-form/>
    </div>
  </div>
</template>
<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue";
import AuthForm from "@/components/AuthForm.vue";
</script>
<style lang="scss">
@import "../assets/app";
@import "../assets/base.css";
.auth-page {
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