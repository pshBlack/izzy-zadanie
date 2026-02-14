<script setup>
defineProps({
    "car": Object,
    "parts": Object,
})
import Layout from '../../Layouts/Main.vue'
defineOptions({ layout: Layout })
</script>

<template>
    <div>{{ car }}</div>
    <div>{{ parts }}</div>

</template>
<style lang="css" scoped></style>