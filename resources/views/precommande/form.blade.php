<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Précommande</title>
</head>
<body>



<form class="big" action="{{ route('commande.store') }}" method="POST">
    
    @csrf
    <input type="hidden" name="produit_id" value="{{ $produit->id }}">

    <label for="nom">Nom :</label>
    <input type="text" name="nom" required><br>
   <br>

    <label for="email">Email :</label>
    <input type="email" name="email" required><br>
    <br>

    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" required><br>
    <br>

    <button type="submit">Passer la commande</button>
</form>
 


</body>
</html>
