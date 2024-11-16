<script setup>
    import { Head } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    defineProps({ trends: Array });
</script>

<template>
    <Head title="Analyse des Tendances" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Analyse des Tendances
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Tendances des Déchets</h1>
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mois</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volume Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="trend in trends" :key="trend.month">
                                <td class="px-6 py-4 whitespace-nowrap">{{ trend.month }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ trend.total_volume }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
