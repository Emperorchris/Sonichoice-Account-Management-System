<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PageHeading from "@/Components/PageHeading.vue";
import FormatDate from "@/Components/FormatDate.vue";
import Footer from "@/Components/Footer.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineOptions({
    layout: AuthenticatedLayout,
});

defineProps({
    entries: Object,
    today_entries: Object,
    total_entries_today: String,
    total_entries_this_month: String,
    total_entries_this_year: String,
    total_entries: String,
    total_delivery_charge: String,
    total_amount_today: String,
    total_delivery_charge: String,
    total_merchant_balance: String,
    total_cash: String,
    total_transfer: String,
});

const form = useForm({});

const deleteRecord = (id) => {
    if (confirm("Are you sure you want to delete this record?")) {
        form.delete(route("entry.destroy", id));
    }
};
</script>

<template>
    <Head title="Dashboard" />

    <PageHeading>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Sonichoice Account Management System
            </h2>
        </template>
    </PageHeading>

    <div class="flex sm:mt-6 flex-wrap flex-col md:flex-row justify-center">
        <div class="py-2 w-full md:w-auto">
            <div class="mx-auto min-w-[250px] max-w-full px-6 lg:px-3">
                <div
                    class="flex items-center justify-center overflow-hidden bg-white shadow-sm rounded-lg dark:bg-gray-800 h-32"
                >
                    <div
                        class="p-5 flex flex-col items-center justify-center text-gray-900 dark:text-gray-100"
                    >
                        <p class="font-bold text-lg">Total Records For Today</p>
                        <p
                            class="font-bold text-2xl text-gray-600 dark:text-gray-400"
                        >
                            {{ total_entries_today ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2 w-full md:w-auto">
            <div class="mx-auto min-w-[250px] max-w-full px-6 lg:px-3">
                <div
                    class="flex items-center justify-center overflow-hidden bg-white shadow-sm rounded-lg dark:bg-gray-800 h-32"
                >
                    <div
                        class="p-5 flex flex-col items-center justify-center text-gray-900 dark:text-gray-100"
                    >
                        <p class="font-bold text-lg">
                            Total Records Of This Month
                        </p>
                        <p
                            class="font-bold text-2xl text-gray-600 dark:text-gray-400"
                        >
                            {{ total_entries_this_month ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2 w-full md:w-auto">
            <div class="mx-auto min-w-[250px] max-w-full px-6 lg:px-3">
                <div
                    class="flex items-center justify-center overflow-hidden bg-white shadow-sm rounded-lg dark:bg-gray-800 h-32"
                >
                    <div
                        class="p-5 flex flex-col items-center justify-center text-gray-900 dark:text-gray-100"
                    >
                        <p class="font-bold text-lg">
                            Total Records For This Year
                        </p>
                        <p
                            class="font-bold text-2xl text-gray-600 dark:text-gray-400"
                        >
                            {{ total_entries_this_year ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2 w-full md:w-auto">
            <div class="mx-auto min-w-[250px] max-w-full px-6 lg:px-3">
                <div
                    class="flex items-center justify-center overflow-hidden bg-white shadow-sm rounded-lg dark:bg-gray-800 h-32"
                >
                    <div
                        class="p-5 flex flex-col items-center justify-center text-gray-900 dark:text-gray-100"
                    >
                        <p class="font-bold text-lg">Total Account Records</p>
                        <p
                            class="font-bold text-2xl text-gray-600 dark:text-gray-400"
                        >
                            {{ total_entries ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="py-2 w-full md:w-auto">
            <div class="mx-auto min-w-[250px] max-w-full px-6 lg:px-3">
                <div
                    class="flex items-center justify-center overflow-hidden bg-white shadow-sm rounded-lg dark:bg-gray-800 h-32"
                >
                    <div class="p-5 flex flex-col items-center justify-center text-gray-900 dark:text-gray-100">
                        <p class="font-bold text-lg">Total Account Records</p>
                        <p
                            class="font-bold text-2xl text-gray-600 dark:text-gray-400"
                        >
                            {{ parseFloat(total_delivery_charge).toLocaleString() ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- <div v-if="entries">hello</div> -->

    <div class="container mt-6 mx-auto p-4">
        <h1 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">
            Account Records For Today
        </h1>

        <div class="overflow-x-auto max-h-[93vh]">
            <table
                class="min-w-full border-collapse bg-gray-800 dark:bg-gray-900 shadow-md rounded-lg"
            >
                <thead class="sticky top-0 bg-gray-700 dark:bg-gray-800 z-10">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Date
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Product Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Amount Received
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Product Amount
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Tips
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Payment Method
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Delivery Charge
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Merchant Balance
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Group Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Remark
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Rider
                        </th>
                        <th
                            class="px-6 py-3 text-center text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody v-if="today_entries.data.length > 0" class="">
                    <tr
                        v-for="today_entry in today_entries.data"
                        :key="today_entry.id"
                        class="even:bg-gray-700 hover:bg-gray-600"
                    >
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            <FormatDate :date="today_entry.date" />
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ today_entry.product }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            NGN
                            {{
                                parseFloat(today_entry.amount_received).toLocaleString()
                            }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            NGN
                            {{
                                parseFloat(today_entry.amount).toLocaleString()
                            }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            NGN
                            {{
                                parseFloat(today_entry.tips ?? 0).toLocaleString()
                            }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ today_entry.payment_method }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            NGN
                            {{
                                parseFloat(
                                    today_entry.delivery_charge
                                ).toLocaleString()
                            }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            NGN
                            {{
                                parseFloat(
                                    today_entry.merchant_balance
                                ).toLocaleString()
                            }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ today_entry.group_name }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ today_entry.remark }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ today_entry.rider }}
                        </td>
                        <td class="px-6 py-4 flex text-center">
                            <Link
                                :href="route('entry.edit', today_entry.uuid)"
                                class="text-indigo-400 hover:text-indigo-500 font-medium px-2"
                            >
                                Edit
                            </Link>

                            <button
                                @click="deleteRecord(today_entry.uuid)"
                                class="text-red-400 hover:text-red-500 font-medium px-2"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else class="text-white">
                    <tr class="">
                        <td colspan="7" class="">No entries found.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div v-if="entries.data.length > 0" class="py-2 mt-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-3">
                <div
                    class="overflow-hidden bg-white shadow-sm rounded-lg dark:bg-gray-800"
                >
                    <div class="flex justify-between">
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            Total Product Amount For Today :
                        </div>
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            NGN {{ total_amount_today }}
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between">
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            Total Delivery Charge For Today:
                        </div>
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            NGN {{ total_delivery_charge }}
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between">
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            Total Merchant Balance For Today:
                        </div>
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            NGN {{ total_merchant_balance }}
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between">
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            Total Cash For Today:
                        </div>
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            NGN {{ total_cash }}
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between">
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            Total Transfer For Today:
                        </div>
                        <div class="p-3 text-gray-900 dark:text-gray-100">
                            NGN {{ total_transfer }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGINATION -->

        <div
            v-if="today_entries.links && today_entries.data.length > 0"
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-6"
        >
            <!-- Mobile Pagination -->
            <div>
                <p
                    class="sm:hidden text-xs mb-4 sm:text-sm lg:text-base text-gray-700"
                >
                    Showing
                    <span class="font-medium">{{ today_entries.from }}</span>
                    to
                    <span class="font-medium">{{ today_entries.to }}</span>
                    of
                    <span class="font-medium">{{ today_entries.total }}</span>
                    results
                </p>
                <div class="flex flex-1 justify-between items-center sm:hidden">
                    <Link
                        :href="today_entries.links[0].url"
                        v-if="today_entries.links[0].url"
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        Previous
                    </Link>
                    <Link
                        :href="
                            today_entries.links[today_entries.links.length - 1]
                                .url
                        "
                        v-if="
                            today_entries.links[today_entries.links.length - 1]
                                .url
                        "
                        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        Next
                    </Link>
                </div>
            </div>

            <!-- Tablet Pagination with Previous and Next Buttons -->
            <div
                class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between lg:hidden"
            >
                <p class="text-xs sm:text-sm lg:text-base text-gray-700">
                    Showing
                    <span class="font-medium">{{ today_entries.from }}</span>
                    to
                    <span class="font-medium">{{ today_entries.to }}</span>
                    of
                    <span class="font-medium">{{ today_entries.total }}</span>
                    results
                </p>
                <div class="inline-flex items-center space-x-3">
                    <!-- Previous Button -->
                    <Link
                        :href="today_entries.links[0].url"
                        v-if="today_entries.links[0].url"
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        Previous
                    </Link>
                    <Link
                        :href="
                            today_entries.links[today_entries.links.length - 1]
                                .url
                        "
                        v-if="
                            today_entries.links[today_entries.links.length - 1]
                                .url
                        "
                        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        Next
                    </Link>
                </div>
            </div>

            <!-- Desktop Pagination Links -->
            <div
                class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-between"
            >
                <p class="text-xs sm:text-sm lg:text-base text-gray-700">
                    Showing
                    <span class="font-medium">{{ today_entries.from }}</span>
                    to
                    <span class="font-medium">{{ today_entries.to }}</span>
                    of
                    <span class="font-medium">{{ today_entries.total }}</span>
                    results
                </p>
                <nav
                    class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                    aria-label="Pagination"
                >
                    <Link
                        v-for="link in today_entries.links"
                        :key="link.label"
                        :href="link.url"
                        v-html="link.label"
                        :class="[
                            'relative inline-flex items-center px-3 py-1.5 text-xs sm:text-sm lg:text-base font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0',
                            link.active
                                ? 'bg-indigo-600 text-white'
                                : 'bg-white text-gray-700 hover:bg-gray-50',
                        ]"
                    />
                </nav>
            </div>
        </div>

        <!-- <div v-if="today_entries.links" class="mt-4 px-6">
            <div v-for="link in entries.links" :key="link.url">
                <component
                    :is="link.url ? 'Link' : 'span'"
                    :href="link.url"
                    class="text-white px-1 mx-1"
                    :class="{
                        'text-blue-500 font-bold': link.active,
                        'text-slate-600': !link.url,
                    }"
                    v-html="link.label"
                />
            </div>
            <p class="text-white">
                Showing {{ entries.from }} to {{ entries.to }} of
                {{ entries.total }} Results
            </p>
        </div> -->
    </div>

    <Footer />
</template>
