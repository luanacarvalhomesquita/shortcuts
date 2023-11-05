<template>
    <a :href="urlNewItem" :method="methodUrlNewItem" class="fixed bottom-4 right-4" type="submit">
        <div class=" bg-primary items-center rounded-full p-4 cursor-pointer dark:bg-gray-800 hover:dark:bg-gray-700 shadow shadow-gray-500 hover:shadow-gray-700">
            <img :src="`/icons/${iconName}.svg`" :alt="iconAlt" :class="iconClass"/>
        </div>
    </a>
</template>

<script>
export default {
  name: 'ButtonNewItem',
  props: {
    iconName: {
      type: String,
      required: true
    },
    urlNewItem: {
      type: String,
      required: true
    },
    methodUrlNewItem: {
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
