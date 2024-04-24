<template>
  <form class="create-resume-form" @submit.prevent>
    <div class="create-resume-form__field">
      <div class="create-resume-form__field-label">
        <label for="name">Введите ваше имя</label>
        <input type="text" id="name" placeholder="Иван" class="create-resume-form__field-label_input" v-model="model.name">
      </div>
      <div class="create-resume-form__field-label">
        <label for="surname">Введите вашу фамилию</label>
        <input type="text" id="surname" placeholder="Иванов" class="create-resume-form__field-label_input" v-model="model.surname">
      </div>
      <div class="create-resume-form__field-label">
        <label for="patronymic">Введите ваше отчество</label>
        <input type="text" id="patronymic" placeholder="***********" class="create-resume-form__field-label_input" v-model="model.patronymic">
      </div>
      <div class="create-resume-form__field-label">
        <label for="gender">Ваш пол</label>
        <select id="gender" v-model="model.gender">
          <option>Мужской</option>
          <option>Женский</option>
        </select>
      </div>
      <div class="create-resume-form__field-label">
        <label for="address">Адрес проживания</label>
        <input type="text" id="address" placeholder="г. Томск ул.Выдуманная д.1" class="create-resume-form__field-label_input" v-model="model.address">
      </div>
      <div class="create-resume-form__field-label">
        <label for="birthday">Введите device</label>
        <input type="date" id="birthday" placeholder="гггг-дд-мм" class="create-resume-form__field-label_input" v-model="model.birthday">
      </div>
      <div class="create-resume-form__field-label">
        <label for="citizenship">Гражданство</label>
        <input type="text" id="citizenship" placeholder="Россия" class="create-resume-form__field-label_input" v-model="model.citizenship">
      </div>
      <div class="create-resume-form__field-label">
        <label for="work_permission">Ваш опыт работы в годах</label>
        <input type="text" id="work_permission" placeholder="5" class="create-resume-form__field-label_input" v-model="model.work_permission">
      </div>

    </div>
    <router-link to="/"><button class="create-resume-form__send" @click="createResumePostRequest">Создать резюме</button></router-link>
  </form>
</template>
<script setup>
import {useCookies} from "vue3-cookies";
const { cookies } = useCookies();
import {ref} from "vue";

const model = ref({
  name: '',
  surname: '',
  patronymic: '',
  gender: '',
  address: '',
  birthday: '',
  citizenship: '',
  work_permission: ''

})

async function createResumePostRequest() {
  const token = cookies.get('authData')
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/resume/create`, {
      method: 'POST',
      body: JSON.stringify(
          {
            name: model.value.name,
            surname: model.value.surname,
            patronymic: model.value.patronymic,
            gender: model.value.gender,
            address: model.value.address,
            birthday: model.value.birthday,
            citizenship: model.value.citizenship,
            work_permission: model.value.work_permission,
          }
      ),
      headers: {
        Authorization: `${token}`
      },
    });
    const data = await response.json()
    console.log(data)

    cookies.set('authData', data);
  } catch (error) {
    console.log(error)
  }
}
</script>
<style lang="scss">
@import "./../assets/base.css";
@import "./../assets/app";
.create-resume-form {
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