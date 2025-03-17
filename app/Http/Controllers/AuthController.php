<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   // Afficher le formulaire de connexion
   public function showLoginForm()
   {
       return view('auth.login');
   }

   // Authentifier l'utilisateur et rediriger
   
   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'mot_de_passe' => 'required|string',
    ]);

    // Rediriger directement vers la page des produits en rupture sans authentification
    return redirect()->route('produits.index');
}


    // Afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    

    // Enregistrer un nouvel utilisateur et le connecter
   public function register(Request $request)
   {
       $request->validate([
           'nom' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:clients',
           'mot_de_passe' => 'required|string|min:8|confirmed',
           'adresse' => 'nullable|string|max:255',
       ]);

       // Créer un client et l'enregistrer
       $client = Client::create([
           'nom' => $request->nom,
           'email' => $request->email,
           'mot_de_passe' => bcrypt($request->mot_de_passe),
           'adresse' => $validated['adresse'] ?? null,
       ]);

       // Connexion de l'utilisateur après l'inscription
       Auth::login($client);

        // Débogage pour vérifier si l'utilisateur est bien connecté
       // dd(Auth::user());

       // Rediriger vers la page des produits en rupture
       return redirect()->route('produits.index')->with('success', 'Inscription réussie !');
   }

    // Déconnecter l'utilisateur
    public function logout()
    {
        Auth::logout();
        return redirect()->route('produits.index');
    }

    
}
