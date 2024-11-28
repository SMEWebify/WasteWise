<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    
    const { wastes } = usePage().props;
</script>

<template>
    <Head title="Gestion des Déchets" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Gestion des Déchets
            </h2>
        </template>

        <div class="py-12 flow-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Liste des déchets</h1>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Origine</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unité</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Collecte</th> <!-- Nouvelle colonne -->
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="waste in wastes" :key="waste.id">
                                <td class="px-6 py-4 whitespace-nowrap">#{{ waste.id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ waste.type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ waste.category }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ waste.origin }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ waste.volume }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ waste.unit }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Si waste.collections existe et contient des collectes -->
                                    <template v-if="waste.collections && waste.collections.length > 0">
                                        <div>
                                            <div v-for="collection in waste.collections" :key="collection.id">
                                                <Link class="text-blue-600 hover:text-blue-900">
                                                    Voir collecte - Statut: {{ collection.status }}
                                                </Link>
                                            </div>
                                        </div>
                                    </template>
                                    <!-- Si aucune collecte n'est présente, afficher un lien pour ajouter une collecte -->
                                    <template v-else>
                                        <Link  class="text-green-600 hover:text-green-900">Ajouter une collecte</Link>
                                    </template>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <Link :href="route('wastes.edit', waste.id)" class="text-indigo-600 hover:text-indigo-900 mr-2">Editer</Link>
                                    <Link as="button" method="delete" :href="route('wastes.destroy', waste.id)" class="text-red-600 hover:text-red-900">Supprimer</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
