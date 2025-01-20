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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet">
  <link href="/concertations/resources/css/styles.css" rel="stylesheet">
<style>

  #formContainer {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 60px auto; /* Ajout d'une marge pour le header */
      max-width: 650px;
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
  .navmenu a.active {
    background-color: #f0f0f0; /* Couleur de fond désirée */
    color: #000; /* Couleur du texte désirée */
}

/* CSS pour les animations de transition */
.section {
  opacity: 0;
  transition: opacity 0.5s ease-in-out; /* Transition pour l'animation de l'opacité */
  transform: translateX(-100%);
  transition: transform 0.5s ease-in-out;
}

.section.active {
  opacity: 1;
  transform: translateX(0);
}

.section:not(.active) {
  display: none;
}


.location-options {
    display: flex;
    align-items: center; /* Aligns items vertically centered */
}

.location-options label {
    margin-right: 20px; /* Space between the radio buttons */
}



        .question {
            margin-bottom: 20px; /* Espace entre les questions */
            padding: 10px;
            background: #fff;
            border-radius: 8px;

        }

        .question label {
            display: flex;
            align-items: center; /* Centre l'icône et le texte */
            color: #555; /* Couleur du texte des étiquettes */
        }

        .question label i {
            margin-right: 8px; /* Espace entre l'icône et le texte */
            font-size: 1.2em; /* Taille de l'icône */
        }

        /* Couleurs des icônes */
        .fa-map-marker-alt {
            color: #007bff; /* Bleu pour l'icône de localisation */
        }

        .fa-user {
            color: #28a745; /* Vert pour l'icône de nom */
        }

        .fa-envelope {
            color: #17a2b8; /* Cyan pour l'icône de contact */
        }

        .fa-briefcase {
            color: #ffc107; /* Jaune pour l'icône de fonction */
        }

        input[type="text"],
        select {
            width: 100%; /* Prend toute la largeur */
            padding: 10px; /* Espace à l'intérieur des champs */
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 8px; /* Espace au-dessus du champ */
        }

        input[type="radio"] {
            margin-right: 5px; /* Espace entre le bouton radio et le texte */
        }

        .location-options {
            margin-bottom: 15px; /* Espace entre les options de localisation */
        }

        .star-rating {
    font-size: 30px; /* Augmente la taille des étoiles */
}

.star {
    margin-right: 10px; /* Ajoute de l'espace entre les étoiles */
    cursor: pointer; /* Change le curseur au survol pour indiquer que c'est cliquable */
}

/* Ajoute un effet de couleur lors de la sélection */
.star:hover,
.star.selected {
    color: gold; /* Change la couleur des étoiles survolées ou sélectionnées */
}
#satisfactionMessage {
    display: inline-block; /* Permet de manipuler la taille */
    transition: transform 0.3s ease; /* Transition pour l'animation */
}

.enlarge {
    transform: scale(1.5); /* Agrandit l'émoji */
}
.flex-container {
        display: flex;
        justify-content: space-between; /* Espace entre les deux champs */
        margin: 20px 0; /* Ajoute un espacement vertical */
    }

    fieldset {
        width: 45%; /* Largeur des fieldsets */
    }



    .toggle-anonymity {
    display: flex;
    align-items: center;
    font-size: 16px;
    margin: 10px 0;
}

.toggle-label {
    margin-right: 10px;
    font-weight: bold;
}

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0; /* Hide the checkbox */
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
    border-radius: 34px;
    transition: background-color 0.4s;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    border-radius: 50%;
    transition: transform 0.4s;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

input:checked + .slider {
    background-color: #4caf50; /* Green when checked */
}

input:checked + .slider:before {
    transform: translateX(26px); /* Move the slider */
}

/* Add a hover effect */
.switch:hover .slider {
    background-color: #b3e6b3; /* Light green on hover */
}

</style>


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="Logo">
      </a>

      <nav id="navmenu" class="navmenu">
    <ul>
        <li>
            <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a>
        </li>
        <li>
            <a href="{{ route('contexte') }}">Contexte</a>
        </li>
        <li>
            <a href="{{ route('objectif') }}">objectif</a>
        </li>
        <li>
            <a href="{{ route('participation.form') }}">Donnez-nous votre avis</a>
        </li>
        <li>
            <a href="{{ route('login') }}">Connexion</a>
        </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
    </div>
  </header>
</br>
<h1></h1>


<div id="encouragementMessage">
Votre avis compte pour bâtir un service public de qualité 💪
</div>

<form id="registrationForm" method="POST" action="{{ route('enquete.store') }}">
    @csrf
    <div id="formContainer">
        <!-- Section 1: Identification -->
        <div id="section1" class="section active">
            <h2>Identification <i class="fas fa-user"></i></h2>
            <div class="question">
                <label><i class="fas fa-map-marker-alt"></i> Lieu de résidence :</label><br>
                <div class="location-options">
                    <label>
                        <input type="radio" id="senegal" name="location" value="Senegal" onchange="toggleRegionSelect()"> Sénégal
                    </label>
                    <label>
                        <input type="radio" id="diaspora" name="location" value="Diaspora" onchange="toggleRegionSelect()"> Diaspora
                    </label>
                </div>

                <div id="region-container" style="display: none;">
                    <label for="region">Choisissez une région :</label>
                    <select id="region" onchange="updateDepartments()">
                        <option value="">-- Sélectionnez une région --</option>
                    </select>
                </div>

                <div id="department-container" style="display: none;">
                    <label for="department">Choisissez un département :</label>
                    <select id="department"></select>
                </div>

                <div id="diasporaCountries" class="question" style="display: none;">
                    <label for="country">Sélectionnez votre pays :</label>
                    <select id="country" name="country">
                        <option value="">Choisir un pays</option>
                        <option value="France">France</option>
                        <option value="États-Unis">États-Unis</option>
                        <option value="Royaume-Uni">Royaume-Uni</option>
                    </select>
                </div>

                <div class="question toggle-anonymity">
                    <span class="toggle-label">Voulez-vous garder l'anonymat</span>
                    <label class="switch">
                        <input type="checkbox" id="toggleFields" onchange="toggleFields()">
                        <span class="slider"></span>
                    </label>
                </div>

                <div id="identificationFields">
                    <div class="question">
                        <label for="nom"><i class="fas fa-user"></i> Prénom et nom :</label>
                        <input type="text" id="nom" name="nom">
                    </div>
                    <div class="question">
                        <label for="contact"><i class="fas fa-envelope"></i> Contact :</label>
                        <input type="text" id="contact" name="contact" placeholder="Email ou téléphone">
                    </div>
                    <div class="question">
                        <label for="fonction"><i class="fas fa-briefcase"></i> Fonction :</label>
                        <input type="text" id="fonction" name="fonction">
                    </div>
                </div>

                <div class="buttons">
                    <p></p>
                    <button type="button" id="next1" class="btn-green">Suivant &#8594;</button>
                </div>
            </div>
        </div>
       <!-- Section 2: Perception du Service Public -->
        <div id="section2" class="section">
    <h4 style="text-align:center">
        <i class="" style="margin-right: 8px; color: #007bff;"></i>
        Sur quel secteur voulez-vous donner votre avis ?
    </h4>
