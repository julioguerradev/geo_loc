<template>
  <Header/>
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-end">
        <div class="gap-2 buscador d-flex">
          <div class="input-group">
            <input type="text" class="form-control" name="search" id="search" v-model="searchQuery">
          </div>
          <Link href="trechos/create" class="btn btn-primary">
            <font-awesome-icon icon="fa-solid fa-plus" />
          </Link>
        </div>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th v-for="header in headers" :key="header">
              {{ header }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="trecho in filteredTrechos" :key="trecho.id">
            <td>{{ trecho.uf.sigla }}</td>
            <td>{{ trecho.rodovia.nome }}</td>
            <td>{{ trecho.quilometragem_inicial }}</td>
            <td>{{ trecho.quilometragem_final }}</td>
            <td>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  <font-awesome-icon icon="fa-solid fa-cog" />
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li>
                    <Link :href="`/trechos/${trecho.id}`" class="dropdown-item">
                      <font-awesome-icon icon="fa-solid fa-eye" />
                      <span> | Ver</span>
                    </Link>
                  </li>
                  <li>
                    <Link :href="`/trechos/${trecho.id}/edit`" class="dropdown-item">
                      <font-awesome-icon icon="fa-solid fa-pencil" />
                      <span> | Editar</span>
                    </Link>
                  </li>
                </ul>
              </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
  import { Link } from "@inertiajs/vue3";
  import Header from "@/Components/Header.vue";
  import { ref, computed } from "vue";

  const props = defineProps({
    trechos: {
      type: Array,
      default: () => [],
    },
  });

  const headers = ["UF", "BR", "Quilometro Inicial", "Quilometro Final", "Ação"];
  
  
  const searchQuery = ref("");
  const filteredTrechos = computed(() => {
    return props.trechos.filter((trecho) => {
      const rodovia = trecho.rodovia?.nome?.toLowerCase() || "";
      const ufSigla = trecho.uf?.sigla?.toLowerCase() || "";
      const searchTerm = searchQuery.value.toLowerCase();
      return (
        rodovia.includes(searchTerm) || ufSigla.includes(searchTerm)
      );
    });
  });
</script>
