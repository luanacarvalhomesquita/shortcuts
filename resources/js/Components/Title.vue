<template>
    <div class="flex justify-center mt-5">
        <span class="text-secondary dark:text-secondary_100 mt-5 text-2xl font-medium pb-10">{{ titleName }}</span>
    </div>
</template>

<script>
export default {
    name: 'Title',
    props: {
        titleName: {
            type: String,
            required: true
        },
    }
}
</script>