<br>
    <!-- Blocs de secteurs -->
    <div class="sector-blocks" id="sectorBlocks">
        <div class="sector-block" id="healthBlock">
            <h5><i class="fas fa-hospital-symbol"></i> Santé</h5>
        </div>
        <div class="sector-block" id="educationBlock">
            <h5><i class="fas fa-school"></i> Éducation</h5>
        </div>

        <div class="sector-block" id="transportBlock">
            <h5><i class="fas fa-bus"></i> Transports</h5>
        </div>
        <!-- Bloc Autre -->
        <div class="sector-block" id="otherBlock">
            <h5><i class="fas fa-ellipsis-h"></i> Autre</h5>
        </div>
    </div>

    <!-- Section avec les questions (communes et spécifiques) -->
    <div id="questionsSection" style="display:none;">
        <!-- Titre dynamique de la section de questions -->
        <h3 id="sectorTitle" style="text-align:center; font-size: 1.8em; margin-bottom: 20px;"></h3>

        <!-- Questions communes -->


        <!-- Questions spécifiques au secteur -->
        <div id="healthQuestions" class="sector-questions" style="display:none;">

<style>
        .star-rating {
            font-size: 2em;
            cursor: pointer;
        }
        .star {
            color: gray;
        }
        .star.selected {
            color: gold;
        }
        .justification {
            display: none;
            margin-top: 10px;
        }
        .justification input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            font-size: 1em;
        }
        .checkbox-label {
        margin-left: 8px; /* Adjust space between checkbox and text */
    }
</style>

<div class="question">
    <label for="healthComment"><strong>Comment évaluez-vous la qualité des services de santé publics ?</strong></label>

    <div class="star-rating" data-question="1">
        <span class="star" data-value="1">★</span>
        <span class="star" data-value="2">★</span>
        <span class="star" data-value="3">★</span>
        <span class="star" data-value="4">★</span>
        <span class="star" data-value="5">★</span>
    </div>

    <div id="comment1">
        Satisfaction: <span id="satisfactionMessage" class="satisfaction-medium" style="font-size: 1.5em;">😐</span>
    </div>

    <!-- Justifications -->
    <div id="justification1" class="justification">
        <label><strong>Quels sont vos motifs d'insatisfaction :</strong></label><br>
        <label><input type="checkbox" name="justification1" value="service_lent"> <span class="checkbox-label">Service lent</span></label><br>
        <label><input type="checkbox" name="justification1" value="mauvaise_qualite"> <span class="checkbox-label">Mauvaise qualité des soins</span></label><br>
        <label><input type="checkbox" name="justification1" value="difficulte_acces"> <span class="checkbox-label">Difficulté d'accès aux soins</span></label><br>
        <label><input type="checkbox" name="justification1" value="attente_longue"> <span class="checkbox-label">Attente trop longue</span></label><br>
           <div id="hospital-select" style="display: none;">

        <select id="hospital" name="hospital">
        <option value="">-- Sur quel hôpital avez-vous vécu cette expérience ? --</option>
        <option value="hospital_dakar">Hôpital Principal de Dakar</option>
        <option value="hospital_thies">Hôpital régional de Thiès</option>
        <option value="hospital_saint_louis">Hôpital régional de Saint-Louis</option>
        <option value="hospital_tamba">Hôpital régional de Tambacounda</option>
        <option value="hospital_kolda">Hôpital régional de Kolda</option>
        <option value="hospital_ziguinchor">Hôpital régional de Ziguinchor</option>
        <option value="hospital_diourbel">Hôpital régional de Diourbel</option>
        <option value="hospital_fatik">Hôpital régional de Fatick</option>
        <option value="hospital_kedougou">Hôpital régional de Kédougou</option>
        <option value="hospital_matam">Hôpital régional de Matam</option>
        <option value="hospital_sedhiou">Hôpital régional de Sédhiou</option>
        <option value="hospital_kaolack">Hôpital régional de Kaolack</option>
        </select>

    </div>
    <br>
        <input type="text" name="justification1" placeholder="Veuillez vous justifier" >
    </div>

    <div id="justification2" class="justification">
        <label><strong>Quels sont vos motifs d'insatisfaction :</strong></label><br>
        <label><input type="checkbox" name="justification2" value="service_lent"> <span class="checkbox-label">Service lent</span></label><br>
        <label><input type="checkbox" name="justification2" value="mauvaise_qualite"> <span class="checkbox-label">Mauvaise qualité des soins</span></label><br>
        <label><input type="checkbox" name="justification2" value="difficulte_acces"> <span class="checkbox-label">Difficulté d'accès aux soins</span></label><br>
        <label><input type="checkbox" name="justification2" value="attente_longue"> <span class="checkbox-label">Attente trop longue</span></label><br>
        <input type="text" name="justification2" placeholder="Veuillez vous justifier" >
    </div>

    <div id="justification3" class="justification">
        <label><strong>Quels sont vos motifs de satisfaction :</strong></label><br>
        <label><input type="checkbox" name="justification3" value="moyenne_qualite"> <span class="checkbox-label">Qualité des soins moyenne</span></label><br>
        <label><input type="checkbox" name="justification3" value="service_lent"> <span class="checkbox-label">Service lent</span></label><br>
        <label><input type="checkbox" name="justification3" value="attente_soutenable"><span class="checkbox-label"> Attente raisonnable</span></label><br>
        <input type="text" name="justification3" placeholder="Veuillez vous justifier" >
    </div>

    <div id="justification4" class="justification">
        <label><strong>Quels sont vos motifs de satisfaction :</strong></label><br>
        <label><input type="checkbox" name="justification4" value="bonne_qualite"> <span class="checkbox-label">Bonne qualité des soins</span></label><br>
        <label><input type="checkbox" name="justification4" value="service_rapide"> <span class="checkbox-label">Service rapide</span></label><br>
        <label><input type="checkbox" name="justification4" value="accessibilite_facile"> <span class="checkbox-label">Accessibilité facile</span></label><br>
        <input type="text" name="justification4" placeholder="Veuillez vous justifier" >
    </div>

    <div id="justification5" class="justification">
        <label><strong>Quels sont vos motifs de satisfaction :</strong></label><br>
        <label><input type="checkbox" name="justification5" value="excellente_qualite"><span class="checkbox-label"> Excellente qualité des soins</span></label><br>
        <label><input type="checkbox" name="justification5" value="service_excellent"> <span class="checkbox-label">Service excellent</span></label><br>
        <label><input type="checkbox" name="justification5" value="acces_rapide"> <span class="checkbox-label">Accès rapide aux soins</span></label><br>
        <input type="text" name="justification5" placeholder="Veuillez vous justifier" >
    </div>

    <!-- Select pour les hôpitaux régionaux -->

</div>

<div class="buttons">
    <button type="button" class="btn-grey" id="prev1">&#8592; Précédent</button>
    <button type="button" class="btn-green" id="next2">Suivant &#8594;</button>
</div>
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<!-- Message Popup pour demander si l'utilisateur souhaite évaluer un autre secteur -->
<div id="sector-popup" class="popups" style="display: none;">
    <span class="close-btn" onclick="closePopup()">&times;</span>
    <p>Souhaitez-vous donner votre avis sur un autre secteur ?</p>
    <button id="yes-button">Oui, choisir un autre secteur</button>
    <button id="no-button">Non, continuer avec d'autres questions</button>
</div>

<!-- Bloc des secteurs à choisir -->
<div id="sectorBlocks" style="display: none;">
    <div class="sector-block" id="healthBlock">
        <h5><i class="fas fa-hospital-symbol"></i> Santé</h5>
    </div>
    <div class="sector-block" id="educationBlock">
        <h5><i class="fas fa-school"></i> Éducation</h5>
    </div>
    <div class="sector-block" id="transportBlock">
        <h5><i class="fas fa-bus"></i> Transports</h5>
    </div>
    <div class="sector-block" id="otherBlock">
        <h5><i class="fas fa-ellipsis-h"></i> Autre</h5>
    </div>
