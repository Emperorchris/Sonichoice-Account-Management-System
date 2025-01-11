<script setup>

defineProps({
    date: {
        type: String,
        required: true,
    }
})
function formatDate(date) {
    return new Intl.DateTimeFormat("en-US", {
        day: "2-digit",
        month: "short",
        year: "numeric",
    }).format(new Date(date));
}
</script>

<template>
    <span>{{ formatDate(date) }}</span>
</template>
