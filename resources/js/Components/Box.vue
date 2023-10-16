<template>
<div class="my-1 lg:w-1/4 md:w-1/3 sm:w-full">
    <div class="flex p-4 shadow-sm shadow-secondary_300 m-2">
        <div class="shortcut-img lg:w-1/3 sm:w-full">
            <img :src="imagePath" :alt="altName" class="w-full h-full object-cover rounded-sm"/>
        </div>
        <div class="shortcut-actions lg:w-2/3 sm:w-full text-md ml-2">
            <div class="h-1/2">
                <h3>{{ item.title }}</h3>
            </div>
            <div class="h-1/2 flex justify-between items-center">
                <Link :href="item.link" class="w-1/2 bg-primary shadow shadow-secondary_300 p-1 mr-1 h-full flex items-center justify-center rounded-sm">
                    <Icon className="icon-button" imagePath="/icons/go_to.svg" altName="Ir para" />
                </Link>
                <Link :href="`/shortcut/${item.id}`" class="w-1/2 shadow shadow-secondary_300 p-1 h-full flex items-center justify-center rounded-sm ">
                    <Icon className="icon-button" imagePath="/icons/note.svg" altName="Ver notas" />
                </Link>
            </div>
        </div>
    </div>
</div>
</template>


<script>
import { Link } from '@inertiajs/vue3';
import Icon from './Icon.vue';
export default {
  components: { Icon, Link },
    props: {
        imagePath: {
            type: String,
            required: true,
        },
        altName: {
            type: String,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
        item: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style scoped>
.shortcut-img {

}
</style>
