<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'quantite', 'statut', 'admin_id'];

    // Relation avec les notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    // Relation avec les commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    // Relation avec l'admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    //obtention des produits en rupture de stock
    public static function getProduitsEnRupture()
    {
        return self::where('statut', 'rupture')->get();
    }

}
