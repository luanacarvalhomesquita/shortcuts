<template>
    <MainLayout title="Atalhos" :isMain="false">
        <div class="inline-block justify-center p-10 items-center w-full bg-gray-100 dark:bg-gray-700 mt-10">
            <div class="flex justify-center h-full items-center">
                <span class="text-gray-700">
                    Ops!
                    Você não tem acesso a este atalho.
                </span>
            </div>
            <div class="flex justify-center p-10 h-full items-center">
                <img src="/icons/no_access.svg" alt="Ver notas" class="icon-no-access"/>
            </div>
            <div class="flex justify-center pb-10 h-full items-center">
                <div class="w-1/3">
                    <a class="border border-primary hover:border-primary_600 p-2 shadow-sm w-full mt-5 cursor-pointer" type="submit" href="/shortcut">
                        <span class="inline-block w-full text-center"><span class="text-primary">TELA INICIAL</span></span>
                    </a>
                </div>
            </div>
        </div>

    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'

</script>


<style coped>
.icon-no-access {
    width: 5rem;
    height: 5rem;
}
</style>
