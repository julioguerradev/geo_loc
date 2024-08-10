<template>
    <div class="calendar-container">
      <input
        type="date"
        :id="id"
        :name="name"
        v-model="selectedDate"
        @input="updateDate"
        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        />
    </div>
</template>
  
<script setup>
  import { defineProps, defineEmits, ref } from 'vue';
  
  const props = defineProps({
    modelValue: {
      type: String,
      default: '',
    },
    id: {
      type: String,
      default: 'calendar-input',
    },
    name: {
      type: String,
      default: 'calendar',
    },
  });
  
  const emits = defineEmits(['update:modelValue']);
  
  const selectedDate = ref(props.modelValue);
  
  const updateDate = () => {
    emits('update:modelValue', selectedDate.value);
  };
</script>
  