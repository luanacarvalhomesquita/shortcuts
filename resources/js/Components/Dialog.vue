<template>
    <div class="inset-0 flex items-center justify-center bg-opacity-25 bg-gray-50  z-40">
      <div class="absolute inset-0 flex items-center justify-center ">
        <div class="bg-white mx-4 sm:mx-auto sm:w-11/12 md:w-3/4 lg:w-1/2 xl:w-2/5 p-6 rounded-lg shadow-md border dark:border-gray-700 shadow-gray-400 dark:shadow-gray-900 dark:bg-gray-800">
          <slot>Default content</slot>
        </div>
      </div>
    </div>
  </template>
<script>
export default {
  name: 'Dialog'
}
</script>
