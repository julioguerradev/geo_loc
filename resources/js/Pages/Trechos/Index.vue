
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
          <td>{{ trecho.data_referencia }}</td>
          <td><Link>Ver</Link></td>
        </tr>

      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link } from  "@inertiajs/vue3" ;
import { onMounted, ref } from 'vue';
import L from 'leaflet';

const headers = ["UF", "BR", "Quilometro Inicial", "Quilometro Final", "Data de Refência", "Ação"];

// const map = ref(null);


defineProps({
  trechos: {
    type: Array,
    default: () => [],
  },
});

// onMounted(async () => {
//   // Inicializa o mapa
//   map.value = L.map('map').setView([-15.7801, -47.9292], 13); // Centraliza o mapa em Brasília (DF)

//   // Adiciona o tile layer do mapa
//   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//   }).addTo(map.value);

//   // Faz a requisição para a API
//   try {
//     const response = await fetch('https://servicos.dnit.gov.br/sgplan/apigeo/rotas/espacializarlinha?br=060&tipo=B&uf=DF&cd_tipo=null&data=2024-01-01&kmi=1&kmf=5');
//     const data = await response.json();

//     // Adiciona o layer de GeoJSON ao mapa
//     L.geoJSON(data).addTo(map.value);
//   } catch (error) {
//     console.error('Erro ao obter dados da API:', error);
//   }
// });


</script>
<style scoped>
  #map {
    width: 100%;
    height: 100%;
  }
</style>
