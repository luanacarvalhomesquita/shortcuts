<template>
    <!-- Error Message -->
    <div v-if="form.errors.email" class="bg-red-100 shadow-sm rounded-sm flex p-2 w-full mb-10">
        <div class="input-error">{{ form.errors.email }}</div>
    </div>

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
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import Title from '@/Components/Title.vue'

const form = useForm({
    email: null,
    password: null,
})

const login = () => form.post('/login')

const isOpenDialogForgotPassword = ref(false)
const changeDialogForgotPassword = () => !isOpenDialogForgotPassword.value
</script>

<script>
import LoginLayout from '@/Layouts/LoginLayout.vue'
import { ref } from 'vue'

export default {
    layout: LoginLayout,
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


