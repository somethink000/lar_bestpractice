<script setup>
import { onMounted } from "vue";
import { useAuthStore } from "@/stores/auth";

const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();
});

</script>

<template>
  <div class="container">

  </div>
</template>

<style>

  
</style>