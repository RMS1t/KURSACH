<template>
  <form class="auth-form" @submit.prevent>
    <div class="auth-form__field">
      <div class="auth-form__field-label">
        <label for="patronymic" class="auth-form__label">Введите логин</label>
        <input type="text" id="patronymic" placeholder="retmix" class="auth-form__field-label_input" v-model="model.name">
      </div>
      <div class="auth-form__field-label">
        <label for="password" class="auth-form__label">Введите пароль</label>
        <input type="password" id="password" placeholder="***********" class="auth-form__field-label_input" v-model="model.password">
      </div>
      <div class="auth-form__field-label">
        <label for="email" class="auth-form__label">Введите почту</label>
        <input type="email" id="email" placeholder="example@gmail.com" class="auth-form__field-label_input" v-model="model.email">
      </div>
      <div class="auth-form__field-label">
        <label for="device" class="auth-form__label">Введите device</label>
        <input type="text" id="device" placeholder="device" class="auth-form__field-label_input" v-model="model.device_name">
      </div>
    </div>
    <router-link to="/">
      <button class="auth-form__send" @click="authPostRequest">Отправить</button>
    </router-link>
    <div class="auth-form__registration">
      <p>Ещё нет аккаунта?</p>
      <router-link to="/register" class="auth-form__link">
        <p>Зарегистрироваться</p>
      </router-link>
    </div>
  </form>
</template>

<script setup>

import {onMounted, ref} from "vue";
import {useCookies} from "vue3-cookies";
import { useUserStore } from "@/store/userStore.js";

const userStore = useUserStore();

const { cookies } = useCookies();
const model = ref({
  name: '',
  password: '',
  email: '',
  device_name: ''
})

const token = ref('')

async function authPostRequest() {
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/auth`, {
      method: 'POST',
      body: JSON.stringify(
          {
            name: model.value.name,
            password: model.value.password,
            email:model.value.email,
            device_name: model.value.device_name
          }
      ),
      headers: {
        'Content-Type': 'application/json',
      },
    });
    const data = await response.json()
    token.value = data

    cookies.set('authData', data);

    const savedAuthData = cookies.get('userRole');
    userStore.setRole(savedAuthData)

  } catch (error) {
    console.log(error)
  }
}

</script>

<style lang="scss">
@import "./../assets/base.css";
@import "./../assets/app";
.auth-form {
  color: var(--color-for-base-text);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: $interval-mega;
  padding: $interval-base;
  &__field {
    display: flex;
    flex-direction: column;
    gap: $interval-mega;
    &-label {
      position: relative;
      display: flex;
      flex-direction: column;
      gap: $interval-very-small;
      &_input {
        font-family: "DM Sans", sans-serif;
        font-size: 16px;
        width: 629px;
        height: 56px;
        padding: $interval-smaller;
        border: 1px solid var(--border-for-input);
        outline: none;
        border-radius: 9px;
      }
    }
  }
  &__label {
    font-family: "DM Sans", sans-serif;
    font-size: 16px;
    font-weight: 600;
    position: absolute;
    bottom: 46px;
    margin-left: $interval-mid;
    background-color: white;

  }
  &__send {
    width: 629px;
    height: 56px;
    background-color: var(--color-for-button);
    border: none;
    color: white;
    font-size: 20px;
    font-weight: 600;
    border-radius: 9px;
  }
  &__registration {
    font-family: "DM Sans", sans-serif;
    font-size: 16px;
    font-weight: 600;
    display: flex;
    gap: 2px;
  }
  &__link {
    text-decoration: none;
    color: var(--color-for-button);
  }
}

</style>