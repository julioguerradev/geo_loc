<template>
    <div>
      <h1>Detalhes do Trecho</h1>
  
      <div>
        <p><strong>UF:</strong> {{ trecho.uf_id }}</p>
        <p><strong>Rodovia:</strong> {{ trecho.rodovia_id }}</p>
        <p><strong>Quilometragem Inicial:</strong> {{ trecho.quilometragem_inicial }}</p>
        <p><strong>Quilometragem Final:</strong> {{ trecho.quilometragem_final }}</p>
        <p><strong>Data de Referência:</strong> {{ trecho.data_referencia }}</p>
      </div>

      <div id="map" style="height: 500px;"></div>

      <Link href="/trechos" class="btn btn-primary">Voltar à lista</Link>
    </div>
</template>
  
<script setup>
  import { Link } from "@inertiajs/vue3";
  import { onMounted } from 'vue';
  import { defineProps } from 'vue';
  import L from 'leaflet';
  
  const props = defineProps({
    trecho: {
      type: Object,
      required: true,
    },
  });

  onMounted(async () => {
    const map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    const geoJsonLayer = L.geoJSON(JSON.parse(props.trecho.geo)).addTo(map)
    
    map.fitBounds(geoJsonLayer.getBounds())
  });

</script>
  
  