</div>

<!-- Autres sections de questions -->
<div id="other-questions" style="display: none;">
    <!-- Ajoute ici tes autres questions -->
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const nextButton = document.getElementById('next');
    const sectorPopup = document.getElementById('sector-popup');
    const yesButton = document.getElementById('yes-button');
    const noButton = document.getElementById('no-button');
    const sectorBlocks = document.getElementById('sectorBlocks');
    const otherQuestions = document.getElementById('other-questions');

    // Au clic sur "Suivant"
    nextButton.addEventListener('click', () => {
        // Afficher le popup pour demander si l'utilisateur veut évaluer un autre secteur
        sectorPopup.style.display = 'block';
    });

    // Si l'utilisateur choisit "Oui" : Afficher les secteurs
    yesButton.addEventListener('click', () => {
        // Masquer le popup et afficher les blocs de secteurs
        sectorPopup.style.display = 'none';
        sectorBlocks.style.display = 'block';
    });

    // Si l'utilisateur choisit "Non" : Afficher d'autres questions
    noButton.addEventListener('click', () => {
        // Masquer le popup et afficher les autres questions
        sectorPopup.style.display = 'none';
        otherQuestions.style.display = 'block';
    });

    // Fonction pour fermer le popup
    function closePopup() {
        sectorPopup.style.display = 'none';
    }
});

</script>

    <!-- script fonctionnel pour le secteur de la santé-------------------------------------------------------------------------------------------------------------------------------------------------- -->
<script>
    // Sélection des étoiles
    const stars = document.querySelectorAll('.star');
    const satisfactionMessage = document.getElementById('satisfactionMessage');

    const justifications = {
        1: document.getElementById('justification1'),
        2: document.getElementById('justification2'),
        3: document.getElementById('justification3'),
        4: document.getElementById('justification4'),
        5: document.getElementById('justification5')
    };

    // Select des hôpitaux
    const hospitalSelect = document.getElementById('hospital-select');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = parseInt(this.getAttribute('data-value'));

            // Mettez à jour les étoiles sélectionnées
            stars.forEach(star => {
                star.classList.remove('selected');
            });
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('selected');
            }

            // Mettre à jour le message de satisfaction
            if (rating === 1) {
                satisfactionMessage.textContent = '😞';
            } else if (rating === 2) {
                satisfactionMessage.textContent = '😐';
            } else if (rating === 3) {
                satisfactionMessage.textContent = '🙂';
            } else if (rating === 4) {
                satisfactionMessage.textContent = '😊';
            } else if (rating === 5) {
                satisfactionMessage.textContent = '😍';
            }

            // Afficher les cases à cocher et le champ de justification en fonction de la note
            for (let i = 1; i <= 5; i++) {
                if (i === rating) {
                    justifications[i].style.display = 'block';
                } else {
                    justifications[i].style.display = 'none';
                }
            }

            // Vérifier les cases cochées pour afficher ou masquer le select des hôpitaux
            if ((rating === 1 || rating === 2)) {
                const checkedCheckboxes = document.querySelectorAll(`#justification${rating} input[type="checkbox"]:checked`);
                if (checkedCheckboxes.length > 0) {
                    hospitalSelect.style.display = 'block';
                } else {
                    hospitalSelect.style.display = 'none';
                }
            }
        });
    });

    // Gérer l'affichage du select des hôpitaux quand les cases sont cochées
    for (let i = 1; i <= 5; i++) {
        const checkboxes = document.querySelectorAll(`#justification${i} input[type="checkbox"]`);
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const checkedCheckboxes = document.querySelectorAll(`#justification${i} input[type="checkbox"]:checked`);
                if (i === 1 || i === 2) {
                    if (checkedCheckboxes.length > 0) {
                        hospitalSelect.style.display = 'block';
                    } else {
                        hospitalSelect.style.display = 'none';
                    }
                }
            });
        });
    }
</script>





<input type="hidden" name="service_quality" id="service_quality" value="0">
        </div>
<div id="educationQuestions" class="sector-questions">
    <label for="healthComment"><strong>Comment évaluez-vous la qualité des services éducatifs ?</strong></label>

    <!-- Évaluation par étoiles -->
    <div class="star-rating" data-question="1">
        <span class="star" data-value="1">★</span>
        <span class="star" data-value="2">★</span>
        <span class="star" data-value="3">★</span>
        <span class="star" data-value="4">★</span>
        <span class="star" data-value="5">★</span>
    </div>

    <!-- Zone de satisfaction (message dynamique) -->
    <div id="commentes">
        Satisfaction: <span id="satisfactionMessagess" class="satisfaction-medium" style="font-size: 1.5em;">😐</span>
        <span id="satisfactionLabelese">Neutre</span>
    </div>

    <!-- Justification des notes -->
    <div id="justificationOptionseducation" style="display: none;">
        <br>
        <p><strong>Quels sont vos motifs  ?</strong></p>
        <div id="checkboxeseducation"></div> <!-- Cases à cocher dynamiques ici -->

        <!-- Champ de texte libre pour justification immédiate -->
        <div id="freeInputContainereducation" style="display: none;">
            <input type="text" id="freeInputJustificationeducation" name="freeInputJustificationeducation" placeholder="Veuillez vous justifier" />
        </div>
    </div>
    <div class="buttons">
            <button type="button" class="btn-grey" id="prev1">&#8592; Précédent</button>
            <button type="button" class="btn-green" id="next2">Suivant &#8594;</button>
        </div>
