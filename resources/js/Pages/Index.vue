<template>
    <MainLayout title="Atalhos" :isMain="true">
        <form @submit.prevent="filter" class="min-w-full grid items-end grid-cols-12">
            <div class="col-span-11 lg:col-span-11">
                <input type="text" id="text-filter" placeholder="O que você está procurando?" class="input w-full" v-model="form.text_filter" required/>
            </div>

            <div class="col-span-1 lg:col-span-1 justify-center flex items-center">
                <button class="btn-primary dark:bg-black justify-center flex items-center w-full" type="submit">
                    <div class="flex pt-1">
                        <div class="flex justify-center items-center">
                            <img src="/icons/search.svg" alt="Search" class="icon-sm"/>
                        </div>
                    </div>
                </button>
            </div>
        </form>
        <div v-if="form.text_filter" class="cursor-pointer">
            <button @click="clear" class=" underline text-sm py-2 text-secondary_600">
                Limpar pesquisa
            </button>
        </div>

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
        <div class="mt-10 bottom-0 mb-2 shadow-sm shadow-secondary_300 p-2 flex justify-center">
            <vue3-tailwind-pagination
                :total="shortcuts.total"
                :per_page="shortcuts.per_page"
                :current_page="shortcuts.current_page"
                :prev_text="'&laquo; Previous'"
                :next_text="'Next &raquo;'"
                @change="change"
                color="text-secondary"
                active_background="bg-primary_600"
            />
        </div>

        <div class="fixed bottom-0 left-2 right-2 flex justify-end items-end p-4">
            <a href="/shortcut/create" method="GET" class="btn-primary items-center block rounded-full p-4 cursor-pointer" type="submit">
                <div class="flex">
                    <div class="flex justify-center items-center">
                        <img src="/icons/new.svg" alt="Search" class="h-8"/>
                    </div>
                </div>
            </a>
        </div>
    </MainLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Box from '@/Components/Box.vue';
import MainLayout from '@/Layouts/MainLayout.vue'

const props = defineProps({
    shortcuts: Object,
    filters: Object,
})

const form = useForm({
    text_filter: props.filters.text_filter ?? null,
    page_size: props.filters.page_size ?? 12,
    page_number: props.filters.page_number ?? 1,
})

const filter = () => form.get('/shortcut')

const clear = () => {
    form.text_filter = ''
    filter();
}

const change = (pageNumber) => {
  form.page_number = pageNumber;
  filter();
};

</script>
