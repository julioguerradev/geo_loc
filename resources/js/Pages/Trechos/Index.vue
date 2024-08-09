
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
          <td>{{ trecho.uf_id }}</td>
          <td>{{ trecho.rodovia_id }}</td>
          <td>{{ trecho.quilometragem_inicial }}</td>
          <td>{{ trecho.quilometragem_final }}</td>
          
          <td><Link :href="`/trechos/${trecho.id}`">Ver</Link></td>
          <td><Link :href="`/trechos/${trecho.id}/edit`">Editar</Link></td>
        </tr>

      </tbody>
    </table>
  </div>
  <div id="map"></div>
</template>

<script setup>
  import { Link } from  "@inertiajs/vue3" ;
  const headers = ["UF", "BR", "Quilometro Inicial", "Quilometro Final", "Ação"];

  defineProps({
    trechos: {
      type: Array,
      default: () => [],
    },
  });

</script>
