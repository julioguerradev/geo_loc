<template>
  <Header/>
  
  <div class="container">
    <div class="row">
      <div class="col-12">
        
        <form class="card" @submit.prevent="submit">
          <div class="container px-5 py-5">
            <div class="row">
              <div class="pb-2 col-6">
                <h2>Cadastrar Trecho</h2>
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
                    autofocus

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
                    autofocus
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
            <button type="submit" class="btn btn-primary">Salvar</button>
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
