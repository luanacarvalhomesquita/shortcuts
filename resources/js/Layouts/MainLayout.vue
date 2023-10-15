<template>
  <div>
    <Link href="/">Main Page</Link>
    <Link href="/logout" method="DELETE" as="button">Logout</Link>
  </div>
  <div class="flex" v-if="user">
    Olá, {{ user.name }}!
  </div>

  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>

  <slot>Default</slot>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue';

const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)
const user = computed(
    () => page.props.user
)
</script>


<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
