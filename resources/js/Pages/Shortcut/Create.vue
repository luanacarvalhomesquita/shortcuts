<template>
    <MainLayout title="Atalho - Creating" :isMain="false">
        <div class="flex cursor-pointer">
            <button class="underline text-sm py-2 text-secondary_600" @click="goBack" type="button">
                <img src="/icons/back.svg" alt="Back" class="icon-button pr-2"/>
            </button>
        </div>
        <div>
            <form @submit.prevent="create">
                <!-- title -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                    <input
                        type="text"
                        id="title"
                        v-model="form.title"
                        class="w-full bg-gray-200 rounded p-2"
                        placeholder="Insira o título (até 50 caracteres)"
                        maxlength="50"
                        required
                        autocomplete="off"
                    />
                    <div class="text-red-500 text-sm">{{ form.errors.title }}</div>
                </div>
                <!-- link -->
                <div class="mb-4">
                    <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link:</label>
                    <input
                        type="text"
                        id="link"
                        v-model="form.link"
                        class="w-full bg-gray-200 rounded p-2"
                        placeholder="Insira o link"
                        autocomplete="off"
                    />
                    <div class="text-red-500 text-sm">{{ form.errors.link }}</div>
                </div>
                <!-- note -->
                <div class="mb-4">
                    <label for="note" class="block text-gray-700 text-sm font-bold mb-2">Nota:</label>
                    <textarea
                        id="note"
                        @input="updateNoteSize"
                        v-model="form.note"
                        class="w-full h-96 bg-gray-200 rounded p-2 leading-8"
                        placeholder="Insira a nota (até 2000 caracteres)"
                        maxlength="2000"
                        required
                        autocomplete="off"
                    ></textarea>
                    <div class="text-red-500 text-sm">{{ form.errors.note }}</div>
                    <span class="flex justify-end text-secondary_600">{{ form.note.length }} / 2000 caracteres</span>
                </div>
                <!-- image -->
                <div class="mb-4">
                    <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Cor:</label>
                    <input
                        type="color"
                        id="color"
                        v-model="form.color"
                        class="w-full h-10"
                    />
                    <div class="text-red-500 text-sm">{{ form.errors.color }}</div>
                </div>
                <!-- submit -->
                <button type="submit" class="bg-primary hover:bg-primary_600 text-white font-bold py-2 px-4 rounded">Enviar</button>
            </form>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    images: Object,
})


const goBack = () => window.history.back();

const form = useForm({
    title: '',
    note: '',
    link: '',
    color: '#ffffff',
})

const create = () => form.post('/shortcut')
</script>

<style coped>
.icon-button {
    width: 20px;
}
</style>
