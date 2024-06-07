<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;  // Importa la clase Route

class RolesController extends Controller
{
    /**
     * Muestra la vista de inicio de sesión.
     *
     * @return View
     */
    public function login()
    {
        return view('auth.login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Maneja el inicio de sesión del usuario.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginPost(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();  // Autentica al usuario

        $request->session()->regenerate();  // Regenera la sesión

        return redirect()->intended(route('welcome', absolute: false));  // Redirige al destino previsto
    }

    /**
     * Maneja la salida del usuario.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();  // Cierra la sesión del usuario (utiliza Auth aquí)

        $request->session()->invalidate();  // Invalida la sesión

        $request->session()->regenerateToken();  // Regenera el token de seguridad

        return redirect('/login');  // Redirige a la página de inicio de sesión
    }
}
