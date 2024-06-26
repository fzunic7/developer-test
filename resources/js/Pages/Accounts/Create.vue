<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Link, Head, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    owner_id: "",
    phone: "",
    country: "",
    address: "",
    town_city: "",
    post_code: "",
});

const props = defineProps({
    users: Array,
});

const submitForm = async () => {
    try {
        await form.post(route("accounts.store"));
    } catch (error) {
        console.error(error);
    }
};
</script>

<template>
    <Head title="Create Account" />

    <BreezeAuthenticatedLayout>
        <div class="max-w-screen-lg mx-auto my-6 space-y-6">
            <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Account Information
                        </h3>
                        <ul class="mt-6">
                            <li
                                class="text-red-500"
                                v-for="error in form.errors"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form @submit.prevent="submitForm">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label
                                        for="name"
                                        class="block text-sm font-medium text-gray-700"
                                        >Name</label
                                    >
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        id="name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        required
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label
                                        for="owner-id"
                                        class="block text-sm font-medium text-gray-700"
                                        >Owner</label
                                    >
                                    <select
                                        v-model="form.owner_id"
                                        id="owner-id"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        required
                                    >
                                        <option value="" disabled selected>
                                            Select Owner
                                        </option>
                                        <option
                                            v-for="user in users"
                                            :value="user.id"
                                            :key="user.id"
                                        >
                                            {{ user.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label
                                        for="phone"
                                        class="block text-sm font-medium text-gray-700"
                                        >Phone</label
                                    >
                                    <input
                                        v-model="form.phone"
                                        type="tel"
                                        id="phone"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        required
                                    />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label
                                        for="country"
                                        class="block text-sm font-medium text-gray-700"
                                        >Country</label
                                    >
                                    <input
                                        v-model="form.country"
                                        type="text"
                                        id="country"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        required
                                    />
                                </div>
                                <div class="col-span-6">
                                    <label
                                        for="address"
                                        class="block text-sm font-medium text-gray-700"
                                        >Address</label
                                    >
                                    <input
                                        v-model="form.address"
                                        type="text"
                                        id="address"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        required
                                    />
                                </div>
                                <div
                                    class="col-span-6 sm:col-span-6 lg:col-span-2"
                                >
                                    <label
                                        for="town-city"
                                        class="block text-sm font-medium text-gray-700"
                                        >Town/City</label
                                    >
                                    <input
                                        v-model="form.town_city"
                                        type="text"
                                        id="town-city"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        required
                                    />
                                </div>
                                <div
                                    class="col-span-6 sm:col-span-3 lg:col-span-2"
                                >
                                    <label
                                        for="post-code"
                                        class="block text-sm font-medium text-gray-700"
                                        >Post code</label
                                    >
                                    <input
                                        v-model="form.post_code"
                                        type="text"
                                        id="post-code"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="flex justify-end mt-6">
                                <Link
                                    :href="route('accounts.index')"
                                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >Cancel</Link
                                >
                                <button
                                    type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
