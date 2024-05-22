<template>
  <div class="container">
    <form class="create-vacancy" v-if="isEmployer">
      <div class="create-vacancy__field">
        <div class="create-vacancy__field-label">
          <label for="name" class="create-vacancy__label">Введите название вакансии</label>
          <input type="text" placeholder="Фронтенд-разработчик" id="name" v-model="model.vac_name" class="create-vacancy__input">
        </div>
        <div class="create-vacancy__field-label">
          <label for="work" class="create-vacancy__label">Тип работы</label>
          <input type="text" placeholder="Очно" id="work" v-model="model.work_type" class="create-vacancy__input">
        </div>
        <div class="create-vacancy__field-label">
          <label for="description" class="create-vacancy__label">Описание</label>
          <input type="text" placeholder="Наша компания представляетиз себя" id="description" v-model="model.description" class="create-vacancy__input"></input>
        </div>
        <div class="create-vacancy__field-label">
          <label for="inn" class="create-vacancy__label">ИНН</label>
          <input type="number" placeholder="000000000000" id="inn" v-model="model.inn" class="create-vacancy__input">
        </div>
        <div class="create-vacancy__field-label">
          <label for="kpp" class="create-vacancy__label">КПП</label>
          <input type="number" placeholder="8467843" id="kpp" v-model="model.kpp" class="create-vacancy__input">
        </div>
        <div class="create-vacancy__field-label">
          <label for="tags" class="create-vacancy__label">Тэги</label>
          <input type="text" placeholder="tagstagstags" id="tags" v-model="model.tags" class="create-vacancy__input">
        </div>
        <div class="create-vacancy__field-label">
          <label for="salary" class="create-vacancy__label">Зарплата</label>
          <input type="number" placeholder="50000" id="salary" v-model="model.salary" class="create-vacancy__input">
        </div>
        <div class="create-vacancy__field-label">
          <label for="required_education" class="create-vacancy__label">Образование</label>
          <input type="text" placeholder="Среднее профессиональное" id="required_education" v-model="model.required_education" class="create-vacancy__input">
        </div>
        <div class="create-vacancy__field-label">
          <label for="required_experience" class="create-vacancy__label">Требуемый опыт</label>
          <input type="number" placeholder="0" id="required_experience" v-model="model.required_experience" class="create-vacancy__input">
        </div>
      </div>
      <router-link to="/vacancy"><button class="create-vacancy__send" @click="createVacancyPostRequest">Создать компанию</button></router-link>
    </form>
    <div v-else>
      Ваша роль не позволяет вам создать вакансию
    </div>
  </div>
</template>

<script setup>
import {useCookies} from "vue3-cookies";
const { cookies } = useCookies();
import {ref} from "vue";
import { useUserStore } from "@/store/userStore.js";
import {computed} from "vue";

const userStore = useUserStore();

const isEmployer = computed(() => userStore.isEmployer);

const model = ref({
  vac_name: '',
  work_type: '',
  description: '',
  inn: '',
  kpp: '',
  tags: '',
  salary: '',
  required_education: '',
  required_experience: ''
})

async function createVacancyPostRequest() {
  const token = cookies.get('authData')
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/vacancy/create`, {
      method: 'POST',
      body: JSON.stringify(
          {
            vac_name: model.value.vac_name,
            work_type: model.value.work_type,
            description: model.value.description,
            inn: model.value.inn,
            kpp: model.value.kpp,
            tags: model.value.tags,
            salary: model.value.salary,
            required_education: model.value.required_education,
            required_experience: model.value.required_experience
          }
      ),
      headers: {
        Authorization: `Bearer ${token.token}`
      },
    });
    const data = await response.json()
    console.log(data)

  } catch (error) {
    console.log(error)
  }
}
</script>

<style lang="scss">
@import "./../assets/base.css";
@import "./../assets/app";
.create-vacancy {
  width: 400px;
  color: var(--color-for-base-text);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: $interval-base;
  padding: $interval-base;
  &__field {
    display: flex;
    flex-direction: column;
    gap: $interval-base;
    &-label {
      position: relative;
      display: flex;
      flex-direction: column;
      gap: $interval-very-small;
    }
  }
  &__input {
    font-family: "DM Sans", sans-serif;
    font-size: 14px;
    width: 350px;
    height: 35px;
    padding: $interval-smaller;
    border: 1px solid var(--border-for-input);
    outline: none;
    border-radius: 6px;
  }
  &__label {
    font-family: "DM Sans", sans-serif;
    font-size: 14px;
    font-weight: 600;
    position: absolute;
    bottom: 26px;
    margin-left: $interval-mid;
    background-color: white;

  }
  &__send {
    width: 350px;
    height: 35px;
    background-color: var(--color-for-button);
    border: none;
    color: white;
    font-size: 14px;
    font-weight: 600;
    border-radius: 6px;
  }
}
</style>