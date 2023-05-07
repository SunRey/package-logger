<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";

const form = useForm({
    firstName: '',
    lastName: '',
    group: '',
});

defineProps(['persons', 'packages']);
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
                    v-model="form.firstName"
                    placeholder="Enter First Name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.firstName" class.mt-2 />
                <input
                    v-model="form.lastName"
                    placeholder="Enter Last Name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.lastName" class.mt-2 />
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
                <Link :href="'/persons/' + person.id" class="mt-4 text-lg text-gray-900">
                    {{ person.first_name }} {{ person.las_name}} with {{ person.group}}
                </Link>
            </div>
            {{ packages }}
        </div>
    </AuthenticatedLayout>
</template>
