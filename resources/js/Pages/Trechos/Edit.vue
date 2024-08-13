<template>
  <Header/>
  <div class="container">
    <div class="row">
      <div class="col-12">
        
        <form class="card" @submit.prevent="updateTrecho">
          <div class="container px-5 py-5">
            <div class="row">
              <div class="pb-2 col-6">
                <h2>Editar Trecho</h2>
              </div>
              <div class="pb-2 col-6 d-flex justify-content-end">
                <Link href="/trechos" class="gap-3 btn btn-info d-flex align-items-center ">
                  <font-awesome-icon icon="fa-solid fa-arrow-left" />
                  Voltar
                </Link>
              </div>
              <div class="mb-3 col-6">
                <div class="">
                  <SelectInput
                    v-model="form.uf_id"
                    :options="ufs"
                    label="Unidade Federativa"
                    id="uf_id"
                    name="uf_id"
                    @change="handleUfChange"
                  />  
                </div>
              </div>
              <div class="mb-3 col-6">
                <div class="">
                  <SelectInput
                    v-model="form.rodovia_id"
                    :options="rodovias"
                    label="Rodovia"
                    id="rodovia_id"
                    name="rodovia_id"
                  />
                </div>
              </div>

              <div class="col-3">
                <InputLabel for="quilometragem_inicial" value="Km Inicial" />
                <TextInput
                    id="quilometragem_inicial"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.quilometragem_inicial"
                    required
                />
              </div>
              <div class="col-3">
                <InputLabel for="quilometragem_final" value="Km Final" />
                <TextInput
                    id="quilometragem_final"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.quilometragem_final"
                    required
                />
              </div>
              <div class="mb-3 col-6">
                <div class="">
                  <InputLabel for="data_referencia" value="Data de Referência" />
                  <CalendarInput
                    v-model="form.data_referencia"
                    id="data_referencia"
                    name="data_referencia"
                  />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="gap-3 col-12 d-flex">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="button" @click="deleteTrecho" class="btn btn-danger">Deletar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script setup>
  import InputLabel from '@/Components/InputLabel.vue';
  import TextInput from '@/Components/TextInput.vue';
  import SelectInput from '@/Components/SelectInput.vue';
  import CalendarInput from '@/Components/CalendarInput.vue';
  import Header from '@/Components/Header.vue';
  import { Link,  useForm } from "@inertiajs/vue3";
  import { defineProps, onMounted, ref } from 'vue';
  
  const props = defineProps({
    trecho: {
      required: true,
    },
  });
  
  const form = useForm({
    ...props.trecho
  });

  const ufs = ref([]);
  const rodovias = ref([]);

  const fetchOptions = async () => {
    try {
      const ufResponse = await fetch('/ufs');
      ufs.value        = await ufResponse.json();

      const rodoviaResponse = await fetch('/rodovias');
      rodovias.value        = await rodoviaResponse.json();
      
    } catch (error) {
      console.error('Erro ao buscar dados:', error);
    }
  };
  
  onMounted(fetchOptions);
  
  const handleUfChange = () => {
    fetch(`/getRodovias/${form.uf_id}`)
      .then(response => response.json())
      .then(data => {
        rodovias.value = data
      })
      .catch(error => {
        console.error('Erro ao buscar dados da rodovia:', error);
      });
  };

  // Função para enviar os dados atualizados
  const updateTrecho = () => {
    form.put(`/trechos/${props.trecho.id}`)
  };

  const deleteTrecho = () => {
  if (confirm('Tem certeza que deseja deletar este trecho?')) {
    form.delete(`/trechos/${props.trecho.id}`);
  }
};
</script>
  
  
  