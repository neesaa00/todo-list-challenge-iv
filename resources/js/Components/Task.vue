<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import { router } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
  task: {
    type: Object,
    default: null,
  },
});

const showDeleteButton = ref(false);

function updateTask(taskId) {
  router.put(
    route("tasks.update", taskId),
    {
      is_completed: !props.task.is_completed,
    },
    {
      preserveScroll: true,
      onSuccess: () => {
        document.activeElement.blur();
      },
    }
  );
}

function deleteTask(taskId) {
  router.delete(route("tasks.destroy", taskId), {
    preserveScroll: true,
    onSuccess: () => {
      document.activeElement.blur();
    },
  });
}
</script>

<template>
  <div
    class="p-4 rounded-md mb-2 shadow-sm"
    :class="task.is_completed ? 'bg-gray-50' : 'bg-white'"
    @mouseover="showDeleteButton = true"
    @mouseleave="showDeleteButton = false"
  >
    <div class="flex items-center justify-between space-x-3">
      <Checkbox
        :checked="task.is_completed"
        @change="updateTask(task.id)"
        :value="task.id"
      />
      <div class="grow">
        <label
          :for="task.id"
          class="text-gray-700"
          :class="{ 'line-through': task.is_completed }"
          >{{ task.title }}</label
        >
      </div>
      <button v-show="showDeleteButton" @click="deleteTask(task.id)">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          height="1em"
          viewBox="0 0 448 512"
        >
          <path
            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
          />
        </svg>
      </button>
    </div>
  </div>
</template>
