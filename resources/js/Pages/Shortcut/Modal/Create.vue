<template>
    <Dialog>
        <div class="flex flex-col h-full">
            <!-- Button Close -->
            <div class="h-1/6  justify-end flex">
                <a @click="closeDialog" class="p-2 shadow-sm cursor-pointer" type="submit" href="#">
                    <img src="/icons/times.svg" alt="Clear" class="h-5"/>
                </a>
            </div>

            <div class="h-5/6">
                <!-- Title -->
                <Title titleName="Novo Atalho" />

                <!-- Form New Shortcut -->
                <form @submit.prevent="create">

                    <!-- title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                        <input
                            type="text"
                            id="title"
                            v-model="form.title"
                            class="w-full input"
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
                            class="w-full input"
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
                            class="w-full h-48 input leading-8"
                            placeholder="Insira a nota (até 2000 caracteres)"
                            maxlength="2000"
                            autocomplete="off"
                        ></textarea>
                        <div class="text-red-500 text-sm">{{ form.errors.note }}</div>
                        <span class="flex justify-end text-secondary_600">{{ form.note.length }} / 2000 caracteres</span>
                    </div>

                    <!-- color -->
                    <div class="mb-4">
                        <label for="color" class="block text-gray-800 text-sm font-bold mb-2">Clique abaixo para escolher uma cor:</label>
                        <div class="flex">
                            <input
                                type="color"
                                id="color"
                                v-model="form.color"
                                class="w-2/6 bg-gray-800 h-10 cursor-pointer shadow-sm shadow-gray-400 mr-2"
                            />
                            <input
                                type="text"
                                id="link"
                                v-model="form.color"
                                class="flex w-4/3 input"
                                placeholder="#FFFFFF"
                            />
                        </div>
                        <div class="text-red-500 text-sm">{{ form.errors.color }}</div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end mt-10">
                        <button type="submit" class="bg-primary hover:bg-primary_600 lg:w-1/4 w-1/2 text-white font-bold py-2 px-4 rounded">
                            SALVAR
                        </button>
                        <button type="submit" @click="closeDialog" class="border-primary border hover:border-primary_600 lg:w-1/4 w-1/2 text-primary font-bold py-2 px-4 rounded ml-2">
                            CANCELAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </Dialog>
</template>

<script setup>
import Dialog from '@/Components/Dialog.vue';
import Title from '@/Components/Title.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    methodChangeModal: {
        type: Function,
        required: true
    }
})

const closeDialog = () => {
    props.methodChangeModal()
}

const form = useForm({
    title: '',
    note: '',
    link: '',
    color: '',
})
const create = () => form.post('/shortcut')

</script>

<script>
import DialogLayout from '@/Layouts/DialogLayout.vue'

export default {
    layout: DialogLayout,
    mounted() {
        document.title = 'Novo Atalho - Atalhos';
    }
}
</script>

<style>
.icon-button {
    width: 20px;
}
</style>
