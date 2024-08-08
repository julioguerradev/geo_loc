<template>
  <form @submit.prevent="submit">
    <label for="body">Unidade da Federação:</label>
    <input type="text" id="uf_id" v-model="form.uf_id" />

    <label for="body">Rodovia:</label>
    <input type="text" id="rodovia_id" v-model="form.rodovia_id" />

    <label for="body">Quilometragem Inicial:</label>
    <input type="text" id="quilometragem_inicial" v-model="form.quilometragem_inicial" />

    <label for="body">Quilometragem Final:</label>
    <input type="text" id="quilometragem_final" v-model="form.quilometragem_final" />

    <label for="body">Tipo de Trecho:</label>
    <input type="text" id="tipo_trecho" v-model="form.tipo_trecho" />

    <button type="submit">Submit</button>
  </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
const form = useForm({
  data_referencia: "",
  uf_id: "",
  rodovia_id: "",
  tipo_trecho: "",
  quilometragem_inicial: "",
  quilometragem_final: "",
  geo: "",
});
const submit = () => {
  form.post("/trechos");
};
</script>
<style lang="scss" scoped></style>