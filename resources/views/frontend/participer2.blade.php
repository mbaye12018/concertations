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
.container {
    display: flex; /* Affiche les sections côte à côte */
    height: 100vh; /* Prend toute la hauteur de la fenêtre */
    position: relative; /* Pour gérer le contenu en fonction de l'image */
}

.left-section {
    position: relative; /* Pour positionner les mots */
    width: 50%; /* Largeur de la section gauche */
    height: auto; /* Adapte la hauteur à l'image */
  
 /*     background: url('../assets/img/carte-vierge-senegal.gif') no-repeat center top; Image de fond ajustée vers le haut */
    background-size: 130% 70%; /* Augmente la taille de l'image à 120% de sa largeur et hauteur */
    color: white; /* Couleur du texte */
    overflow: hidden; /* Cache tout débordement */
}



.word {
    position: absolute; /* Permet de positionner les mots n'importe où */
    color: green; /* Couleur dorée pour les mots */
    font-size: 15px; /* Taille de la police */
    text-decoration: none; /* Pas de soulignement */
    font-weight: bold; /* Gras pour les mots */
    transition: transform 0.3s; /* Animation pour le survol */
}

.word:hover {
    transform: scale(1.2); /* Agrandissement lors du survol */
}
.words {
    position: absolute; /* Permet de positionner les mots n'importe où */
    color: grey; /* Couleur dorée pour les mots */
    font-size: 15px; /* Taille de la police */
    text-decoration: none; /* Pas de soulignement */
    font-weight: bold; /* Gras pour les mots */
    transition: transform 0.3s; /* Animation pour le survol */
}

.wordss:hover {
    transform: scale(1.2); /* Agrandissement lors du survol */
}
.wordss {
    position: absolute; /* Permet de positionner les mots n'importe où */
    color: red; /* Couleur dorée pour les mots */
    font-size: 15px; /* Taille de la police */
    text-decoration: none; /* Pas de soulignement */
    font-weight: bold; /* Gras pour les mots */
    transition: transform 0.3s; /* Animation pour le survol */
}

.words:hover {
    transform: scale(1.2); /* Agrandissement lors du survol */
}

/* Positionnement ajusté des mots avec une réduction significative de la hauteur */
.word:nth-child(1) { top: 20%; left: 10%; }
.word:nth-child(2) { top: 5%; left: 20%; }
.word:nth-child(3) { top: 8%; left: 30%; }
.word:nth-child(4) { top: 11%; left: 40%; }
.word:nth-child(5) { top: 14%; left: 15%; }
.word:nth-child(6) { top: 17%; left: 25%; }
.word:nth-child(7) { top: 20%; left: 70%; }
.words:nth-child(8) { top: 23%; left: 55%; }
.words:nth-child(9) { top: 26%; left: 10%; }
.words:nth-child(10) { top: 29%; left: 70%; }
.words:nth-child(11) { top: 32%; left: 85%; }
.words:nth-child(12) { top: 35%; left: 75%; }
.words:nth-child(13) { top: 38%; left: 40%; }
.words:nth-child(14) { top: 41%; left: 30%; }
.words:nth-child(15) { top: 44%; left: 5%; }
.wordss:nth-child(16) { top: 47%; left: 45%; }
.wordss:nth-child(17) { top: 50%; left: 80%; }
.wordss:nth-child(18) { top: 53%; left: 15%; }
.wordss:nth-child(19) { top: 56%; left: 20%; }
.wordss:nth-child(20) { top: 59%; left: 60%; }
.wordss:nth-child(21) { top: 62%; left: 35%; }
.wordss:nth-child(22) { top: 65%; left: 65%; }
.wordss:nth-child(23) { top: 68%; left: 5%; }
.wordss:nth-child(24) { top: 71%; left: 50%; }
.wordss:nth-child(25) { top: 74%; left: 10%; }

.right-section {
    width: 50%; /* Largeur de la section droite */
    padding: 20px; /* Espacement interne */
    color: white; /* Couleur du texte */
}


  </style>
 <script>
    // Fonction pour échanger les contenus des mots de manière aléatoire
function shuffleWordsContent() {
    const container = document.getElementById('left-section');
    const words = Array.from(container.children); // Récupérer tous les mots dans un tableau
    
    // Récupérer les textes de chaque mot
    const texts = words.map(word => word.textContent);
    
    // Mélanger les textes de manière aléatoire
    texts.sort(() => Math.random() - 0.5);

    // Appliquer les textes mélangés à chaque élément de manière ordonnée
    words.forEach((word, index) => {
        word.textContent = texts[index];
    });
}

// Lancer la fonction au démarrage et toutes les 5 secondes
setInterval(shuffleWordsContent, 5000);

 </script>
