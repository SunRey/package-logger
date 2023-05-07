<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from '@inertiajs/vue3';

defineProps(['person', 'packages']);
</script>

<template>
    <Head title="Person Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Person Detail</h2>
        </template>

        <div class="max-w-2x3 mx-auto p-4 sm:p-6 lg:p-8">
            <div class=" justify-between items-center">
                <h3>{{ person.first_name }} {{ person.last_name }} has: </h3>
                <div class="mt-4 text-lg text-gray-900">
                    <p class="mt-4 items-center"
                        v-for="shipment in packages">
                            {{shipment.tracking}}
                    </p>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
