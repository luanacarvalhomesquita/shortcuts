<template>
    <div class="flex items-center justify-center h-screen">
        <div class="lg:w-4/6 w-2/4 bg-white dark:bg-gray-800 flex items-center justify-center h-screen lg:p-10 p-0">
            <div>
                <h1 class="text-center title-logo text-secondary dark:text-secondary_100 lg:p-10 p-0">ATALHOS</h1>
                <Icon className="icon-presentation" imagePath="/icons/presentation.svg" altName="Icone Presentation" />
            </div>
        </div>
        <div class="lg:w-2/6 w-2/4 bg-secondary_100 dark:bg-black flex items-center justify-center h-screen p-10">
            <slot/>
        </div>
    </div>
</template>

<script setup>
import Icon from '@/Components/Icon.vue';

</script>

<style>
.title-logo {
    font-size: 2.5rem;
    margin: 1rem;
}
</style>

