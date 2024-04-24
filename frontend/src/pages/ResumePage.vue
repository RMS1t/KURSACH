<template>
  <div class="container">
    <header-component/>
    <div class="resume-page">
      <h2 class="resume-page__title">Резюме</h2>
      <create-resume-form/>
    </div>
  </div>
</template>
<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue";
import CreateResumeForm from "@/components/CreateResumeForm.vue";
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
    font-size: $interval-xx-large;
  }
}
</style>