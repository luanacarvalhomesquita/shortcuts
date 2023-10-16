<template>
<div class="w-full h-screen flex flex-col ">
    <div class="flex items-end h-1/3 mb-5">
        <h1 class="text-secondary  dark:text-secondary_100 title-login">Entrar</h1>
    </div>
    <div class="w-full flex items-center h-1/3">
        <form @submit.prevent="login" class="w-full">
            <div class="mt-5">
                <label for="email" class="label">Email</label>
                <input type="text" id="email" class="input" v-model="form.email" required/>
                <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>
            <div class="mt-5">
                <label for="password" class="label">Senha</label>
                <input type="password" id="password" class="input" v-model="form.password" required/>
                <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
            <div class="flex justify-end underline">
               <Link><span class="text-sm">Esqueci minha senha</span></Link>
            </div>
            <div class="flex items-end justify-start h-1/3">
                <button class="btn-primary w-1/2 mt-5" type="submit">
                    ENTRAR
                </button>
            </div>
        </form>
    </div>
    <div class="flex items-end w-full justify-center h-1/3">
        <button class="btn-secondary w-full mb-5" type="submit">
            CADASTRE-SE
        </button>
    </div>
</div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
    email: null,
    password: null,
})

const login = () => form.post('/login')
</script>

<script>
import LoginLayout from '@/Layouts/LoginLayout.vue'

export default {
    layout: LoginLayout,
    mounted() {
        document.title = 'Login - Atalhos';
    }
}
</script>

<style>
.title-login {
    font-size: 2rem;
    margin-bottom: 1rem;
}
</style>


