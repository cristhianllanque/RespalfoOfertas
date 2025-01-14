<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Si usas Auth aquí

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Permitir acceso si el usuario es administrador o está aprobado
        if ($user->rol !== 'admin' && !$user->is_approved) {
                //crea esa ruta de approval.wait en web y descomentalo, despues crea ese archivo
                return redirect()->route('dashboard')->with('message', 'Tu cuenta está en espera de aprobación.');
                //return redirect()->route('approval.wait')->with('message', 'Tu cuenta está en espera de aprobación.');
        }

        return view('dashboard');
    }
}
