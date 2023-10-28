<template>
    <MainLayout :title="`Atalho - ${shortcut.title}`" :isMain="false">
        <div>

            <!-- Ícone de Edição (Pencil) -->
            <div class="h-5 w-5 text-gray-500 hover:text-gray-700 cursor-pointer" @click="edit(shortcut.id)" >
                <font-awesome-icon icon="pen-to-square" />
            </div>

            <!-- Ícone de Remoção (Trash) -->
            <div class="h-5 w-5 text-red-500 hover:text-red-700 cursor-pointer" @click="remove(shortcut.id)">
                <font-awesome-icon icon="trash-alt" />
            </div>

        </div>
        <a href="/" class="flex cursor-pointer items-center">
            <span class="underline text-sm py-2 text-secondary_600">
                <img src="/icons/back.svg" alt="IR PARA O SITE" class="icon-button pr-2"/>
            </span>
        </a>
        <div>
            <div class="flex text-2xl py-8">
                <h1>Atalhos > Descrição</h1>
            </div>
            <div class="flex p-4 bg-secondary_100 dark:bg-gray-800 text-xl font-medium">
                <h3>{{ shortcut.title.toUpperCase() }}</h3>
            </div>
            <div class="flex py-5">
                <div class="w-4/6 px-2">
                    <span class="text-justify flex">
                        {{ shortcut.note }}
                    </span>
                </div>
                <div class="w-2/6 flex">
                    <img
                        src="/icons/image-default.png"
                        alt="Icone Apresentation"
                        class="flex h-full object-cover rounded-sm max-h-96 min-h-96"
                    />
                </div>
            </div>
            <a :href="shortcut.link" target="_blank" class="w-1/4 bg-primary shadow shadow-secondary_300 p-1 mr-1 h-full flex items-center justify-center rounded-sm">
                <div class="flex justify-center items-center">
                    <span class="flex p-2 justify-center items-center text-md text-secondary_100">IR PARA O SITE</span>
                    <img src="/icons/go_to.svg" alt="IR PARA O SITE" class="icon-button"/>
                </div>
            </a>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'

const props = defineProps({
  shortcut: Object
})

const edit = (id) => 'oi';
const remove = (id) => 'oi';


</script>

<style coped>
.icon-button {
    width: 20px;
}
</style>
