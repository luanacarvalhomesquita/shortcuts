<template>
    <div
        class="bg-gray-100 text-sm p-2 text-primary my-5 flex w-full"
        :class="{'text-red-400 bg-red-50' : !isSuccess}"
    >
        {{ text }}
    </div>
</template>

<script setup>
defineProps({
    text: {
        type: String,
        required: true
    },
    isSuccess: {
        type: Boolean,
        required: true
    }
})
</script>
