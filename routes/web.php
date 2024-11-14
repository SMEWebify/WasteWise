<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;

Route::get('/', action: [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get( '/user-index', function () {
    return Inertia::render('UserIndex');
})->middleware(['auth', 'verified'])->name('UserIndex');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestion des Déchets
    Route::resource('wastes', WasteController::class);

    // Optimisation des Coûts
    Route::get('/cost-optimization', [CostOptimizationController::class, 'index'])->name('cost.optimization');
    Route::get('/cost-comparison', [CostOptimizationController::class, 'compare'])->name('cost.comparison');
    Route::get('/collection-planning', [CostOptimizationController::class, 'plan'])->name('collection.planning');

    // Suivi en Temps Réel
    Route::get('/real-time-dashboard', [RealTimeMonitoringController::class, 'dashboard'])->name('real.time.dashboard');
    Route::get('/alerts', [RealTimeMonitoringController::class, 'alerts'])->name('alerts');

    // Rapports et Analyses
    Route::get('/regulatory-reports', [ReportAnalysisController::class, 'regulatory'])->name('regulatory.reports');
    Route::get('/trend-analysis', [ReportAnalysisController::class, 'trends'])->name('trend.analysis');
    Route::get('/efficiency-improvement', [ReportAnalysisController::class, 'improvement'])->name('efficiency.improvement');

});

require __DIR__.'/auth.php';