</div>
<style>
    .star-rating {
    cursor: pointer;
    color: gray;
    }

    .star-rating .star:hover,
    .star-rating .star.selected {
        color: gold;
    }

    #justificationOptionseducation {
        margin-top: 20px;
    }

    #freeInputContainereducation {
        margin-top: 10px;
    }

    #checkboxeseducation {
        margin-bottom: 10px;
    }

    #freeInputJustificationeducation {
        width: 100%;
        padding: 8px;
        font-size: 1rem;
    }
 /* Espace entre la checkbox et le label */
 input[type="checkbox"] {
        margin-right: 8px; /* Ajustez la valeur de 10px selon vos besoins */
    }

    label {
        margin-left: 8px; /* Ou utilisez l'une des deux options ci-dessus */
    }
       /* Affichage horizontal des checkboxes et labels */
       #checkboxesfinance div {
        display: flex;
        align-items: center;
        margin-bottom: 5px; /* Optionnel, pour espacer les lignes */
    }

    /* Espacement entre la case à cocher et le texte du label */
    #checkboxesfinance div label {
        margin-left: 5px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const satisfactionMessage = document.getElementById('satisfactionMessagess');
    const satisfactionLabel = document.getElementById('satisfactionLabelese');
    const justificationOptions = document.getElementById('justificationOptionseducation');
    const checkboxesContainer = document.getElementById('checkboxeseducation');
    const freeInputContainer = document.getElementById('freeInputContainereducation');
    const freeInput = document.getElementById('freeInputJustificationeducation');

    const justificationOptionsData = {
        1: ["Mauvaise qualité", "Inadéquation avec mes attentes", "Autre"],
        2: ["Qualité médiocre", "Pas assez de ressources", "Autre"],
        3: ["Satisfaisant", "Un peu amélioré", "Autre"],
        4: ["Bon service", "Satisfaisant", "Autre"],
        5: ["Excellent", "Au-delà de mes attentes", "Autre"]
    };

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = parseInt(star.dataset.value);

            // Met à jour l'interface avec l'évaluation sélectionnée
            stars.forEach(s => s.classList.remove('selected'));
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('selected');
            }

            // Met à jour le message de satisfaction
            updateSatisfactionMessage(rating);

            // Affiche les options de justification et le champ texte
            updateJustificationOptions(rating);
        });
    });

    // Mise à jour du message de satisfaction en fonction de la note
    function updateSatisfactionMessage(rating) {
        if (rating === 1) {
            satisfactionMessage.textContent = "😡";
            satisfactionLabel.textContent = "Mauvaise";
        } else if (rating === 2) {
            satisfactionMessage.textContent = "😐";
            satisfactionLabel.textContent = "Insatisfaisant";
        } else if (rating === 3) {
            satisfactionMessage.textContent = "🙂";
            satisfactionLabel.textContent = "Moyenne";
        } else if (rating === 4) {
            satisfactionMessage.textContent = "😀";
            satisfactionLabel.textContent = "Satisfaisant";
        } else if (rating === 5) {
            satisfactionMessage.textContent = "😍";
            satisfactionLabel.textContent = "Excellent";
        }
    }






    // Affiche les options de justification en fonction de la note
    function updateJustificationOptions(rating) {
        justificationOptions.style.display = 'block';
        checkboxesContainer.innerHTML = ''; // Clear previous checkboxes

        // Ajouter des options de justification
        const options = justificationOptionsData[rating];
        options.forEach(option => {
            const checkboxLabel = document.createElement('label');
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.value = option;
            checkbox.name = 'justification';
            checkboxLabel.appendChild(checkbox);
            checkboxLabel.appendChild(document.createTextNode(option));
            checkboxesContainer.appendChild(checkboxLabel);
            checkboxesContainer.appendChild(document.createElement('br'));
        });

        // Afficher le champ texte en bas des cases à cocher
        freeInputContainer.style.display = 'block';

        // Si l'utilisateur coche "Autre", afficher le champ texte libre
        const checkboxes = checkboxesContainer.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (checkbox.value === "Autre" && checkbox.checked) {
                    freeInputContainer.style.display = 'block';
                } else {
                    freeInputContainer.style.display = 'block'; // Toujours afficher l'input en bas
                }
            });
        });
    }
 });

