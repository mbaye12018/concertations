<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Plateforme de concertation nationale</title>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    /* Permet au contenu d'être au-dessus du pseudo-élément 
 html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    position: relative;
    z-index: 1; 
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('../assets/img/girage.png');
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat;
    background-attachment: fixed; 
    opacity: 0.5; 
    z-index: -1; 
}*/


    #sectionChoice {
      text-align: center;
      margin-top: 50px;
    }

    #sectionChoice h2 {
      font-size: 24px;
      margin-bottom: 30px;
      font-weight: ;
      color: #333;
    }

    .section-options {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .section-options button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 15px 30px;
      margin: 10px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 10px;
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, opacity 0.5s ease;
      opacity: 0;
      position: relative;
      overflow: hidden;
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

    .section-options button:nth-child(3) {
      animation: funSlideIn 0.5s ease forwards;
      animation-delay: 0.9s;
    }
    .section-options button:nth-child(4) {
      animation: funSlideIn 0.5s ease forwards;
      animation-delay: 0.9s;
    }

    .form-container {
      display: none;
      text-align: center;
      margin-top: 50px;
      max-width: 600px;
      margin: 50px auto;
    }

    .form-container h2 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .form-container label {
      display: block;
      margin: 10px 0;
    }

    .form-container input,
    .form-container select {
      padding: 10px;
      margin: 10px 0;
      width: 80%;
      max-width: 500px;
    }

    .form-container button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-top: 20px;
      cursor: pointer;
    }

    .toggle-switch {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:checked + .slider:before {
      transform: translateX(26px);
    }

    .questionnaire-container {
      display: none;
      text-align: center;
      margin-top: 50px;
      max-width: 800px;
      margin: 50px auto;
    }

    .nav-buttons {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
    }

    .nav-buttons button {
      padding: 10px 20px;
      font-size: 16px;
    }

    .next-questionnaire {
      margin-top: 30px;
      display: none;
    }

    .next-questionnaire h3 {
      margin-bottom: 20px;
    }

    .next-questionnaire button {
      padding: 10px 20px;
      font-size: 18px;
      margin: 10px;
    }

#encouragementMessage {
    text-align: center;
    font-weight: bold;
    font-size: 1.5em;
    margin: 20px auto; /* Centrage horizontal et espace au-dessus et au-dessous */
    max-width: 80%; /* Limite la largeur à 80% de la page */
    color: black;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMove 2s ease-in-out forwards;
  }
  #encouragementMessages {
    text-align: center;
    font-weight: ;
    font-size: 1em;
    margin: 50px auto; /* Centrage horizontal et espace au-dessus et au-dessous */
    max-width: 38%; /* Limite la largeur à 80% de la page */
    color: black;
    text-align:justify;
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

  /* Ajouter un léger effet clignotant pour l'emoji 💪 */
  #encouragementMessage span {
    animation: pulse 1.5s infinite;
  }

  @keyframes pulse {
    0%, 100% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.2);
    }
  }
  .navmenu a.active {
    background-color: #f0f0f0; /* Couleur de fond désirée */
    color: #000; /* Couleur du texte désirée */
}
.questionnaire-container {
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #f9f9f9;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

#sectionTitle {
  text-align: center;
  color: #333;
}

