
<template>
  <div>
  <h1>My Inertia CRUD</h1>
  <Link href="trechos/create">Criar novo trecho</Link>
  <table>
    <thead>
      <tr>
        <th v-for="header in headers" :key="header">
          {{ header }}
        </th>
      </tr>
      </thead>
      <tbody>
        <tr v-for="trecho in trechos" :key="trecho.id">
          <td>{{ trecho }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link } from  "@inertiajs/vue3" ;

defineProps({
  trechos: {
    type: Array,
    default: () => [],
  },
});

const headers = ["trechos", "body"];
</script>