<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Plateforme de concertation nationale</title>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    /* Style de la section de la question */
    #sectionChoice {
      text-align: center;
      margin-top: 50px;
    }

    #sectionChoice h2 {
      font-size: 24px;
      margin-bottom: 30px;
      font-weight: bold;
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

    .section-options button:before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 300%;
      height: 300%;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      transform: translate(-50%, -50%) scale(0);
      transition: transform 0.5s ease;
    }

    .section-options button:hover:before {
      transform: translate(-50%, -50%) scale(1);
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

    .form-section {
      display: none;
      text-align: center;
      margin-top: 50px;
    }

    .form-section h2 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .form-section label {
      display: block;
      margin: 10px 0;
    }

    .form-section input,
    .form-section select {
      padding: 10px;
      margin: 10px 0;
      width: 80%;
      max-width: 500px;
    }

    .form-section button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-top: 20px;
      cursor: pointer;
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

  <div id="sectionChoice" class="question-step">
    <h2>Sur quelle partie voulez-vous donner votre avis ?</h2>
    <div class="section-options">
      <button onclick="chooseSection(1)">
        <i class="fas fa-comments"></i>&nbsp;Section 1 : Perception sur les Services Publics
      </button>
      <button onclick="chooseSection(2)">
        <i class="fas fa-cog"></i>&nbsp;Section 2 : Gouvernance des services publics
      </button>
      <button onclick="chooseSection(3)">
        <i class="fas fa-users"></i>&nbsp;Section 3 : Les ressources humaines
      </button>
    </div>
  </div>

  <div id="anonymatChoice" class="form-section">
   
    <h2><i class="fas fa-question-circle animated-icon"></i> Voulez-vous donner votre avis de manière anonyme ?</h2>
    <button onclick="proceedAnonymat(true)">Oui</button>
    <button onclick="proceedAnonymat(false)">Non</button>
  </div>

  <div id="generalInfoForm" class="form-section">
    <h2>Informations générales</h2>
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
      <label>Prenom et nom :</label>
      <input type="text" name="residence" id="residenceInput" placeholder="veuillez saisir vos prenom et votre nom"><br>
      <label>Contact :</label>
      <input type="text" name="residence" id="residenceInput" placeholder="veuillez saisir votre contact"><br> 
      <label>Fonction :</label>
      <input type="text" name="residence" id="residenceInput" placeholder="Donnez votre fonction"><br> 
      <button type="button" onclick="showSectionForm()">Continuer</button>
    </form>
  </div>

  <div id="sectionForm" class="form-section">
    <h2 id="sectionTitle">Section</h2>
    <div id="sectionContent"></div>
    <div id="otherSectionsPrompt" style="display: none;">
      <h3>Souhaitez-vous également donner votre avis sur :</h3>
      <button id="nextSection1" style="display: none;" onclick="chooseSection(2)">Section 2 : Gouvernance des services publics</button>
      <button id="nextSection2" style="display: none;" onclick="chooseSection(3)">Section 3 : Les ressources humaines</button>
      <button id="endSurvey" style="display: none;" onclick="endSurvey()">Non, j'ai terminé</button>
    </div>
  </div>

  <script>
    let chosenSection = 0;
    const responses = {
      age: "",
      sexe: "",
      residence: "",
      section1: {},
      section2: {},
      section3: {}
    };

    function chooseSection(sectionId) {
      chosenSection = sectionId;
      document.getElementById('sectionChoice').style.display = 'none';
      document.getElementById('anonymatChoice').style.display = 'block';
    }

    function proceedAnonymat(isAnonymous) {
      document.getElementById('anonymatChoice').style.display = 'none';
      if (isAnonymous) {
        showSectionForm();
      } else {
        document.getElementById('generalInfoForm').style.display = 'block';
      }
    }

    function showSectionForm() {
      document.getElementById('generalInfoForm').style.display = 'none';
      document.getElementById('sectionForm').style.display = 'block';

      let sectionTitle = "";
      let sectionContent = "";
      let remainingSections = [];

      switch (chosenSection) {
        case 1:
          sectionTitle = "Section 1 : Perception sur les Services Publics";
          sectionContent = `
            <label>Dans quelle mesure êtes-vous satisfait(e) de la qualité des services publics ?</label>
            <input type="text" placeholder="Votre réponse" onchange="saveResponse('section1', 'satisfaction', this.value)">
            <label>Quels sont vos motifs de satisfaction ?</label>
            <input type="text" placeholder="Votre réponse" onchange="saveResponse('section1', 'motifsSatisfaction', this.value)">
            <label>Quels sont vos motifs d'insatisfaction ?</label>
            <input type="text" placeholder="Votre réponse" onchange="saveResponse('section1', 'motifsInsatisfaction', this.value)">
          `;
          remainingSections = [2, 3];
          break;
        case 2:
          sectionTitle = "Section 2 : Gouvernance des services publics";
          sectionContent = `
            <label>Les procédures administratives sont-elles longues ?</label>
            <input type="text" placeholder="Votre réponse" onchange="saveResponse('section2', 'proceduresLongues', this.value)">
            <label>Les responsables sont-ils accessibles ?</label>
            <input type="text" placeholder="Votre réponse" onchange="saveResponse('section2', 'responsablesAccessibles', this.value)">
          `;
          remainingSections = [1, 3];
          break;
        case 3:
          sectionTitle = "Section 3 : Les ressources humaines";
          sectionContent = `
            <label>Êtes-vous satisfait(e) du personnel des services publics ?</label>
            <input type="text" placeholder="Votre réponse" onchange="saveResponse('section3', 'satisfactionPersonnel', this.value)">
            <label>Quels changements aimeriez-vous voir ?</label>
            <input type="text" placeholder="Votre réponse" onchange="saveResponse('section3', 'changementsSouhaites', this.value)">
          `;
          remainingSections = [1, 2];
          break;
        default:
          sectionTitle = "Section non trouvée";
      }

      document.getElementById('sectionTitle').innerText = sectionTitle;
      document.getElementById('sectionContent').innerHTML = sectionContent;

      // Afficher les sections restantes
      document.getElementById('otherSectionsPrompt').style.display = 'block';
      remainingSections.forEach((sec, index) => {
        document.getElementById(`nextSection${index + 1}`).style.display = "block";
      });
      document.getElementById('endSurvey').style.display = "block";
    }

    function saveResponse(section, question, value) {
      responses[section][question] = value;
    }

    function endSurvey() {
      alert("Merci d'avoir participé à l'enquête !");
      // Vous pouvez ajouter ici le code pour soumettre les résultats ou rediriger vers une autre page
      console.log(responses); // Affiche les réponses dans la console
    }
  </script>

</body>

</html>

