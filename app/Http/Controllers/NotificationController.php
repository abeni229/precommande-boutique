<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:clients,email'
        ]);
    
        $client = Client::where('email', $request->email)->firstOrFail();
        $notifications = Notification::where('client_id', $client->id)->get();
    
        return view('notifications.index', compact('notifications'));
    }


    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_viewed' => true]);

        return redirect()->route('notifications.index')->with('message', 'Notification marquée comme lue.');
    }
}
