<template>
    <div class="flex justify-center mt-5">
        <h3 class="text-secondary dark:text-secondary_100 title-login mt-5">{{ titleName }}</h3>
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
