<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    group: '',
});

defineProps(['persons']);
</script>

<template>
    <Head title="Persons" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">People</h2>
        </template>

        <div class="max-w-2x3 mx-auto p-4 sm:p-6 lg:p-8">

            <form @submit.prevent="form.post(route('persons.store'), { onSuccess: () => form.reset() })">
                <input
                    v-model="form.first_name"
                    placeholder="Enter First Name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.first_name" class.mt-2 />
                <input
                    v-model="form.last_name"
                    placeholder="Enter Last Name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.last_name" class.mt-2 />
                <input
                    v-model="form.group"
                    placeholder="Enter Event or Group"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.group" class.mt-2 />
                <PrimaryButton class="mt-4">Confirm</PrimaryButton>
            </form>
        </div>
        <div class="max-w-2x3 mx-auto p-4 sm:p-6 lg:p-8">
            <div class="flex justify-between items-center"
                 v-for="person in persons">
                <p class="mt-4 text-lg text-gray-900">
                    {{ person.first_name }} {{ person.last_name}} with {{ person.group}}
                </p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
