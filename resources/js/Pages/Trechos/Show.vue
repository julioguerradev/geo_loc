<template>
  <Header/>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="pb-2">
          <h2>Cadastrar Trecho</h2>
          <div class="row">
            <div class="col-12 d-flex justify-content-end">
              <Link href="/trechos" class="gap-3 btn btn-info d-flex align-items-center ">
                <font-awesome-icon icon="fa-solid fa-arrow-left" />
                Voltar
              </Link>
            </div>
          </div>
          <div class="my-3 card" >
            <div class="row g-0">
              <div class="col-md-6 d-flex align-items-center">
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item"><strong>UF:</strong> {{ trecho.uf.sigla }}</li>
                    <li class="list-group-item"><strong>Rodovia:</strong> {{ trecho.rodovia.nome }}</li>
                    <li class="list-group-item"><strong>Quilometragem Inicial:</strong> {{ trecho.quilometragem_inicial }}</li>
                    <li class="list-group-item"><strong>Quilometragem Final:</strong> {{ trecho.quilometragem_final }}</li>
                    <li class="list-group-item"><strong>Data de Referência:</strong> {{ trecho.data_referencia }}</li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div id="map" style="height: 400px; width: 100%;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script setup>
  import { Link } from "@inertiajs/vue3";
  import Header from '@/Components/Header.vue';
  import { defineProps , onMounted } from 'vue';
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
  
  