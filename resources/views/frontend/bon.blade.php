<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Plateforme de concertation nationale</title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
    /* Général */
    body {
      background-color: #f4f7fc;
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Header - Logo fixé à gauche */
    #header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #ffffff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      padding: 10px 20px;
    }

    #header .container-fluid {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo img {
      height: 50px; /* Ajustez la taille du logo */
    }

    /* Section d'introduction */
    #intro-section {
      text-align: center;
      padding: 120px 0 40px; /* Ajouter un padding pour ne pas chevaucher le header fixe */
      background-color: #ffffff;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      margin-top: 100px; /* Espacement sous le header fixe */
    }

    #sectionChoice h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      font-weight: 600;
      color: #333;
    }

    .section-options button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 15px 30px;
      margin: 10px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 8px;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, opacity 0.5s ease;
      opacity: 0;
      position: relative;
      overflow: hidden;
      width: 100%;
    }

    .section-options button:hover {
      transform: scale(1.1);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

    @keyframes funSlideIn {
      0% {
        transform: translateY(50px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .section-options button:nth-child(1) {
      animation: funSlideIn 0.5s ease forwards;
      animation-delay: 0.3s;
    }

    .section-options button:nth-child(2) {
      animation: funSlideIn 0.5s ease forwards;
      animation-delay: 0.6s;
    }

    /* Encouragement message */
    #encouragementMessage {
      text-align: center;
      font-weight: bold;
      font-size: 1.5em;
      margin: 20px auto;
      max-width: 80%;
      color: black;
      opacity: 0;
      transform: translateY(-20px);
      animation: fadeInMove 2s ease-in-out forwards;
    }

    @keyframes fadeInMove {
      0% {
        opacity: 0;
        transform: translateY(-20px);
      }
      50% {
        opacity: 0.5;
        transform: translateY(0);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsiveness for section layout */
    .flex-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .block-wrapper {
      flex: 1 1 45%; /* Minimum 45% width per block */
      max-width: 500px;
      box-sizing: border-box;
      text-align: center;
    }

    /* Style for buttons */
    .block-wrapper .block {
      padding: 20px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .block-wrapper .block:hover {
      transform: translateY(-10px);
      box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .explanation-text {
      font-size: 0.9rem;
      margin-top: 10px;
      color: #555;
    }

    /* Styling for buttons */
    .btn-primary {
      background-color: #007bff;
      border: none;
      color: white;
      padding: 15px 30px;
      font-size: 18px;
      border-radius: 10px;
      width: 100%;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    /* Adjust layout on small screens */
    @media (max-width: 768px) {
      .flex-container {
        flex-direction: column;
        align-items: center;
      }

      .block-wrapper {
        flex: 1 1 100%;
      }

      #encouragementMessage {
        font-size: 1.2em;
      }
    }
  </style>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="Logo">
      </a>
    </div>
  </header>

  <div id="encouragementMessage">
    Votre avis compte pour bâtir un service public de qualité 💪
  </div>

  <div class="container">
    <!-- Section d'introduction -->
    <div class="intro-section" id="intro-section">
      <h2>Choisissez la manière dont vous souhaitez donner votre avis</h2>
      <div class="section-options">
        <!-- Conteneur Flex pour centrer les blocs -->
        <div class="flex-container">
          <!-- Bloc pour l'avis général -->
          <div class="block-wrapper">
            <div class="block">
              <button onclick="chooseGeneral()">
                <i class="fas fa-comments"></i>&nbsp; Donner mon avis de manière générale
              </button>
              <!-- Texte explicatif sous le bouton, dans le bloc -->
              <p class="explanation-text">
                Donner un avis général permet de partager votre ressenti global sur le service et d'aider les autres à se faire une idée sur la qualité globale.
              </p>
            </div>
          </div>
          <!-- Bloc pour l'avis par secteur -->
          <div class="block-wrapper">
            <div class="block">
              <button onclick="chooseBySector()">
                <i class="fas fa-cogs"></i>&nbsp; Donner mon avis par secteur
              </button>
              <!-- Texte explicatif sous le bouton, dans le bloc -->
              <p class="explanation-text">
                Donner un avis par secteur permet de partager vos impressions détaillées sur des aspects spécifiques du service, afin d'aider à l'améliorer de manière ciblée.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fonction pour afficher l'approche générale
    function chooseGeneral() {
      document.getElementById('intro-section').style.display = 'none';
      alert("Vous avez choisi de donner un avis général.");
    }

    // Fonction pour afficher l'approche par secteur
    function chooseBySector() {
      document.getElementById('intro-section').style.display = 'none';
      alert("Vous avez choisi de donner un avis par secteur.");
    }
  </script>
</body>

</html>
