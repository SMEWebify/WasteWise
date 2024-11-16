<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WasteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ReportAnalysisController;
use App\Http\Controllers\WasteCollectionController;
use App\Http\Controllers\CostOptimizationController;
use App\Http\Controllers\RealTimeMonitoringController;

Route::get('/', action: [WelcomeController::class, 'index'])->name('welcome');


Route::get( '/user-index', function () {
    return Inertia::render('UserIndex');
})->middleware(['auth', 'verified'])->name('UserIndex');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [RealTimeMonitoringController::class, 'dashboard'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestion des Déchets
    Route::resource('wastes', WasteController::class);
    Route::get('/wastes', [WasteController::class, 'index'])->name('wastes.index');
    Route::get('/wastes/create', [WasteController::class, 'create'])->name('wastes.create');
    Route::post('/wastes/create', [WasteController::class, 'store'])->name('wastes.store');
    Route::get('/wastes/{waste}/edit ', [WasteController::class, 'edit'])->name('wastes.edit');
    Route::put('/wastes/{waste} ', [WasteController::class, 'update'])->name('wastes.update');
    Route::delete('/wastes/delete/{waste} ', [WasteController::class, 'destroy'])->name('wastes.destroy');

    Route::resource('wasteCollections', WasteCollectionController::class)->names([
        'index' => 'wasteCollections.index',
        'create' => 'wasteCollections.create',
        'store' => 'wasteCollections.store',
        'show' => 'wasteCollections.show',
        'edit' => 'wasteCollections.edit',
        'update' => 'wasteCollections.update',
        'destroy' => 'wasteCollections.destroy',
    ]);
    
    // Optimisation des Coûts
    Route::get('/cost', [CostOptimizationController::class, 'index'])->name('cost.index');
    Route::get('/cost-comparison', [CostOptimizationController::class, 'compare'])->name('cost.comparison');
    Route::get('/collection-planning', [CostOptimizationController::class, 'plan'])->name('collection.planning');

    // Suivi en Temps Réel
    Route::get('/alerts', [RealTimeMonitoringController::class, 'alerts'])->name('alerts');

    // Rapports et Analyses
    Route::get('/regulatory-reports', [ReportAnalysisController::class, 'regulatory'])->name('regulatory.reports');
    Route::get('/trend-analysis', [ReportAnalysisController::class, 'trends'])->name('trend.analysis');
    Route::get('/efficiency-improvement', [ReportAnalysisController::class, 'improvement'])->name('efficiency.improvement');

});

require __DIR__.'/auth.php';
