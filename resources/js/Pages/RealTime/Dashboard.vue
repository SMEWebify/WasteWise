<script setup>
import { onMounted } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {
    Chart,
    BarElement,
    CategoryScale,
    LinearScale,
    ArcElement, // Ajout de ArcElement pour les graphiques pie et doughnut
    PieController,
    DoughnutController,
    BarController,
    Title,
    Tooltip,
    Legend
} from 'chart.js';

// Enregistrer les composants nécessaires pour Chart.js
Chart.register(BarElement, CategoryScale, LinearScale, ArcElement, PieController, DoughnutController, BarController, Title, Tooltip, Legend);

// Définir la prop dashboardData
const props = defineProps({
    alerts: Array,
    dashboardData: {
        type: Object,
        default: () => ({
            totalWaste: 0,
            pendingCollections: 0,
            storageCapacity: 0,
            currentStorage: 0,
            wasteByType: {},
            wasteByCategory: {},
            wasteByOrigin: {}
        })
    }
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

onMounted(() => {
    // Créer les graphiques une fois que le DOM est prêt
    const wasteByType = props.dashboardData.wasteByType;
    const wasteByCategory = props.dashboardData.wasteByCategory;
    const wasteByOrigin = props.dashboardData.wasteByOrigin;

    // Graphique par type de déchets
    const ctxType = document.getElementById('wasteByTypeChart').getContext('2d');
    new Chart(ctxType, {
        type: 'bar',
        data: {
            labels: Object.keys(wasteByType),
            datasets: [{
                label: 'Volume par Type de Déchets (en unités)',
                data: Object.values(wasteByType),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Graphique par catégorie de déchets
    const ctxCategory = document.getElementById('wasteByCategoryChart').getContext('2d');
    new Chart(ctxCategory, {
        type: 'pie',
        data: {
            labels: Object.keys(wasteByCategory),
            datasets: [{
                label: 'Volume par Catégorie de Déchets',
                data: Object.values(wasteByCategory),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
                borderWidth: 1
            }]
        }
    });

    // Graphique par origine des déchets
    const ctxOrigin = document.getElementById('wasteByOriginChart').getContext('2d');
    new Chart(ctxOrigin, {
        type: 'doughnut',
        data: {
            labels: Object.keys(wasteByOrigin),
            datasets: [{
                label: 'Volume par Origine de Déchets',
                data: Object.values(wasteByOrigin),
                backgroundColor: [
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                borderWidth: 1
            }]
        }
    });
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

        <div class="py-12 flow-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4">Tableau de bord en temps réel</h1>
                    
                    <!-- Grid responsive pour organiser les graphiques -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="w-full h-auto">
                            <canvas id="wasteByTypeChart" width="400" height="400"></canvas>
                        </div>
                        <div class="w-full h-auto">
                            <canvas id="wasteByCategoryChart" width="400" height="400"></canvas>
                        </div>
                        <div class="w-full h-auto">
                            <canvas id="wasteByOriginChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="">
                <div class="mt-6">
                    <Link :href="route('wastes.create')" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">
                        Ajouter un nouveau déchet
                    </Link>
                </div>
            </div>

            <div class="">
                
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
