<script setup>
const currentYear = new Date().getFullYear();
</script>
<template>
    <div class="mt-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-3">
            <div
                class="overflow-hidden bg-white shadow-sm dark:bg-gray-800"
            >
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    &copy; All Rights Reserved {{ currentYear }}, Sonichoice
                    logistics Services
                </div>
            </div>
        </div>
    </div>
</template>
