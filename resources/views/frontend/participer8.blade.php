
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Concertation Nationale - Formulaire Ludique</title>

  <!-- Bootstrap 5 -->

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
  />
  <link href="assets/img/logoconcertation.PNG" rel="icon">
  <link href="assets/img/logoconcertation.PNG" rel="apple-touch-icon">

  <!-- Animate.css (pour icônes animées, transitions, etc.) -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- FontAwesome (icônes) -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet">
  <link href="/concertations/resources/css/styles.css" rel="stylesheet">

  <style>
    /* ===========================
       BODY & BACKGROUND
    =========================== */
    body {
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
 /*  background: url("assets/img/pcnrsps.webp") no-repeat center center;*/
  background-size: cover;
  position: relative;
  min-height: 100vh;
}


body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* Couche opaque */
  z-index: 1;
}

form {
  position: relative;
  z-index: 2;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

}

    body::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(255, 255, 255, 0.85);
      pointer-events: none;
      z-index: 0;
    }

    .main-content {
      position: relative;
      z-index: 1;
      margin-top:100px;

    }

    /* ===========================
       HEADER
    =========================== */
    header {
      background-color: rgba(255, 255, 255, 0.9);
      box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
      z-index: 2;
      position: sticky;
      top: 0;
    }
    .navbar-brand img {
      height: 40px;
    }

    /* ===========================
       CONTAINER & TITLES
    =========================== */
    .container {
      max-width: 1200px;
    }
    .page-title {
      margin-top: 80px;
      margin-bottom: 30px;
    }

    /* ===========================
       THEME CARDS (3 par ligne)
    =========================== */
    .theme-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }

    .theme-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      padding: 20px;
      cursor: pointer;
      transition: transform 0.3s, box-shadow 0.3s;
      position: relative;
    }
    .theme-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }
    .theme-card h4 {
      margin: 0;
      font-weight: 600;
      font-size: 1.2rem;
      color: #333;
    }
    .theme-card p {
      color: #666;
      margin-bottom: 0;
      font-size: 0.95rem;
    }
    /* Icône animée */
    .theme-icon {
      color: #007bff;
      margin-right: 8px;
    }
    .theme-icon.animate__animated.animate__heartBeat:hover {
      animation-iteration-count: infinite;
    }

    /* ===========================
       FORMS / SECTIONS
    =========================== */
    .hidden-section {
      display: none;
    }
    .section-active {
      display: block;
    }
    h3.section-title {
      margin-top: 30px;
      margin-bottom: 20px;
      font-weight: 600;
      color: #444;
    }

    .btn-return {
      background-color: #6c757d;
      border: none;
      margin-bottom: 1rem;
    }
    .btn-return:hover {
      opacity: 0.9;
    }

    /* ===========================
       TOAST (Message de félicitations)
    =========================== */
    .toast-container {
      position: fixed;
      top: 70px;
      right: 20px;
      z-index: 1055;
    }
    .toast {
      background-color: #e7f5ff;
      border: 1px solid #b3ecff;
      color: #045f86;
    }
    .toast-header {
      background-color: #b3ecff;
      color: #033c50;
    }

    /* Superposition qui obscurcit le fond */
    .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5); /* Couleur semi-transparente */
    z-index: 1049; /* Juste derrière le toast */
    display: none; /* Cachée par défaut */
    }


    /* ===========================
       MODAL FINAL
    =========================== */
    .modal-content {
      border-radius: 8px;
    }
    .modal-header {
      background-color: #e7f5ff;
      border-bottom: 1px solid #b3ecff;
    }
    .modal-title {
      color: #033c50;
      font-weight: 600;
    }
    #encouragementMessage {
  text-align: center;
  font-weight: bold;
  font-size: 1.5em;
  margin-top:50px;
}
.location-options .form-check-label {
  margin-right: 1.5rem; /* Ajustez la valeur pour plus ou moins d'espace */
}
.btn-return {
    background-color: #007bff; /* Remplacez cette valeur par la couleur désirée */
    color: white; /* Pour le texte en blanc */
    border: none; /* Supprime la bordure si nécessaire */
  }
  .btn-return:hover {
    background-color: #0056b3; /* Une couleur plus foncée pour le survol */
  }

  </style>
</head>
    <body>
    <!-- HEADER -->
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
                    <a href="{{ route('objectif') }}">Objectif</a>
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
    <!-- FIN HEADER -->

    <!-- TOAST Container -->
    <div class="toast-container" id="toastContainer"></div>
    <div id="encouragementMessage" class="animate__animated animate__fadeInDown">
        <h1></h1>
        Votre avis compte pour bâtir un service public de qualité
        <span>💪</span>
    </div>
    <h1></h1>

    <!-- MODAL Final -->
    <div class="modal fade" id="finalModal" tabindex="-1" aria-labelledby="finalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="finalModalLabel">Félicitations !</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
            </div>
            <div class="modal-body">
            <p>
                Vous avez répondu à <b>toutes</b> les thématiques.<br/>
                Un grand merci pour votre contribution précieuse !
            </p>
            </div>
            <div class="modal-footer">
            <button
                type="button"
                class="btn btn-primary"
                data-bs-dismiss="modal"
            >
                Fermer
            </button>
            </div>
        </div>
        </div>
    </div>
    <!-- FIN MODAL -->

    <!-- CONTENU PRINCIPAL -->
    <div class="main-content">
    <div class="container">

    <!-- 1) Étape : Infos générales -->
     <!-- Étape 1 : Infos générales -->
