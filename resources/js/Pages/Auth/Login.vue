<template>
<div class="w-full h-screen flex flex-col ">
    <div class="flex items-end h-1/3 mb-5">
        <h1 class="text-secondary  dark:text-secondary_100 title-login">Entrar</h1>
    </div>
    <div class="w-full flex items-center h-1/3">
        <form @submit.prevent="login" class="w-full">
            <div>
                <label for="email" class="label">Email</label>
                <input type="text" id="email" class="input" v-model="form.email" required/>
                <div class="input-error">Erros</div>
            </div>
            <div>
                <label for="password" class="label">Senha</label>
                <input type="password" id="password" class="input" v-model="form.password" required/>
                <div class="input-error">Erros</div>
            </div>
            <div>
                <button class="btn-primary w-1/2" type="submit">
                    ENTRAR
                </button>
            </div>
        </form>
    </div>
    <div class="flex items-end justify-center h-1/3">
        <button class="btn-secondary w-full mb-5" type="submit">
            CADASTRE-SE
        </button>
    </div>
</div>
</template>


<script setup>
import { useForm } from '@inertiajs/vue3'

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
}
</script>

<style>
.title-login {
    font-size: 2rem;
    margin-bottom: 1rem;
}
</style>