</script>









 <!-- Bloc "Transport" -->
 <div id="transportQuestions" class="sector-questions" style="display:none;">
    <label for="transportComment"><strong>Comment évaluez-vous la qualité des services de transport ?</strong></label>

    <!-- Évaluation par étoiles -->
    <div class="star-rating">
        <span class="star" data-value="1">★</span>
        <span class="star" data-value="2">★</span>
        <span class="star" data-value="3">★</span>
        <span class="star" data-value="4">★</span>
        <span class="star" data-value="5">★</span>
    </div>

    <!-- Zone de satisfaction (message dynamique) -->
    <div id="commente">
        Satisfaction: <span id="satisfactionMessagese" class="satisfaction-medium" style="font-size: 1.5em;">😐</span>
        <span id="satisfactionLabele">Neutre</span>
    </div>

    <!-- Justification des notes -->
    <div id="justificationOptionse" style="display: none;">
        <br>
        <p><strong>Quels sont vos motifs  ?</strong></p>

        <div id="checkboxese"></div> <!-- Cases à cocher dynamiques ici -->

        <!-- Champ de texte libre pour justification immédiate -->
        <div id="freeInputContainere" style="display:none;">
            <input type="text" id="freeInputJustificatione" name="freeInputJustificatione" placeholder="Veuillez vous justifier" />
        </div>
    </div>
    <div class="buttons">
            <button type="button" class="btn-grey" id="prev1">&#8592; Précédent</button>
            <button type="button" class="btn-green" id="next2">Suivant &#8594;</button>
        </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Sélection des étoiles et gestion du changement de note
    document.querySelectorAll('.star').forEach(function(star) {
        star.addEventListener('click', function() {
            const selectedValue = parseInt(star.getAttribute('data-value')); // Récupérer la note de l'étoile sélectionnée
            updateSatisfaction(selectedValue); // Mettre à jour le message de satisfaction
            showJustifications(selectedValue); // Afficher les cases à cocher en fonction de la note
        });
    });

    // Mise à jour du message de satisfaction en fonction de la note
    function updateSatisfaction(value) {
        const satisfactionMessagese = document.getElementById('satisfactionMessagese');
        const satisfactionLabele = document.getElementById('satisfactionLabele');

        // Réinitialiser le contenu
        satisfactionMessagese.textContent = '';
        satisfactionLabele.textContent = '';

        const messages = ['😡', '😟', '😐', '🙂', '😍']; // Emojis de satisfaction
        const labels = ['Mauvaise', 'Insatisfaisant', 'Moyenne', 'Satisfaisant', 'Excellent']; // Labels correspondants

        satisfactionMessagese.textContent = messages[value - 1]; // Mettre l'emoji
        satisfactionLabele.textContent = labels[value - 1]; // Mettre le label correspondant

        // Appliquer les classes de couleur en fonction de la note
        const colorClasses = ['satisfaction-low', 'satisfaction-medium', 'satisfaction-medium', 'satisfaction-high', 'satisfaction-excellent'];
        satisfactionMessagese.className = colorClasses[value - 1];

        // Appliquer les tailles de texte
        satisfactionMessagese.style.fontSize = '30px'; // Augmenter la taille de la police

        // Mettre à jour les étoiles sélectionnées
        document.querySelectorAll('.star').forEach(function(star) {
            if (parseInt(star.getAttribute('data-value')) <= value) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    // Affichage des cases à cocher selon la note
    function showJustifications(value) {
        const justificationOptionse = document.getElementById('justificationOptionse');
        const checkboxesContainere = document.getElementById('checkboxese');
        const freeInputContainere = document.getElementById('freeInputContainere');

        // Réinitialiser les options de justification à chaque changement de note
        checkboxesContainere.innerHTML = '';
        freeInputContainere.style.display = 'block'; // Afficher le champ de texte libre systématiquement

        justificationOptionse.style.display = 'block'; // Toujours afficher les justifications

        // Déterminer les raisons de justification selon la note
        let reasons = [];
        if (value === 1) { // Très insatisfait
            reasons = [
                "Confort insuffisant",
                "Retards fréquents",
                "Propreté des véhicules",
                "Sécurité insuffisante",
                "Autres"
            ];
        } else if (value === 2) { // Insatisfait
            reasons = [
                "Confort moyen",
                "Retards occasionnels",
                "Propreté acceptable mais à améliorer",
                "Sécurité acceptable",
                "Autres"
            ];
        } else if (value === 3) { // Neutre
            reasons = [
                "Service correct mais améliorable",
                "Retards occasionnels",
                "Propreté correcte",
                "Autres"
            ];
        } else if (value === 4) { // Satisfait
            reasons = [
                "Confort satisfaisant",
                "Retards rares",
                "Propreté des véhicules",
                "Sécurité assurée",
                "Autres"
            ];
        } else if (value === 5) { // Très satisfait
            reasons = [
                "Confort optimal",
                "Retards inexistants",
                "Propreté impeccable",
                "Sécurité maximale",
                "Autres"
            ];
        }

        // Créer les cases à cocher dynamiquement
        reasons.forEach(function(reason) {
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.id = reason;
            checkbox.name = 'transportJustifications[]';
            checkbox.value = reason;

            const label = document.createElement('label');
            label.setAttribute('for', reason);
            label.textContent = reason;

            const div = document.createElement('div');
            div.appendChild(checkbox);
            div.appendChild(label);
            checkboxesContainere.appendChild(div);
        });

        // Option "Autres" - afficher le champ de texte libre si la case "Autres" est cochée
        const otherCheckbox = checkboxesContainere.querySelector('input[value="Autres"]');
        if (otherCheckbox) {
            otherCheckbox.addEventListener('change', function() {
                freeInputContainere.style.display = this.checked ? 'block' : 'none';
            });
        }
    }
 });

</script>



        <!-- Bloc "Autre" -->
        <div id="otherQuestions" class="sector-questions" style="display:none;">
            <div class="question">
                <label for="otherSelect"><strong>Choisissez un secteur spécifique :</strong></label>
                <select id="otherSelect" name="otherSelect">
                    <option value="">Sélectionner une option</option>
                    <option value="finance">Finance</option>
                    <option value="energy">Énergie</option>
                    <option value="technology">Police</option>
                </select>
            </div>
            <!-- Questions dynamiques pour "Autre" -->
            <div id="dynamicQuestions" style="display:none;">
<div class="question" id="financeQuestions" style="display:none;">

    <label for="financeComment"><strong>Comment évaluez-vous la qualité des services financiers publics ?</strong></label>

    <!-- Évaluation par étoiles -->
    <div class="star-rating" data-question="1">
        <span class="star" data-value="1">★</span>
        <span class="star" data-value="2">★</span>
        <span class="star" data-value="3">★</span>
        <span class="star" data-value="4">★</span>
        <span class="star" data-value="5">★</span>
    </div>

    <!-- Zone de satisfaction (message dynamique) -->
    <div id="commentfinance">
        Satisfaction: <span id="satisfactionMessagesfinance" class="satisfaction-medium" style="font-size: 1.5em;">😐</span>
        <span id="satisfactionLabelfinance">Neutre</span>
    </div>

    <!-- Justification des notes -->
    <div id="justificationOptionsfinance" style="display: none;">
        <br>
        <p><strong>Quels sont vos motifs  ?</strong></p>
         <div id="checkboxesfinance">

    <input type="checkbox" id="finance_Service inefficace" name="financeJustifications[]" value="Service inefficace">
    </div>
    <div id="freeInputContainerfinance">
            <input type="text" id="freeInputJustificationfinance" name="freeInputJustificationfinance" placeholder="Veuillez vous justifiez" />
        </div>
    </div>
  </div>


        <!-- Champ de texte libre pour justification -->


               <!-- Section pour Énergie -->

               <div class="question" id="energyQuestions" style="display:none;">
    <label for="energyComment"><strong>Comment évaluez-vous la qualité des services énergétiques publics ?</strong></label>

    <!-- Évaluation par étoiles -->
    <div class="star-rating" data-question="energy">
        <span class="star" data-value="1">★</span>
        <span class="star" data-value="2">★</span>
        <span class="star" data-value="3">★</span>
        <span class="star" data-value="4">★</span>
        <span class="star" data-value="5">★</span>
    </div>

    <!-- Zone de satisfaction (message dynamique) -->
    <div id="commentenergy">
        Satisfaction: <span id="satisfactionMessagesenergy" class="satisfaction-medium" style="font-size: 1.5em;">😐</span>
        <span id="satisfactionLabelenergy">Neutre</span>
    </div>

    <!-- Justification des notes -->
    <div id="justificationOptionsenergy" style="display: none;">
        <br>
        <p><strong>Quels sont vos motifs  ?</strong></p>
        <div id="checkboxesenergy"></div>

        <!-- Champ de texte libre pour commentaires supplémentaires -->
        <div id="freeInputContainerenergy">
            <input type="text" id="freeInputJustificationenergy" name="freeInputJustificationenergy" placeholder="Veuillez vous justifier" />
        </div>
    </div>

</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('#energyQuestions .star');
    const satisfactionMessage = document.getElementById('satisfactionMessagesenergy');
    const satisfactionLabel = document.getElementById('satisfactionLabelenergy');
    const justificationOptions = document.getElementById('justificationOptionsenergy');
    const checkboxesContainer = document.getElementById('checkboxesenergy');
    const freeInputContainer = document.getElementById('freeInputContainerenergy');
    const freeInput = document.getElementById('freeInputJustificationenergy');

    const justificationOptionsData = {
        1: ["Mauvaise qualité", "Inadéquation avec mes attentes", "Autre"],
        2: ["Qualité médiocre", "Pas assez de ressources", "Autre"],
        3: ["Satisfaisant", "Un peu amélioré", "Autre"],
        4: ["Bon service", "Satisfaisant", "Autre"],
        5: ["Excellent", "Au-delà de mes attentes", "Autre"]
    };

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = parseInt(star.dataset.value);

            // Met à jour l'interface avec l'évaluation sélectionnée
            stars.forEach(s => s.classList.remove('selected'));
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('selected');
            }

            // Met à jour le message de satisfaction
            updateSatisfactionMessage(rating);

            // Affiche les options de justification et le champ texte
            updateJustificationOptions(rating);
        });
    });

    // Mise à jour du message de satisfaction en fonction de la note
    function updateSatisfactionMessage(rating) {
        if (rating === 1) {
            satisfactionMessage.textContent = "😞";
            satisfactionLabel.textContent = "Insatisfait";
        } else if (rating === 2) {
            satisfactionMessage.textContent = "😐";
            satisfactionLabel.textContent = "Moyenne";
        } else if (rating === 3) {
            satisfactionMessage.textContent = "🙂";
            satisfactionLabel.textContent = "Satisfait";
        } else if (rating === 4) {
            satisfactionMessage.textContent = "😀";
            satisfactionLabel.textContent = "Très satisfait";
        } else if (rating === 5) {
            satisfactionMessage.textContent = "😍";
            satisfactionLabel.textContent = "Excellent";
        }
    }

    // Affiche les options de justification en fonction de la note
    function updateJustificationOptions(rating) {
        justificationOptions.style.display = 'block';
        checkboxesContainer.innerHTML = ''; // Clear previous checkboxes

        // Ajouter des options de justification
        const options = justificationOptionsData[rating];
        options.forEach(option => {
            const checkboxLabel = document.createElement('label');
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.value = option;
            checkbox.name = 'justification';
            checkboxLabel.appendChild(checkbox);
            checkboxLabel.appendChild(document.createTextNode(option));
            checkboxesContainer.appendChild(checkboxLabel);
            checkboxesContainer.appendChild(document.createElement('br'));
        });

        // Afficher le champ texte en bas des cases à cocher
        freeInputContainer.style.display = 'block';

        // Si l'utilisateur coche "Autre", afficher le champ texte libre
        const checkboxes = checkboxesContainer.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (checkbox.value === "Autre" && checkbox.checked) {
                    freeInputContainer.style.display = 'block';
                } else {
                    freeInputContainer.style.display = 'block'; // Toujours afficher l'input en bas
                }
            });
        });
    }
 });

</script>


<div class="question" id="technologyQuestions" style="display:none;">
    <label for="technologyComment"><strong>Comment évaluez-vous la qualité des services de la police ?</strong></label>

    <!-- Évaluation par étoiles -->
    <div class="star-rating" data-question="technology">
        <span class="star" data-value="1">★</span>
        <span class="star" data-value="2">★</span>
        <span class="star" data-value="3">★</span>
        <span class="star" data-value="4">★</span>
        <span class="star" data-value="5">★</span>
    </div>

    <!-- Zone de satisfaction (message dynamique) -->
    <div id="commenttechnology">
        Satisfaction: <span id="satisfactionMessagestechnology" class="satisfaction-medium" style="font-size: 1.5em;">😐</span>
        <span id="satisfactionLabeltechnology">Neutre</span>
    </div>

    <!-- Justification des notes -->
    <div id="justificationOptionstechnology" style="display: none;">
        <br>
        <p><strong>Quels sont vos motifs  ?</strong></p>
        <div id="checkboxestechnology"></div>

        <!-- Champ de texte libre pour commentaires supplémentaires -->
        <div id="freeInputContainertechnology">
            <input type="text" id="freeInputJustificationtechnology" name="freeInputJustificationtechnology" placeholder="Veuillez vous justifier" />
        </div>
    </div>

    <!-- Commentaire libre sur l'évaluation -->


