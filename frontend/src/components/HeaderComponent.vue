<template>
  <div class="main-page">
    <div class="main-page__header">
      <nav class="main-page__navigation">
        <router-link to="/" class="main-page__navigation__item">Главная</router-link>
        <router-link to="/vacancy" class="main-page__navigation__item">Вакансии</router-link>
        <router-link to="/company" class="main-page__navigation__item" v-if="authCookieValue">Компании</router-link>
        <router-link to="/register" class="main-page__navigation__item" v-if="!authCookieValue">Регистрация</router-link>
        <router-link to="/auth" class="main-page__navigation__item" v-if="!authCookieValue">Вход</router-link>
        <router-link to="/resume" class="main-page__navigation__item" v-if="authCookieValue">Резюме</router-link>
        <router-link to="/" class="main-page__navigation__item" v-if="authCookieValue" @click="deleteCookie">Выход</router-link>
        <p v-if="isEmployer">Работодатель</p>
        <p v-if="isJobSeeker">Соискатель</p>
      </nav>
    </div>
  </div>
</template>

<script setup>
import { useCookies } from "vue3-cookies";
import { computed } from "vue";
import { useUserStore } from "@/store/userStore.js";

const { cookies } = useCookies();
const userStore = useUserStore();

const authCookieValue = computed(() => cookies.get('authData') || null);
const isEmployer = computed(() => userStore.isEmployer);
const isJobSeeker = computed(() => userStore.isJobSeeker);

const deleteCookie = () => {
  cookies.remove('authData');
  cookies.remove('userRole')
  userStore.clearRole();
}
</script>
<style lang="scss">
@import "../assets/base.css";
@import "../assets/app.scss";
.main-page {
  &__header {
    display: flex;
    justify-content: center;
  }

  &__navigation {
    display: flex;
    gap: $interval-base;
    font-size: $interval-mid;
    text-decoration: none;

    &__item {
      text-decoration: none;
      color: var(--color-for-base-text);
    }
  }
}
</style>