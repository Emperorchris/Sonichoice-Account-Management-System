<template>
    <header class="bg-white shadow dark:bg-gray-800" v-if="$slots.header">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <slot name="header" />
        </div>
    </header>
</template>
