<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Client;


class NotificationController extends Controller
{

     public function index(Request $request)
    {
        // Vérifier que l'email est fourni et existe dans la base
        $request->validate([
            'email' => 'required|email|exists:clients,email'
        ], [
            'email.exists' => 'Aucun compte associé à cet email. Veuillez vérifier votre saisie.'
        ]);

        // Récupérer le client via son email
        $client = Client::where('email', $request->email)->firstOrFail();

        // Charger les notifications du client
        $notifications = Notification::where('client_id', $client->id)
            ->orderBy('date_envoi', 'desc')
            ->get();

        return view('notifications.index', compact('notifications', 'client'));
    }

    
    public function markAsRead($id, Request $request)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_viewed' => true]);
    
        return redirect()->route('notifications.index', ['email' => $notification->client->email])
    ->with('message', 'Notification marquée comme lue.');

    }
    

   
}
