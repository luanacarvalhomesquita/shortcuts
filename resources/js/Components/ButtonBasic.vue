<template>
    <button class="btn-primary dark:bg-gray-800 dark:hover:dark:bg-gray-700 justify-center content-center flex items-center w-full h-full rounded-r-sm" type="submit">
        <div class="flex">
            <div class="flex justify-center items-center">
                <img :src="`/icons/${iconName}.svg`" :alt="iconAlt" :class="iconClass"/>
            </div>
        </div>
    </button>
</template>

<script>
export default {
  name: 'ButtonBasic',
  props: {
    iconName: {
      type: String,
      required: true
    },
    iconAlt: {
      type: String,
      default: 'Icon'
    },
    iconClass: {
      type: String,
      default: 'icon-sm'
    }
  }
}
</script>
