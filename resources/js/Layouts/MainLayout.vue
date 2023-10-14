<template>
  <div>
    <Link href="/">Main Page</Link>
    <Link href="/login">Login</Link>
  </div>

  <slot>Default</slot>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

</script>
