<template>
    <login-layout :openModalForgotPassword="openModalForgotPassword" :changeDialogForgotPassword="changeDialogForgotPassword">
        <!-- Error Message -->
        <box-text
            v-if="form.errors.email"
            :isSuccess="false"
            :text="form.errors.email"
        />

        <!-- Title -->
        <Title titleName="Login" />

        <!-- Form Login -->
        <div class="w-full flex items-center">
            <form @submit.prevent="login" class="w-full">
                <!-- Auth Fields -->
                <div class="mt-5">
                    <label for="email" class="label">Email</label>
                    <input type="text" id="email" class="input" v-model="form.email" required/>
                </div>
                <div class="mt-5">
                    <label for="password" class="label">Senha</label>
                    <input type="password" id="password" class="input" v-model="form.password" required/>
                </div>

                <!-- Forgot password -->
                <div class="flex justify-end underline">
                    <div @click="changeDialogForgotPassword" class="cursor-pointer ">
                        <span class="text-xs text-red-400 hover:text-red-500">Esqueci minha senha</span>
                    </div>
                </div>

                <!-- Button Login -->
                <button class="btn-primary justify-center inline-block w-full text-center cursor-pointer mt-5 items-end h-1/3" type="submit">
                    ENTRAR
                </button>
            </form>
        </div>
    </login-layout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Title from '@/Components/Title.vue'
import LoginLayout from '@/Layouts/LoginLayout.vue'
import BoxText from '@/Components/BoxText.vue';

const form = useForm({
    email: null,
    password: null,
})

const login = () => form.post('/login')

const openModalForgotPassword = ref(false)
const changeDialogForgotPassword = () => {
    openModalForgotPassword.value = !openModalForgotPassword.value
}
</script>

<script>
import { ref } from 'vue'

export default {
    mounted() {
        document.title = 'Entrar - Atalhos';
    }
}
</script>

<style>
.title-login {
    font-size: 2rem;
    margin-bottom: 1rem;
}
</style>


