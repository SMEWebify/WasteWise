<script setup>
    import { Head } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    defineProps({ reports: Array });
</script>

<template>
    <Head title="Rapports Réglementaires" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Rapports Réglementaires
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Rapports Réglementaires</h1>
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type de Rapport</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de Création</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="report in reports" :key="report.id">
                                <td class="px-6 py-4 whitespace-nowrap">{{ report.report_type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ new Date(report.created_at).toLocaleDateString() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Voir le Rapport
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