<div id="step1" class="section-active">
  <form id="generalInfoForm" class="needs-validation" novalidate>
    <div class="mb-3">
      <label class="form-label">
        <i class="fas fa-user-clock me-2 text-primary"></i> Âge
      </label>
      <div class="input-group">
        <span class="input-group-text">
          <i class="fas fa-calendar-alt"></i>
        </span>
        <select class="form-select" name="age" required>
          <option value="">-- Sélectionnez votre tranche d'âge --</option>
          <option value="moins_18">Moins de 18 ans</option>
          <option value="18_30">18-30 ans</option>
          <option value="31_45">31-45 ans</option>
          <option value="46_60">46-60 ans</option>
          <option value="plus_60">Plus de 60 ans</option>
        </select>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">
        <i class="fas fa-venus-mars me-2 text-primary"></i> Sexe
      </label><br/>
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="sexe" id="sexeM" value="Masculin" required />
        <label class="form-check-label" for="sexeM">Masculin</label>
      </div>
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="sexe" id="sexeF" value="Féminin" required />
        <label class="form-check-label" for="sexeF">Féminin</label>
      </div>
    </div>

    <div class="mb-4">
      <label class="form-label">
        <i class="fas fa-map-marker-alt me-2 text-primary"></i> Lieu de résidence
      </label>
      <div class="location-options">
        <label class="form-check-label me-4">
          <input type="radio" id="senegal" name="location" value="Senegal" onchange="toggleRegionSelect()" required> Sénégal
        </label>
        <label class="form-check-label">
          <input type="radio" id="diaspora" name="location" value="Diaspora" onchange="toggleRegionSelect()" required> Diaspora
        </label>
      </div>

      <!-- Conteneur pour la sélection de la région et des départements -->
      <div id="region-container" style="display: none;" class="mt-3">
        <label for="region">Choisissez une région :</label>
        <select id="region" onchange="updateDepartments()" class="form-select">
          <option value="">-- Sélectionnez une région --</option>
        </select>
      </div>

      <div id="department-container" style="display: none;" class="mt-3">
        <label for="department">Choisissez un département :</label>
        <select id="department" class="form-select"></select>
      </div>

      <!-- Conteneur pour la sélection des pays de la diaspora -->
      <div id="diasporaCountries" class="mt-3" style="display: none;">
        <label for="country">Sélectionnez votre pays :</label>
        <select id="country" name="country" class="form-select">
          <option value="">-- Choisissez un pays --</option>
          @foreach($countries as $country)
            <option value="{{ $country->code }}">{{ $country->nom }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- CAPTCHA mathématique -->
    <div class="mb-3">
      <label class="form-label">
        <i class="fas fa-question-circle me-2 text-primary"></i> Résolvez cette opération :
      </label>
      <div class="input-group">
        <span class="input-group-text" id="captcha-question"></span>
        <input type="number" id="captcha-answer" name="captcha_answer" class="form-control" required>
        <input type="hidden" id="captcha-correct-answer" name="captcha_correct_answer">
      </div>
      <div class="text-danger mt-1" id="captcha-error" style="display: none;">⚠️ Réponse incorrecte, essayez encore !</div>
    </div>

    <div class="d-grid">
      <button class="btn btn-success" type="submit">
        <i class="fas fa-check-circle me-2"></i>Valider mes informations
      </button>
    </div>
  </form>
</div>
<!-- Fin Étape 1 -->

    <!-- Fin Étape 1 -->

    <!-- 2) Sélection Thèmes -->
    <div id="themeSelection" class="hidden-section mt-5">
      <div class="text-center mb-4">
        <p class="text-secondary">
          Votre contribution est essentielle pour améliorer nos services publics.
          Choisissez une thématique pour commencer et aidez-nous à bâtir un avenir meilleur !
        </p>
      </div>

      <!-- Cartes en grille (3 par ligne) -->
      <div class="theme-grid" id="themeCardsContainer">
        <!-- 1) Accès aux services publics -->
        <div class="theme-card" data-theme="accesPublics">
          <h4>
            <i class="fas fa-door-open theme-icon animate__animated animate__heartBeat"></i>
            Accès aux services publics
          </h4>
          <p>Fréquence, accessibilité, etc.</p>
        </div>
        <!-- 2) Accueil & orientation -->
        <div class="theme-card" data-theme="accueilOrientation">
          <h4>
            <i class="fas fa-info-circle theme-icon animate__animated animate__heartBeat"></i>
            Accueil & orientation
          </h4>
          <p>Qualité de l'accueil, clarté des indications...</p>
        </div>
        <!-- 3) Diligence -->
        <div class="theme-card" data-theme="diligence">
          <h4>
            <i class="fas fa-clock theme-icon animate__animated animate__heartBeat"></i>
            Diligence
          </h4>
          <p>Délais, complexité, etc.</p>
        </div>
        <!-- 4) Coût du service -->
        <div class="theme-card" data-theme="coutService">
          <h4>
            <i class="fas fa-money-bill-wave theme-icon animate__animated animate__heartBeat"></i>
            Coût du service
          </h4>
          <p>Tarifs, paiement, rapport qualité-prix.</p>
        </div>
        <!-- 5) Corruption -->
        <div class="theme-card" data-theme="corruption">
          <h4>
            <i class="fas fa-shield-alt theme-icon animate__animated animate__heartBeat"></i>
            Corruption
          </h4>
          <p>Transparence, pots-de-vin, etc.</p>
        </div>
        <!-- 6) Réclamations -->
        <div class="theme-card" data-theme="reclamations">
          <h4>
            <i class="fas fa-bullhorn theme-icon animate__animated animate__heartBeat"></i>
            Réclamations
          </h4>
          <p>Procédure, clarté, délais...</p>
        </div>
        <!-- 7) Digitale -->
        <div class="theme-card" data-theme="digitale">
          <h4>
            <i class="fas fa-laptop-code theme-icon animate__animated animate__heartBeat"></i>
            Transformation digitale
          </h4>
          <p>Services en ligne, bugs, etc.</p>
        </div>
        <!-- 8) Participation -->
        <div class="theme-card" data-theme="participation">
          <h4>
            <i class="fas fa-users theme-icon animate__animated animate__heartBeat"></i>
            Participation citoyenne
          </h4>
          <p>Implication, satisfaction, impact...</p>
        </div>
        <!-- 9) Ressources Humaines -->
        <div class="theme-card" data-theme="ressourcesHumaines">
          <h4>
            <i class="fas fa-handshake theme-icon animate__animated animate__heartBeat"></i>
            Ressources humaines
          </h4>
          <p>Relations agents/usagers, etc.</p>
        </div>
      </div>
    </div>
    <!-- Fin Sélection Thèmes -->

    <!-- =========================
        FORMULAIRES PAR THÈME
    ========================= -->

    <!-- 1) Accès aux services publics -->
    <div id="formAccesPublics" class="hidden-section">
      <button class="btn btn-return" id="btnReturn1">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-door-open theme-icon"></i>
        Accès aux services publics
      </h3>

      <form id="formAccesPublicsForm" class="needs-validation" novalidate action="{{ route('soumissions.acces_publics') }}">
        @csrf
        <!-- Q1: Services utilisés fréquemment -->
        <div class="mb-3"> <!-- 1) Étape : Infos générales -->
    <div id="step1" class="section-active">
  <form id="generalInfoForm" class="needs-validation" novalidate>
    <div class="mb-3">
      <label class="form-label">
        <i class="fas fa-user-clock me-2 text-primary"></i> Âge
      </label>
      <div class="input-group">
        <span class="input-group-text">
          <i class="fas fa-calendar-alt"></i>
        </span>
        <select class="form-select" name="age" required>
          <option value="">-- Sélectionnez votre tranche d'âge --</option>
          <option value="moins_18">Moins de 18 ans</option>
          <option value="18_30">18-30 ans</option>
          <option value="31_45">31-45 ans</option>
          <option value="46_60">46-60 ans</option>
          <option value="plus_60">Plus de 60 ans</option>
        </select>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">
        <i class="fas fa-venus-mars me-2 text-primary"></i> Sexe
      </label><br/>
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="sexe" id="sexeM" value="Masculin" required />
        <label class="form-check-label" for="sexeM">Masculin</label>
      </div>
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="sexe" id="sexeF" value="Féminin" required />
        <label class="form-check-label" for="sexeF">Féminin</label>
      </div>
    </div>

    <div class="mb-4">
      <label class="form-label">
        <i class="fas fa-map-marker-alt me-2 text-primary"></i> Lieu de résidence
      </label>
      <div class="location-options">
        <label class="form-check-label me-4">
          <input type="radio" id="senegal" name="location" value="Senegal" onchange="toggleRegionSelect()" required> Sénégal
        </label>
        <label class="form-check-label">
          <input type="radio" id="diaspora" name="location" value="Diaspora" onchange="toggleRegionSelect()" required> Diaspora
        </label>
      </div>

      <!-- Conteneur pour la sélection de la région et des départements -->
      <div id="region-container" style="display: none;" class="mt-3">
        <label for="region">Choisissez une région :</label>
        <select id="region" onchange="updateDepartments()" class="form-select">
          <option value="">-- Sélectionnez une région --</option>
        </select>
      </div>

      <div id="department-container" style="display: none;" class="mt-3">
        <label for="department">Choisissez un département :</label>
        <select id="department" class="form-select"></select>
      </div>

      <!-- Conteneur pour la sélection des pays de la diaspora -->
      <div id="diasporaCountries" class="mt-3" style="display: none;">
        <label for="country">Sélectionnez votre pays :</label>
        <select id="country" name="country" class="form-select">
          <option value="">-- Choisissez un pays --</option>
          @foreach($countries as $country)
            <option value="{{ $country->code }}">{{ $country->nom }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- CAPTCHA mathématique -->
    <div class="mb-3">
      <label class="form-label">
        <i class="fas fa-question-circle me-2 text-primary"></i> Résolvez cette opération :
      </label>
      <div class="input-group">
        <span class="input-group-text" id="captcha-question"></span>
        <input type="number" id="captcha-answer" name="captcha_answer" class="form-control" required>
        <input type="hidden" id="captcha-correct-answer" name="captcha_correct_answer">
      </div>
    </div>

    <div class="d-grid">
      <button class="btn btn-success" type="submit">
        <i class="fas fa-check-circle me-2"></i>Valider mes informations
      </button>
    </div>
  </form>
</div>
    <!-- Fin Étape 1 -->

    <!-- 2) Sélection Thèmes -->
    <div id="themeSelection" class="hidden-section mt-5">
      <div class="text-center mb-4">
        <p class="text-secondary">
          Votre contribution est essentielle pour améliorer nos services publics.
          Choisissez une thématique pour commencer et aidez-nous à bâtir un avenir meilleur !
        </p>
      </div>

      <!-- Cartes en grille (3 par ligne) -->
      <div class="theme-grid" id="themeCardsContainer">
        <!-- 1) Accès aux services publics -->
        <div class="theme-card" data-theme="accesPublics">
          <h4>
            <i class="fas fa-door-open theme-icon animate__animated animate__heartBeat"></i>
            Accès aux services publics
          </h4>
          <p>Fréquence, accessibilité, etc.</p>
        </div>
        <!-- 2) Accueil & orientation -->
        <div class="theme-card" data-theme="accueilOrientation">
          <h4>
            <i class="fas fa-info-circle theme-icon animate__animated animate__heartBeat"></i>
            Accueil & orientation
          </h4>
          <p>Qualité de l'accueil, clarté des indications...</p>
        </div>
        <!-- 3) Diligence -->
        <div class="theme-card" data-theme="diligence">
          <h4>
            <i class="fas fa-clock theme-icon animate__animated animate__heartBeat"></i>
            Diligence
          </h4>
          <p>Délais, complexité, etc.</p>
        </div>
        <!-- 4) Coût du service -->
        <div class="theme-card" data-theme="coutService">
          <h4>
            <i class="fas fa-money-bill-wave theme-icon animate__animated animate__heartBeat"></i>
            Coût du service
          </h4>
          <p>Tarifs, paiement, rapport qualité-prix.</p>
        </div>
        <!-- 5) Corruption -->
        <div class="theme-card" data-theme="corruption">
          <h4>
            <i class="fas fa-shield-alt theme-icon animate__animated animate__heartBeat"></i>
            Corruption
          </h4>
          <p>Transparence, pots-de-vin, etc.</p>
        </div>
        <!-- 6) Réclamations -->
        <div class="theme-card" data-theme="reclamations">
          <h4>
            <i class="fas fa-bullhorn theme-icon animate__animated animate__heartBeat"></i>
            Réclamations
          </h4>
          <p>Procédure, clarté, délais...</p>
        </div>
        <!-- 7) Digitale -->
        <div class="theme-card" data-theme="digitale">
          <h4>
            <i class="fas fa-laptop-code theme-icon animate__animated animate__heartBeat"></i>
            Transformation digitale
          </h4>
          <p>Services en ligne, bugs, etc.</p>
        </div>
        <!-- 8) Participation -->
        <div class="theme-card" data-theme="participation">
          <h4>
            <i class="fas fa-users theme-icon animate__animated animate__heartBeat"></i>
            Participation citoyenne
          </h4>
          <p>Implication, satisfaction, impact...</p>
        </div>
        <!-- 9) Ressources Humaines -->
        <div class="theme-card" data-theme="ressourcesHumaines">
          <h4>
            <i class="fas fa-handshake theme-icon animate__animated animate__heartBeat"></i>
            Ressources humaines
          </h4>
          <p>Relations agents/usagers, etc.</p>
        </div>
      </div>
    </div>
          <label class="form-label">Quels services publics utilisez-vous le plus fréquemment ?</label>
          <!-- name="servicesFrequents[]" => obliger au moins 1 coché -->
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="papiersAdmin" name="servicesFrequents[]" value="Délivrance de papiers administratifs">
            <label class="form-check-label" for="papiersAdmin">
              Délivrance de papiers administratifs
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="defenseSecurite" name="servicesFrequents[]" value="Défense et sécurité">
            <label class="form-check-label" for="defenseSecurite">
              Défense et sécurité
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="santeProtection" name="servicesFrequents[]" value="Santé et protection sociale">
            <label class="form-check-label" for="santeProtection">
              Santé et protection sociale
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="educationEnseignement" name="servicesFrequents[]" value="Éducation et Enseignement">
            <label class="form-check-label" for="educationEnseignement">
              Éducation et Enseignement
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="habitatCadreVie" name="servicesFrequents[]" value="Habitat et cadre de vie">
            <label class="form-check-label" for="habitatCadreVie">
              Habitat et cadre de vie
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="transport" name="servicesFrequents[]" value="Transport">
            <label class="form-check-label" for="transport">
              Transport
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="environnement" name="servicesFrequents[]" value="Environnement">
            <label class="form-check-label" for="environnement">
              Environnement
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="finances" name="servicesFrequents[]" value="Finances">
            <label class="form-check-label" for="finances">
              Finances
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="sportLoisirCulture" name="servicesFrequents[]" value="Sport, Loisirs, culture">
            <label class="form-check-label" for="sportLoisirCulture">
              Sport, Loisirs, culture
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="industrie" name="servicesFrequents[]" value="Industrie">
            <label class="form-check-label" for="industrie">
              Industrie
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="agriculturePecheElevage" name="servicesFrequents[]" value="Agriculture, pêche, élevage">
            <label class="form-check-label" for="agriculturePecheElevage">
              Agriculture, pêche, élevage
            </label>
          </div>
        </div>

        <!-- Q2: Accessibilité -->
       <!-- Sélection de l'accessibilité -->
        <div class="mb-3">
        <label class="form-label">Comment évaluez-vous l’accessibilité de ces services ?</label>
        <select class="form-select" name="accessibilite" required>
            <option value="">-- Sélectionnez --</option>
            <option value="tres_accessible">Très accessible</option>
            <option value="accessible">Accessible</option>
            <option value="moyennement_accessible">Moyennement accessible</option>
            <option value="difficilement_accessible">Difficilement accessible</option>
            <option value="tres_difficilement_accessible">Très difficilement accessible</option>
        </select>
        </div>

        <!-- Explication sur l'accessibilité -->
        <div class="mb-3">
        <label class="form-label">Pourquoi ?</label>
        <textarea class="form-control" name="pourquoi_accessibilite" rows="2" required></textarea>
        </div>

        <!-- Suggestions -->
        <div class="mb-3">
        <label class="form-label">Avez-vous des suggestions spécifiques pour améliorer l’accès aux services publics ?</label>
        <textarea class="form-control" name="suggestions_acces" rows="2" required></textarea>
        </div>

        <!-- Q4: Mode d'info -->
        <div class="mb-3">
          <label class="form-label">Comment préférez-vous être informé(e) ?</label>
          <!-- Donnons un name pour valider au besoin -->
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="infoCourrier" name="infoPreferences[]">
            <label class="form-check-label" for="infoCourrier">Courrier</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="infoMedias" name="infoPreferences[]">
            <label class="form-check-label" for="infoMedias">Médias</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="infoApps" name="infoPreferences[]">
            <label class="form-check-label" for="infoApps">Applications</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="infoAutres" name="infoPreferences[]">
            <label class="form-check-label" for="infoAutres">Autres</label>
          </div>
        </div>

        <div class="d-grid">
          <button type="button" id="submitAccesPublics" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Accès aux services publics -->

    <!-- 2) Accueil & orientation -->
    <div id="formAccueilOrientation" class="hidden-section">
      <button class="btn btn-return" id="btnReturn2">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-info-circle theme-icon"></i>
        Accueil & orientation
      </h3>
      <form id="formAccueilOrientationForm" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">
            Comment évaluez-vous l’accueil et l’orientation dans les services publics ?
          </label>
          <select class="form-select" required>
            <option value="">-- Sélectionnez --</option>
            <option value="excellent">Excellent</option>
            <option value="bon">Bon</option>
            <option value="moyen">Moyen</option>
            <option value="mauvais">Mauvais</option>
            <option value="tres_mauvais">Très mauvais</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Pourquoi ?</label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Les indications et signalétiques étaient-elles claires et suffisantes ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="signaletique" id="sign_o" required>
            <label class="form-check-label" for="sign_o">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="signaletique" id="sign_n" required>
            <label class="form-check-label" for="sign_n">Non</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Avez-vous été orienté(e) vers l’agent public ou le service approprié ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="guide_service" id="guide_o" required>
            <label class="form-check-label" for="guide_o">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="guide_service" id="guide_n" required>
            <label class="form-check-label" for="guide_n">Non</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Avez-vous des suggestions spécifiques pour améliorer l’accueil et l’orientation ?
          </label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="d-grid">
          <button type="button" id="submitAccueilOrientation" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Accueil & Orientation -->

    <!-- 3) Diligence -->
    <div id="formDiligence" class="hidden-section">
      <button class="btn btn-return" id="btnReturn3">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-clock theme-icon"></i>
        Diligence dans le traitement
      </h3>
      <form id="formDiligenceForm" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">Les procédures administratives sont-elles longues ?</label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="procedures_longues" id="proc_oui" required>
            <label class="form-check-label" for="proc_oui">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="procedures_longues" id="proc_non" required>
            <label class="form-check-label" for="proc_non">Non</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Pourquoi ?</label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Avez-vous des suggestions ?</label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Les formalités administratives sont-elles complexes ?</label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="formComplexes" id="formYes" required>
            <label class="form-check-label" for="formYes">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="formComplexes" id="formNo" required>
            <label class="form-check-label" for="formNo">Non</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Pourquoi ?</label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Avez-vous des suggestions ?</label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="d-grid">
          <button type="button" id="submitDiligence" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Diligence -->

    <!-- 4) Coût du service -->
    <div id="formCoutService" class="hidden-section">
      <button class="btn btn-return" id="btnReturn4">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-money-bill-wave theme-icon"></i>
        Coût du service
      </h3>
      <form id="formCoutServiceForm" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">
            Comment évaluez-vous le coût des prestations des services publics ?
          </label>
          <select class="form-select" required>
            <option value="">-- Sélectionnez --</option>
            <option value="tres_abordable">Très abordable</option>
            <option value="abordable">Abordable</option>
            <option value="moyennement_cher">Moyennement cher</option>
            <option value="cher">Cher</option>
            <option value="tres_cher">Très cher</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Pensez-vous que le coût de ces services est justifié par les prestations fournies ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="cout_justifie" id="cout_oui" required>
            <label class="form-check-label" for="cout_oui">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="cout_justifie" id="cout_non" required>
            <label class="form-check-label" for="cout_non">Non</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">
            Quel est le mécanisme de paiement que vous avez utilisé ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="mecaPaiement" id="paiementEspece" required>
            <label class="form-check-label" for="paiementEspece">Espèce</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="mecaPaiement" id="paiementEmoney" required>
            <label class="form-check-label" for="paiementEmoney">e-money</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="mecaPaiement" id="paiementVirement" required>
            <label class="form-check-label" for="paiementVirement">Virement bancaire</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="mecaPaiement" id="paiementAutres" required>
            <label class="form-check-label" for="paiementAutres">Autres</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Avez-vous des suggestions pour rendre les services publics plus abordables ?
          </label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="d-grid">
          <button type="button" id="submitCoutService" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Coût du service -->

    <!-- 5) Corruption -->
    <div id="formCorruption" class="hidden-section">
      <button class="btn btn-return" id="btnReturn5">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-shield-alt theme-icon"></i>
        Corruption
      </h3>
      <form id="formCorruptionForm" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">
            Pensez-vous que la corruption est une réalité dans les services publics de votre région ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="corruption_reelle" id="corr_oui" required>
            <label class="form-check-label" for="corr_oui">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="corruption_reelle" id="corr_non" required>
            <label class="form-check-label" for="corr_non">Non</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">
            Si oui, à quel niveau de gravité évaluez-vous ce problème ?
          </label>
          <select class="form-select" required>
            <option value="">-- Sélectionnez --</option>
            <option value="tres_grave">Très grave</option>
            <option value="grave">Grave</option>
            <option value="moyennement_grave">Moyennement grave</option>
            <option value="peu_grave">Peu grave</option>
            <option value="pas_grave">Pas du tout grave</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">
            Quel type de corruption avez-vous observé ou subi ?
          </label>
          <!-- name="typeCorruption[]" => au moins 1 si “corr_oui” est coché -->
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="potsDeVin" name="typeCorruption[]">
            <label class="form-check-label" for="potsDeVin">Pots-de-vin</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="autresCorrupt" name="typeCorruption[]">
            <label class="form-check-label" for="autresCorrupt">Autres (préciser)</label>
          </div>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Précisez si Autres" />
        </div>

        <div class="mb-3">
          <label class="form-label">
            Quelles suggestions auriez-vous pour améliorer la transparence et l’intégrité ?
          </label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="d-grid">
          <button type="button" id="submitCorruption" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Corruption -->

    <!-- 6) Réclamations -->
    <div id="formReclamations" class="hidden-section">
      <button class="btn btn-return" id="btnReturn6">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-bullhorn theme-icon"></i>
        Services de réclamations
      </h3>
      <form id="formReclamationsForm" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">
            Avez-vous déjà déposé une réclamation auprès d’un service public ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="reclamation_deposee" id="rec_oui" required>
            <label class="form-check-label" for="rec_oui">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="reclamation_deposee" id="rec_non" required>
            <label class="form-check-label" for="rec_non">Non</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">
            Si oui, la réclamation est liée à quel service public ?
          </label>
          <!-- name="reclamationService[]" => au moins 1 coché si “rec_oui” est coché -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="recPapiers" name="reclamationService[]">
            <label class="form-check-label" for="recPapiers">
              Délivrance de papiers administratifs
            </label>
          </div>
          <!-- Ajouter d'autres checkboxes si besoin -->
        </div>

        <div class="mb-3">
          <label class="form-label">Comment avez-vous déposé votre réclamation ?</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mode_reclamation" id="mode1" required>
            <label class="form-check-label" for="mode1">En ligne</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mode_reclamation" id="mode2" required>
            <label class="form-check-label" for="mode2">Par téléphone</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mode_reclamation" id="mode3" required>
            <label class="form-check-label" for="mode3">Courrier physique</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Le processus de réclamation était-il clair ?</label>
          <select class="form-select" required>
            <option value="">-- Sélectionnez --</option>
            <option value="tres_clair">Très clair</option>
            <option value="clair">Clair</option>
            <option value="moyennement_clair">Moyennement clair</option>
            <option value="pas_clair">Pas clair</option>
            <option value="tres_peu_clair">Très peu clair</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">
            Combien de temps a-t-il fallu pour traiter votre réclamation ?
          </label>
          <select class="form-select" required>
            <option value="">-- Sélectionnez --</option>
            <option value="moins_3_jours">Moins de 3 jours</option>
            <option value="une_semaine">Une semaine</option>
            <option value="plus_une_semaine">Plus d’une semaine</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">
            Avez-vous des commentaires supplémentaires sur le service de réclamation ?
          </label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="d-grid">
          <button type="button" id="submitReclamations" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Réclamations -->

    <!-- 7) Digitale -->
    <div id="formDigitale" class="hidden-section">
      <button class="btn btn-return" id="btnReturn7">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-laptop-code theme-icon"></i>
        Transformation digitale
      </h3>
      <form id="formDigitaleForm" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">Utilisez-vous les services publics digitalisés ?</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="services_digitaux" id="serdig_oui" required>
            <label class="form-check-label" for="serdig_oui">Oui</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="services_digitaux" id="serdig_non" required>
            <label class="form-check-label" for="serdig_non">Non</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Si oui, lesquels utilisez-vous le plus souvent ?</label>
          <!-- name="servicesDigitauxUtilises[]" => au moins 1 coché si “serdig_oui” -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="plateformesEnLigne" name="servicesDigitauxUtilises[]">
            <label class="form-check-label" for="plateformesEnLigne">Plateformes en ligne</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="paiementEnLigne" name="servicesDigitauxUtilises[]">
            <label class="form-check-label" for="paiementEnLigne">Paiement en ligne</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="autresDigit" name="servicesDigitauxUtilises[]">
            <label class="form-check-label" for="autresDigit">Autres (préciser)</label>
          </div>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Précisez si Autres" />
        </div>

        <div class="mb-3">
          <label class="form-label">Comment évaluez-vous l’accessibilité des services digitaux ?</label>
          <select class="form-select" required>
            <option value="">-- Sélectionnez --</option>
            <option value="tres_accessible">Très accessible</option>
            <option value="accessible">Accessible</option>
            <option value="moyennement_accessible">Moyennement accessible</option>
            <option value="difficilement_accessible">Difficilement accessible</option>
            <option value="tres_difficilement_accessible">Très difficilement accessible</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Avez-vous rencontré des problèmes en utilisant ces services ?</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="problemes_en_ligne" id="prob_oui" required>
            <label class="form-check-label" for="prob_oui">Oui</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="problemes_en_ligne" id="prob_non" required>
            <label class="form-check-label" for="prob_non">Non</label>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Si oui, quels types de problèmes ?</label>
          <!-- name="problemesEnLigne[]" => si “prob_oui” -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="connexionIssue" name="problemesEnLigne[]">
            <label class="form-check-label" for="connexionIssue">Connexion</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="techniqueIssue" name="problemesEnLigne[]">
            <label class="form-check-label" for="techniqueIssue">Problèmes techniques (bugs, lenteur...)</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="navigationIssue" name="problemesEnLigne[]">
            <label class="form-check-label" for="navigationIssue">Difficultés de navigation</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="carenceInfoIssue" name="problemesEnLigne[]">
            <label class="form-check-label" for="carenceInfoIssue">Carence d’information</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="autresIssue" name="problemesEnLigne[]">
            <label class="form-check-label" for="autresIssue">Autres (préciser)</label>
          </div>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Précisez si autres" />
        </div>

        <div class="mb-3">
          <label class="form-label">
            Quelles améliorations aimeriez-vous voir pour les services publics digitalisés ?
          </label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="d-grid">
          <button type="button" id="submitDigitale" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Digitale -->

    <!-- 8) Participation -->
    <div id="formParticipation" class="hidden-section">
      <button class="btn btn-return" id="btnReturn8">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-users theme-icon"></i>
        Participation citoyenne
      </h3>
      <form id="formParticipationForm" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">
            Êtes-vous informé(e) des réformes des services publics dans votre région ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="inform_reformes" id="infref_oui" required>
            <label class="form-check-label" for="infref_oui">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="inform_reformes" id="infref_non" required>
            <label class="form-check-label" for="infref_non">Non</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Êtes-vous satisfait du niveau de participation citoyenne ?
          </label>
          <select class="form-select" required>
            <option value="">-- Sélectionnez --</option>
            <option value="tres_satisfait">Très satisfait</option>
            <option value="satisfait">Satisfait</option>
            <option value="moyennement_satisfait">Moyennement satisfait</option>
            <option value="insatisfait">Insatisfait</option>
            <option value="tres_insatisfait">Très insatisfait</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Pensez-vous que l’utilisation de plateformes numériques facilite la participation ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="facilite_numerique" id="facil_oui" required>
            <label class="form-check-label" for="facil_oui">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="facilite_numerique" id="facil_non" required>
            <label class="form-check-label" for="facil_non">Non</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Pensez-vous que la participation citoyenne a un impact réel ?
          </label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="impact_reel" id="impactreel_oui" required>
            <label class="form-check-label" for="impactreel_oui">Oui</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="impact_reel" id="impactreel_non" required>
            <label class="form-check-label" for="impactreel_non">Non</label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Quelles suggestions pour améliorer l’inclusion et la participation ?
          </label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="d-grid">
          <button type="button" id="submitParticipation" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Participation -->

    <!-- 9) Ressources humaines -->
    <div id="formRessourcesHumaines" class="hidden-section">
      <button class="btn btn-return" id="btnReturn9">
        <i class="fas fa-arrow-left me-1"></i>Retour
      </button>
      <h3 class="section-title">
        <i class="fas fa-handshake theme-icon"></i>
        Ressources humaines
      </h3>
      <form id="formRessourcesHumainesForm" class="needs-validation" novalidate>
        <div class="mb-3">
          <label class="form-label">
            Que pensez-vous des relations entre agents publics et usagers ?
          </label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Pourquoi ?</label>
          <textarea class="form-control" rows="2" required></textarea>
        </div>

        <div class="d-grid">
          <button type="button" id="submitRessourcesHumaines" class="btn btn-primary">
            <i class="fas fa-paper-plane me-1"></i>Soumettre
          </button>
        </div>
      </form>
    </div>
    <!-- FIN Ressources Humaines -->

  </div><!-- FIN .container -->
