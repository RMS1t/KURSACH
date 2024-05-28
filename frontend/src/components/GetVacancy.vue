<template>
  <div class="container">
    <div class="vacancy-list">
      <div v-if="vacanciesLoaded" class="vacancy" v-for="vacancy in vacancies" :key="vacancy.id">
        <div class="vacancy__data">
          <p class="vacancy__text--default">{{vacancy.vac_name}}</p>
          <p class="vacancy__text">Тип работы: {{vacancy.work_type}}</p>
          <p class="vacancy__text">Зарплата: {{vacancy.salary}}</p>
          <p class="vacancy__text">Необходимый опыт: {{vacancy.required_experience}}</p>
          <p class="vacancy__text">Необходимое образование: {{vacancy.required_education}}</p>
          <p class="vacancy__text">Описание: {{vacancy.description}}</p>
        </div>
      </div>
      <div v-else>
        Загрузка данных...
      </div>
    </div>
  </div>
</template>
<script setup>

import {onMounted, ref} from "vue";
const vacancies = ref([])

const vacanciesLoaded = ref(false);
async function getVacancies() {
  const response = await fetch(`${import.meta.env.VITE_API_URL}/vacancy`)
  const data = await response.json()
  vacancies.value = data
  vacanciesLoaded.value = true
}
onMounted(() => {
  getVacancies();
})
</script>
<style lang="scss" scoped>
@import "../assets/app.scss";
.vacancy{
  width: 542px;
  padding: $interval-l-large;
  box-shadow: var(--drop-shadow-for-item);
  border-left: 10px solid var(--color-for-button);
  border-radius: 23px;
  border-left-color: var(--color-for-button);;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  justify-content: center;
  gap: $interval-small;
  padding-left: 56px;
  &-list {
    display: flex;
    flex-wrap: wrap;
    gap: $interval-large;
    justify-content: center;
  }
  &__text {
    color: var(--text-disabled);
    font-size: 16px;
    font-weight: 600;
    &-name {
      display: flex;
      gap: $interval-very-small;
    }
    &--default {
      color: var(--text-default);
      font-weight: 600;
      font-size: 20px;
    }

  }
}
</style>