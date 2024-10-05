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
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

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
          <li><a href="#">Accueil</a></li>
          <li><a href="#services">Thèmes</a></li>
          <li><a href="{{ route('participation.form') }}">Donnez-nous votre avis</a></li>
          <li><a href="{{ route('login') }}">Connexion</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <div id="formContainer">
    <div id="section1" class="section active">
      <h2>Identification</h2>
      <div class="question">
        <label>Je suis de :</label><br>
        <label><input type="checkbox" id="senegal" name="location" value="Senegal"> Sénégal</label><br>
        <label><input type="checkbox" id="diaspora" name="location" value="Diaspora"> Diaspora</label><br>
      </div>
      <div id="diasporaCountries" class="question" style="display: none;">
        <label for="country">Sélectionnez votre pays :</label>
        <select id="country">
          <option value="">Choisir un pays</option>
          <option value="France">France</option>
          <option value="États-Unis">États-Unis</option>
          <option value="Canada">Canada</option>
          <option value="Royaume-Uni">Royaume-Uni</option>
        </select>
      </div>
      <div class="question">
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" required>
      </div>
      <div class="question">
        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" required>
      </div>
      <div class="question">
        <label for="phone">Numéro de téléphone :</label>
        <input type="tel" id="phone" required>
      </div>
      <div class="question">
        <label for="email">Email :</label>
        <input type="email" id="email" required>
      </div>
      <div class="question">
        <label for="position">Fonction :</label>
        <input type="text" id="position">
      </div>
      <div class="buttons">
        <button id="next1">Suivant</button>
      </div>
    </div>

    <div id="section2" class="section">
      <h2>Section 1 : Perception du Service Public Actuel</h2>
      <div class="question">
        <label>Qualité des services :</label>
        <div class="star-rating" data-question="1">
          <span class="star" data-value="1">★</span>
          <span class="star" data-value="2">★</span>
          <span class="star" data-value="3">★</span>
          <span class="star" data-value="4">★</span>
          <span class="star" data-value="5">★</span>
        </div>
        <div class="emoji" id="emoji1">😐</div>
      </div>
      <div class="question">
        <label for="serviceFeedback">Points forts et faiblesses des services :</label>
        <textarea id="serviceFeedback"></textarea>
      </div>
      <div class="buttons">
        <button id="prev1">Précédent</button>
        <button id="next2">Suivant</button>
      </div>
    </div>

    <div id="section3" class="section">
      <h2>Section 2 : Attentes et Priorités pour la Réforme</h2>
      <div class="question">
        <label>Quelles sont les trois principales réformes à mettre en œuvre ?</label>
        <textarea id="reforms" required></textarea>
      </div>
      <div class="buttons">
        <button id="prev2">Précédent</button>
        <button id="next3">Suivant</button>
      </div>
    </div>

    <div id="section4" class="section">
      <h2>Section 3 : Implication des Citoyens</h2>
      <div class="question">
        <label>Comment les citoyens pourraient-ils être davantage associés aux décisions ?</label>
        <textarea id="citizenInvolvement"></textarea>
      </div>
      <div class="buttons">
        <button id="prev3">Précédent</button>
        <button id="submit">Soumettre</button>
      </div>
    </div>

    <div id="section5" class="section">
      <h2>Section 4 : Autres Commentaires</h2>
      <div class="question">
        <label>Commentaires supplémentaires :</label>
        <textarea id="additionalComments"></textarea>
      </div>
      <div class="buttons">
        <button id="prev4">Précédent</button>
        <button id="submitFinal">Soumettre</button>
      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    document.getElementById('senegal').addEventListener('change', function () {
      document.getElementById('diasporaCountries').style.display = this.checked ? 'none' : 'block';
    });

    document.getElementById('diaspora').addEventListener('change', function () {
      document.getElementById('diasporaCountries').style.display = this.checked ? 'block' : 'none';
    });

    // Gestion des sections
    const sections = document.querySelectorAll('.section');
    let currentSection = 0;

    function showSection(index) {
      sections.forEach((section, i) => {
        section.classList.toggle('active', i === index);
      });
    }

    document.getElementById('next1').addEventListener('click', () => {
      currentSection++;
      showSection(currentSection);
    });

    document.getElementById('prev1').addEventListener('click', () => {
      currentSection--;
      showSection(currentSection);
    });

    document.getElementById('next2').addEventListener('click', () => {
      currentSection++;
      showSection(currentSection);
    });

    document.getElementById('prev2').addEventListener('click', () => {
      currentSection--;
      showSection(currentSection);
    });

    document.getElementById('next3').addEventListener('click', () => {
      currentSection++;
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

    document.getElementById('submit').addEventListener('click', () => {
      alert('Form submitted!');
    });

    document.getElementById('submitFinal').addEventListener('click', () => {
      alert('Final form submitted!');
    });

    const stars1 = document.querySelectorAll('.star-rating[data-question="1"] .star');

// Ajout des commentaires associés à chaque niveau de satisfaction
const comments = ['Mécontent', 'Pas satisfait', 'Satisfait', 'Très satisfait', 'Excellent'];

stars1.forEach((star, index) => {
  star.addEventListener('click', () => {
    // Réinitialiser la sélection des étoiles
    stars1.forEach((s) => s.classList.remove('selected'));

    // Ajouter la classe 'selected' aux étoiles jusqu'à l'étoile cliquée
    for (let i = 0; i <= index; i++) {
      stars1[i].classList.add('selected');
    }

    // Mise à jour de l'emoji correspondant
    document.getElementById('emoji1').textContent = ['😡', '😐', '🙂', '😊', '😍'][index];

    // Affichage du commentaire associé
    document.getElementById('comment1').textContent = comments[index];
  });
});

  </script>

</body>

</html>
