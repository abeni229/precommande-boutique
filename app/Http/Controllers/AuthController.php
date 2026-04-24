<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Afficher le formulaire de connexion
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Authentifier l'utilisateur
     */
    public function login(LoginRequest $request)
    {
        // Rate limiting pour éviter les attaques par force brute
        $key = 'login.' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            throw ValidationException::withMessages([
                'email' => ["Trop de tentatives. Réessayez dans {$seconds} secondes."],
            ]);
        }

        $credentials = $request->validated();
        
        $client = Client::where('email', $credentials['email'])->first();
        
        if (!$client || !Hash::check($credentials['mot_de_passe'], $client->mot_de_passe)) {
            RateLimiter::hit($key, 60);
            
            return back()->withErrors([
                'email' => 'Les identifiants fournis sont incorrects.',
            ])->onlyInput('email');
        }

        // Connexion réussie - réinitialiser le rate limiter
        RateLimiter::clear($key);
        
        Auth::guard('clients')->login($client, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('produits.index'))
            ->with('success', 'Bienvenue ' . $client->nom . ' !');
    }

    /**
     * Afficher le formulaire d'inscription
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Enregistrer un nouvel utilisateur
     */
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $client = Client::create([
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'mot_de_passe' => Hash::make($validated['mot_de_passe']),
            'adresse' => $validated['adresse'] ?? null,
        ]);

        // Envoi d'un email de bienvenue (optionnel)
        // Mail::to($client->email)->send(new WelcomeMail($client));

        Auth::guard('clients')->login($client);
        $request->session()->regenerate();

        return redirect()->route('produits.index')
            ->with('success', 'Inscription réussie ! Bienvenue chez ViteCom.');
    }

    /**
     * Déconnecter l'utilisateur
     */
    public function logout(Request $request)
    {
        Auth::guard('clients')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('produits.index')
            ->with('success', 'Vous avez été déconnecté.');
    }
}
