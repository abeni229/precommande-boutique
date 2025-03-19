<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Client;


class NotificationController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:clients,email'
        ]);
    
        $client = Client::where('email', $request->email)->firstOrFail();
    
        // Charger les relations produit et commande pour éviter les requêtes multiples dans la vue
        $notifications = Notification::where('client_id', $client->id)
            ->with(['produit', 'commande'])
            ->orderBy('date_envoi', 'desc')
            ->get();
    
        return view('notifications.index', compact('notifications'));
    }
    
    public function markAsRead($id, Request $request)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_viewed' => true]);
    
        return redirect()->route('notifications.index', ['email' => $request->query('email')])
            ->with('message', 'Notification marquée comme lue.');
    }
    

   
}
