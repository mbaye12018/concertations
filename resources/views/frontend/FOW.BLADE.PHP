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
        <div id="section1" class="section active">
            <h2>Identification <i class="fas fa-user"></i></h2>
            <div class="question">
                <label><i class="fas fa-map-marker-alt"></i> Lieu de résidence :</label><br>
                <div class="location-options">
    <label>
        <input type="radio" id="senegal" name="location" value="Senegal"  onchange="toggleRegionSelect()"> Sénégal
    </label>
    <label>
        <input type="radio" id="diaspora" name="location" value="Diaspora" onchange="toggleRegionSelect()"> Diaspora
    </label>
</div>

<div id="region-container" style="display: none;">
    <label for="region">Choisissez une région :</label>
    <select id="region" onchange="updateDepartments()">
        <option value="">-- Sélectionnez une région --</option>
        <!-- Les régions seront ajoutées ici dynamiquement -->
    </select>
</div>

<div id="department-container" style="display: none;">
    <label for="department">Choisissez un département :</label>
    
    <select id="department">
        
        <!-- Les options de départements seront ajoutées ici dynamiquement -->
    </select>
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
        <input type="checkbox" id="toggleFields"  onchange="toggleFields()">
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



   

        <!-- Section 2, 3, etc. -->
      
        <div id="section2" class="section active">
        <h4 style="text-align:center">
            <i class="fas fa-comments" style="margin-right: 8px; color: #007bff;"></i>
            Parlons de votre perception du Service Public Actuel:
        </h4>

        <div class="question">
        <label>
            
    <strong>Comment noteriez-vous la qualité des services ?</strong><!-- <span class="required">(*)</span> : -->
</label>

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

      <input type="hidden" name="service_quality" id="service_quality" value="0"> <!-- Ajouter ce champ pour le rating -->
    </div>

    <div class="question">
    <label for="servicePoint"><strong>Quels sont les principaux points forts et les principales faiblesses des services publics actuels selon vous ?</strong></label>

    <div class="flex-container">
        <fieldset class="strengths">
        <fieldset>
        <fieldset>
    <legend><i class="fas fa-check-circle" style="color: green;"></i> </legend>
    <!-- Contenu ici -->
</fieldset>

    <!-- Contenu ici -->
</fieldset>

            <label>
                <input type="checkbox" name="strengths" value="Qualité du service"> &nbsp;Qualité du service
            </label><br>
            <label>
                <input type="checkbox" name="strengths" value="Accessibilité">&nbsp; Accessibilité
            </label><br>
            <label>
                <input type="checkbox" name="strengths" value="Rapidité de traitement">&nbsp; Rapidité de traitement
            </label>
        </fieldset>

        <fieldset class="weaknesses">
        <fieldset>
    <legend><i class="fas fa-exclamation-circle icon-color"></i> </legend>
    <!-- Contenu ici -->
</fieldset>

            <label>
                <input type="checkbox" name="weaknesses" value="Manque de transparence"> &nbsp;Manque de transparence
            </label><br>
            <label>
                <input type="checkbox" name="weaknesses" value="Bureaucratie excessive"> &nbsp;Bureaucratie excessive
            </label><br>
            <label>
                <input type="checkbox" name="weaknesses" value="Manque de personnel"> &nbsp;Manque de personnel
            </label>
        </fieldset>
    </div>

    <div>
        <label for="comments">Autres (facultatif) :</label><br>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
    </div>
</div>

<style>
    .flex-container {
        display: flex;
        justify-content: space-between; /* Espace entre les deux champs */
        margin: 20px 0; /* Ajoute un espacement vertical */
    }
    
    fieldset {
        width: 45%; /* Largeur des fieldsets */
    } 
