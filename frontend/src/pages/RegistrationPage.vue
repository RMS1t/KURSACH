<template>
 <div class="container">
   <header-component/>
   <div class="register-page">
     <h2 class="register-page__title">Регистрация</h2>
     <register-form/>
   </div>
 </div>
</template>
<script setup>
import RegisterForm from "@/components/RegisterForm.vue";
import HeaderComponent from "@/components/HeaderComponent.vue";
</script>
<style lang="scss">
@import "../assets/app";
@import "../assets/base.css";
.register-page {
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