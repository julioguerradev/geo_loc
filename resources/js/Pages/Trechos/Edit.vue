<template>
    <div>
      <h1>Editar Trecho</h1>
  
      <form @submit.prevent="updateTrecho">
        <div>
          <label for="uf_id">UF:</label>
          <input v-model="form.uf_id" id="uf_id" type="text" />
        </div>
  
        <div>
          <label for="rodovia_id">Rodovia:</label>
          <input v-model="form.rodovia_id" id="rodovia_id" type="text" />
        </div>
  
        <div>
          <label for="quilometragem_inicial">Quilometragem Inicial:</label>
          <input v-model="form.quilometragem_inicial" id="quilometragem_inicial" type="number" />
        </div>
  
        <div>
          <label for="quilometragem_final">Quilometragem Final:</label>
          <input v-model="form.quilometragem_final" id="quilometragem_final" type="number" />
        </div>
  
        <div>
          <label for="data_referencia">Data de Referência:</label>
          <input v-model="form.data_referencia" id="data_referencia" type="date" />
        </div>
  

        <button type="submit">Salvar</button>
        
        <button type="button" @click="deleteTrecho" class="btn btn-danger">Deletar</button>
      </form>
  
      <Link href="/trechos" class="btn btn-secondary">Cancelar</Link>
    </div>
</template>
  
<script setup>
  import { Link,  useForm } from "@inertiajs/vue3";
  import { defineProps } from 'vue';
  
  const props = defineProps({
    trecho: {
      type: Object,
      required: true,
    },
  });
  
  const form = useForm({
    ...props.trecho
  });
  
  // Função para enviar os dados atualizados
  const updateTrecho = () => {
    form.put(`/trechos/${props.trecho.id}`)
  };

  const deleteTrecho = () => {
  if (confirm('Tem certeza que deseja deletar este trecho?')) {
    form.delete(`/trechos/${props.trecho.id}`)
      .catch(error => {
        // Lida com erros
        console.error('Erro ao deletar o trecho:', error);
      });
  }
};
</script>
  
  
  