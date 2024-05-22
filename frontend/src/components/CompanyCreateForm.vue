<template>
  <div class="container">
    <form class="company-create-form">
      <div class="company-create-form__field">
        <div class="company-create-form__field-label">
          <label for="name" class="company-create-form__label">Введите название компании</label>
          <input type="text" placeholder="Спутник" id="name" v-model="model.company_name" class="company-create-form__input">
        </div>
        <div class="company-create-form__field-label">
          <label for="address" class="company-create-form__label">Адрес</label>
          <input type="text" placeholder="Котовского 6" id="address" v-model="model.address" class="company-create-form__input">
        </div>
        <div class="company-create-form__field-label">
          <label for="description" class="company-create-form__label">Описание</label>
          <input type="text" placeholder="Наша компания представляетиз себя" id="description" v-model="model.description" class="company-create-form__input"></input>
        </div>
        <div class="company-create-form__field-label">
          <label for="inn" class="company-create-form__label">ИНН</label>
          <input type="number" placeholder="000000000000" id="inn" v-model="model.inn" class="company-create-form__input">
        </div>
        <div class="company-create-form__field-label">
          <label for="kpp" class="company-create-form__label">КПП</label>
          <input type="number" placeholder="8467843" id="kpp" v-model="model.kpp" class="company-create-form__input">
        </div>
        <div class="company-create-form__field-label">
          <label for="tags" class="company-create-form__label">Тэги</label>
          <input type="text" placeholder="tagstagstags" id="tags" v-model="model.tags" class="company-create-form__input">
        </div>
        <div class="company-create-form__field-label">
          <label for="number" class="company-create-form__label">Номер</label>
          <input type="number" placeholder="8467843" id="number" v-model="model.number" class="company-create-form__input">
        </div>
        <div class="company-create-form__field-label">
          <label for="type" class="company-create-form__label">Введите вид компании</label>
          <input type="text" placeholder="tagstagstags" id="type" v-model="model.company_type" class="company-create-form__input">
        </div>
        <div class="company-create-form__field-label">
          <label for="id" class="company-create-form__label">Введите id пользователя</label>
          <input type="number" placeholder="8467843" id="id" v-model="model.user_id" class="company-create-form__input">
        </div>
      </div>
      <router-link to="/company"><button class="company-create-form__send" @click="createCompanyPostRequest">Создать компанию</button></router-link>
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
.company-create-form {
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