<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
    tracking: '',
    persons_id: '',
});

defineProps(['packages']);
</script>

<template>
    <Head title="Packages" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Packages</h2>
        </template>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('packages.store'), { onSuccess: () => form.reset() })">
                <input
                    v-model="form.tracking"
                    placeholder="Enter Tracking"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.tracking" class.mt-2 />
                <input
                    v-model="form.persons_id"
                    placeholder="Person Here"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.persons_id" class.mt-2 />
                <PrimaryButton class="mt-4">Confirm</PrimaryButton>
            </form>
        </div>
        <div class="max-w-2x3 mx-auto p-4 sm:p-6 lg:p-8">
            {{ packages }}
            <div class="flex justify-between items-center"
                 v-for="shipment in packages">
                <p class="mt-4 text-lg text-gray-900">
                    {{ shipment.tracking}} belongs to
                </p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
