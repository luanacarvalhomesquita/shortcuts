<template>
    <Dialog>
        <div class="flex flex-col ">
            <div class="h-1/6  justify-end flex">
                <a @click="closeDialog" class="p-2 shadow-sm cursor-pointer" type="submit" href="#">
                    <img src="/icons/times.svg" alt="Clear" class="h-5"/>
                </a>
            </div>
            <div class="h-5/6">
                <!-- Title -->
                <Title titleName="Compartilhe" />

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
                    <button
                        @click="copyToClipboard"
                        class="btn-primary justify-center inline-block md:w-1/2 lg:w-1/4 w-full text-center cursor-pointer mt-5 items-end h-1/3 mr-2"
                        type="submit"
                    >
                        {{ textButtonCopy }}
                    </button>
                    <button @click="closeDialog" class="border border-primary hover:border-primary_600 text-primary p-2 justify-center  inline-block md:w-1/2 lg:w-1/4 w-full text-center cursor-pointer mt-5 items-end h-1/3 mr-2" type="submit">
                        FECHAR
                    </button>
                </div>
            </div>
        </div>
    </Dialog>
</template>

<script setup>
import Dialog from '@/Components/Dialog.vue';
import Title from '@/Components/Title.vue';
import { usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue';

const props = defineProps({
    methodChangeModal: {
        type: Function,
        required: true
    }
})

const page = usePage();
const user = computed(() => page.props.user);
const baseUrl = computed(() => page.props.base_url);

const formattedLinkToShare = `${baseUrl.value}/shortcut/share?hash=${user.value.hash_share}`;
const textButtonCopy = ref("COPIAR");

const isDialogOpen = ref(false);
const closeDialog = () => {
    props.methodChangeModal()
    textButtonCopy.value = "COPIAR";
}

// Copy url
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

<script>
import DialogLayout from '@/Layouts/DialogLayout.vue'
import { ref } from 'vue';

export default {
    layout: DialogLayout,
    mounted() {
        document.title = 'Compartilhe - Atalhos';
    }
}
</script>

<style>
.title-login {
    font-size: 2rem;
    margin-bottom: 1rem;
}
</style>
