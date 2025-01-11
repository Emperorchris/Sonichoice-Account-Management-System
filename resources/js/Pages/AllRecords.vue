<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PageHeading from "@/Components/PageHeading.vue";
import FormatDate from "@/Components/FormatDate.vue";
import Footer from '@/Components/Footer.vue'
import { Head, Link, useForm } from "@inertiajs/vue3";

defineOptions({
    layout: AuthenticatedLayout,
});

defineProps({
    entries: Object,
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
                Account Record History
            </h2>
        </template>
    </PageHeading>

    <!-- <div v-if="entries.data">hello</div> -->

    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">
            All Account Records
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
                            Product
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Amount
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
                            Merchant Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-sm font-medium text-gray-200 dark:text-gray-300 whitespace-nowrap"
                        >
                            Merchant Phone
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
                <tbody v-if="entries.data.length > 0" class="">
                    <tr
                        v-for="entry in entries.data"
                        :key="entry.id"
                        class="even:bg-gray-700 hover:bg-gray-600"
                    >
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            <FormatDate :date="entry.date" />
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ entry.product }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            NGN
                            {{ parseFloat(entry.amount).toLocaleString() }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ entry.payment_method }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            NGN
                            {{
                                parseFloat(
                                    entry.delivery_charge
                                ).toLocaleString()
                            }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            NGN
                            {{
                                parseFloat(
                                    entry.merchant_balance
                                ).toLocaleString()
                            }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ entry.merchant_name }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ entry.merchant_phone }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm text-white whitespace-nowrap"
                        >
                            {{ entry.rider }}
                        </td>
                        <td class="px-6 py-4 flex text-center">
                            <Link
                                :href="route('entry.edit', entry.uuid)"
                                class="text-indigo-400 hover:text-indigo-500 font-medium px-2"
                            >
                                Edit
                            </Link>

                            <button
                                @click="deleteRecord(entry.uuid)"
                                class="text-red-400 hover:text-red-500 font-medium px-2"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else class="text-white">
                    <tr>
                        <td colspan="11">No records found.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div
            v-if="entries.links && entries.data.length > 0"
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-6"
        >
            <!-- Mobile Pagination -->
            <div>
                <p class="sm:hidden text-xs mb-4 sm:text-sm lg:text-base text-gray-700">
                    Showing
                    <span class="font-medium">{{ entries.from }}</span>
                    to
                    <span class="font-medium">{{ entries.to }}</span>
                    of
                    <span class="font-medium">{{ entries.total }}</span>
                    results
                </p>
                <div class="flex flex-1 justify-between items-center sm:hidden">
                    <Link
                        :href="entries.links[0].url"
                        v-if="entries.links[0].url"
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        Previous
                    </Link>
                    <Link
                        :href="entries.links[entries.links.length - 1].url"
                        v-if="entries.links[entries.links.length - 1].url"
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
                    <span class="font-medium">{{ entries.from }}</span>
                    to
                    <span class="font-medium">{{ entries.to }}</span>
                    of
                    <span class="font-medium">{{ entries.total }}</span>
                    results
                </p>
                <div class="inline-flex items-center space-x-3">
                    <!-- Previous Button -->
                    <Link
                        :href="entries.links[0].url"
                        v-if="entries.links[0].url"
                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        Previous
                    </Link>
                    <Link
                        :href="entries.links[entries.links.length - 1].url"
                        v-if="entries.links[entries.links.length - 1].url"
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
                    <span class="font-medium">{{ entries.from }}</span>
                    to
                    <span class="font-medium">{{ entries.to }}</span>
                    of
                    <span class="font-medium">{{ entries.total }}</span>
                    results
                </p>
                <nav
                    class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                    aria-label="Pagination"
                >
                    <Link
                        v-for="link in entries.links"
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

        <!-- <div
            v-if="entries.links && entries.links.length > 0"
            class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-6"
        >
            <div class="flex flex-1 justify-between sm:hidden">
                <a
                    href="#"
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                    >Previous</a
                >
                <a
                    href="#"
                    class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                    >Next</a
                >
            </div>
            <div
                class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between"
            >
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        {{ " " }}
                        <span class="font-medium">{{ entries.from }}</span>
                        {{ " " }}
                        to
                        {{ " " }}
                        <span class="font-medium">{{ entries.to }}</span>
                        {{ " " }}
                        of
                        {{ " " }}
                        <span class="font-medium">{{ entries.total }}</span>
                        {{ " " }}
                        results
                    </p>
                </div>
                <div>
                    <nav
                        class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                        aria-label="Pagination"
                    >
                        

                        <Link
                            v-for="link in entries.links"
                            :key="link.label"
                            :href="link.url"
                            v-html="link.label"
                            :class="[
                                'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0',
                                link.active
                                    ? 'bg-indigo-600 text-white'
                                    : 'bg-white text-gray-700 hover:bg-gray-50',
                            ]"
                        />

                        
                    </nav>
                </div>
            </div>
        </div> -->

        <!-- <div v-if="entries.links" class="mt-4 px-6">
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
    <Footer/>
</template>
