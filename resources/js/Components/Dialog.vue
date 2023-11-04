<template>
    <div class="fixed inset-0 flex items-center justify-center bg-opacity-50 bg-gray-50 z-40">
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="bg-white w-1/2 p-6 rounded-lg shadow-lg">
                <slot>Default </slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'Dialog'
}
</script>
