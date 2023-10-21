<template>
    <header class="bg-primary dark:bg-gray-800 p-1 justify-between flex px-4">
        <div></div>
        <div>
            <Link class="text-lg text-secondary_100" href="/">ATALHOS</Link>
        </div>
        <div class="flex">
            <Link href="/logout" method="DELETE" as="button" class="flex items-center">
                <img src="/icons/logout.svg" alt="Icone Presentation" class="icon-sm"/>
            </Link>
        </div>
    </header>

    <main class="container shadow shadow-secondary_300 mx-auto p-4 w-full h-full min-h-screen my-4">
        <div v-if="flashSuccess" class="success">
            {{ flashSuccess }}
        </div>
        <div class="flex py-5 " v-if="user && isMain">
            <span>Olá, {{ user.name }}! Que tal pegar um atalho hoje? :)</span>
        </div>

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
})

const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)
const user = computed(
    () => page.props.user
)
</script>
