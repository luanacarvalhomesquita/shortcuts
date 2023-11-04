<template>
    <MainLayout title="Atalhos" :isMain="true">
        <div class="relative">
            <form @submit.prevent="filter" class="min-w-full grid items-end grid-cols-12">
                <div class="col-span-11 lg:col-span-11">
                    <input type="text" id="text-filter" placeholder="O que você está procurando?" class="input w-full" v-model="form.text_filter" required/>
                </div>

                <div class="col-span-1 lg:col-span-1 justify-center flex items-center">
                    <button class="btn-primary dark:bg-gray-800 dark:hover:dark:bg-gray-700 justify-center flex items-center w-full rounded-r-sm" type="submit">
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
            <div v-if="shortcuts.total > 0">
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
                <div class="flex">
                    <PaginationCustom
                        :currentPage="shortcuts.current_page"
                        :to="shortcuts.to"
                        :lastPage="shortcuts.last_page"
                        :change="change"
                        :onePage="shortcuts.total <= shortcuts.per_page"
                    />
                </div>
            </div>
            <div v-else class="py-5">
                <span class="text-gray-400">Não há nenhum atalho para exibir.</span>
            </div>
            <div >
                <a href="/shortcut/create" method="GET" class="fixed bottom-4 right-4" type="submit">
                <div class=" bg-primary items-center rounded-full p-4 cursor-pointer dark:bg-gray-800 hover:dark:bg-gray-700 shadow shadow-gray-500 hover:shadow-gray-700">
                    <img src="/icons/new.svg" alt="Search" class="h-8"/>
                </div>
                </a>
            </div>
        </div>
        
    </MainLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Box from '@/Components/Box.vue';
import PaginationCustom from '@/Components/PaginationCustom.vue';
import MainLayout from '@/Layouts/MainLayout.vue'

const props = defineProps({
    shortcuts: Object,
    filters: {
        type: Object,
        default: () => ({})
    }
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
    console.log('opa')
  form.page_number = pageNumber;
  filter();
};

</script>

<style scoped>
.infront {
    z-index: 9999;
}
</style>
