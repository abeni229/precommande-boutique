
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\NotificationController;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

// Route pour précommander un produit
Route::post('/precommande/{produit}', [ProduitController::class, 'precommander'])->name('precommande');



// Route pour enregistrer une commande
Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');

// Route pour afficher l'historique des commandes
Route::get('/historique', [CommandeController::class, 'historique'])->name('commande.historique');

//route pour les détails des commandes
Route::get('/commande/{id}', [CommandeController::class, 'show'])->name('commande.show');

// Route pour afficher les notifications avec l'email
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

// Route pour marquer une notification comme lue
Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notification.markAsRead');



// Routes protégées pour l'admin
Route::middleware('admin')->prefix('admin')->group(function () {
    // Route du dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Route pour afficher les commandes
    Route::get('/commandes', [AdminController::class, 'commandes'])->name('admin.commandes');
    
    // Liste des produits (en rupture et en stock) pour l'admin
    Route::get('/produits', [ProduitController::class, 'adminIndex'])->name('admin.produits.index');

    // Route pour afficher le tableau de bord des produits pour l'admin
    Route::get('/produits/dashboard', [AdminController::class, 'produitsDashboard'])->name('admin.produits');


    // Ajouter un produit
    Route::get('/produits/create', [ProduitController::class, 'create'])->name('admin.produits.create');
    Route::post('/produits', [ProduitController::class, 'store'])->name('admin.produits.store');

    // Modifier un produit
    Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('admin.produits.edit');
    Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('admin.produits.update');

    // Supprimer un produit
    Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('admin.produits.destroy');

    Route::post('/commandes/{commande}/valider', [AdminController::class, 'validerCommande'])->name('admin.commande.valider');
    Route::post('/commandes/{commande}/refuser', [AdminController::class, 'refuserCommande'])->name('admin.commande.refuser');

});


// Routes de connexion/déconnexion admin
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// route d'inscription pour les nouveaux clients
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

//route de connexion pour les anciens clients
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

//routes pour afficher les produits chez les clients
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');

