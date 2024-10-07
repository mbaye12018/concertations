<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Ajustez le chemin si nécessaire -->
</head>
<body>
    <header>
        <h1>Panneau Admin</h1>
    </header>
    <main>
        <h2>Bienvenue, {{ Auth::user()->prenom }} {{ Auth::user()->nom }} !</h2>
        <p>Vous avez accès à toutes les fonctionnalités d'administration.</p>
        <!-- Ajoutez ici les fonctionnalités administratives -->
    </main>
</body>
</html>
