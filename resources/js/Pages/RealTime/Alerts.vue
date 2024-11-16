<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';

    // Déclare les props pour les alertes
    defineProps({
        alerts: Array
    });

    // Fonction pour déterminer la classe CSS en fonction de la gravité de l'alerte
    const alertClass = (severity) => {
        switch (severity) {
            case 'high':
                return 'bg-red-200 text-red-800';
            case 'medium':
                return 'bg-yellow-200 text-yellow-800';
            case 'low':
                return 'bg-green-200 text-green-800';
            default:
                return 'bg-gray-200 text-gray-800';
        }
    };
</script>

<template>
    <Head title="Suivi en Temps Réel" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Suivi en Temps Réel > Alertes
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Alertes Automatiques</h1>

                    <!-- Vérification si des alertes sont présentes -->
                    <div v-if="alerts.length > 0">
                        <!-- Boucle à travers les alertes pour les afficher -->
                        <div v-for="alert in alerts" :key="alert.type" class="alert-card" :class="alertClass(alert.severity)">
                            <h2 class="font-semibold">{{ alert.type }}</h2>
                            <p>{{ alert.message }}</p>
                        </div>
                    </div>

                    <!-- Message affiché quand il n'y a pas d'alertes -->
                    <div v-else>
                        <p>Aucune alerte pour le moment.</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.alert-card {
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 10px;
    border: 1px solid #e5e7eb; /* Bordure légère */
    transition: all 0.3s ease; /* Animation légère */
}

.alert-card:hover {
    transform: scale(1.02); /* Effet de survol */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Ombre sur survol */
}
</style>