</div>
</div>
<style>
    .star-rating {
    cursor: pointer;
    color: gray;
}

.star-rating .star:hover,
.star-rating .star.selected {
    color: gold;
}

#justificationOptionsenergy {
    margin-top: 20px;
}

#freeInputContainerenergy {
    margin-top: 10px;
}

#checkboxesenergy {
    margin-bottom: 10px;
}

#freeInputJustificationenergy {
    width: 100%;
    padding: 8px;
    font-size: 1rem;
}
.star-rating {
    cursor: pointer;
    color: gray;
}

.star-rating .star:hover,
.star-rating .star.selected {
    color: gold;
}

#justificationOptionsenergy {
    margin-top: 20px;
}

#freeInputContainerenergy {
    margin-top: 10px;
}

#checkboxesenergy {
    margin-bottom: 10px;
}

#freeInputJustificationenergy {
    width: 100%;
    padding: 8px;
    font-size: 1rem;
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('#technologyQuestions .star');
    const satisfactionMessage = document.getElementById('satisfactionMessagestechnology');
    const satisfactionLabel = document.getElementById('satisfactionLabeltechnology');
    const justificationOptions = document.getElementById('justificationOptionstechnology');
    const checkboxesContainer = document.getElementById('checkboxestechnology');
    const freeInputContainer = document.getElementById('freeInputContainertechnology');
    const freeInput = document.getElementById('freeInputJustificationtechnology');

    const justificationOptionsData = {
        1: ["Mauvaise qualité", "Réponse lente", "Autre"],
        2: ["Qualité médiocre", "Manque de réactivité", "Autre"],
        3: ["Satisfaisant", "Assez réactif", "Autre"],
        4: ["Bon service", "Réponse rapide", "Autre"],
        5: ["Excellent", "Parfaitement réactif", "Autre"]
    };

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = parseInt(star.dataset.value);

            // Met à jour l'interface avec l'évaluation sélectionnée
            stars.forEach(s => s.classList.remove('selected'));
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('selected');
            }

            // Met à jour le message de satisfaction
            updateSatisfactionMessage(rating);

            // Affiche les options de justification et le champ texte
            updateJustificationOptions(rating);
        });
    });

    // Mise à jour du message de satisfaction en fonction de la note
    function updateSatisfactionMessage(rating) {
        if (rating === 1) {
            satisfactionMessage.textContent = "😞";
            satisfactionLabel.textContent = "Insatisfait";
        } else if (rating === 2) {
            satisfactionMessage.textContent = "😐";
            satisfactionLabel.textContent = "Moyenne";
        } else if (rating === 3) {
            satisfactionMessage.textContent = "🙂";
            satisfactionLabel.textContent = "Satisfait";
        } else if (rating === 4) {
            satisfactionMessage.textContent = "😀";
            satisfactionLabel.textContent = "Très satisfait";
        } else if (rating === 5) {
            satisfactionMessage.textContent = "😍";
            satisfactionLabel.textContent = "Excellent";
        }
    }

    // Affiche les options de justification en fonction de la note
    function updateJustificationOptions(rating) {
        justificationOptions.style.display = 'block';
        checkboxesContainer.innerHTML = ''; // Clear previous checkboxes

        // Ajouter des options de justification
        const options = justificationOptionsData[rating];
        options.forEach(option => {
            const checkboxLabel = document.createElement('label');
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.value = option;
            checkbox.name = 'justification';
            checkboxLabel.appendChild(checkbox);
            checkboxLabel.appendChild(document.createTextNode(option));
            checkboxesContainer.appendChild(checkboxLabel);
            checkboxesContainer.appendChild(document.createElement('br'));
        });

        // Afficher le champ texte en bas des cases à cocher
        freeInputContainer.style.display = 'block';

        // Si l'utilisateur coche "Autre", afficher le champ texte libre
        const checkboxes = checkboxesContainer.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (checkbox.value === "Autre" && checkbox.checked) {
                    freeInputContainer.style.display = 'block';
                } else {
                    freeInputContainer.style.display = 'block'; // Toujours afficher l'input en bas
                }
            });
        });
    }
 });

</script>




        <div class="buttons">
            <button type="button" class="btn-grey" id="prev2">&#8592; Précédent</button>
            <button type="button" class="btn-green" id="next2">Suivant &#8594;</button>
        </div>
    </div>


</div>