</div><!-- FIN .main-content -->

<!-- Zone où les toasts vont s'afficher -->
<div id="toastContainer" class="position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>

<!-- Exemple de modal final (si besoin) -->
<div class="modal fade" id="finalModal" tabindex="-1" aria-labelledby="finalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="finalModalLabel">Félicitations</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vous avez renseigné toutes les thématiques. Merci pour votre contribution !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
/* ======================
   GÉNÉRATION ET VALIDATION DU CAPTCHA
====================== */

function generateCaptcha() {
  let num1 = Math.floor(Math.random() * 10) + 1;
  let num2 = Math.floor(Math.random() * 10) + 1;
  let operators = ['+', '-'];
  let operator = operators[Math.floor(Math.random() * operators.length)];
  let correctAnswer = operator === '+' ? num1 + num2 : num1 - num2;

  const captchaQuestion = document.getElementById('captcha-question');
  const captchaCorrectAnswer = document.getElementById('captcha-correct-answer');

  if (captchaQuestion && captchaCorrectAnswer) {
    captchaQuestion.textContent = `${num1} ${operator} ${num2} = ?`;
    captchaCorrectAnswer.value = correctAnswer;
  }
}

document.addEventListener("DOMContentLoaded", function () {
  generateCaptcha(); // Générer un premier CAPTCHA au chargement
});

