<template>
    <MainLayout :isMain="true">
        <div class="relative">
            <!-- Filter to search shortcuts -->
            <form @submit.prevent="filter" class="min-w-full grid items-end grid-cols-12 mb-2">
                <div class="col-span-11 lg:col-span-11">
                    <text-field :valueText="form.text_filter" :updateValue="updateTextFilter" :clearMethod="clearFilter" />
                </div>

                <div class="col-span-1 lg:col-span-1 justify-center flex items-center h-full">
                    <button-basic iconName="search" iconAlt="Search" iconClass="icon-sm"/>
                </div>
            </form>

            <!-- Total -->
            <div v-if="shortcuts.total != 0" class="py-1 my-4  border-l-2 border-primary pl-2">
                <span class="text-gray-600 text-xs"> {{ formattedTotal() }}</span>
            </div>

            <!-- Shorcuts -->
            <div v-if="shortcuts.total > 0">
                <div class="mb-2 flex flex-wrap">
                    <box
                        v-for="(item, index) in shortcuts.data"
                        :key="index"
                        :item="item"
                        imagePath="/icons/image-default.png"
                        altName="Icone Presentation"
                        title="item.title"
                    />
                </div>
                <div class="flex">
                    <pagination-custom
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
        </div>
    </MainLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Box from '@/Components/Box.vue';
import ButtonBasic from '@/Components/ButtonBasic.vue';
import PaginationCustom from '@/Components/PaginationCustom.vue';
import TextField from '@/Components/TextField.vue';
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
    page_size: props.filters.page_size ?? 16,
    page_number: props.filters.page_number ?? 1,
})

const filter = () => form.get('/shortcut')

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

const formattedTotal = () => {
    if(props.shortcuts.total > 1) {
        return `Resultado: ${props.shortcuts.total} atalhos encontrados.`
    }
    return `Resultado: Apenas ${props.shortcuts.total} atalho foi encontrado.`
}
</script>

<script>
export default {
    mounted() {
        document.title = 'Meus Atalhos - Atalhos';
    }
}
</script>

<style scoped>
.infront {
    z-index: 9999;
}
</style>
