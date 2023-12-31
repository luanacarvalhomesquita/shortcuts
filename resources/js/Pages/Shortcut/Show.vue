<template>
    <MainLayout :isMain="false" :isDialogOpenEditShortcut="isDialogOpenEditShortcut">
        <div class="relative">
            <div class="flex justify-between">
                <div>
                    <a href="/" class="flex cursor-pointer items-center">
                        <span class="underline text-sm py-2 text-secondary_600">
                            <img src="/icons/back.svg" alt="IR PARA O SITE" class="icon-button pr-2"/>
                        </span>
                    </a>
                </div>
                <div class="flex">
                    <div v-if="!hiddenRemoveIcon" class="flex">
                        <!-- Ícone de Remoção (Trash) -->
                        <div class="text-gray-500 hover:text-primary cursor-pointer p-2 hover:bg-gray-100 flex items-center justify-center rounded" @click="remove(shortcut.id)">
                            <font-awesome-icon icon="trash-alt" />
                            <span class="pl-2">Remover</span>
                        </div>
                        <!-- Ícone de Edição (Pencil) -->
                        <div @click="changeDialogEditShortcut" class="text-gray-500 hover:text-primary cursor-pointer p-2 hover:bg-gray-100 flex items-center justify-center rounded" >
                            <font-awesome-icon icon="pen-to-square" />
                            <span class="pl-2">Editar</span>
                        </div>
                    </div>
                    <!-- Icone Restauração -->
                    <div v-else class="text-gray-500 hover:text-primary cursor-pointer p-2 hover:bg-gray-100 flex items-center justify-center rounded" @click="restore(shortcut.id)">
                        <font-awesome-icon icon="trash-restore" />
                        <span class="pl-2">Restaurar</span>
                    </div>

                </div>
            </div>
            <div>
                <div class="flex text-2xl py-8">
                    <h1>Descrição</h1>
                </div>
                <h3>{{ shortcut.title.toUpperCase() }}</h3>
                <div
                    class="flex p-1 bg-secondary_100 dark:bg-gray-800 text-xl font-medium"
                    :style="{ background: shortcut.color}"
                >
                </div>
                <div class="flex py-5">
                    <div class="w-full px-2">
                        <span class="text-justify flex">
                            {{ shortcut.note }}
                        </span>
                        <span class="text-justify flex text-gray-400">
                            {{ shortcut.note == null ? 'Não foi realizada uma descrição acerca deste atalho.' : ''}}
                        </span>
                    </div>

                </div>
                <a :href="shortcut.link" target="_blank" class="lg:w-1/4 md:w-1/2 sm:w-full bg-primary shadow shadow-secondary_300 p-1 mr-1 h-full flex items-center justify-center rounded-sm">
                    <div class="flex justify-center items-center">
                        <span class="flex p-2 justify-center items-center text-md text-secondary_100">IR PARA O SITE</span>
                        <img src="/icons/go_to.svg" alt="IR PARA O SITE" class="icon-button"/>
                    </div>
                </a>
            </div>
        </div>
    </MainLayout>

    <!-- Dialog Edit Shortcut -->
    <edit :shortcut="shortcut" v-if="isDialogOpenEditShortcut" :methodChangeModal="changeDialogEditShortcut" />
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import axios from 'axios';
import { computed, ref } from 'vue';
import Edit from '@/Pages/Shortcut/Modal/Edit.vue';

const props = defineProps({
  shortcut: Object
})

// Remove
const wasDestroyed = ref(props.shortcut.deleted_at != null ? true : false)
const hiddenRemoveIcon = computed(() => wasDestroyed.value);

const remove = (id) => {
    let message = "Tem certeza que você quer remover este item?";
    if (window.confirm(message)) {
        axios.delete(`/shortcut/${id}`)
            .then(wasDestroyed.value = true)
            .catch(error => {
                alert(error);

            });
    }
};

// Restore
const restore = (id) => {
    let message = "Tem certeza que você quer restaurar este item?";
    if (window.confirm(message)) {
        axios.patch(`/shortcut/${id}/restore`)
            .then(wasDestroyed.value = false)
            .catch(error => {
                alert(error);
            });
    }
};

const isDialogOpenEditShortcut = ref(false);
const changeDialogEditShortcut = () => isDialogOpenEditShortcut.value = !isDialogOpenEditShortcut.value;

</script>

<script>
export default {
    mounted() {
        document.title = 'Exibindo Atalho';
    }
}
</script>


<style coped>
.icon-button {
    width: 20px;
}
</style>