/* ==================================================
   CONTRÔLE DU FORMULAIRE INFOS GÉNÉRALES (step1)
================================================== */
const step1Div = document.getElementById("step1");
const generalInfoForm = document.getElementById("generalInfoForm");
const themeSelectionDiv = document.getElementById("themeSelection");

generalInfoForm.addEventListener("submit", async function (e) {
  e.preventDefault(); // Empêche l'action par défaut

  if (!generalInfoForm.checkValidity()) {
    generalInfoForm.reportValidity();
    return;
  }

  // Vérification du CAPTCHA
  let userAnswer = document.getElementById("captcha-answer")?.value || "";
  let correctAnswer = document.getElementById("captcha-correct-answer")?.value || "";
  const captchaError = document.getElementById("captcha-error");

  if (userAnswer !== correctAnswer) {
    if (captchaError) captchaError.style.display = "block";
    generateCaptcha();
    return;
  } else {
    if (captchaError) captchaError.style.display = "none";
  }

  // Désactiver le bouton pour éviter le double envoi
  const submitButton = generalInfoForm.querySelector("button[type='submit']");
  submitButton.disabled = true;
  submitButton.innerHTML = "Envoi en cours...";

  // Collecte des données du formulaire
  let formData = new FormData(generalInfoForm);
  let jsonData = {};

  formData.forEach((value, key) => {
    jsonData[key] = value;
  });

  console.log("📤 Données envoyées :", jsonData); // Debug

  // Vérifier si la balise CSRF existe
  const csrfMeta = document.querySelector('meta[name="csrf-token"]');
  let csrfToken = csrfMeta ? csrfMeta.getAttribute("content") : "";

  // Envoi AJAX sécurisé
  try {
    const response = await fetch("/soumissions/infos-generales", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrfToken,
      },
      body: JSON.stringify(jsonData),
    });

    console.log("📥 Réponse serveur :", response);

    if (!response.ok) {
      let errText = await response.text();
      console.error("🚨 Erreur serveur :", errText);
      alert("❌ Erreur lors de l'enregistrement : " + errText);
      return;
    }

    const result = await response.json();
    console.log("✅ Réponse JSON :", result);

    if (!result.success) {
      alert("❌ Erreur serveur : " + (result.message || "Erreur inconnue."));
      return;
    }

    console.log("✅ ID Soumission enregistré :", result.id_soumission);

    // 5) ✅ Tout va bien : Passer à l'étape suivante
    step1Div.classList.add("hidden-section");
    themeSelectionDiv.classList.remove("hidden-section");

  } catch (error) {
    console.error("🚨 Erreur AJAX :", error);
    alert("Erreur de communication avec le serveur.");
  } finally {
    // Réactiver le bouton
    submitButton.disabled = false;
    submitButton.innerHTML = "Valider mes informations";
  }
});



