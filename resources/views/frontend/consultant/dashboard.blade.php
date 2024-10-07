<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau Consultant</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Ajustez le chemin si nécessaire -->
</head>
<body>
    <header>
        <h1>Panneau Consultant</h1>
    </header>
    <main>
        <h2>Bienvenue, {{ Auth::user()->prenom }} {{ Auth::user()->nom }} !</h2>
        <p>Vous avez accès à toutes les fonctionnalités de consultation.</p>
        <!-- Ajoutez ici les fonctionnalités de consultant -->
    </main>
</body>
</html>
