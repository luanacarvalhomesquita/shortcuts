<template>
    <!-- Auth -->
    <div v-if="isAuth" class="bg-primary dark:bg-gray-800 p-1 justify-between flex px-4">
        <div></div>
        <div>
            <Link class="text-lg text-secondary_100" href="/">ATALHOS</Link>
        </div>
        <div class="flex">
            <Link href="/logout" method="DELETE" as="button" class="flex items-center">
                <img src="/icons/logout.svg" alt="Icone Presentation" class="icon-sm"/>
            </Link>
        </div>
    </div>

    <!-- No Auth -->
    <div v-else class="bg-primary dark:bg-gray-800 p-1 justify-between flex px-4">
        <div></div>
        <div>
            <Link class="text-lg text-secondary_100" href="/">ATALHOS</Link>
        </div>
        <div class="flex">
            <Link href="/login" method="DELETE" as="button" class="flex items-center">
                Login
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';

defineProps({
    isAuth: {
        type: Boolean,
        required: true,
    }
})
const page = usePage();
const user = computed(() => page.props.user);

</script>
