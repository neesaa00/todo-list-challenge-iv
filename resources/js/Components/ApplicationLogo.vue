<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  target: {
    type: String,
    default: route("home"),
  },
});
</script>

<template>
  <Link :href="target">
    <h3 class="text-3xl dark:text-gray-400">
      <span class="font-bold">TODO</span>
      <span class="fw-light">LIST</span>
    </h3>
  </Link>
</template>
