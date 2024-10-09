<!DOCTYPE html>
<html lang="en">

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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

 
</head>
<style>
  .navmenu a.active {
    background-color: #F4F4F4; /* Choisissez la couleur de fond souhaitée */
    color: black; /* Couleur du texte pour le contraste */
}
.navmenu ul li a.highlight {
    background-color: yellow; /* Couleur de fond jaune */
    color: black; /* Couleur du texte (ajustez si nécessaire) */
    padding: 10px; /* Ajoutez du padding pour un meilleur espacement */
    border-radius: 5px; /* Arrondissez les coins si souhaité */
    transition: background-color 0.3s; /* Transition pour l'effet de survol */
}

.navmenu ul li a.highlight:hover {
    background-color: orange; /* Couleur de fond au survol (ajustez si nécessaire) */
}
.icon-wrapper {
  padding: 20px;
  transition: transform 0.3s;
}

.icon-wrapper:hover {
  transform: scale(1.05);
}

.animated-icon {
  font-size: 3rem;
  color: #007bff; /* Couleur des icônes */
  transition: transform 0.2s;
}
.objectives .icon-wrapper {
    background-color: #f8f9fa; /* Couleur de fond */
    border-radius: 10px; /* Arrondir les coins */
    padding: 20px; /* Ajout d'espace intérieur */
    transition: background-color 0.3s; /* Animation pour changement de couleur */
}

.objectives .icon-wrapper:hover {
    background-color: #e9ecef; /* Couleur de fond au survol */
}

.objectives h3 {
    color: #007bff; /* Couleur des titres */
}

.objectives p {
    color: #6c757d; /* Couleur du texte des descriptions */
}

.icon-wrapper {
  padding: 20px;
  transition: transform 0.3s;
  border-radius: 10px;
  color: white; /* Couleur du texte par défaut */
}

.icon-wrapper:hover {
  transform: scale(1.05);
}

.color-citizens {
  background-color: #007bff; /* Bleu */
}

.color-evaluation {
  background-color: #28a745; /* Vert */
}

.color-reforms {
  background-color: #ffc107; /* Jaune */
}

.color-collaboration {
  background-color: #dc3545; /* Rouge */
}

.color-transparency {
  background-color: #17a2b8; /* Cyan */
}

.color-performance {
  background-color: #6610f2; /* Violet */
}
/* Styles généraux */
.icon-wrapper h3 {
    font-size: 1.5rem; /* Taille par défaut */
}

.icon-wrapper p {
    font-size: 1rem; /* Taille par défaut */
}

/* Media query pour petits écrans */
@media (max-width: 576px) {
    .icon-wrapper h3 {
        font-size: 1.25rem; /* Réduire la taille des titres */
    }

    .icon-wrapper p {
        font-size: 0.875rem; /* Réduire la taille des descriptions */
    }
}


