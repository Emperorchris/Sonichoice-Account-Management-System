<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div>
        <center>
            <div
                v-if="$page.props.flash.error"
                class="bg-red-700 px-3 py-2 rounded-lg"
            >
                <h2 class="text-lg font-semibold leading-tight text-white">
                    <!-- {{ $page.props.flash.error }} -->
                    {{ message }}
                </h2>
            </div>
            <div
                v-if="$page.props.flash.success"
                class="bg-green-700 px-3 py-2 rounded-lg mt-4"
            >
                <h2 class="text-lg font-semibold leading-tight text-white">
                    <!-- {{ $page.props.flash.success }} -->
                    {{ message }}
                </h2>
            </div>
        </center>
    </div>
</template>
