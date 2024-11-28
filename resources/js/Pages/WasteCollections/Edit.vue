<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';

// Déclare les propriétés que le parent transmet à ce composant
const props = defineProps({
    wasteCollection: Object, // wasteCollection est un objet
    wastes: Array,           // wastes est un tableau
    providers: Array         // providers est un tableau
});

// Initialise le formulaire de manière réactive en vérifiant que wasteCollection existe
const form = reactive({
    waste_id: props.wasteCollection?.waste_id || '',
    provider_id: props.wasteCollection?.provider_id || '',
    scheduled_date: props.wasteCollection?.scheduled_date || '',
    status: props.wasteCollection?.status || '',
    collection_date: props.wasteCollection?.collection_date || '',
    collected_volume: props.wasteCollection?.collected_volume || '',
    cost: props.wasteCollection?.cost || '',
});

// Fonction pour soumettre le formulaire
const submitForm = () => {
    this.$inertia.put(route('wasteCollections.update', props.wasteCollection.id), form);
};

// Regarde si la propriété wasteCollection change et met à jour form si nécessaire
watch(() => props.wasteCollection, (newValue) => {
    if (newValue) {
        form.waste_id = newValue.waste_id || '';
        form.provider_id = newValue.provider_id || '';
        form.scheduled_date = newValue.scheduled_date || '';
        form.status = newValue.status || '';
        form.collection_date = newValue.collection_date || '';
        form.collected_volume = newValue.collected_volume || '';
        form.cost = newValue.cost || '';
    }
});
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
                        <div class="mb-4">
                            <label for="waste_id" class="block text-sm font-medium text-gray-700">Type de déchet</label>
                            <select v-model="form.waste_id" id="waste_id" class="mt-1 block w-full" required>
                            <option v-for="waste in props.wastes" :key="waste.id" :value="waste.id">
                                {{ waste.name }}
                            </option>
                            </select>
                            <span v-if="form.errors.waste_id" class="text-red-600">{{ form.errors.waste_id }}</span>
                        </div>

                        <div class="mb-4">
                            <label for="provider_id" class="block text-sm font-medium text-gray-700">Fournisseur</label>
                            <select v-model="form.provider_id" id="provider_id" class="mt-1 block w-full" required>
                            <option v-for="provider in providers" :key="provider.id" :value="provider.id">
                                {{ provider.name }}
                            </option>
                            </select>
                            <span v-if="form.errors.provider_id" class="text-red-600">{{ form.errors.provider_id }}</span>
                        </div>

                        <div class="mb-4">
                            <label for="scheduled_date" class="block text-sm font-medium text-gray-700">Date planifiée</label>
                            <input type="date" v-model="form.scheduled_date" id="scheduled_date" class="mt-1 block w-full" required />
                            <span v-if="form.errors.scheduled_date" class="text-red-600">{{ form.errors.scheduled_date }}</span>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                            <input type="text" v-model="form.status" id="status" class="mt-1 block w-full" required />
                            <span v-if="form.errors.status" class="text-red-600">{{ form.errors.status }}</span>
                        </div>

                        <div class="mb-4">
                            <label for="collection_date" class="block text-sm font-medium text-gray-700">Date de collecte</label>
                            <input type="date" v-model="form.collection_date" id="collection_date" class="mt-1 block w-full" required />
                            <span v-if="form.errors.collection_date" class="text-red-600">{{ form.errors.collection_date }}</span>
                        </div>

                        <div class="mb-4">
                            <label for="collected_volume" class="block text-sm font-medium text-gray-700">Volume collecté</label>
                            <input type="number" v-model="form.collected_volume" id="collected_volume" class="mt-1 block w-full" required />
                            <span v-if="form.errors.collected_volume" class="text-red-600">{{ form.errors.collected_volume }}</span>
                        </div>

                        <div class="mb-4">
                            <label for="cost" class="block text-sm font-medium text-gray-700">Coût</label>
                            <input type="number" v-model="form.cost" id="cost" class="mt-1 block w-full" required />
                            <span v-if="form.errors.cost" class="text-red-600">{{ form.errors.cost }}</span>
                        </div>

                        <div class="flex items-center justify-between">
        <Link href="{{ route('wasteCollections.index') }}" class="btn btn-secondary">Annuler</Link>
        <button type="submit" class="btn btn-primary" :disabled="form.processing">Mettre à jour</button>
      </div>
    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>




