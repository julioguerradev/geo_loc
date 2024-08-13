<script setup>
    import { defineProps, defineEmits, ref } from 'vue';

    const props = defineProps({
    options: {
        type: Array,
        required: true,
        default: () => [],
    },
    modelValue: {
        default: '',
    },
    label: {
        type: String,
        default: 'Escolha uma opção',
    },
    id: {
        type: String,
        default: 'custom-select',
    },
    name: {
        type: String,
        default: 'custom-select',
    },
    });

    const emits = defineEmits(['update:modelValue']);

    const selectedValue = ref(props.modelValue);

    const handleChange = () => {
    emits('update:modelValue', selectedValue.value);
    };
</script>

<template>
    <div>
      <label :for="id" class="block text-sm font-medium text-gray-700">{{ label }}</label>
      <select
        :id="id"
        :name="name"
        v-model="selectedValue"
        @change="handleChange"
        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
      >
        <option value="" disabled>Selecione uma opção</option>
        <option v-for="option in options" :key="option.id" :value="option.id.toString()">
          {{ option.nome }}
        </option>
      </select>
    </div>
</template>
