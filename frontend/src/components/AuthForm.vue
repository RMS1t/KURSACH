<template>
  <form class="auth-form" @submit.prevent>
    <div class="auth-form__field">
      <div class="auth-form__field-label">
        <label for="patronymic">Введите логин</label>
        <input type="text" id="patronymic" placeholder="retmix" class="auth-form__field-label_input" v-model="model.name">
      </div>
      <div class="auth-form__field-label">
        <label for="password">Введите пароль</label>
        <input type="password" id="password" placeholder="***********" class="auth-form__field-label_input" v-model="model.password">
      </div>
    </div>
    <button class="auth-form__send" @click="registrationPostRequest">Отправить</button>
  </form>
</template>

<script setup>

import {onMounted, ref} from "vue";
const model = ref({
  name: '',
  password: '',
  email: '',
  role: '',
  device_name: ''
})
async function registrationPostRequest() {
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/auth`, {
      method: 'POST',
      body: JSON.stringify(
          {
            name: model.value.name,
            password: model.value.password,
          }
      ),
      headers: {
        'Content-Type': 'application/json',
      },
    });
  } catch (error) {
    console.log(error)
  }
}

</script>

<style lang="scss">
@import "./../assets/base.css";
@import "./../assets/app";
.auth-form {
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