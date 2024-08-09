<template>
  <form @submit.prevent="submit">
    <div>
      <label for="uf_id">Unidade da Federação:</label>
      <select id="uf_id" v-model="form.uf_id">
        <option v-for="uf in ufs" :key="uf.id" :value="uf.id">
          {{ uf.nome }}
        </option>
      </select>
    </div>

    <div>
      <label for="rodovia_id">Rodovia:</label>
      <select id="rodovia_id" v-model="form.rodovia_id">
        <option v-for="rodovia in rodovias" :key="rodovia.id" :value="rodovia.id">
          {{ rodovia.nome }}
        </option>
      </select>
    </div>

    <div>
      <label for="quilometragem_inicial">Quilometragem Inicial:</label>
      <input type="number" id="quilometragem_inicial" v-model="form.quilometragem_inicial" />
    </div>

    <div>
      <label for="quilometragem_final">Quilometragem Final:</label>
      <input type="number" id="quilometragem_final" v-model="form.quilometragem_final" />
    </div>

    <div>
      <label for="data_referencia">Data de Referência:</label>
      <input type="date" id="data_referencia" v-model="form.data_referencia" />
    </div>
    
    <button type="submit">Salvar</button>
    <Link href="/trechos" class="btn btn-primary">Voltar à lista</Link>
    
  </form>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  data_referencia: "",
  uf_id: "",
  rodovia_id: "",
  quilometragem_inicial: "",
  quilometragem_final: "",
  geo: "",
});

const ufs = ref([]);
const rodovias = ref([]);

const fetchOptions = async () => {
  try {
    const ufResponse = await fetch('/ufs');
    ufs.value = await ufResponse.json();

    const rodoviaResponse = await fetch('/rodovias');
    rodovias.value = await rodoviaResponse.json();
  } catch (error) {
    console.error('Erro ao buscar dados:', error);
  }
};

onMounted(fetchOptions);

const submit = () => {
  form.post('/trechos', {
    onSuccess: () => {
      // Redireciona para a lista após sucesso
      window.location.href = '/trechos';
    },
    onError: (errors) => {
      console.error('Erro ao criar o trecho:', errors);
    }
  });
};
</script>
