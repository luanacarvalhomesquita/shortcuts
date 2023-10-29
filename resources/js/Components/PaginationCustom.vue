<template>
    <ul class="flex list-reset border border-grey-light rounded w-auto font-sans">
        <li v-if="currentPage > 1">
            <div class="cursor-pointer block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2"
                @click="change(currentPage -1)"
            >
                Anterior
            </div>
        </li>
        <li v-for="page in pages" :key="page" >
            <div :class="[page == currentPage ? ' bg-primary text-white bg-blue border-r border-blue':'hover:text-white hover:bg-blue text-blue border-r border-grey-light', 'block px-3 py-2 cursor-pointer']"
               href="#"
               @click="change(page)"
            >
                {{ page }}
            </div>
        </li>
        <li v-if="currentPage < lastPage">
            <div class="cursor-pointer block hover:text-white hover:bg-blue text-blue px-3 py-2"
               href="#"
               @click="change(currentPage + 1)"
            >
                Próximo
            </div>
        </li>
    </ul>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    currentPage: {
        type: Number,
        required: true
    },
    to: {
        type: Number,
        required: true
    },
    lastPage: {
        type: Number,
        required: true
    },
    offset: {
        type: Number,
        default: 4
    },
    change: {
        type: Function,
        required: true
    }
});

const pages = computed(() => {
    if (!props.to) {
        return null;
    }
    let from = props.currentPage - props.offset;
    if (from < 1) {
        from = 1;
    }
    let to = from + (props.offset * 2);
    if (to >= props.lastPage) {
        to = props.lastPage;
    }
    let pages = [];
    for (let page = from; page <= to; page++) {
        pages.push(page);
    }
    return pages;
});
</script>
