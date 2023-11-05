<template>
    <PublicLayout>
        <div class="relative">
            <!-- Filter to serach shortcuts -->
            <form @submit.prevent="filter" class="min-w-full grid items-end grid-cols-12">
                <div class="col-span-11 lg:col-span-11">
                    <text-field :valueText="form.text_filter" :updateValue="updateTextFilter" :clearMethod="clearFilter" />
                </div>

                <div class="col-span-1 lg:col-span-1 justify-center flex items-center h-full">
                    <button-basic iconName="search" iconAlt="Search" iconClass="icon-sm"/>
                </div>
            </form>

            <!-- Total -->
            <div class="py-1 my-4  border-l-2 border-primary pl-2">
                <span class="text-gray-600 text-xs">Total: {{ shortcuts.total }} atalho(s) encontrado(s)</span>
            </div>

            <!-- Shorcuts -->
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

            <!-- When Empty-->
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
    </PublicLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Box from '@/Components/Box.vue';
import PaginationCustom from '@/Components/PaginationCustom.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue'
import ButtonBasic from '@/Components/ButtonBasic.vue';
import TextField from '@/Components/TextField.vue';

const props = defineProps({
    shortcuts: Object,
    filters: {
        type: Object,
        default: () => ({})
    }
})
const form = useForm({
    hash: props.filters.hash,
    text_filter: props.filters.text_filter ?? null,
    page_size: props.filters.page_size ?? 16,
    page_number: props.filters.page_number ?? 1,
})

const filter = () => form.get('/shortcut/share')

const clearFilter = () => {
    form.text_filter = null;
    filter();
}

const updateTextFilter = (event) => {
    form.text_filter = event.target.value
}

const change = (pageNumber) => {
  form.page_number = pageNumber;
  filter();
};

</script>

<script>
export default {
    mounted() {
        document.title = 'Atalhos Compartilhados - Atalhos';
    }
}
</script>

<style scoped>
.infront {
    z-index: 9999;
}
</style>
