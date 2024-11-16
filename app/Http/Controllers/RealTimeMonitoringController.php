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
        // Récupérer les données en temps réel sur les déchets, les collectes, et les KPIs
        $dashboardData = $this->getRealTimeData();
        return Inertia::render('RealTime/Dashboard', ['dashboardData' => $dashboardData]);
    }

    public function alerts()
    {
        // Récupérer les alertes automatiques
        $alerts = $this->getAlerts();
        return Inertia::render('RealTime/Alerts', ['alerts' => $alerts]);
    }

    private function getRealTimeData()
    {
        // Simule des données de production de déchets, stockage, collectes en attente et des KPI
        $wasteData = Waste::all();  // Récupère les données de production de déchets
        $totalWaste = round($wasteData->sum('volume'),2); // Total des déchets produits
        $pendingCollections = $wasteData->where('status', 'à programmer')->count(); // Nombre de collectes en attente

        // Exemple de données simulées pour des KPI (Key Performance Indicators)
        $kpi = [
            'totalWaste' => $totalWaste,
            'pendingCollections' => $pendingCollections,
            'storageCapacity' => 500, // Capacité de stockage en unités (exemple)
            'currentStorage' => $totalWaste,
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
