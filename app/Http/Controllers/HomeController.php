<?php

namespace App\Http\Controllers;

use App\Models\CasoExito;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Mostrar la página principal
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener casos de éxito publicados para el carrusel en home
        $casosExito = CasoExito::where('status', 'publicado')
            ->with('autor')
            ->latest()
            ->take(6)
            ->get();
        
        return view('pages.home', compact('casosExito'));
    }
}

