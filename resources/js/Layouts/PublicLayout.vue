<template>
    <!-- Menu -->
    <header >
        <Menu :isAuth="isAuth"/>
    </header>

    <main class="container shadow shadow-secondary_300 mx-auto p-4 w-full h-full min-h-screen">
        <!-- Feedback -->
        <div v-if="flashSuccess" class="success">
            {{ flashSuccess }}
        </div>

        <!-- Welcome -->
        <div v-if="!isAuth" class="flex bg-gray-100 dark:bg-gray-900 dark:border dark:border-gray-800 p-4 mb-4">
            <span>Olá, Visitante! Que tal pegar um atalho hoje? :)</span><br>
            <span>Sabia que você também pode criar seus atalhos? <a href="/">Entre ou Registre-se aqui</a></span>
        </div>
        <div v-else class="flex bg-gray-100 dark:bg-gray-900 dark:border dark:border-gray-800 p-4 mb-4">
            <span>Olá, {{ user.name }}! Que tal pegar um atalho hoje? :) </span>
        </div>

        <!-- Content -->
        <div>
            <slot>Default</slot>
        </div>
    </main>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue';
import Menu from '@/Components/Menu.vue';

const props = defineProps({
    title: String
});

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
const user = computed(() =>page.props.user);
const isAuth = user.value ? true : false;

</script>
