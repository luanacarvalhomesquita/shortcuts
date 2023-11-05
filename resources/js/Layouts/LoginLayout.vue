<template>
    <div class="relative justify-center" :class="{'fixed inset-0 opacity-25 bg-gray-50' : openModalRegister}">
        <!-- Show when size sm  -->
        <div class="lg:hidden md:hidden sm:flex bg-primary text-white justify-center">
            <span class="flex justify-center py-2">ATALHOS</span>
        </div>

        <!-- Content Login -->
        <div class="flex items-center justify-center ">
            <div class="hidden lg:w-4/6 md:w-3/6 w-2/4 bg-white dark:bg-gray-800 lg:flex md:flex  items-center justify-center h-screen lg:p-10 p-0">
                <div>
                    <h1 class="text-center title-logo text-secondary dark:text-secondary_100 lg:p-10 p-0">ATALHOS</h1>
                    <img src="/icons/presentation.svg" alt="Icone Presentation" class="icon-presentation"/>
                </div>
            </div>
            <div class="w-full lg:w-2/6 md:w-3/6 border-l-2 border-secondary_100 dark:bg-black items-center justify-center lg:p-10 p-3">
                <!-- Page Login -->
                <div class="flex flex-col items-center justify-center">
                    <slot/>
                </div>

                <!-- Button Register -->
                <div class="flex w-full pt-2 justify-center">
                    <a @click="register" class="border border-primary hover:border-primary_600 p-2 items-center justify-center flex w-full cursor-pointer text-primary" type="submit" href="#register">
                        CADASTRE-SE
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Dialog Register New User -->
    <div v-if="openModalRegister">
        <Create :methodCloseModal="register"/>
    </div>
</template>

<script setup>

import Create from '@/Pages/Auth/Modal/Create.vue'
import { ref } from 'vue'

const openModalRegister = ref(false)

const register = () => {
    openModalRegister.value = !openModalRegister.value
}
</script>

<style scoped>

.title-logo {
    font-size: 2.5rem;
    margin: 1rem;
}

.icon-presentation {
    width: 80vh;
    height: 50vh;
    margin: 1rem;
}
</style>
