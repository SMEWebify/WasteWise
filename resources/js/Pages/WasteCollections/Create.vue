<script setup>
import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    wastes: Array,
    providers: Array,
});

const form = reactive({
    waste_id: '',
    provider_id: '',
    scheduled_date: '',
    status: '',
    collection_date: '',
    collected_volume: '',
    cost: '',
});

const submitForm = () => {
    this.$ine

    rtia.post(route('wasteCollections.store'), form);
};
</script>

<template>
    <div>
        <h1>Créer une nouvelle collecte</h1>
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

            <button type="submit">Créer</button>
        </form>
    </div>
</template>

