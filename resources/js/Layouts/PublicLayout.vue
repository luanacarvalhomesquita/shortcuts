<template>
    <header class="bg-primary dark:bg-gray-800 p-1 justify-between flex px-4">
        <div></div>
        <div>
            <Link class="text-lg text-secondary_100" href="/">ATALHOS</Link>
        </div>
        <div class="flex">
            <Link href="/login" method="DELETE" as="button" class="flex items-center">
                Login
            </Link>
        </div>
    </header>

    <main class="container shadow shadow-secondary_300 mx-auto p-4 w-full h-full min-h-screen my-4">
        <!-- Feedback -->
        <div v-if="flashSuccess" class="success">
            {{ flashSuccess }}
        </div>

        <!-- Welcome -->
        <div class="flex bg-gray-100 dark:bg-gray-900 dark:border dark:border-gray-800 p-4 my-4" v-if="user && isMain">
            <span>Olá, Visitante! Que tal pegar um atalho hoje? :)</span><br>
            <span>Sabia que você também pode criar seus atalhos? <a href="/register">Registre-se aqui</a></span>
        </div>

        <!-- Content -->
        <div>
            <slot>Default</slot>
        </div>
    </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';

const props = defineProps({
    isMain: Boolean ?? true,
    title: String
});

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);

</script>
