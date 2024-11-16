<script setup>
    import { usePage } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    
    const { costs } = usePage().props;
</script>

<template>
    <Head title="Optimisation des Coûts" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Optimisation des Coûts > Coûts de traitement des déchets
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Coûts de traitement des déchets</h1>
                    <table class="table-auto w-full text-left">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type de déchet</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fournisseur</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coût par unité</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coût total</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Devise</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="cost in costs" :key="cost.waste_type">
                                <td class="px-6 py-4 whitespace-nowrap">{{ cost.waste_type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ cost.provider }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ cost.volume }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ cost.cost_per_unit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ cost.total_cost }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ cost.currency }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
