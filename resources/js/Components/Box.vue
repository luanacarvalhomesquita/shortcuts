<template>
    <div class="lg:w-1/4 md:w-1/2 w-full my-2">
        <div :style="{ borderColor: item.color}" class="flex p-4 shadow-sm shadow-secondary_300 border-l-8 h-full">
            <div class="shortcut-actions w-full text-md ml-2">
                <div class="h-3/4" >
                    <h3 class="sm:text-2xl lg:text-sm md:text-sm">{{ formatTitle(item.title) }}</h3>
                </div>
                <div class="h-1/4 flex justify-between items-center">
                    <a :href="item.link" target="_blank" class="w-1/2 bg-primary dark:bg-gray-800 hover:bg-gray-700 shadow shadow-secondary_300 p-4 mr-1 h-full flex items-center justify-center rounded-sm">
                        <div class="flex justify-center items-center">
                            <span class="flex p-2 justify-center items-center text-secondary_100 text-sm sm:hidden">Ir para</span>
                            <img src="/icons/go_to.svg" alt="Ir para" class="icon-button"/>
                        </div>
                    </a>
                    <a :href="`/shortcut/${item.id}`" class="w-1/2 shadow shadow-secondary_300 p-4 h-full flex items-center justify-center rounded-sm cursor-pointer hover:shadow-secondary_600">
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
    methods: {
        formatTitle(title) {
            return title.length > 100 ? title.slice(0, 100) + '...' : title.toUpperCase()
        }
    }
};


</script>

<style scoped>
.icon-button {
    width: 10px;
    height: 20px;
}
</style>
