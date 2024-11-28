<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';

    // Déclare les props pour les alertes
    defineProps({
        alerts: Array
    });

    
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
