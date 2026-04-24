<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmation de commande</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h1 style="color: #2563eb;">Commande confirmée ✓</h1>
        
        <p>Bonjour {{ $client->nom }},</p>
        
        <p>Nous avons bien reçu votre commande. Voici les détails :</p>
        
        <div style="background-color: #f3f4f6; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h2 style="margin-top: 0;">Commande #{{ $commande->id }}</h2>
            <p><strong>Produit :</strong> {{ $produit->nom }}</p>
            <p><strong>Prix :</strong> {{ number_format($produit->prix, 2) }} FCFA</p>
            <p><strong>Statut :</strong> {{ Commande::ETATS[$commande->etat] }}</p>
            <p><strong>Adresse de livraison :</strong> {{ $commande->adresse }}</p>
        </div>
        
        @if($commande->etat === 'en_attente')
            <p>Votre produit est actuellement en rupture de stock. Nous vous notifierons dès qu'il sera de nouveau disponible.</p>
        @else
            <p>Votre commande sera traitée dans les plus brefs délais.</p>
        @endif
        
        <p style="margin-top: 30px;">Cordialement,<br>L'équipe ViteCom</p>
    </div>
</body>
</html>
```




