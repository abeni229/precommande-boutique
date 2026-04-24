<?php

namespace Tests\Unit;

use App\Models\Produit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProduitTest extends TestCase
{
    use RefreshDatabase;

    public function test_produit_en_stock()
    {
        $produit = Produit::factory()->create([
            'statut' => Produit::STATUT_EN_STOCK,
            'quantite' => 10,
        ]);

        $this->assertTrue($produit->estEnStock());
        $this->assertFalse($produit->estEnRupture());
    }

    public function test_produit_en_rupture()
    {
        $produit = Produit::factory()->create([
            'statut' => Produit::STATUT_RUPTURE,
            'quantite' => 0,
        ]);

        $this->assertFalse($produit->estEnStock());
        $this->assertTrue($produit->estEnRupture());
    }

    public function test_decrementer_stock()
    {
        $produit = Produit::factory()->create([
            'statut' => Produit::STATUT_EN_STOCK,
            'quantite' => 5,
        ]);

        $result = $produit->decrementerStock(2);

        $this->assertTrue($result);
        $this->assertEquals(3, $produit->fresh()->quantite);
    }

    public function test_produit_passe_en_rupture_quand_stock_zero()
    {
        $produit = Produit::factory()->create([
            'statut' => Produit::STATUT_EN_STOCK,
            'quantite' => 1,
        ]);

        $produit->decrementerStock(1);

        $this->assertEquals(Produit::STATUT_RUPTURE, $produit->fresh()->statut);
    }
}
