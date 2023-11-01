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
        <!-- Feedback -->
        <div v-if="flashSuccess" class="success">
            {{ flashSuccess }}
        </div>

        <!-- Buttons -->
        <div class="w-full flex justify-end">
            <div class="lg:w-1/6 md:w-1/2 w-full flex justify-end">
                <div
                    class="bg-white hover:shadow-md hover:border-primary_300 border cursor-pointer border-primary rounded-sm shadow-sm shadow-gray-300 p-1 dark:bg-gray-800 dark:hover:dark:bg-gray-700 justify-center flex items-center w-full rounded-r-sm"
                    @click="share"
                >
                    <span class="mr-4 text-primary text-sm">COMPARTILHAR</span>
                    <div class="flex pt-1">
                        <div class="flex justify-center items-center">
                            <img src="/icons/share.svg" alt="Search" class="icon-sm"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome -->
        <div class="flex bg-gray-100 p-4 my-4" v-if="user && isMain">
            <span>Olá, {{ user.name }}! Que tal pegar um atalho hoje? :)</span>
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
})

const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)
const user = computed(
    () => page.props.user
)

const share = () => window.alert('oi')
</script>
