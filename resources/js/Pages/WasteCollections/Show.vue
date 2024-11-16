
<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    wasteCollection: Object,
});
</script>


<template>
    <Head title="Collectes de déchets" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Collectes de déchets > Détails de la collecte #{{ wasteCollection.id }}
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <p><strong>Type de déchet :</strong> {{ wasteCollection.waste.name }}</p>
                    <p><strong>Fournisseur :</strong> {{ wasteCollection.provider.name }}</p>
                    <p><strong>Date planifiée :</strong> {{ wasteCollection.scheduled_date }}</p>
                    <p><strong>Statut :</strong> {{ wasteCollection.status }}</p>
                    <p><strong>Date de collecte :</strong> {{ wasteCollection.collection_date }}</p>
                    <p><strong>Volume collecté :</strong> {{ wasteCollection.collected_volume }}</p>
                    <p><strong>Coût :</strong> {{ wasteCollection.cost }}</p>
                    <Link :href="route('wasteCollections.edit', wasteCollection.id)">Modifier</Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


