<template>
    <Dialog>
        <div class="flex flex-col h-full">
            <!-- Button Close -->
            <div class="h-1/6  justify-end flex">
                <a @click="methodCloseModal" class="p-2 shadow-sm cursor-pointer" type="submit" href="#">
                    <img src="/icons/times.svg" alt="Clear" class="h-5"/>
                </a>
            </div>

            <div>
                <!-- Success Message -->
                <box-text
                    v-if="showMessageSendMail"
                    :isSuccess="true"
                    text="Um e-mail de recuperação será enviado se o endereço informado estiver cadastrado."
                />
                
                <!-- Title -->
                <Title titleName="Esqueci Minha Senha" />

                <!-- Form New User -->
                <div class="w-full flex items-center">
                    <form @submit.prevent="forgotPassword" class="w-full" id="form">
                        <div class="mt-5">
                            <label for="email" class="label">Email</label>
                            <input type="email" id="email" class="input" v-model="email" required />
                        </div>

                        <!-- Button Send Email -->
                        <div class="flex items-start justify-start mt-4">
                            <button class="border border-primary hover:border-primary_600 p-2 shadow-sm w-full mt-2 cursor-pointer" type="submit" href="#">
                                <span class="inline-block w-full text-center"><span class="text-primary">ENVIAR EMAIL</span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </Dialog>
</template>

<script setup>
import Dialog from '@/Components/Dialog.vue';
import Title from '@/Components/Title.vue';
import BoxText from '@/Components/BoxText.vue';
import axios from 'axios';
import { ref } from 'vue'

const props = defineProps({
    methodCloseModal: Function
})

const email = ref()
const showMessageSendMail = ref(false)

const forgotPassword = () => {
    axios.post('/forgot-password', { email: email.value})
    showMessageSendMail.value = true
};
</script>

<script>
import DialogLayout from '@/Layouts/DialogLayout.vue'

export default {
    layout: DialogLayout,
    mounted() {
        document.title = "Esqueci Minha Senha - Atalhos";
    }
}
</script>

<style>
.title-login {
    font-size: 2rem;
    margin-bottom: 1rem;
}
</style>
