<template>
  <form class="register-form" @submit.prevent>
    <div class="register-form__field">
      <div class="register-form__field-label">
        <label for="patronymic">Введите логин</label>
        <input type="text" id="patronymic" placeholder="retmix" class="register-form__field-label_input" v-model="model.login">
      </div>
      <div class="register-form__field-label">
        <label for="email">Введите свою электронную почту</label>
        <input type="email" id="email" placeholder="example@gmail.com" class="register-form__field-label_input" v-model="model.email">
      </div>
      <div class="register-form__field-label">
        <label for="password">Введите пароль</label>
        <input type="password" id="password" placeholder="***********" class="register-form__field-label_input" v-model="model.password">
      </div>
      <div>
        <select v-model="model.option">
          <option>Обычный</option>
          <option>Компания</option>
        </select>
      </div>
    </div>
    <button class="register-form__send" @click="registrationPostRequest">Отправить</button>
  </form>
</template>

<script setup>
import {onMounted, ref} from "vue";
const model = ref({
  login: '',
  email: '',
  password: '',
  option: ''
})
async function registrationPostRequest() {
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/register`, {
      method: 'POST',
      body: JSON.stringify(
          {
            fio: model.value.fio,
            email: model.value.email,
            password: model.value.password
          }
      ),
      headers: {
        'Content-Type': 'application/json'
      },
    });
  } catch (error) {
    console.log(error)
  }
}
onMounted(() => {
  registrationPostRequest();
})

</script>

<style lang="scss">
  @import "./../assets/base.css";
  @import "./../assets/app";
.register-form {
  width: 400px;
  box-shadow: var(--drop-shadow-base);
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
        border: 1px solid var(--color-for-inactive-text);

      }
    }
  }
  &__send {
    width: 150px;
    height: 30px;
    background-color: #ffb8c6;
    border: none;
  }
}

</style>