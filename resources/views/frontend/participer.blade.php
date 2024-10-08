<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Plateforme de concertation nationale</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logoconcertation.PNG" rel="icon">
  <link href="assets/img/logoconcertation.PNG" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
   

    #formContainer {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 60px auto; /* Ajout d'une marge pour le header */
      max-width: 600px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .section {
      display: none;
    }

    .section.active {
      display: block;
    }

    .question {
      margin: 15px 0;
    }

    .question input[type="text"],
    .question input[type="email"],
    .question input[type="tel"],
    .question select {
      width: calc(100% - 20px);
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .question textarea {
      width: calc(100% - 20px);
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      height: 80px;
    }

    .buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    button {
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      background-color: #007BFF;
      color: white;
      cursor: pointer;
    }

    button:disabled {
      background-color: #ccc;
    }

    .star-rating {
      display: flex;
      justify-content: space-between;
      width: 100px;
      margin: 5px 0;
      cursor: pointer;
    }

    .star {
      font-size: 24px;
      color: #ccc;
    }

    .star.selected {
      color: #FFD700;
    }

    .emoji {
      font-size: 24px;
      text-align: center;
    }
    .question label {
    display: inline-block;
    margin-right: 40px;
}
.required {
  color: red;
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

  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="Logo">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="{{ route('home') }}">Accueil</a></li>

        <li><a href="{{ route('contexte') }}">Contexte</a></li>
    
          <li><a href="{{ route('participation.form') }}">Donnez-nous votre avis</a></li>
          <li><a href="{{ route('login') }}">Connexion</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
</br>
<h1></h1>


<div id="encouragementMessage">
  "Votre voix compte ! En remplissant ce formulaire, vous contribuez à améliorer nos services et à bâtir un avenir meilleur pour tous. <span>💪</span>"
</div>

  <form id="registrationForm" method="POST" action="{{ route('enquete.store') }}">
    @csrf <!-- Protection CSRF -->
    <div id="formContainer">
      
        <div id="section1" class="section active">
            <h2>Identification</h2>
            <div class="question">
                <label>Je suis de <span class="required">(*)</span> :</label><br>
                <label><input type="radio" id="senegal" name="location" value="Senegal" required> Sénégal</label>
                <label><input type="radio" id="diaspora" name="location" value="Diaspora" required> Diaspora</label>
            </div>

            <div id="diasporaCountries" class="question" style="display: none;">
                <label for="country">Sélectionnez votre pays :</label>
                <select id="country" name="country" required>
                    <option value="">Choisir un pays</option>
                    <option value="France">France</option>
                    <option value="États-Unis">États-Unis</option>
                  
                    <option value="Royaume-Uni">Royaume-Uni</option>
                </select>
            </div>

            <div class="question">
                <label for="firstname">Prénom <span class="required">(*)</span> :</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="question">
                <label for="lastname">Nom <span class="required">(*)</span> :</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="question">
                <label for="phone">Numéro de téléphone <span class="required">(*)</span> :</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="question">
                <label for="email">Email <span class="required">(*)</span> :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="question">
                <label for="position">Fonction :</label>
                <input type="text" id="position" name="position">
            </div>
            <div class="buttons">
                <button type="button" id="next1">Suivant</button>
            </div>
        </div>

        <div id="section2" class="section">
            <h4 style="text-align:center">Parlons de votre  perception du Service Public Actuel:</h4>
            <div class="question">
                <label>comment noteriez vous la qualité des services ?<span class="required">(*)</span> :</label>
                <div class="star-rating" data-question="1">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
                <div id="comment1">Satisfaction</div>
                <div class="emoji" id="emoji1">😐</div>
                <input type="hidden" name="service_quality" id="service_quality" value="0"> <!-- Ajouter ce champ pour le rating -->
            </div>
            <div class="question">
                <label for="serviceFeedback">Quels sont les points forts et faiblesses des services ?:</label>
                <textarea id="serviceFeedback" name="service_feedback"></textarea>
            </div>
            <div class="buttons">
                <button type="button" id="prev1">Précédent</button>
                <button type="button" id="next2">Suivant</button>
            </div>
        </div>

        <div id="section3" class="section">
            <h4 style="text-align:center"> Attentes et Priorités pour la Réforme</h4>
            <div class="question">
                <label>Quelles sont les trois principales réformes à mettre en œuvre ?</label>
                <textarea id="reforms" name="reforms" required></textarea>
            </div>
            <div class="buttons">
                <button type="button" id="prev2">Précédent</button>
                <button type="button" id="next3">Suivant</button>
            </div>
        </div>

        <div id="section4" class="section">
            <h4 style="text-align:center"> Implication des Citoyens</h4>
            <div class="question">
                <label>Comment les citoyens pourraient-ils être davantage associés aux décisions ?</label>
                <textarea id="citizenInvolvement" name="citizen_involvement"></textarea>
            </div>
            <div class="buttons">
                <button type="button" id="prev3">Précédent</button>
                <button type="button" id="next4">Suivant</button>
            </div>
        </div>

        <div id="section5" class="section">
            <h4 style="text-align:center"> Autres Commentaires</h4>
            <div class="question">
                <label>Commentaires supplémentaires :</label>
                <textarea id="additionalComments" name="additional_comments"></textarea>
            </div>
            <div class="buttons">
                <button type="button" id="prev4">Précédent</button>
                <button type="submit" id="submit">Soumettre</button>
            </div>
        </div>
    </div>
</form>


<input type="hidden" name="service_quality" id="service_quality" value="0">

<input type="hidden" name="service_quality" id="service_quality" value="">

<script>
  document.addEventListener('DOMContentLoaded', () => {  
    // Gestion de l'affichage des pays pour la Diaspora
    document.getElementById('senegal').addEventListener('change', () => {
      document.getElementById('diasporaCountries').style.display = 'none';
      document.getElementById('country').removeAttribute('required'); // Supprimer required si Sénégal est sélectionné
    });

    document.getElementById('diaspora').addEventListener('change', () => {
      document.getElementById('diasporaCountries').style.display = 'block';
      document.getElementById('country').setAttribute('required', 'required'); // Ajouter required si Diaspora est sélectionné
    });

    // Gestion des sections du formulaire
    const sections = document.querySelectorAll('.section');
    let currentSection = 0;

    function showSection(index) {
      sections.forEach((section, i) => {
        section.classList.toggle('active', i === index);
      });
    }

    // Fonction de validation des champs obligatoires (uniquement pour les champs visibles)
    function checkRequiredFields(section) {
      const inputs = section.querySelectorAll('input[required]:not([style*="display: none"]), select[required]:not([style*="display: none"]), textarea[required]:not([style*="display: none"])');
      let allFilled = true;

      inputs.forEach(input => {
        if (input.type === 'radio') {
          const radioGroup = section.querySelectorAll(`input[name="${input.name}"]`);
          const isChecked = Array.from(radioGroup).some(radio => radio.checked);
          if (!isChecked) {
            allFilled = false;
          }
        } else if (input.tagName === 'SELECT' && input.value === "") {
          allFilled = false;
        } else if (!input.value) {
          allFilled = false;
        }
      });

      if (!allFilled) {
        alert("Veuillez remplir tous les champs obligatoires.");
        return false;
      }

      return true;
    }

    // Navigation avec validation des sections
    document.getElementById('next1').addEventListener('click', () => {
      if (checkRequiredFields(sections[currentSection])) {
        const location = document.querySelector('input[name="location"]:checked');
        if (location && location.value === 'Senegal') {
          document.getElementById('country').value = 'Sénégal'; // Si Sénégal est sélectionné, remplir le pays
        }
        currentSection++;
        showSection(currentSection);
      }
    });

    document.getElementById('next2').addEventListener('click', () => {
      if (checkRequiredFields(sections[currentSection])) {
        currentSection++;
        showSection(currentSection);
      }
    });

    document.getElementById('next3').addEventListener('click', () => {
      if (checkRequiredFields(sections[currentSection])) {
        currentSection++;
        showSection(currentSection);
      }
    });

    document.getElementById('next4').addEventListener('click', () => {
      if (checkRequiredFields(sections[currentSection])) {
        currentSection++;
        showSection(currentSection);
      }
    });

    // Navigation précédente
    document.getElementById('prev1').addEventListener('click', () => {
      currentSection--;
      showSection(currentSection);
    });

    document.getElementById('prev2').addEventListener('click', () => {
      currentSection--;
      showSection(currentSection);
    });

    document.getElementById('prev3').addEventListener('click', () => {
      currentSection--;
      showSection(currentSection);
    });

    document.getElementById('prev4').addEventListener('click', () => {
      currentSection--;
      showSection(currentSection);
    });

    // Gestion du système de notation par étoiles
    const stars1 = document.querySelectorAll('.star-rating[data-question="1"] .star');
    const ratingsText = {
      1: 'Médiocre',
      2: 'Pas satisfaisant',
      3: 'Moyen',
      4: 'Satisfaisant',
      5: 'Très satisfait'
    };

    stars1.forEach(star => {
      star.addEventListener('click', function () {
        const value = this.getAttribute('data-value');
        stars1.forEach(s => {
          s.classList.toggle('selected', s.getAttribute('data-value') <= value);
        });

        // Update comment text based on the selected rating
        const ratingDescription = ratingsText[value];
        document.getElementById('comment1').innerText = ratingDescription;

        // Update service quality to store descriptive rating in the hidden input
        document.getElementById('service_quality').value = ratingDescription; // Store the description in the hidden input
      });
    });
  });
</script>



<!-- Add this somewhere in your HTML to display the quality text -->
<div id="quality_text"></div>


<style>
  .section {
    display: none;
  }

  .section.active {
    display: block;
  }

  .star {
    cursor: pointer;
    font-size: 30px;
    color: gray;
  }

  .star.selected {
    color: gold;
  }

  .required {
    color: red;
  }
</style>
<!-- Pop-up de validation -->
<div id="success-popup" class="popups" style="display: none;">
    <span class="close-btn">&times;</span>
    <p>✔ Merci ! Vos réponses ont été enregistrées. Votre avis contribuera à améliorer les services publics.</p>

</div>
<style>
  .popups {
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: white; /* Couleur de fond blanche */
    color: black; /* Couleur du texte noir */
    padding: 20px;
    border-radius: 5px;
    border: 1px solid #ccc; /* Bordure grise */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Ombre pour un léger effet de profondeur */
    z-index: 1000; /* Assure que le popup est au-dessus des autres éléments */
    display: none; /* Masquer par défaut */
}

.close-btn {
    cursor: pointer;
    float: right;
    font-size: 20px;
    font-weight: bold;
    color: black; /* Couleur du bouton de fermeture */
}

.close-btn:hover {
    color: red; /* Couleur au survol pour un effet */
}

.popups p {
    margin: 10px 0 0; /* Ajuster la marge du texte */
    text-align: center; /* Centrer le texte */
}

</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Vérifiez si le pop-up doit s'afficher
        @if(session('success'))
            const popups = document.getElementById('success-popup');
            popups.style.display = 'block'; // Afficher le pop-up

            // Fermer le pop-up après 3 secondes
            setTimeout(() => {
                popups.style.display = 'none'; // Masquer le pop-up
            }, 3000);
        @endif
    });
</script>



  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>
