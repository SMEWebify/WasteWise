<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';

    defineProps({
        dashboardData: Object
    });
</script>

<template>
    <Head title="Suivi en Temps Réel" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Suivi en Temps Réel > Tableau de bord
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Tableau de bord en temps réel</h1>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Total Waste Produced -->
                        <div class="card">
                            <h2 class="text-lg font-semibold">Total des déchets produits</h2>
                            <p class="text-xl">{{ dashboardData.totalWaste }} unités</p>
                        </div>

                        <!-- Pending Collections -->
                        <div class="card">
                            <h2 class="text-lg font-semibold">Collectes en attente</h2>
                            <p class="text-xl">{{ dashboardData.pendingCollections }}</p>
                        </div>

                        <!-- Current Storage -->
                        <div class="card">
                            <h2 class="text-lg font-semibold">Stockage actuel</h2>
                            <p class="text-xl">{{ dashboardData.currentStorage }} / {{ dashboardData.storageCapacity }} unités</p>
                        </div>

                        <!-- KPI Example -->
                        <div class="card">
                            <h2 class="text-lg font-semibold">Indicateurs clés (KPI)</h2>
                            <p class="text-xl">Capacité de stockage : {{ dashboardData.storageCapacity }} unités</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<style scoped>
.dashboard-container {
    padding: 20px;
}
.card {
    background-color: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>