/* ============================
   1) RÉFÉRENCES GÉNÉRALES
============================ */
const themeCardsContainer = document.getElementById("themeCardsContainer");

// Toast container
const toastContainer = document.getElementById("toastContainer") || null;
// Modal final
const finalModalEl = document.getElementById("finalModal") || null;
let finalModal = null;
if (finalModalEl) {
  finalModal = new bootstrap.Modal(finalModalEl, { keyboard: false });
}

// Formulaires (DIV conteneur)
const formAccesPublics     = document.getElementById("formAccesPublics");
const formAccueilOrientation = document.getElementById("formAccueilOrientation");
const formDiligence        = document.getElementById("formDiligence");
const formCoutService      = document.getElementById("formCoutService");
const formCorruption       = document.getElementById("formCorruption");
const formReclamations     = document.getElementById("formReclamations");
const formDigitale         = document.getElementById("formDigitale");
const formParticipation    = document.getElementById("formParticipation");
const formRessourcesHumaines = document.getElementById("formRessourcesHumaines");

// Formulaires (réels <form>)
const formAccesPublicsForm       = document.getElementById("formAccesPublicsForm");
const formAccueilOrientationForm = document.getElementById("formAccueilOrientationForm");
const formDiligenceForm          = document.getElementById("formDiligenceForm");
const formCoutServiceForm        = document.getElementById("formCoutServiceForm");
const formCorruptionForm         = document.getElementById("formCorruptionForm");
const formReclamationsForm       = document.getElementById("formReclamationsForm");
const formDigitaleForm           = document.getElementById("formDigitaleForm");
const formParticipationForm      = document.getElementById("formParticipationForm");
const formRessourcesHumainesForm = document.getElementById("formRessourcesHumainesForm");

