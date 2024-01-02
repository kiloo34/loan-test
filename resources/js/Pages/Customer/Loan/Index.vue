<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/Link.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Loan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Loan</h2>
        </template>

        <template #actionButton>
            <Link 
                class="ms-4 bg-green-500 hover:bg-green-600"
                :href="route('customer.loan.create')"
            >
                Create
            </Link> 
        </template> 

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