.nav-buttons {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.nav-btn, .end-btn {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 15px;
  margin: 0 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.nav-btn:hover, .end-btn:hover {
  background-color: #0056b3;
}

.end-btn {
  background-color: #dc3545; /* Couleur rouge pour le bouton de terminaison */
}

.end-btn:hover {
  background-color: #c82333;
}
</style>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }

      
        .question-step {
            margin-bottom: 20px;
           
            padding: 1px;
            border-radius: 5px;
        }

        .section-options button {
            display: block;
            margin: 5px 0;
            padding: 10px;
            cursor: pointer;
        }

        .form-container, .questionnaire-container, .next-questionnaire {
            margin-top: 20px;
        }

        .nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            margin-left: 10px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
        .right-section{
       
        margin-top:50px;

        
        }
        

    </style>
</head>
<body>



<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="Logo">
      </a>
    </div>
  </header><div id="encouragementMessage">
  Votre avis compte pour bâtir un service public de qualité 💪
</div>
<h5 id="encouragementMessages">
Madame, Monsieur,

Nous vous remercions de consacrer quelques instants de votre temps pour répondre à notre questionnaire. Vos réponses sont essentielles pour nous permettre d'améliorer la qualité de nos services et mieux répondre à vos attentes.
</h5>
<div class="container">
    <!-- Section d'approche par secteur -->
    <div class="left-section" id="left-section">
        <div id="sectionChoice" class="right-section question-step">
            <h2>Approche par secteur :</h2>
            <div class="section-options">
                <button onclick="chooseSection(1)">
                    <i class="fas fa-comments"></i>&nbsp; donner votre avis sur le secteur de la Santé
                </button>
                <button onclick="chooseSection(2)">
                    <i class="fas fa-cog"></i>&nbsp; donner votre avis sur le secteur de l'Éducation
                </button>
                <button onclick="chooseSection(3)">
                    <i class="fas fa-users"></i>&nbsp; donner votre avis sur le secteur de la Sécurité
                </button>
                <button onclick="toggleOtherSector()">
                    <i class="fas fa-users"></i>&nbsp; Autres
                </button>
                
                <!-- Liste déroulante qui est masquée par défaut -->
                <div id="other-sectors" style="display: none; margin-top: 10px;">
                    <label for="sector-list">Veuillez choisir le secteur concerné :</label>
                    <select id="sector-list" onchange="chooseOtherSector()">
                        <option value="" disabled selected>Choisir un secteur</option>
                        <option value="sports">Sports</option>
                        <option value="police">Police</option>
                        <option value="justice">Justice</option>
                        <option value="transport">Transport</option>
                        <option value="environnement">Environnement</option>
                        <option value="formation">Formation professionnelle</option>
                        <option value="assainissement">Assainissement</option>
                        <option value="numerique">Numérique</option>
                        <option value="enseignement">Enseignement supérieur</option>
                        <option value="industrie">Industrie</option>
                        <option value="commerce">Commerce</option>
                        <option value="peches">Pêches</option>
                        <option value="travail">Travail</option>
                        <option value="urbanisme">Urbanisme</option>
                        <option value="education">Éducation</option>
                        <option value="sante">Santé</option>
                        <option value="fonction-publique">Fonction publique</option>
                        <option value="culture">Culture</option>
                        <option value="agriculture">Agriculture</option>
                        <option value="elevage">Élevage</option>
                        <option value="tourisme">Tourisme</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Section d'approche par service public -->
    <div class="right-section" id="sectionChoice2">
        <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approche par section :</h4>
    </br>
        <div class="section-options">
            <button onclick="chooseSection(4)">
                <i class="fas fa-comments"></i>&nbsp; votre perception sur les services publics
            </button>
            <button onclick="chooseSection(5)">
                <i class="fas fa-cog"></i>&nbsp; Organisation des services publics
            </button>
            <button onclick="chooseSection(6)">
                <i class="fas fa-users"></i>&nbsp; Les ressources humaines
            </button>
        </div>
    </div>
</div>

<!-- Formulaire d'identification -->
<div id="formContainer" class="form-container" style="display:none;">
    <h2>Informations générales</h2>
    <div class="toggle-switch">
        <span id="toggleText" style="color:black;margin-top:-2%;margin-left:0%">Voulez vous garder l'anonymat</span>
    </div>
    <label class="switch" style="margin-top:;margin-left:45%">
        <input type="checkbox" id="anonymatToggle" onclick="toggleAnonymat()">
        <span class="slider"></span>
    </label>
    <div id="identificationForm">
        <form id="generalForm">
            <label>Âge :</label>
            <select name="age" id="ageSelect">
                <option value="moins18">Moins de 18 ans</option>
                <option value="18-30">18-30 ans</option>
                <option value="31-45">31-45 ans</option>
                <option value="46-60">46-60 ans</option>
                <option value="plus60">Plus de 60 ans</option>
            </select>
            <label>Sexe :</label>
            <select name="sexe" id="sexeSelect">
                <option value="masculin">Masculin</option>
                <option value="feminin">Féminin</option>
            </select>
            <label>Lieu de résidence :</label>
            <input type="text" name="residence" id="residenceInput" placeholder="Ville / Région"><br>
            <label>Prénom et nom :</label>
            <input type="text" name="prenomNom" id="prenomNom" placeholder="Prénom et Nom"><br>
            <label>Contact :</label>
            <input type="text" name="contact" id="contactInput" placeholder="Votre contact"><br>
            <label>Fonction :</label>
            <input type="text" name="fonction" id="fonctionInput" placeholder="Votre fonction"><br>
            <button type="button" onclick="showQuestionnaire()">Suivant</button>
        </form>
    </div>
</div>

<!-- Contenu du questionnaire -->
<div id="questionnaireContainer" class="questionnaire-container" style="display:none;">
    <h2 id="sectionTitle">Section</h2>
    <div id="sectionContent"></div>
    <div class="nav-buttons">
        <button type="button" class="nav-btn" onclick="showPreviousSection()">&#8592; Précédent</button>
        <button type="button" class="nav-btn" onclick="endSection()">Suivant &#8594;</button>
        <button type="button" class="end-btn" onclick="endFeedback()">Non, terminer</button>
    </div>
</div>

<!-- Suivi du questionnaire -->
<div id="nextQuestionnaire" class="next-questionnaire" style="display: none;">
    <h3 style="text-align: center;">Voulez-vous donner votre avis sur un autre secteur ?</h3>
    <div id="availableSections" style="text-align: center;">
        <!-- Options générées dynamiquement -->
    </div>
    <button type="button" onclick="restart()">Oui, recommencer</button>
    <button type="button" onclick="finishSurvey()">Non, terminer</button>
</div>

<script>
    let currentStep = 0;
    let currentSection = '';

    function chooseSection(section) {
        currentSection = section;
        document.getElementById('formContainer').style.display = 'block';
        document.getElementById('left-section').style.display = 'none';
        document.getElementById('sectionChoice2').style.display = 'none';
    }

    function toggleOtherSector() {
        const otherSectorsDiv = document.getElementById('other-sectors');
        if (otherSectorsDiv.style.display === 'none') {
            otherSectorsDiv.style.display = 'block';
        } else {
            otherSectorsDiv.style.display = 'none';
        }
    }

    function chooseOtherSector() {
        const sectorSelect = document.getElementById('sector-list');
        currentSection = sectorSelect.value;
        document.getElementById('formContainer').style.display = 'block';
        document.getElementById('left-section').style.display = 'none';
        document.getElementById('sectionChoice2').style.display = 'none';
    }

    function toggleAnonymat() {
        const isChecked = document.getElementById('anonymatToggle').checked;
        const toggleText = document.getElementById('toggleText');
        toggleText.innerText = isChecked ? "Vous avez choisi de rester anonyme" : "Voulez-vous garder l'anonymat";
    }

    function showQuestionnaire() {
        document.getElementById('formContainer').style.display = 'none';
        document.getElementById('questionnaireContainer').style.display = 'block';
        loadSectionContent(currentSection);
    }

    function loadSectionContent(section) {
        // Charge le contenu de la section sélectionnée ici
        document.getElementById('sectionTitle').innerText = `Section: ${section}`;
        document.getElementById('sectionContent').innerText = `Voici les questions pour la section ${section}.`; // Remplacez par le contenu réel
    }

    function showPreviousSection() {
        // Gérer l'affichage de la section précédente
    }

    function endSection() {
        document.getElementById('questionnaireContainer').style.display = 'none';
        document.getElementById('nextQuestionnaire').style.display = 'block';
    }

    function endFeedback() {
        alert("Merci pour votre retour !");
        // Ici, vous pouvez rediriger vers une autre page ou faire une autre action
    }

    function restart() {
        currentStep = 0;
        document.getElementById('nextQuestionnaire').style.display = 'none';
        document.getElementById('left-section').style.display = 'block';
        document.getElementById('sectionChoice2').style.display = 'block';
    }

    function finishSurvey() {
        alert("Merci d'avoir terminé le questionnaire !");
        // Action à effectuer à la fin du questionnaire
    }
</script>

</body>

</html>