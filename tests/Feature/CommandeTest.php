<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;
use App\Services\CommandeService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommandeTest extends TestCase
{
    use RefreshDatabase;

    protected CommandeService $commandeService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->commandeService = app(CommandeService::class);
    }

    public function test_creer_commande_produit_en_stock()
    {
        $client = Client::factory()->create();
        $produit = Produit::factory()->create([
            'statut' => Produit::STATUT_EN_STOCK,
            'quantite' => 10,
        ]);

        $commande = $this->commandeService->creerCommande($client, $produit, [
            'adresse' => '123 Rue Test',
        ]);

        $this->assertEquals(Commande::ETAT_VALIDEE, $commande->etat);
        $this->assertEquals(9, $produit->fresh()->quantite);
    }

    public function test_creer_commande_produit_en_rupture()
    {
        $client = Client::factory()->create();
        $produit = Produit::factory()->create([
            'statut' => Produit::STATUT_RUPTURE,
            'quantite' => 0,
        ]);

        $commande = $this->commandeService->creerCommande($client, $produit, [
            'adresse' => '123 Rue Test',
        ]);

        $this->assertEquals(Commande::ETAT_EN_ATTENTE, $commande->etat);
        $this->assertEquals(0, $produit->fresh()->quantite);
    }

    public function test_valider_commande()
    {
        $commande = Commande::factory()->create([
            'etat' => Commande::ETAT_EN_ATTENTE,
        ]);
        
        $commande->produit->update([
            'statut' => Produit::STATUT_EN_STOCK,
            'quantite' => 5,
        ]);

        $result = $this->commandeService->validerCommande($commande);

        $this->assertTrue($result);
        $this->assertEquals(Commande::ETAT_VALIDEE, $commande->fresh()->etat);
    }
}

