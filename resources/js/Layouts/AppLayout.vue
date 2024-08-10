<!-- resources/js/Layouts/AppLayout.vue -->
<template>
    <div>
      <Header />
      <main class="main-content">
        <slot />
      </main>
    </div>
</template>
  
<script setup>
  import Header from '@/Components/Header.vue';
</script>
  
<style>
  /* Ajuste o espaço superior para o cabeçalho fixo */
  .main-content {
    padding-top: 60px; /* Altura do cabeçalho */
  }
</style>
  