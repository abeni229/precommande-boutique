<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   
</head>
<body>
   

    <form class="big" action="{{ route('login') }}" method="POST">
        @csrf
           <h1>Connexion</h1><br>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div><br>

        <div>
            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        </div><br>

        <button type="submit">Se connecter</button>
    </form>

       
</body>
</html>