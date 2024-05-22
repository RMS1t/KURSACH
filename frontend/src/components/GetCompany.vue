<template>
  <div class="container">
    <div class="company-list">
      <div v-if="companiesLoaded" class="company" v-for="company in companies" :key="company.id">
        <h3 class="company__title">{{company.company_name}}</h3>
        <div class="company__text">
          <p class="company__text--disabled">Адрес: {{company.address}}</p>
          <p class="company__text--disabled">Описание: {{company.description}}</p>
        </div>
        <div class="company__bottom">
          <p class="company__bottom--default">ИНН: {{company.inn}}</p>
          <p class="company__bottom--default">КПП: {{company.kpp}}</p>
          <img src="../assets/img/show-more.svg" alt="show-more">
        </div>
      </div>
      <div v-else>
        Загрузка данных...
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";

const companies = ref([]);
const companiesLoaded = ref(false);

async function getCompany() {
  const response = await fetch(`${import.meta.env.VITE_API_URL}/company`);
  const data = await response.json();
  companies.value = data[0];
  companiesLoaded.value = true;
}

onMounted(() => {
  getCompany();
});
</script>
<style lang="scss">
@import "../assets/app.scss";
.company {
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
  &__title {
    font-size: 36px;
  }
  &__text {
    display: flex;
    flex-direction: column;
    gap: $interval-smaller;
    &--disabled {
      color: var(--text-disabled);
      font-size: 16px;
      font-weight: 600;
    }
  }
  &__bottom {
    display: flex;
    gap: $interval-ultra-large;

    &--default {
      color: var(--text-default);
      font-size: 16px;
      font-weight: 600;
    }
  }
}
</style>