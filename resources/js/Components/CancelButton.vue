<script setup>
defineProps({
    url: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <a :href="route(url)"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <slot />
    </a>
</template>
