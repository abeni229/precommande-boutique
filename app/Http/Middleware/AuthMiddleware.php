<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'utilisateur est authentifié
        if (!Auth::guard('clients')->check()) {
            // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
            return redirect()->route('login');
        }

        // Vérifie si l'utilisateur existe dans la base de données
        $client = Auth::guard('clients')->user();

        if (!$client || !$client->exists()) {
            // Si l'utilisateur n'existe pas dans la base de données, déconnexion et redirection vers la page de connexion
            Auth::guard('clients')->logout();
            return redirect()->route('login');
        }

        return $next($request);
    }
}
