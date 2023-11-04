<template>
    <div :class="{'fixed inset-0 opacity-50' : isDialogOpen}">
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
            <div class="w-full flex justify-end" v-if="isMain">
                <div class="lg:w-1/6 md:w-1/2 w-full flex justify-end">
                    <div
                        class="bg-white hover:shadow-md hover:border-primary_300 border cursor-pointer border-primary rounded-sm shadow-sm shadow-gray-200 p-1 dark:bg-gray-800 dark:hover:dark:bg-gray-700 justify-center flex items-center w-full rounded-r-sm"
                        @click="openDialog"
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
            <div class="flex bg-gray-100 dark:bg-gray-900 dark:border dark:border-gray-800 p-4 my-4" v-if="user && isMain">
                <span>Olá, {{ user.name }}! Que tal pegar um atalho hoje? :)</span>
            </div>

            <!-- Content -->
            <div>
                <slot>Default</slot>
            </div>
        </main>
    </div>
    <Dialog v-if="isDialogOpen">
        <!-- Title -->
        <div class="flex text-2xl py-8 font-semibold text-secondary">
            <h1>Compartilhe</h1>
        </div>

        <!-- Link -->
        <div class="mb-4">
            <label for="link" class="block text-gray-600 text-sm font-bold mb-2">Link</label>
            <input
                id="link"
                type="text"
                v-model="formattedLinkToShare"
                class="w-full input"
                autocomplete="off"
                disabled
            />
        </div>

        <!-- Buttons -->
        <div class="flex justify-end mb-10">
            <button @click="copyToClipboard" class="btn-primary justify-center inline-block md:w-1/2 lg:w-1/4 w-full text-center cursor-pointer mt-5 items-end h-1/3 mr-2" type="submit">
                {{ textButtonCopy }}
            </button>
            <button @click="closeDialog" class="border border-primary hover:border-primary_600 text-primary p-2 justify-center  inline-block md:w-1/2 lg:w-1/4 w-full text-center cursor-pointer mt-5 items-end h-1/3 mr-2" type="submit">
                FECHAR
            </button>
        </div>
    </Dialog>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue';
import Dialog from '@/Components/Dialog.vue';

const props = defineProps({
    isMain: Boolean ?? true,
    title: String
});

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
const user = computed(() => page.props.user);
const baseUrl = computed(() => page.props.base_url);

const isDialogOpen = ref(false);
const openDialog = () => isDialogOpen.value = true;
const closeDialog = () => isDialogOpen.value = false;

const formattedLinkToShare = `${baseUrl.value}/shortcut/share?hash=${user.value.hash_share}`;

const textButtonCopy = ref("COPIAR");

const copyToClipboard = () => {
    const input = document.createElement('input');
    input.value = formattedLinkToShare;
    document.body.appendChild(input);
    input.select();
    document.execCommand('copy');
    document.body.removeChild(input);

    textButtonCopy.value = "COPIADO";
};
</script>
