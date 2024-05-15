<template>
  <div class="container">
    <header class="header">
      <header-component/>
      <div class="main-page__main">
        <div class="main-page__block">
          <h1 class="main-page__title">Найдите работу мечты</h1>
          <div class="main-page__search">
            <input class="main-page__search_input" type="text" placeholder="Vue разработчик...">
            <button class="main-page__button">Найти</button>
          </div>
        </div>
        <div class="main-page__poster">
          <img src="../assets/img/search_jobs.jpg" alt="search_jobs">
        </div>
      </div>
    </header>
  </div>
</template>
<script setup>
import HeaderComponent from "@/components/HeaderComponent.vue";
</script>
<style lang="scss">
@import "../assets/base.css";
@import "../assets/app";
.header {
  display: flex;
  flex-direction: column;
  gap: $interval-mega;
}
.main-page {
  &__main {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  &__block {
    display: flex;
    flex-direction: column;
    gap: $interval-l-large;
  }
  &__title {
    font-size: $interval-mega;
    width: 400px;
    color: var(--color-for-base-text);
  }
  &__search {
    display: flex;
    gap: $interval-smaller;
    &_input {
      width: 241px;
      height: 40px;
      padding-left: $interval-smaller;
      border: 1px solid var(--border-for-input);
      outline: none;
    }
  }
  &__button {
    width: 133px;
    height: 40px;
    background-color: var(--background-for-button);
    border: none;
    color: var(--color-for-button);
  }
}
</style>