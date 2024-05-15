<template>
  <div class="container">
    <div class="resume-list">
      <div v-if="resumesLoaded" class="resume" v-for="resume in resumes" :key="resume.id">
        <div class="resume__data">
          <p class="resume__text-title">Номер: {{resume.id}}</p>
          <div class="resume__text-name">
            <p class="resume__text--default">{{resume.first_name}}</p>
            <p class="resume__text--default">{{resume.name}}</p>
            <p class="resume__text--default">{{resume.last_name}}</p>
          </div>
          <p class="resume__text">Пол: {{resume.gender}}</p>
          <p class="resume__text">Адрес: {{resume.resident_address}}</p>
          <p class="resume__text">Дата рождения: {{resume.birthdate}}</p>
          <p class="resume__text">Гражданство: {{resume.citizenship}}</p>
          <p class="resume__text">{{resume.work_permission}}</p>
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
const resumes = ref([])

const resumesLoaded = ref(false);
async function getResumes() {
  const response = await fetch(`${import.meta.env.VITE_API_URL}/resume`)
  const data = await response.json()
  resumes.value = data[0]
  resumesLoaded.value = true
}
onMounted(() => {
  getResumes();
})
</script>
<style lang="scss">
@import "../assets/app.scss";
.resume {
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
    &-title {
      font-size: 30px;
      color: var(--text-default);
    }
    &-name {
      display: flex;
      gap: $interval-very-small;
    }
    &--default {
      color: var(--text-default);
      font-weight: 600;
    }

  }
}
</style>