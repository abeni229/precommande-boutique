<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AdminAuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Gérer la connexion
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->mot_de_passe)) {
            
            Auth::guard('admin')->login($admin);
            // Rediriger vers la liste des produits de l'admin
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Identifiants incorrects.');
    }

    // Déconnexion
    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->forget('admin_id');
        return redirect()->route('admin.login');
    }
}
