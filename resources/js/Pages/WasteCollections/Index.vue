<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import { Head } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    defineProps({ wasteCollections: Array });
</script>

<template>
    <Head title="Collectes de déchets" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Collectes de déchets
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Liste des collectes de déchets</h1>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type de déchet</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fournisseur</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date planifiée</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="collection in wasteCollections" :key="collection.id">
                                <td class="px-6 py-4 whitespace-nowrap">{{ collection.id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ collection.waste.type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ collection.provider.name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ collection.scheduled_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ collection.status }}</td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <Link :href="route('wasteCollections.edit', collection.id)" class="text-indigo-600 hover:text-indigo-900 mr-2">Editer</Link>
                                    
                                    <form @submit.prevent="deleteCollection(collection.id)">
                                        <button type="submit"  class="text-red-600 hover:text-red-900">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Link :href="route('wasteCollections.create')">Ajouter une nouvelle collecte</Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


