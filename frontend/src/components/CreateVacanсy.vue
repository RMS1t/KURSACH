<template>
  <form class="create-vacancy">
    <div class="create-vacancy__form">
      <div class="create-vacancy__field">
        <label for="name">Название вакансии</label>
        <input type="text" placeholder="Разработчик ПО" class="create-vacancy__input" id="name">
      </div>
      <div class="create-vacancy__field">
        <label for="type">Тип работы</label>
        <input type="text" placeholder="Программирование" class="create-vacancy__input" id="type">
      </div>
      <div class="create-vacancy__field">
        <label for="salary">Зарплата</label>
        <input type="number" placeholder="20000" class="create-vacancy__input" id="salary">
      </div>
      <div class="create-vacancy__field">
        <label for="experience">Требуемый опыт работы</label>
        <input type="number" placeholder="" class="create-vacancy__input" id="experience">
      </div>
      <div class="create-vacancy__field">
        <label for="experience">Описание</label>
        <textarea placeholder="Вакансия представляет из себя..." class="create-vacancy__input" id="experience"></textarea>
      </div>
    </div>
  </form>
</template>
<script setup>
</script>
<style></style>