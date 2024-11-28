<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Waste;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\WasteCollection;

class RealTimeMonitoringController extends Controller
{
    public function dashboard()
    {
        // Appel de la fonction pour obtenir les données en temps réel
        $dashboardData = $this->getRealTimeData();
        // Récupérer les alertes automatiques
        $alerts = $this->getAlerts();

        // Rendre la vue Inertia avec les données du tableau de bord
        return Inertia::render('RealTime/Dashboard', [
            'dashboardData' => $dashboardData,
            'alerts' => $alerts
        ]);
    }

    private function getRealTimeData()
    {
        // Récupère les données de production de déchets
        $wasteData = Waste::all();
    
        // Total des déchets produits
        $totalWaste = round($wasteData->sum('volume'), 2);
    
        // Nombre de collectes en attente
        $pendingCollections = $wasteData->where('status', 'à programmer')->count();
    
        // Statistiques par type de déchets
        $wasteByType = $wasteData->groupBy('type')->map(function ($typeGroup) {
            return round($typeGroup->sum('volume'), 2);
        });
    
        // Statistiques par catégorie de déchets
        $wasteByCategory = $wasteData->groupBy('category')->map(function ($categoryGroup) {
            return round($categoryGroup->sum('volume'), 2);
        });
    
        // Statistiques par origine des déchets
        $wasteByOrigin = $wasteData->groupBy('origin')->map(function ($originGroup) {
            return round($originGroup->sum('volume'), 2);
        });
    
        // Exemple de données simulées pour des KPI
        $kpi = [
            'totalWaste' => $totalWaste,
            'pendingCollections' => $pendingCollections,
            'storageCapacity' => 500, // Capacité de stockage en unités (exemple)
            'currentStorage' => $totalWaste,
            'wasteByType' => $wasteByType,
            'wasteByCategory' => $wasteByCategory,
            'wasteByOrigin' => $wasteByOrigin,
        ];
    
        return $kpi;
    }

    private function getAlerts()
    {
        // Simule des alertes automatiques
        $alerts = [];
    
        // Exemple d'alerte pour le dépassement de seuil de stockage
        $storageLimit = 500;  // Limite de stockage en unités
        $currentStorage = WasteCollection::sum('collected_volume');  // Volume total collecté
        if ($currentStorage > $storageLimit) {
            $alerts[] = [
                'type' => 'Storage Overflow',
                'message' => "Le volume collecté a dépassé le seuil de $storageLimit unités.",
                'severity' => 'high',
            ];
        }
    
        // Exemple d'alerte pour des collectes en retard
        $delayedCollections = WasteCollection::where('status', 'pending')  // Statut des collectes en attente
            ->where('scheduled_date', '<', now())  // Date planifiée dépassée
            ->count();
        
        if ($delayedCollections > 0) {
            $alerts[] = [
                'type' => 'Delayed Collection',
                'message' => "$delayedCollections collecte(s) sont en retard.",
                'severity' => 'medium',
            ];
        }
    
        return $alerts;
    }
}
