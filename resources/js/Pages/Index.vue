<template>
  <div>
    <form @submit.prevent="filter" class="w-full grid items-end grid-cols-12">
        <div class="col-span-10 lg:col-span-11">
            <input type="text" id="text-filter" placeholder="O que você está procurando?" class="input" v-model="form.text_filter" required/>
        </div>

        <div class="col-span-2 lg:col-span-1">
            <button class="btn-primary  mt-5 items-center block w-full " type="submit">
              <div class="flex pt-1">
                <Icon className="icon-sm" imagePath="/icons/search.svg" altName="Icone Presentation" />
                <span class="pl-2 text-sm text-secondary_100">Procurar</span>
              </div>
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
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Icon from '@/Components/Icon.vue';
import Box from '@/Components/Box.vue';

const props = defineProps({
    shortcuts: Object
})

const form = useForm({
    text_filter: null,
    page_size: 10,
    page_number: 1,
})


const filter = () => form.get('/shortcut')
</script>

<style scoped>

</style>
