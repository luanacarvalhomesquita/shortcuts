<template>
    <div class="flex items-center justify-center h-screen">
        <div class="lg:w-4/6 w-2/4 bg-white dark:bg-gray-800 flex items-center justify-center h-screen lg:p-10 p-0">
            <div>
                <h1 class="text-center title-logo text-secondary dark:text-secondary_100 lg:p-10 p-0">ATALHOS</h1>
                <img src="/icons/presentation.svg" alt="Icone Presentation" class="icon-presentation"/>
            </div>
        </div>
        <div class="lg:w-2/6 w-2/4 bg-secondary_100 dark:bg-black flex items-center justify-center h-screen p-10">
            <slot/>
        </div>
    </div>
</template>

<style scoped>

.title-logo {
    font-size: 2.5rem;
    margin: 1rem;
}

.icon-presentation {
    width: 80vh;
    height: 50vh;
    margin: 1rem;
}
</style>
