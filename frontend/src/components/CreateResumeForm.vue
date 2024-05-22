<template>
  <form class="create-resume-form" @submit.prevent v-if="isJobSeeker">
    <div class="create-resume-form__field">
      <div class="create-resume-form__field-label">
        <label for="name" class="create-resume-form__label">Введите ваше имя</label>
        <input type="text" id="name" placeholder="Иван" class="create-resume-form__input" v-model="model.first_name">
      </div>
      <div class="create-resume-form__field-label">
        <label for="surname" class="create-resume-form__label">Введите вашу фамилию</label>
        <input type="text" id="surname" placeholder="Иванов" class="create-resume-form__input" v-model="model.name">
      </div>
      <div class="create-resume-form__field-label">
        <label for="patronymic" class="create-resume-form__label">Введите ваше отчество</label>
        <input type="text" id="patronymic" placeholder="Иванович" class="create-resume-form__input" v-model="model.last_name">
      </div>
      <div class="create-resume-form__field-label">
        <label for="gender">Ваш пол</label>
        <select v-model="model.gender" @click="setGender" class="create-resume-form__select">
          <option value="female">Женщина</option>
          <option value="male">Мужина</option>
        </select>
      </div>
      <div class="create-resume-form__field-label">
        <label for="tags" class="create-resume-form__label">Теги</label>
        <input type="text" id="tags" placeholder="Теги" class="create-resume-form__input" v-model="model.tags">
      </div>
      <div class="create-resume-form__field-label">
        <label for="address" class="create-resume-form__label">Адрес проживания</label>
        <input type="text" id="address" placeholder="г. Томск ул.Выдуманная д.1" class="create-resume-form__input" v-model="model.resident_address">
      </div>
      <div class="create-resume-form__field-label">
        <label for="birthday" class="create-resume-form__label">Введите вашу дату рождения</label>
        <input type="date" id="birthday" placeholder="гггг-дд-мм" class="create-resume-form__input" v-model="model.birthdate">
      </div>
      <div class="create-resume-form__field-label">
        <label for="citizenship" class="create-resume-form__label">Гражданство</label>
        <input type="text" id="citizenship" placeholder="Россия" class="create-resume-form__input" v-model="model.citizenship">
      </div>
      <div class="create-resume-form__field-label">
        <label for="work_permission" class="create-resume-form__label">страна</label>
        <input type=text id="work_permission" placeholder="Россия" class="create-resume-form__input" v-model="model.work_permission">
      </div>
      <div class="create-resume-form__field-label">
        <label for="work_permission" class="create-resume-form__label">Ваш id</label>
        <input type="number" id="work_permission" placeholder="5" class="create-resume-form__input" v-model="model.user_id">
      </div>
    </div>
    <router-link to=""><button class="create-resume-form__send" @click="createResumePostRequest">Создать резюме</button></router-link>
  </form>
  <div v-else>
    Ваша роль не позволяет вам создать резюме
  </div>
</template>
<script setup>
import {useCookies} from "vue3-cookies";
const { cookies } = useCookies();
import {ref} from "vue";
import { useUserStore } from "@/store/userStore.js";
import {computed} from "vue";

const userStore = useUserStore();

const isJobSeeker = computed(() => userStore.isJobSeeker);


const model = ref({
  first_name: '',
  name: '',
  last_name: '',
  gender: '',
  resident_address: '',
  tags: '',
  birthdate: '',
  citizenship: '',
  work_permission: '',
  user_id: ''

})

let setGender = () => {
  if(model.value.gender === "female") {
    model.value.gender = true;
  } else if(model.value.gender === "male") {
    model.value.gender = false;
  }
}

async function createResumePostRequest() {
  const token = cookies.get('authData')
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/resume/create`, {
      method: 'POST',
      body: JSON.stringify(
          {
            first_name: model.value.first_name,
            name: model.value.name,
            last_name: model.value.last_name,
            gender: model.value.gender,
            resident_address: model.value.resident_address,
            tags: model.value.tags,
            birthdate: model.value.birthdate,
            citizenship: model.value.citizenship,
            work_permission: model.value.work_permission,
            user_id: model.value.user_id
          }
      ),
      headers: {
        Authorization: `Bearer ${token.token}`
      },
    });
    const data = await response.json();
    console.log(data)

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
  &__select {
    font-family: "DM Sans", sans-serif;
    font-size: 14px;
    width: 350px;
    height: 35px;
    padding: $interval-smaller;
    border: 1px solid var(--border-for-input);
    outline: none;
    border-radius: 6px;
  }
  &__select option {
    border-radius: 5px;
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