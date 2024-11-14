<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'testimonials' => [
                [
                    'quote' => 'WasteWise a transformé la façon dont je gère mes déchets au quotidien.',
                    'author' => 'Marie, Utilisatrice régulière',
                ],
                [
                    'quote' => 'Grâce à WasteWise, notre entreprise a réduit ses déchets de 30%.',
                    'author' => 'Jean, Directeur d\'une PME',
                ],
            ],
        ]);
    }
}