</head>

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
        <div class="left-section" id="left-section">
            <!-- Ajoutez ici vos mots dispersés -->
            <a href="https://example.com/17" class="word">Sports </a>
            <a href="https://example.com/1" class="word">Police</a>
            <a href="https://example.com/2" class="word">Justice</a>
            <a href="https://example.com/3" class="word">Transport</a>
            <a href="https://example.com/4" class="word">Environnement</a>
            <a href="https://example.com/5" class="word">Formation professionnelle</a>
            <a href="https://example.com/6" class="word">Assainissement</a>
            <a href="https://example.com/7" class="words">Numérique</a>
            <a href="https://example.com/8" class="words">Enseignement supérieur</a>
            <a href="https://example.com/9" class="words">Industrie</a>
            <a href="https://example.com/10" class="words">Commerce</a>
            <a href="https://example.com/11" class="words">Pêches</a>
            <a href="https://example.com/12" class="words">Travail</a>
            <a href="https://example.com/13" class="words">Urbanisme</a>
            <a href="https://example.com/14" class="words">Éducation</a>
            <a href="https://example.com/15" class="wordss">Santé</a>
            <a href="https://example.com/16" class="wordss">Fonction publique</a>
            
            <a href="https://example.com/18" class="wordss">Culture</a>
            <a href="https://example.com/19" class="wordss">Agriculture</a>
            <a href="https://example.com/20" class="wordss">Elevage </a>
            <a href="https://example.com/21" class="wordss">Tourisme</a>
            
        </div>
        <div id="sectionChoice" class="right-section question-step">
            <h2>Nous souhaitons recueillir votre avis sur :</h2>
            <div class="section-options">
                <button onclick="chooseSection(1)">
                    <i class="fas fa-comments"></i>&nbsp; votre perception sur les services publics
                </button>
                <button onclick="chooseSection(2)">
                    <i class="fas fa-cog"></i>&nbsp; Organisation des services publics
                </button>
                <button onclick="chooseSection(3)">
                    <i class="fas fa-users"></i>&nbsp; Les ressources humaines
                </button>
            </div>
        </div>
    </div>

<div id="formContainer" class="form-container">
  <h2>Informations générales</h2>
  <div class="toggle-switch">
    
    <span id="toggleText" style="color:black;margin-top:-2%;margin-left:0%">Voulez vous garder  l'anonymat</span>
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
<div id="questionnaireContainer" class="questionnaire-container">
  <h2 id="sectionTitle">Section</h2>
  <div id="sectionContent"></div>
  <div class="nav-buttons">
    <button type="button" class="nav-btn" onclick="showPreviousSection()">&#8592; Précédent</button>
    <button type="button" class="nav-btn" onclick="endSection()">Suivant &#8594;</button>
    <button type="button" class="end-btn" onclick="endFeedback()">Non, terminer</button>
  </div>
  
</div>

<div id="nextQuestionnaire" class="next-questionnaire" style="display: none;">
  <h3 style="text-align: center;">Voulez-vous donner votre avis sur un autre secteur ?</h3>
  <div id="availableSections" style="text-align: center;">
    <!-- Options générées dynamiquement -->
  </div>
</div>
<script>
let currentSection = 1;
let questionnaireCompleted = false;

// Suivre les sections remplies
const completedSections = new Set(); 

// Définir les questions pour chaque section
const questionnaires = {
  1: [
    {
      question: "Dans quelle mesure êtes-vous satisfait(e) de la qualité des services publics offerts au quotidien ?",
      type: "likert", // Échelle de Likert avec étoiles de 1 à 5
      options: [1, 2, 3, 4, 5]
    },
    {
      question: "Quels sont vos motifs de satisfaction ? (choisissez tous ceux qui s'appliquent)",
      type: "multiple",
      options: [
        "Courtoisie des agents publics",
        "Bonne qualité de l’accueil et de l’orientation",
        "Coût du service",
        "Diligence dans le traitement des dossiers",
        "Traitement des réclamations",
        "Absence de corruption"
      ],
      triggerAdditionalField: true // Ajout du champ si sélectionné
    },
    {
      question: "Quels sont vos motifs d’insatisfaction ? (choisissez tous ceux qui s'appliquent)",
      type: "multiple",
      options: [
        "Grossièreté des agents publics",
        "Mauvaise qualité de l’accueil et de l’orientation",
        "Coût excessif du service",
        "Lenteur dans le traitement des dossiers",
        "Non traitement des réclamations",
        "Victime de tentative de corruption"
      ],
      triggerAdditionalField: true // Ajout du champ si sélectionné
    }
  ],
  2: [
    // Autres questions de la section 2
  ],
  3: [
    // Autres questions de la section 3
  ]
};