</style>

  <div class="question">
        
          <label><strong>Les services publics sont-ils facilement accessibles pour tous ? (géographiquement, financièrement, etc.)
          <span class=""></span> </label></strong>
        
        <br>
        <label><input type="radio" id="ouiaccessible" name="accessible" value="Oui" > Oui  &nbsp;&nbsp;&nbsp;&nbsp; <label><input type="radio" id="nonaccessible" name="accessible" value="Non"> Non</label></label>
  
    </div>
    <div class="question">
                <label for="obstacle"> <strong>Quels sont les principaux obstacles à l'accès aux services publics ?</strong></label>
                <div class="obstacles">
    <label><input type="checkbox" name="obstacles" value="Barrières géographiques">&nbsp; Barrières géographiques (éloignement, manque d'infrastructures)</label><br>

    <label><input type="checkbox" name="obstacles" value="Complexité administrative">&nbsp; Complexité administrative (procédures compliquées, documents requis)</label><br>
    <label><input type="checkbox" name="obstacles" value="Manque d'information"> &nbsp;Manque d'information (méconnaissance des services disponibles)</label><br>

</div>

<label for="comments">Autres (facultatif) :</label><br>
                <textarea id="obstacle" name="obstacle"></textarea>
            </div>

    <div class="question">
    <label><strong> Les procédures administratives sont-elles trop longues et complexes ?</strong></label><br>
    <label>
        <input type="radio" id="yes" name="service_long" value="oui"> Oui &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" id="no" name="service_long" value="non"> Non
    </label>
    
  </div>

  <div class="question">
      <label><strong> Les services publics répondent-ils à vos besoins de manière efficace ?</strong></label><br>
      <label>
          <input type="radio" id="efficace-oui" name="service_efficace" value="oui"> Oui &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" id="efficace-non" name="service_efficace" value="non"> Non
      </label>
      
  </div>

      <div class="question">
          <label><strong>À votre avis, les services publics sont-ils suffisamment modernisés pour répondre aux défis actuels ?</strong> </label><br>
          <label>
              <input type="radio" id="modernise-oui" name="service_modernise" value="oui"> Oui &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" id="modernise-non" name="service_modernise" value="non"> Non
          </label>
          
      </div>

      <div class="question">
    <label for="serviceFeedback">
        <strong>Quels outils numériques ou technologiques pourraient améliorer les services publics ?</strong>
    </label>
    <div class="service-tools">
        <label><input type="checkbox" name="digital_tools" value="Portail en ligne">&nbsp; Portail en ligne pour accéder aux services publics (demandes en ligne, suivi)</label><br>
        
        <label><input type="checkbox" name="digital_tools" value="Guichets automatiques"> &nbsp;Guichets automatiques ou bornes interactives pour effectuer des démarches administratives</label><br>
      
        <label><input type="checkbox" name="digital_tools" value="Chatbots et assistants virtuels"> &nbsp;Chatbots et assistants virtuels pour répondre aux questions fréquentes</label><br>
    
    </div>

    <label for="comments">Autres (facultatif) :</label><br>

                <textarea id="service_outils" name="service_outils"></textarea>
            </div>

            <div class="buttons">
            <button type="button" class="btn-grey" id="prev1">
            &#8592; Précédent
          </button>
          <button type="button" class="btn-green" id="next2">
         Suivant &#8594;
  </button>
   </div>
        </div>

        <!-- Make sure to continue your form structure here -->
        <div id="section3" class="section">
            <h4 style="text-align:center"> Attentes et Priorités pour la Réforme</h4>
            <div class="question">
    <label><strong>Quelles sont, selon vous, les trois principales réformes à mettre en œuvre pour améliorer le service public ? </strong></label><br>
    <div class="reformes-options">
        <label><input type="checkbox" name="reformes" value="Digitalisation"> &nbsp;Digitalisation des services </label><br>
        <label><input type="checkbox" name="reformes" value="Simplification des démarches"> &nbsp;Simplification des démarches administratives </label><br>
        
        <label><input type="checkbox" name="reformes" value="Transparence"> &nbsp;Renforcement de la transparence et de la lutte contre la corruption</label><br>
        <label><input type="checkbox" name="reformes" value="Accès pour tous">&nbsp; Amélioration de l'accessibilité des services publics pour les populations marginalisées</label><br>
        <label><input type="checkbox" name="reformes" value="Décentralisation"> &nbsp;Décentralisation pour rapprocher les services publics des citoyens</label><br>

        <label><input type="checkbox" name="reformes" value="Évaluation des services"> &nbsp;Mise en place d'un système d'évaluation et de feedback pour améliorer en continu les services</label><br>
    </div>
    <label for="comments">Autres (facultatif) :</label><br>
          <textarea name="reformes" rows="3" ></textarea>
      </div>

      <div class="question">
          <label><strong> Quelles mesures concrètes faudrait-il mettre en place pour améliorer la qualité des services publics ?</strong></label><br>
          <label><input type="checkbox" name="reform_measures" value="Digitalisation complète des services administratifs"> &nbsp;Digitalisation complète des services administratifs</label><br>
    <label><input type="checkbox" name="reform_measures" value="Formation continue des agents publics">&nbsp; Formation continue des agents publics</label><br>
    <label><input type="checkbox" name="reform_measures" value="Mise en place de guichets uniques"> &nbsp;Mise en place de guichets uniques</label><br>
    <label><input type="checkbox" name="reform_measures" value="Évaluation systématique de la satisfaction des usagers">&nbsp; Évaluation systématique de la satisfaction des usagers</label><br>
    <label><input type="checkbox" name="reform_measures" value="Amélioration des infrastructures et équipements">&nbsp; Amélioration des infrastructures et équipements</label><br>
    <label><input type="checkbox" name="reform_measures" value="Décentralisation et accessibilité géographique"> &nbsp;Décentralisation et accessibilité géographique</label><br>

    <label><input type="checkbox" name="reform_measures" value="Transparence et lutte contre la corruption"> &nbsp;Transparence et lutte contre la corruption</label><br>
    <label for="comments">Autres (facultatif) :</label><br>
          <textarea name="ameliorer_services" rows="3" ></textarea>
      </div>

      <div class="question">
         
          <label for="transparencyMeasures"><strong>Comment garantir la transparence et la responsabilité des administrations publiques ?</strong></label><br>
        <label><input type="checkbox" name="transparency_measures" value="Publication régulière des rapports financiers"> Publication régulière des rapports financiers</label><br>
        <label><input type="checkbox" name="transparency_measures" value="Audits indépendants et publics"> Audits indépendants et publics</label><br>
        <label><input type="checkbox" name="transparency_measures" value="Accès libre aux informations publiques"> Accès libre aux informations publiques </label><br>
        <label><input type="checkbox" name="transparency_measures" value="Rendre publiques les décisions administratives importantes"> Rendre publiques les décisions administratives importantes</label><br>
        <label><input type="checkbox" name="transparency_measures" value="Sanctions claires pour les fautes administratives"> Sanctions claires pour les fautes administratives</label><br>
        <label><input type="checkbox" name="transparency_measures" value="Suivi des performances des fonctionnaires"> Suivi des performances des fonctionnaires</label><br>
        <label><input type="checkbox" name="transparency_measures" value="Organiser des consultations publiques"> Organiser des concertations publiques pour impliquer les citoyens dans les décisions</label><br>
              <textarea name="transparence_responsabilite" rows="3"></textarea>
      </div>

      <div class="question">
         
          <label for="accessibilityActions"><strong>Quelles actions pourraient être entreprises pour rendre les services publics plus accessibles à tous ?</strong></label><br>
    <label><input type="checkbox" name="accessibility_actions" value="Décentralisation des services publics"> &nbsp;Décentralisation des services publics pour une meilleure couverture géographique</label><br>
    <label><input type="checkbox" name="accessibility_actions" value="Simplification des démarches administratives">&nbsp; Simplification des démarches administratives</label><br>

    <label><input type="checkbox" name="accessibility_actions" value="Amélioration de l'accessibilité pour les personnes handicapées">&nbsp; Amélioration de l'accessibilité pour les personnes handicapées</label><br>
    <label><input type="checkbox" name="accessibility_actions" value="Disponibilité d'informations multilingues">&nbsp; Disponibilité d'informations multilingues pour mieux servir les populations diverses</label><br>
          <textarea name="accessibilite_services" rows="3" ></textarea>
      </div>

      <div class="question">
          <label><strong> Comment simplifier les procédures administratives et réduire les délais de traitement ?</strong></label><br>
          <label><input type="checkbox" name="simplification_actions" value="Automatisation des processus">&nbsp; Automatisation des processus administratifs</label><br>
          <label><input type="checkbox" name="simplification_actions" value="Numérisation des documents">&nbsp; Numérisation des documents pour éviter les démarches papier</label><br>
          <label><input type="checkbox" name="simplification_actions" value="Guichet unique"> &nbsp;Mise en place d'un guichet unique pour centraliser les démarches</label><br>

          <label><input type="checkbox" name="simplification_actions" value="Suivi en temps réel des demandes"> &nbsp;Suivi en temps réel des demandes via des plateformes en ligne</label><br>
          <label><input type="checkbox" name="simplification_actions" value="Délais fixes et transparents"> &nbsp;Délais de traitement fixes et transparents pour chaque procédure</label><br>
          <label for="comments">Autres (facultatif) :</label><br>
          <textarea name="simplification_procedures" rows="3" ></textarea>
      </div>

      <div class="question">
          <label><strong> Comment améliorer la coordination entre les différents services publics ?</strong></label><br>
          <label><input type="checkbox" name="coordination_actions" value="Plateformes partagées de communication"> &nbsp;Mise en place de plateformes partagées pour la communication inter-services</label><br>

          <label><input type="checkbox" name="coordination_actions" value="Outils numériques collaboratifs">&nbsp; Utilisation d'outils numériques collaboratifs pour faciliter la coopération</label><br>
          <label><input type="checkbox" name="coordination_actions" value="Processus standardisés">&nbsp; Standardisation des processus administratifs pour tous les services</label><br>
          <label><input type="checkbox" name="coordination_actions" value="Partage d'informations en temps réel"> &nbsp;Partage d'informations en temps réel entre les services via des systèmes interconnectés</label><br>
          <label><input type="checkbox" name="coordination_actions" value="Formations conjointes"> &nbsp;Organisation de formations conjointes pour les agents des différents services</label><br>
          <label for="comments">Autres (facultatif) :</label><br>
                <textarea name="coordination_services" rows="3" ></textarea>
      </div>

      <div class="question">
          <label><strong> Comment encourager l'utilisation des technologies numériques dans les services publics ?</strong></label><br>
          <label><input type="checkbox" name="digital_encouragement" value="Formation du personnel">&nbsp; Offrir des formations aux employés pour les initier aux nouvelles technologies</label><br>

          <label><input type="checkbox" name="digital_encouragement" value="Campagnes de sensibilisation"> &nbsp;Lancer des campagnes de sensibilisation pour encourager les citoyens à utiliser les services en ligne</label><br>
          <label><input type="checkbox" name="digital_encouragement" value="Modernisation des infrastructures">&nbsp; Moderniser les infrastructures technologiques dans les administrations</label><br>

          <label><input type="checkbox" name="digital_encouragement" value="Récompenses pour les innovations"> &nbsp;Créer des récompenses ou des concours pour les innovations numériques au sein des administrations publiques</label><br>
          <label for="comments">Autres (facultatif) :</label><br>
                <textarea name="technologies_numeriques" rows="3" ></textarea>
      </div>

      <div class="question">
          <label>Comment former les agents publics aux nouveaux outils et méthodes de travail ?</label><br>
          <label><input type="checkbox" name="training_methods" value="Formations en présentiel">&nbsp; Organiser des formations  avec des experts du domaine</label><br>

          <label><input type="checkbox" name="training_methods" value="Modules e-learning">&nbsp; Mettre en place des modules de e-learning accessibles à tout moment</label><br>

          <label><input type="checkbox" name="training_methods" value="Ateliers pratiques">&nbsp; Organiser des ateliers pratiques pour une approche hands-on des outils</label><br>
          <label><input type="checkbox" name="training_methods" value="Matériel de formation">&nbsp; Fournir du matériel de formation (guides, vidéos) pour une auto-formation</label><br>
          <label for="comments">Autres (facultatif) :</label><br>
                <textarea name="formation_agents" rows="3" ></textarea>
      </div>


            <div class="buttons">
                <button type="button" class="btn-grey" id="prev2"> &#8592;Précédent</button>
                <button type="button" class="btn-green"  id="next3">Suivant &#8594;</button>
            </div>
        </div>

        <div id="section4" class="section">
            <h4 style="text-align:center"> Implication des Citoyens</h4>
            <div class="question">
        <label> <strong>Comment les citoyens pourraient-ils être davantage associés aux décisions concernant la réforme du service public ?</strong></label><br>
        <label><input type="checkbox" name="citizen_participation" value="Consultations publiques">&nbsp; Organiser des concertations publiques pour recueillir les avis des citoyens</label><br>
        <label><input type="checkbox" name="citizen_participation" value="Sondages">&nbsp; Mettre en place des sondages pour connaître les opinions et suggestions des citoyens</label><br>

        <label><input type="checkbox" name="citizen_participation" value="Plateformes de feedback">&nbsp; Développer des plateformes en ligne où les citoyens peuvent donner leur avis et proposer des idées</label><br>

        <label><input type="checkbox" name="citizen_participation" value="Partenariats avec des ONG"> &nbsp;Établir des partenariats avec des ONG pour faciliter la participation citoyenne</label><br>
        <label><input type="checkbox" name="citizen_participation" value="Délibérations citoyennes">&nbsp; Organiser des délibérations citoyennes pour permettre une discussion approfondie sur les réformes</label><br>
        <label for="comments">Autres (facultatif) :</label><br>
        <textarea name="association_citoyens" rows="3" ></textarea>
   </div>

      <div class="question">
          <label><strong>Quels outils de participation citoyenne pourraient être mis en place ?</strong> </label><br>
          <label><input type="checkbox" name="participation_tools" value="Plateformes en ligne">&nbsp; Plateformes en ligne pour soumettre des idées et des propositions</label><br>
          <label><input type="checkbox" name="participation_tools" value="Applications mobiles"> &nbsp;Applications mobiles dédiées à la participation citoyenne</label><br>

          <label><input type="checkbox" name="participation_tools" value="Outils de vote en ligne">&nbsp; Outils de vote en ligne pour des décisions spécifiques</label><br>
          <label><input type="checkbox" name="participation_tools" value="Forums de discussion"> &nbsp;Forums de discussion pour échanger des idées et des solutions</label><br>
          <label><input type="checkbox" name="participation_tools" value="Médiation citoyenne"> &nbsp;Outils de médiation pour résoudre des conflits d'intérêts</label><br>
          <label><input type="checkbox" name="participation_tools" value="Budget participatif"> &nbsp;Initiatives de budget participatif pour impliquer les citoyens dans l'allocation des ressources</label><br>
                <textarea name="outils_participation" rows="3" ></textarea>
      </div>

            <div class="buttons">
                <button type="button" class="btn-grey"  id="prev3"> &#8592; Précédent</button>
                <button type="button" class="btn-green"  id="next4">Suivant &#8594;</button>
            </div>
        </div>

        <div id="section5" class="section">
            <h4 style="text-align:center"> Autres Commentaires</h4>
            <div class="question">
                <label>Commentaires supplémentaires :</label>
                <textarea id="additionalComments" name="additional_comments"></textarea>
            </div>
            <div class="buttons">
                <button type="button" class="btn-grey" id="prev4"> &#8592; Précédent</button>
                <button type="submit" class="btn-green" id="submit">Soumettre</button>
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
                    if (i === index) {
                        section.classList.add('active'); 
                        section.classList.add('fade-in'); // Animation lors de l'affichage de la section
                    } else {
                        section.classList.remove('active');
                        section.classList.remove('fade-in');
                    }
                });
            }

    // Fonction de validation des champs obligatoires (uniquement pour les champs visibles)
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

    // Gestion de l'évaluation par étoiles
    const stars = document.querySelectorAll('.star');
    const satisfactionMessage = document.getElementById('satisfactionMessage');
    const serviceQualityInput = document.getElementById('service_quality');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-value');
            serviceQualityInput.value = rating; // Mettre à jour la valeur cachée

            // Mettre à jour le message de satisfaction
            switch (rating) {
                case '1':
                    satisfactionMessage.textContent = '😡 Mauvaise';
                    break;
                case '2':
                    satisfactionMessage.textContent = '😟 Insatisfaisant';
                    break;
                case '3':
                    satisfactionMessage.textContent = '😐 Moyenne';
                    break;
                case '4':
                    satisfactionMessage.textContent = '😊 Satisfaisant';
                    break;
                case '5':
                    satisfactionMessage.textContent = '😁 Excellent';
                    break;
            }

            // Mettre à jour les couleurs des étoiles
            stars.forEach(star => {
                star.classList.remove('selected', 'low', 'medium', 'mediume', 'highe', 'high'); // Réinitialiser les classes
                if (star.getAttribute('data-value') <= rating) {
                    star.classList.add('selected'); // Couleur pour les étoiles sélectionnées
                }
            });

            // Changer la couleur des étoiles selon la note
            if (rating <= 1) {
                stars.forEach(star => star.classList.add('low'));
            } else if (rating == 2) {
                stars.forEach(star => star.classList.add('medium'));
            } else if (rating == 3) {
                stars.forEach(star => star.classList.add('mediume'));
            } else if (rating == 4) {
                stars.forEach(star => star.classList.add('highe'));
            } else {
                stars.forEach(star => star.classList.add('high'));
            }
                });
            });

            // Afficher la première section par défaut
            showSection(currentSection);
        });

                // Ajout d'une animation CSS pour la transition entre les sections
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
<style>
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
