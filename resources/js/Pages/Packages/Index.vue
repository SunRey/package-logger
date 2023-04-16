<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
    package: '',
    people: '',
});
</script>

<template>
    <Head title="Packages" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('packages.store'), { onSuccess: () => form.reset() })">
                <input
                    v-model="form.package"
                    placeholder="Enter Tracking"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.package" class.mt-2 />
                <PrimaryButton class="mt-4">Confirm</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