</style>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="">
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a></li>
          <li><a href="{{ route('contexte') }}">Contexte</a></li>
          <li><a href="{{ route('objectif') }}">Objectifs</a></li>
          <li><a href="{{ route('participation.form') }}">Donnez-nous votre avis</a></li>
          <li><a href="{{ route('login') }}">Connexion</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <h1 class="title-highlight" style="text-align:center; margin-top:2%">Objectifs des Concertations Nationales</h1>
    
    <!-- Objectives Section -->
    <section id="objectives" class="objectives section">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4" data-aos="fade-up">
        <div class="icon-wrapper color-citizens">
          <i class="bi bi-person-circle animated-icon"></i>
          <h3 style="color:black">Impliquer les Citoyens</h3>
          <p>Favoriser la participation des citoyens dans les discussions.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="icon-wrapper color-evaluation">
          <i class="bi bi-clipboard-data animated-icon"></i>
          <h3 style="color:black">Évaluer le Service Public</h3>
          <p>Analyser l'organisation et le fonctionnement actuel des services publics.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="icon-wrapper color-reforms">
          <i class="bi bi-lightbulb animated-icon"></i>
          <h3 style="color:black">Proposer des Réformes</h3>
          <p>Formuler des recommandations pour améliorer la qualité des services publics.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-wrapper color-collaboration">
          <i class="bi bi-people animated-icon"></i>
          <h3 style="color:black">Renforcer la Collaboration</h3>
          <p>Promouvoir la collaboration entre les différents acteurs sociaux et économiques.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
        <div class="icon-wrapper color-transparency">
          <i class="bi bi-shield-check animated-icon"></i>
          <h3 style="color:black">Garantir la Transparence</h3>
          <p>Assurer la transparence et l'intégrité dans la gestion des services publics.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
        <div class="icon-wrapper color-performance">
          <i class="bi bi-graph-up animated-icon"></i>
          <h3 style="color:black">Améliorer la Performance</h3>
          <p>Optimiser les performances des services pour mieux répondre aux besoins des usagers.</p>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Importance of Participation -->
    <section id="importance" class="importance section light-background">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <img src="assets/img/saluer.png" style="margin-top: -50px; border-radius: 5%;height:70%;width:70%" class="img-fluid" alt="Hero Image">
          </div>
          <div class="col-lg-6" data-aos="fade-up">
            <h2>Pourquoi Participer ?</h2>
            <p style="text-align:justify">
              La participation des citoyens est essentielle pour construire un avenir commun. En vous impliquant dans les concertations nationales, vous avez l'opportunité de faire entendre votre voix et d'influencer les décisions qui touchent votre vie quotidienne. 
              Votre contribution est cruciale pour garantir que les réformes répondent aux besoins réels de la population et pour créer un environnement plus inclusif et transparent.
              Ensemble, nous pouvons bâtir une administration publique plus accessible et efficace, capable de relever les défis actuels et futurs du Sénégal.
            </p>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>
  
  <script>
    // Custom script for animations
    document.querySelectorAll('.animated-icon').forEach(icon => {
      icon.addEventListener('mouseover', () => {
        icon.classList.add('animate');
      });
      icon.addEventListener('mouseout', () => {
        icon.classList.remove('animate');
      });
    });
  </script>

</body> 

</html>


<footer id="footer" class="footer">
  
<div class="container footer-top">
  <div class="row gy-4">
   
    <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            <span class="sitename">Plateforme de concertation nationale pour la Réforme du service public</span>
          </a>
          <div class="col-lg-8 col-md-12 footer-about">
         <a href="#" class="logo d-flex align-items-center">
          <span class="rs">Suivez nous
          sur les réseaux sociaux</span>
          </a>
       <div class="social-links d-flex mt-4">
        <a href="https://x.com/FpubliqueSn"><i class="bi bi-twitter-x"></i></a>
        <a href="https://www.facebook.com/fonctionpubliqueSn"><i class="bi bi-facebook"></i></a>
        <a href="https://www.youtube.com/@fpubliquesn4927"><i class="bi bi-youtube"></i></a>
        <a href="https://sn.linkedin.com/company/minist-re-de-la-fonction-publique-et-de-la-transformation-du-secteur-public"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Accès rapide</h4>
          <ul>
            <li><a href="https://www.fonctionpublique.gouv.sn/Recrutement">Souscrire à une demande d’emploi</a></li>
            <li><a href="https://www.fonctionpublique.gouv.sn/Attestation-de-non-appartenance-a-la-Fonction-publique-39">Obtenir votre Attestation ...</a></li>
           <li><a href="https://www.fonctionpublique.gouv.sn/Actes-37">Télécharger votre acte administratif</a></li>
          
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>liens utiles</h4>
          <ul>
            <li><a href="https://www.fonctionpublique.gouv.sn/Attestation-de-non-appartenance-a-la-Fonction-publique-39">Gov'athon 2024</a></li>
            <li><a href="https://www.fonctionpublique.gouv.sn/">Ministère de la Fonction publique</a></li>
            <li><a href="https://primature.sn/">Gouvernement du Sénégal</a></li>
         
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Localisation</h4>
         
          <p>52, Vincens x </p>
          <p>Abdou Karim BOURGI,</p>
          <p>Dakar</p>
        
        </div>

      </div>
  
  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>2024 Copyright</span> <strong class="px-1 sitename">MFPRSP/DSI/D2I</strong> <span></span></p>
 
</div>

</footer>