<script>
    // Sélection des étoiles et gestion du changement de note
    document.querySelectorAll('.star').forEach(function(star) {
        star.addEventListener('click', function() {
            const selectedValue = parseInt(star.getAttribute('data-value')); // Récupérer la note de l'étoile sélectionnée
            updateSatisfaction(selectedValue); // Mettre à jour le message de satisfaction
            showJustifications(selectedValue); // Afficher les cases à cocher en fonction de la note
        });
    });

    // Mise à jour du message de satisfaction en fonction de la note
    function updateSatisfaction(value) {
        const satisfactionMessagesfinance = document.getElementById('satisfactionMessagesfinance');
        const satisfactionLabelfinance = document.getElementById('satisfactionLabelfinance');

        // Réinitialiser le contenu
        satisfactionMessagesfinance.textContent = '';
        satisfactionLabelfinance.textContent = '';

        const messages = ['😡', '😟', '😐', '🙂', '😍']; // Emojis de satisfaction
        const labels = ['Mauvaise', 'Insatisfaisant', 'Moyenne', 'Satisfaisant', 'Excellent']; // Labels correspondants

        satisfactionMessagesfinance.textContent = messages[value - 1]; // Mettre l'emoji
        satisfactionLabelfinance.textContent = labels[value - 1]; // Mettre le label correspondant

        // Appliquer les classes de couleur en fonction de la note
        const colorClasses = ['satisfaction-low', 'satisfaction-medium', 'satisfaction-medium', 'satisfaction-high', 'satisfaction-excellent'];
        satisfactionMessagesfinance.className = colorClasses[value - 1];

        // Appliquer les tailles de texte
        satisfactionMessagesfinance.style.fontSize = '30px'; // Augmenter la taille de la police

        // Mettre à jour les étoiles sélectionnées
        document.querySelectorAll('.star').forEach(function(star) {
            if (parseInt(star.getAttribute('data-value')) <= value) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    // Affichage des cases à cocher selon la note
    function showJustifications(value) {
        const justificationOptionsfinance = document.getElementById('justificationOptionsfinance');
        const checkboxesContainerfinance  = document.getElementById('checkboxesfinance');
        const freeInputContainerfinance  = document.getElementById('freeInputContainerfinance');

        // Réinitialiser les options de justification à chaque changement de note
        checkboxesContainerfinance.innerHTML = '';
        freeInputContainerfinance.style.display = 'block'; // Afficher le champ de texte libre systématiquement

        justificationOptionsfinance.style.display = 'block'; // Toujours afficher les justifications

        // Déterminer les raisons de justification selon la note
        let reasons = [];
        if (value === 1) { // Très insatisfait
            reasons = [
                "Service financier inefficace",
                "Manque de transparence",
                "Coûts excessifs",
                "Autres"
            ];
        } else if (value === 2) { // Insatisfait
            reasons = [
                "Service pas assez réactif",
                "Manque de clarté dans les informations",
                "Coûts relativement élevés",
                "Autres"
            ];
        } else if (value === 3) { // Neutre
            reasons = [
                "Service satisfaisant mais peut être amélioré",
                "Manque de communication",
                "Autres"
            ];
        } else if (value === 4) { // Satisfait
            reasons = [
                "Bonne qualité du service",
                "Réponse rapide",
                "Clarté dans les informations",
                "Autres"
            ];
        } else if (value === 5) { // Très satisfait
            reasons = [
                "Service optimal",
                "Transparence totale",
                "Coûts raisonnables",
                "Autres"
            ];
        }

        // Créer les cases à cocher dynamiquement
        reasons.forEach(function(reason) {
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.id = 'finance_' + reason; // Ajout du préfixe 'finance_' à l'ID
            checkbox.name = 'financeJustifications[]';
            checkbox.value = reason;

            const label = document.createElement('label');
            label.setAttribute('for', 'finance_' + reason);
            label.textContent = reason;

            const div = document.createElement('div');
            div.appendChild(checkbox);
            div.appendChild(label);
            checkboxesContainerfinance.appendChild(div);
        });

        // Option "Autres" - afficher le champ de texte libre si la case "Autres" est cochée
        const otherCheckbox = checkboxesContainerfinance.querySelector('input[value="Autres"]');
        if (otherCheckbox) {
            otherCheckbox.addEventListener('change', function() {
                freeInputContainerfinance.style.display = this.checked ? 'block' : 'none';
            });
        }
    }

</script>




<script>
    // Fonction pour afficher les questions après avoir cliqué sur un secteur
    function hideAllQuestions() {
        // Masquer tous les blocs de secteur
        document.querySelectorAll('.sector-block').forEach(function(block) {
            block.style.display = 'none';
        });

        // Masquer toutes les questions par défaut
        document.getElementById('questionsSection').style.display = 'none'; // Masquer la section des questions
        document.querySelectorAll('.sector-questions').forEach(function(questionBlock) {
            questionBlock.style.display = 'none'; // Masquer toutes les questions spécifiques
        });
    }

    function showQuestions(sector, title) {
        hideAllQuestions(); // Masquer tous les autres blocs et questions

        // Afficher la section des questions
        document.getElementById('questionsSection').style.display = 'block';

        // Mettre à jour le titre de la section des questions
        document.getElementById('sectorTitle').textContent = 'Questions concernant le secteur : ' + title;

        // Afficher la question spécifique au secteur choisi
        document.getElementById(sector + 'Questions').style.display = 'block';

        // Révéler les autres blocs uniquement pour "Autre"
        if (sector === 'other') {
            document.getElementById('otherQuestions').style.display = 'block';
        }
    }

    // Événements sur les blocs de secteur
    document.getElementById('healthBlock').addEventListener('click', function() {
        showQuestions('health', 'Santé');
    });

    document.getElementById('educationBlock').addEventListener('click', function() {
        showQuestions('education', 'Éducation');
    });

    document.getElementById('transportBlock').addEventListener('click', function() {
        showQuestions('transport', 'Transports');
    });

    document.getElementById('otherBlock').addEventListener('click', function() {
        showQuestions('other', 'Autre');
    });

    // Gérer le changement dans le select "Autre"
    document.getElementById('otherSelect').addEventListener('change', function(event) {
        var selectedOption = event.target.value;
        // Masquer toutes les questions dynamiques
        document.querySelectorAll('#dynamicQuestions .question').forEach(function(option) {
            option.style.display = 'none';
        });
        if (selectedOption) {
            document.getElementById(selectedOption + 'Questions').style.display = 'block';
        }
        document.getElementById('dynamicQuestions').style.display = 'block';
    });

    // Fonction pour afficher le prompt si l'utilisateur veut donner son avis sur d'autres secteurs
    document.getElementById('next2').addEventListener('click', function() {
        document.getElementById('additionalSectorPrompt').style.display = 'block'; // Afficher le prompt
        document.getElementById('questionsSection').style.display = 'none'; // Masquer la section des questions
    });

    // Si l'utilisateur veut donner son avis sur d'autres secteurs (Oui)
    document.getElementById('yesButton').addEventListener('click', function() {
        // Réafficher les blocs de secteur
        document.getElementById('sectorBlocks').style.display = 'flex';
        document.getElementById('additionalSectorPrompt').style.display = 'none'; // Masquer le prompt
    });

    // Si l'utilisateur ne veut pas donner son avis sur d'autres secteurs (Non)
    document.getElementById('noButton').addEventListener('click', function() {
        // Soumettre ou faire autre chose selon vos besoins
        alert("Merci pour vos réponses !");
    });
</script>

<style>
    .sector-blocks {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .sector-block {
        background-color: #f1f1f1;
        padding: 20px;
        border-radius: 8px;
        cursor: pointer;
        width: 22%;
        text-align: center;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.3s;
        font-size: 1.2em;
    }

    .sector-block:hover {
        background-color: #007bff;
        color: white;
        transform: scale(1.05);
    }

    .sector-block h5 {
        margin: 0;
    }

    .sector-block i {
        margin-right: 8px;
    }

    .sector-questions {
        margin-top: 20px;
    }

    .question {
        margin-bottom: 20px;
    }

    select {
        width: 100%;
        padding: 8px;
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    #additionalSectorPrompt {
        margin-top: 20px;
    }

    .btn-green {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    .btn-grey {
        background-color: #6c757d;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    .btn-green:hover, .btn-grey:hover {
        opacity: 0.8;
    }
     /* Styliser les étoiles sélectionnées */
     .star.selected {
        color: gold;
    }

    /* Classe pour afficher les différentes couleurs en fonction de la note */
    .satisfaction-low {
        color: red;
    }
    .satisfaction-medium {
        color: orange;
    }
    .satisfaction-high {
        color: green;
    }
    /* Espacer les cases à cocher des étiquettes */
    #checkboxes input[type="checkbox"] {
        margin-right: 10px; /* Marge à droite de la checkbox */
    }

    #checkboxes label {
        margin-left: 10px; /* Marge à gauche du texte de l'étiquette */
    }

    /* Espacement général pour les checkboxes */
    #checkboxes div {
        margin-bottom: 10px; /* Espacement entre chaque case à cocher */
    }
    .star {
    font-size: 30px;
    cursor: pointer;
    color: gray; /* Couleur par défaut */
    }

    .star.selected.low {
        color: red; /* Couleur pour les notes basses */
    }

    .star.selected.medium {
        color: orange; /* Couleur pour la note moyenne */
    }
    .star.selected.mediume {
        color: gold; /* Couleur pour la note moyenne */
    }
    .star.selected.high {
        color: green; /* Couleur pour les bonnes notes */
    }
    .star.selected.highe {
        color: lightgreen; /* Couleur pour les bonnes notes */
    }
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


        <!-- Section 3: Attentes et Priorités pour la Réforme -->
        <div id="section3" class="section">
            <h4 style="text-align:center">Attentes et Priorités pour la Réforme</h4>
            <div class="question">
                <label><strong>Quelles sont, selon vous, les trois principales réformes à mettre en œuvre pour améliorer le service public ? </strong></label><br>
                <div class="reformes-options">
                    <label><input type="checkbox" name="reformes" value="Digitalisation"> &nbsp;Digitalisation des services</label><br>
                    <label><input type="checkbox" name="reformes" value="Simplification des démarches"> &nbsp;Simplification des démarches administratives</label><br>
                    <label><input type="checkbox" name="reformes" value="Transparence"> &nbsp;Renforcement de la transparence et de la lutte contre la corruption</label><br>
                    <label><input type="checkbox" name="reformes" value="Accès pour tous"> &nbsp;Amélioration de l'accessibilité des services publics pour les populations marginalisées</label><br>
                    <label><input type="checkbox" name="reformes" value="Décentralisation"> &nbsp;Décentralisation pour rapprocher les services publics des citoyens</label><br>
                    <label><input type="checkbox" name="reformes" value="Évaluation des services"> &nbsp;Mise en place d'un système d'évaluation et de feedback pour améliorer en continu les services</label><br>
                </div>
                <label for="reformesComments">Autres (facultatif) :</label><br>
                <textarea name="reformes" rows="3"></textarea>
            </div>

            <div class="buttons">
                <button type="button" class="btn-grey" id="prev2">&#8592; Précédent</button>
                <button type="button" class="btn-green" id="next3">Suivant &#8594;</button>
            </div>
        </div>
    </div>
</form>


<script>
    document.getElementById('toggleSection').addEventListener('change', function() {
        const detailsSection = document.getElementById('detailsSection');
        if (this.checked) {
            detailsSection.style.display = 'none';
        } else {
            detailsSection.style.display = 'block';
        }
    });
</script>

<script>
    document.getElementById('toggleFields').addEventListener('change', function() {
        const identificationFields = document.getElementById('identificationFields');
        if (this.checked) {
            identificationFields.style.display = 'block';
        } else {
            identificationFields.style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('toggleFields');
    const identificationFields = document.getElementById('identificationFields');

    // Assurez-vous que le bouton est désactivé par défaut et que les champs sont affichés
    identificationFields.style.display = 'block'; // Affiche les champs par défaut

    toggle.addEventListener('change', function() {
        if (this.checked) {
            identificationFields.style.display = 'none'; // Masque les champs si coché
        } else {
            identificationFields.style.display = 'block'; // Affiche les champs si décoché
        }
    });
});

</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Gestion de l'affichage des pays pour la Diaspora
    document.getElementById('senegal').addEventListener('change', () => {
        document.getElementById('diasporaCountries').style.display = 'none';
        document.getElementById('country').removeAttribute('required');
    });

    document.getElementById('diaspora').addEventListener('change', () => {
        document.getElementById('diasporaCountries').style.display = 'block';
        document.getElementById('country').setAttribute('required', 'required');
    });

    // Gestion des sections du formulaire
    const sections = document.querySelectorAll('.section');
    let currentSection = 0;

    function showSection(index) {
        sections.forEach((section, i) => {
            if (i === index) {
                section.classList.add('active', 'fade-in');
            } else {
                section.classList.remove('active', 'fade-in');
            }
        });
    }

    // Fonction de validation des champs obligatoires
    function checkRequiredFields(section) {
        const inputs = section.querySelectorAll(
            'input[required]:not([style*="display: none"]), select[required]:not([style*="display: none"]), textarea[required]:not([style*="display: none"])');
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

    // Gestion de la navigation entre sections
    document.querySelectorAll('.btn-green').forEach((button, index) => {
        button.addEventListener('click', () => {
            if (checkRequiredFields(sections[currentSection])) {
                currentSection = Math.min(currentSection + 1, sections.length - 1);
                showSection(currentSection);
            }
        });
    });

    document.querySelectorAll('.btn-previous').forEach((button, index) => {
        button.addEventListener('click', () => {
            currentSection = Math.max(currentSection - 1, 0);
            showSection(currentSection);
        });
    });

    // Gestion de l'évaluation par étoiles
    const stars = document.querySelectorAll('.star');
    const satisfactionMessage = document.getElementById('satisfactionMessage');
    const serviceQualityInput = document.getElementById('service_quality');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-value');
            serviceQualityInput.value = rating;

            // Mettre à jour le message de satisfaction
            const messages = ['😡 Mauvaise', '😟 Insatisfaisant', '😐 Moyenne', '😊 Satisfaisant', '😍 Excellent'];
            satisfactionMessage.textContent = messages[rating - 1];

            // Mettre à jour les couleurs des étoiles
            stars.forEach(s => s.classList.remove('selected', 'low', 'medium', 'mediume', 'highe', 'high'));
            stars.forEach(s => {
                if (s.getAttribute('data-value') <= rating) {
                    s.classList.add('selected');
                }
            });

            // Ajouter des classes de couleur en fonction de la note
            const colorClasses = ['low', 'medium', 'mediume', 'highe', 'high'];
            stars.forEach(star => star.classList.add(colorClasses[rating - 1]));
        });
    });

    // Afficher la première section par défaut
    showSection(currentSection);

    // CSS pour l'animation de transition
    const style = document.createElement('style');
    style.textContent = `
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
});
</script>






<script>
    const stars = document.querySelectorAll('.star');
    stars.forEach(star => {
        star.addEventListener('click', () => {
            // Retirer les classes de sélection de toutes les étoiles
            stars.forEach(s => {
                s.classList.remove('selected-1', 'selected-2', 'selected-3', 'selected-4', 'selected-5');
            });
            // Récupérer la valeur de l'étoile cliquée
            let value = star.getAttribute('data-value');
            // Ajouter la classe de couleur appropriée pour l'étoile sélectionnée et les précédentes
            for (let i = 0; i < stars.length; i++) {
                if (i < value) {
                    stars[i].classList.add(`selected-${value}`);
                }
            }
        });
    });
   </script>



<!-- Add this somewhere in your HTML to display the quality text -->
<div id="quality_text"></div>



<!-- Pop-up de validation -->
<div id="success-popup" class="popups" style="display: none;">
    <span class="close-btn">&times;</span>
    <p>✔ Merci ! Vos réponses ont été enregistrées. Votre avis contribuera à améliorer les services publics.</p>

</div>

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
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        loadRegions();
    });


function loadRegions() {
        fetch('/regions')
            .then(response => response.json())
            .then(data => {
                const regionSelect = document.getElementById("region");
                data.forEach(region => {
                    const option = document.createElement("option");
                    option.value = region.id;
                    option.textContent = region.nom;
                    regionSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Erreur:', error));
    }

    function toggleRegionSelect() {
        const senegalSelected = document.getElementById("senegal").checked;
        document.getElementById("region-container").style.display = senegalSelected ? "block" : "none";
        document.getElementById("department-container").style.display = "none"; // Réinitialiser le département
        document.getElementById("region").value = ""; // Réinitialiser la sélection de région
        document.getElementById("department").innerHTML = ""; // Réinitialiser le département
    }

    function updateDepartments() {
    const regionSelect = document.getElementById("region");
    const selectedRegionId = regionSelect.value;
    const departmentSelect = document.getElementById("department");

    // Réinitialiser le menu déroulant des départements
    departmentSelect.innerHTML = "";

    // Ajouter l'option par défaut
    const defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.textContent = "-- Choisissez un département --";
    departmentSelect.appendChild(defaultOption);

    if (selectedRegionId) {
        // Requête AJAX pour récupérer les départements
        fetch(`/departements/${selectedRegionId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(department => {
                    const option = document.createElement("option");
                    option.value = department.id;
                    option.textContent = department.nom; // Assurez-vous que le champ est correct
                    departmentSelect.appendChild(option);
                });
                document.getElementById("department-container").style.display = "block";
            })
            .catch(error => console.error('Erreur:', error));
    } else {
        document.getElementById("department-container").style.display = "none";
    }
}

</script>

</body>

</html>
