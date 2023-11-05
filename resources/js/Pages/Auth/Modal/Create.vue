<template>
    <Dialog title="Atalhos - Cadastre-se">
        <div class="flex flex-col h-full">
            <div class="h-1/6  justify-end flex">
                <a @click="methodCloseModal" class="p-2 shadow-sm cursor-pointer" type="submit" href="#">
                    <img src="/icons/times.svg" alt="Clear" class="h-5"/>
                </a>
            </div>
            <div class="h-5/6">
                <!-- Title -->
                <Title titleName="Cadastre-se" />

                <!-- Form New User -->
                <div class="w-full flex items-center">
                    <form @submit.prevent="createAccount" class="w-full">
                        <div class="mt-5">
                            <label for="name" class="label">Nome</label>
                            <input type="text" id="name" class="input" v-model="form.name" required />
                            <div class="input-error" v-if="form.errors.name">{{ form.errors.name }}</div>
                        </div>
                        <div class="mt-5">
                            <label for="email" class="label">Email</label>
                            <input type="text" id="email" class="input" v-model="form.email" required />
                            <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
                        </div>
                        <div class="mt-5">
                            <label for="password" class="label">Senha</label>
                            <input type="password" id="password" class="input" v-model="form.password" required />
                            <div class="input-error" v-if="form.errors.password">{{ form.errors.password }}</div>
                        </div>
                        <div class="mt-5">
                            <label for="password_confirmation" class="label">Confirmação de Senha</label>
                            <input type="password" id="password_confirmation" class="input" v-model="form.password_confirmation" required />
                            <div class="input-error" v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</div>
                            <div class="input-error" v-if="samePasswords">As senhas não coincidem</div>
                        </div>
                        <div class="flex items-end justify-start h-1/3 mt-4">
                            <button class="btn-primary w-full mt-5" type="submit">
                                <span class="inline-block w-full text-center">CRIAR CONTA</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex items-start justify-start h-1/6">
                <a @click="methodCloseModal" class="border border-primary hover:border-primary_600 p-2 shadow-sm w-full mt-2 cursor-pointer" type="submit" href="#">
                    <span class="inline-block w-full text-center"><span class="text-primary">JÁ TENHO CONTA</span></span>
                </a>
            </div>
        </div>
    </Dialog>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Dialog from '@/Components/Dialog.vue';
import Title from '@/Components/Title.vue';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

defineProps({
    methodCloseModal: Function
})

ref(form.password)
ref(form.password_confirmation)
const samePasswords = computed(() => (form.password_confirmation != null) && (form.password !== form.password_confirmation))
const createAccount = () => form.post('/register')

</script>

<script>
import DialogLayout from '@/Layouts/DialogLayout.vue'
import { computed, ref } from 'vue'

export default {
    layout: DialogLayout,
    mounted() {
        document.title = 'Cadastre-se - Atalhos';
    }
}
</script>

<style>
.title-login {
    font-size: 2rem;
    margin-bottom: 1rem;
}
</style>
