<template>
  <form class="register-form" @submit.prevent>
    <div class="register-form__field">
      <div class="register-form__field-label">
        <label for="patronymic">Введите логин</label>
        <input type="text" id="patronymic" placeholder="retmix" class="register-form__field-label_input" v-model="model.name">
      </div>
      <div class="register-form__field-label">
        <label for="email">Введите свою электронную почту</label>
        <input type="email" id="email" placeholder="example@gmail.com" class="register-form__field-label_input" v-model="model.email">
      </div>
      <div class="register-form__field-label">
        <label for="password">Введите пароль</label>
        <input type="password" id="password" placeholder="***********" class="register-form__field-label_input" v-model="model.password">
      </div>
      <div class="register-form__field-label">
        <label for="role">Выберите роль</label>
          <input type="number" id="number" placeholder="1" class="register-form__field-label_input" v-model="model.role">
      </div>
      <div class="register-form__field-label">
        <label for="device_name">Введите device</label>
        <input type="text" id="device_name" placeholder="device" class="register-form__field-label_input" v-model="model.device_name">
      </div>

    </div>
    <router-link to="/"><button class="register-form__send" @click="registrationPostRequest">Зарегистрироваться</button></router-link>
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