// Boutons retour
const btnReturn1 = document.getElementById("btnReturn1");
const btnReturn2 = document.getElementById("btnReturn2");
const btnReturn3 = document.getElementById("btnReturn3");
const btnReturn4 = document.getElementById("btnReturn4");
const btnReturn5 = document.getElementById("btnReturn5");
const btnReturn6 = document.getElementById("btnReturn6");
const btnReturn7 = document.getElementById("btnReturn7");
const btnReturn8 = document.getElementById("btnReturn8");
const btnReturn9 = document.getElementById("btnReturn9");

// Boutons "Soumettre"
const submitAccesPublics       = document.getElementById("submitAccesPublics");
const submitAccueilOrientation = document.getElementById("submitAccueilOrientation");
const submitDiligence          = document.getElementById("submitDiligence");
const submitCoutService        = document.getElementById("submitCoutService");
const submitCorruption         = document.getElementById("submitCorruption");
const submitReclamations       = document.getElementById("submitReclamations");
const submitDigitale           = document.getElementById("submitDigitale");
const submitParticipation      = document.getElementById("submitParticipation");
const submitRessourcesHumaines = document.getElementById("submitRessourcesHumaines");

// Statut : pour savoir quels thèmes sont complétés
const themesStatus = {
  accesPublics: false,
  accueilOrientation: false,
  diligence: false,
  coutService: false,
  corruption: false,
  reclamations: false,
  digitale: false,
  participation: false,
  ressourcesHumaines: false
};

// TABLE DE CORRESPONDANCE DES ROUTES LARAVEL
const themeRoutes = {
  accesPublics:          "{{ route('soumissions.acces_publics') }}",
  accueilOrientation:    "{{ route('soumissions.accueil_orientation') }}",
  diligence:             "{{ route('soumissions.diligence') }}",
  coutService:           "{{ route('soumissions.cout_service') }}",
  corruption:            "{{ route('soumissions.corruption') }}",
  reclamations:          "{{ route('soumissions.reclamations') }}",
  digitale:              "{{ route('soumissions.digitale') }}",
  participation:         "{{ route('soumissions.participation') }}",
  ressourcesHumaines:    "{{ route('soumissions.ressources_humaines') }}"
};

