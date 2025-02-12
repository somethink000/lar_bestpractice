<script setup>
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

</script>

<template>
    <header class="header">
        <div class="header_container">
            <div class="logo">Gigachat</div>


            <div class="nav">
                <div v-if="authStore.user">
                    <a>{{ authStore.user.name }}</a>
                </div>
                <div v-else>
                    <a>login</a>
                </div>
            </div>
        </div>
    </header>
</template>

<style>
    .header{
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;

        .header_container{
            display: flex;
            justify-content: space-between;
            margin: 16px;
            width: 80%;


        }
    }

</style>