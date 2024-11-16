<script setup>
import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    wasteCollection: Object,
    wastes: Array,
    providers: Array,
});

const form = reactive({
    waste_id: wasteCollection.waste_id || '',
    provider_id: wasteCollection.provider_id || '',
    scheduled_date: wasteCollection.scheduled_date || '',
    status: wasteCollection.status || '',
    collection_date: wasteCollection.collection_date || '',
    collected_volume: wasteCollection.collected_volume || '',
    cost: wasteCollection.cost || '',
});

const submitForm = () => {
    this.$inertia.put(route('wasteCollections.update', wasteCollection.id), form);
};
</script>

<template>
    <Head title="Collectes de déchets" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Collectes de déchets > Modifier la collecte #{{ wasteCollection.id }}
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <form @submit.prevent="submitForm">
                        <label>Type de déchet :</label>
                        <select v-model="form.waste_id">
                            <option v-for="waste in wastes" :key="waste.id" :value="waste.id">
                                {{ waste.name }}
                            </option>
                        </select>

                        <label>Fournisseur :</label>
                        <select v-model="form.provider_id">
                            <option v-for="provider in providers" :key="provider.id" :value="provider.id">
                                {{ provider.name }}
                            </option>
                        </select>

                        <label>Date planifiée :</label>
                        <input type="date" v-model="form.scheduled_date" />

                        <label>Statut :</label>
                        <input type="text" v-model="form.status" />

                        <label>Date de collecte :</label>
                        <input type="date" v-model="form.collection_date" />

                        <label>Volume collecté :</label>
                        <input type="number" v-model="form.collected_volume" />

                        <label>Coût :</label>
                        <input type="number" v-model="form.cost" />

                        <button type="submit">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>




