<template>
    <div
        class="relative justify-center"
        :class="{
            'fixed inset-0 opacity-25 bg-gray-50' : openModalForgotPassword || openModalRegister,
        }"
    >
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
            </div>
        </div>
    </div>

    <!-- Dialog Register New User -->
    <div v-if="openModalRegister">
        <create :methodCloseModal="changeDialogRegister"/>
    </div>

    <!-- Dialog Forgot Password -->
    <div v-if="openModalForgotPassword">
        <forgot-password :methodCloseModal="changeDialogForgotPassword"/>
    </div>
</template>

<script setup>

import Create from '@/Pages/Auth/Modal/Create.vue'
import ForgotPassword from '@/Pages/Auth/Modal/ForgotPassword.vue'

const props = defineProps({
    openModalForgotPassword: {
        type: Boolean,
        required: true
    },
    changeDialogForgotPassword: {
        type: Function,
        required: true
    },
    openModalRegister: {
        type: Boolean,
        required: true
    },
    changeDialogRegister: {
        type: Function,
        required: true
    }
})
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
