<template>
    <div :class="{'fixed inset-0 opacity-25' : isDialogOpenShare || isDialogOpenCreateShortcut}">
        <!-- Menu -->
        <header >
            <Menu :isAuth="isAuth"/>
        </header>

        <main class="container shadow shadow-secondary_300 mx-auto p-4 w-full h-full min-h-screen my-2">
            <!-- Feedback -->
            <div v-if="flashSuccess" class="success">
                {{ flashSuccess }}
            </div>

            <div v-if="isMain">
                <!-- Title -->
                <Title  titleName="Meus Atalhos" />

                <!-- Welcome -->
                <div v-if="isAuth" class="flex bg-gray-100 dark:bg-gray-900 dark:border dark:border-gray-800 p-4 my-4" >
                    <span>Olá, {{ user.name }}! Que tal pegar um atalho hoje? :)</span>
                </div>

                <!-- Buttons -->
                <div class="w-full flex justify-end mt-4">
                    <div class="lg:w-1/6 md:w-1/2 w-full flex justify-end">
                        <div
                            class="bg-white hover:shadow-md hover:border-primary_300 border cursor-pointer border-primary rounded-sm shadow-sm shadow-gray-200 p-1 dark:bg-gray-800 dark:hover:dark:bg-gray-700 justify-center flex items-center w-full rounded-r-sm"
                            @click="changeDialogShare"
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
            </div>

            <!-- Content -->
            <div class="mt-4">
                <slot>Default</slot>

                <!-- Button New Shorcut -->
                <button-new-item iconName="new" :methodButton="changeDialogShareCreateShortcut" iconAlt="New Item" iconClass="h-8" />
            </div>
        </main>
    </div>

    <!-- Dialog Share -->
    <share v-if="isDialogOpenShare" :methodChangeModal="changeDialogShare" />

    <!-- Dialog New Shortcut -->
    <create v-if="isDialogOpenCreateShortcut" :methodChangeModal="changeDialogShareCreateShortcut" />
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue';
import ButtonNewItem from '@/Components/ButtonNewItem.vue';
import Share from '@/Pages/Shortcut/Modal/Share.vue';
import Create from '@/Pages/Shortcut/Modal/Create.vue';
import Menu from '@/Components/Menu.vue';
import Title from '@/Components/Title.vue'

const props = defineProps({
    isMain: {
        type: Boolean,
        default: false
    }
});

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
const user = computed(() => page.props.user);
const isAuth = user.value ? true : false;

const isDialogOpenShare = ref(false);
const changeDialogShare = () => isDialogOpenShare.value = !isDialogOpenShare.value;

const isDialogOpenCreateShortcut = ref(false);
const changeDialogShareCreateShortcut = () => isDialogOpenCreateShortcut.value = !isDialogOpenCreateShortcut.value;


</script>
