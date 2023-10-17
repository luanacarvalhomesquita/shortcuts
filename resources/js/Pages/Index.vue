<template>
    <MainLayout title="Atalhos" :isMain="true">
        <form @submit.prevent="filter" class="min-w-full grid items-end grid-cols-12">
            <div class="col-span-10 lg:col-span-11">
                <input type="text" id="text-filter" placeholder="O que você está procurando?" class="input" v-model="form.text_filter" required/>
            </div>

            <div class="col-span-2 lg:col-span-1">
                <button class="btn-primary  mt-5 items-center block w-full " type="submit">
                <div class="flex pt-1">
                    <div class="flex justify-center items-center">
                        <img src="/icons/search.svg" alt="Search" class="icon-sm"/>
                    </div>
                    <span class="pl-2 text-sm text-secondary_100 dark:text-secondary">Procurar</span>
                </div>
                </button>
            </div>
            <div v-if="form.text_filter" class="cursor-pointer">
                <button @click="clear" class="underline text-sm py-2 text-secondary_600">
                    Limpar pesquisa
                </button>
            </div>
        </form>

        <div class="my-2 flex flex-wrap">
            <Box
                v-for="(item, index) in shortcuts.data"
                :key="index"
                :item="item"
                imagePath="/icons/image-default.png"
                altName="Icone Presentation"
                title="item.title"
            />
        </div>
    </MainLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Box from '@/Components/Box.vue';
import MainLayout from '@/Layouts/MainLayout.vue'

const props = defineProps({
    shortcuts: Object
})

const form = useForm({
    text_filter: null,
    page_size: 10,
    page_number: 1,
})

const filter = () => form.get('/')

const clear = () => {
    form.text_filter = ''
    filter();
}
</script>
