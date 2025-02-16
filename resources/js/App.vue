<script setup>
import Header from "@/components/Header.vue";
</script>

<template>
    <div class="dark:bg-gradient-to-l from-gray-900 to-gray-600 min-h-screen">
    <Header />
    <router-view></router-view>
    </div>
</template>

<style>
    
</style>