function chooseSection(section) {
  currentSection = section;
  document.getElementById('sectionChoice').style.display = 'none';
  document.getElementById('formContainer').style.display = 'block';
  document.getElementById('questionnaireContainer').style.display = 'none';
  document.getElementById('left-section').style.display = 'none';
}

function toggleAnonymat() {
  const anonymatToggle = document.getElementById('anonymatToggle');
  if (anonymatToggle.checked) {
    document.getElementById('identificationForm').style.display = 'none';
    showQuestionnaire();
  } else {
    document.getElementById('identificationForm').style.display = 'block';
  }
}

function showQuestionnaire() {
  document.getElementById('formContainer').style.display = 'none';
  document.getElementById('questionnaireContainer').style.display = 'block';
  document.getElementById('sectionTitle').innerText = "Section " + currentSection + " Questionnaire";
  
  // Récupérer les questions de la section actuelle
  const questions = questionnaires[currentSection];
  const sectionContent = document.getElementById('sectionContent');
  sectionContent.innerHTML = ''; // Vider le contenu précédent

  // Afficher les questions
  questions.forEach((questionObj, index) => {
    const questionElement = document.createElement('div');
    questionElement.innerHTML = `<label>${index + 1}. ${questionObj.question}</label><br>`;

    if (questionObj.type === 'likert') {
      // Créer une échelle de Likert (étoiles)
      for (let i = 1; i <= 5; i++) {
        questionElement.innerHTML += `
          <input type="radio" name="likert-${index}" value="${i}">
          <label>${i} étoile(s)</label>
        `;
      }
    } else if (questionObj.type === 'multiple') {
      // Créer une liste à choix multiple
      questionObj.options.forEach(option => {
        const optionId = `option-${index}-${option}`;
        questionElement.innerHTML += `
          <input type="checkbox" id="${optionId}" name="multiple-${index}" value="${option}" onchange="handleAdditionalFields('${optionId}', ${index})">
          <label for="${optionId}">${option}</label><br>
        `;
      });
    }

    sectionContent.appendChild(questionElement);
  });
}

// Fonction pour gérer l'apparition des champs supplémentaires
function handleAdditionalFields(optionId, index) {
  const isChecked = document.getElementById(optionId).checked;
  let additionalFields = document.getElementById(`additionalFields-${index}`);

  if (!additionalFields) {
    // Créer le conteneur pour les champs supplémentaires s'il n'existe pas encore
    additionalFields = document.createElement('div');
    additionalFields.id = `additionalFields-${index}`;
    document.getElementById(`option-${index}-${optionId}`).parentElement.appendChild(additionalFields);
  }

  // Si coché, ajouter les champs supplémentaires
  if (isChecked) {
    additionalFields.innerHTML = `
      <label>Dans quel service avez-vous vécu cette expérience ?</label>
      <input type="text" name="service-${index}" placeholder="Nom du service"><br>
      <label>Commentaires</label>
      <textarea name="comment-${index}" placeholder="Détails supplémentaires..."></textarea><br>
    `;
  } else {
    additionalFields.innerHTML = ''; // Vider si décoché
  }
}

function showPreviousSection() {
  document.getElementById('formContainer').style.display = 'block';
  document.getElementById('questionnaireContainer').style.display = 'none';
}

function endSection() {
  if (!questionnaireCompleted) {
    completedSections.add(currentSection); // Marquer la section comme remplie
    questionnaireCompleted = true;

    // Vérifiez si toutes les sections sont remplies
    if (completedSections.size === Object.keys(questionnaires).length) {
      // Si toutes les sections sont complètes
      alert('Merci d\'avoir renseigné tout le formulaire !');
      location.reload(); // Recharge la page d'accueil
    } else {
      document.getElementById('questionnaireContainer').style.display = 'none';
      document.getElementById('nextQuestionnaire').style.display = 'block';
      updateAvailableSections(); // Mettre à jour les sections disponibles
    }
  }
}

function updateAvailableSections() {
  const availableSections = document.getElementById('availableSections');
  availableSections.innerHTML = ''; // Vider les options précédentes

  // Vérifier quelles sections sont disponibles
  for (let i = 1; i <= 3; i++) {
    if (!completedSections.has(i)) {
      const button = document.createElement('button');
      button.innerText = `Oui, sur la section ${i}`;
      button.onclick = () => chooseNextSection(i);
      availableSections.appendChild(button);
    }
  }
}

function chooseNextSection(section) {
  currentSection = section;
  document.getElementById('nextQuestionnaire').style.display = 'none';
  showQuestionnaire();
  questionnaireCompleted = false; // Réinitialiser l'état de la section
}

function endFeedback() {
  alert('Merci pour votre avis ! Vous avez terminé.');
  document.getElementById('nextQuestionnaire').style.display = 'none';
}
</script>



</body>

</html>
