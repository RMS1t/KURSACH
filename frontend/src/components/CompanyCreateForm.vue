<template>
  <div class="container">
    <form class="company-create-form">
      <div class="company-create-form__field">
        <div class="company-create-form__field-label">
          <label for="name">Введите название компании</label>
          <input type="text" placeholder="Спутник" id="name" v-model="model.company_name" class="company-create-from__input">
        </div>
        <div class="company-create-form__field-label">
          <label for="address">Адрес</label>
          <input type="text" placeholder="Котовского 6" id="address" v-model="model.address" class="company-create-from__field-label_input">
        </div>
        <div class="company-create-form__field-label">
          <label for="description">Описание</label>
          <input type="text" placeholder="Наша компания представляетиз себя" id="description" v-model="model.description" class="company-create-from__field-label_input"></input>
        </div>
        <div class="company-create-form__field-label">
          <label for="inn">ИНН</label>
          <input type="number" placeholder="000000000000" id="inn" v-model="model.inn" class="company-create-from__field-label_input">
        </div>
        <div class="company-create-form__field-label">
          <label for="kpp">КПП</label>
          <input type="number" placeholder="8467843" id="kpp" v-model="model.kpp" class="company-create-from__field-label_input">
        </div>
        <div class="company-create-form__field-label">
          <label for="tags">Тэги</label>
          <input type="text" placeholder="tagstagstags" id="tags" v-model="model.tags" class="company-create-from__field-label_input">
        </div>
        <div class="company-create-form__field-label">
          <label for="number">Номер</label>
          <input type="number" placeholder="8467843" id="number" v-model="model.number" class="company-create-from__field-label_input">
        </div>
        <div class="company-create-form__field-label">
          <label for="type">Введите вид компании</label>
          <input type="text" placeholder="tagstagstags" id="type" v-model="model.company_type" class="company-create-from__field-label_input">
        </div>
        <div class="company-create-form__field-label">
          <label for="id">Введите id пользователя</label>
          <input type="number" placeholder="8467843" id="id" v-model="model.user_id" class="company-create-from__field-label_input">
        </div>
      </div>
      <router-link to=""><button class="company-create-form__send" @click="createCompanyPostRequest">Создать резюме</button></router-link>
    </form>
  </div>
</template>

<script setup>
import {useCookies} from "vue3-cookies";
const { cookies } = useCookies();
import {ref} from "vue";

const model = ref({
  company_name: '',
  address: '',
  description: '',
  inn: '',
  kpp: '',
  tags: '',
  number: '',
  company_type: '',
  user_id: ''
})

async function createCompanyPostRequest() {
  const token = cookies.get('authData')
  console.log(token)
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/company/create`, {
      method: 'POST',
      body: JSON.stringify(
          {
            company_name: model.value.company_name,
            address: model.value.address,
            description: model.value.description,
            inn: model.value.inn,
            kpp: model.value.kpp,
            tags: model.value.tags,
            number: model.value.number,
            company_type: model.value.company_type,
            user_id: model.value.user_id
          }
      ),
      headers: {
        Authorization: `Bearer ${token}`
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
.company-create-form {
  width: 400px;
  box-shadow: var(--drop-shadow-base);
  border: 1px solid var(--border-for-input);
  color: var(--color-for-base-text);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: $interval-base;
  padding: $interval-base;
  &__field {
    display: flex;
    flex-direction: column;
    gap: $interval-smaller;
    &-label {
      display: flex;
      flex-direction: column;
      gap: $interval-very-small;
      &_input {
        width: 250px;
        height: 25px;
        padding: 0 5px;
        border: 1px solid var(--border-for-input);
        outline: none;
      }
    }
  }
  &__send {
    width: 150px;
    height: 30px;
    background-color: var(--background-for-button);
    border: none;
    color: var(--color-for-button);
  }
}
</style>