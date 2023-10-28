<template>
    <MainLayout title="Atalho - Edição" :isMain="false" class="bg-gray-900 text-white">
      <div class="flex cursor-pointer">
        <button class="underline text-sm py-2 text-gray-300" @click="goBack" type="button">
          <img src="/icons/back.svg" alt="Back" class="icon-button pr-2"/>
        </button>
      </div>
      <div>
        <form @submit.prevent="update" class="mt-6">
          <!-- title -->
          <div class="mb-4">
            <label for="title" class="block text-sm font-bold mb-2">Título:</label>
            <input
              type="text"
              id="title"
              v-model="form.title"
              class="w-full bg-gray-800 rounded p-2"
              placeholder="Insira o título (até 50 caracteres)"
              maxlength="50"
              required
              autocomplete="off"
            />
            <div class="text-red-500 text-sm">{{ form.errors.title }}</div>
          </div>
          <!-- link -->
          <div class="mb-4">
            <label for="link" class="block text-sm font-bold mb-2">Link:</label>
            <input
              type="text"
              id="link"
              v-model="form.link"
              class="w-full bg-gray-800 rounded p-2"
              placeholder="Insira o link"
              autocomplete="off"
            />
            <div class="text-red-500 text-sm">{{ form.errors.link }}</div>
          </div>
          <!-- note -->
          <div class="mb-4">
            <label for="note" class="block text-sm font-bold mb-2">Nota:</label>
            <textarea
              id="note"
              @input="updateNoteSize"
              v-model="form.note"
              class="w-full h-48 bg-gray-800 rounded p-2 leading-6"
              placeholder="Insira a nota (até 2000 caracteres)"
              maxlength="2000"
              required
              autocomplete="off"
            ></textarea>
            <div class="text-red-500 text-sm">{{ form.errors.note }}</div>
            <span class="flex justify-end text-gray-300">{{ form.note.length }} / 2000 caracteres</span>
          </div>
          <!-- image -->
          <div class="mb-4">
            <label for="image" class="block text-sm font-bold mb-2">Imagem:</label>
            <input
              type="file"
              id="image"
              @change="handleImageUpload"
              accept="image/*"
              class="w-full bg-gray-800 rounded p-2"
            />
            <div class="text-red-500 text-sm">{{ form.errors.image }}</div>
          </div>
          <!-- submit -->
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Atualizar
          </button>
        </form>
      </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    shortcut: Object,
})


const goBack = () => window.history.back();

const form = useForm({
    title: props.shortcut.title,
    note: props.shortcut.note,
    link: props.shortcut.link,
    image: null,
})

const handleImageUpload = (event) => {
    form.image = event.target.files[0]
}

const update = () => form.put(`/shortcut/${props.shortcut.id}`) // Rota de atualização do atalho
</script>

<style coped>
.icon-button {
    width: 20px;
}
</style>
