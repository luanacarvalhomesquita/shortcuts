<template>
<div class="my-1 lg:w-1/4 md:w-1/2 w-full">
    <div class="flex p-4 shadow-sm shadow-secondary_300 m-2">
        <div class="shortcut-img lg:w-1/3 sm:w-full">
            <img :src="imagePath" :alt="altName" class="w-full h-full object-cover rounded-sm"/>
        </div>
        <div class="shortcut-actions lg:w-2/3 w-full text-md ml-2">
            <div class="h-3/4">
                <h3 class="sm:text-2xl lg:text-sm md:text-sm">{{ item.title.toUpperCase() }}</h3>
            </div>
            <div class="h-1/4 flex justify-between items-center">
                <a :href="item.link" target="_blank" class="w-1/2 bg-primary shadow shadow-secondary_300 p-1 mr-1 h-full flex items-center justify-center rounded-sm">
                    <div class="flex justify-center items-center">
                        <span class="flex p-2 justify-center items-center text-secondary_100 text-sm sm:hidden">Ir para</span>
                        <img src="/icons/go_to.svg" alt="Ir para" class="icon-button"/>
                    </div>
                </a>
                <a :href="`/shortcut/${item.id}`" class="w-1/2 shadow shadow-secondary_300 p-1 h-full flex items-center justify-center rounded-sm cursor-pointer hover:shadow-secondary_600">
                    <div class="flex justify-center items-center">
                        <span class="flex p-2 justify-center items-center text-sm sm:hidden">Ver notas</span>
                        <img src="/icons/note.svg" alt="Ver notas" class="icon-button"/>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</template>


<script>
export default {
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

<style coped>
.icon-button {
    width: 10px;
    height: 20px;
}

</style>