/* ============================
   3) MENU THÉMATIQUES
============================ */
themeCardsContainer.addEventListener("click", function(e) {
  const card = e.target.closest(".theme-card");
  if (!card) return;
  const themeKey = card.getAttribute("data-theme");
  showForm(themeKey);
});

function showForm(themeKey) {
  themeSelectionDiv.classList.add("hidden-section");
  hideAllForms();
  switch(themeKey) {
    case "accesPublics":
      formAccesPublics.classList.remove("hidden-section");
      break;
    case "accueilOrientation":
      formAccueilOrientation.classList.remove("hidden-section");
      break;
    case "diligence":
      formDiligence.classList.remove("hidden-section");
      break;
    case "coutService":
      formCoutService.classList.remove("hidden-section");
      break;
    case "corruption":
      formCorruption.classList.remove("hidden-section");
      break;
    case "reclamations":
      formReclamations.classList.remove("hidden-section");
      break;
    case "digitale":
      formDigitale.classList.remove("hidden-section");
      break;
    case "participation":
      formParticipation.classList.remove("hidden-section");
      break;
    case "ressourcesHumaines":
      formRessourcesHumaines.classList.remove("hidden-section");
      break;
  }
}

function hideAllForms() {
  formAccesPublics.classList.add("hidden-section");
  formAccueilOrientation.classList.add("hidden-section");
  formDiligence.classList.add("hidden-section");
  formCoutService.classList.add("hidden-section");
  formCorruption.classList.add("hidden-section");
  formReclamations.classList.add("hidden-section");
  formDigitale.classList.add("hidden-section");
  formParticipation.classList.add("hidden-section");
  formRessourcesHumaines.classList.add("hidden-section");
}

function goBack(formEl) {
  formEl.classList.add("hidden-section");
  themeSelectionDiv.classList.remove("hidden-section");
}

// BOUTONS RETOUR
btnReturn1 && btnReturn1.addEventListener("click", () => goBack(formAccesPublics));
btnReturn2 && btnReturn2.addEventListener("click", () => goBack(formAccueilOrientation));
btnReturn3 && btnReturn3.addEventListener("click", () => goBack(formDiligence));
btnReturn4 && btnReturn4.addEventListener("click", () => goBack(formCoutService));
btnReturn5 && btnReturn5.addEventListener("click", () => goBack(formCorruption));
btnReturn6 && btnReturn6.addEventListener("click", () => goBack(formReclamations));
btnReturn7 && btnReturn7.addEventListener("click", () => goBack(formDigitale));
btnReturn8 && btnReturn8.addEventListener("click", () => goBack(formParticipation));
btnReturn9 && btnReturn9.addEventListener("click", () => goBack(formRessourcesHumaines));

/* ========================================
   4) VALIDATION “AU MOINS UN CHECKBOX”
======================================== */
function isAtLeastOneChecked(formEl, checkboxGroupName) {
  const checkboxes = formEl.querySelectorAll(`input[name="${checkboxGroupName}"]`);
  return Array.from(checkboxes).some(ch => ch.checked);
}

function getCheckedValues(checkboxName) {
  return Array.from(document.querySelectorAll(`input[name="${checkboxName}"]:checked`))
              .map(ch => ch.value);
}

/* ==============================
   5) SOUMISSION THÈMES (AJAX)
============================== */
submitAccesPublics      && submitAccesPublics.addEventListener("click", () => sendThemeForm("accesPublics", formAccesPublicsForm));
submitAccueilOrientation&& submitAccueilOrientation.addEventListener("click", () => sendThemeForm("accueilOrientation", formAccueilOrientationForm));
submitDiligence         && submitDiligence.addEventListener("click", () => sendThemeForm("diligence", formDiligenceForm));
submitCoutService       && submitCoutService.addEventListener("click", () => sendThemeForm("coutService", formCoutServiceForm));
submitCorruption        && submitCorruption.addEventListener("click", () => sendThemeForm("corruption", formCorruptionForm));
submitReclamations      && submitReclamations.addEventListener("click", () => sendThemeForm("reclamations", formReclamationsForm));
submitDigitale          && submitDigitale.addEventListener("click", () => sendThemeForm("digitale", formDigitaleForm));
submitParticipation     && submitParticipation.addEventListener("click", () => sendThemeForm("participation", formParticipationForm));
submitRessourcesHumaines&& submitRessourcesHumaines.addEventListener("click", () => sendThemeForm("ressourcesHumaines", formRessourcesHumainesForm));

async function sendThemeForm(themeKey, formEl) {
  // 1) Vérifier la validité HTML5
  if (!formEl.checkValidity()) {
    formEl.reportValidity();
    return;
  }

  // 2) Contrôler les checkboxes obligatoires, selon le thème
  switch(themeKey) {
    case "accesPublics":
      if (!isAtLeastOneChecked(formEl, "servicesFrequents[]")) {
        alert("Veuillez cocher au moins un service fréquenté dans 'Accès aux services publics'.");
        return;
      }
      if (!isAtLeastOneChecked(formEl, "infoPreferences[]")) {
        alert("Veuillez sélectionner au moins un mode d'information.");
        return;
      }
      break;

    case "corruption":
      const corrOui = formEl.querySelector("#corr_oui");
      if (corrOui && corrOui.checked) {
        if (!isAtLeastOneChecked(formEl, "typeCorruption[]")) {
          alert("Vous avez indiqué 'Oui' à la corruption, veuillez cocher au moins un type de corruption observé.");
          return;
        }
      }
      break;

    case "reclamations":
      const recOui = formEl.querySelector("#rec_oui");
      if (recOui && recOui.checked) {
        if (!isAtLeastOneChecked(formEl, "reclamationService[]")) {
          alert("Vous avez indiqué avoir déposé une réclamation, veuillez cocher au moins un service concerné.");
          return;
        }
      }
      break;

    case "digitale":
      const serdigOui = formEl.querySelector("#serdig_oui");
      if (serdigOui && serdigOui.checked) {
        if (!isAtLeastOneChecked(formEl, "servicesDigitauxUtilises[]")) {
          alert("Vous avez indiqué utiliser des services digitalisés, veuillez cocher au moins un service.");
          return;
        }
      }
      const probOui = formEl.querySelector("#prob_oui");
      if (probOui && probOui.checked) {
        if (!isAtLeastOneChecked(formEl, "problemesEnLigne[]")) {
          alert("Vous avez indiqué avoir rencontré des problèmes, veuillez préciser au moins un type de problème.");
          return;
        }
      }
      break;
    // Les autres thèmes n'ont pas de checkboxes “obligatoires” multiples.
  }

  // 3) Construire le FormData manuellement
  const routeUrl = themeRoutes[themeKey];
  if (!routeUrl) {
    alert("Pas de route configurée pour le thème : " + themeKey);
    return;
  }

  const formData = new FormData();
  formData.append('_token', '{{ csrf_token() }}'); // CSRF Token pour Laravel

  // Récupérer TOUTES les inputs "text", "select", "textarea" (sauf checkboxes)
  const inputs = formEl.querySelectorAll('input:not([type="checkbox"])[name], select[name], textarea[name]');
  inputs.forEach(input => {
    formData.append(input.name, input.value);
  });

  // Gérer CHAQUE ensemble de checkboxes dans ce thème
  switch(themeKey) {
    case "accesPublics": {
      let servicesFrequents = getCheckedValues("servicesFrequents[]");
      formData.append('servicesFrequents', JSON.stringify(servicesFrequents));

      let infoPreferences = getCheckedValues("infoPreferences[]");
      formData.append('infoPreferences', JSON.stringify(infoPreferences));
    } break;

    case "corruption": {
      let typeCorruption = getCheckedValues("typeCorruption[]");
      formData.append('typeCorruption', JSON.stringify(typeCorruption));
    } break;

    case "reclamations": {
      let reclamationService = getCheckedValues("reclamationService[]");
      formData.append('reclamationService', JSON.stringify(reclamationService));
    } break;

    case "digitale": {
      let servicesDigitaux = getCheckedValues("servicesDigitauxUtilises[]");
      formData.append('servicesDigitauxUtilises', JSON.stringify(servicesDigitaux));

      let problemes = getCheckedValues("problemesEnLigne[]");
      formData.append('problemesEnLigne', JSON.stringify(problemes));
    } break;
  }

  // 4) Envoi AJAX
  try {
    const response = await fetch(routeUrl, {
      method: "POST",
      body: formData
    });

    if (!response.ok) {
      let errText = await response.text();
      alert("Erreur lors de l'enregistrement : " + errText);
      return;
    }

    const result = await response.json();
    if (!result.success) {
      alert("Le serveur a répondu success=false : " + (result.message || 'Erreur inconnue.'));
      return;
    }

    // 5) Tout va bien => marquons le thème comme complété
    themesStatus[themeKey] = true;

    // 6) Revenir à l'écran de sélection
    goBack(formEl.parentElement);

    // 7) Retirer la carte du thème
    removeCard(themeKey);

    // 8) Afficher un toast
    showToast(themeKey);

    // 9) Vérifier si tous les thèmes sont complétés
    checkAllDone();

  } catch (error) {
    console.error("Exception JS lors de l'enregistrement", error);
    alert("Exception JS : " + error.message);
  }
}

