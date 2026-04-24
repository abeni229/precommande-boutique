<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Modifier la colonne statut des produits
        Schema::table('produits', function (Blueprint $table) {
            $table->enum('statut', ['en_stock', 'rupture'])->change();
        });

        // Mettre à jour les données existantes si nécessaire
        DB::table('produits')
            ->where('statut', 'en stock')
            ->update(['statut' => 'en_stock']);
    }

    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->enum('statut', ['en stock', 'rupture'])->change();
        });
    }
};

