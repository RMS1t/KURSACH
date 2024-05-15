<template>
  <form class="register-form" @submit.prevent>
    <div class="register-form__field">
      <div class="register-form__field-label">
        <label for="patronymic" class="register-form__label">Введите логин</label>
        <input type="text" id="patronymic" placeholder="retmix" class="register-form__field-label_input" v-model="model.name">
      </div>
      <div class="register-form__field-label">
        <label for="email" class="register-form__label">Введите свою электронную почту</label>
        <input type="email" id="email" placeholder="example@gmail.com" class="register-form__field-label_input" v-model="model.email">
      </div>
      <div class="register-form__field-label">
        <label for="password" class="register-form__label">Введите пароль</label>
        <input type="password" id="password" placeholder="***********" class="register-form__field-label_input" v-model="model.password">
      </div>
      <div class="register-form__field-label">
        <label for="role" class="register-form__label">Введите роль</label>
        <input type="number" id="role" placeholder="1" class="register-form__field-label_input" v-model="model.role">
      </div>
      <div class="register-form__field-label">
        <label for="device_name" class="register-form__label">Введите device</label>
        <input type="text" id="device_name" placeholder="device" class="register-form__field-label_input" v-model="model.device_name">
      </div>
    </div>
    <router-link to="/"><button class="register-form__send" @click="registrationPostRequest">Зарегистрироваться</button></router-link>
    <div class="register-form__auth">
      <p>Уже есть аккаунт?</p>
      <router-link to="/auth" class="auth-form__link">
        <p>Авторизироваться</p>
      </router-link>
    </div>
  </form>
</template>

<script setup>
import {ref} from "vue";
import {useCookies} from "vue3-cookies";

const { cookies } = useCookies();
const model = ref({
  name: '',
  email: '',
  password: '',
  role: '',
  device_name: ''
})

const token = ref('')
async function registrationPostRequest() {
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/register`, {
      method: 'POST',
      body: JSON.stringify(
          {
            name: model.value.name,
            email: model.value.email,
            password: model.value.password,
            role: model.value.role,
            device_name: model.value.device_name
          }
      ),
      headers: {
        'Content-Type': 'application/json'
      },
    });
    const data = await response.json()
    console.log(data)
    token.value = data

    cookies.set('authData', data);
  } catch (error) {
    console.log(error)
  }
}

</script>

<style lang="scss">
  @import "./../assets/base.css";
  @import "./../assets/app";
.register-form {
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
  &__auth{
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