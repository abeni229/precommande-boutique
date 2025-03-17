
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Application</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   
</head>
<body>
    <header>
        <h1>Bienvenue sur votre application</h1><br>
        <br>
        
        
      
    </header>
    <main>
        @yield('content')
    </main><br>
    <footer>
        <p>&copy; 2025 Votre Application. Tous droits réservés.</p>
    </footer>
</body>
</html>