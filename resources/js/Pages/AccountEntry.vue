<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import PageHeading from "@/Components/PageHeading.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import Footer from '@/Components/Footer.vue'
import { Head, Link, useForm } from "@inertiajs/vue3";

defineOptions({
    layout: AuthenticatedLayout,
});

const form = useForm({
    product: "",
    amount: "",
    payment_method: "",
    delivery_charge: "",
    merchant_balance: "",
    merchant_name: "",
    merchant_phone: "",
    rider: "",
});

const submit = async () => {
    form.clearErrors()
    form.post(route("entry.store"), {
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="New Record" />

    <PageHeading>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Sonichoice Account Management Entry
            </h2>
        </template>
    </PageHeading>

    <div class="justify-center px-6 py-12 lg:px-8 max-w-3xl mx-auto">
        <center class="text-white text-lg">
            Kindly fill up the form to record a new account management entry.
        </center>
        <br />
        <div v-if="$page.props.flash.success">
            <FlashMessage :message="$page.props.flash.success" />
        </div>
        <div v-if="$page.props.flash.error">
            <FlashMessage :message="$page.props.flash.error" />
        </div>
        <br />
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="product" value="Product Name" />

                <TextInput
                    id="product"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.product"
                    autofocus
                    autocomplete="product"
                />

                <InputError class="mt-2" :message="form.errors.product" />
            </div>

            <div class="mt-4">
                <InputLabel for="amount" value="Product Price" />

                <TextInput
                    id="amount"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.amount"
                    autocomplete=""
                />

                <InputError class="mt-2" :message="form.errors.amount" />
            </div>

            <div class="mt-4">
                <InputLabel for="payment_method" value="Payment Method" />

                <TextInput
                    id="payment_method"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.payment_method"
                    autocomplete=""
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.payment_method"
                />
            </div>

            <div class="mt-4">
                <InputLabel for="delivery_charge" value="Delivery Charge" />

                <TextInput
                    id="delivery_charge"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.delivery_charge"
                    autocomplete=""
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.delivery_charge"
                />
            </div>

            <div class="mt-4">
                <InputLabel for="merchant_balance" value="Merchant Balance" />

                <TextInput
                    id="merchant_balance"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.merchant_balance"
                    autocomplete=""
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.merchant_balance"
                />
            </div>
            <div class="mt-4">
                <InputLabel for="merchant_name" value="Merchant Name" />

                <TextInput
                    id="merchant_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.merchant_name"
                    autocomplete=""
                />

                <InputError class="mt-2" :message="form.errors.merchant_name" />
            </div>
            <div class="mt-4">
                <InputLabel
                    for="merchant_phone"
                    value="Merchant Phone Number"
                />

                <TextInput
                    id="merchant_phone"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.merchant_phone"
                    autocomplete=""
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.merchant_phone"
                />
            </div>

            <div class="mt-4">
                <InputLabel for="rider" value="Riders Name" />

                <TextInput
                    id="rider"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.rider"
                    autocomplete=""
                />

                <InputError class="mt-2" :message="form.errors.rider" />
            </div>

            <div class="mt-12 flex items-center justify-center">
                <button
                    class="text-white w-full bg-indigo-700 py-2 rounded-lg outline-white flex items-center justify-center"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Submit Record
                </button>
            </div>

            <!-- <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Submit
                </PrimaryButton>
            </div> -->
        </form>
    </div>
    <Footer />
</template>
