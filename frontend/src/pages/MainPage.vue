<template>
  <div class="container">
    <header class="header">
      <header-component/>
      <div class="main-page__main">
        <div class="main-page__block">
          <h1 class="main-page__title">Найдите работу мечты</h1>
          <div class="main-page__search">
            <input class="main-page__search_input" type="text" placeholder="Vue разработчик..." v-model="searchQuery" @input="search">
            <ul class="main-page__item">
              <li v-for="item in searchResults" :key="item.id" v-if="searchResults.length">{{ item.vac_name }}</li>
              <li v-else>Результаты поиска отсутствуют</li>
            </ul>
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
import {onMounted, ref} from "vue";

const searchVacancies = ref([]);
const searchQuery = ref('');
const searchResults = ref([]);

async function searchRequest() {
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/vacancy`);
    const data = await response.json();
    searchVacancies.value = data;
    console.log(searchVacancies);
  } catch (error) {
    console.error("Error fetching vacancies:", error);
  }
}

const search = () => {
  if (!searchQuery.value) {
    searchResults.value = [];
    return;
  }
  searchResults.value = searchVacancies.value.filter(item =>
      item.vac_name && item.vac_name.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
};

onMounted(() => {
  searchRequest();
})
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
    flex-direction: column;
    &_input {
      width: 241px;
      height: 40px;
      padding-left: $interval-smaller;
      border: 1px solid var(--border-for-input);
      outline: none;
    }
  }
  &__item {
    list-style-type: none;
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