/* ============================
   SUPPRIMER LA CARTE
============================ */
function removeCard(themeKey) {
  const card = themeCardsContainer.querySelector(`[data-theme="${themeKey}"]`);
  if (card) card.remove();
}

/* ============================
   CHECK ALL DONE
============================ */
function checkAllDone() {
  const doneCount = Object.values(themesStatus).filter(Boolean).length;
  if (doneCount === 9 && finalModal) {
    finalModal.show();
  }
}

/* ============================
   AFFICHAGE TOAST
============================ */
function showToast(themeKey) {
  if (!toastContainer) return; // s'il n'y a pas de container
  const doneCount = Object.values(themesStatus).filter(v => v).length;
  const remainingCount = 9 - doneCount;
  const themeName = getThemeName(themeKey);

  const messages = {
    1: `🎉 Bien joué ! Vous avez complété <b>${themeName}</b>. Commencer est souvent le plus difficile, mais vous êtes sur la bonne voie !`,
    2: `💪 Deux thématiques déjà renseignées. Bravo pour votre engagement ! Il reste <b>${remainingCount}</b>.`,
    3: `👏 Trois thématiques complétées ! Plus que <b>${remainingCount}</b>.`,
    4: `✨ Impressionnant ! Vous êtes à mi-parcours ! Il reste <b>${remainingCount}</b>.`,
    5: `🌟 Fantastique ! Cinq thématiques complétées ! Plus que <b>${remainingCount}</b> !`,
    6: `🔥 Bravo ! Six thématiques ! Il reste <b>${remainingCount}</b>.`,
    7: `🚀 Incroyable ! Sept thématiques ! Plus que <b>${remainingCount}</b>.`,
    8: `🎯 Exceptionnel ! Huit thématiques ! Encore une seule !`,
    9: `🎉 Félicitations ! Vous avez complété toutes les thématiques. Merci !`
  };
  const encouragement = messages[doneCount] || `Continuez, chaque étape compte !`;

  const toastEl = document.createElement("div");
  toastEl.classList.add("toast", "animate__animated", "animate__fadeInRight");
  toastEl.setAttribute("role", "alert");
  toastEl.setAttribute("aria-live", "assertive");
  toastEl.setAttribute("aria-atomic", "true");

  toastEl.innerHTML = `
    <div class="toast-header">
      <strong class="me-auto">Bravo !</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      ${encouragement}
    </div>
  `;

  toastContainer.appendChild(toastEl);
  const bsToast = new bootstrap.Toast(toastEl, { delay: 4000 });
  bsToast.show();
  toastEl.addEventListener("hidden.bs.toast", () => {
    toastEl.remove();
  });
}

/* ============================
   NOM LISIBLE PAR THÈME
============================ */
function getThemeName(key) {
  switch (key) {
    case "accesPublics":       return "Accès aux services publics";
    case "accueilOrientation": return "Accueil & orientation";
    case "diligence":          return "Diligence";
    case "coutService":        return "Coût du service";
    case "corruption":         return "Corruption";
    case "reclamations":       return "Réclamations";
    case "digitale":           return "Transformation digitale";
    case "participation":      return "Participation citoyenne";
    case "ressourcesHumaines": return "Ressources humaines";
    default: return "Thème inconnu";
  }
}

/* =========================================
   8) SCRIPT LIEU DE RÉSIDENCE (RÉGIONS...)
========================================= */
document.addEventListener("DOMContentLoaded", function () {
  loadRegions();
  loadCountries();
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
    .catch(error => console.error('Erreur lors du chargement des régions :', error));
}

function loadCountries() {
  fetch('/resources/views/frontend/countries.json')
    .then(response => response.json())
    .then(data => {
      const countrySelect = document.getElementById("country");
      data.forEach(country => {
        const option = document.createElement("option");
        option.value = country.cca2;
        option.textContent = country.name.common;
        countrySelect.appendChild(option);
      });
    })
    .catch(error => console.error('Erreur lors du chargement des pays :', error));
}

function toggleRegionSelect() {
  const isSenegalSelected = document.getElementById("senegal").checked;

  document.getElementById("region-container").style.display = isSenegalSelected ? "block" : "none";
  document.getElementById("department-container").style.display = "none";
  document.getElementById("diasporaCountries").style.display = isSenegalSelected ? "none" : "block";

  if (isSenegalSelected) {
    document.getElementById("region").value = "";
    document.getElementById("department").innerHTML = "";
  } else {
    document.getElementById("country").value = "";
  }

  // Rendez le champ pays obligatoire si Diaspora
  if (!isSenegalSelected) {
    document.getElementById("country").setAttribute("required", "required");
  } else {
    document.getElementById("country").removeAttribute("required");
  }
}

function updateDepartments() {
  const selectedRegionId = document.getElementById("region").value;
  const departmentSelect = document.getElementById("department");
  departmentSelect.innerHTML = "";

  if (selectedRegionId) {
    fetch(`/departements/${selectedRegionId}`)
      .then(response => response.json())
      .then(data => {
        data.forEach(department => {
          const option = document.createElement("option");
          option.value = department.id;
          option.textContent = department.nom;
          departmentSelect.appendChild(option);
        });
        document.getElementById("department-container").style.display = "block";
      })
      .catch(error => console.error('Erreur lors du chargement des départements :', error));
  } else {
    document.getElementById("department-container").style.display = "none";
  }
}
</script>





</body>

</html>

 <!-- FIN Réclamations
1. Passer les formulaires en POST vers des routes Laravel
 -->

 <!-- FIN Réclamations
  acces services publics
corruption
Services de réclamation
Transformation digitale


 -->


